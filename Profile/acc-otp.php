<?php 
if(isset($_GET['usertoken'])){
    $dcodemail = base64_decode($_GET['usertoken']);
    $dcode = base64_decode($_GET['tokenid']);
    $code_a = $dcode ;
    $email_a = $dcodemail;


    
}else{
    header('Location: Login');
}

session_start();
require "../Controller/connection.php";


$email = $_SESSION['email'];    
if($email != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $codes = $fetch_info['code'];
        if($status == "verified"){
            if( $codes == $code_a ){
                if($email_a == $email){
                    echo $code_a;
                    $code = 0;
                    $status = 'verified';
                    $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = '$code_a'";
                    $update_res = mysqli_query($con, $update_otp);
                    if($update_res){
                        $_SESSION['email'] = $email;
                        $info = "Login";
                        $_SESSION['info'] = $info;
                        header('location: NewPassword');
                        exit();
                    }else{
                        echo "Failed while updating code!";
                        header('Location: Login');

                    }
                }else{
                    echo 'Please try using same device while verifying email';
                }
            }else{
                echo 'Token error ! <br> Token may have expired or has been reset';
            }
        }else{
            if($email_a == $email){
                if($code_a==$codes){
                    $code = 0;
                    $status = 'verified';
                    $update_otp = "UPDATE users SET code = $code, status = '$status' WHERE code = '$code_a'";
                    $update_res = mysqli_query($con, $update_otp);
                    if($update_res){
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
?>
                        <!DOCTYPE html>
                        <html lang="en">
                            <head>
                                <meta charset="utf-8" />
                                <title>Reset Email</title>
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <!-- App css -->
                                <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
                                <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
                                <link href="../assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />
                        
                            </head>
                        
                            <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
                        
                                <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-xxl-4 col-lg-5">
                                                <div class="card">
                        
                                                    <div class="card-body p-4">
                                                        
                                                        <div class="text-center m-auto">
                                                            <img src="../assets/images/mail_sent.svg" alt="mail sent image" height="64" />
                                                            <h4 class="text-dark-50 text-center mt-4 fw-bold">Your Email has been Verified</h4>
                                        
                                                            <p class="text-muted mb-4">
                                                                Redirecting to your profile in <strong id='counters'>5</strong> sec
                                                            </p>
                                                        </div>
                        
                                                        <form action="index.html">
                                                            <div class="mb-0 text-center">
                                                                <a href='../Profile' class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to Home</a>
                                                            </div>
                                                        </form>
                        
                                                    </div> <!-- end card-body-->
                                                </div>
                                                <!-- end card-->
                                                
                                            </div> <!-- end col -->
                                        </div>
                                        <!-- end row -->
                                    </div>
                                    <!-- end container -->
                                </div>
                                <!-- end page -->
                        
                                <!-- bundle -->
                                <script src="../assets/js/vendor.min.js"></script>
                                <script src="../assets/js/app.min.js"></script>
                                <script>
                                    var counter = 5 ;
                                    setInterval(function() {
                                        counter--;
                                        if (counter >= 0) {
                                        span = document.getElementById("counters");
                                        span.innerHTML = counter;
                                        }
                                        // Display 'counter' wherever you want to display it.
                                        if (counter === 0) {
                                            window.location.href = '../Profile';
                                            clearInterval(counter);
                                        }
                        
                                    }, 1000);
                                    </script>
                                
                            </body>
                        </html>
                        


<?php 

                        exit();
                    }else{
                        echo "Failed while updating code!";
                        header('Location: Login');

                    }
                }       
            }
        }
    }
}else{
    header('Location: Login');
}
// header('Location: Login');

?>

