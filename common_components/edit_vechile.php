
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{

?>


<?php
if (isset($_GET['edit_vechile'])){

		$id = $_GET['edit_vechile'];

		$sql = "select * from vechiles where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$vech_name = $row['vech_name'];
		$vech_type = $row['vech_type'];
		$vech_no = $row['vech_no'];
																																									
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
														<label for="vech_name" class="col-sm-3 text-right control-label col-form-label">Vechile</label>
														 <div class="col-sm-6">
														 <input type="text" name="vech_name" value="<?php echo $vech_name; ?>" autocomplete="off" required class="form-control"  id="vech_name" placeholder="Pad">
														 </div>
													</div>

													<div class="form-group row">
													 <label for="vech_type" class="col-sm-3 text-right control-label col-form-label">Vechile</label>
														 <div class="col-sm-6">
														 <input type="text" name="vech_type" value="<?php echo $vech_type; ?>" autocomplete="off" required class="form-control"  id="vech_type" placeholder="Pad">
														 </div>
													</div>

													<div class="form-group row">
													 <label for="vech_no" class="col-sm-3 text-right control-label col-form-label">Vechile</label>
														 <div class="col-sm-6">
														 <input type="text" name="vech_no" value="<?php echo $vech_no; ?>" autocomplete="off" required class="form-control"  id="vech_no" placeholder="Pad">
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

			$vech_name =$_POST['vech_name'];
			$vech_type =$_POST['vech_type'];
			$vech_no =$_POST['vech_no'];
		  

			 $sql = "update vechiles set vech_name='$vech_name', vech_type='$vech_type', vech_no='$vech_no' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="vechile.php";</script>';

				 }

		 }


?>
<?php  } ?>