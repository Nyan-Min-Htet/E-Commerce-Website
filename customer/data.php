<?php
function showPeonies($conn){
$sql="select * from flower_product where product_category='peonies'";
$stmt=$conn->query($sql);
return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showHydrangeas($conn){
    $sql="select * from flower_product where product_category='hydrangeas'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showFlowerBulbs($conn){
    $sql="select * from flower_product where product_category='flower bulbs'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showClematis($conn){
    $sql="select * from flower_product where product_category='clematis & vines'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showRoses($conn){
    $sql="select * from flower_product where product_category='roses'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showFruitsTrees($conn){
    $sql="select * from flower_product where product_category='fruits trees & bushes'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showTrees($conn){
    $sql="select * from flower_product where product_category='trees'";
    $stmt=$conn->query($sql);
    return $stmt->fetchALL(PDO::FETCH_ASSOC);
}
function showSpecificProduct($conn, $id){
    $sql="select * from flower_product where product_id=:id";
    $stmt=$conn->prepare($sql);
    $stmt->execute([
        ':id'=>$id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>