<?php
$severname="localhost";
$username="root";
$password="";
$dbname="flower_db";
try{
    $conn = new PDO("mysql:host=$severname;dbname=$dbname", $username, $password);
}catch(Exception $e){
    die("Fail to connect".$e->getMessage());
}
?>