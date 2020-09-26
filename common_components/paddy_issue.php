
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{
	
?>

<?php
$paddy_name="";
$sql=mysqli_query($conn,"select * from paddy_type");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $paddy_name.='<option value='.$row['paddy_name'].'>'.$row['paddy_name'].'</option>';
  }
}
?>

<?php
$selling_price="";
$sql=mysqli_query($conn,"select * from paddy_price");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $selling_price.='<option value='.$row['1kg_selling_price'].'>'.$row['1kg_selling_price'].'</option>';
  }
}
?>

<?php
$supplier_name="";
$sql=mysqli_query($conn,"select * from suplier");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $supplier_name.='<option value='.$row['suplier_name'].'>'.$row['suplier_name'].'</option>';
  }
}
?>

<?php
$vachile_name="";
$sql=mysqli_query($conn,"select * from vechiles");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $vachile_name.='<option value='.$row['vech_name'].'>'.$row['vech_name'].'</option>';
  }
}
?>
<?php
$reginal_center_name="";
$sql=mysqli_query($conn,"select * from reginal_center");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $reginal_center_name.='<option value='.$row['reg_center_name'].'>'.$row['reg_center_name'].'</option>';
  }
}
?>

<?php

	if(isset($_POST["insert"]))
	{
				$sql = "select * from paddy_issue";
				$result = mysqli_query($conn, $sql);
				$rows=mysqli_num_rows($result);
				 $ind=1;
				 $farmerid=$rows+$ind;
				 $mat="PSID";
				 $fimat=$mat.$farmerid;
		   		 $paddy_type =$_POST['paddy_type'];
				 $total_weight =$_POST['total_weight'];
				 $selling_amount =$_POST['1kg_selling_amount'];
				 $total_amount = $total_weight * $selling_amount;
				 $supplier_name =$_POST['supplier_name'];
				 $vachile_name =$_POST['vachile_name'];
				 $reginal_center_name =$_POST['reginal_center_name'];
				 
				 $sql8 = "SELECT (total_weight) as 'sumcflow' from stock";
				 	$run=mysqli_query($conn, $sql8);
					 while($rows=mysqli_fetch_array($run)) {
						 $cal_wieght=$rows['sumcflow'];
						 $cal_stock=$cal_wieght - $total_weight;

						 $sql9 = "update stock set total_weight='$cal_stock'";
			 
						 
						   $sql = "INSERT INTO paddy_issue(paddy_issue_id, paddy_type, total_weight, 1kg_selling_amount, total_amount, supplier_name, vachile_name, reginal_center_name) VALUES ('$fimat','$paddy_type','$total_weight','$selling_amount','$total_amount', '$supplier_name', '$vachile_name', '$reginal_center_name')";

 									if (mysqli_query($conn, $sql)) {
										mysqli_query($conn, $sql9);				
 										echo '<script type="text/javascript"> alert("New record created successfully");</script>';
 										echo '<script type="text/javascript"> window.location.href="paddy_issue.php";</script>';

									} else {
										echo '<script type="text/javascript"> alert("Please Buy Paddy First");</script>';
 										
                           				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
             				 		}

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
                                        <li class="breadcrumb-item active" aria-current="page">Paddy Issue</li>
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
																				    <button type="button" name="add" id="add" class="btn btn-success">Add Paddy Issue Details</button>
																				   </div>

																					<div id="imageModal" class="modal fade" role="dialog">
																					 <div class="modal-dialog">
																					  <div class="modal-content">
																					   <div class="modal-header">
																					   <h4 class="modal-title">Paddy Issue</h4>
																						<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>&times;</strong></button>
																					   </div>
																					   <div class="modal-body">
																					    <form id="image_form" action="" method="post" enctype="multipart/form-data">

																						<div class="table-responsive"><!-- table-responsive begin -->
																										<table class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

                                                                                                             					<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Paddy Type </th>
																																			<th> 1KG Selling Price </th>
																																			<th> Date </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from paddy_price";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$paddy_type = $row['paddy_type'];
																																								$selling_price = $row['1kg_selling_price'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																																		<tr><!-- tr begin -->
																																				<td> <?php echo $paddy_type; ?> </td>
																																				<td> <?php echo $selling_price; ?> </td>
																																				<td> <?php echo $date; ?> </td>
																																		
																																		</tr>
																																	<?php } ?>
                                                                                                        						</tbody>
                                                                                                   		</table>
                                                                                        </div>    
																						
																				
																								
																								<div class="form-group row">
								 																 <label for="paddy_type"  class="col-sm-3 text-right control-label col-form-label" >Paddy Type</label>
								 																	<div class="col-md-6">
								 																			 <select name="paddy_type"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value="">Select</option>
								 																							 <?php echo $paddy_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								<div class="form-group row">
																										 <label for="total_weight" class="col-sm-3 text-right control-label col-form-label">Total Weight</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="total_weight" autocomplete="off" required class="form-control"  id="total_weight" placeholder="Total Weight">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="1kg_selling_amount" class="col-sm-3 text-right control-label col-form-label">Selling Amount</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="1kg_selling_amount" autocomplete="off" required class="form-control"  id="1kg_selling_amount" placeholder="Selling Price">
																											 </div>
																								</div>


																								<div class="form-group row">
								 																 <label for="supplier_name"  class="col-sm-3 text-right control-label col-form-label" >Supplier Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="supplier_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value="">Select</option>
								 																							 <?php echo $supplier_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								 <div class="form-group row">
								 																 <label for="vachile_name"  class="col-sm-3 text-right control-label col-form-label" >Vachile Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="vachile_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value="">Select</option>
								 																							 <?php echo $vachile_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								 <div class="form-group row">
								 																 <label for="reginal_center_name"  class="col-sm-3 text-right control-label col-form-label" >Reginal Center Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="reginal_center_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value="">Select</option>
								 																							 <?php echo $reginal_center_name; ?>
								 																			 </select>
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
																												<div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

																																<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Paddy Issue ID </th>
																																			<th> Paddy Type </th>
																																			<th> Total Weight </th>
																																			<th> 1KG Selling Amount </th>
																																			<th> Total Amount </th>
																																			<th> Supplier Name </th>
																																			<th> Vechile Name </th>
																																			<th> Reginal Center Name </th>
																																			<th> Date </th>
																																			<th> Modify </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from paddy_issue";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$paddy_issue_id = $row['paddy_issue_id'];
																																								$paddy_type = $row['paddy_type'];
																																								$total_weight = $row['total_weight'];
																																								$selling_amount = $row['1kg_selling_amount'];
																																								$total_amount = $row['total_amount'];
																																								$supplier_name = $row['supplier_name'];
																																								$vachile_name = $row['vachile_name'];
																																								$reginal_center_name = $row['reginal_center_name'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $paddy_issue_id; ?> </td>
																															<td> <?php echo $paddy_type; ?> </td>
																															<td> <?php echo $total_weight; ?> </td>
																															<td> <?php echo $selling_amount; ?> </td>
																															<td> <?php echo $total_amount; ?> </td>
																															<td> <?php echo $supplier_name; ?> </td>
																															<td> <?php echo $vachile_name; ?> </td>
																															<td> <?php echo $reginal_center_name; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													<td>

																													<a href="delete_paddy_issue.php?delete_paddy_issue=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
																															<i class=" fas fa-trash-alt"></i>
																													</a>&nbsp&nbsp / &nbsp
																												 	<a href="edit_paddy_issue.php?edit_paddy_issue=<?php echo $id; ?>">
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
<?php } ?>