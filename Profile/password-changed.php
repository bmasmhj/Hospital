<?php require_once "controllerUserData.php"; ?>
<?php
if(isset($_SESSION['email'])){
    $email= 'for '.$_SESSION['email'];
}else{
    $email = '';    
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Password Changed</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                                    <h4 class="text-dark-50 text-center mt-4 fw-bold">Password Changed</h4>
                                    <p class="text-muted mb-4">
                                        Your password <?php echo $email ?> has been successfully changed !
                                    </p>
                                </div>

                                <form action="index.html">
                                    <div class="mb-0 text-center">
                                        <a class="btn btn-primary" href='Login'>Login Now</a>
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

        <script src="../assets/js/vendor.min.js"></script>
        <script src="../assets/js/app.min.js"></script>
        
    </body>
</html>
