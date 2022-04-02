<?php

require_once "config.php";
require_once "session.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
   
   $fullname = trim($_POST['name']);
   $email = trim($_POST['email']);
   $password = trim($_POST['password']);
   $country = trim($_POST['country']); 
   $address = trim($_POST['address']); 
   $school = trim($_POST['school']); 
   $confirm_password = trim($_POST['confirm_password']);
   $password_hash = password_hash($password, PASSWORD_BCRYPT);

   if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
      $error = '';
   $query->bind_param('s', $email);
   $query->execute();
   $query->store_result();
      if ($query->num_rows > 0) {
         $error .= '<p class="error">The email address is already registered!</p>';
      } else {
         if (strlen($password) < 6) {
            $error .= '<p class="error">Password must have at least 6 characters</p>';
         }

         if (empty($confirm_password)) {
            $error .='<p class="error">Please enter confirm password.</p>';
         } else {
            if (empty($error) && (password != $confirm_password)) {
               $error .= '<p class="error">Password did not match.</p>';
            }
         }

         if (empty($error)) {
            $insertQuery = $db->prepare("INSERT INTO users (name, email, password, country, address, school)
            VALUES (?, ?, ?, ?, ?, ?);");
            $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
            $result = $insertQuery->execute();
            if ($result) {
               $error .= '<p class="success">Your registration was successful!</p>';
            } else {
               $error .= '<p class="error">Something went wrong!</p>';
            }
         }
      }
   }
   $query->close();
   $insertQuery->close();
   //Close DB connection
   mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

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
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body style="background-color: black">
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
                                 <a class="nav-link" href="signin.html">Sign Up today</a>
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
      </br>
      </br>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 style="color:white">Create an account</h2>
                    <p style="color:white">Create an account with Reducation</p>
                    <form action="welcome.html" method="post">
                        <div class="form-group">
                            <label style="color:white" >Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color:white" >Email Address</label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color:white" > School Name</label>
                            <input type="text" name="SchoolName" class="form-control" required>
                        </div>
                       <div class="form-group">
                            <label style="color:white">School Address</label>
                            <input type="text" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color:white" >Password</label>
                            <input type="text" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label style="color:white">Confirm Password</label>
                            <input type="text" name="submit" class="form-control" required>
                        </div>           
               <div class="form-group">
                 <a href="welcome.html"> <input type="submit" name="submit" class="btn btn-primary" value="Submit"> </a>
                        </div>
                        <p style="color:white">Already have an account? <a href="login.php" style="color:white" >Login here</a></p>
                        <p style="color:white">Are you a teacher? <a href="signint.html" style="color:white"> Click Here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </body>

</html>
