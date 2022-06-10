<?php require_once "usercontroller.php"; 
        require 'controller/info-fetcher.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Hospital is good and awesome and nice" name="description">
   
    <link rel="shortcut icon" href="../assets/images/favicon.png">
    
    <link href="../assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="../assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="../assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="../assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <style>

        .rounded-circle{
                width: 150px!important;
                height : 150px!important;
                border: 4px solid rgb(26, 202, 193);
                display: inline-block;
                border-radius: 50%;
                background-size: cover;
                background-position: center;
        }
        .csp_section{
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
            line-height: 1.42857143;
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 14px;
            color: #222;
            -webkit-font-smoothing: antialiased;
            box-sizing: border-box;
            display: block;
            padding: 0;
            margin: 0 0 4px 0;
            float: left;
            width: 100%;
            margin-bottom: 50px;    
        }

.editpen{
    font-size: 23px!important;
}
.avatar-upload {
    position: relative;
    max-width: 200px;
    margin: 10px auto;
}
.avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
}
.avatar-upload .avatar-edit input {
    display: none;
}
.avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 12%);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 100%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgb(0 0 0 / 10%);
}
.avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 100%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
    </style>
</head>