
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}

?>
<?php

    if(isset($_GET['delete_paddy_issue'])){

        $id = $_GET['delete_paddy_issue'];

        $sql = "delete from paddy_issue where row_id='$id'";

        $run = mysqli_query($conn,$sql);

        if($run){

            echo "<script>alert('One of your Register Farmer has been Deleted')</script>";
			echo '<script type="text/javascript"> window.location.href="paddy_issue.php";</script>';

        }

    }

?>
