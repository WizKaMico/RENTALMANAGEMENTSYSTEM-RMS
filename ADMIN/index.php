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

<section class="samak samak--half-round samak--rtl">
  <input type="checkbox" class="samak__checkbox" name="samak-side-controller" id="samak-side-controller" checked />
  <!-- MARK : [LOGIN-SIDE] -->
  <section class="samak__side samak__side--login">
    <section class="login__header">

    </section>
     <form class="login__form" action="#" method="POST">
      <fieldset class="login__fields login__fields--input">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with manual login -->
        </legend>
        <label class="login__field login__field--username">
          <input class="login__input" placeholder="username" type="text" name="user" required="" />
        </label>
        <label class="login__field login__field--password">
          <input class="login__input" type="password" placeholder="password" name="pass"  required =""/>
          <button type="button" class="login__trailing">
            <i class="fa fa-eye"></i>
          </button>
        </label>
          
        <label class="login__field login__field--password">  
          <img src="captcha.php"  style="width:100%; height:50px;">
          </label>

        <label class="login__field login__field--password">
          <input class="login__input" type="text" placeholder="Type Captcha" name="captcha" required="" />
          
        </label>

         

        <button type="submit" name="login" class="login__btn login__btn--login">
          <strong>Login</strong>
        </button>
      </fieldset>




        
    </form>


     <?php
  if (isset($_POST['login']))
    {
      $username =  $_POST['user'];
      $password = $_POST['pass'];
      $captcha = $_POST['captcha'];
      
      $query    = mysqli_query($conn, "SELECT * FROM admin WHERE password='$password' and username='$username'");
      $row    = mysqli_fetch_array($query);
      
      
     
          if($row['status'] == 'UNVERIFIED'){

              if($_SESSION['captcha'] == $captcha){
          
          header('location:verify.php?email='.$row['email']);

              }else{
                echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
              } 
          
          }else{
          
          $_SESSION['last_login_timestamp'] = time();  
          $_SESSION['user_id']=$row['user_id'];
          if($_SESSION['captcha'] == $captcha){
          header('location:security.php');  
           }else{
                echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
              } 

          }

          
     
    }
  ?>


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
