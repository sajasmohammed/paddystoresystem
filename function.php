<?php
	session_start();

	// connect to database
	include 'mainconnection.php';

	// variable declaration
	$username = "";
	$email    = "";
	$errors   = array();
	$success   = array();


	// call the register() function if register_btn is clicked
	if (isset($_POST['register_btn'])) {
		register();
	}

	// call the login() function if register_btn is clicked
	if (isset($_POST['login_btn'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: login.php");
	}

	// REGISTER USER
	function register(){
		global $conn, $errors, $success;

		// receive all input values from the form
		$username    =  e($_POST['username']);
		$email       =  e($_POST['email']);
		$password_1  =  e($_POST['password_1']);
		$password_2  =  e($_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password_1)) {
			array_push($errors, "Password is required");
		}
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			if (isset($_POST['user_type'])) {
				$user_type = e($_POST['user_type']);
				$department = e($_POST['departments']);
				$query = "INSERT INTO users (username, email, user_type, department, password)
						  VALUES('$username', '$email', '$user_type', '$department', '$password')";
				mysqli_query($conn, $query);
				array_push($success, "Registered Successfully...");
				header('location: register.php');
					
			}
			

		}

	}

	// return user array from their id
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM users WHERE id=" . $id;
		$result = mysqli_query($conn, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// LOGIN USER
	function login(){
		global $conn, $username, $errors;
		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);
		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}
		// attempt login if no errors on form
		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($conn, $query);
			if (mysqli_num_rows($results) == 1) { // user found
				// check if user is admin or user
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['user_type'] == 'admin') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				}
				if ($logged_in_user['user_type'] == 'manager') {
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				}
				if ($logged_in_user['user_type'] == 'financeofficer') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				}
				
				if ($logged_in_user['user_type'] == 'collectionofficer') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				}
				if ($logged_in_user['user_type'] == 'storekeeper') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				}
				if ($logged_in_user['user_type'] == 'clerk') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: ./common_components/dashboard.php');
				} 
				
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}


	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}
	function isManager()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'manager' ) {
			return true;
		}else{
			return false;
		}
	}

	function isFinanceOfficer()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'financeofficer' ) {
			return true;
		}else{
			return false;
		}
	}
	function isStorekeeper()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'storekeeper' ) {
			return true;
		}else{
			return false;
		}
	}
	function isClerk()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'clerk' ) {
			return true;
		}else{
			return false;
		}
	}
	function isCollactionOfficer()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'collectionofficer' ) {
			return true;
		}else{
			return false;
		}
	}
		

	function e($val){
		global $conn;
		return mysqli_real_escape_string($conn, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="alert alert-warning" role="alert">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

	function display_success() {
		global $success;

		if (count($success) > 0){
			echo '<div class="alert alert-warning" role="alert">';
				foreach ($success as $successes){
					echo $successes .'<br>';
				}
			echo '</div>';
		}
	}

	

?>
