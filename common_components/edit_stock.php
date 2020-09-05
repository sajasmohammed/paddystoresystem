
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
$reginal_center_name="";
$sql=mysqli_query($conn,"select * from reginal_center");
if (mysqli_num_rows($sql)) {
  while ($row=mysqli_fetch_array($sql)) {
        $reginal_center_name.='<option value='.$row['reg_center_name'].'>'.$row['reg_center_name'].'</option>';
  }
}
?>

<?php
if (isset($_GET['edit_stock'])){

		$id = $_GET['edit_stock'];

		$sql = "select * from stock where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$paddy_types = $row['paddy_type'];
		$total_wieght = $row['total_wieght'];
		$reg_center_names = $row['reg_center_name'];
																																								
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
								 																 <label for="paddy_type"  class="col-sm-3 text-right control-label col-form-label" >Paddy Type</label>
								 																	<div class="col-md-6">
								 																			 <select name="paddy_type" required class="select2 form-control custom-select" style="width: 100%; height:36px;">
																															<option value="<?php echo $paddy_types; ?>"> <?php echo $paddy_types; ?></option> 
																											  				<option value="">Select</option>
								 																							<?php echo $paddy_name; ?>
								 																			 </select>
								 																	 </div>
								 															 </div>

																								<div class="form-group row">
																										 <label for="total_wieght" class="col-sm-3 text-right control-label col-form-label">Total Wieght</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="total_wieght" value="<?php echo $total_wieght; ?>" autocomplete="off" required class="form-control"  id="total_wieght" placeholder="Total Wieght">
																											 </div>
																								</div>
																								<div class="form-group row">
								 																 <label for="reg_center_name"  class="col-sm-3 text-right control-label col-form-label" >Reginal Center Name</label>
								 																	<div class="col-md-6">
								 																			 <select name="reg_center_name"  value="<?php echo $reginal_center_name; ?>"  required class="select2 form-control custom-select" style="width: 100%; height:36px;">
																											  				<option value="<?php echo $reg_center_names; ?>"> <?php echo $reg_center_names; ?></option> 
																											  				<option value="">Select</option>
								 																							 <?php echo $reginal_center_name; ?>
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

			$paddy_type =$_POST['paddy_type'];
			$total_wieght =$_POST['total_wieght'];
			$reg_center_name =$_POST['reg_center_name'];
							

			 $sql = "update stock set paddy_type='$paddy_type', total_wieght='$total_wieght', reg_center_name='$reg_center_name' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="stock.php";</script>';

				 }

		 }


?>
<?php  } ?>