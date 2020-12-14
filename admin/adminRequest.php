<?php
require '../product.php';
require '../Dbcon.php';
$dbcon =new dbcon();
$Product = new product();


if (isset($_GET['fetchCategory'])) {
    $data = $Product->fetchCategory($dbcon-> conn);
    echo $data;
}
?>