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
          <!-- this make accessability of auth with manual login -->
        </legend>
        <label class="login__field login__field--username">
          <input class="login__input" placeholder="username" type="text" name="user" required="" />
        </label>
        <label class="login__field login__field--password">
          <input class="login__input" type="password" placeholder="password" name="pass" required="" />
          <button type="button" class="login__trailing">
            <i class="fa fa-eye"></i>
          </button>
        </label>
          
        <label class="login__field login__field--password">  
          <img src="captcha.php"  style="width:100%; height:50px;">
          </label>

        <label class="login__field login__field--password">
          <input class="login__input" type="text" placeholder="Type Captcha" name="captcha" required=""/>
          
        </label>

         

        <button type="submit" name="login" class="login__btn login__btn--login" style="background-color: #056367;">
          <strong>Login</strong>
        </button>
      </fieldset>




      <fieldset class="login__fields login__fields--more">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with forgot password -->
        </legend>
        <a href="forgot.php" name="login" class="login__btn login__btn--forgot" style="text-decoration:none;">
        Forgot Password
        </a>

      </fieldset> 
     
    </form>




<?php
  if (isset($_POST['login']))
    {
      $username = mysqli_real_escape_string($conn, $_POST['user']);
      $password = mysqli_real_escape_string($conn, md5($_POST['pass']));
      $captcha = mysqli_real_escape_string($conn, $_POST['captcha']);
      date_default_timezone_set('Asia/Manila'); 
      $date = date('Y-m-d');
 
      $query    = mysqli_query($conn, "SELECT * FROM users WHERE  password='$password' and username='$username'");
      $row    = mysqli_fetch_array($query);

      $check    = mysqli_query($conn, "SELECT *,COUNT(id) as TOTAL FROM user_login_fail WHERE email = '$username'");
      $chow    = mysqli_fetch_array($check);
        

      $num_row  = mysqli_num_rows($query);
 
      if ($num_row > 0) 
        {     
         
          if($row['status'] == 'UNVERIFIED'){

              if($_SESSION['captcha'] == $captcha){
          
          header('location:verify.php?email='.$row['email']);

              }else{
                echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
                 mysqli_query($conn,"INSERT INTO user_login_fail (email, date_login) VALUES ('$username', '$date')");
              } 


          }else if($row['status'] == 'BLOCKED'){    

          header('location:blocked.php?email='.$username);    
          
          }else{
          
          $_SESSION['last_login_timestamp'] = time();  
          $_SESSION['user_id']=$row['user_id'];
          if($_SESSION['captcha'] == $captcha){
          header('location:security.php');  
           }else{
                
                echo "<center><label class='text-danger'>Invalid captcha!</label></center>";
                 mysqli_query($conn,"INSERT INTO user_login_fail (email, date_login) VALUES ('$username', '$date')"); 
              } 

          } 


 
        }
      else
        {

           if($chow['TOTAL'] >= 3){
            // echo "<center><label class='text-danger'>Block</label></center>"; 
             mysqli_query($conn,"UPDATE users SET status = 'BLOCKED' WHERE email = '$username'");
             header('location:blocked.php?email='.$username);    
            }else{
              
              echo "<center><label class='text-danger'>Invalid Username/Password</label></center>"; 
           mysqli_query($conn,"INSERT INTO user_login_fail (email, date_login) VALUES ('$username', '$date')");
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