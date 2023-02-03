

<?php $user_id = $_GET['user_id']; ?>
       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>HOUSE CODE</th>
                                        <th>TENANT NAME</th>
                                         <th>BILL TYPE</th>
                                           <th>AMOUNT TO PAY</th>
                                            <th> STATUS</th>
                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT *, biller.status as THSTAT FROM biller LEFT JOIN users ON biller.user_id = users.user_id WHERE users.user_id = '$user_id'") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){

                                
                                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['house_code']; ?></td>
                                        <td><?php echo $fetch['fullname']; ?></td>
                                         <td><?php echo $fetch['bill']; ?></td>
                                          <td> ₱ <?php echo $fetch['pay']; ?></td>
                                          <td><?php echo $fetch['THSTAT']; ?></td>
                                     
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>