                  <div class="card-header">
                    <?php 
                    $rule_result=mysqli_query($conn, "SELECT * FROM rules");
                    $rule=mysqli_fetch_array($rule_result);
                    ?>
                    <?php if(!empty($rule['id'])) { ?>
                           
                    <?php } else { ?>
                           <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal"
                                        data-bs-target="#default">
                                        CREATE GUIDELINES / RULES
                                    </button>

                    <?php } ?>

                                      <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">CREATE GUIDELINES / RULES</h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                        <form class="form form-horizontal" method="POST" action="activity/add_rule.php">
                                            <div class="form-body">
                                                <div class="row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <input type="text" name="title" class="form-control"
                                                                    id="first-name-icon" placeholder="Enter Title" required>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>

                                               


                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                                <select class="form-control" name="type" required>
                                                                    <option value="Rule">Rule</option>
                                                                    <option value="Guideline">Guideline</option>
                                                                </select>
                                                             
                                                            </div>
                                                        </div>
                                                    </div>


                                                     <div class="col-md-12">
                                                        <div class="form-group has-icon-left">
                                                            <div class="position-relative">
                                                               <textarea name="decription" class="form-control" required>
                                                                   
                                                               </textarea>
                                                            </div>
                                                        </div>
                                                    </div>





                                                   
                                             
                                                    <div class="col-12 d-flex justify-content-end">
                                                        <button type="submit" name="submit" 
                                                            class="btn btn-primary me-1 mb-1" style="width:100%;">ADD</button>
                                                    
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
                                        <th>TITLE</th>
                                        <th>RULE</th>
                                        <th>DESCRIPTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM rules") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){

                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['title']; ?></td>
                                        <td><?php echo $fetch['type']; ?></td>
                                        <td><?php echo $fetch['decription']; ?></td>
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>