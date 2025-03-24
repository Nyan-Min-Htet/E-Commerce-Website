<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Body</title>
    <style>
        .cards-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 20px;
            margin-top: 50px;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 20px;
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h2 {
            font-size: 3rem;
            margin: 10px 0;
            color: #007bff;
        }

        .card p {
            font-size: 1.2rem;
            color: #555;
        }

        .card-icon {
            font-size: 3rem;
            color: #007bff;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<?php
include("config/dbconnect.php");
try{
    $product_count = 0;
    $order_count = 0;
    $user_count = 0;
    $feedback_count = 0;

    // Queries for counts
    $product_count_query = "SELECT COUNT(*) AS count FROM flower_product";
    $order_count_query = "SELECT COUNT(*) AS count FROM orders";
    $feedback_count_query = "SELECT COUNT(*) AS count FROM feedback";
    $customer_count_query = "SELECT COUNT(*) AS count FROM user";

    // Execute queries and fetch results
    $product_result = $conn->query($product_count_query);
    if ($product_result) {
        $product_count = $product_result->fetch(PDO::FETCH_ASSOC)['count'];
    }

    $order_result = $conn->query($order_count_query);
    if ($order_result) {
        $order_count = $order_result->fetch(PDO::FETCH_ASSOC)['count'];
    }

    $feedback_result = $conn->query($feedback_count_query);
    if ($feedback_result) {
        $feedback_count = $feedback_result->fetch(PDO::FETCH_ASSOC)['count'];
    }

    $customer_result = $conn->query($customer_count_query);
    if ($customer_result) {
        $user_count = $customer_result->fetch(PDO::FETCH_ASSOC)['count'];
    }
}catch(PDOException $e){
    echo "Connection Failed: " .$e->getMessage();
}

$conn = null;
?>
<div id="main-content">
    <div class="cards-container">
        <!-- Product Card -->
        <div class="card">
            <div class="card-icon">📦</div>
            <h2><?= $product_count ?></h2>
            <a href="product.php"><p>Products</p></a>
        </div>

        <!-- Order Card -->
        <div class="card">
            <div class="card-icon">🛒</div>
            <h2><?= $order_count ?></h2>
            <a href="orders.php"><p>Orders</p></a>
        </div>

        <!-- Feedback Card -->
        <div class="card">
            <div class="card-icon">💬</div>
            <h2><?= $feedback_count ?></h2>
            <a href="feedback.php"><p>Feedback</p></a>
        </div>

        <!-- Customer Card -->
        <div class="card">
            <div class="card-icon">👤</div>
            <h2><?= $user_count ?></h2>
            <a href="customers.php"><p>Customers</p></a>
        </div>
    </div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>