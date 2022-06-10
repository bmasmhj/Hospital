<?php 
$email = $_SESSION['email'];

$appointmentsql = "SELECT  * FROM appointment WHERE email = '$email' ";
$appointmentresult = $con->query($appointmentsql);
$appointmentdata = [];
if ($appointmentresult->num_rows > 0) {
  while ($appointmentrow = $appointmentresult->fetch_assoc()) {
      array_push($appointmentdata, $appointmentrow);
      }
  }   

$bookedpkgsql = "SELECT  * FROM bookedpkg WHERE email = '$email'  ";
$bookedpkgresult = $con->query($bookedpkgsql);
$bookedpkgdata = [];
if ($bookedpkgresult->num_rows > 0) {
while ($bookedpkgrow = $bookedpkgresult->fetch_assoc()) {
    array_push($bookedpkgdata, $bookedpkgrow);
    }
}  

$recordssql = "SELECT  * FROM records WHERE emai = '$email'  ";
$recordsresult = $con->query($recordssql);
$recordsdata = [];
if ($recordsresult->num_rows > 0) {
while ($recordsrow = $recordsresult->fetch_assoc()) {
    array_push($recordsdata, $recordsrow);
    }
}  

?>