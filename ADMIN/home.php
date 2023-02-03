<?php 

include '../CONNECTION/conn.php';
include 'session.php'; 

$result=mysqli_query($conn, "SELECT * FROM admin WHERE user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);




?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RMS | RENTAL MANAGEMENT SYSTEM</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
     <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
      <link rel="stylesheet" href="assets/vendors/summernote/summernote-lite.min.css">
      <script src="city.js"></script>   

<script>    
window.onload = function() {    

    // ---------------
    // basic usage
    // ---------------
    var $ = new City();
    $.showProvinces("#province");
    $.showCities("#city");

    // ------------------
    // additional methods 
    // -------------------

    // will return all provinces 
    console.log($.getProvinces());
    
    // will return all cities 
    console.log($.getAllCities());
    
    // will return all cities under specific province (e.g Batangas)
    console.log($.getCities("Batangas"));   
    
}
</script>



</head>

<body style="background-image: url('../CONNECTION/background/background.PNG');  background-repeat: no-repeat;
  background-size: 100%;">
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                           <center><img src="../CONNECTION/background/logo.PNG" style="width:150px; height:150px;"></center>

                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item  ">
                            <a href="home.php?category=analytics" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>RMS</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="home.php?category=room">ADD ROOM</a>

                                </li>
                                 <li class="submenu-item ">
                                    <a href="home.php?category=admin">ADD ADMIN</a>

                                </li>
                                  <li class="submenu-item ">
                                    <a href="home.php?category=history">HISTORY</a>

                                </li>
                                <li class="submenu-item ">
                                    <a href="home.php?category=archive">ARCHIVE</a>

                                </li> 
                               <!--  <li class="submenu-item ">
                                    <a href="home.php?category=guideline">GUIDELINES</a>

                                </li>  -->

                                 <li class="submenu-item ">
                                    <a href="home.php?category=attachment">ATTACHMENT</a>

                                </li> 
                               
                            </ul>
                        </li>

                         <a href="logout.php" class="btn btn-primary
                     block" style="background-color:#056367; width:100%; margin-top:15px; font-size: 20px;">
                <i class="bi bi-arrow-right-square-fill"></i> <span>LOGOUT</span>
                    </a>  

                     

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Hi! Landlord <?php echo $row['fullname']; ?></h3>
                            <?php date_default_timezone_set('Asia/Manila'); ?>
                            <p class="text-subtitle text-muted"><?php echo date('F d Y', strtotime(date('Y-m-d'))); ?></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">HOME</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php echo strtoupper($_GET['category']); ?></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        
                      
                            
                     
                            
                         <?php  if($_GET['category'] == 'analytics'){ ?>  

                         <?php include 'activity/analytics.php'; ?>

                         <?php } else if($_GET['category'] == 'room'){ ?>   
            
                          <?php include 'activity/room.php'; ?>                          

                        <?php } else if($_GET['category'] == 'tenant'){ ?>   
            
                          <?php include 'activity/tenant_info.php'; ?>


                        <?php } else if($_GET['category'] == 'archive'){ ?>   
            
                          <?php include 'activity/archive.php'; ?>

                           <?php } else if($_GET['category'] == 'guideline'){ ?>   
            
                          <?php include 'activity/guideline.php'; ?>

                           <?php } else if($_GET['category'] == 'admin'){ ?>   
            
                          <?php include 'activity/admin.php'; ?>

                        <?php } else if($_GET['category'] == 'attachment'){ ?>   
            
                          <?php include 'activity/attachment.php'; ?>                          
                        <?php } else if($_GET['category'] == 'history'){ ?>   
            
                          <?php include 'activity/history.php'; ?>   
                           <?php } else if($_GET['category'] == 'tenant_history'){ ?>   
            
                          <?php include 'activity/history_of_tenant.php'; ?>  

                                <?php } else if($_GET['category'] == 'transaction'){ ?>   
            
                          <?php include 'activity/list_transaction.php'; ?>                                  
                                

                          <?php } else { ?>
                            
                             

                          <?php } ?>
                          

                        
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy;  RENTAL MANAGEMENT SYSTEM </p>
                    </div>
                    <div class="float-end">
                        <p>Crafted by RMS THESIS GROUP</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>

    <script src="assets/js/main.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD61CGRsenVDXkRMrBzxQnVTtL7EZz0k_c&callback=initMap" async defer></script>
    <script src="assets/vendors/jquery/jquery.min.js"></script>
    <script src="assets/vendors/summernote/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 100,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

    </script>
</body>

</html>