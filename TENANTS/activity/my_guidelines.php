


       <div class="card-body">                          
       <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>TITLE</th>
                                        <th>TYPE</th>
                                        <th>DESCRIPTION</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                     <?php
                
                                            $query = mysqli_query($conn, "SELECT * FROM `rules`") or die(mysqli_error());
                                            while($fetch = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                        <td><?php echo $fetch['title']; ?></td>
                                        <td><?php echo $fetch['type']; ?></td>
                                        <td>₱ <?php echo $fetch['decription']; ?></td>
                                         
                                    </tr>
                                    <?php } ?>
                                    
                                </tbody>
                            </table>

                        </div>