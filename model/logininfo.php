<?php 


if(isset($_SESSION['email']) & isset($_SESSION['password'])){
$email = $_SESSION['email'];    
$password = $_SESSION['password'];

if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $name = $fetch_info['name'];
        $image = $fetch_info['image'];
        $address = $fetch_info['address'];
        $num = $fetch_info['phone'];
        $dob = $fetch_info['age'];
        $diff = date_diff(date_create($dob),$currentDate);
        $age = $diff->format('%y');
        $gender = $fetch_info['sex'];

    } ?> 
        <li class="dropdown notification-list">
        <a class="nav-link nav-link-main dropdown-toggle nav-user border-0 bg-white arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="account-user-avatar"> 
                <img src="assets/images/uploads/users/<?php echo $image ?>" alt="user-image" class="rounded-circle">
            </span>
            <span>
                <span class="account-user-name"><?php echo $name?></span>
                <span class="account-position"><?php echo $email ?></span>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
        
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome !</h6>
            </div>

        
            <a href="Profile" class="dropdown-item notify-item">
                <i class="mdi mdi-account-circle me-1"></i>
                <span>My Account</span>
            </a>

        
            <a href="Profile/Logout" class="dropdown-item notify-item">
                <i class="mdi mdi-logout me-1"></i>
                <span href='Profile/Logout'>Logout</span>
            </a>

        </div>
    </li>
    
    

<?php
}
}
else{ ?>
        <li class="dropdown notification-list">
        <a href='Profile' class="nav-link nav-link-main dropdown-toggle nav-user border-0 bg-white arrow-none me-0" >
            <button class="btn btn-rounded bg-light">Login / Signup</button>
            </a>

        </li> 
<?php }?>


