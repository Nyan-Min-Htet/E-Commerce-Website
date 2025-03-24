<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
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
    <?php
    // session_start();
    
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $total_amount = isset($_POST['total_amount']) ? $_POST['total_amount'] : 0;
        $total_items = isset($_POST['total_items']) ? $_POST['total_items'] : 0;
    }else{
        header('Location: cart.php');
        exit();
    }
    ?>
    <div class="checkout-container">
        <div class="checkrow">
            <div class="col-md-12"> 
                <h2>CHECKOUT</h2>
                <hr>
                <form action="finalize_checkout.php" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Your Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Enter Your Shipping Address</label>
                        <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment_method" class="form-label">Choose Your Payment Method</label>
                        <select name="payment_method" id="payment_method" class="form-select" required>
                            <option value="kbz_pay">KBZ Pay</option>
                            <option value="wave_pay">WAVE Pay</option>
                            <option value="aya_pay">AYA Pay</option>
                            <option value="uab_pay">Uab Pay</option>
                        </select>
                    </div>
                    <input type="hidden" name="total_amount" value="<?= $total_amount ?>">
                    <input type="hidden" name="total_items" value="<?= $total_items ?>">
                    <button type="submit" name="submit" class="btn btn-success">SUBMIT YOUR ORDERS</button>
                    <div class="d-flex">
                        <p>Total Items: </p>
                        <p><?= $total_items ?></p>
                    </div>
                    <div class="d-flex">
                        <p>Total Amounts</p>
                        <p>$ <?= number_format($total_amount,2) ?></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>