<?php 
include '../CONNECTION/conn.php';



if(!empty($_GET['email'])){

$email = $_GET['email'];

$result=mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$securityemail=mysqli_query($conn, "SELECT * FROM security_attemp_email WHERE status = 'UNUSED' AND email='".$row['email']."'")or die('Error In Session');
$smrow=mysqli_fetch_array($securityemail);

}else if(!empty(isset($_POST['login']))){

$email = $_POST['email'];

$result=mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'")or die('Error In Session');
$row=mysqli_fetch_array($result);  

$securityemail=mysqli_query($conn, "SELECT * FROM security_attemp_email WHERE status = 'UNUSED' AND email='".$row['email']."'")or die('Error In Session');
$smrow=mysqli_fetch_array($securityemail);


} else {
  header("Location: forgot.php?message=".$email);

}





 ?>





<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>RENTAL MANAGEMENT SYSTEM</title>
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
      <h2 class="login__title">RMS [FORGOT PASS]</h2>
      <span class="login__desc">Hi!  <?php echo strtoupper($row['email']); ?></span>
    </section>
    <form class="login__form" method="POST" action="#">
      <fieldset class="login__fields login__fields--input">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with manual login -->
        </legend>
        
      
         <label class="login__field login__field--username">
          <input class="login__input" placeholder="4-DIGIT CODE" type="number" name="code" required =""/>
           
        </label>  

        <label class="login__field login__field--username">
          <input class="login__input" placeholder="New Password" type="text" name="new_password" required="" />
          <input class="login__input" placeholder="New Password" type="hidden" name="email" value="<?php echo $row['email']; ?>" />
           
        </label>  


        <button type="submit" name="verify" class="login__btn login__btn--login" style="background-color:#056367;">
          <strong>VERIFY</strong>
        </button>
   
      </fieldset>
       
       
   
    </form>


     <?php 

       if(isset($_POST['verify'])){
       
          $code = $_POST['code'];
          $status = 'USED';
          $email = $_POST['email'];
          $new_password = md5($_POST['new_password']);
          
          if($code == $smrow['code']){
            
            mysqli_query($conn,"UPDATE security_attemp_email SET status='$status' WHERE email='$email'"); 
              mysqli_query($conn,"UPDATE users SET password='$new_password' WHERE email='$email'");    
            header('location: index.php');



          
          }else{

            header('Location: re_enter.php?email='.$email); 


          } 

       }

       ?>
    
      <!-- SEND EMAIL START -->
    <form class="login__form" method="POST" action="verify/send_forgot_email.php" style="margin-top:20px;">
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
    <img src="../CONNECTION/generate.php?code=<?php echo $row['code']?>" alt="login-image"  />
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

