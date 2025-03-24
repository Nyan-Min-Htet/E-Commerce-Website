<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product View</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <style>
        .inner-content {
            text-align: center;
            margin: 30px 0;
        }

        .inner-content h2 {
            font-size: 32px;
            color: #222;
            letter-spacing: 1px
        }
                .section {
            padding: 50px 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .col-lg-8 {
            flex: 0 0 35%; /* 60% width for the image */
            padding: 15px;
        }

        .col-lg-4 {
            flex: 0 0 60%; /* 35% width for the content */
            padding: 15px;
        }

        .left-images img {
            width: 95%;
            height: auto;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .right-content {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            line-height: 23px;
        }
        .price {
            display: block;
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
            margin-bottom: 15px;
        }

        .stars {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 5px;
            margin-bottom: 15px;
        }

        .stars li i {
            color: #ffcc00;
        }

        .quote {
            font-size: 14px;
            font-style: italic;
            margin: 20px 0;
            color: #666;
        }

        .quantity-content {
            margin-top: 20px;
        }

        .main-border-button {
            display: flex;
            justify-content: center;
        }

        .main-border-button button {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .main-border-button button:hover {
            background-color: #0056b3;
        }
    </style>
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
    include("connect.php");
    include_once("data.php");
    $id=$_GET['id'];
    $product=showSpecificProduct($conn,$id);
    ?>
    <div class="inner-content">
        <h2>Product Detail</h2>
        <span>Clear product view</span>
    </div>
<section class="section" id="product">
    <div class="container">
        <div class="row">   
            <div class="col-lg-8">
                <div class="left-images">
                        <img src="../admin/<?= $product['image'] ?>" alt=""
                        style="object-fit:contain;">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="right-content">
                    <!-- product name -->
                    <h1><?= $product['product_category'] ?></h1>
                    <h4><?= $product['product_name'] ?></h4>
                    <!-- price -->
                    <span class="price">Product Price - $ <?= $product['price']?></span>
                    <!-- rating -->
                    <ul class="stars">
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                    </ul>
                    <!-- description -->
                    <span>Product Stock - <?= $product['stock']?></span>
                    <div class="quote">
                        <i class="fa fa-quote-left"></i>
                        <p><?= $product['product_desc']?></p>
                        <i class="fa fa-quote-right"></i>
                    </div>
                    <div class="quantity-content">
                        <div class="total">
                            <div class="main-border-button">
                                <form action="add-to-cart.php" method="post">
                                    <input type="hidden" value="<?= $product['product_id'] ?>" name="id" >
                                    <input type="hidden" value="viewpage" name="goto" >
                                    <button class="btn btn-outline-primary rounded-lg">Add to cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <?php
    include("footer.php");
    ?>
</body>
</html>