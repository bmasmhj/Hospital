<?php 
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['password']) ){
    header('Location: ../Profile'); 
}
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}
else{
    $email = '';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Log In </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Login system for hospital" name="description" />

        
        <!-- App css -->
        <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />

    </head>

    <body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
        <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-4 col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                                    <p class="text-muted mb-4">Enter your email address and password to login.</p>
                                    <div class='p-2' >
                                        <p id='alert'></p>
                                    </div>
                                </div>

                                <form method="POST" autocomplete="" id='login' >

                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">Email address / Username</label>
                                        <input class="form-control" type="email" id='loginemail' name="email" placeholder="Email Address" value="<?php echo $email ?>">
                                    </div>

                                    <div class="mb-3">
                                        <a href="ForgotPassword" class="text-muted float-end"><small>Forgot your password?</small></a>
                                        <label for="password" class="form-label">Password</label>
                                        <div class="input-group input-group-merge">
                                        <input class="form-control" type="password" name="password" id='loginpassword' placeholder="Password" >
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                            <label class="form-check-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="mb-3 mb-0 text-center">
                                        <button class="btn btn-primary" type="submit" name="login" value="Login"> Log In </button>
                                    </div>

                                </form>
                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="Register" class="text-muted ms-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- bundle -->
        <script src="../assets/js/jquery.min.js"></script>

        <script src="../assets/js/vendor.min.js"></script>

        <script src="../assets/js/app.min.js"></script>
        <script src= 'verify.js'>
              
            </script>
    </body>
</html>
