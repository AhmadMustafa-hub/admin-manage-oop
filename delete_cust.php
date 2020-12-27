<?php
include('includes/customer.php'); 
$cust=new customer();
$cust->delete_customer($_GET['id']);
header("location:manage_customers.php");
?>