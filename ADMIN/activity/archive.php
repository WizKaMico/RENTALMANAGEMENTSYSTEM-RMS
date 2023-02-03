


       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>EMAIL</th>
                                        <th>FULLNAME</th>
                                        <th>STATUS</th>
                                         <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM users") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){

                                            $password = $fetch['password'];
                                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['username']; ?></td>
                                        <td><?php echo $fetch['fullname']; ?></td>
                                        <td><?php echo $fetch['status']; ?></td>
                                        <td>

                                            <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                                data-bs-target="#default<?php echo $fetch['user_id']; ?>">
                                                ACTION
                                            </button>   


                                                    <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default<?php echo $fetch['user_id']; ?>" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">ARCHIVE INDIVIDUAL</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/update_client.php">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <input type="hidden" name="user_id" value="<?php echo $fetch['user_id']; ?>" readonly="">

                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <select class="form-control" name="status">
                                                                    <option value="VERIFIED">VERIFIED</option>
                                                                    <option value="UNVERIFIED">UNVERIFIED</option>
                                                                    <option value="BLOCKED">BLOCKED</option>
                                                                    <option value="ARCHIVE">ARCHIVE</option>
                                                                </select>
                                                                <div class="form-control-icon">
                                                                    <i class="bi bi-person"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>




                                                   
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" 
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
                               </div>


                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>