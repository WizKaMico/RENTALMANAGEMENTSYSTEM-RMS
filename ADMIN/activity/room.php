                  <div class="card-header">
                              <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#default">
                                        CREATE ROOM
                                    </button>

                                      <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">CREATE ROOM</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/add_room.php">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="house_code" class="form-control"
                                                                   value="<?php echo 'RMS-'; echo rand(6666,9999); ?>" id="first-name-icon" readonly="">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-door-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="house_name" class="form-control" placeholder="Enter House Name" 
                                                                  id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-house-door-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">            
                                                                <select id="province" class="form-control" name="province"></select>
                                                                <div class="form-control-icon">
                                                                  <i class="bi bi-pin-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">            
                                                          <select id="city" class="form-control" name="city"></select>
                                                                <div class="form-control-icon">
                                                                   <i class="bi bi-pin-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="number" name="monthly_rent" class="form-control" placeholder="Monthly Rent" 
                                                                  id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                   <i class="bi bi-cash"></i>
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
                                                               
                                                                <select class="form-control" name="status">
                                                                    <option value="Occupied">Occupied</option>
                                                                    <option value="Un-Occupied">Un-Occupied</option>
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
                        
                                                                <input type="text" name="created_by" class="form-control"
                                                                  value="<?php echo $row['username']; ?>" id="first-name-icon" readonly="">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                             
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">ADD HOUSE</button>
                                                    
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
                                        <th>HOUSE NAME</th>
                                        <th>RENT</th>
                                        <th>DATE CREATED</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>

                                      <!--   <?php echo md5('admin'); ?> -->
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php

                                     // SELECT *,house.date_created as DATE,house.status as hstat FROM house LEFT JOIN users ON house.house_code = users.assigned_to WHERE users.status != 'ARCHIVE' OR users.status != 'UNVERIFIED' OR users.status != 'VERIFIED' GROUP BY house.id
                
                                            $query = mysqli_query($conn, "SELECT *,house.date_created as DATE,house.status as hstat FROM house LEFT JOIN users ON house.house_code = users.assigned_to") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['house_code']; ?></td>
                                        <td><?php echo $fetch['house_name']; ?></td>
                                        <td>₱ <?php echo $fetch['monthly_rent']; ?></td>
                                        <td><?php echo $fetch['DATE']; ?></td>
                                        
                                        <td>
                                            <?php if($fetch['hstat'] == 'Occupied'){ ?>
                                            <span class="badge bg-success">Occupied</span>
                                            <?php } else { ?>
                                            <span class="badge" style="background:red;" >Un-Occupied</span>
                                        <?php } ?>
                                        </td>
                                        <td>
                                    <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#default<?php echo $fetch['id']; ?>">
                                        EDIT HOUSE
                                    </button>

                                    <?php if($fetch['hstat'] == 'Un-Occupied'){ ?>

                                     <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#addtenant">
                                        ADD TENANT
                                    </button>    

                                       <!--Basic Modal -->
                                    <div class="modal fade text-left" id="addtenant" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">ADD TENANT</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/add_tenant.php">
                                            <div class="form-body">
                                                <div class="row">

                                                   <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="email" name="email" class="form-control" placeholder="Email" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="text" name="fullname" class="form-control" placeholder="Fullname" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                              <select name="gender" class="form-control">
                                                                  <option value="Male">Male</option>
                                                                  <option value="Female">Female</option>
                                                              </select>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                       <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="date" name="birthday" class="form-control" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="number" name="phone" class="form-control" placeholder="Phone Number" id="first-name-icon">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>

                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="text" name="assigned_to" class="form-control" value="<?php echo $fetch['house_code']; ?>" id="first-name-icon" readonly>
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                  
                                                      <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                        
                                                                <input type="hidden" name="created_by" class="form-control"
                                                                  value="<?php echo $row['username']; ?>" id="first-name-icon" readonly="">
                                                              
                                                            </div>
                                                        </div>
                                                    </div>
                                             
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="send" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">ADD TENANT</button>
                                                    
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

                                    <a href="home.php?category=tenant&house_code=<?php echo $fetch['house_code']; ?>" class="btn btn-outline-primary block">VIEW TENANT</a>     

                                    <?php } ?>    
                                    



                                        <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default<?php echo $fetch['id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">EDIT HOUSE</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/edit_room.php">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                  

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="hidden" name="id" class="form-control" value="<?php echo $fetch['id']; ?>">
                                                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $fetch['user_id']; ?>">
                                                                <input type="text" name="house_name" class="form-control" value="<?php echo $fetch['house_name']; ?>" 
                                                                  id="first-name-icon">
                                                                   <input type="text" name="house_code" class="form-control" value="<?php echo $fetch['house_code']; ?>" 
                                                                  id="first-name-icon" readonly="">
                                                                <div class="form-control-icon">
                                                                  <i class="bi bi-house-door-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="number" name="monthly_rent" class="form-control" value="<?php echo $fetch['monthly_rent']; ?>" 
                                                                  id="first-name-icon">
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-cash"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                               
                                                                <select class="form-control" name="status">
                                                                    <?php if($fetch['status'] == 'Occupied'){ ?>
                                                                    <option value="Occupied">Occupied (CURRENT)</option>
                                                                    <option value="Un-Occupied">Un-Occupied</option>
                                                                    <?php } else { ?>
                                                                    <option value="Occupied">Occupied</option>
                                                                    <option value="Un-Occupied">Un-Occupied (CURRENT)</option>    
                                                                    <?php } ?>    
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                  
                                             
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="edit" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">EDIT ROOM</button>
                                                    
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



                                    </td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>