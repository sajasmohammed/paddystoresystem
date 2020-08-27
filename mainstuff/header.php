
<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            <a class="navbar-brand" href="#">
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
