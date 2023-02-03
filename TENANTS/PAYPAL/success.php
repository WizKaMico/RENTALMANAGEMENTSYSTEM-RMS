<?php 

include '../../CONNECTION/conn.php';
$id = $_GET['id'];
$result=mysqli_query($conn, "SELECT * FROM users LEFT JOIN biller ON users.user_id = biller.user_id WHERE biller.id='$id'");
$row=mysqli_fetch_array($result);
mysqli_query($conn,"UPDATE biller SET status = 'ACCEPT' WHERE id='$id'");  

 ?>   

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  

</head>
<body>
<!-- partial:index.partial.html -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<style>
    body {
        font-family: 'Helvetica Neue', Helvetica, "Segoe UI", Arial, sans-serif;
        font-size: 13px;
    }
</style>

<div class="container" style="margin-top: 40px;">
    <div class="row">
        <div class="col-md-6 col-xs-6">RENTAL MANAGEMENT SYSTEM</div>
        <?php date_default_timezone_set('Asia/Manila'); ?>
        <div class="col-md-6 col-xs-6" style="text-align: right;">Date : <?php echo date('Y-m-d'); ?></div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-7 col-xs-7" style="text-align: right;"> 
            <img style="width: 100px;height: 120px;"src="../../CONNECTION/background/logo.PNG" alt="" />
        </div>
        <div class="col-md-5 col-xs-5" style="text-align: right; padding-top: 20px;">
            <div style="font-size: 18px; font-weight: bold; padding-bottom: 6px;"><?php echo strtoupper($row['fullname']);  ?> </div>
            <div style="padding-bottom: 6px;"> Room : <?php echo strtoupper($row['assigned_to']); ?></div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div style="text-align: center; font-size: 30px; font-weight: 300; letter-spacing: 3;"> TRANSACTION RECEIPT </div>
        <div style="text-align: center; font-size: 16px; font-weight: 500; letter-spacing: 1;"><?php echo strtoupper($row['bill']); ?></div>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;"> RECEPIENT DETAILS </div>
        <table style="width: 100%; margin-top: 20px;">
            <thead style="letter-spacing: 1; font-weight: 300;">
                <tr>
                    <td style="padding: 10px 0;"> NAME </td> 
                    <td style="text-align: center;"> SORT CODE </td> 
                    <td style="text-align: right;"> ACCOUNT NUMBER </td>
                </tr>
            </thead>
            <tbody style="font-size: 22px;">
                <tr>
                    <td><?php echo strtoupper($row['fullname']);  ?> </td> 
                    <td style="text-align: center;"><?php echo strtoupper($row['month_cycle']);  ?> </td>
                    <td style="text-align: right;"> <?php echo strtoupper($row['code']);  ?>  </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="title-section" style="font-size: 16px; letter-spacing: 1; border-bottom: 2px #666666 solid; padding-bottom: 10px;"> TRANSACTION DETAILS </div>
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6 col-xs-6">
                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> DATE & HOUR </div>
                    <div style="font-size: 22px; "> <?php echo date('Y-m-d h:i:s'); ?> </div>
                </div>
                <div class="col-md-6 col-xs-6" style="text-align: right;">
                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> METHOD </div>
                    <div style="font-size: 22px;"> PAYPAL </div>
                </div>
                <hr>
            </div>
            <hr style="border-top: 1px solid #666666;">
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6 col-xs-6">
                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> TRANSACTION AMOUNT </div>
                    <div style="font-size: 22px;"> ₱ <?php echo strtoupper($row['pay']); ?></div>
                </div>
                <div class="col-md-6 col-xs-6" style="text-align: right;">
                    <div style="letter-spacing: 1; font-weight: 300; padding: 10px 0;"> FEES </div>
                    <div style="font-size: 22px;"> ₱ 0.00 </div>
                </div>
                <hr>
            </div>
            <hr style="border-top: 1px solid #666666;">
    </div>
</div>

<div class="container" style="margin-top: 50px; font-weight: 300;">
    <div class="col-md-12" style="text-align: center;">
        <div> The transaction shown on your recepit is correct at the time of downloading. </div>
        <div> If you think something is incorrect, please contact us on 000 00 000 </div>
    </div>
</div>
<!-- partial -->
  
</body>
</html>
