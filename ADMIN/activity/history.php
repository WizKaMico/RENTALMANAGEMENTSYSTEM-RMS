


       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>HOUSE CODE</th>
                                        <th>HOUSE NAME</th>
                                        <th>MONTHLY RENT</th>
                                         <th>ACTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM house") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){

                                
                                                    

                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['house_code']; ?></td>
                                        <td><?php echo $fetch['house_name']; ?></td>
                                        <td>₱ <?php echo $fetch['monthly_rent']; ?></td>
                                        <td>
                                            <a href="home.php?category=tenant_history&code=<?php echo $fetch['house_code']; ?>" class="btn btn-outline-primary block" />ROOM HISTORY</a>
                                        </td>
                                        
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>