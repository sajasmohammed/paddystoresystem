
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}

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
if (isset($_GET['edit_paddy_price'])){

		$id = $_GET['edit_paddy_price'];

		$sql = "select * from paddy_price where row_id='$id'";

		$run = mysqli_query($conn,$sql);

		$row = mysqli_fetch_array($run);
		
		$paddy_type =$row['paddy_type'];
		$buy_price =$row['1kg_buy_price'];
		$selling_price=$row['1kg_selling_price'];
			
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
								 																 <label for="paddy_name"  class="col-sm-3 text-right control-label col-form-label" >Paddy Type</label>
								 																	<div class="col-md-6">
								 																			 <select name="paddy_name"  value="<?php echo $paddy_type; ?>" required class="select2 form-control custom-select" style="width: 100%; height:36px;">
								 																							 <option value="">Select</option>
								 																							 <option value=""></option>
								 																							 <?php echo $paddy_name; ?>
								 																			 </select>
								 																	 </div>
								 															 </div>

														 <div class="card-body">
														 <div class="form-group row">
																	<label for="farmer_reg_no" class="col-sm-3 text-right control-label col-form-label">1KG Buy Price</label>
																	<div class="col-sm-6">
																		 <input type="number" name="1kg_buy_price" value="<?php echo $buy_price; ?>" autocomplete="off" required class="form-control"  id="1kg_buy_price" placeholder="Buy Price">
																		</div>
														 </div>
													

																								

														<div class="form-group row">
																	 <label for="farmer_name" class="col-sm-3 text-right control-label col-form-label">1KG Selling Price</label>
																		<div class="col-sm-6">
																			<input type="number" name="1kg_selling_price" value="<?php echo $selling_price; ?>" autocomplete="off" required class="form-control"  id="1kg_selling_price" placeholder="Selling Price">
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

			$buy_price =$_POST['1kg_buy_price'];
			$selling_price=$_POST['1kg_selling_price'];
			

			 $sql = "update paddy_price set 1kg_buy_price='$buy_price', 1kg_selling_price='$selling_price' where row_id='$id'";

				 $row= mysqli_query($conn,$sql);
				 if($row){

					 echo '<script type="text/javascript"> alert("New record Updated successfully");</script>';
					 echo '<script type="text/javascript"> window.location.href="paddy_price.php";</script>';

				 }

		 }


?>
