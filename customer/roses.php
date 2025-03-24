<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <?php
    include("connect.php");
    include_once("data.php");
    $products=showRoses($conn);
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
    <section>
    <div>
        <div class="row">
            <div class="col">
                <div class="section-heading">
                    <h2>ROSES PRODUCTS</h2>
                    <span>CHECK OUT ALL OF PEONIES PRODUCTS.</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($products as $product): ?>
            
            <div class="col-3">
                <div class="card">
                    <img src="../admin/<?= $product['image'] ?>" alt="Product Image">
                    <div class="card-body" style="background-color: #f8f9fa;">
                        <h5 class="card-title" style="font-size: 1.2rem; font-weight: bold;"><?= $product['product_name'] ?></h5>
                        <p class="card-text" style="color: #6c757d;"><?= $product['product_category'] ?></p>
                        <p class="card-text mb-3" style="font-size: 1.25rem; font-weight: bold; color: #28a745;">MMK <?= $product['price'] ?></p>
                        <p><?= $product['stock']>0? 'AVAILABLE': 'UNAVAILABLE' ?></p>
                        
                        <form action="add-to-cart.php" method="post" class="d-flex justify-content-between mt-2">
                            <a href="productview.php?id=<?= $product['product_id']?>" class="btn btn-primary float-right">View Product</a>
                            <input type="hidden" value="<?= $product['product_id'] ?>" name="id">
                            <input type="hidden" value="productpage" name="goto" >
                            <button class="btn btn-warning float-right">Add To Cart</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    </section>
    <?php
    include("footer.php");
    ?>
</body>
</html>