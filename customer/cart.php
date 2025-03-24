<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cart</title>
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
<?php
// session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$total_items = 0;
$total_price = 0;
$tax_rate=0.01;
$tax=0;
$cart_summary = [];

if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product) {
        if (
            isset($product['qty'], $product['price'], $product['product_name']) &&
            is_numeric($product['qty']) && is_numeric($product['price'])
        ) {
            $total_items += (int)$product['qty'];
            $total_price += $product['qty'] * $product['price'];
            $cart_summary[] = [
                'name' => htmlspecialchars((string)$product['product_name']),
                'qty' => (int)$product['qty'],
                'price' => $product['price'],
                'total' => $product['qty'] * $product['price']
            ];
        }
    }
}
$tax = $total_price * $tax_rate;
$total_amount = $total_price + $tax; 
?>
<div class="cart-container" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">
    <div class="cart-category">
        <!-- left start -->
        <div class="product-cart">
            <!-- top -->
            <div class="col d-flex mt-1 justify-content-between">
                <p style="margin-left: 20px; letter-spacing: 1px;">SHOPPING CART</p>
                <p style="margin-right: 40px; letter-spacing: 1px;"><?= $total_items ?> ITEM<?= $total_items > 1 ? 'S' : '' ?></p>
            </div>
            <hr>
            <!-- product start -->
            <div style="width: 100%;">
                <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                    <?php foreach ($_SESSION['cart'] as $product): ?>
                        <form action="cartqtycontrol.php" method="post" class="form-row" style="display: flex;">
                            <!-- image start -->
                            <div>
                                <img class="bg-light rounded" style="width: 120px; height: 110px; object-fit: cover; margin: 10px 0px 20px 20px; border-radius: 10%;"
                                     src="../admin/<?= htmlspecialchars($product['image']) ?>" alt="product image">
                            </div>
                            <!-- image end -->
                            <div class="col" style="display: flex;">
                                <!-- left -->
                                <div class="py-lg-4 fw-bold" style="margin: 25px 0px 0px 30px; width:35%;">
                                    <input type="hidden" value="<?= htmlspecialchars($product['product_id']) ?>" name="id">
                                    <p class="text-center"><?= htmlspecialchars($product['product_name']) ?></p>
                                    <p class="text-center">MMK <?= number_format((float) preg_replace('/[^0-9.]/', '', $product['price']), 2) ?></p>                                
                                </div>
                                <!-- mid -->
                                <div class="btn-section">
                                    <div class="text-center">
                                        <button class="btn" name="decrease" type="submit"><i class="fa fa-minus bg-danger text-light p-1 rounded" style="cursor: pointer"></i></button>
                                        <input class="rounded-3 text-center" type="number" value="<?= $product['qty'] ?>" style="width: 30%; height: 27px; margin: 0px 10px 0px 10px; text-align: center; font-size: 17px; border: 1px solid black;" readonly>
                                        <button class="btn" name="increase" type="submit"> <i class="fa fa-plus bg-danger text-light p-1 rounded" style="cursor: pointer"></i></button>
                                    </div>
                                </div>
                                <!-- right -->
                                <div class="delete-btn">
                                    <button class="btn" name="remove" type="submit"><i class="fa fa-trash fa-lg text-danger" style="cursor: pointer"></i></button>
                                </div>
                            </div>
                        </form>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="margin-left: 20px;">Your cart is empty.</p>
                <?php endif; ?>
            </div>
            <!-- product end -->
        </div>

        <div class="cart-summary">
            <p class="sum">Summary</p>
            <hr>
            <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
                <!-- Cart Summary Start -->
                <ul class="list-group">
                    <?php foreach ($cart_summary as $item): ?>
                        <li class="list-group-item d-flex justify-content-between" style="line-height: 25px;">
                            <?= $item['name'] ?> (<?= $item['qty'] ?> x MMK <?= number_format($item['price'], 2) ?>)
                            <span>MMK <?= number_format($item['total'], 2) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <!-- Cart Summary End -->
            <?php endif; ?>
            <div class="d-flex justify-content-between" style="margin: 30px 0px 15px 0px;">
                <p>Price</p>
                <p>MMK <?= number_format($total_price, 2) ?></p>
            </div>
            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                <p>Quantity</p>
                <p><?= $total_items ?></p>
            </div>
            <div class="d-flex justify-content-between" style="margin-bottom: 15px;">
                <p>Tax</p>
                <p>MMK <?= number_format($tax, 2) ?></p>
            </div>
            <hr>
            <div class="d-flex justify-content-between">
                <p>Total</p>
                <p>MMK <?= number_format($total_amount, 2) ?></p>
            </div>

            <div class="row bg-light">
                <div class="col d-flex justify-content-between my-3">
                    <a href="index.php" class="text-danger fs-6"><< Continue Shopping</a>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="total_amount" value="<?= $total_amount ?>">
                        <input type="hidden" name="total_items" value="<?= $total_items ?>">
                        <button type="submit" class="btn btn-danger">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php
    include("footer.php");
    ?>
</body>
</html>