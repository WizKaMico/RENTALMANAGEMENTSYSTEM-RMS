<?php 

$code = $_GET['house_code'];

$result=mysqli_query($conn, "SELECT * FROM users WHERE assigned_to='$code' AND status != 'ARCHIVE'")or die('Error In Session');
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


                                  <div class="card-header">
                              <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#default">
                                        UPLOAD BILLING
                                    </button>

                                      <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
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
                                                               
                                                                <select class="form-control" name="bill">
                                                                    <option value="Maynilad">Maynila</option>
                                                                    <option value="Meralco">Meralco</option>
                                                                    <option value="Rental">House Rental</option>
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
                        
                                                                <input type="date" name="month_cycle" class="form-control" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="number" name="pay" placeholder="Amount" class="form-control" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                             

                                                      <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="hidden" name="user_id" class="form-control"
                                                                  value="<?php echo $row['user_id']; ?>" id="first-name-icon" readonly="">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">

                                                    <input type="file" class="form-control" name="photo" required="required"/>

                                                       </div>
                                                        </div>
                                                    </div>

                                             
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">ADD BILLING</button>
                                                    
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
                               </div>


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

                                          <?php 

                                        $resultz=mysqli_query($conn, "SELECT * FROM pay_cash WHERE pay_id='".$fetch['id']."'")or die('Error In Session');
                                         $prow=mysqli_fetch_array($resultz);

                                        ?>

                                        <?php if(!empty($prow['id']) && $prow['status'] != 'ACCEPT'){ ?>

                                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#accept<?php echo $prow['id']; ?>">
                                       ACCEPT PAY
                                    </button>  

                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="accept<?php echo $prow['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">ACCEPT PAYMENT</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/accept_bill.php" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                   <img src="../ADMIN/activity/<?php echo $fetch['photo']; ?>">  

                                                 <h5 align="center">PAYMENT VIA : <?php echo $prow['payment']; ?></h5>
                                                 <h5 align="center">GIVEN DATE : <?php echo $prow['date_created']; ?></h5>

                                                 <input type="hidden" name="pay_id" value="<?php echo $prow['id']; ?>">


                                                 <input type="hidden" name="biller_id" value="<?php echo $fetch['id']; ?>">

                                                 <input type="hidden" name="reciepient" value="<?php echo $row['email'] ?>">

                                                   <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                               
                                                                <select class="form-control" name="status">
                                                                    <option value="ACCEPT">ACCEPT</option>
                                                                    <option value="DECLINE">DECLINE</option>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                      <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="send" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">SUBMIT</button>
                                                    
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




                                        <?php } else { ?>   

                                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#viewme<?php echo $fetch['id']; ?>">
                                        VIEW IMAGE
                                    </button>  


                                   

                                    <a href="print_pdf.php?id=<?php echo $fetch['id']; ?>" class="btn btn-outline-primary block"><span class="glyphicon glyphicon-print"></span>PRINT PDF</a>


                                

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
                                                    
                                                   <img src="activity/<?php echo $fetch['photo']; ?>" width="100%;">


                                                     <a href="activity/<?php echo $fetch['photo']; ?>" class="form-control">DOWNLOAD A COPY</a>

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


                                

                                <?php } ?>


                                        </td>   
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>