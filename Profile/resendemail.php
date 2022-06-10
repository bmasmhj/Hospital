<?php 
session_start();
require "../Controller/connection.php";


$email = $_SESSION['email'];    

if($email != false ){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $name = $fetch_info['name'];

        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                // header('Location: ResetCode');
            }
        }else{
            
            header('location: sendmail/index.php?email='.$email.'&code='.$code.'&name='.$name."&newacc=true");
        }
    }
}else{
    header('Location: Login');
}
?>
// @ 