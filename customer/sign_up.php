<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yan Yan's Earth Floral House</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/sign_up.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
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
    <div class="container1">
        <h1>Create Account</h1>
        <div class="signup_form">
            <form action="insert_user.php" method="post">
                <input type="text" name="name" placeholder="Username" class="name" required><br><br>
                <input type="text" name="age" placeholder="Age" class="age" required><br><br>
                <input type="email" name="email" placeholder="Email" class="email" required><br><br>
                <input type="text" name="address" placeholder="Address" class="ad" required><br><br>
                <input type="password" name="password" placeholder="Password" class="psw" required><br><br>
                <select name="gender" id="">
                    <option>Please Choose Your Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
                <input type="submit" name="submit" value="CREATE" class="signup_btn">
            </form>
        </div>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>
