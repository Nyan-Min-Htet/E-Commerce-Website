<?php
include("connect.php");
if(isset($_POST['submit'])){
    $username=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $password=$_POST['password'];
    $gender=$_POST['gender'];
    $sql="insert into user(username, age, email, address,password,gender,role) values 
    ('$username', '$age', '$email', '$address', '$password', '$gender','user')";
    $conn->exec($sql);
    header("location: index.php");
}
?>