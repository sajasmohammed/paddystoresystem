<!-- start col-->
<div class="col-md-6">
															                        <div class="card">
															                            <div class="card-body">
															                                <h4 class="text-danger">Progress Box</h4>
                                                                                            <div class="m-t-20">
																												<?php
																								                  $sql = "select * from farmer";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
																                                    <div class="d-flex no-block align-items-center ">
																												<span><?php echo $rows; ?>% Farmers</span>
																												  <div class="ml-auto">
																                                                <span><?php echo $rows; ?></span>
																                                        </div>
																                                    </div>
																                                    <div class="progress">
																                                        <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
																                                    </div>
																                            </div>

															                                <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='admin' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Admins</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>
                                                                                            <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='manager' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Manager</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>

                                                                                            <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='collectionofficer' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Collection Officer</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>

                                                                                            <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='financeofficer' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Finance Officer</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>
                                                                                            

                                                                                            <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='storekeeper' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Store Keeper</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>

                                                                                            <div class="m-t-20">
																												<?php
																									              $sql = "select * from users WHERE user_type='clerk' ";
																									              $result = mysqli_query($conn, $sql);
																									              $rows=mysqli_num_rows($result);

																									            ?>
															                                    <div class="d-flex no-block align-items-center ">
																										<span><?php echo $rows; ?>% Clerk</span>
																										  <div class="ml-auto">
															                                            <span><?php echo $rows; ?></span>
															                                        </div>
															                                    </div>
															                                    <div class="progress">
															                                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?php echo $rows; ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
															                                    </div>
															                                </div>
															                            <div>
																						<!--end -->
																