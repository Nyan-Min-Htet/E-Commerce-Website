<?php
include_once("connect.php");
try{
    if(isset($_POST['submit'])){
        $username=$_POST['name'];
        $email=$_POST['email'];
        $message=$_POST['message'];
        $sql="insert into feedback (name,email,message) 
        values('$username','$email','$message')";
        $stmt=$conn->query($sql);
        header('Location: feedback_display.php');
    }
}catch(Exception $e){
    die ("Fail to insert feedback message!!".$e->getMessage());
}
?>