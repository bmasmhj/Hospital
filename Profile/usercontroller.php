<?php 
session_start();
require "../Controller/connection.php";


$email = $_SESSION['email'];    
$password = $_SESSION['password'];

if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        // echo $code ;
        if($status == "verified"){
            if($code == '0'){
                $tname = $fetch_info['name'];
                $image = $fetch_info['image'];
                $email = $fetch_info['email'];
                $phone = $fetch_info['phone'];
                $address = $fetch_info['address'];
                $age = $fetch_info['age'];
                $sex = $fetch_info['sex'];
                $_SESSION['userid'] = $fetch_info['id'];



            }else{
                header('Location: ResetCode');
            }
        }else{
            header('Location: Verification');   
        }
    }
}else{
    header('Location: Login');
}
?>