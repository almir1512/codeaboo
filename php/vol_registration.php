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

    if(empty(trim($_POST['confirm_pass']))){
        die("Please confirm your password");
    } 
    else{
        $confirm_pass = trim($_POST['confirm_pass']);
    }
    $sql = 'SELECT Id FROM volunteer_login WHERE Email = "$email"';
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) === 1){
        echo "Email already in use";
    }
    else if (mysqli_num_rows($result) === 0){
        $sql = 'INSERT into volunteer_login (Name, Last_name, Password, Email) Values("$Name", "$Last_name", "$password", "$email")';
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $rows['Id'];
            $_SESSION['email'] = $rows['Email'];
            header('location: UserProfile.php');
          } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    else{
        echo "Something went wrong, please try again later";
    }
}
?>