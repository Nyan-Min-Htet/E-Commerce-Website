<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <style>
        .search-container{
            margin: 30px 0px 40px 20px;
            line-height: 25px;
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
    <div class="search-container">
    <?php
    require("connect.php");
    try{
    if(isset($_GET['search'])){
        $searchquery=$_GET['search'];
        $stmt=$conn->prepare("SELECT * FROM flower_product WHERE product_name LIKE :search OR product_desc LIKE :search");
        $stmt->execute(['search' => '%' . $searchquery . '%']);
        $results=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results){
            foreach($results as $row){
                echo "<div style='margin-bottom: 20px;'>";
                echo "<img src='../admin/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['product_name']) . "' style='width: 130px; height: 130px; object-fit: cover;'>";
                echo "<p><strong>" . htmlspecialchars($row['product_name']) . "</strong>: " . htmlspecialchars($row['product_desc']) . "</p>";
                echo "</div>";
            }
        }else{
            echo "No results found";
        }
    }
    }catch(Exception $e){
        die("Fail to display results!!" . $e->getMessage());
    }
    ?>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>