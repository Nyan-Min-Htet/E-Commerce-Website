<?php
include("connect.php");

try {
    if (isset($_POST['submit'])) {
        $identifier = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $email = $_POST['email'];
        $password = $_POST['password'];

        // SQL query to validate the user
        $sql = "SELECT * FROM user WHERE email=:email AND password=:password";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        // Fetch the user details
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Check if the user is an admin
            if ($user['role'] === 'admin') { // Assuming `role` column stores user roles
                header("Location: ../admin/admin_dashboard.php");
                exit;
            } else {
                header("Location: home.php");
                exit;
            }
        } else {
            // Display custom alert for invalid credentials
            $showAlert = true;
            if ($showAlert) {
                echo '<script type="text/javascript">';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo 'document.getElementById("overlay").style.display = "block";';
                echo 'document.getElementById("customAlert").style.display = "block";';
                echo '});';
                echo '</script>';
            }
        }
    }
} catch (Exception $e) {
    die("Failed to Login: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yan Yan's Earth Floral House</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/login.css">
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

    <p class="intro_text">Welcome to our new website! Please create a new account for the shopping experience.</p>
    <div class="container1">
        <h1>Login</h1>
        <span class="signup_text">Don't have an account yet? <a href="sign_up.php">Create account</a></span>
        <div class="login_form">
            <form action="" method="post" name="loginForm">
                <input type="email" name="email" placeholder="Email" class="email" required><br><br>
                <input type="password" name="password" placeholder="Password" class="psw" required><br><br>
                <a href="forgot_password.php" class="resetpsw_an">Forgot your password?</a><br><br><br>
                <input type="submit" name="submit" value="LOG IN" class="signin_btn">
            </form>
        </div>
    </div>
    <div id="overlay"></div>
    <div id="customAlert">
        <h2>Please Input Correct Your Email And Password!</h2>
        <p>Incorrect Your Email and Password.</p>
        <button onclick="closeAlert()">OK</button>
    </div>
    <?php
        include("footer.php");
    ?>
    <script>
    function closeAlert() {
        document.getElementById("customAlert").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
    </script>
</body>

</html>