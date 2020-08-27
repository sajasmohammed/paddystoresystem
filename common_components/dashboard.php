
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
    <head>
        <?php include '../mainstuff/inhead.php'; ?>
        
		</head>
    <body>
        <?php include '../mainstuff/preloader.php'; ?>
        <div id="main-wrapper">
           
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="main.php">
                <b class="logo-icon p-l-10">
                </b>
                <strong class="text-primary"> <h4>Welcome to PSC</h4></strong>
            </a>
            <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
        </div>
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

            <ul class="navbar-nav float-left mr-auto">

                <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>

            </ul>

            <ul class="navbar-nav float-left">

              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/login.png" alt="user" class="rounded-circle" width="31"></a>
                    <div class="dropdown-menu dropdown-menu-right user-dd animated">
                        <a class="dropdown-item" href=""><i class="ti-user m-r-5 m-l-5"></i>
                          <?php  if (isset($_SESSION['user'])) : ?>
                          <strong class="text-info"><?php echo $_SESSION['user']['username']; ?></strong> <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                          <?php endif ?>
                        </a>
                        <a class="dropdown-item" href="../changepassword.php"><i class="ti-key m-r-5 m-l-5"></i>Change Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../logout.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>

            
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
                                        <li class="breadcrumb-item active" aria-current="page">Dashbord</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="container-fluid">
            
                    <div class="row">
                                                <?php
											        $sql = "select  * from stock";
											        $result = mysqli_query($conn, $sql);
												    $stock_rows=mysqli_num_rows($result);
                                                ?>
                                                <?php
											        $sql = "select  * from paddy_issue";
											        $result = mysqli_query($conn, $sql);
												    $paddy_issue_rows=mysqli_num_rows($result);
                                                ?>
                                                <?php
											        $sql = "select  * from paddy_buy";
											        $result = mysqli_query($conn, $sql);
												    $paddy_buy_rows=mysqli_num_rows($result);
                                                ?>
                                                <?php
											        $sql = "select  * from farmer";
											        $result = mysqli_query($conn, $sql);
												    $farmer_rows=mysqli_num_rows($result);
                                                ?>
                                                <?php
											        $sql = "select  * from reginal_center";
											        $result = mysqli_query($conn, $sql);
												    $reginal_center_rows=mysqli_num_rows($result);
                                                ?>
                                                <?php
											        $sql = "select  * from bank";
											        $result = mysqli_query($conn, $sql);
												    $bank_rows=mysqli_num_rows($result);
                                                ?>
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-hover">
                                                        <div class="box bg-info text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-human-child"></i></h1>
                                                            <a href="farmer.php"><h6 class="text-white">Farmer</h6></a>
                                                            <h6 class="text-white"><?php echo $farmer_rows; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                                <!-- Column -->
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-danger">
                                                        <div class="box bg-danger text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-store-24-hour"></i></h1>
                                                            <a href="reginal_center.php"><h6 class="text-white">Reginal Center</h6></a>
                                                            <h6 class="text-white"><?php echo $reginal_center_rows; ?></h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Column -->
                                                
                                                <!-- Column -->
                                                <?php
													$sql = "SELECT Sum(total_weight) as 'sumcflow' from paddy_issue";
													$run=mysqli_query($conn, $sql);
													    while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_wieght=$rows['sumcflow'];
                                                            
                                                    $sql = "SELECT Sum(total_amount) as 'sumcflow' from paddy_issue";
                                                    $run=mysqli_query($conn, $sql);
                                                        while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_amount=$rows['sumcflow'];
												?>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-danger">
                                                        <div class="box bg-success text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-truck-delivery"></i></h1>
                                                            <a href="paddy_issue.php"><h6 class="text-white">Paddy Issue</h6></a>
                                                            <h4 class="text-white"><?php echo $paddy_issue_rows; ?></h4>
                                                            <h4 class="text-white"><?php echo $cal_wieght; ?> KG</h4>
                                                            <h4 class="text-white"><?php echo $cal_amount; ?> LKR</h4>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- Column -->

                                                <!-- Column -->
                                                <?php
													$sql = "SELECT Sum(total_weight) as 'sumcflow' from paddy_buy";
													$run=mysqli_query($conn, $sql);
													    while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_wieght=$rows['sumcflow'];
                                                            
                                                    $sql = "SELECT Sum(total_amount) as 'sumcflow' from paddy_buy";
                                                    $run=mysqli_query($conn, $sql);
                                                        while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_amount=$rows['sumcflow'];
												?>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-danger">
                                                        <div class="box bg-orange text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-currency-usd"></i></h1>
                                                            <a href="paddy_issue.php"><h6 class="text-white">Paddy Buy</h6></a>
                                                            <h4 class="text-white"><?php echo $paddy_buy_rows; ?></h4>
                                                            <h4 class="text-white"><?php echo $cal_wieght; ?> KG</h4>
                                                            <h4 class="text-white"><?php echo $cal_amount; ?> LKR</h4>

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php }} ?>
                                                <!-- Column -->
                                                
                                                <!-- Column -->
                                                <?php
													$sql = "SELECT Sum(total_wieght) as 'sumcflow' from stock";
													$run=mysqli_query($conn, $sql);
													    while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_wieght=$rows['sumcflow'];
                                                            
                                             	?>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-danger">
                                                        <div class="box bg-warning text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-stocking"></i></h1>
                                                            <a href="stock.php"><h6 class="text-white">Stock</h6></a>
                                                            <h4 class="text-white"><?php echo $stock_rows; ?></h4>
                                                            <h4 class="text-white"><?php echo $cal_wieght; ?> KG</h4>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!-- Column -->
                                                
                                                <!-- Column -->
                                                <?php
													
                                                    $sql = "SELECT Sum(amount) as 'sumcflow' from bank";
                                                    $run=mysqli_query($conn, $sql);
                                                        while ( $rows=mysqli_fetch_array($run)) {
                                                            $cal_amount=$rows['sumcflow'];
												?>
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card card-danger">
                                                        <div class="box bg-orange text-center">
                                                            <h1 class="font-light text-white"><i class="mdi mdi-bank"></i></h1>
                                                            <a href="bank.php"><h6 class="text-white">Bank Transection</h6></a>
                                                            <h4 class="text-white"><?php echo $bank_rows; ?></h4>
                                                            <h4 class="text-white"><?php echo $cal_amount; ?> LKR</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <!-- Column -->
                                                
                                    </div>              
                            </div>
              
					      <?php include '../mainstuff/footer.php'; ?>
    

                    <?php include '../mainstuff/allquery.php'; ?>
                  
		</body>
</html>
