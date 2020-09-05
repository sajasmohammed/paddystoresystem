
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
   
				  $vech_name =$_POST['vech_name'];
				  $vech_type =$_POST['vech_type'];
				  $vech_no =$_POST['vech_no'];
			    		  $sql = "INSERT INTO vechiles(vech_name, vech_type, vech_no) VALUES ('$vech_name', '$vech_type', '$vech_no')";

 									if (mysqli_query($conn, $sql)) {

 										echo '<script type="text/javascript"> alert("New record created successfully");</script>';
 										echo '<script type="text/javascript"> window.location.href="vechile.php";</script>';

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
                                        <li class="breadcrumb-item active" aria-current="page">Vachile</li>
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
																				    <button type="button" name="add" id="add" class="btn btn-success">Add Vechiles Details</button>
																				   </div>

																					<div id="imageModal" class="modal fade" role="dialog">
																					 <div class="modal-dialog">
																					  <div class="modal-content">
																					   <div class="modal-header">
																					    <h4 class="modal-title">Vechile</h4>
																							<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>&times;</strong></button>
																					   </div>
																					   <div class="modal-body">
																					    <form id="image_form" action="" method="post" enctype="multipart/form-data">

																				
																								<div class="form-group row">
																										 <label for="vech_name" class="col-sm-3 text-right control-label col-form-label">Vechile Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="vech_name" autocomplete="off" required class="form-control"  id="vech_name" placeholder="Vechile Name">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="vech_type" class="col-sm-3 text-right control-label col-form-label">Vechile</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="vech_type" autocomplete="off" required class="form-control"  id="vech_type" placeholder="Vechile Type">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="vech_no" class="col-sm-3 text-right control-label col-form-label">Vechile</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="vech_no" autocomplete="off" required class="form-control"  id="vech_no" placeholder="Vechile Number">
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
																												<h4 class="text-danger">Vechile Details</h4><br>
																												<div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

																																<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Vechile Name </th>
																																			<th> Vechile Type </th>
																																			<th> Vechile Number </th>
																																			<th> Date </th>
																																			<th> Modify </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from vechiles";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$vech_name = $row['vech_name'];
																																								$vech_type = $row['vech_type'];
																																								$vech_no = $row['vech_no'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $vech_name; ?> </td>
																															<td> <?php echo $vech_type; ?> </td>
																															<td> <?php echo $vech_no; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													<td>

																													<a href="delete_vechile.php?delete_vechile=<?php echo $id; ?>"  onclick="return confirm('Are you sure you want to delete this item?');">
																															<i class=" fas fa-trash-alt"></i>
																													</a>&nbsp&nbsp / &nbsp
																												 	<a href="edit_vechile.php?edit_vechile=<?php echo $id; ?>">
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
