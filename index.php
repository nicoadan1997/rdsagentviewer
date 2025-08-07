<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>RDS Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

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

                 <?php  include("topbar.php"); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                       
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                  <div class='col-xl-3 col-md-6 mb-4' id='list'>
                      <div class='panel panel-default text-center'>
                             <div class='panel-heading'>
                                  <label>TOTAL STORES</label>   

                               <?php 
                                
                                    include("connections.php");

                                    $load_stores = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLSTORES FROM Stores");
                                    $rowstores = sqlsrv_fetch_array($load_stores);

                                    echo '<h4>'.$rowstores["ALLSTORES"].'</h4>';

                                ?>    
                              

                             </div>

                                
                    </div>
                 </div>




                <div class='col-xl-3 col-md-6 mb-4' id='list'>
                      <div class='panel panel-default text-center'>
                             <div class='panel-heading'>
                                          <label>TOTAL WORKSTATIONS</label>
                                      <?php 
                                
                                    include("connections.php");

                                    $load_workstation = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLWORKSTATION FROM WorkstationDetails");
                                    $rowwork = sqlsrv_fetch_array($load_workstation);

                                    echo '<h4>'.$rowwork["ALLWORKSTATION"].'</h4>';

                                ?>    
                              
                             </div>
     
                    </div>
                 </div>


                  <div class='col-xl-3 col-md-6 mb-4' id='list'>
                      <div class='panel panel-default text-center'>
                             <div class='panel-heading'>
                                          <label>TOTAL SERVERS </label>
                                            <?php 
                                
                                    include("connections.php");

                                    $load_server = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLSERVER FROM ServerDetails");
                                    $rowserver = sqlsrv_fetch_array($load_server);

                                    echo '<h4>'.$rowserver["ALLSERVER"].'</h4>';

                                     ?>    
                             </div>
                    </div>
                 </div>




                  <div class='col-xl-3 col-md-6 mb-4' id='list'>
                      <div class='panel panel-default text-center'>
                             <div class='panel-heading'>
                                          <label>TOTAL POS</label>
                                 <?php 
                                
                                    include("connections.php");

                                    $load_pos = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLPOS FROM PosDetails");
                                    $rowpos = sqlsrv_fetch_array($load_pos);

                                    echo '<h4>'.$rowpos["ALLPOS"].'</h4>';

                                     ?>    
                             </div>
                    </div>
                 </div>




                  <div class='col-xl-4 col-md-6 mb-4' id='list'>
                      <div class='panel panel-default text-center'>
                             <div class='panel-heading'>

                                <?php  

                                    include("connections.php");

                                    $daytoday = date("l");
                                    date_default_timezone_set("America/New_York");
                                    echo "   <h5>IT SUPPORT DAY OFF (".$daytoday.") </h5> ";

                                ?>
                                
                             </div>

                               <div class='panel-body'>

                        
                                <?php  


                                    $load_itsupport = sqlsrv_query($conn,"SELECT * FROM ITSupport WHERE DayOff ='$daytoday' ");

                                    while($row = sqlsrv_fetch_array($load_itsupport)){

                                                echo '   
                                            <div class="mb-4">
                                            <div class="card border shadow h-100 py-2" style="border-radius:0px;">
                                                <div class="card-body">
                                                    <div class="row no-gutters align-items-center">
                                                        <div class="col mr-2">
                                                            <div class="text-sm font-weight-bold text-black text-uppercase mb-1">
                                                             '.$row["SupportGroup"].'  | '.$row["Role"].' - '.$row["FullName"].'</div>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';


                                            
                                      

                                    }



                                ?>
                                
                    

                                </div>


                            </div>

                    </div>




                       
                        </div>

                </div>



                   </div>
                <!-- /.container-fluid -->

            </div>
    
        
        </div>
        <!-- End of Content Wrapper -->

    </div>


    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>