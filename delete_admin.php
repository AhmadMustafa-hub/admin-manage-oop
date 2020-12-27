<?php
include('includes/admin.php'); 
$admin=new admin();
$admin->delete_admin($_GET['id']);
header("location:manage_admin.php");
?>