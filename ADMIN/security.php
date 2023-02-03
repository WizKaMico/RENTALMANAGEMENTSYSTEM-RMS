<?php 
include '../CONNECTION/conn.php';
include 'session.php'; 

$result=mysqli_query($conn, "SELECT * FROM admin WHERE user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);


$securityemail=mysqli_query($conn, "SELECT * FROM security_attemp_email WHERE status = 'UNUSED' AND email='".$row['email']."'")or die('Error In Session');
$smrow=mysqli_fetch_array($securityemail);

$securitysms=mysqli_query($conn, "SELECT * FROM security_attemp_sms WHERE status = 'UNUSED' AND email='".$row['email']."'")or die('Error In Session');
$ssrow=mysqli_fetch_array($securitysms);




 ?>


  <?php  

      if(isset($_SESSION["user_id"]))  
      {  
           if((time() - $_SESSION['last_login_timestamp']) > 60) // 900 = 15 * 60  
           {  
                header("location:logout.php");  
           }  
           else  
           {  
           
           }  
      }  
      else  
      {  
           header('location:login.php');  
      }  
      ?>  




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>RENTAL MANAGEMENT SYSTEM | RMS </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" /><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css'><link rel="stylesheet" href="./style.css">

<script>

    document.onkeydown = function (e) {
        if (event.keyCode == 123) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'I'.charCodeAt(0) || e.keyCode == 'i'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'C'.charCodeAt(0) || e.keyCode == 'c'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && e.shiftKey && (e.keyCode == 'J'.charCodeAt(0) || e.keyCode == 'j'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && (e.keyCode == 'U'.charCodeAt(0) || e.keyCode == 'u'.charCodeAt(0))) {
            return false;
        }
        if (e.ctrlKey && (e.keyCode == 'S'.charCodeAt(0) || e.keyCode == 's'.charCodeAt(0))) {
            return false;
        }
    }
</script>


</head>
<body oncontextmenu="return false;" style="background-image: url('../CONNECTION/background/background.PNG');  background-repeat: no-repeat;
  background-size: 100%;">
<!-- partial:index.partial.html -->
<!-- NOTE : for useing nice seo, document file should have the HEADING-1 element -->
<!-- <h1 class="visible-hidden">SAMAK | Login and Signin Form</h1> -->

<section class="samak samak--half-round samak--rtl">
  <input type="checkbox" class="samak__checkbox" name="samak-side-controller" id="samak-side-controller" checked />
  <!-- MARK : [LOGIN-SIDE] -->
  <section class="samak__side samak__side--login">
    <section class="login__header">
      <h2 class="login__title">RMS [SECURITY]</h2>
      <span class="login__desc">Hi!  <?php echo strtoupper($row['email']); ?></span>
    </section>
    <form class="login__form" method="POST" action="#">
      <fieldset class="login__fields login__fields--input">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with manual login -->
        </legend>
        
      
         <label class="login__field login__field--username">
          <input class="login__input" placeholder="4-DIGIT CODE" type="number" name="code" required="" />
           <input class="login__input" type="hidden" name="email" value="<?php echo $row['email']; ?>" />
            <input class="login__input" type="hidden" name="id" value="<?php echo $row['user_id']; ?>" />
        </label>  

        <button type="submit" name="verify" class="login__btn login__btn--login" style="background-color:#056367;">
          <strong>VERIFY</strong>
        </button>
   
      </fieldset>
       
       <?php 

       if(isset($_POST['verify'])){
       
          $code = $_POST['code'];
          $status = 'USED';
          $email = $_POST['email'];
          
          if($code == $smrow['code']){
            
            mysqli_query($conn,"UPDATE security_attemp_email SET status='$status' WHERE email='$email'");   
            include '../CONNECTION/landlord_view.php';
            header('location: home.php?category=analytics');



          
          }else if($code == $ssrow['code']){

           

            mysqli_query($conn,"UPDATE security_attemp_sms SET status='$status' WHERE email='$email'");   
             include '../CONNECTION/landlord_view.php';
            header('location: home.php?category=analytics');


          }else{

             $newURL = 'security.php';
            header('Location: '.$newURL); 


          } 

       }

       ?>
   
    </form>
    <form class="login__form" method="POST" action="verify/send_sms_security.php" style="margin-top:15px;">
    <label class="login__field login__field--username">
          <input class="login__input" value="<?php echo $row['phone']; ?>"  type="hidden" name="phone" />
          <?php 
         
          $code = rand(6666,9999);
          $status = 'UNUSED';
          ?>
          <input class="login__input" value="<?php echo $code; ?>"  type="hidden" name="code" />
           <input class="login__input" value="<?php echo $status; ?>"  type="hidden" name="status" />

          <input class="login__input" value="<?php echo $row['email']; ?>"  type="hidden" name="email" />

        <button type="submit" name="send" class="login__btn login__btn--login" style="background-color:#056367;">
          <strong>SEND CODE VIA SMS</strong>
        </button>
        </label>
    </form>  
    <!-- SEND EMAIL START -->
    <form class="login__form" method="POST" action="verify/send_security_email.php" style="margin-top:-1px;">
       <label class="login__field login__field--username">
          <input class="login__input" value="<?php echo $row['email']; ?>"  type="hidden" name="email" />
          <?php 
         
          $code = rand(6666,9999);
          $status = 'UNUSED';
          ?>
          <input class="login__input" value="<?php echo  $code; ?>"  type="hidden" name="code" />
          <input class="login__input" value="<?php echo $status; ?>"  type="hidden" name="status" />

        <button type="submit" name="send" class="login__btn login__btn--login" style="background-color:#056367;">
          <strong>SEND CODE VIA EMAIL</strong>
        </button>
        </label>

    <section class="login__seprator">
        <span class="login__seprate login__seprate--left"></span>
        <span class="login__seprate_text"> QR</span>
        <span class="login__seprate login__seprate--right"></span>
      </section>

      
    </form>  
    <!-- SEND EMAIL END  -->
  </section>

  <!-- MARK : [SIGNIN-SIDE] -->
  <section class="samak__side samak__side--signin">
    
    
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

