<?php
include("config/dbconnect.php");
$id=$_GET['id'];
$sql="DELETE FROM flower_product WHERE product_id=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([
    ':id'=> $id,
]);
echo "Product Deleted.";
header("Location: product.php");

?>