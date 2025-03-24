<?php
include("config/dbconnect.php");
$id=$_GET['id'];
$sql="DELETE FROM user WHERE id=:id";
$stmt=$conn->prepare($sql);
$stmt->execute([
    ':id'=> $id,
]);
echo "Customer Deleted.";
header("Location: customers.php");
?>