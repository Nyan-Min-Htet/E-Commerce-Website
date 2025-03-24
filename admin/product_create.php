<?php
    include("config/dbconnect.php");
    try{
    if(isset($_FILES['file'])){
        $target=$_FILES['file']['name'];
        $tmp=$_FILES['file']['tmp_name'];
        $targetDir="assets/img/". $target;
        move_uploaded_file($tmp,$targetDir);
    }
    if(isset($_POST['submit']))
    {
        $pname = $_POST['p_name'];
        $pcategory= $_POST['category'];
        $pprice = $_POST['p_price'];
        $pstock = $_POST['p_stock'];

        $stmt=$conn->prepare("insert into flower_product(product_name, product_category, price, stock, image)
        values (:pname, :pcategory, :pprice, :pstock, :img)");
        $stmt->bindParam(':pname', $pname);
        $stmt->bindParam(':pcategory',$pcategory);
        $stmt->bindParam(':pprice',$pprice);
        $stmt->bindParam(':pstock',$pstock);
        $stmt->bindParam(':img',$targetDir);

        if($stmt->execute()){
            header("location: product.php");
        }else{
            echo "Failed to insert data";
        }
    }
    }catch(Exception $e){
        die("Cannot insert data: ".$e->getMessage());
    } 
?>