<?php
require 'db_config.php';

$email = $password = $Name = $Last_name = $confirm_pass ='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(empty(trim($_POST['Email']))){
      die("Please enter your email");
    } 
    else{
      $email = trim($_POST['Email']);
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

    if(empty(trim($_POST['Last_name']))){
        die("Please enter your Last name");
    } 
    else{
        $Last_name = trim($_POST['Last_name']);
    }
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    
    
        $sql = 'INSERT into volunteer_login (Name, Last_name, Password, Email) Values("$Name", "$Last_name", "$password", "$email")';
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['name'] = $_POST['Name'];
            $_SESSION['email'] = $rows['Email'];
            header('location: UserProfile.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    
    
}
?>