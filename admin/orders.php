<?php
require_once("config/dbconnect.php");
require_once("data.php");
$orders=getOrders($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>

    </style>
</head>
<body>
<?php
require("admin_header.php");
require("sidebar.php");
?>
<div id="main-content">
    <table border="1" cellpadding="5px" bgcolor="lightblue" 
    style=" z-index: 100px; width: 100%; text-align: center;">
    <tr style="height: 60px;">
    <th>No</th>
    <th>Customer Name</th>
    <th>Address</th>
    <th>Payment Method</th>
    <th>Total Items</th>
    <th>Total Amount</th>
    <th>Action</th>
    <?php foreach($orders as $order){?>
         <tr style="height: 70px;">
         <td><?= $order['ID'] ?></td>
         <td style="width: 22%;"><?= $order['Name'] ?></td>
         <td style="width: 18%;"><?= $order['Address'] ?></td>
         <td style="width: 17%;"><?= $order['Payment'] ?></td>
         <td><?= $order['Items'] ?></td>
         <td>MMK <?= $order['Amount'] ?></td>
         <td style="width: 14%"><a href=<?="orders_delete.php?id=".$order['ID']?>><button class="delete_btn" style="width: 55%; height: 37px; border-radius: 10px;">Delete</button></a></td></td>
    <?php } ?>
    <div style="display:flex; align-items:center; text-align: center; margin-left:20px;">
    <!-- <h3>PRODUCT TABLE</h3> -->
    <!-- <button onclick="openbtn()" style="height:44px; font-size:15px; margin: 15px 0px 15px 5px; letter-spacing:1px; width: 11%; border-radius:10px;">Add Product</button> -->
    </div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>