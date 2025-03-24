<?php
require_once("config/dbconnect.php");
require_once("data.php");
$products=getProducts($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .edit_btn, .delete_btn{
            width: 55%;
            height: 37px;
            border-radius: 10px;
        }
        .model-header{
            display: flex;
            margin: 10px 0px 20px 0px;
        }
        .close_btn{
            margin: 0px 0px 0px 110px;
            padding: 5px 5px;
            background-color: skyblue;
            color: black;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 10%;
            font-size: 23px;
        }
        select{
            height: 35px;
            font-size: 15px;
            letter-spacing: 1px;
            padding: 6px 10px;
            color: gray;
            border-radius: 5px;
            width: 100%;
        }
        .btn{
            background-color: skyblue;
            width: 40%;
            margin: 20px 0px 0px 0px;
        }
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
    <th>Product Image</th>
    <th>Product Name</th>
    <th>Product Category</th>
    <th>Price</th>
    <th>Stock</th>
    <th>Action</th>
    <?php foreach($products as $product){?>
         <tr>
         <td><?= $product['ID'] ?></td>
         <td style="padding: 20px 0px 20px 0px; width: 15%;"><img src="<?= $product['Image'] ?>" style="width: 120px; height: 110px; border-radius: 10px;"></td>
         <td style="width: 22%;"><?= $product['Name'] ?></td>
         <td style="width: 18%;"><?= $product['Category'] ?></td>
         <td style="width: 17%;"><?= $product['Price'] ?></td>
         <td><?= $product['Stock'] ?></td>
         <td><a href=<?="product_edit.php?id=".$product['ID']?>><button class="edit_btn" style="margin-bottom:10px;">Edit</button></a><a href=<?="product_delete.php?id=".$product['ID']?>><button class="delete_btn">Delete</button></a></td>
    <?php } ?>
    <div style="display:flex; align-items:center; text-align: center; margin-left:20px;">
    <!-- <h3>PRODUCT TABLE</h3> -->
    <button onclick="openbtn()" style="height:44px; font-size:15px; margin: 15px 0px 15px 5px; letter-spacing:1px; width: 11%; border-radius:10px;">Add Product</button>
    </div>
</div>
    <div class="model" id="myModel">
        <div class="model-dialog">
            <div class="model-content">
                <div class="model-header">
                    <h3>New Product Item</h3>
                    <button type="button" class="close_btn" onclick="closeAlert()" data-dismiss="model">&times;</button>
                </div>
                <div class="model-body">
                    <form action="product_create.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="p_name">Product Name: </label>
                            <input type="text" class="form-control" name="p_name" id="p_name" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Product Category: </label>
                            <select id="category" name="category">
                                <option disabled selected>Select Category</option>
                                <option>PEONIES</option>
                                <option>HYDRANGEAS</option>
                                <option>FLOWER BULBS</option>
                                <option>CLEMATIS & VINES</option>
                                <option>ROSES</option>
                                <option>FRUITS TREES & BUSHES</option>
                                <option>TREES</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="p_price">Price: </label>
                            <input type="text" class="form-control" name="p_price" id="p_price" required>
                        </div>
                        <div class="form-group">
                            <label for="p_stock">Stock: </label>
                            <input type="text" class="form-control" name="p_stock" id="p_stock" required>
                        </div>
                        <div class="form-group">
                            <label for="file">Choose Image: </label>
                            <input type="file" class="form-control-file" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn" name="submit" style="height:40px;">Add Item</button>
                        </div>
                 </form>
            </div>
                <!-- <div class="model-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
                </div> -->
            </div>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
<script>
    function closeAlert() {
        document.getElementById("myModel").style.display = "none";
    }
    function openbtn(){
        document.getElementById("myModel").style.display="block";
    }
</script>
</body>
</html>