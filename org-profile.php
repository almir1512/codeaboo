<!doctype html>
<html lang="en">
  <head>
    <title>Organizer Profile</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">    
    <link rel="shortcut icon" href="VClogo.png">  
    <!-- FontAwesome JS-->
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    
    <!-- Global CSS -->
     <link href="css/myvals.min.css" rel="stylesheet">
    <!-- Plugins CSS -->    
    <link rel="stylesheet" href="assets/plugins/prism/prism.css">
    <style>
        .parallax {
          /* The image used */
          background-image: url("pexels-pixabay-45842.jpg");
          
          /* Set a specific height */
          min-height: 500px; 
        
          /* Create the parallax scrolling effect */
          background-attachment: fixed;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
        }
    </style>
</head> 
  <body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
   
    <!-- Navbar --> 
    <header id="header " class="header">                          
        <nav id="main-nav" class="main-nav navbar navbar-expand-md bg-primary ">
            <div class="container-fluid text-white">
            <a class="navbar-brand logo scrollto" href="#promo">
                <span class="logo-title text-white">VolunteerConnect</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"  aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            </button><!--//nav-toggle-->
            </div>
        </nav><!--//main-nav-->
    </header>
  
  <div class="avatar1 parallax">
  <h1 style="position: absolute; top: 350px;left: 350px; color: beige;">We connect you with good volunteers to help<br>you with your good cause</h1> 
  </div >
  <div class="justify-content-center d-flex">
  <button class="bg-primary border-0 w-25 p-3 m-3 text-white rounded-2"><a class="text-white" href="newpost.html">Create Event</a></button>
  </div>
  <!--cards-->
  <div class="card-deck row">
    <h1>Your earlier events</h1>
        <?php
        include_once("connect.php");
        $sql = "SELECT id, Event_name, Event_location, Event_date, Event_organizer_name, Event_description, Volunteers_required, Volunteers_ready, Event_image FROM org_event_post";
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
        while( $record = mysqli_fetch_assoc($resultset) ) {
        ?>
        <div class="card hovercard p-5 w-50 border-0 shadow-sm">
            <div class="cardheader">               
                <div class="avatar">
                    <img alt="assume image here" src="<?php echo $record['Event_image']; ?>" style="width:180px">
                </div>
            </div>
            <div class="card-body info">
                <div class="title">
                    <h3 class="text-secondary"><?php echo $record['Event_name']; ?></h3>
                </div>
                <div class="desc"> <a target="_blank" href="<?php echo $record['Event_location']; ?>"></a></div>		
                <div class="desc"><?php echo $record['Event_description']; ?></div>	    
                <div class="desc">Date: <?php echo $record['Event_date']; ?></div>    
                <div class="desc">Organized by: <?php echo $record['Event_organizer_name']; ?></div>	  				
            </div>
            <div>
              Intrested users:
              <ul>
              <?php
              include_once("connect.php");
              $curr=$record['Event_name'];
              $sql = "SELECT user_name FROM interested_users where Event_name='$curr';";
              $resultset2 = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
              while( $record2 = mysqli_fetch_assoc($resultset2) ) {
              ?>
              <li><?php echo $record2['user_name']; ?></li>
                <?php } ?>
              </ul>
            </div>
        </div>
        
        <?php } 
        ?>
    
    </div>
  </body>
</html>