<?php 
session_start(); 
include '../CONNECTION/conn.php';

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>RENTAL MANAGEMENT SYSTEM | RMS </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css'><link rel="stylesheet" href="./style.css">

</head>
<body style="background-image: url('../CONNECTION/background/background.PNG');  background-repeat: no-repeat;
  background-size: 100%;">
<!-- partial:index.partial.html -->
<!-- NOTE : for useing nice seo, document file should have the HEADING-1 element -->
<!-- <h1 class="visible-hidden">SAMAK | Login and Signin Form</h1> -->

<!-- <ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
 -->
<section class="samak samak--half-round samak--rtl">
  <input type="checkbox" class="samak__checkbox" name="samak-side-controller" id="samak-side-controller" checked />

  <!-- MARK : [LOGIN-SIDE] -->
  <section class="samak__side samak__side--login">
    <section class="login__header">

    </section>
     <form class="login__form" action="#" method="POST">
      <fieldset class="login__fields login__fields--input">
        <legend class="visible-hidden">
         
        </legend>
     
      </fieldset>




      <fieldset class="login__fields login__fields--more">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with forgot password -->
        </legend>
        <a href="#" name="login" class="login__btn login__btn--forgot" style="text-decoration:none;">
          Your account is blocked <?php echo $_GET['email']; ?>
        </a>

      </fieldset> 
     
    </form>





  </section>

  
  <!-- MARK : [SIGNIN-SIDE] -->
  <section class="samak__side samak__side--signin">
    <header class="signin__header">
    
    </header>
    
  </section>


  <figure class="samak__cover">
    <img src="https://i.pinimg.com/564x/c3/34/e3/c334e3014be8b52e0845b57a304a85f9.jpg" alt="login-image" class="samak__image" />
    <figcaption class="samak__none">
      <!-- NOTHING -->
    </figcaption>
  </figure>
</section>
<section class="setting">
  <img src="../CONNECTION/background/logo.PNG">
  <h1 style="color:#056367;">RENTAL MANAGEMENT SYSTEM</h1>
</section>
<!-- partial -->
  <script src='https://cdn.jsdelivr.net/gh/miko-github/miko-github@v1.1.0/codepen.js'></script><script  src="./script.js"></script>

</body>
</html>


<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>