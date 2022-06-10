<?php 
require '../Controller/connection.php';
require '../Controller/security.php';


if(!empty($_POST['keyword'])){

    $keyword = $_POST['keyword'];
    $keywordx = mysqli_real_escape_string($con, $keyword);
    
    if(chkcode($keywordx)!=false){
        $code = $_POST['keyword'];
    }else{
        $code = 'invalid';
    }

    echo '<div class="dropdown-header noti-title">
    <h5 class="text-overflow mb-2">Showing result for <span class="text-danger">'.$code.'</span></h5>
    </div>                                  
    <div class="notification-list">';

    $doctorresultsql = "SELECT  s.name as speciality,  d.*
    FROM doctor d
    JOIN speciality s
    ON d.specialityid = s.id
    WHERE (d.name LIKE '%".$code."%' OR s.name LIKE '%".$code."%')
    ORDER BY d.name
    ";

    $doctorresult = $con->query($doctorresultsql);
    $doctorresultdata=[];
    if ($doctorresult->num_rows > 0) {
    while ($doctorresultrow = $doctorresult->fetch_assoc()) {
    array_push($doctorresultdata, $doctorresultrow);
    }
    }	
    foreach($doctorresultdata as $key => $doctorresultvalues){
    echo'<a href="Doc?tors='.$doctorresultvalues['doccode'].'" class="dropdown-item notify-item">
            <div class="d-flex">
                <img class="d-flex me-2 rounded-circle" src="assets/images/uploads/doctors/'.$doctorresultvalues['image'].'" alt="Generic placeholder image" height="32">
                <div class="w-100">
                    <h5 class="m-0 font-14">'.$doctorresultvalues['name'].'</h5>
                    <span class="font-12 mb-0">'.$doctorresultvalues['speciality'].'</span>
                </div>
            </div>
        </a>
    </div>';    
    }
}
else if(!empty($_POST['mobkeywords'])){

    $keyword = $_POST['mobkeywords'];
    $keywordx = mysqli_real_escape_string($con, $keyword);
    
    if(chkcode($keywordx)!=false){
        $code = $_POST['mobkeywords'];
    }else{
        $code = 'invalid';
    }

    echo '<span><strong>Showing result for <span class="text-danger">'.$code.'</span>  </strong></span>                       
    <div class="notification-list">';

    $doctorresultsql = "SELECT  s.name as speciality,  d.*
    FROM doctor d
    JOIN speciality s
    ON d.specialityid = s.id
    WHERE (d.name LIKE '%".$code."%' OR s.name LIKE '%".$code."%')
    ORDER BY d.name
    ";

    $doctorresult = $con->query($doctorresultsql);
    $doctorresultdata=[];
    if ($doctorresult->num_rows > 0) {
    while ($doctorresultrow = $doctorresult->fetch_assoc()) {
    array_push($doctorresultdata, $doctorresultrow);
    }
    }	
    foreach($doctorresultdata as $key => $doctorresultvalues){
    echo'<a href="Doc?tors='.$doctorresultvalues['doccode'].'" class="dropdown-item notify-item">
            <div class="d-flex">
                <img class="d-flex me-2 rounded-circle" src="assets/images/uploads/doctors/'.$doctorresultvalues['image'].'" alt="Generic placeholder image" height="32">
                <div class="w-100">
                    <h5 class="m-0 font-14">'.$doctorresultvalues['name'].'</h5>
                    <span class="font-12 mb-0">'.$doctorresultvalues['speciality'].'</span>
                </div>
            </div>
        </a>
    </div>';    
    }
}     
else{
    echo'<div class="dropdown-header noti-title">
    <h5 class="text-overflow mb-2">Type something</span></h5>
    </div>';
}


 
?>