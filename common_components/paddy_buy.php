
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}
	else{
?>

<?php

$farmer_reg_num="";

$sql=mysqli_query($conn,"select * from farmer");

if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {

        $farmer_reg_num.='<option value='.$row['farmer_reg_no'].'>'.$row['farmer_reg_no'].'</option>';

  }
}
 ?>


<?php

$paddy_name="";

$sql=mysqli_query($conn,"select * from paddy_price");

if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {

        $paddy_name.='<option value='.$row['paddy_type'].'>'.$row['paddy_type'].'</option>';

  }
}
?>

<?php

$reg_center_name="";

$sql=mysqli_query($conn,"select * from reginal_center");

if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {

        $reg_center_name.='<option value='.$row['reg_center_name'].'>'.$row['reg_center_name'].'</option>';

  }
}
?>

  <?php

	if(isset($_POST["insert"]))
	{
                $farmer_reg_no = $_POST['farmer_reg_no'];
                $paddy_type = $_POST['paddy_type'];
                $buy_price=$_POST['1kg_buy_price']; 
                $reason_less_buy_price=$_POST['reason_less_buy_price']; 
                $total_weight=$_POST['total_weight']; 
				$total_weights=$_POST['total_weight']; 
				$reg_center=$_POST['reg_center_name']; 

				$total_amount = $total_weight * $buy_price;
				$currentDateTime = date('m');
				$getMonths=12 - $currentDateTime;

				
					$sql8 = "SELECT Sum(total_weight) as 'sumcflow' from paddy_buy";
				 	$run=mysqli_query($conn, $sql8);
					 while($rows=mysqli_fetch_array($run)) {
						 $cal_wieght=$rows['sumcflow'];
						 $cal_stock=$total_weights + $cal_wieght;
						 
						 $sql9 = "update stock set total_weight='$cal_stock'";
			 
						  	if($cal_stock < 500){
							 
								$sql = "INSERT INTO paddy_buy(farmer_reg_no,paddy_type,1kg_buy_price,reason_less_buy_price,total_weight, total_amount, reg_center_name) VALUES ('$farmer_reg_no', '$paddy_type', '$buy_price', '$reason_less_buy_price', '$total_weight', '$total_amount', '$reg_center')";
								if (mysqli_query($conn, $sql)) {
									mysqli_query($conn, $sql9);				
									echo '<script type="text/javascript"> alert("New record created successfully");</script>';
 									echo '<script type="text/javascript"> window.location.href="paddy_buy.php";</script>';

								} 
								else {
								    echo "Error: " . $sql.  "<br>" . mysqli_error($conn);
								}
						  	}else{
								echo"<script type='text/javascript'> alert('Out of Stock, You  have  $getMonths Months to Add more Stock');</script>";										 
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
                                        <li class="breadcrumb-item active" aria-current="page">Paddy Buy</li>
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
																				    <button type="button" name="add" id="add" class="btn btn-success">Add Paddy Buy Details</button>
																				   </div>

																					<div id="imageModal" class="modal fade" role="dialog">
																					 <div class="modal-dialog">
																					  <div class="modal-content">
																					   <div class="modal-header">
																					    <h4 class="modal-title">Paddy Buy</h4>
																							<button type="button" class="btn btn-danger" data-dismiss="modal"><strong>&times;</strong></button>
																					   </div>
																					   <div class="modal-body">
																					    <form id="image_form" action="" method="post" enctype="multipart/form-data">
                                                                                        <div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config1" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

                                                                                                             <thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Paddy Type </th>
																																			<th> 1KG Buy Price </th>
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
																																								$buy_price = $row['1kg_buy_price'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $paddy_type; ?> </td>
																															<td> <?php echo $buy_price; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													
                                                                                                                   </tr>
                                                                                                                 <?php } ?>
                                                                                                        </tbody>
                                                                                                    </table>
                                                                                        </div>    
																						<div class="form-group row">
								 																 <label for="farmer_reg_no"  class="col-sm-3 text-right control-label col-form-label" >Former Register Number</label>
								 																	<div class="col-md-6">
								 																			 <select name="farmer_reg_no"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option >Select</option>
								 																							 <?php echo $farmer_reg_num; ?>
								 																			 </select>
								 																	 </div>
								 															 </div>
                                                                                        <div class="form-group row">
								 																 <label for="paddy_type"  class="col-sm-3 text-right control-label col-form-label" >Paddy Type</label>
								 																	<div class="col-md-6">
								 																			 <select name="paddy_type"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option >Select</option>
								 																							 <?php echo $paddy_name; ?>
								 																			 </select>
								 																	 </div>
								 														</div>

                                                                                         <div class="form-group row">
																									 <label for="1kg_buy_price" class="col-sm-3 text-right control-label col-form-label">1KG Buy Price</label>
																											 <div class="col-sm-6">
																													 <input type="number" name="1kg_buy_price" autocomplete="off" required class="form-control"  id="1kg_buy_price" placeholder="Buy Price">
																											 </div>
																							 </div>
                                                                                             <div class="form-group row">
																									 <label for="reason_less_buy_price" class="col-sm-3 text-right control-label col-form-label">Reason Buy Price</label>
																											 <div class="col-sm-6">
																													 <input type="text" name="reason_less_buy_price" autocomplete="off" required class="form-control"  id="reason_less_buy_price" placeholder="Reason  Buy Price">
																											 </div>
																							 </div>


																								<div class="form-group row">
																										 <label for="total_weight" class="col-sm-3 text-right control-label col-form-label">Total Weight</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="total_weight" autocomplete="off" required class="form-control"  id="total_weight" placeholder="Total Weight">
																											 </div>
																								</div>

																								<div class="form-group row">
								 																 <label for="reg_center_name"  class="col-sm-3 text-right control-label col-form-label" >Reginal Center</label>
								 																	<div class="col-md-6">
								 																			 <select name="reg_center_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option >Select</option>
								 																							 <?php echo $reg_center_name; ?>
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
																												<h4 class="text-danger">Paddy Buy Details</h4><br>
																												<div class="table-responsive"><!-- table-responsive begin -->
																														<table id="zero_config" class="table table-striped table-bordered"><!-- table table-striped table-bordered table-hover begin -->

																																<thead><!-- thead begin -->
																																		<tr><!-- tr begin -->
																																			<th> Farmer Register Number</th>
																																			<th> Paddy Type </th>
																																			<th> 1KG Buy Price  </th>
                                                                                                                                            <th> Reason Buy Price  </th>
                                                                                                                                            <th> Total Weight </th>
                                                                                                                                            <th> Total Amount </th>
																																			<th> Date </th>
																																			<th> Modify </th>
																																		</tr><!-- tr finish -->
																																</thead><!-- thead finish -->

																																<tbody><!-- tbody begin -->

																																		<?php
																																					$i=0;

																																					$sql= "select * from paddy_buy";
																																					$run = mysqli_query($conn,$sql);
																																						while($row=mysqli_fetch_array($run)){
																																								$id = $row['row_id'];
																																								$farmer_reg_no = $row['farmer_reg_no'];
                                                                                                                                                                $buy_price = $row['1kg_buy_price'];
																																								$paddy_type = $row['paddy_type'];
																																								$reason_less_buy_price = $row['reason_less_buy_price'];
																																								$total_weight = $row['total_weight'];
																																								$total_amount = $row['total_amount'];
																																								$date = $row['date'];
																																								$i++;
																																		?>
																													<tr><!-- tr begin -->
																															<td> <?php echo $farmer_reg_no; ?> </td>
																															<td> <?php echo $paddy_type; ?> </td>
																															<td> <?php echo $buy_price; ?> </td>
																															<td> <?php echo $reason_less_buy_price; ?> </td>
                                                                                                                            <td> <?php echo $total_weight; ?> </td>
                                                                                                                            <td> <?php echo $total_amount; ?> </td>
																															<td> <?php echo $date; ?> </td>
																													<td>

																													<a href="delete_paddy_buy.php?delete_paddy_buy=<?php echo $id; ?>" onclick="return confirm('Are you sure you want to delete this item?');">
																															<i class=" fas fa-trash-alt"></i>
																													</a>
																												 	<a href="edit_paddy_buy.php?edit_paddy_buy=<?php echo $id; ?>">
																															<i class=" fas fa-pencil-alt"></i>
																													</a>
																													<a href="add_bank_details.php?add_bank_details=<?php echo $id; ?>">
																															<i class=" fas fa-print"></i>
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
														<script>
														$(document).ready(function() {
															$('#zero_config1').DataTable( {
																dom: 'Bfrtip',
																buttons: [
																	
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