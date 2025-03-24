<?php
function getProducts($conn){
    $sql= "select product_id as ID, product_name as Name, product_category as Category,  stock as Stock, price as Price, image as Image from flower_product";
    $stmt=$conn->query($sql);
    $products=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $products;  
}
function getSpecificProduct($conn, $id){
    $sql="SELECT * FROM flower_product WHERE product_id= :id";
    $stmt=$conn->prepare($sql);
    $stmt->execute([':id'=> $id]);
    $product =$stmt->fetch(PDO::FETCH_ASSOC);
    return $product;
}
function getOrders($conn){
    $sql= "select order_id as ID, customer_name as Name, address as Address,  payment_method as Payment, total_items as Items, total_amount as Amount from orders";
    $stmt=$conn->query($sql);
    $orders=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $orders;  
}
function getFeedback($conn){
    $sql= "select id as ID, name as Name, email as Email,  message as Message, created_at as Created from feedback";
    $stmt=$conn->query($sql);
    $feedbacks=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $feedbacks;  
}
function getCustomers($conn){
    $sql= "select id as ID, username as Name, age as Age, email as Email, address as Address, password as Password, gender as Gender, role as Role from user";
    $stmt=$conn->query($sql);
    $users=$stmt->fetchALL(PDO::FETCH_ASSOC);
    return $users;  
}

// function countProduct($conn){
//     $id=0;
//     $sql="select * from "
// }
?>