<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: UserProfile.php");
    exit;
}

require 'db_config.php';

$email = $password = '';

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
    
    $sql = 'SELECT Id, Name, Last_name, Password FROM volunteer_login WHERE Email = "$email"';
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);
    if (mysqli_num_rows($result) === 1){
        if ($password === $rows['Password']){
            echo "Login Successful!";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $rows['Id'];
            $_SESSION['email'] = $rows['Email'];
            header('location: UserProfile.php');
        }
        else{
            echo "Wrong Password";
        }
    }
    else if (mysqli_num_rows($result) === 0){
        echo "User does not exist";
    }
    else{
        echo "Something went wrong, please try again later";
    }
}
?>