
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}
	

?>
  <?php

	if(isset($_POST["insert"]))
	{
				$sql = "select * from farmer";
				$result = mysqli_query($conn, $sql);
				$rows=mysqli_num_rows($result);
				$ind=1;
				$farmerid=$rows+$ind;
				$mat="FID";
				$fimat=$mat.$farmerid;
   				$farmer_name=$_POST['farmer_name'];
				$farmer_nic=$_POST['farmer_nic'];
				$farmer_mobileno=$_POST['farmer_mobileno'];

						  $sql = "INSERT INTO farmer(farmer_reg_no,farmer_name,farmer_nic,farmer_mobileno) VALUES ('$fimat','$farmer_name','$farmer_nic','$farmer_mobileno')";

 									if (mysqli_query($conn, $sql)) {

 										echo '<script type="text/javascript"> alert("New record created successfully");</script>';
 										echo '<script type="text/javascript"> window.location.href="farmer.php";</script>';

									} else {
                           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             				 }

							}


 ?>

 

<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <?php include '../mainstuff/inhead.php'; ?>
				<link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css">
				<link href="../js/jquery.dataTables.min.css" rel="stylesheet">
				<link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">

        <title>Paddy Storage Coperation System</title>
    </head>
    <body>
        <?php include '../mainstuff/preloader.php'; ?>
        <div id="main-wrapper">
            <?php include '../mainstuff/header.php'; ?>
			<?php include '../mainstuff/LeftSidebar.php'; ?>
      
			<div class="page-wrapper">
                <div class="page-breadcrumb">
                    <div class="row">
                        <div class="col-12 d-flex no-block align-items-center">
                            <h4 class="page-title">Home</h4>
                            <div class="ml-auto text-right">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Farmers</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>


								                <div class="row">
								                    <div class="col-md-12">
								                        <div class="card card-body printableArea">
																					<div align="center">
																				    <button type="button" name="add" id="add" class="btn btn-success">Add Farmers Details</button>
																				   </div>

																					<div id="imageModal" class="modal fade" role="dialog">
																					 <div class="modal-dialog">
																					  <div class="modal-content">
																					   <div class="modal-header">
																					    <h4 class="modal-title">Add Farmer</h4>
																							<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>&times;</strong></button>
																					   </div>
																					   <div class="modal-body">
																					    <form id="image_form" action="" method="post" enctype="multipart/form-data">


																																				

																								<div class="form-group row">
																										 <label for="farmer_name" class="col-sm-3 text-right control-label col-form-label">Farmer Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_name" autocomplete="off" required class="form-control"  id="farmer_name" placeholder="Farmer Name">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="nicId" class="col-sm-3 text-right control-label col-form-label">Farmer Nic </label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_nic" autocomplete="off"  required class="form-control"  id="" placeholder="Enter NIC">
																											 </div>
																								</div> 	

																								<div class="form-group row">
																										 <label for="phone-mask" class="col-sm-3 text-right control-label col-form-label">Farmer Mobile Number</label>
																											 <div class="col-sm-6">
																											 <input type="text" name="farmer_mobileno" class="form-control phone-inputmask" required id="phone-mask" placeholder="Enter Phone Number">
                                																			 </div>
																								</div> 	



								 													 </div>
																					   <div class="modal-footer">
																							 <input type="submit" name="insert" id="insert"  value="Insert" class="btn btn-success" />
																							 <button type="reset" id="" class="btn btn-primary" >Reset</button>
																						 </div>
																			    </form>
																					  </div>
																					 </div>
																					</div>


																					<form class="form-horizontal" action="" enctype="multipart/form-data" method="post">

																								<div class="card-body">
																												<h4 class="text-danger">Farmers Details</h4><br>
																												<div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

																																<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Farmer Register Number </th>
																																			<th> FarmerName  </th>
																																			<th> FarmerNic </th>
																																			<th> FarmerMobileNo </th>
																																			<th> Date </th>
																																			<th> Modify </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from farmer ORDER BY row_id ASC";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$farmer_reg_no = $row['farmer_reg_no'];
																																								$farmer_name = $row['farmer_name'];
																																								$farmer_nic = $row['farmer_nic'];
																																								$farmer_mobileno = $row['farmer_mobileno'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $farmer_reg_no; ?> </td>
																															<td> <?php echo $farmer_name; ?> </td>
																															<td> <?php echo $farmer_nic; ?> </td>
																															<td> <?php echo $farmer_mobileno; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													<td>

																													<a href="delete_farmer.php?delete_farmer=<?php echo $id; ?>">
																															<i class=" fas fa-trash-alt"></i>
																													</a>&nbsp&nbsp / &nbsp
																												 	<a href="edit_farmer.php?edit_farmer=<?php echo $id; ?>">
																															<i class=" fas fa-pencil-alt"></i>
																													</a>
																													</td>
																													</tr>
																										<?php } ?>
																								</tbody>
																						</table>
																				</div>
																		</form><br><br><br><br><br><br>
																</div>
								                    </div>
								                </div>
								                <?php include '../mainstuff/footer.php'; ?>
								            </div>
											<?php include '../mainstuff/allquery.php'; ?>
											<script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
											<script src="../dist/js/pages/mask/mask.init.js"></script>
    
														<script src="../js/jquery.dataTables.min.js"></script>
														<script src="../js/dataTables.buttons.min.js"></script>
														<script src="../js/buttons.flash.min.js"></script>
														<script src="../js/jszip.min.js"></script>
														<script src="../js/pdfmake.min.js"></script>
														<script src="../js/vfs_fonts.js"></script>
														<script src="../js/buttons.html5.min.js"></script>
														<script src="../js/buttons.print.min.js"></script>

														<script>
														$(document).ready(function() {
															$('#zero_config').DataTable( {
																dom: 'Bfrtip',
																buttons: [
																	'excel', 'pdf', 'print'
																]
															} );
														} );
												    </script>
														<script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
														<script src="../assets/libs/select2/dist/js/select2.min.js"></script>

													<script>
																$(".select2").select2();
														</script>

														<?php include '../js/script1.js' ?>

												


	  </body>
</html>
