<?php include 'function.php'; ?>
 <?php

 if (isset($_POST["changepassword"])) {
   $p1=$_POST["password_1"];
   $p2=$_POST["password_2"];
   if ($p1 == $p2)
   			{
          $hashed_password=password_hash($p1,PASSWORD_DEFAULT);

          $sql = "UPDATE users SET password='$hashed_password'";
          if (mysqli_query($conn, $sql)) {
            echo '<script type="text/javascript"> alert("Successfully Password Changed");</script>';
            echo '<script type="text/javascript"> window.location.href="main.php";</script>';
          } else {
            echo '<script type="text/javascript"> alert("Current Password Is Not Correct");</script>';
   	      }
          mysqli_close($conn);
        }
}
?>

<!DOCTYPE html>
<html dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>Change Password Page</title>
    <link href="./dist/css/style.min.css" rel="stylesheet">
</head>
<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img src="./assets/images/logo.png" alt="logo" /></span>
                    </div>
                    <form class="form-horizontal m-t-20" id="loginform" method="post" action="changepassword.php">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password_1" autocomplete="off" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                        <input type="password" name="password_2" autocomplete="off" class="form-control form-control-lg" placeholder="Confirm_Password" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-primary float-right" name="changepassword" type="submit">Change Password</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    $('#to-login').click(function(){

        $("#recoverform").hide();
        $("#loginform").fadeIn();
    });
    </script>
</body>
</html>
