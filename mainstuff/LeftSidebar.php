<aside class="left-sidebar" data-sidebarbg="skin5">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="p-t-30">
            <?php 
            if (!isAdmin() AND !isCollactionOfficer() AND !isManager() AND !isClerk() AND !isFinanceOfficer() AND !isStorekeeper()) {
                header('location: ../Index.php');
             }else{
                echo  
                '<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Home</span></a></li>';
            }

            if(isAdmin()){
                echo  '
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_price.php" aria-expanded="false"><i class="mdi mdi-cash-usd"></i><span class="hide-menu">Paddy Price List</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_type.php" aria-expanded="false"><i class="mdi mdi-menu"></i><span class="hide-menu">Paddy Type</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/vechile.php" aria-expanded="false"><i class="mdi mdi-ambulance"></i><span class="hide-menu">Paddy Vechile</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/suplier.php" aria-expanded="false"><i class="mdi mdi-account-switch"></i><span class="hide-menu">Paddy Suplier</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_issue.php" aria-expanded="false"><i class="mdi mdi-cube-send"></i><span class="hide-menu">Paddy Issue</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_buy.php" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Paddy Buy</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/bank.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank</span></a></li>
                <li class="sidebar-item"><a href="../common_components/farmer.php" class="sidebar-link"><i class="mdi mdi-human-child"></i><span class="hide-menu"> Farmer  </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../register.php" aria-expanded="false"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu">Register User</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/reginal_center.php" aria-expanded="false"><i class="mdi mdi-hospital-building"></i><span class="hide-menu">Reginal Center</span></a></li>';

            }
            
            if(isCollactionOfficer()){
                echo '
                <li class="sidebar-item"><a href="../common_components/farmer.php" class="sidebar-link"><i class="mdi mdi-human-child"></i><span class="hide-menu"> Farmer  </span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/stock.php" aria-expanded="false"><i class="mdi mdi-store"></i><span class="hide-menu">Stock</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_buy.php" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Paddy Buy</span></a></li>';
            }
           
            if(isManager()){
                echo '
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/bank.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank</span></a></li>
                <li class="sidebar-item"><a href="../common_components/farmer.php" class="sidebar-link"><i class="mdi mdi-human-child"></i><span class="hide-menu"> Farmer  </span></a></li>';
             }
             if(isClerk()){
                echo  '
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/bank.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_buy.php" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Paddy Buy</span></a></li>';
             }
             if(isFinanceOfficer()){
                echo  '
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/bank.php" aria-expanded="false"><i class="mdi mdi-bank"></i><span class="hide-menu">Bank</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/paddy_buy.php" aria-expanded="false"><i class="mdi mdi-currency-usd"></i><span class="hide-menu">Paddy Buy</span></a></li>';
             }
             if(isStorekeeper()){
                echo  '
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="../common_components/stock.php" aria-expanded="false"><i class="mdi mdi-store"></i><span class="hide-menu">Stock</span></a></li>
                 <li class="sidebar-item"><a href="../common_components/farmer.php" class="sidebar-link"><i class="mdi mdi-account-multiple-plus"></i><span class="hide-menu"> Farmer  </span></a></li>';
             }

             
             
            ?>                
            </ul>
        </nav>
    </div>
</aside>
