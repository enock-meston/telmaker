
                        <?php
                        include 'include/condig.php';
                            if (isset($_POST['rowid'])) {
                                $id = trim($_POST['rowid']);
                                $query=mysqli_query($con,"SELECT * FROM `musictbl` WHERE mid = '$id'");
                                if(mysqli_num_rows($query)>0) {
                                    $row1=mysqli_fetch_array($query)
                                    ?>
                                    <h5><?php echo $row1['title'] ;?></h5>
                                    <p><?php echo $row1['valueInAmmount'];?></p>
                                <?php	
                                }
                            }else {
                                echo "no data";
                            }
                        
                        
                        ?>
                  