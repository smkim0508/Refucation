<?php

session_start();

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>welcoming landing page</title>
	<meta name="generator" content="BBEdit 14.1" />
	 <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="./map.css" />
        <script src="./user_map.js"></script>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Refucation</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link rel="stylesheet" href="find.css">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      <script src="./map.js"></script>

</head>
<body class="welcome">
 <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="images/ref.png" alt="Refucation" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html"> Home  </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About Us</a>
                              </li>
                               <li class="nav-item">
                                 <a class="btn btn-secondary btn-lg active" href="logout.php" role="button" aria-pressed="true">Log Out</a>
                              </li>
                              <li class=" d_none get_btn">
                                 <a  href="#bottom">Connect with a teacher today</a>
                              </li>
                              
                           </ul>
                        </div>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!--- header end --->
      <div  class="space">
         <div class="container">
               
                  <div class="mapheader">
                     <h2>Here's your school's location</h2>
                  </div>
            
            
         </div>
         <div class="container"></div>
      </div>
      <!--The div element for the map -->
    <div id="map">
    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIBPyIdQYviNFNFpFOp2q3PfQTXhZYQSg&callback=initMap&v=weekly"
      async
    ></script>
    <div class="space">
      <div class="container">
               <div class="mapheader">
                  <h2>Find Students</h2>
               </div>
               <div class="row">
  <div class="column">
    <div class="card">

      <div class="container">
        <h2>Jane Doe</h2>
        <p class="title">4th Grade</p>
        <p>Student who is currently in Poland looking for classes in English and Mathematics</p>
        <p>jd@poland.org</p>
        <p><button class="button">Connnect</button></p>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">
     
      <div class="container">
        <h2>Devon Lai</h2>
        <p class="title">8th Grade</p>
        <p>Student displaced from original home in SouthEast looking to resume classes in Science and Math</p>
        <p>dl@pure.com</p>
        <p><button class="button">Connect</button></p>
      </div>
    </div>
  </div>
    <div class="column">
    <div class="card">
      
      <div class="container">
        <h2>Shyan Morre</h2>
        <p class="title">2nd grade</p>
        <p>Student looking for help resuming English classes and Math Classes</p>
        <p>shmor@student.ocm</p>
        <p><button class="button">Connect</button></p>
      </div>
    </div>
  </div>
  <!--- Bottom is for TEACHERS-->

               <div class="mapheader">
                  <h2>Find Teachers</h2>
               </div>
               <div class="column">
    <div class="card">
      <div class="container">
        <h2>DS</h2>
        <p class="title">Middle School Teacher from United States</p>
        <p>Expertise in Mathematics</p>
        <p>divsha23@bergen.org</p>
        <p><button class="button">Work with in Lessons</button></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>DL</h2>
        <p class="title">High School Science Teacher</p>
        <p>Expertise in Chemistry and Computer Science</p>
        <p>dl@tranquility.org</p>
        <p><button class="button">Work with in Lessons</button></p>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <div class="container">
        <h2>SK</h2>
        <p class="title">Elementary School Teacher working in the Humanities</p>
        <p>Resume lessons in Grammer, Cursive, or History</p>
        <p>sk@php.com</p>
        <p><button class="button">Work with in Lessonss</button></p>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="container"></div>
   </div>
      
</body>
</html>
