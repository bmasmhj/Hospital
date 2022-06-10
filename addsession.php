<?php if(isset($_POST['sessionalert'])){
    session_start();
    $_SESSION['alert'] = 'covidalert';
} ?>