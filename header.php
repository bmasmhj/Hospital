<!DOCTYPE html>
    <html lang="en">
<?php
    session_start();
 require 'Controller/declaration.php';
 require 'tracker.php';


?>

    <head>
        <meta charset="utf-8">
        <title><?php echo $websitename ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Hospital is good and awesome and nice" name="description">
        <meta content="Coderthemes" name="author">
        <link rel="shortcut icon" href="../Hospital/assets/images/favicon.png">
        
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/crosel.css">

        <link href="assets/css/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">

    </head>

    <body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": false}'>
        <!-- Begin page -->
        <div class="wrapper">
                    <!-- Topbar Start -->
                    <div class="navbar-custom topnav-navbar">
                        <div class="container-fluid">
                            
                            <!-- LOGO -->
                            <a href="" class="topnav-logo">
                                <h4 class="p-2 mt-2 topnav-logo-lg">
                                   <?php echo $websitename ?>
                                </h4>
                                <h4 class="p-2 mt-2  topnav-logo-sm">
                                   <?php echo $websitename ?>
                                </h4>
                            </a>
                            <ul class="list-unstyled topbar-menu float-end mb-0">

                                <li class="dropdown notification-list d-xl-none">
                                    <a class="nav-link nav-link-main dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="dripicons-search noti-icon"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                                    <form class="p-3" action='FindDoctor' method='post'>                       
                                        <input type="text" class="form-control" name='searchingdoctor' placeholder="Search..." id="tops-search">
                                        <div id="search-resultsqwe"></div>
                                    </form>
                        
                                    </div>
                                </li>
                                <?php require 'Controller/info-fetcher.php'; 
                                    foreach($socialmediadata as $key => $socialmediavaqaz ) {
                                ?>
                                <li class="notification-list d-none d-md-block">
                                    <a class="nav-link end-bar-toggle" target="_blank" href="<?php echo $socialmediavaqaz['url'] ?>">
                                        <i class="<?php echo $socialmediavaqaz['icon'] ?>"> </i>
                                    </a>
                                </li>
                                <?php } ?>
                              
                                <?php  require 'model/logininfo.php'; ?>
        
                            </ul>
                            <a class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                          <?php require 'model/searchbar.php' ?>
                        </div>
                    </div>

                    <marquee behavior="scroll" direction="">
                        <?php  for ($i=0; $i < 3 ; $i++) {  echo " Hospital is now open. We Create Miracles. To book an appointment, contact us (24x7) +977 1 5970032 <i class='mx-5'></i>"; } ?> </marquee>
                   <hr class="p-0 m-0">
                    <?php require 'model/topnavbar.php' ?>