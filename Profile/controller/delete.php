<?php 

require_once '../../Controller/connection.php';
if(isset($_POST['deleteappoint'])){
    $id = $_POST['deleteappoint'];

    $update = "UPDATE `appointment` SET status='deleted' WHERE id = '$id' ";
    $save =  mysqli_query($con, $update);

    if($save){
        echo 'deleted';
     }else{
         echo 'fail';
         die("insert failed $con->error");
 
     }
}

else if(isset($_POST['deletebook'])){
    $id = $_POST['deletebook'];

    $update = "UPDATE `bookedpkg` SET status='deleted' WHERE id = '$id' ";
    $save =  mysqli_query($con, $update);

    if($save){
        echo 'deleted';
     }else{
         echo 'fail';
         die("insert failed $con->error");
 
     }
    
}

else if(isset($_POST['deleterecord'])){
    $id = $_POST['deleterecord'];

    $update = "UPDATE `records` SET status='deleted' WHERE id = '$id' ";
    $save =  mysqli_query($con, $update);

    if($save){
        echo 'deleted';
     }else{
         echo 'fail';
         die("insert failed $con->error");
 
     }
    
}


?>