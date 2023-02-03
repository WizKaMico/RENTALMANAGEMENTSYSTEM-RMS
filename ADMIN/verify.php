<?php 

include '../CONNECTION/conn.php';

$email = $_GET['email'];

if(empty($email)){

header("location: index.php");

}else{

$result=mysqli_query($conn, "SELECT * FROM admin WHERE email= '".$email."'")or die('Error In Session');
$row=mysqli_fetch_array($result);

if($row['status'] == 'VERIFIED'){

header("location: index.php");

}else{


?> 



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>MICODE LOGIN</title>
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
<body oncontextmenu="return false;">
<!-- partial:index.partial.html -->
<!-- NOTE : for useing nice seo, document file should have the HEADING-1 element -->
<!-- <h1 class="visible-hidden">SAMAK | Login and Signin Form</h1> -->

<section class="samak samak--half-round samak--rtl">
  <input type="checkbox" class="samak__checkbox" name="samak-side-controller" id="samak-side-controller" checked />
  <!-- MARK : [LOGIN-SIDE] -->
  <section class="samak__side samak__side--login">
    <section class="login__header">
      <h2 class="login__title">MICODE PH</h2>
      <span class="login__desc">Hi!  <?php echo strtoupper($row['email']); ?></span>
    </section>
    <form class="login__form" method="POST" action="#">
      <fieldset class="login__fields login__fields--input">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with manual login -->
        </legend>
        <?php if(empty($row['fullname']) || empty($row['gender']) || empty($row['birthday'])){ ?>
       
           <label for="samak-side-controller" class="login__btn login__btn--register" role="button" style="text-align:center;">
          COMPLETE PROFILE
        </label>   


        <?php } else { ?> 
      
         <label class="login__field login__field--username">
          <input class="login__input" placeholder="4-DIGIT CODE" type="number" name="code" required="" />
          <input class="login__input" type="hidden" name="rcode" value="<?php echo $row['code']; ?>" />
           <input class="login__input" type="hidden" name="email" value="<?php echo $row['email']; ?>" />
            <input class="login__input" type="hidden" name="id" value="<?php echo $row['user_id']; ?>" />
        </label>  

        <button type="submit" name="verify" class="login__btn login__btn--login">
          <strong>VERIFY</strong>
        </button>
      <?php } ?>
      </fieldset>
       
       <?php 

       if(isset($_POST['verify'])){
       
          $code = $_POST['code'];
          $rcode = $_POST['rcode'];  
          $email = $_POST['email']; 
          $status = 'VERIFIED';
          date_default_timezone_set('Asia/Manila');
          $date_verified = date('Y-m-d'); 
          $id = $_POST['id'];
          if($code == $rcode){
            
            mysqli_query($conn,"UPDATE admin SET status='$status', date_verified = '$date_verified' WHERE user_id='$id'");   
            header('location: index.php');


          
          }else{

            $newURL = '../verify.php?email='.$email.'';
            header('Location: '.$newURL); 


          } 

       }

       ?>
   
    </form>
    <form class="login__form" method="POST" action="verify/send_sms_verification.php" style="margin-top:15px;">
    <label class="login__field login__field--username">
          <input class="login__input" value="<?php echo $row['phone']; ?>"  type="hidden" name="phone" />
          <input class="login__input" value="<?php echo $row['code']; ?>"  type="hidden" name="code" />

          <input class="login__input" value="<?php echo $row['email']; ?>"  type="hidden" name="email" />

        <button type="submit" name="send" class="login__btn login__btn--login">
          <strong>SEND CODE VIA SMS</strong>
        </button>
        </label>
    </form> 
    <!-- SEND EMAIL START -->
    <form class="login__form" method="POST" action="verify/send_another.php" style="margin-top:-20px;">
       <label class="login__field login__field--username">
          <input class="login__input" value="<?php echo $row['email']; ?>"  type="hidden" name="email" />
          <input class="login__input" value="<?php echo $row['code']; ?>"  type="hidden" name="code" />

        <button type="submit" name="send" class="login__btn login__btn--login">
          <strong>SEND CODE VIA EMAIL</strong>
        </button>
        </label>

           <section class="login__seprator">
        <span class="login__seprate login__seprate--left"></span>
        <span class="login__seprate_text">OR</span>
        <span class="login__seprate login__seprate--right"></span>
      </section>

      <fieldset class="login__fields login__fields--more">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with forgot password -->
        </legend>
        
        <a href="index.php" class="login__btn login__btn--forgot" style="text-decoration:none; text-align:center">DONT PROCEED</a>

        <label for="samak-side-controller" class="login__btn login__btn--register" role="button" style="text-align:center;">
          COMPLETE PROFILE
        </label>
      </fieldset>
    </form>  
    <!-- SEND EMAIL END  -->
  </section>

  <!-- MARK : [SIGNIN-SIDE] -->
  <section class="samak__side samak__side--signin">
    <header class="signin__header">
      <h2 class="signin__title">MICODE PH</h2>
      <span class="signin__desc">
        Hi! <?php echo strtoupper($row['email']); ?>
      </span>
    </header>
    <form class="signin__form" method="POST" action="">
      <fieldset class="signin__fields signin__fields--input">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with manual login -->
        </legend>
        <label class="signin__field signin__field--username">
          <?php if(!empty($row['fullname'])){ ?>

             <input class="signin__input" value="<?php echo $row['fullname']; ?>" type="text" name="fullname" />
          <input class="signin__input" placeholder="FULLNAME" type="hidden" name="id" value="<?php echo $row['user_id']; ?>" />
           <input class="signin__input" placeholder="FULLNAME" type="hidden" name="email" value="<?php echo $row['email']; ?>" />
        </label>
         
         <label class="signin__field signin__field--username">
          <select class="signin__input" name="gender">
             <option value="<?php echo $row['gender']; ?>"><?php echo $row['gender']; ?></option>
             <option>GENDER</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
          </select>

        </label>
        <label class="signin__field signin__field--password">
          <input class="signin__input" type="date" name="birthday" value="<?php echo $row['birthday']; ?>" />
        </label>    


          <?php } else { ?>


            <input class="signin__input" placeholder="FULLNAME" type="text" name="fullname" />
          <input class="signin__input"  type="hidden" name="id" value="<?php echo $row['user_id']; ?>" />
           <input class="signin__input" type="hidden" name="email" value="<?php echo $row['email']; ?>" />
        </label>
         
         <label class="signin__field signin__field--username">
          <select class="signin__input" name="gender">
             <option>GENDER</option>
             <option value="Male">Male</option>
             <option value="Female">Female</option>
          </select>

        </label>
        <label class="signin__field signin__field--password">
          <input class="signin__input" type="date" name="birthday" />
        </label>    
          

        <button type="submit" name="complete" class="signin__btn signin__btn--signin">
          <strong>COMPLETE PROFILE</strong>
        </button>


          <?php } ?> 
       
      
      </fieldset>


      <fieldset class="signin__fields signin__fields--more">
        <legend class="visible-hidden">
          <!-- this make accessability of auth with forgot password -->
        </legend>
        <label for="samak-side-controller" class="signin__btn signin__btn--exist" role="button">
        Verify my account
        </label>
      </fieldset>
   
    </form>


          <?php 

         if(isset($_POST['complete'])){
       
          $fullname = $_POST['fullname'];
          $gender = $_POST['gender'];
          $birthday = $_POST['birthday'];
          $id = $_POST['id'];
          $email = $_POST['email'];
        
            
            mysqli_query($conn,"UPDATE admin SET fullname='$fullname', gender = '$gender', birthday = '$birthday' WHERE user_id='$id'");   
                 $newURL = '../verify.php?email='.$email.'';
            header('Location: '.$newURL); 



       }

       ?>
    
  </section>

  <figure class="samak__cover">
    <img src="../CONNECTION/generate.php?code=<?php echo $row['code']?>" alt="login-image"  />
    <figcaption class="samak__none">
      <!-- NOTHING -->
    </figcaption>
  </figure>
</section>
<section class="setting">

</section>
<!-- partial -->
  <script src='https://cdn.jsdelivr.net/gh/miko-github/miko-github@v1.1.0/codepen.js'></script><script  src="./script.js"></script>

</body>
</html>

<?php } } ?>