
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
$suplier_name="";
$sql=mysqli_query($conn,"select * from suplier");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $suplier_name.='<option value='.$row['suplier_name'].'>'.$row['suplier_name'].'</option>';
  }
}
?>

<?php
$vahicle_name="";
$sql=mysqli_query($conn,"select * from vechiles");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $vahicle_name.='<option value='.$row['vech_name'].'>'.$row['vech_name'].'</option>';
  }
}
?>
<?php
$reginal_centers_name="";
$sql=mysqli_query($conn,"select * from reginal_center");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $reginal_centers_name.='<option value='.$row['reg_center_name'].'>'.$row['reg_center_name'].'</option>';
  }
}
?>


<?php
if (isset($_GET['edit_paddy_issue'])){

		$id = $_GET['edit_paddy_issue'];

		$sql = "select * from paddy_issue where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$paddy_issue_id = $row['paddy_issue_id'];
		$paddy_type = $row['paddy_type'];
		$total_weight = $row['total_weight'];
		$selling_amount = $row['1kg_selling_amount'];
		$total_amount = $row['total_amount'];
		$supplier_name = $row['supplier_name'];
		$vachile_name = $row['vachile_name'];
		$reginal_center_name = $row['reginal_center_name'];
																																								
}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
	 <head>
			 <?php include '../mainstuff/inhead.php'; ?>
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
																			 <li class="breadcrumb-item active" aria-current="page">Library</li>
																	 </ol>
															 </nav>
													 </div>
											 </div>
									 </div>
							 </div>

							 <div class="row">
									 <div class="col-md-12">
											 <div class="card card-body printableArea">

												 <form class="form-horizontal" action="" enctype="multipart/form-data" method="post">

												 <div class="form-group row">
																										 <label for="paddy_issue_id" class="col-sm-3 text-right control-label col-form-label">Paddy Issue ID</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="paddy_issue_id" value="<?php echo $paddy_issue_id; ?>" autocomplete="off" required class="form-control"  id="paddy_issue_id" placeholder="Paddy Issue ID">
																											 </div>
																								</div>

																								
																								<div class="form-group row">
								 																 <label for="paddy_type"  class="col-sm-3 text-right control-label col-form-label" >Paddy Type</label>
								 																	<div class="col-md-6">
								 																			 <select name="paddy_type"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value=""> <?php echo $paddy_type; ?></option>
								 																							 <?php echo $paddy_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								<div class="form-group row">
																										 <label for="total_weight" class="col-sm-3 text-right control-label col-form-label">Total Weight</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="total_weight" value="<?php echo $total_weight; ?>" autocomplete="off" required class="form-control"  id="total_weight" placeholder="Total Weight">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="1kg_selling_amount" class="col-sm-3 text-right control-label col-form-label">Selling Amount</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="1kg_selling_amount" value="<?php echo $selling_amount; ?>" autocomplete="off" required class="form-control"  id="1kg_selling_amount" placeholder="Selling Price">
																											 </div>
																								</div>


																								<div class="form-group row">
								 																 <label for="supplier_name"  class="col-sm-3 text-right control-label col-form-label" >Supplier Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="supplier_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value=""><?php echo $supplier_name; ?></option>
								 																							 <?php echo $supplier_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								 <div class="form-group row">
								 																 <label for="vachile_name"  class="col-sm-3 text-right control-label col-form-label" >Vachile Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="vachile_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value=""><?php echo $vachile_name; ?></option>
								 																							 <?php echo $vahicle_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																								 <div class="form-group row">
								 																 <label for="reginal_center_name"  class="col-sm-3 text-right control-label col-form-label" >Reginal Center Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="reginal_center_name"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value=""><?php echo $reginal_center_name; ?></option>
								 																							 <?php echo $reginal_centers_name; ?>
								 																			 </select>
								 																	 </div>
								 																</div>
																							
														
														 <div class="" align="center">
																 <div class="card-body">
																		 <button type="submit" name="Update" class="btn btn-primary">Update</button>
																</div>
														 </div>
												 </form>
											 </div>
									 </div>
							 </div>
							 <?php include '../mainstuff/footer.php'; ?>
					 </div>
					 <?php include '../mainstuff/allquery.php'; ?>
					 <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
					 <script src="../assets/libs/select2/dist/js/select2.min.js"></script>

				 <script>
							 $(".select2").select2();
					 </script>
	 </body>
</html>
<?php
		 if(isset($_POST['Update'])){

				$paddy_issue_id =$_POST['paddy_issue_id'];
				 $paddy_type =$_POST['paddy_type'];
				 $total_weight =$_POST['total_weight'];
				 $selling_amount =$_POST['1kg_selling_amount'];
				 $total_amount = $total_weight * $selling_amount;
				 $supplier_name =$_POST['supplier_name'];
				 $vachile_name =$_POST['vachile_name'];
				 $reginal_center_name =$_POST['reginal_center_name'];
				 			

			 $sql = "update paddy_issue set paddy_issue_id='$paddy_issue_id', paddy_type='$paddy_type', total_weight='$total_weight', 1kg_selling_amount='$selling_amount', total_amount='$total_amount', supplier_name='$supplier_name', vachile_name='$vachile_name', reginal_center_name='$reginal_center_name' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="paddy_issue.php";</script>';

				 }

		 }


?>
<?php } ?>