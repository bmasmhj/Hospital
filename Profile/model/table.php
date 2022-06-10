<?php 
session_start();
require_once '../../Controller/connection.php';
require_once '../controller/info-fetcher.php';
$data = '';
if(isset($_POST['appoitments'])){
    echo'<table id="basic-datatable" class="table dt-responsive nowrap w-100">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Department</th>
                    <th id="descending">Appointment date</th>
                    <th>Patient Name</th>
                    <th>Age</th>
                    <th>Status</th>
            <th>Action</th>

                </tr>
            </thead>
            <tbody> ';
            foreach( $appointmentdata  as $key => $valueofappointment) { 
                if($valueofappointment['status'] != 'deleted'){
                echo '
                    <tr id="appoint_'.$valueofappointment["id"].'">
                        <td>'.$valueofappointment["docname"].'</td>
                        <td>'.$valueofappointment["department"].'</td>
                        <td>'.$valueofappointment["appointdate"].'</td>
                        <td>'.$valueofappointment["fullname"].'</td>
                        <td>'.$valueofappointment["age"].'</td>
                        <td>'.$valueofappointment["status"].'</td>
                        <td>';
                        if( $valueofappointment["status"] != 'accepted'){ 
                            if($valueofappointment["status"] != 'cancelled'){
                                if($valueofappointment["status"] != 'rejected'){
                                    if($valueofappointment['status']!='expired'){
                                    echo'
                                    <button data-bs-toggle="modal" data-bs-target="#displaymodel" onclick="editapointment('.$valueofappointment["id"].')" class="btn btn-info"><i class="mdi mdi-pencil"></i></button> 
                            ';
                                    }
                                }
                            }
                         }
                        
                        if($valueofappointment["status"] == 'accepted'){
                            echo '
                            <button onclick="cancelappoint('.$valueofappointment["id"].')" class="btn btn-danger" title="cancel"><i class="mdi mdi-window-close" ></i></button>';
                        }else{
                        echo '
                        <button onclick="deleteappoint('.$valueofappointment["id"].')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button>'; 
                        }
                        echo'
                        </td>
                    </tr>
            ';
            } }
            echo '
            </tbody>
        </table> ';
}   
else if(isset($_POST['bookingdetails'])){
   echo'<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Package Name</th>
            <th id="descending" >Date</th>
            <th>Number</th>
            <th>Age</th>
            <th>Sex</th>
            <th>Status</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody> ';
    foreach( $bookedpkgdata  as $key => $valuebook) { 
        if($valuebook['status']!=="deleted"){
        echo '
            <tr id="booking_'.$valuebook["id"].'">
            <td>'.$valuebook["pkgname"].'</td>
            <td>'.$valuebook["date"].'</td>
            <td>'.$valuebook["num"].'</td>
            <td>'.$valuebook["age"].'</td>
            <td>'.$valuebook["sex"].'</td>
            <td>'.$valuebook["status"].'</td>
            <td>';
            if($valuebook['status']!= "completed" ){ echo'<button data-bs-toggle="modal" data-bs-target="#displaymodel" onclick="editbooking('.$valuebook["id"].')" class="btn btn-info"><i class="mdi mdi-pencil"></i></button>';}
            echo '  <button onclick="deletebook('.$valuebook["id"].')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button></td>
            </tr>
       ';
        } }
        echo '
        </tbody>
    </table>';

}

else if(isset($_POST['recordetail'])){
    echo'<table id="basic-datatable" class="table dt-responsive nowrap w-100">
    <thead>
        <tr>
            <th>Package Name</th>
            <th id="descending" >Date</th>
            <th>Number</th>
            <th>Age</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody> ';
    foreach( $recordsdata  as $key => $recordvalue) { 
        if($recordvalue['status']!='deleted'){
        echo '
            <tr id="records_'.$recordvalue["id"].'">
                <td>'.$recordvalue["patientname"].'</td>
                <td>'.$recordvalue["nameofrecord"].'</td>
                <td>'.$recordvalue["detail"].'</td>
                <td>'.$recordvalue["message"].'</td>
                <td><img src="../assets/images/uploads/reports/'.$recordvalue["imageofrecord"].'" class="recordimg" data-bs-toggle="modal" data-bs-target="#displaymodel" onclick="viewimg('.$recordvalue["id"].')" id="imagesrc_'.$recordvalue["id"].'"></img></td>
                <td><button onclick="deleterecord('.$recordvalue["id"].')" class="btn btn-danger"><i class="mdi mdi-trash-can"></i></button></td>
            </tr>
       ';
    } }
       echo '
        </tbody>
    </table>';
}
else if(isset($_POST['editapointment'])){
    $id = $_POST['editapointment'];

    $specialitysql = "SELECT  * FROM speciality ORDER BY name";
    $specialityresult = $con->query($specialitysql);
    $specialitydata = [];
    if ($specialityresult->num_rows > 0) {
    while ($specialityrow = $specialityresult->fetch_assoc()) {
        array_push($specialitydata, $specialityrow);
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

            $apointsql = "SELECT  * FROM appointment WHERE id = '$id' ";
            $apointresult = $con->query($apointsql);
            if ($apointresult->num_rows > 0) {
            while ($apointrow = $apointresult->fetch_assoc()) {
                $gender = trim($apointrow['gender']);
                ?> 
                <form action="controller/update.php" method="post">
                <label>Department</label>    

                    <select class="form-select mb-3" required name="specialitys" id="specialitys" onchange="specialities()">
                        <option value='<?php echo $apointrow["id"]?>'><?php echo $apointrow["department"]?></option>
                        <?php 
                        foreach($specialitydata as $key => $department){
                                if($department['name'] != $apointrow["department"] ) {
                        ?>
                        <option value="<?php echo $department['id']?>"><?php echo $department['name']?></option>
                        <?php } } ?>
                    </select>
                    <label>Doctor</label>    

                    <select required class="form-select mb-3" name="selecdocs" id="selectdocs">
                        <option value="<?php echo $apointrow["docname"] ?>"><?php echo $apointrow["docname"] ?></option>
                        <?php 
                        foreach($doctordata as $key => $docoption){
                                if( $docoption['name'] != $apointrow["docname"] && $docoption['speciality'] == $apointrow["department"] ) {
                        ?>
                            <option value="<?php echo $docoption['name']?>"><?php echo $docoption['name']?></option>
                        <?php } } ?>

                    </select>
                    <label>Date of Birth</label>    

                    <input type="date" name="date" class="form-control mb-3" value="<?php echo $apointrow["appointdate"]?>">
                    <label>Patient Full name</label>    
                    <input type="text" name="fullname" class="form-control mb-3" value="<?php echo $apointrow["fullname"]?>">
                    
                    <label>Address</label>    
                <input type="text" name="address" class="form-control mb-3" value="<?php echo $apointrow["address"]?>">
                
                    <label for="age" >Age (<span id="ageseleceted"><?php echo $apointrow["age"]?></span>)</label>
                    <input type="range" min="0" max="100" name="age" oninput="ageseleeter(this.value)" onchange="ageseleeter(this.value)" class="form-control mb-3"  value="<?php echo $apointrow["age"]?>">
                    <label class="form-label">Gender</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input type="radio" <?php if($gender == 'male') { echo "checked"; } ?> id="gender" name="gender" value='male' class="form-check-input" required>
                        <label class="form-check-label" for="customRadio3">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" <?php if($gender=='female') { echo "checked"; } ?> id="gender" name="gender" value='female' class="form-check-input" required>
                        <label class="form-check-label" for="customRadio4">Female</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="radio" <?php if($gender=='other') { echo "checked"; } ?> id="gender" name="gender" value='others' class="form-check-input" required>
                        <label class="form-check-label" for="customRadio4">Others</label>
                    </div>
                    <br>
                    <br>

                    <label>Phone</label>    
                    <input type="number" name="phone" class="form-control mb-3" value="<?php echo $apointrow["phone"]?>">
                    <label>Reason</label>
                    <textarea  class="form-control" name="reason" id="" cols="30" rows="10"><?php echo $apointrow["reason"]?></textarea>
                    <button class="btn btn-success mt-3" type="submit" name="editappointment" value="<?php echo $id?>">Update</button>
                </form>
            <?php
        }
  }   

}

else if(isset($_POST['editbooking'])){
    $id = $_POST['editbooking'];
    
    $healthservicessql = "SELECT  * FROM healthservices ORDER BY name";
    $healthservicesresult = $con->query($healthservicessql);
    $healthservicesdata = [];
    if ($healthservicesresult->num_rows > 0) {
    while ($healthservicesrow = $healthservicesresult->fetch_assoc()) {
        array_push($healthservicesdata, $healthservicesrow);
    }
}

    $booksql = "SELECT  * FROM bookedpkg WHERE id = '$id' ";
    $bookresult = $con->query($booksql);
    if ($bookresult->num_rows > 0) {
    while ($bookrow = $bookresult->fetch_assoc()) {
        $gender = $bookrow['sex'];
        ?> 
        <form action="controller/update.php" method="post">
            <label class="mt-2">Fullname</label>
            <input type="text" name="name" class="form-control" value="<?php echo $bookrow['name']?>">
            <label class="mt-2">Package</label>
            <select name="pkgcode" id="" class="form-control">
                <option value="<?php echo $bookrow['pkgcode']?>"><?php echo $bookrow['pkgname']?></option>
                <?php 
                    foreach($healthservicesdata as $key => $healthservicesval){
                        if($bookrow['pkgcode']!= $healthservicesval['codeid'] ){
                            echo '<option value="'.$healthservicesval["codeid"].'">'.$healthservicesval["name"].'</option>';
                        }
                    }
                ?>
            </select>
            <label class="mt-2">Address</label>
            <input type="text" name="address" class="form-control" value="<?php echo $bookrow['address']?>">

            <label class="mt-2">Chechup Date</label>
            <input type="date" name="date" class="form-control" value="<?php echo $bookrow['date']?>">

            <label class="mt-2">Number</label>
            <input type="text" name="number" class="form-control" value="<?php echo $bookrow['num']?>">

            <label class="mt-2 form-label">Gender</label>
            <br>
            <div class="form-check form-check-inline">
                <input type="radio" <?php if($gender == 'male') { echo "checked"; } ?> id="gender" name="gender" value='male' class="form-check-input" required>
                <label class="form-check-label" for="customRadio3">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" <?php if($gender=='female') { echo "checked"; } ?> id="gender" name="gender" value='female' class="form-check-input" required>
                <label class="form-check-label" for="customRadio4">Female</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" <?php if($gender=='other') { echo "checked"; } ?> id="gender" name="gender" value='others' class="form-check-input" required>
                <label class="form-check-label" for="customRadio4">Others</label>
            </div>
            <br>
            <button type="submit" class="btn btn-success mt-2" name="updatebookingpkg" value="<?php echo $bookrow['id']?>">Update</button>
        </form>
    <?php
        }
  }   

}




?>



<!-- Datatables js -->
<script src="../assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="../assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="../assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="../assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="../assets/js/vendor/responsive.bootstrap5.min.js"></script>

<!-- Datatable Init js -->
<script src="../assets/js/pages/demo.datatable-init.js"></script>
