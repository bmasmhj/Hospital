<?php 
session_start();
require "../Controller/connection.php";
$email = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['regemail'])){

    $name = mysqli_real_escape_string($con, $_POST['fullname']);
    $email = $_POST['regemail'];
        $code = $_POST['code'];
    $password = mysqli_real_escape_string($con, $_POST['regpassword']);
    $email_check = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        echo 'duplicateuser';
        $errors['email'] = '1';
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        // $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO users (name, email, password, code, status,image)
                        values('$name', '$email', '$encpass', '$code', '$status','default.jpg')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $info = "We've sent a verification code to your email - $email";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            echo 'verify';
        }else{
            echo 'dberr';
        }
    }

}



    if(isset($_POST['loginemail'])){
        $email = $_POST['loginemail'];
        $password = $_POST['loginpassword'];
        $check_email = "SELECT * FROM users WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            $fetch_name = $fetch['name'];
            // print_r($_POST);
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                    echo 'success';
                }else{
                    $info = $email;
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    echo "verify";
                }
            }else{
                echo "wronguser";
                 $_SESSION['email'] = $email;

            }
        }else{
            echo "nouser";
            $_SESSION['email'] = $email;

        }
    }

    //if user click continue button in forgot password form
    if(isset($_POST['resetemail'])){
        $email = $_POST['resetemail'];
        $code = $_POST['code'];
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $insert_code = "UPDATE users SET code = '$code' WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $_SESSION['email'] = $email;
                echo 'verify';
            }else{
                die("insert failed $con->error");
            }
        }else{
           echo 'noemail';
        }
    }

    //if user click change password button
    if(isset($_POST['newpassword'])){
        $_SESSION['info'] = "";
        $password = $_POST['newpassword'];
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE users SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);

            if($run_query){
                $_SESSION['info'] = '';
                $_SESSION['email'] = $email ;
                $_SESSION['password'] = $password;
                echo 'success';
            }else{
                echo 'dberr';
            }
        
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: Login');
    }
?>