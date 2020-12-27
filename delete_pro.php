<?php
include('includes/product.php');
$pro=new product();
$pro->delete_product($_GET['id']);
header("location:manage_products.php");
?>