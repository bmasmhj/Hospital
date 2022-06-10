<?php 

require 'connection.php';

if(isset($_POST['pkgfullname'])){
// echo '<pre>';
// print_r($_POST);
    $name = $_POST['pkgfullname'];
    $address = $_POST['pkgaddress'];
    $datepicker = $_POST['datepicker'];
    $pkgcode = $_POST['packagecode'];
    $pkgname = $_POST['packagename'];
    $email = $_POST['pkgemail'];
    $num = $_POST['pkgnum'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $invoice = $_POST['invoice'];
    $date = date('Y-m-d', strtotime($datepicker));

    $sql = "INSERT INTO `bookedpkg`(`name`, `address`, `date`, `pkgcode`, `email`, `num`, `age`, `sex` ,`invoice`,`status`,`pkgname`) VALUES ('$name','$address','$date','$pkgcode','$email','$num','$age','$sex','$invoice','pending','$pkgname')";
    $save =  mysqli_query($con, $sql);
    if($save){
        
        $reason = '<span> <strong>'.$name.'</strong> Booked <strong>'.$pkgname.' </strong> </span>';
        $icon = 'mdi-medical-bag';
        $mainsql = "INSERT INTO `notification`(`reason`, `status`, `icon`, `color`) VALUES ('$reason','0','$icon','danger')";
        $main =  mysqli_query($con, $mainsql);
       

        if($main){
           
                echo 'success'; 
          
        
        }else{
            echo 'fail';
            die("insert failed $con->error");
        }
        
    }else{
        echo 'fail';
        die("insert failed $con->error");

    }


}
if(isset($_POST['apfullname'])){
//     echo '<pre>';
// print_r($_POST);

    $speciality = $_POST['speciality'];
    $selectdocs = $_POST['selectdocs'];
    $datepicker = $_POST['datepicker'];
    $apreason = $_POST['apreason'];
    $apfullname = $_POST['apfullname'];
    $apaddress = $_POST['apaddress'];
    $apemail = $_POST['apemail'];
    $apnum = $_POST['apnum'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $invoice = $_POST['invoice'];
    $docsid = $_POST['docsid'];

    $date = date('Y-m-d', strtotime($datepicker));
    
    $sql = "INSERT INTO `appointment`(`docname`,`doccode`, `department`, `appointdate`, `reason`, `fullname`, `email`, `address`, `age`, `phone`, `gender`,`invoice`,`status`) VALUES 
                                        ('$selectdocs','$docsid','$speciality','$date','$apreason','$apfullname','$apemail','$apaddress','$age','$apnum','$sex ','$invoice','pending')";

    $save =  mysqli_query($con, $sql);
    if($save){
        $reason = '<span> <strong>'.$apfullname.'</strong> Booked Appointment with <strong>'.$selectdocs.' </strong> </span>';
        $messsage = '<span> <strong>'.$apfullname.'</strong> wants to book an Appointment </span>';
        $icon = 'mdi-account-heart';
        $mainsql = "INSERT INTO `notification`(`reason`, `status`, `icon`, `color`) VALUES ('$reason','0','$icon','success')";
        $prsonalsql ="INSERT INTO `personalnotify`( `docid`, `message`, `status`, `icon`, `color`) VALUES ('$docsid','$messsage','0','$icon','danger')";
        
        $main =  mysqli_query($con, $mainsql);
        $personal =  mysqli_query($con, $prsonalsql);

        if($main){
            if($personal){
                echo 'success'; 
            }
        }
        }else{
            echo 'fail';
            die("insert failed $con->error");

        }    
             
}

if(isset($_POST['mailmsgdeqa'])){
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $num = $_POST['num'];
    $msg = $_POST['mailmsgdeqa'];
    $sub = $_POST['mailsub'];
    $sql = "INSERT INTO `contact`(`fullname`, `number`, `email`,`subject`, `message`, `status`) VALUES ('$fname','$num','$email' ,'$sub', '$msg' ,'0' )";
    $save =  mysqli_query($con, $sql);
    if($save){
        echo 'success';
    }else{
        echo 'fail';
        die("insert failed $con->error");

    }


}

if(isset($_POST['femessage'])){
    $fname = $_POST['fefirname'];
    $email = $_POST['feemail'];
    $msg = $_POST['femessage'];

    $sub = $_POST['subfeed'];

    $sql = "INSERT INTO `feedback`(`name`,`email`,`subject`, `message`, `status`) VALUES ('$fname','$email' ,'$sub', '$msg' ,'0' )";
    $save =  mysqli_query($con, $sql);
    if($save){
        echo 'success';
    }else{
        echo 'fail';
        die("insert failed $con->error");
    }
}

?>