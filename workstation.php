<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RDS DASHBOARD</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
    <?php  

    include("sidebar.php");

    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            
                    <?php

                    include("topbar.php"); 

                      ?>    


            <div class="container-fluid">

                
                    <div class="row">

                   <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">ONLINE DEVICE
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                        
                                        <?php 

                                            include("connections.php");

                                                    $getBU = $_GET["BU"];
                                                    $count_online = 0;
                                                    $count_all = 0 ;
                                                    $average_online = 0; 


                                                    $load_online = sqlsrv_query($conn,"SELECT * FROM WorkstationDetails WHERE BU = '$getBU' ");
                                                    while($row = sqlsrv_fetch_array($load_online)){

                                                        if($row["Status"] == "online"){
                                                        $count_online +=1;
                                                        }

                                                         $count_all +=1;
                                                    }

                                                        $average_online = $count_online / $count_all * 100 ;

                                                    ?>

                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_online;  ?></div>
                                                </div>
                                                <div class="col">

                                                <?php 
                                                    echo "<div class='progress progress-sm mr-2'>
                                                        <div class='progress-bar bg-danger' role='progressbar'
                                                              style='width: ".$average_online."%' aria-valuenow='50' aria-valuemin='0'
                                                            aria-valuemax='100'></div>
                                                        </div>";

                                                    ?>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                
                    <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">OFFLINE DEVICE
                                            </div>
                                            <div class="row no-gutters align-items-center">

                                                 <?php 

                                                    include("connections.php");

                                                    $getBU = $_GET["BU"];
                                                    $count_offline = 0;
                                                    $count_all = 0 ;
                                                    $average_offline = 0; 


                                                    $load_offline = sqlsrv_query($conn,"SELECT * FROM WorkstationDetails WHERE BU = '$getBU' ");
                                                    while($row = sqlsrv_fetch_array($load_offline)){

                                                        if($row["Status"] == "offline"){
                                                        $count_offline +=1;
                                                        }

                                                         $count_all +=1;
                                                    }

                                                        $average_offline = $count_offline / $count_all * 100 ;

                                                    ?>

                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_offline; ?></div>
                                                </div>
                                                <div class="col">
                                                     <?php 

                                                        echo "<div class='progress progress-sm mr-2'>
                                                        <div class='progress-bar bg-danger' role='progressbar'
                                                              style='width: ".$average_offline."%' aria-valuenow='50' aria-valuemin='0'
                                                            aria-valuemax='100'></div>
                                                        </div>";

                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">

                                            <i class="fas fa-clipboard-list fa-2x text-gray-300" ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">MEMBER OF DOMAIN

                                            </div>
                                            <div class="row no-gutters align-items-center">

                                                <?php  

                                                    include("connections.php");

                                                    $getBU = $_GET["BU"];
                                                    $count_domainmember = 0;
                                                    $count_nondomainmember = 0;
                                                    $count_all = 0 ;
                                                    $average_domainmember = 0; 
                                                     $average_nondomainmember = 0;

                                                    $load_domainmember = sqlsrv_query($conn,"SELECT * FROM WorkstationDetails WHERE BU = '$getBU' ");
                                                    while($row = sqlsrv_fetch_array($load_domainmember)){

                                                        if($row["Workgroup"] == "rrg.corp.jgsummit.com"){

                                                        $count_domainmember +=1;


                                                        }else{

                                                             $count_nondomainmember +=1;
                                                        }

                                                         $count_all +=1;
                                                    }

                                                    $average_domainmember = $count_domainmember / $count_all * 100;

                                                     $average_nondomainmember = $count_nondomainmember / $count_all * 100;


                                                ?>


                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $count_domainmember ?>   </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">

                                                        <?php  

                                                            echo "<div class='progress-bar bg-danger' role='progressbar'
                                                            style='width: ".$average_domainmember."%' aria-valuenow='50' aria-valuemin='0'
                                                            aria-valuemax='100'> </div>";
                                                     ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                      <div class="col-xl-3 col-md-6 mb-3">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">NON MEMBER OF DOMAIN
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"> <?php echo $count_nondomainmember; ?>  </div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">

                                                        <?php  

                                                            echo "<div class='progress-bar bg-danger' role='progressbar'
                                                            style='width: ".$average_nondomainmember."%' aria-valuenow='50' aria-valuemin='0'
                                                            aria-valuemax='100'> </div>";
                                                     ?>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#LISTNONMEMBER">
                                            <i class="fas fa-clipboard-list fa-2x text-white-300"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                     <div class="modal fade" id="LISTNONMEMBER">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                          <div class="modal-content">
                          
                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">NON MEMBER OF DOMAIN</h4>
                              <button type="button" class="close" data-dismiss="modal">×</button>
                            </div>
 
                            <div class="modal-body">

                          

                                    <div class="card-body">
                                      <div class="table-responsive">
                                        <table class="table table-hover table-bordered"  width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>   
                                                        <th class="text-xs font-weight-bold">CODE</th>
                                                        <th class="text-xs font-weight-bold">STORE NAME</th>
                                                        <th class="text-xs font-weight-bold">HOST NAME</th>
                                                        <th class="text-xs font-weight-bold">IP ADDRESS</th>
                                                        <th class="text-xs font-weight-bold">OS</th>
                                               
                                                    </tr>
                                               </thead>
                                                     
                                        <tbody>



                                <?php  

                                 $load_nondomain = sqlsrv_query($conn,"SELECT * FROM WorkstationDetails WHERE BU = '$getBU' AND Workgroup ='rrg.corp.jgsummit.com' ");
                                  while($nondomainrow = sqlsrv_fetch_array($load_nondomain)){


                                    echo '<tr>

                                         <th class="text-xs font-weight-bold" >'.$nondomainrow["StoreCode"].'</th>
                                         <th class="text-xs font-weight-bold" >'.$nondomainrow["StoreName"].'</th>
                                        <th class="text-xs font-weight-bold" >'.$nondomainrow["Hostname"].'</th>
                                        <th class="text-xs font-weight-bold" >'.$nondomainrow["IPAddress"].'</th>
                                        <th class="text-xs font-weight-bold" >'.$nondomainrow["OperatingSystem"].'</th>






                                        </tr>';

                                  }




                                ?>
                                         </tbody>
                                     </table>
                                    </div> 
                                </div>  

                          
                            </div>
                            
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                    </div>


                      

                    <!-- Content Row -->



                <!-- Begin Page Content -->
                <div class="container-fluid">

           

                    <!-- Page Heading -->
                  
                <div class="row">

                    <div class="row">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                             <div class='col-sm-6 col-md-6 col-lg-6'>

                            <?php  

                                if($_GET["BU"] == "RDS"){

                                echo "<h6 class='m-0 font-weight-bold text-primary'>Robinsons Department Store - Workstation</h6>";

                                }else if($_GET["BU"] == "RTI"){

                                 echo "<h6 class='m-0 font-weight-bold text-primary'>Robinsons Toys Incorporated - Workstation</h6>";

                                }else if($_GET["BU"] == "SPATIO"){

                                     echo "<h6 class='m-0 font-weight-bold text-primary'>SPATIO - Workstation</h6>";

                                }else{

                                        echo "<h6 class='m-0 font-weight-bold text-primary'>SOLE ACADEMY - Workstation</h6>";



                                }



                            ?>

                            </div>

                          
                      
                            </div>
                          
                        </div>

                       

                        <div class="card-body">

                            <div class="table-responsive">

                                <div id="myTable">

                                <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                     <tr>   
                                            <th>Code</th>
                                            <th>Store Name</th>
                                            <th>Host Name</th>
                                            <th>IP Address</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Processor</th>
                                            <th>OS</th>
                                            <th>Status</th>

                                        </tr>
                                   

                                    </thead>
                                 
                                    <tbody>
                                         <?php 

                                        include("connections.php");




                                        $getBU = $_GET["BU"];

                                        $load_workstation = sqlsrv_query($conn,"SELECT * FROM WorkstationDetails INNER JOIN ITSupport ON ITSupport.Id = WorkstationDetails.ITSupportId WHERE BU = '$getBU' ");

                                        while($row = sqlsrv_fetch_array($load_workstation)){

                                            
                                        echo " <tr data-toggle='modal' data-target='#rdsid".$row["Id"]."' id='listbrand'>";

                            
                                        echo  " <th>".$row["StoreCode"]."</th>
                                            <th>".$row["StoreName"]."</th>
                                            <th>".$row["Hostname"]."</th>
                                             <th>".$row["IPAddress"]."</th>
                                            <th>".$row["Brand"]."</th>
                                            <th>".$row["Model"]."</th>
                                            <th>".$row["Processor"]."</th>
                                            <th>".$row["OperatingSystem"]." Build ".$row["OSBuild"]."</th>";

                                             if($row["Status"] == "online"){

                                         echo " <th class='border-left-success'><lable class='btn btn-success btn-circle btn-sm'><i class='fas fa-check'></i></label></th>";

                                     }else{
                                         echo " <th class='border-left-danger'><lable class='btn btn-danger btn-circle btn-sm'><i class='fas fa-plus'></i></label></th>";
                                     }

                                        echo "</tr>";



                                        echo "<div class='modal fade'id='rdsid".$row["Id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                  <div class='modal-dialog modal-lg' role='document'>
                                                    <div class='modal-content'>
                                                      <div class='modal-header'>
                                                        <h5 class='modal-title' id='exampleModalLabel'>".$row["Hostname"]."</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                          <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class='modal-body'>

                                                             <div class='card shadow mb-4'>
                                                                <div class='card-header bg-danger py-3'>
                                                                    <h6 class='m-0 font-weight-bold text-white'>STORAGE</h6>
                                                                </div>
                                                                <div class='card-body'>
                                                                    <p>".$row["Storage"]."</p>
                                                                </div>
                                                            </div>

                                                             <div class='card shadow mb-4'>
                                                                <div class='card-header py-3 bg-danger'>
                                                                    <h6 class='m-0 font-weight-bold text-white'>SECURITY</h6>
                                                                </div>
                                                                <div class='card-body'>
                                                                      <p> CROWDSTRIKE : ".$row["CrowdStrikeVersion"]."</p>
                                                                       <p> SCCM :  ".$row["SCCMVersion"]."</p>
                                                                         <p> SNOW : ".$row["SnowVersion"]."</p>
                                                                </div>
                                                            </div>

                                                          <div class='card shadow mb-4'>
                                                                <div class='card-header bg-danger py-3'>
                                                                    <h6 class='m-0 font-weight-bold text-white'>AGENT</h6>
                                                                </div>
                                                                <div class='card-body'>
                                                                   <p> SNOW : ".$row["AgentVersion"]."</p>
                                                                </div>
                                                            </div>

                                                              <div class='card shadow mb-4'>
                                                                <div class='card-header bg-danger py-3'>
                                                                    <h6 class='m-0 font-weight-bold text-white'>SUPPORT</h6>
                                                                </div>
                                                                <div class='card-body'>

                                                                    <p> ".$row["SupportGroup"]."</p>
                                                                    <p> IT Support : ".$row["FullName"]."</p>
                                                                </div>
                                                            </div>





                                                    </div>
                                                      <div class='modal-footer'>
                                                        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                                                    
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>";

                                        }

                                       

                                         ?>

                                        
                                    </tbody>
                                </table>

                            </div>
                            </div>
                        </div>
                    </div>

                </div>

                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <p> RDS DASHBOARD Version 1.0</p>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
            

    </script>

</body>

</html>