<?php 
session_start();
include "includes/config.php";
if (isset($_SESSION['id']) && isset($_SESSION['username']) && isset($_SESSION['role'])) {

 ?>
<?php include('includes/header.php'); ?>
<?php include('includes/leftsidebar.php'); ?>
<?php include('includes/footer.php'); ?>
<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>