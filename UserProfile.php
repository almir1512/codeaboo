<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
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
</head> 
<body>
    <!-- Navbar --> 
    <header id="header " class="header">                          
        <nav id="main-nav" class="main-nav navbar navbar-expand-md bg-primary ">
            <div class="container-fluid text-white">
            <a class="navbar-brand logo scrollto" href="#promo">
                <span class="logo-title text-white">VolunteerConnect</span>
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-collapse"  aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button><!--//nav-toggle-->
                       
            <div class="navbar-collapse collapse" id="navbar-collapse">
                <ul id="nav-menu" class="nav navbar-nav ms-md-auto text-white">
                    <li class="nav-item sr-only"><a class="nav-link scrollto text-white" href="#promo">Home</a></li>
                    <li class="nav-item"><a class="nav-link scrollto text-white" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link scrollto text-white" href="#features">Features</a></li>
                    <li class="nav-item"><a class="nav-link scrollto text-white" href="#docs">Docs</a></li>
                    <li class="nav-item"><a class="nav-link scrollto text-white" href="#license">License</a></li>                        
                    <li class="nav-item last"><a class="nav-link scrollto text-white" href="#contact">Contact</a></li>
                </ul><!--//nav-->
            </div><!--//navabr-collapse-->
            </div>
        </nav><!--//main-nav-->
    </header>
    <h1 class="p-3">Opportunities to volunteer near you</h1>
    <!--cards:-->
    <div class="card-deck row">
        <?php
        include_once("connect.php");
        $sql = "SELECT id, Event_name, Event_location, Event_date, Event_organizer_name, Event_description, Volunteers_required, Volunteers_ready, Event_image FROM org_event_post";
        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));			
        while( $record = mysqli_fetch_assoc($resultset) ) {
        ?>
        <div class="card hovercard p-5 w-50 border-0">
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
            <form class="" method="post">
                <button type=submit class="bg-primary text-white border-0 p-2 rounded-2">I'm intrested</button>
                <?php
                if(isset($_POST))
                {
                    $curr=$record['Event_name'];
                    $sql="Insert into interested_users (Event_name,user_name) values ('$curr','username')";
                    mysqli_query($conn, $sql);
                }
                ?>
            </form>
        </div>
        
        <?php } 
        ?>
    
    </div>
</body>