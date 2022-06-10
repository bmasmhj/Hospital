<?php 

session_start();
require "../Controller/connection.php";

if(isset($_SESSION['email']) && isset($_SESSION['password'])){

$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: ResetCode');
            }else{
                header('Location: ../Profile');
            }
        }else{
            // header('Location: Verification');
        }
    }
}       
}
else{
    header('Location: Login');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Confirm Email</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico">

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
                                    <h4 class="text-dark-50 text-center mt-4 fw-bold">Email verification has been sent to</h4>
                                    <span><em><q><?php 
                                        if(isset($_SESSION['email'])){
                                            ?>
                                                <?php echo $_SESSION['email']; ?>
                                            <?php
                                        }
                                        ?></em></q></span>
                                    <p class="text-muted mb-4">
                                       
                                        </b>.
                                        Please check for an email from <strong>noreply@hospital.com</strong> and click on the included link to
                                        verify email. <strong>Check your spam folder if email not found</strong>
                                    </p>
                                </div>

                                <form action="index.html">
                                    <div class="mb-0 text-center">
                                        <a href='../Profile' class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to Home</a>
                                        <a href='Resend' class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i>Resend Email</a>

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
        
    </body>
</html>
