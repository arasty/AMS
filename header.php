<?php
include_once 'db_connect.php';
session_start(); 

///////////////// REMOVE THIS PART FOR TESTING without DB
if(!isset($_SESSION['user_id'])) {
  echo '
  <script>
  if (confirm("You must be logged in to view this page") == true) {
    window.location = "home.php";
  } else {
    window.location = "home.php";
  }
  </script>';
}

$res = $mysqli->query(sprintf('SELECT * FROM users WHERE id = %d', $_SESSION['user_id']));
$user = $res->fetch_array();
$res->close();
///////////////////

echo '<div class="wrapper">
<h1><a href="home.php" id="logo">AirLines</a></h1>
<span id="slogan">Fast, Frequent &amp; Safe Flights</span>
<nav id="top_nav">
<ul>
<li><a href="profile.php" class="nav2">Logged in as ';

///////////////// REMOVE THIS PART FOR TESTING
echo $user['first_name']. ' '.$user['last_name']. '</a></li>';
//RIYA FIX THE STYLE PLEASE
///////////////// REMOVE THIS PART FOR TESTING


echo '<li><a href="process_logout.php" class="nav1">Logout</a></li>
<li><a href="contacts.php" class="nav3">Contact</a></li>
</ul>
</nav>
</div>';


?>
