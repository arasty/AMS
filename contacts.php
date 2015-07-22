<!DOCTYPE html>
<html lang="en">
<head>
<title>AirLines | Contacts</title>
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
</head>
<body id="page6">
<div class="main">
  <!--header -->
  <?php 
  echo '<header>';  

  include_once 'header.php';
  
echo '<nav>
<ul id="menu">
<li><a href="book.php"><span><span>Book</span></span></a></li>
<li><a href="history.php"><span><span>History</span></span></a></li>
<li><a href="profile.php"><span><span>Profile</span></span></a></li>';


if($user['isadmin'] == 1) {
  echo '<li><a href="admin.php"><span><span>Admin</span></span></a></li>';
}


echo '<li class="end" id="menu_active"><a href="contacts.php"><span><span>Contacts</span></span></a></li>
</ul>
</nav>
</header>';
 ?>
  <!-- / header -->
  <!--content -->
  <section id="content">
    <div class="wrapper pad1">
      <article class="col1">
        <div class="box1">
          <h2 class="top">Contact Us</h2>
          <div class="pad">
            <div class="wrapper pad_bot1">
              <p class="cols pad_bot2"><strong>Name:<br>
                City:<br>
                Address:<br>
                Email:</strong></p>
              <p class="color1 pad_bot2">Divyansh Gupta<br>
                Kharagpur<br>
                IIT Kharagpur<br>
                <a href="#">divgupta95@gmail.com</a></p>
                <p><figure><img src="images/page1_img1.jpg" alt="" class="pad_bot2" width="100%";></figure></p>
            </div>
          </div>
          <div class="pad pad_bot1">
            <p class="pad_bot2">
              <p class="cols pad_bot2"><strong>Name:<br>
                City:<br>
                Address:<br>
                Email:</strong></p>
              <p class="color1 pad_bot2">Riya Bubna<br>
                Kharagpur<br>
                IIT Kharagpur<br>
                <a href="#">bubna.riya13@gmail.com</a></p>
                <p><figure><img src="images/page1_img2.jpg" alt="" class="pad_bot2" width="80%";></figure></p>
            </p>
          </div>
        </div>
      </article>
      <article class="col2">
        <h3 class="pad_top1">Contact Form</h3>
        <form id="ContactForm" action="#">
          <div>
            <div  class="wrapper"> <span>Name:</span>
              <input type="text" class="input" >
            </div>
            <div  class="wrapper"> <span>Email:</span>
              <input type="email" class="input" >
            </div>
            <div  class="textarea_box"> <span>Message:</span>
              <textarea name="textarea" cols="1" rows="1"></textarea>
            </div>
            <a href="#" class="button1"><strong>Send</strong></a> <a href="#" class="button1"><strong>Clear</strong></a> </div>
        </form>
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
