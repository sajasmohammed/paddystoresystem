
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}else{

?>


<?php
if (isset($_GET['edit_bank'])){

		$id = $_GET['edit_bank'];

		$sql = "select * from bank where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$bank_name = $row['bank_name'];
		$bank_branch = $row['bank_branch'];
		$bank_account_no = $row['bank_account_no'];
		$amount = $row['amount'];
																																								
		
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
																								<label for="bank_name" class="col-sm-3 text-right control-label col-form-label">Bank Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="bank_name" value="<?php echo $bank_name; ?>" autocomplete="off" required class="form-control"  id="bank_name" placeholder="Bank Name">
																											 </div>
																								</div>
																								<div class="form-group row">
																								<label for="bank_branch" class="col-sm-3 text-right control-label col-form-label">Branch Name</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="bank_branch" value="<?php echo $bank_branch; ?>" autocomplete="off" required class="form-control"  id="bank_branch" placeholder="Branch Name">
																											 </div>
																								</div>
																								<div class="form-group row">
																								<label for="bank_account_no" class="col-sm-3 text-right control-label col-form-label">Account Number</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="bank_account_no" value="<?php echo $bank_account_no; ?>" autocomplete="off" required class="form-control"  id="bank_account_no" placeholder="Account Number">
																											 </div>
																								</div>
																								<div class="form-group row">
																								<label for="amount" class="col-sm-3 text-right control-label col-form-label">Amount</label>
																											 <div class="col-sm-6">
																												 <input type="text" name="amount" value="<?php echo $amount; ?>" autocomplete="off" required class="form-control"  id="amount" placeholder="Amount">
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

			$bank_name=$_POST['bank_name'];
			$bank_branch=$_POST['bank_branch'];
			$bank_account_no=$_POST['bank_account_no'];
			$amount	=$_POST['amount'];
						

			$sql = "update bank set bank_name='$bank_name', bank_branch='$bank_branch', bank_account_no='$bank_account_no', amount='$amount' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="bank.php";</script>';

				 }

		 }


?>
<?php } ?>