<?php
session_start();
if (isset($_SESSION['email'])) {
    echo "Welcome, " . htmlspecialchars($_SESSION['username']);
} else {
    // echo "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nav</title>
    <link rel="stylesheet" href="index.css">
    <?php
    include("connect.php");
    include("data.php");
    $total_items=0;
    if(session_status()=== PHP_SESSION_NONE){
        session_start();
    }
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = []; // Initialize as an empty array
    }
    foreach($_SESSION['cart'] as $product){
        $total_items += $product['qty'];
    }
    ?>
    <style>
       .badge{
            position: absolute;
            font-size: 18px;
            font-weight: bold;
            top: 48px;
        }
    </style>
</head>
<body>
<nav>
    <div class="nav-container">
        <div class="search_icon">
            <form action="search.php" method="get">
                <input type="text" placeholder="Search....." name="search" class="search">
                <button type="submit" style="border:none; background-color: white; height: 60px;">
                    <i class="fa fa-search" style="right: -10px; width: 20px; top: 30px;"></i>
                </button>
            </form>
        </div>
        <div class="logo">
                <a href="index.php">
                    <img src="../img/logo.png" alt="logo">
                </a>
        </div>
        <div class="login" style="position: relative;">
                <!-- <a href="favorite.php">
                    <i class="fa-regular fa-heart"></i>
                </a> -->
                <?php if (isset($_SESSION['email'])): ?>
                        <?php if ($_SESSION['role'] === 'admin'): ?>
                            <!-- If user is an admin -->
                            <a href="admin_dashboard.php"><button class="login_btn">Admin View</button></a>
                            <a href="logout.php"><button class="login_btn">Logout</button></a>
                        <?php else: ?>
                            <!-- If user is a regular customer -->
                            <!-- <a href="my_account.php">My Account</a> -->
                            <a href="logout.php"><button class="login_btn">Logout</button></a>
                        <?php endif; ?>
                    <?php else: ?>
                        <!-- If user is not logged in -->
                        <a href="logout.php"><button class="login_btn" style="width: 20%;">Log Out</button></a>
                        <a href="sign_up.php"><button class="login_btn" style="width: 23%; margin-left: 15px;">Register</button></a>
                <?php endif; ?>
                <a href="login.php">
                    <i class="fa-regular fa-user"></i>
                </a>
                <a href="cart.php">
                    <i class="fa fa-cart-shopping"></i>
                    <?php if ($total_items > 0): ?>
                        <span class="badge"><?= $total_items ?></span>
                    <?php endif; ?>
                </a>
        </div>
    </div>
</nav>

</body>
</html>