
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{
	
?>

  <?php

	if(isset($_POST["insert"]))
	{
		$suplier_name =$_POST['suplier_name'];
		$suplier_nic =$_POST['suplier_nic'];
		$suplier_phoneno =$_POST['suplier_phoneno'];
		
		$sql = "INSERT INTO suplier(suplier_name, suplier_nic, suplier_phoneno) VALUES ('$suplier_name', '$suplier_nic', '$suplier_phoneno')";

 									if (mysqli_query($conn, $sql)) {

 										echo '<script type="text/javascript"> alert("New record created successfully");</script>';
 										echo '<script type="text/javascript"> window.location.href="suplier.php";</script>';

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
                                        <li class="breadcrumb-item active" aria-current="page">Suplier</li>
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
																				    <button type="button" name="add" id="add" class="btn btn-success">Add Suplier Details</button>
																				   </div>

																					<div id="imageModal" class="modal fade" role="dialog">
																					 <div class="modal-dialog">
																					  <div class="modal-content">
																					   <div class="modal-header">
																					    <h4 class="modal-title">Suplier</h4>
																							<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>&times;</strong></button>
																					   </div>
																					   <div class="modal-body">
																					    <form id="image_form" action="" method="post" enctype="multipart/form-data">

																				
																								<div class="form-group row">
																										 <label for="suplier_name" class="col-sm-3 text-right control-label col-form-label">Suplier Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="suplier_name" autocomplete="off" required class="form-control"  id="suplier_name" placeholder="Suplier Name">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="suplier_nic" class="col-sm-3 text-right control-label col-form-label">Suplier NIC</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="suplier_nic" autocomplete="off" required class="form-control"  id="suplier_nic" placeholder="Suplier NIC">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="suplier_phoneno" class="col-sm-3 text-right control-label col-form-label">Suplier Phone Number</label>
																											 <div class="col-sm-6">
																											 	<input type="text" name="suplier_phoneno" class="form-control phone-inputmask" required id="phone-mask" placeholder="Enter Phone Number">
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
																												<h4 class="text-danger">Suplier Details</h4><br>
																												<div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

																																<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																		<th> Suplier Name </th>
																																		<th> Suplier NIC </th>
																																			<th> Suplier Phone Number </th>
																																			<th> Date </th>
																																			<th> Modify </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from suplier";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$suplier_name = $row['suplier_name'];
																																								$suplier_nic = $row['suplier_nic'];
																																								$suplier_phoneno = $row['suplier_phoneno'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $suplier_name; ?> </td>
																															<td> <?php echo $suplier_nic; ?> </td>
																															<td> <?php echo $suplier_phoneno; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													<td>

																													<a href="delete_suplier.php?delete_suplier=<?php echo $id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');">
																															<i class=" fas fa-trash-alt"></i>
																													</a>&nbsp&nbsp / &nbsp
																												 	<a href="edit_suplier.php?edit_suplier=<?php echo $id; ?>">
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
<?php } ?>