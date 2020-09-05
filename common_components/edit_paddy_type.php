
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{
?>


<?php
if (isset($_GET['edit_paddy_type'])){

		$id = $_GET['edit_paddy_type'];

		$sql = "select * from paddy_type where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$paddy_name =$row['paddy_name'];
			
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
																	 <label for="farmer_name" class="col-sm-3 text-right control-label col-form-label">Paddy Name</label>
																		<div class="col-sm-6">
																			<input type="text" name="paddy_name" value="<?php echo $paddy_name; ?>" autocomplete="off" required class="form-control"  id="paddy_name" placeholder="Paddy Name">
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

				 <script>
							 $(".select2").select2();
					 </script>
	 </body>
</html>
<?php
		 if(isset($_POST['Update'])){

			$paddy_name=$_POST['paddy_name'];
			

			 $sql = "update paddy_type set paddy_name='$paddy_name' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="paddy_type.php";</script>';

				 }

		 }


?>
<?php } ?>