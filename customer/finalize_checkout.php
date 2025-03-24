<?php
session_start();
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name=isset($_POST['name']) ? $_POST['name'] : '';
    $address=isset($_POST['address']) ? $_POST['address'] : '';
    $payment_method=isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
    $total_items=isset($_POST['total_items']) ? $_POST['total_items'] : '';
    $total_amount=isset($_POST['total_amount']) ? $_POST['total_amount'] : '';

    if(empty($name) || empty($address) || empty($payment_method)){
        echo '<p class="text-danger">Please fill in all required fields.</p>';
        exit();
    }
    try{
        include("connect.php");
        $sql="INSERT INTO orders(customer_name, address, payment_method, total_items, total_amount)
        VALUES ( :name, :address, :payment_method, :total_items, :total_amount)";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':payment_method', $payment_method);
        $stmt->bindParam(':total_items', $total_items);
        $stmt->bindParam(':total_amount', $total_amount);
        $stmt->execute();
        unset($_SESSION['cart']);
    }catch(PDOException $e){
        echo '<p class="text-danger">There was an error placing your order. Please try again. Error: ' . htmlspecialchars($e->getMessage()) . '</p>';
    }
}else{
    header('Location: cart.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize Checkout</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php
include("navbar.php");
?>
<div class="content">
        <div class="sub-content-title">
            <a href="flower_bulbs.php" class="text2">FLOWER BULBS</a>
        </div>
        <div class="sub-content-title">
            <a href="clematis.php" class="text3">CLEMATIS & VINES</a>
        </div>
        <div class="sub-content-title">
            <a href="roses.php" class="text4">ROSES</a>
        </div>
        <div class="sub-content-title">
            <a href="fruits_trees.php" class="text5">FRUITS TREES & BUSHES</a>
        </div>
        <div class="sub-content-title">
            <a href="trees.php" class="text6">TREES</a>
        </div>
</div>
<div class="container" style="margin: 20px 0px 20px 0px;">
    <div class="row" style="width: 50%; line-height: 30px; padding: 20px; border: 1px solid #dee2e6; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); border-radius: 8px;">
        <div class="col-md-12 border rounded-4 mt-4">
            <h2>Order Confirmation</h2>
            <hr>
            <p>Thank you for your purchase! Your order has been placed successfully. You will receive a confirmation email shortly.</p>
            <button style="height: 20%; width: 25%; font-size: 16px; background-color: #0d944e; border:none;
            margin: 10px 0px 40px 0px; letter-spacing: 1px; border-radius: 5px;"><a href="index.php" class="btn btn-primary" style="color: white;">Return to Home</a></button>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
</body>
</html>