
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{

?>


<?php
if (isset($_GET['edit_reginal_center'])){

		$id = $_GET['edit_reginal_center'];

		$sql = "select * from reginal_center where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$reg_center_id =$row['reg_center_id'];
		$reg_center_name =$row['reg_center_name'];
		$reg_center_telno =$row['reg_center_telno'];
		$reg_center_email =$row['reg_center_email'];
		$reg_center_address =$row['reg_center_address'];
		
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
																								<label for="reg_center_id" class="col-sm-3 text-right control-label col-form-label">Reginal Center ID</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="reg_center_id" value="<?php echo $reg_center_id; ?>" autocomplete="off" required class="form-control"  id="reg_center_id" placeholder="Reginal Center ID">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="reg_center_name" class="col-sm-3 text-right control-label col-form-label">Reginal Center Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="reg_center_name" value="<?php echo $reg_center_name; ?>" autocomplete="off" required class="form-control"  id="reg_center_name" placeholder="Reginal Center Name">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="reg_center_telno" class="col-sm-3 text-right control-label col-form-label">Reginal Center Phone Number</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="reg_center_telno" value="<?php echo $reg_center_telno; ?>" autocomplete="off" required class="form-control"  id="reg_center_telno" placeholder="Reginal Center Phone Number">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="reg_center_email" class="col-sm-3 text-right control-label col-form-label">Reginal Center Email</label>
																											 <div class="col-sm-6">
																												 <input type="email" name="reg_center_email" value="<?php echo $reg_center_email; ?>" autocomplete="off" required class="form-control"  id="reg_center_email" placeholder="Reginal Center Email">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="reg_center_address" class="col-sm-3 text-right control-label col-form-label">Reginal Center Address</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="reg_center_address" value="<?php echo $reg_center_address; ?>" autocomplete="off" required class="form-control"  id="reg_center_address" placeholder="Reginal Center Address">
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

			$reg_center_id=$_POST['reg_center_id'];
			$reg_center_name=$_POST['reg_center_name'];
			$reg_center_telno=$_POST['reg_center_telno'];
			$reg_center_email=$_POST['reg_center_email'];
			$reg_center_address=$_POST['reg_center_address'];
						

			 $sql = "update reginal_center set reg_center_id='$reg_center_id', reg_center_name='$reg_center_name', reg_center_telno='$reg_center_telno', reg_center_email='$reg_center_email', reg_center_address='$reg_center_address' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="reginal_center.php";</script>';

				 }

		 }


?>
<?php } ?>
