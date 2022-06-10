<?php 

if(isset($_POST['spec_id'])){
    $spec_id = $_POST['spec_id'];
    
    require '../../Controller/connection.php';
    if ($con->connect_errno != 0) {
        die('Database connection error:' . $con->connect_error);
    }
    $sql = "SELECT * FROM doctor where specialityid = '$spec_id' ORDER BY name";
    $result = $con->query($sql);
    $html = "<option value=''>Select Doctor</option>";
    if ($result->num_rows > 0) {
        while($city = $result->fetch_assoc()){
            $html .=  "<option value='" . $city['name'] . "'>$city[name]</option>";
        }   
    }
    echo $html;
    }
    
?>