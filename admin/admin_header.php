<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Header</title>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-light px-2" style="background-color: skyblue;">
        <div id="main" class="navbar-brand ml-5">
            <button onclick="openNav()" style="border-radius: 50%;">
                <img src="assets/img/admin.webp" style="border-radius: 50%;" width="93" height="90" alt="Admin">
            </button>
        </div>
        <ul class="navbar-nav mr-auto">
            <h3 style="letter-spacing: 1px;">Admin Dashboard</h3>
        </ul>

        <div class="user-cart" style="display: flex; width: 15%;">
            <!-- <form action="sign_in.php" method="post"> -->
            <div>
                <a href="../customer/index.php"><input type="submit" name="sign_in_btn" value="Log Out"
                        style="width: 130px; height:47px; border-radius:10px; letter-spacing: 1px; margin: 20px 0px 20px 0px;"></a>
            </div>
            <!-- </form>   -->
        </div>
    </nav>
</body>

</html>