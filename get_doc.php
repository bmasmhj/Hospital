<?php 
if(isset($_POST['spec_id'])){
$spec_id = $_POST['spec_id'];

require 'Controller/connection.php';
if ($con->connect_errno != 0) {
	die('Database connection error:' . $con->connect_error);
}
$sql = "SELECT * FROM doctor where specialityid = $spec_id ORDER BY name";
$result = $con->query($sql);
$html = "<option value=''>Select Doctor</option>";
if ($result->num_rows > 0) {
	while($city = $result->fetch_assoc()){
		$html .=  "<option value='" . $city['id'] . "'>$city[name]</option>";
	}
}
echo $html;
}


if(isset($_POST['doc_id'])){
    $doc_id = $_POST['doc_id'];
    // echo $doc_id;
    require 'Controller/connection.php';
    $doctorzsql = "SELECT  s.name as speciality,  d.*
    FROM doctor d
    JOIN speciality s
    ON d.specialityid = s.id
    WHERE d.id = '$doc_id'
    ";
        $doctorzresult = $con->query($doctorzsql);
        $doctorzdata = [];
        if ($doctorzresult->num_rows > 0) {
        while ($doctorzrow = $doctorzresult->fetch_assoc()) {
            $docznamesz = $doctorzrow['name'];
            $docszpecialcode = $doctorzrow['doccode'];
            $docszpecialz = $doctorzrow['speciality'];
            $docsimage = $doctorzrow['image'];
            $doczdayz = strtoupper($doctorzrow['scheduledaystart'].' to '.$doctorzrow['scheduledaayend']);
            $timeaz =  date('h:i A', strtotime($doctorzrow['scheduletimestart']));
            $timebz =  date('h:i A', strtotime($doctorzrow['scheduletimeend']));
            $docztimez = $timeaz.' - '.$timebz; 
     
            echo '<div class="card-body text-center">
                    <img class="rounded-circle m-2" src="assets/images/uploads/doctors/'.$docsimage.'" alt="" style="width: 150px; height: 150px; object-fit: cover;">
                    <h3>'.$docznamesz .'</h2>
                    <span>'.$docszpecialz .'</span>
                </div>
                <div class="card-body">
                    <h3 class="text-primary">OPD Scheule</h3>
                    <hr>
                    <h5>'.$doczdayz .'</h5>
                    <h5>'.$docztimez .'</h5>
                </div>
                <div class="card-body text-center">
                    <a href="Doc?tors='.$docszpecialcode.'" class="btn btn-danger">View Profile</a>
                </div>';
            

            }
        }
    
}

if(isset($_POST['spec_doc'])){
    require 'Controller/connection.php';
    

    $doc_id =  $_POST['spec_doc'];

    $findocqsql = "SELECT  s.name as speciality,  d.*
                FROM doctor d
                JOIN speciality s
                ON d.specialityid = s.id
                WHERE d.specialityid = '$doc_id'
                ORDER BY d.name
                ";
    $findocqresult = $con->query($findocqsql);
    if ($findocqresult->num_rows > 0) {
      while ($findocqrow = $findocqresult->fetch_assoc()) {
            echo '
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/uploads/doctors/'.$findocqrow["image"].'" alt="" style="width : 180px; height:180px; object-fit : cover;">

                    <h3> '.$findocqrow["name"] .' </h3>
                    <span>'.$findocqrow["speciality"].'</span>
                    <br>
                    <div class=""  >
                        <a href="Doc?tors='.$findocqrow["doccode"].'" class="doc-btns bg-primary">View Profile </a>
                        <form action="Appointment" method="post" class="p-0 m-0">
                            <button value="'.$findocqrow["doccode"].'" type="submit" name="with" stylle="box-sizing: none!important"  class="doc-btns btn btn-danger" >Book Appointment</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>';
      }
    }else{
        echo '<section class="row g-0 justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <img src="assets/images/file-searching.svg" height="90" alt="File not found Image">

                <h1 class="text-error mt-4">OPPS !</h1>
                <h4 class="text-uppercase text-danger mt-3">No result Found</h4>
                <p class="text-muted mt-3">Sorry ! We did not find any doctor related to your query.</p>
            </div> 
        </div> 
    </section> ';
    }	
}

if(isset($_POST['spec_doc_url'])){
    require 'Controller/connection.php';
    require 'Controller/security.php';
    $name = $_POST['spec_doc_url'];
    $namex = mysqli_real_escape_string($con, $name);
    if(chkcode($namex)!=false){
        $code = $_POST['spec_doc_url'];
    }else{
        ?>  <script> window.location.href = "FindDoctor"; </script> <?php
    }
    
        $findocqsql = "SELECT  s.name as speciality,s.id as ssid,  d.*
        FROM doctor d
        JOIN speciality s
        ON d.specialityid = s.id
        WHERE (d.name LIKE '%".$code."%' OR s.name LIKE '%".$code."%')
        ORDER BY d.name
        ";
    $findocqresult = $con->query($findocqsql);
    if ($findocqresult->num_rows > 0) {
      while ($findocqrow = $findocqresult->fetch_assoc()) {
            echo '
            <div class="col-md-3 col-sm-6">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="assets/images/uploads/doctors/'.$findocqrow["image"].'" alt="" style="width : 180px; height:180px; object-fit : cover;">

                    <h3> '.$findocqrow["name"] .' </h3>
                    <span>'.$findocqrow["speciality"].'</span>
                    <br>
                    <div class=""  >
                        <a href="Doc?tors='.$findocqrow["doccode"].'" class="doc-btns bg-primary">View Profile </a>
                        <form action="Appointment" method="post" class="p-0 m-0">
                            <button value="'.$findocqrow["doccode"].'" type="submit" name="with" stylle="box-sizing: none!important"  class="doc-btns btn btn-danger" >Book Appointment</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <script>
            $(document).ready(
                function(){
                    var theValue = '.$findocqrow["ssid"].'
                    $("option[value=" + theValue + "]")
                        .attr("selected",true);
                });
            </script>';
      }
    }else{
        echo '<section class="row g-0 justify-content-center">
        <div class="col-lg-4">
            <div class="text-center">
                <img src="assets/images/file-searching.svg" height="90" alt="File not found Image">

                <h1 class="text-error mt-4">OPPS !</h1>
                <h4 class="text-uppercase text-danger mt-3">No result Found</h4>
                <p class="text-muted mt-3">Sorry ! We did not find any doctor related to your query.</p>
            </div> 
        </div> 
    </section>
 
    ';
    }	
}
    ?>