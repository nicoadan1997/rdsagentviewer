<?php  

$connection_success = false;
$serverName = "10.78.28.250\\edgedc";
$connectionInfo = array( "Database"=>"RDSCLUSTERCENTRAL", "UID"=>"RDSCENTRAL", "PWD"=>"S3cur1tyjfa@@");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     
     $connection_success = true;

}else{

     $connection_success = false;
     echo "<script>window.location.href='login.php';</script>";
     die( print_r( sqlsrv_errors(), true));

    
}

?>