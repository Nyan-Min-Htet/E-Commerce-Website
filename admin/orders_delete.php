<?php
include("config/dbconnect.php");
$id=$_GET['id'];
$sql="DELETE FROM orders WHERE order_id=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([
    ':id'=> $id,
]);
echo "Customer Deleted.";
header("Location: orders.php");

?>