<?php
include("config/dbconnect.php");
include("data.php");
$id=$_GET['id'];
$product=getSpecificProduct($conn,$id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        h6, input, button, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }

        .product-edit-container {
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
    border: 1px solid #ddd;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.product-edit-content h6 {
    font-size: 18px;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form Sections */
form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

form .form-label {
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

form .form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

form .form-control:focus {
    border-color: #28a745;
    outline: none;
    box-shadow: 0 0 4px rgba(40, 167, 69, 0.5);
}

form button {
    padding: 10px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form button.btn-success {
    background-color: #28a745;
    color: white;
}

form button.btn-success:hover {
    background-color: #218838;
}

form button.btn-primary {
    background-color: #007bff;
    color: white;
}

form button.btn-primary:hover {
    background-color: #0056b3;
}

form button .product-link {
    color: white;
    text-decoration: none;
    font-size: 14px;
}

form button .product-link:hover {
    text-decoration: underline;
}
.foot-text{
    margin-top: 20px;
    text-align: center;
}
    </style>
</head>
<body>
<body>
<?php
require("admin_header.php");
require("sidebar.php");
?>
    <div class="product-edit-container" id="product-content">
        <div class="product-edit-content">
            <div class="container-fluid">
                <h6>Update Flower Products</h6>
                <form action="" method="post">
                    <div class="id-section">
                        <label for="product_id" class="form-label">Product Label</label>
                        <input type="number" name="pid" class="form-control" id="product_id" aria-describedby="product_id" readonly value="<?= htmlspecialchars($product['product_id']) ?>">
                    </div>
                    <div class="name-section">
                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text" name="pname" class="form-control" id="prouct_name" value="<?= htmlspecialchars($product['product_name']) ?>">
                    </div>
                    <div class="category-section">
                        <label for="category" class="form-label">Product Category</label>
                        <input type="text" name="pcategory" class="form-control" id="category" value="<?= htmlspecialchars($product['product_category']) ?>">
                    </div>
                    <div class="price-section">
                        <label for="price" class="form-label">Product Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="<?= htmlspecialchars($product['price']) ?>">
                    </div>
                    <div class="stock-seciton">
                        <label for="stock" class="form-label">Product Stock</label>
                        <input type="text" name="stock" class="form-control" id="stock" value="<?= htmlspecialchars($product['stock']) ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-success">Update</button>
                    <button class="btn btn-primary"><a href="product.php" class="product-link">Return to Product Page</a></button>
                </form>
            </div>
        </div>
        <?php
        if(isset($_POST['submit'])) {
        try {
            $product_name = $_POST['pname'];
            $product_category = $_POST['pcategory'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];

            $sql = "UPDATE flower_product SET 
                    product_name = :name,
                    product_category = :category,
                    price = :price,
                    stock = :stock
                    WHERE product_id = :id";

            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':name' => $product_name,
                ':category' => $product_category,
                ':price' => $price,
                ':stock' => $stock
            ]);
            echo "Product Update Successfully!";
        } catch (Exception $e) {
            echo "Error updating product: " . $e->getMessage();
        }
    }
    ?>
    <div class="footer-container">
        <div class="footer-row">
            <div class="foot-text">
                &copy; <a href="#">Yan Yan's Floral Shop</a>, All Right Reserved.
            </div>
        </div>
    </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>
</html>