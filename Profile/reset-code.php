<?php 

session_start();
require "../Controller/connection.php";


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
                                    <h4 class="text-dark-50 text-center mt-4 fw-bold">Password reset link is sent to your Email</h4>
                
                                    <p class="text-muted mb-4">
                                        Please check for an email from <strong>noreply@hospital.com</strong> and click on the included link to
                                        reset your password. <strong>Check your spam folder</strong>
                                    </p>
                                </div>

                                <form action="index.html">
                                    <div class="mb-0 text-center">
                                        <a href='../' class="btn btn-primary" type="submit"><i class="mdi mdi-home me-1"></i> Back to Home</a>
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
