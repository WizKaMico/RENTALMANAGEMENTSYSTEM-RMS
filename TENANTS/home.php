<?php 

include '../CONNECTION/conn.php';
include 'session.php'; 

$result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

  $api_url = 'https://ipinfo.io/json?token=06013b989729d4';

                            // Read JSON file
                            $json_data = file_get_contents($api_url);

                            // Decode JSON data into PHP array
                            $response_data = json_decode($json_data);

                            $city = $response_data->city;
                            $region = $response_data->region;
                            $postal = $response_data->postal;
                            $ip = $response_data->ip;
                            $org = $response_data->org;
                            // $loc = $response_data->loc;
                            $rip =$response_data->loc;




?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RENTAL MANAGEMENT SYSTEM </title>

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

      <script src="https://www.paypal.com/sdk/js?client-id=AQn-FBXshx9d57vYxnzuB9xlT1KqXFhZTDKhXur-uK7fdv_tJWs4lx9AccIJEeJt1Hcig5UKg5P3pQ7_&currency=PHP"></script>
</head>

<body style="background-image: url('../CONNECTION/background/background.PNG');  background-repeat: no-repeat;
  background-size: 100%; height:auto;">
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
                                <span>Components</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="home.php?category=myroom&house_code=<?php echo $row['assigned_to']; ?>">My Room</a>

                                </li>
                                <li class="submenu-item ">
                                    <a href="home.php?category=attachment">Attachment</a>

                                </li>
                                <!-- <li class="submenu-item ">
                                    <a href="home.php?category=guidelines">Guidelines</a>

                                </li> -->
                                
                            </ul>
                        </li>

                      

                     <a href="logout.php?email=<?php echo $row['email']; ?>" class="btn btn-primary
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
                            <h3>Hi! Tenant <?php echo $row['fullname']; ?></h3>
                            <?php date_default_timezone_set('Asia/Manila'); ?> <?php echo strtoupper($city); echo strtoupper($region); ?>
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
                        
                      
                            
                          <?php if($_GET['category'] == 'analytics'){ ?>
                            
                           <?php  include 'activity/analytics.php'; ?>

                           

                          <?php } else if($_GET['category'] == 'myroom') { ?>
                            
                            
                           <?php  include 'activity/my_room.php'; ?>   


                              <?php } else if($_GET['category'] == 'guidelines') { ?>
                            
                            
                           <?php  include 'activity/my_guidelines.php'; ?> 

                            <?php } else if($_GET['category'] == 'attachment') { ?>
                            
                            
                           <?php  include 'activity/my_attach.php'; ?>                                  
                           
                          <?php } else { ?>


                           <?php } ?> 
                          

                        
                    </div>

                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2022 &copy;  RENTAL MANAGEMENT SYSTEM</p>
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