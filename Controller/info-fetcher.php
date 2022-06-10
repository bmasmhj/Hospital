<?php 

require 'connection.php';
require 'security.php';

$specialitysql = "SELECT  * FROM speciality ORDER BY name";
  	$specialityresult = $con->query($specialitysql);
  	$specialitydata = [];
      if ($specialityresult->num_rows > 0) {
        while ($specialityrow = $specialityresult->fetch_assoc()) {
            array_push($specialitydata, $specialityrow);
        }
    }

    //social media
    $socialmediasql = "SELECT  * FROM socialmedia";
    $socialmediaresult = $con->query($socialmediasql);
    $socialmediadata = [];
    if ($socialmediaresult->num_rows > 0) {
      while ($socialmediarow = $socialmediaresult->fetch_assoc()) {
          array_push($socialmediadata, $socialmediarow);
        }
    }

    //emergency service 
    $emservicesql = "SELECT * FROM `emergency` ";
    $emserviceresult = $con->query($emservicesql);
    $emservicedata = [];
    if ($emserviceresult->num_rows > 0) {
      while ($emservicerow = $emserviceresult->fetch_assoc()) {
          array_push($emservicedata, $emservicerow);
      }
  }
   //regular  service 
   $regservicesql = "SELECT * FROM `regularservices`";
   $regserviceresult = $con->query($regservicesql);
   $regservicedata = [];
   if ($regserviceresult->num_rows > 0) {
     while ($regservicerow = $regserviceresult->fetch_assoc()) {
         array_push($regservicedata, $regservicerow);
     }
 }
 

    $doctorsql = "SELECT  s.name as speciality,  d.*
                FROM doctor d
                JOIN speciality s
                ON d.specialityid = s.id
                ORDER BY d.name
                ";
    $doctorresult = $con->query($doctorsql);
    $doctordata = [];
    if ($doctorresult->num_rows > 0) {
      while ($doctorrow = $doctorresult->fetch_assoc()) {
          array_push($doctordata, $doctorrow);
      }
  }	

  $carouselsql = "SELECT  * FROM carousel ";
  $carouselresult = $con->query($carouselsql);
  $carouseldata = [];
      if ($carouselresult->num_rows > 0) {
      while ($carouselrow = $carouselresult->fetch_assoc()) {
          array_push($carouseldata, $carouselrow);
      }
  } 
  

  $healthsql = "SELECT  * FROM healthservices ";
  $healthresult = $con->query($healthsql);
  $healthdata = [];
  if ($healthresult->num_rows > 0) {
    while ($healthrow = $healthresult->fetch_assoc()) {
        array_push($healthdata, $healthrow);
        }
    }   	

    if(isset($_GET['service'])){
        $codex = $_GET['service'];
        $namex = mysqli_real_escape_string($con, $codex);
        if(chkcode($namex)!=false){
            $code = $_GET['service'];
        }else{
            ?>  <script> window.location.href = "TermsAndCondition"; </script> <?php
        }
        // echo $code;
        $healthsql = "SELECT  * FROM healthservices WHERE codeid = '$code'  ";
        $healthresult = $con->query($healthsql);
        $healthdata = [];
        if ($healthresult->num_rows > 0) {
        while ($healthrow = $healthresult->fetch_assoc()) {
            $healthname = $healthrow['name'];
            $codeid = $healthrow['codeid'];
            $servicedetailsqze = $healthrow['details'];
            }
        }	

    }

    if(isset($_GET['package'])){
        $codex = $_GET['package'];
        $namex = mysqli_real_escape_string($con, $codex);
        if(chkcode($namex)!=false){
            $code = $_GET['package'];
        }else{
            ?>  <script> window.location.href = "TermsAndCondition"; </script> <?php
        }
        $bookpckgsql = "SELECT  * FROM healthservices WHERE codeid = '$code'  ";
        $bookpckgresult = $con->query($bookpckgsql);
        $bookpckgdata = [];
        if ($bookpckgresult->num_rows > 0) {
        while ($bookpckgrow = $bookpckgresult->fetch_assoc()) {
            $bookpckgname = $bookpckgrow['name'];
            $codeid = $bookpckgrow['codeid'];   
            }
        }	

    }
    if(isset($_POST['with'])){
        $codex = $_POST['with'];
        $namex = mysqli_real_escape_string($con, $codex);
        if(chkcode($namex)!=false){
            $code = $_POST['with'];
        }else{
            ?>  <script> window.location.href = "TermsAndCondition"; </script> <?php
        }
        $doctorzsql = "SELECT  s.name as speciality,  d.*
        FROM doctor d
        JOIN speciality s
        ON d.specialityid = s.id
        WHERE doccode = '$code'
        ";
            $doctorzresult = $con->query($doctorzsql);
            $doctorzdata = [];
            if ($doctorzresult->num_rows > 0) {
            while ($doctorzrow = $doctorzresult->fetch_assoc()) {
                $docznames = $doctorzrow['name'];
                $docszpecial = $doctorzrow['speciality'];
                $docszpecialcode = $doctorzrow['doccode'];
                $docszpecialid = $doctorzrow['specialityid'];
                $doczsid = $doctorzrow['id'];
                $docsimage = $doctorzrow['image'];
                $doczday = strtoupper($doctorzrow['scheduledaystart'].' to '.$doctorzrow['scheduledaayend']);
                $timea =  date('h:i A', strtotime($doctorzrow['scheduletimestart']));
                $timeb =  date('h:i A', strtotime($doctorzrow['scheduletimeend']));
                $docztime = $timea.' - '.$timeb;
                }
            }
    }


    // 
    
    if(isset($_POST['searchingdoctor'])){
        $name = $_POST['searchingdoctor'];
        $namex = mysqli_real_escape_string($con, $name);
        if(chkcode($namex)!=false){
            $code = $_POST['searchingdoctor'];
        }else{
            ?>  <script> window.location.href = "TermsAndCondition"; </script> <?php
        }
        $doscsql = "SELECT  s.name as speciality,  d.*
        FROM doctor d
        JOIN speciality s
        ON d.specialityid = s.id
        WHERE (d.name LIKE '%".$code."%' OR s.name LIKE '%".$code."%')
        ORDER BY d.name
        ";
        $docszresult = $con->query($doscsql);
        $docszdata = [];
        if ($docszresult->num_rows > 0) {
        while ($docszrow = $docszresult->fetch_assoc()) {
        array_push($docszdata, $docszrow);
        }
        }	
    }

    if(isset($_POST['spciality'])){
        $name = $_POST['spciality'];
        $namex = mysqli_real_escape_string($con, $name);
        $doscxzqsql = "SELECT  s.name as speciality,  d.*
        FROM doctor d
        JOIN speciality s
        ON d.specialityid = s.id
        WHERE d.specialityid = '$name'
        ORDER BY d.name
        ";
        $docszqwresult = $con->query($doscxzqsql);
        $docszqwdata = [];
        if ($docszqwresult->num_rows > 0) {
        while ($docszqwrow = $docszqwresult->fetch_assoc()) {
        array_push($docszqwdata, $docszqwrow);
        $sepcialityqwx = $docszqwrow['speciality'];
        }
        }
        else{
            $specialitysql = "SELECT  * FROM speciality WHERE id = $name";
  	        $specialityresult = $con->query($specialitysql);
            if ($specialityresult->num_rows > 0) {
            while ($specialityrow = $specialityresult->fetch_assoc()) { 
                $sepcialityqwx = $specialityrow['name'];
            }
        }
        }	
    }


?>