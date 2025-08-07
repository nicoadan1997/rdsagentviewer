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

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
       <?php  


        session_start();
        if(isset($_SESSION['user_id'])){

             include("sidebar.php");

        }else{

             echo "<script>window.location.href='login.php';</script>";
        }
     

       ?>


        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
            
                    <?php

                    include("topbar.php"); 

                      ?>    


            <div class="container-fluid">



        
                <!-- Begin Page Content -->
                <div class="container-fluid">



           

                    <!-- Page Heading -->
                  
                <div class="row">


                    <div class="col-xl-3 col-md-6 mb-4">
                    </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <center>
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                                TOWER SERVER</div>

                                                   <?php 

                                                   $getBU = $_GET["BU"];
                                
                                                    include("connections.php");
                                      $load_server = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLTOWER FROM ServerDetails WHERE Brand LIKE '%HP%' AND BU='$getBU' OR Brand LIKE '%Dell%' AND BU='$getBU'");
                                                    $rowtower = sqlsrv_fetch_array($load_server);

                                                    echo ' <div class="h5 mb-0 font-weight-bold text-gray-800">'.$rowtower["ALLTOWER"].' UNIT </div>';
 
                                                ?>    
                                         </center>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-black-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">

                                            <center>
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">
                                                DESKTOP SERVER</div>

                                            <?php 

                                                   $getBU = $_GET["BU"];
                                
                                          include("connections.php");
                                      $load_server = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLDESKTOP FROM ServerDetails WHERE Brand LIKE '%LENOVO%' AND BU='$getBU'");
                                                    $rowdesktop = sqlsrv_fetch_array($load_server);

                                                    echo ' <div class="h5 mb-0 font-weight-bold text-gray-800">'.$rowdesktop["ALLDESKTOP"].' UNIT </div>';
 
                                                ?>    

                                            </center>

                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-black-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-xl-3 col-md-6 mb-4">
                    </div>



                    <div class="row">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">

                            <?php  

                                if($_GET["BU"] == "RDS"){

                                echo "<h6 class='m-0 font-weight-bold text-primary'>Robinsons Department Store - Server </h6>";

                                }else if($_GET["BU"] == "RTI"){

                                 echo "<h6 class='m-0 font-weight-bold text-primary'>Robinsons Toys Incorporated - Server</h6>";

                                }else if($_GET["BU"] == "SPATIO"){

                                     echo "<h6 class='m-0 font-weight-bold text-primary'>SPATIO - Server</h6>";

                                
                                }else if($_GET["BU"] == "RBY"){

                                     echo "<h6 class='m-0 font-weight-bold text-primary'>Benefit, Shiseido CPB - Server</h6>";

                                }

                                else{

                                        echo "<h6 class='m-0 font-weight-bold text-primary'>SOLE ACADEMY - Server</h6>";


                                }



                            ?>
                          
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">

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

                                        $load_server = sqlsrv_query($conn,"SELECT * FROM ServerDetails INNER JOIN ITSupport ON ServerDetails.ItSupportId = ITSupport.Id  WHERE BU = '$getBU' ");

                                        while($row = sqlsrv_fetch_array($load_server)){

                                            
                                        echo " <tr data-toggle='modal' data-target='#rdsid".$row["Id"]."'>";

                            
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


                                        $load_pos  = sqlsrv_query($conn,"SELECT COUNT(*) AS ALLPOS FROM PosDetails WHERE PosDetails.STORECODE = ".$row["StoreCode"]." ");
                                        $rowserver = sqlsrv_fetch_array($load_pos);


                                        echo "<div class='modal fade'id='rdsid".$row["Id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                  <div class='modal-dialog modal-xl' role='document'>
                                                    <div class='modal-content'>
                                                      <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>".$row["StoreName"]." | STORE CODE : ".$row["StoreCode"]."  </h5>  
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                          <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class='modal-body'>

                                                          <div class='card mb-4 py-3 border-left-success'>
                                                            <div class='card-body'>
                                                             SQL SERVER  : ".$row["SqlServerVersion"]."  | ".$row["SqlServerEdition"]."
                                                            </div>
                                                        </div>

                                                          <div class='card mb-4 py-3 border-left-info'>
                                                            <div class='card-body'>
                                                             STORAGE  : ".$row["Storage"]."  
                                                            </div>
                                                        </div>

                                                        <div class='card mb-4 py-3 border-left-info'>
                                                            <div class='card-body'>
                                                             CROWDSTRIKE VERSION  : ".$row["CrowdStrikeVersion"]."  | AGENT VERSION : ".$row["AgentVersion"]."
                                                            </div>
                                                        </div>

                                                        <div class='card mb-4 py-3 border-left-warning'>
                                                            <div class='card-body'>
                                                             TOTAL POS : ".$rowserver["ALLPOS"]."  | PLU COUNT: ".$row["PLU"]."
                                                            </div>
                                                        </div>


                                                        <div class='card mb-4 py-3 border-left-warning'>
                                                            <div class='card-body'>
                                                             LOCATION : ".$row["SupportGroup"]."  | IT SUPPORT : ".$row["FullName"]."
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

</body>

</html>