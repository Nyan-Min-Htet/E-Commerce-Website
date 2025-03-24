<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <style>
        .feedback-container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .feedback_title{
            text-align: center;
            color: #333;
        }
        label {
            font-size: 1rem;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        .name, .email, .message {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .submit_btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }
        .submit_btn:hover {
            background-color: #45a049;
        }
        .name,.email::placeholder, .message::placeholder {
            color: #aaa;
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
    <div class="feedback-container">
        <h2 class="feeback_title">User Feedback Form</h2>
        <form action="feedback_backend.php" method="post">
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" class="name" placeholder="Enter your username"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="email" placeholder="Enter your email"><br><br>

            <label for="message">Feedback Message:</label>
            <textarea id="message" name="message" class="message" placeholder="Your feedback here..." rows="5"></textarea><br><br>

            <input type="submit" class="submit_btn" name="submit" value="Submit Feedback">
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>
</html>