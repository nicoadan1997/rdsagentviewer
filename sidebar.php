
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-clipboard-list fa-2x"></i>
                </div>
                <div class="sidebar-brand-text mx-3">RDS DASHBOARD <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                MAIN TAB
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWorkstation"
                    aria-expanded="true" aria-controls="collapseWorkstation">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>WORKSTATION</span>
                </a>
                <div id="collapseWorkstation" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Stores</h6>
                        <a class="collapse-item" href="workstation.php?BU=RDS">RDS</a>
                        <a class="collapse-item" href="workstation.php?BU=RTI">RTI</a>
         
                        <a class="collapse-item" href="workstation.php?BU=SPATIO">SPATIO</a>
                        <a class="collapse-item" href="workstation.php?BU=SFI">SFI</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServer"
                    aria-expanded="true" aria-controls="collapseServer">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>SERVER</span>
                </a>
                <div id="collapseServer" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Stores</h6>
                       <a class="collapse-item" href="server.php?BU=RDS">RDS</a>
                        <a class="collapse-item" href="server.php?BU=RTI">RTI</a>
                        <a class="collapse-item" href="server.php?BU=RBY">RBY</a>
                        <a class="collapse-item" href="server.php?BU=SPATIO">SPATIO</a>
                        <a class="collapse-item" href="server.php?BU=SFI">SFI</a>
                    </div>
                </div>
            </li>

             <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePOS"
                    aria-expanded="true" aria-controls="collapsePOS">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>POS</span>
                </a>
                <div id="collapsePOS" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Stores</h6>
                        <a class="collapse-item" href="pos.php?BU=RDS">RDS</a>
                        <a class="collapse-item" href="pos.php?BU=RTI">RTI</a>
                        <a class="collapse-item" href="pos.php?BU=RBY">RBY</a>
                        <a class="collapse-item" href="pos.php?BU=SPATIO">SPATIO</a>
                        <a class="collapse-item" href="pos.php?BU=SFI">SFI</a>
                    </div>
                </div>
            </li>


             <li class="nav-item">
                <a class="nav-link collapsed" href="itassigned.php" aria-expanded="true" aria-controls="collapseITassigned">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>IT SUPPORT</span>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">
 

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>

        <!-- End of Sidebar -->