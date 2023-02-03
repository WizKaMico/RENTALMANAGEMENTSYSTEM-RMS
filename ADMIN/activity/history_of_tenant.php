

<?php $code = $_GET['code']; ?>
       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>HOUSE CODE</th>
                                        <th>TENANT NAME</th>
                                         <th>DATE OCCUPIED</th>
                                            <th> ACTION</th>
                                      
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM users WHERE previously_assigned_to = '$code'") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){

                                
                                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['previously_assigned_to']; ?></td>
                                        <td><?php echo $fetch['fullname']; ?></td>
                                         <td><?php echo $fetch['date_created']; ?></td>
                                        <td><a href="home.php?category=transaction&user_id=<?php echo $fetch['user_id']; ?>">TRANSACTION</a></td>
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>