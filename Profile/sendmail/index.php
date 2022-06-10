<?php 
if(isset($_GET['email'])){
$email = $_GET['email'];
$code = $_GET['code'];
$name = $_GET['name'];
}


if(isset($_GET['newacc'])){
    $template_file = "./verifyemail.php";
    $email_from = "noreply@hospital.com";
    $emailencode = base64_encode($email);
    $codencode = base64_encode($code);


    $swap_var = array(
        "{SITE_ADDR}" => "http://bimash.com.np/",
        "{EMAIL_LOGO}" => "Hospital",
        "{EMAIL_TITLE}" => "Thank you for registration on our site !",
        "{CUSTOM_URL}" => "http://localhost:8080/Profile/AccountVerification?usertoken=".$emailencode."&tokenid=".$codencode,
        "{CUSTOM_IMG}" => "Hospital",
        "{TO_NAME}" => $name,
            "{TO_EMAIL}" => "this_person@their_website.com"
        
    );  

    $email_headers = "From: ".$email_from."\r\n";
    $email_headers .= "MIME-Version: 1.0\r\n";
    $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $email_to = $email;
    $email_subject = $swap_var['{EMAIL_TITLE}']; 
    
    if (file_exists($template_file))
$email_message = file_get_contents($template_file);
else
die ("Unable to locate your template file");

foreach (array_keys($swap_var) as $key){
    if (strlen($key) > 2 && trim($swap_var[$key]) != '')
        $email_message = str_replace($key, $swap_var[$key], $email_message);
}

if ( mail($email_to, $email_subject, $email_message, $email_headers) ){ ?>
          <script> window.location.href = "http://localhost:8080/Profile/Verification"; </script> 
           <?php 
exit();
}


}
else if(isset($_GET['reset'])){
    $template_file = "./resetemail.php";
    $email_from = "noreply@hospital.com";
    $emailencode = base64_encode($email);
    $codencode = base64_encode($code);


    $swap_var = array(
        "{SITE_ADDR}" => "http://bimash.com.np/",
        "{EMAIL_LOGO}" => "Hospital",
        "{EMAIL_TITLE}" => "Reset code",
        "{CUSTOM_URL}" => "http://localhost:8080/Profile/AccountVerification?usertoken=".$emailencode."&tokenid=".$codencode,
        "{CUSTOM_IMG}" => "Hospital",
        "{TO_NAME}" => $name,
            "{TO_EMAIL}" => "this_person@their_website.com"
        
    );  

    $email_headers = "From: ".$email_from."\r\n";
    $email_headers .= "MIME-Version: 1.0\r\n";
    $email_headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $email_to = $email;
    $email_subject = $swap_var['{EMAIL_TITLE}']; 
    
    if (file_exists($template_file))
$email_message = file_get_contents($template_file);
else
die ("Unable to locate your template file");

foreach (array_keys($swap_var) as $key){
    if (strlen($key) > 2 && trim($swap_var[$key]) != '')
        $email_message = str_replace($key, $swap_var[$key], $email_message);
}

if ( mail($email_to, $email_subject, $email_message, $email_headers) ){ ?>
          <script> window.location.href = "http://localhost:8080/Profile/Verification"; </script> 
           <?php 
exit();
}


}
?>
 