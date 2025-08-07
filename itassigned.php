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

                  
                  <div class="row slideanim" id="myTable" >
                    

                <?php

                        include("connections.php");


                      

                        $load_itrecord = sqlsrv_query($conn,"SELECT * FROM ITSupport WHERE Role != 'IT Manager'");
                        while($row = sqlsrv_fetch_array($load_itrecord)){

                            echo "    <div class='col-xl-3 col-md-6 mb-4' id='list'>
                                      <div class='panel panel-default text-center'>
                                        <div class='panel-heading'>
                                          <label>".$row["FullName"]."</label>
                                             <br>
                                        <label>".$row["Role"]."</label>
                                           <h4>".$row["SupportGroup"]."</h4>

                                        </div>
                                        ";

                                        echo"
                                          <div class='panel-body'>
                                            <br>

                                          <p><strong>".$row["StoreBasedLocation"]."</strong></p>
                                          <p><strong class='far'>&#xf0e0; ".$row["Email"]."</strong></p>
                                          <p><strong class='material-icons'>&#xe0cf; ".$row["ContactNumber"]."</strong></p>
                                          <p><strong class='far'>&#xf073; ".$row["TimeSchedule"]."</strong></p>
                                            <p>DO : <strong>".$row["DayOff"]."</strong></p>
                                        </div>";


                                        echo" <div class='panel-footer'>
                                            
                                              <button class='btn btn-lg' data-toggle='modal' data-target='#ID".$row["Id"]."'>STORE HANDLE</button>
                                            </div>
                                          </div>      
                                        </div>";
         



                                        echo "<div class='modal fade'id='ID".$row["Id"]."' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                                  <div class='modal-dialog' role='document'>
                                                    <div class='modal-content'>
                                                      <div class='modal-header'>

                                                        <h5 class='modal-title' id='exampleModalLabel'>".$row["FullName"]."</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                          <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class='modal-body'>


                                                      <div class='container mt-3'>
                                              
                                                     <ul class='list-group'>";



                                            $load_countstore = sqlsrv_query($conn, "SELECT COUNT(*) AS TOTAL FROM Stores WHERE Stores.ITSupportId = ".$row["Id"]." ");
                                            $countrow = sqlsrv_fetch_array($load_countstore);
                  
                                        

                                                  $load_stores = sqlsrv_query($conn,"SELECT * FROM Stores WHERE Stores.ITSupportId = ".$row["Id"]."");

                                                  while($rowstores = sqlsrv_fetch_array($load_stores)){

                                                    echo '<li class="list-group-item border-bottom-info border-left-info" style="border-radius:0px; border-bottom-size:1px; margin-bottom:1px;">'.$rowstores["StoreCode"].'  -  '.$rowstores["StoreName"].'</li>';

                                                      
                                                  }
                                                   
                                               echo"  </ul>
                                                    <br>
                                                     <h5>  STORE NO : ".$countrow["TOTAL"]."</h5>

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