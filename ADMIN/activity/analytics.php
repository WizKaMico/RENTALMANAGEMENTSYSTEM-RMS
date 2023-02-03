 <?php 
                    $rule_result=mysqli_query($conn, "SELECT * FROM rules");
                    $rule=mysqli_fetch_array($rule_result);
                    ?>
                  <section class="section">
                    <div class="card">
                        <div class="card-header">
                            LOGIN HISTORY
                                <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" style="margin-left:10px;" data-bs-target="#guidline">GUIDELINES</button>

                                 <div class="modal fade text-left" id="guidline" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1"><?php echo strtoupper($rule['title']); ?>

                                                    </h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <?php echo strtoupper($rule['decription']); ?>
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
                                        <th>IP ADDRESS</th>
                                        <th>CITY</th>
                                        <th>REGION</th>
                                        <th>ISP</th>
                                        <th>COORDINATES</th>
                                        <th>LOGIN TIME</th>
                                        <th>DATE</th>
                                    </tr>
                                </thead>
                                <tbody>

           <?php
                
                    $query = mysqli_query($conn, "SELECT *, COUNT(id) as TOTAL FROM `viewers` WHERE email = '".$row['email']."' GROUP BY date_created") or die(mysqli_error());
                    while($fetch = mysqli_fetch_array($query)){
            ?>
                                    <tr>
                                        <td><?php echo $fetch['ip']; ?></td>
                                        <td><?php echo $fetch['city']; ?></td>
                                        <td><?php echo $fetch['region']; ?></td>
                                        <td><?php echo $fetch['org']; ?></td>
                                        <td> 
                                          <button type="button" class="btn btn-outline-primary block" data-bs-toggle="modal" data-bs-target="#default">
                                        <?php echo $fetch['rip']; ?>
                                        </button>
                                        </td>
                                        <td><?php echo $fetch['TOTAL']; ?></td>
                                        <td><?php echo $fetch['date_created']; ?></td>
                                    </tr>

                                      <?php 
                                                    
                                                    $string = $fetch['rip'];
                                                    $str_arr = explode (",", $string); 
                                                    $lat = $str_arr[0];
                                                    $long =  $str_arr[1];

                                                    ?>   

                    <script>
                    function initMap() {
                        var location = {lat: <?php echo $lat;  ?>, lng: <?php echo $long;  ?>};
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 4,
                            center: location
                        });
                        var marker = new google.maps.Marker({
                            position: location,
                            map: map
                        });
                    }
                    </script>

                                     <!--Basic Modal -->
                                    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel1" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel1">LOGIN LOCATION : 

                                                    </h5>
                                                    <button type="button" class="close rounded-pill"
                                                        data-bs-dismiss="modal" aria-label="Close">
                                                        <i data-feather="x"></i>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                  <div id="map" style="height: 400px; width: 100%;"></div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn" data-bs-dismiss="modal">
                                                        <i class="bx bx-x d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Close</span>
                                                    </button>
                                                    <button type="button" class="btn btn-primary ml-1"
                                                        data-bs-dismiss="modal">
                                                        <i class="bx bx-check d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Accept</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            <?php } ?>                        
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>