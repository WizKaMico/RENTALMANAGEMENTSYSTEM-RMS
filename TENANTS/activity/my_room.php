<?php 

$code = $_GET['house_code'];

$result=mysqli_query($conn, "SELECT * FROM users WHERE assigned_to='$code'")or die('Error In Session');
$row=mysqli_fetch_array($result);

$resultS=mysqli_query($conn, "SELECT * FROM house WHERE house_code='$code'")or die('Error In Session');
$crow=mysqli_fetch_array($resultS);
?>

<section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?php if($row['status'] == 'UNVERIFIED'){ ?>APPLYING <?php } else { ?> OCCUPIER <?php } ?> - TENANT</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="basicInput">Fullname</label>
                                        <input type="text" class="form-control" id="basicInput"
                                            value="<?php echo $row['fullname'] ?>" readonly="" >
                                    </div>

                                    <div class="form-group">
                                        <label for="helpInputTop">Email</label>
                                       <input type="text" class="form-control" id="basicInput"
                                            value="<?php echo $row['email'] ?>" readonly="" >
                                    </div>


                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="helpInputTop">Phone</label>
                                       <input type="text" class="form-control" id="basicInput"
                                            value="<?php echo $row['phone'] ?>" readonly="" >
                                    </div>
                                </div>
                                  <div class="col-md-12">
                                    <div class="form-group">
                                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#mymap" > FIND MY MAP
                                    </button>  


                                          <!--Basic Modal -->
                                    <div class="modal fade text-left" id="mymap" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">MY ROUTE TO APARTMENT</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                    
                                                   <iframe src="activity/map/index.php?mycity=<?php echo $city; echo ','; echo $region; ?>&houseloc=<?php echo $crow['province']; echo ','; echo $crow['city'] ?>" style="width:100%; height:500px;"></iframe>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>  


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">HOUSE DETAILS</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">House Name</label>
                                        <input type="text" class="form-control" id="basicInput"
                                            value="<?php echo $crow['house_name'] ?>" readonly="">
                                    </div>

                                    


                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="helpInputTop">Monthly Rent</label>
                                       <input type="text" class="form-control" id="basicInput"
                                            value="₱ <?php echo $crow['monthly_rent'] ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>

                          
                    </div>
                </section>




       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>CODE</th>
                                        <th>BILLER</th>
                                        <th>PAY</th>
                                        <th>CYCLE START</th>
                                        <th>NEXT BILL</th>
                                        <th>REMAINING</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM `biller` WHERE house_code = '".$code."' AND user_id = '".$row['user_id']."'") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['house_code']; ?></td>
                                        <td><?php echo $fetch['bill']; ?></td>
                                        <td>₱ <?php echo $fetch['pay']; ?></td>
                                        <td><?php echo date("M jS, Y", strtotime($fetch['month_cycle'])); ?></td>
                                        <td>
                                        <?php 

                                        $time = strtotime($fetch['month_cycle']);
                                        $final = date("Y-m-d", strtotime("+1 month", $time));
                                        
                                        echo date("M jS, Y", strtotime($final));
                                        ?>
                                        </td>
                                        <td>
                                        <?php
                                        
                                        $now = time(); // or your date as well
                                        $your_date = strtotime($final);
                                        $datediff = $now - $your_date;

                                        echo round($datediff / (60 * 60 * 24)); echo ' '; echo 'days remaining';
                                        
                                        ?>    
                                        </td>
                                        <td> 
                                        <?php if($fetch['status'] == 'FOR PAYMENT'){ ?> 
                                         <span class="badge" style="background:red;" ><?php echo $fetch['status']; ?></span>

                                         <?php } else { ?>
                                          <span class="badge" style="background:green;" ><?php echo $fetch['status']; ?></span>  
                                         <?php } ?>   
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#viewme<?php echo $fetch['id']; ?>">
                                        VIEW IMAGE
                                    </button>  

                                        <?php 

                                        $resultz=mysqli_query($conn, "SELECT * FROM pay_cash WHERE pay_id='".$fetch['id']."'")or die('Error In Session');
                                         $prow=mysqli_fetch_array($resultz);

                                        ?>

                                        <?php if(!empty($prow['id']) && $prow['status'] != 'ACCEPT'){ ?>

                                         <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" style="background-color:red; color:black;"
                                        data-bs-target="#pending<?php echo $prow['id']; ?>">
                                        PENDING APPROVAL
                                    </button>     

                                       <!--Basic Modal -->
                                    <div class="modal fade text-left" id="pending<?php echo $prow['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">PENDING PAYMENT</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  
                                                  <img src="../ADMIN/activity/<?php echo $fetch['photo']; ?>">  

                                                 <h5 align="center">PAYMENT VIA : <?php echo $prow['payment']; ?></h5>
                                                 <h5 align="center">GIVEN DATE : <?php echo $prow['date_created']; ?></h5>
                                                   


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <?php }else if(!empty($prow['id']) && $prow['status'] == 'ACCEPT'){ ?> 

                                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" style="background-color:green; color:white;"
                                        data-bs-target="#pending<?php echo $prow['id']; ?>">
                                        PAYMENT APPROVED
                                    </button>        

                                        <?php }else{ ?>    

                                       <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#payme<?php echo $fetch['id']; ?>">
                                        PAY ONLINE
                                    </button>  

                                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#paycash<?php echo $fetch['id']; ?>">
                                        PAY CASH
                                    </button>  

                                <?php } ?>


                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="paycash<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">UPLOAD BILLING</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                
                                                     <form class="form form-horizontal" method="POST" action="activity/add_cash.php" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="house_code" class="form-control"
                                                                   value="<?php echo $_GET['house_code']; ?>" id="first-name-icon" readonly="">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    
                                                      <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <?php date_default_timezone_set('Asia/Manila'); ?>
                                                                <input type="hidden" name="date_created" class="form-control"
                                                                  value="<?php echo date('Y-m-d'); ?>" id="first-name-icon" readonly="">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>


                                                      <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                               
                                                                <select class="form-control" name="payment">
                                                                    <option value="CASH">CASH</option>
                                                                    
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                  
                                             

                                                      <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="hidden" name="user_id" class="form-control"
                                                                  value="<?php echo $row['user_id']; ?>" id="first-name-icon" readonly="">

                                                                  <input type="hidden" name="pay_id" class="form-control"
                                                                  value="<?php echo $fetch['id']; ?>" id="first-name-icon" readonly="">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">

                                                    <input type="file" class="form-control" name="photo" required="required"/>

                                                     <input type="hidden" class="form-control" name="status" value="PENDING" required="required"/>

                                                       </div>
                                                        </div>
                                                    </div>

                                             
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">ADD PAYMENT</button>
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                                

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="payme<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">UPLOAD BILLING</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                              


                                                <iframe src="PAYPAL/?id=<?php echo $fetch['id']; ?>&pay=<?php echo $fetch['pay']; ?>" style="width:100%; height:500px; border:none;"></iframe>        

                                       

                                         


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="viewme<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">UPLOAD BILLING</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/add_billing.php" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                   <img src="../ADMIN/activity/<?php echo $fetch['photo']; ?>" width="100%;">


                                                     <a href="../ADMIN/activity/<?php echo $fetch['photo']; ?>" class="form-control">DOWNLOAD A COPY</a>

                                                </div>
                                            </div>
                                        </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                        </td>   
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>


