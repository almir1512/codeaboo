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

    if(empty(trim($_POST['confirm_pass']))){
        die("Please confirm your password");
    } 
    else{
        $confirm_pass = trim($_POST['confirm_pass']);
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

    $sql = 'SELECT Id FROM org_login WHERE Name = "$Name" OR Phone_no = $Phone_no';
    $conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($result);

    if (mysqli_num_rows($result) === 1){
        echo "Organization already has an account registered";
    }
    else if (mysqli_num_rows($result) === 0){
        $sql = 'INSERT into org_login (Name, Password, Location, Description, Phone_no, Website) Values("$Name", $password "$Location", "$Description", "$Phone_no, $Website")';
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $rows['Id'];
            header('location: org-profile.php');
          } 
        else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          }
    }
    else{
        echo "Something went wrong, please try again later";
    }
}
?>