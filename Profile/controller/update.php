<?php 

session_start();
$email = $_SESSION['email'];
require_once '../../Controller/connection.php';
if(isset($_POST['updateprofile'])){
     $name = $_POST['name'];
     $address = $_POST['address'];     
     $phone = $_POST['phone'];     
     $date = $_POST['date'];    
     
     $update = "UPDATE `users` SET `name`='$name',`phone`='$phone',`address`='$address',`age`='$date',`sex`='male' WHERE email = '$email' ";
     $save =  mysqli_query($con, $update);
     if($save){
        header('Location: ../');

     }else{
         echo 'fail';
         die("insert failed $con->error");
 
     }

}
else if(isset($_POST['cancelappoint'])){   
    $id = $_POST['cancelappoint'];

    $update = "UPDATE `appointment` SET status='cancelled' WHERE id = '$id' ";
    $save =  mysqli_query($con, $update);

    if($save){
        echo 'success';
     }else{
         echo 'fail';
         die("insert failed $con->error");
 
     }
}else if(isset($_POST['editappointment'])){
    $id = $_POST['specialitys'];

    $no = $_POST['editappointment'];

    $specialitysql = "SELECT  * FROM speciality WHERE id = '$id' ";
    $specialityresult = $con->query($specialitysql);
    $specialitydata = [];
    if ($specialityresult->num_rows > 0) {
        while ($specialityrow = $specialityresult->fetch_assoc()) {
            $specname = $specialityrow['name'];
        }
    }

    $selecdocs = $_POST['selecdocs'];
    $date = $_POST['date'];
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];
    $reason =  $_POST['reason'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];



    $update = "UPDATE `appointment` SET `docname`= '$selecdocs',`department`='$specname',`appointdate`='$date',`reason`='$reason',`fullname`='$fullname',`address`='$address',`age`='$age',`phone`='$phone',`gender`='$gender' WHERE id = '$no' ";
    $save =  mysqli_query($con, $update);
    if($save){
       header('Location: ../');

    }else{
        echo 'fail';
        die("insert failed $con->error");

    }

}else if(isset($_POST['updatebookingpkg'])){
    $id = $_POST['updatebookingpkg'];
    $name = $_POST['name'];
    $pkgcode = $_POST['pkgcode'];
    $address = $_POST['address'];
    $number = $_POST['number'];
    $gender = $_POST['gender'];
    $date = $_POST['date'];
    $healthservicessql = "SELECT  * FROM healthservices WHERE codeid = '$pkgcode'";
    $healthservicesresult = $con->query($healthservicessql);
    if ($healthservicesresult->num_rows > 0) {
        while ($healthservicesrow = $healthservicesresult->fetch_assoc()) {
        $pkgname = $healthservicesrow['name'];
        }
    }

    $update = "UPDATE `bookedpkg` SET `name`='$name',`address`='$address',`date`='$date',`pkgcode`='$pkgcode',`num`='$number',`sex`='$gender',`status`='pending',`pkgname`='$pkgname' WHERE id = '$id'";    
    $save =  mysqli_query($con, $update);
    if($save){
       header('Location: ../');

    }else{
        echo 'fail';
        die("insert failed $con->error");

    }
}
elseif (isset($_POST['docbtnpp'])) {
    $id = $_SESSION['userid'];
	$image1 = $_POST['img'];
    if (isset($_FILES['photo'])) {
        $tmpFilePath = $_FILES['photo']['tmp_name'];
        if ($tmpFilePath != ""){
          $maxsize = 524288895959;
          $extsAllowed = array( 'jpg', 'jpeg', 'png' ,'gif');
          $uploadedfile = $_FILES['photo']['name'];
          $extension = pathinfo($uploadedfile, PATHINFO_EXTENSION);
          if (in_array($extension, $extsAllowed) ) {
            $newpicture = uniqid();
            $url = $newpicture.$uploadedfile ;
            $name = "../../assets/images/uploads/users/".$url;
            $result = move_uploaded_file($_FILES['photo']['tmp_name'], $name);
            $imageofrecord = $url;

            $sql = "UPDATE users SET `image` = '$imageofrecord'  WHERE id = '$id' ";
                if ($con->query($sql)) {
                    header('location:../Dashboard');
                }

          }
      }
    }

}


print_r($_POST);

?>