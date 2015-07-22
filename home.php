<?php

include_once 'db_connect.php';
include_once 'functions.php';

session_start();

if(isset($_SESSION['user_id'])) {
  header('Location: book.php');
  // echo '
  // <script>
  // if (confirm("You must log out to view this page") == true) {
  //   window.location = "book.php";
  // } else {
  //   window.location = "book.php";
  // }
  // </script>';
}

if (isset($_POST['login_submit'],
  $_POST['email'],
  $_POST['password'])) {
    //echo 'hello';
    $email = $_POST['email']; //name of input field in the form
    $password = $_POST['password']; //name of input field in the form
    
    if (login($email, $password, $mysqli) == true) {
        // Login success 
        //echo 'user logged in';
     
      header('Location: book.php');   
    } else {
        // Login failed 
      header('Location: home.php?login=failed');
    }
  }
  
  $register_error = "";
  
  if (isset($_POST['register_submit'],
    $_POST['first_name'],
    $_POST['last_name'],
    $_POST['phone'],
    $_POST['address'],
    $_POST['email'],
    $_POST['password'])) {
    
   $email = $_POST['email'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $password = $_POST['password'];
 $phone = $_POST['phone'];
 $address = $_POST['address'];

 
 $prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
 $stmt = $mysqli->prepare($prep_stmt);
 
 
   // check existing email  
 if ($stmt) {
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $stmt->store_result();
  
  if ($stmt->num_rows == 1) {
            // A user with this email address already exists
    $register_error .= '<p class="error">A user with this email address already exists.</p>';
    $stmt->close();
  }
  $stmt->close();
} else {
  $register_error .= '<p class="error">Database error</p>';
  $stmt->close();
}


    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.

if (empty($register_error)) {
 
        // Insert the new user into the database 
 
  $prep_stmt = "INSERT INTO users (id, email, password, first_name, last_name, phone, address) VALUES (NULL, ?, ?, ?, ?, ?, ?)";
  if ($insert_stmt = $mysqli->prepare($prep_stmt)) {
    $insert_stmt->bind_param('ssssss', $email, $password, $first_name, $last_name, $phone, $address);
            // Execute the prepared query.
    if (! $insert_stmt->execute()) {
                //header('Location: ../error.php?err=Registration failure: INSERT');
      echo 'Error, could not insert new user';
      echo $mysqli->error;
    }
    else {
      echo 'New user inserted';
      login($email, $password, $mysqli);
      header('Location: book.php');
    }
  }
}
}




?>










<!DOCTYPE html>
<html lang="en">
<head>
  <title>AirLines</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
  <script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
  <script type="text/javascript" src="js/cufon-yui.js"></script>
  <script type="text/javascript" src="js/cufon-replace.js"></script>
  <script type="text/javascript" src="js/Cabin_400.font.js"></script>
  <script type="text/javascript" src="js/tabs.js"></script>
  <script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
  <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
  <script type="text/javascript" src="js/atooltip.jquery.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.main, .tabs ul.nav a, .content, .button1, .box1, .top { behavior:url("../js/PIE.htc")}</style>
<![endif]-->
<style type="text/css">
#loginbtn:hover {
  color: blue;
}
</style>
</head>
<body id="page5">
  <div class="main">
    <!--header -->
    <header>
      <div class="wrapper" align="center">
        <h1><a href="book.php" id="logo">AirLines</a></h1>
        <span id="slogan" >Fast, Frequent &amp; Safe Flights</span>
      </div>
    </header>
    <!-- / header -->
    <!--content -->
    <section id="content">
      <div class="wrapper pad1">
        <article class="col1">
          <div class="box1">
            <h2 class="top">Login</h2>
            <div class="pad" style="padding: 20px;"> 
              <?php
              if(isset($_GET['login'])) {
                if($_GET['login'] == 'failed') {
                  echo 'Incorrect id or password';
                }
              }
              ?>
              <form name="form_1" action="home.php" method="post" accept-charset="utf-8">
                <ul>
                  <li><label for="usermail"><strong>Email</strong></label></li>
                  <li>
                    <input type="email" name="email" placeholder="yourname@email.com" required></li>
                    <li><label for="password"><strong>Password</strong></label></li>
                    <li>
                      <input type="password" name="password" placeholder="password" required></li>
                      <!-- <div class="wrapper"> <span class="right relative"><a href="book.php" class="button1"> -->
                      <!-- <input type="submit" value="Login"></a></span></li> -->
                      <div class="right relative"><button type="submit" name="login_submit" class="button1" id="loginbtn">Login</button></div> 
                      
                    </ul>
                  </form>
                </div>
              </div>
            </article>
            <article class="col2">
              <div class="box1">
                <h2 class="top">Sign Up</h2>
                <div class="pad" style="padding: 20px;"> 
                  <?php
                  if (!empty($register_error)) {
                    echo $register_error;
                  }
                  ?>
                  <form name="form_h" method="post" accept-charset="utf-8"> 
                    <!-- forms automatically submit to themselves, relying on it-->
                    <table style="margin-left: 20px; margin-right: 20px;">
                      <tr>
                        <td style="padding-left:20px;padding-right:20px;"><strong>First Name</strong></td>
                        <td style="padding-left:20px;padding-right:20px;">
                          <div class="row">
                            <input type="text" class="inp" name="first_name" required></div>
                          </td>
                        </tr>
                        <tr>
                          <td style="padding-left:20px;padding-right:20px;"><strong>Last Name</strong></td>
                          <td style="padding-left:20px;padding-right:20px;">
                            <div class="row">
                              <input type="text" class="inp" name="last_name" required></div>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-left:20px;padding-right:20px;"><strong>Phone Number</strong></td>
                            <td style="padding-left:20px;padding-right:20px;">
                              <div class="row">
                                <input type="tel" class="inp" name="phone" required></div>
                              </td>
                            </tr>
                            <tr>
                              <td style="padding-left:20px;padding-right:20px;"><strong>Address</strong></td>
                              <td style="padding-left:20px;padding-right:20px;">
                                <div class="row">
                                  <input type="text" class="inp" name="address" required></div>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-left:20px;padding-right:20px;"><strong>Email ID</strong></td>
                                <td style="padding-left:20px;padding-right:20px;">
                                  <div class="row">
                                    <input type="email" class="inp"  name="email" placeholder="yourname@email.com" required></div>
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding-left:20px;padding-right:20px;"><strong>Password</strong></td>
                                  <td style="padding-left:20px;padding-right:20px;">
                                    <div class="row">
                                      <input type="password"  class="inp" name="password" placeholder="password" required></div>
                                    </td>
                                  </tr>
                                </table>
                                <div class="right relative"><button type="submit" name="register_submit" class="button1" id="loginbtn">Register</button></div> 
                              </div>
                            </form>
                          </div>
                        </div>
                      </article>
                    </div>
                  </section>
                  <!--content end-->
                  <!--footer -->
                  <footer>
                    <?php include_once('footer.php'); ?>
                    </footer>
                    <!--footer end-->
                  </div>
                  <script type="text/javascript">Cufon.now();</script>
                </body>
                </html>
