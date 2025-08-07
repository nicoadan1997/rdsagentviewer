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

    <!-- Custom styles for this template-->
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
                        <h1 class="h3 mb-0 text-gray-800"> </h1>
                   
                    </div>




                    <!-- Content Row -->
            <div class="row">   


                      <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">WINCOR
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">

                                                      <?php  

                                                        $getBU = $_GET["BU"];

                                                         include("connections.php");

                                                         $load_poswincor = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM PosDetails WHERE SERIAL LIKE '%59G%' AND BU='$getBU' OR SERIAL LIKE '%59E%' AND BU='$getBU' OR SERIAL LIKE '%59H%' AND BU='$getBU'");
                                                         $wincorrow = sqlsrv_fetch_array($load_poswincor);

                                                         $load_allpos = sqlsrv_query($conn, "SELECT COUNT(*) AS ALLTOTAL FROM PosDetails");
                                                         $rowpos = sqlsrv_fetch_array($load_allpos);

                                                         $win_percent =   $wincorrow["TOTAL"] / $rowpos["ALLTOTAL"] * 100; 

                                                    ?>

                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $wincorrow["TOTAL"]; ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">


                                                        <?php 
                                                        echo '<div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: '.$win_percent.'%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div> ';

                                                              ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><button class="btn btn-danger">
                                            <i class="fas fa-clipboard-list fa-2x text-light-300"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                


                      
                      <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">HP
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                   
                                                    <?php  

                                                         include("connections.php");

                                                         $load_hp = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM PosDetails WHERE SERIAL LIKE '%4CE%' AND BU='$getBU'");
                                                         $hp_row = sqlsrv_fetch_array($load_hp);

                                                         $hp_percent =   $hp_row["TOTAL"] / $rowpos["ALLTOTAL"] * 100; 

                                                    ?>


                                        
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $hp_row["TOTAL"];  ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                      
                                                        <?php 
                                                        echo '<div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: '.$hp_percent.'%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div> ';

                                                              ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-auto"><button class="btn btn-danger">
                                            <i class="fas fa-clipboard-list fa-2x text-light-300"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                      <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">POSIFLEX
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">

                                                     <?php  

                                                         include("connections.php");

                                                         $load_posiflex = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM PosDetails WHERE SERIAL LIKE '%TXN%' AND BU='$getBU' OR SERIAL LIKE '%TXM%' AND BU='$getBU' OR SERIAL LIKE '%TXI%' AND BU='$getBU' OR SERIAL LIKE '%TMX%' AND BU='$getBU' ");
                                                         $posiflex_row = sqlsrv_fetch_array($load_posiflex);

                                                         $posiflex_percent =   $posiflex_row["TOTAL"] / $rowpos["ALLTOTAL"] * 100; 

                                                    ?>


                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $posiflex_row["TOTAL"];?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">

                                                         <?php 
                                                        echo '<div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: '.$posiflex_percent.'%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div> ';

                                                              ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-auto"><button class="btn btn-danger">
                                            <i class="fas fa-clipboard-list fa-2x text-light-300"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                         <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-sm font-weight-bold text-danger text-uppercase mb-1">NCR
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                      <?php  

                                                         include("connections.php");

                                                         $load_ncr = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM PosDetails WHERE SERIAL LIKE '%NHY%' AND BU='$getBU' OR SERIAL LIKE '%56-%' AND BU='$getBU'");
                                                         $ncr_row = sqlsrv_fetch_array($load_ncr);

                                                         $ncr_percent =   $ncr_row["TOTAL"] / $rowpos["ALLTOTAL"] * 100; 

                                                    ?>


                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $ncr_row["TOTAL"];  ?></div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                          <?php 
                                                        echo '<div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: '.$ncr_percent.'%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div> ';

                                                              ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="col-auto"><button class="btn btn-danger">
                                            <i class="fas fa-clipboard-list fa-2x text-light-300"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <div id="pricing" class="container-fluid">

                  <div class="d-none d-md-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group"  style="margin-bottom: 20px";>
                            <input type="text" class="form-control bg-gray border-2 small" placeholder="Search for..."
                                aria-label="Search" placeholder="Search" aria-describedby="basic-addon2" id="myInput">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                  
                  
                  <div class="row slideanim" id="myTable">

                <?php

                        include("connections.php");


                         $getBU = $_GET["BU"];
                         $countposno = 0;

                        $load_store = sqlsrv_query($conn,"SELECT * FROM Stores INNER JOIN ITSupport ON Stores.ITSupportId = ITSupport.Id WHERE Stores.BU = '$getBU'");
                        while($row = sqlsrv_fetch_array($load_store)){

                            echo "    <div class='col-xl-2 col-md-5 mb-3' id='list'>
                                      <div class='panel panel-default text-center'>
                                        <div class='panel-heading'>
                                          <label>".$row["StoreName"]."</label>
                                           <h4>".$row["StoreCode"]."</h4>
                                        </div>
                                        ";

                                    $load_pos = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM PosDetails WHERE STORECODE = ".$row["StoreCode"]." AND BU='$getBU'");
                                    $countrow = sqlsrv_fetch_array($load_pos);

                                    $load_online = sqlsrv_query($conn, "SELECT COUNT(*) AS ONLINE FROM PosDetails WHERE STORECODE = ".$row["StoreCode"]." AND BU='$getBU' AND Status='online' ");
                                    $countonline = sqlsrv_fetch_array($load_online);

                                    $load_offline = sqlsrv_query($conn, "SELECT COUNT(*) AS OFFLINE FROM PosDetails WHERE STORECODE = ".$row["StoreCode"]." AND BU='$getBU'  AND Status='offline' ");
                                    $countoffline = sqlsrv_fetch_array($load_offline);
                  
                                        
                                        echo"
                                          <div class='panel-body'>
                                            <br>
                                          <p><strong>".$countrow["TOTAL"]."</strong> REG POS</p>
                                          <p><strong></strong> NO DATA - ROVING POS</p>
                                          <p>".$countonline["ONLINE"]." ONLINE | ".$countoffline["OFFLINE"]." OFFLINE</p>
                                          <p>IT : <strong>".$row["FullName"]."</strong> </p>
                                        </div>";

                                    
                                          echo" <div class='panel-footer'>
                                            
                                              <button class='btn btn-lg' data-toggle='modal' data-target='#code".$row["StoreCode"]."'>VIEW MORE</button>
                                            </div>
                                          </div>      
                                        </div>";






                                        echo '<div class="modal fade" id="code'.$row["StoreCode"].'">
                                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                                  <div class="modal-content">
                                                  
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                      <h4 class="modal-title">'.$row["StoreName"].' | '.$row["StoreCode"].'</h4>
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <div class="modal-body">';
                                                      

                                             echo  '

                                             <div class="card-body">
                                             <div class="table-responsive">

                                                    <table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                        <thead>
                                                         <tr>   
                                                                <th class="text-sm font-weight-bold">POSNO</th>
                                                                <th class="text-sm font-weight-bold">S/N</th>
                                                                <th class="text-sm font-weight-bold">PERMIT</th>
                                                                <th class="text-sm font-weight-bold">MIN</th>
                                                                <th class="text-sm font-weight-bold">SPM</th>
                                                                <th class="text-sm font-weight-bold">IP ADD</th>
                                                                <th class="text-sm font-weight-bold">PRINTER</th>
                                                                <th class="text-sm font-weight-bold">SCANNER</th>
                                                                <th class="text-sm font-weight-bold">STATUS</th>
                                                        

                                                            </tr>
                                                       

                                                        </thead>
                                                     
                                                        <tbody>';

                                                 $load_pos = sqlsrv_query($conn,"SELECT * FROM PosDetails WHERE PosDetails.STORECODE = ".$row["StoreCode"]." ");
                                                 while($rowpos = sqlsrv_fetch_array($load_pos)){

                                                 if($rowpos["Status"] == "online"){

                                                    echo " <tr class='border-left-success'>";

                                                 }else{

                                                     echo " <tr class='border-left-danger'>";
                                                 }   

                                                    echo  "<th class='text-xs font-weight-bold text-gray-800'>".$rowpos["POSNO"]."</th>
                                                        <th class='text-xs font-weight-bold' >".$rowpos["SERIAL"]."</th>
                                                        <th class='text-xs font-weight-bold'>".$rowpos["PERMIT"]."</th>
                                                         <th class='text-xs font-weight-bold'>".$rowpos["MIN"]."</th>
                                                        <th class='text-xs font-weight-bold'>".$rowpos["SPM"]."</th>
                                                        <th class='text-xs font-weight-bold'>".$rowpos["IPAddress"]."</th>
                                                        <th class='text-xs font-weight-bold'>".$rowpos["PRINTERMODEL"]."</th>
                                                        <th class='text-xs font-weight-bold'>".$rowpos["SCANNER"]."</th>";


                                                        if($rowpos["Status"] == "online"){

                                                       echo " <th><lable class='btn btn-success btn-circle btn-sm'><i class='fas fa-check'></i></label></th>";
                                                        }else{

                                                            echo " <th><lable class='btn btn-danger btn-circle btn-sm'><i class='fas fa-plus'></i></label></th>";
                                                        }
                                                       
                                                   echo "</tr>";

                                                 }

                                                    echo' </tbody>
                                                        </table>
                                                    </div> </div>  

                                                    '; 


                                                    echo '</div>
                                                    
                                                    <!-- Modal footer -->
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>';
   
                        }


                    ?>  

                    



                 </div>
             </div>




                


                    <div class="row">

                   
                       

             
                    <div class="row">

                    
                       

                    </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

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

       <script>
        $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable #list").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
    
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


    <!-- Bootstrap core JavaScript-->
   
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

  
</body>

</html>