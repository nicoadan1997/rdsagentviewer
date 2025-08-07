<?php  

session_start();

unset($_SESSION['user_id']);
session_unset();
session_destroy();
header('Refresh: 2;url=login.php');
exit();


?>