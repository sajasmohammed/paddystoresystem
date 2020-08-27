
<?php
	include('../function.php');

	if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../Index.php');
	}

?>
<?php

    if(isset($_GET['delete_bank'])){

        $id = $_GET['delete_bank'];

        $sql = "delete from bank where row_id='$id'";

        $run = mysqli_query($conn,$sql);

        if($run){

            echo "<script>alert('One of data has been Deleted')</script>";
			echo '<script type="text/javascript"> window.location.href="bank.php";</script>';

        }

    }

?>
