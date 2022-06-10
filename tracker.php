<?php
require 'Controller/connection.php';

if(!isset($_COOKIE['uniqvisit'])){
	setCookie('uniqvisit','yes',time()+(60*60*24*30));
	 $date = date("Y-m-d");
	$uniqvisitsql = "SELECT  * FROM analytic WHERE date = '$date' ";
  	$uniqvisitresult = $con->query($uniqvisitsql);
  	$uniqvisitdata = [];
  if ($uniqvisitresult->num_rows > 0) {
    mysqli_query($con,"update analytic set unv = unv+1 where date='$date'");
  }
else{   
    $fe = "SELECT  * FROM analytic ORDER BY id desc limit 1";
    $visitresult = $con->query($fe);
    $visitdata = [];
    if ($visitresult->num_rows > 0) {
      while ($visitrow = $visitresult->fetch_assoc()) {
          $utv = $visitrow['unv'];
          $ptv =  $visitrow['pnv'];
      }
  }
  $visitsql = "INSERT INTO analytic (`date`, `utv`, `unv`, `ptv`, `pnv`) VALUES ('$date','$utv','1','$ptv','0')";
      if ($con->query($visitsql)){ 
   } else {
      die("Category creation failed $connection->error");
   }

}
}

	$date = date("Y-m-d");
	$visitsql = "SELECT  * FROM analytic WHERE date = '$date' ";
  	$visitresult = $con->query($visitsql);
  	$visitdata = [];
      
  if ($visitresult->num_rows > 0) {
		mysqli_query($con,"update analytic set pnv = pnv+1 where date='$date'");
  }
else{
    $fe = "SELECT  * FROM analytic ORDER BY id desc limit 1";
  	$visitresult = $con->query($fe);
  	$visitdata = [];
      if ($visitresult->num_rows > 0) {
        while ($visitrow = $visitresult->fetch_assoc()) {
            $utv = $visitrow['unv'];
            $ptv = $visitrow['pnv'];
        }
    }
    // mysqli_query($con,"update post set  lastupdate = '$date' , views=newview , newview = 0 ");
    $visitsql = "INSERT INTO analytic (`date`, `utv`, `unv`, `ptv`, `pnv`) VALUES ('$date','$utv','0','$ptv','1')";
	    if ($con->query($visitsql)){ 
	 } else {
	    die("Category creation failed $connection->error");
	 }
   

}	
?>