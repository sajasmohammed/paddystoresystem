
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}

?>


<?php
if (isset($_GET['add_bank_details'])){

		$id = $_GET['add_bank_details'];

		$sql = "select * from paddy_buy where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$farmer_reg_no =$row['farmer_reg_no'];
		
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
																								<label for="farmer_reg_no" class="col-sm-3 text-right control-label col-form-label">Farmer Register Number</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="farmer_reg_no" value="<?php echo $farmer_reg_no; ?>" autocomplete="off" required class="form-control"  id="farmer_reg_no" placeholder="Reginal Center ID">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="bank_name" class="col-sm-3 text-right control-label col-form-label">Reginal Center Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="bank_name" autocomplete="off" required class="form-control"  id="bank_name" placeholder="Bank Name">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="bank_branch" class="col-sm-3 text-right control-label col-form-label">Bank Branch</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="bank_branch"  autocomplete="off" required class="form-control"  id="bank_branch" placeholder="Bank Branch">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="bank_account_no" class="col-sm-3 text-right control-label col-form-label">Bank Account Number</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="bank_account_no" autocomplete="off" required class="form-control"  id="bank_account_no" placeholder="Bank Account Number">
																											 </div>
																								</div>
																								<div class="form-group row">
																										 <label for="amount" class="col-sm-3 text-right control-label col-form-label">Amount</label>
																											 <div class="col-sm-6">
																												 <input type="number" name="amount"  autocomplete="off" required class="form-control"  id="amount" placeholder="Amount">
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
					 <?php include '../js/script1.js' ?>
	 </body>
</html>
<?php
		 if(isset($_POST['Update'])){

			$farmer_reg_no=$_POST['farmer_reg_no'];
			$bank_name=$_POST['bank_name'];
			$bank_branch=$_POST['bank_branch'];
			$bank_account_no=$_POST['bank_account_no'];
			$amount	=$_POST['amount'];
						

			$sql = "INSERT INTO bank(former_register_no,bank_name,bank_branch,bank_account_no,amount) VALUES ('$farmer_reg_no', '$bank_name', '$bank_branch', '$bank_account_no', '$amount')";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="bank.php";</script>';

				 }

		 }


?>
