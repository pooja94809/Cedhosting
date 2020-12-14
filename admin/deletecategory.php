<?php
require_once('../Dbcon.php');
require_once('../product.php');
$obj = new DbCon();
$obj2 = new Product();
$id=$_GET['id'];
$obj2 -> cat_delete($id,$obj->conn);
?>
