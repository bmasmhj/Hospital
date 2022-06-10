<?php 

require "Controller/connection.php";
$name = '';
$address = '';
$num = '';
$age = '';
$gender = '';
$email = '';


$websitesensetivedatasql = "SELECT  * FROM website ";
$websitesensetivedataresult = $con->query($websitesensetivedatasql);
$websitesensetivedatadata = [];
if ($websitesensetivedataresult->num_rows > 0) {
  while ($websitesensetivedatarow = $websitesensetivedataresult->fetch_assoc()) {
        $websitename = $websitesensetivedatarow['websitename'];
        $websitedescription = $websitesensetivedatarow['description'];
        $websitecontactnum= $websitesensetivedatarow['contact'];
        $websitecontact2= $websitesensetivedatarow['contact2'];
        $websiteemail = $websitesensetivedatarow['email'];
        $websiteemergencynum = $websitesensetivedatarow['emergencynum'];
        $websitemarquedata = $websitesensetivedatarow['marquedata'];
        $websitelocation = $websitesensetivedatarow['location'];
  }
} 



$currentDate = new DateTime(); ?>