<?php
include('includes/category.php'); 
$cat=new category();
$cat->delete_category($_GET['id']);
header("location:manage_category.php");
?>