
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{

?>

<?php
if (isset($_GET['edit_farmer'])){

		$id = $_GET['edit_farmer'];

		$sql = "select * from farmer where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);

		$farmer_name = $row['farmer_name'];
		$farmer_nic = $row['farmer_nic'];
		$farmer_mobileno = $row['farmer_mobileno'];

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

														 <div class="card-body">
																								

																								<div class="form-group row">
																										 <label for="farmer_name" class="col-sm-3 text-right control-label col-form-label">Farmer Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_name" value="<?php echo $farmer_name; ?>" autocomplete="off" required class="form-control"  id="farmer_name" placeholder="Farmer Name">
																											 </div>
																								</div>

																								<div class="form-group row">
																										 <label for="farmer_nic" class="col-sm-3 text-right control-label col-form-label">Farmer Nic</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_nic" value="<?php echo $farmer_nic; ?>" autocomplete="off"  required class="form-control" id="farmer_nic" placeholder="Farmer Nic">
																											 </div>
																								</div> 	

																								<div class="form-group row">
																										 <label for="phone-mask" class="col-sm-3 text-right control-label col-form-label">Farmer Mobile Number</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_mobileno" value="<?php echo $farmer_mobileno; ?>" autocomplete="off"  required class="form-control phone-inputmask" id="phone-mask" placeholder="Farmer Mobile Number">
																											 </div>
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
					 <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
					 <script src="../dist/js/pages/mask/mask.init.js"></script>
    
				 <script>
							 $(".select2").select2();
					 </script>
	 </body>
</html>
<?php
		 if(isset($_POST['Update'])){

			$farmer_name = $_POST['farmer_name'];
			$farmer_nic = $_POST['farmer_nic'];
			$farmer_mobileno = $_POST['farmer_mobileno'];


			 $sql = "update farmer set farmer_name='$farmer_name', farmer_nic='$farmer_nic', farmer_mobileno='$farmer_mobileno' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="farmer.php";</script>';

				 }

		 }


?>
<?php } ?>