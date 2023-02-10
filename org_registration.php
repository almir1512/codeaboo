<?php
require 'db_config.php';

$password = $Name = $Location = $Description = $Phone_no = $Website = $confirm_pass ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['Location']))){
      die("Please enter your Location");
    } 
    else{
      $Location = trim($_POST['Location']);
    }
    
    if(empty(trim($_POST['Password']))){
        die("Please enter your password");
    } 
    else{
        $password = trim($_POST['Password']);
    }
    
    if(empty(trim($_POST['Name']))){
        die("Please enter your name");
    } 
    else{
        $Name = trim($_POST['Name']);
    }

    if(empty(trim($_POST['Description']))){
        die("Please enter the Description");
    } 
    else{
        $Description = trim($_POST['Description']);
    }


    if(empty(trim($_POST['Phone_no']))){
        die("Please confirm your Phone_no");
    } 
    else{
        $Phone_no = trim($_POST['Phone_no']);
    }

    if(empty(trim($_POST['Website']))){
        die("Please confirm your Website");
    } 
    else{
        $Website = trim($_POST['Website']);
    }

    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    
    
        $sql = "INSERT into org_login (Name, Password, Location, Description, Phone_no, Website) Values('$Name', '$password', '$Location', '$Description', '$Phone_no', '$Website')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_POST['Name'];
            header('location: org-profile.php');
          } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
}
?>