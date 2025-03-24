<?php
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Feedback</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <style>
        .text-center {
    font-size: 2.5rem;
    font-weight: 700;
    color: #007bff;
}

.feedback-container {   
    margin: auto;
    margin-left: -15px;
    display: grid;
    gap: 15px;
    width: 90%;
    grid-template-columns: repeat(3, 1fr); 
    padding: 20px;
}

.card {
    background-color: #ffffff;
    border: none;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    transition: box-shadow 0.3s ease, transform 0.3s ease-in-out;
    margin-bottom: 30px;
    width: 33.33%;
    margin-top: -20px;
}
.card:hover {
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px);
}

.card-header {
    background-color: #ff7f50;
    color: #ffffff;
    padding: 15px;
    font-size: 1.25rem;
    font-weight: bold;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    padding: 20px;
    font-size: 0.85rem;
    line-height: 1.4;
}

.card-title {
    color: #555;
    margin-bottom: 15px;
    font-size: 1.1rem;
    letter-spacing: 0.5px;
}

/* Feedback Email */
.card-text {
    font-size: 0.85rem;
    color: #888;
}

.card-footer {
    background-color: #f5f5f5;
    padding: 10px;
    text-align: right;
    font-size: 1rem;
    color: #666;
}

.text-center {
    font-size: 1.2rem;
    color: #888;
    margin-top: 30px;
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
<?php
    $sql= "SELECT name, email, message, created_at FROM feedback ORDER BY id DESC";
    $stmt = $conn->query($sql);
    $feedback = $stmt->fetchAll(PDO::FETCH_ASSOC); //Fetch All records
?>
 <h1 class="text-center" style="text-align: center; margin-top: 30px; font-size: 1.5rem;">Customer Feedback</h1>
<div class="feedback-container">
        <?php if ($feedback): ?>
        <?php foreach ($feedback as $entry): ?>
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <strong><?php echo htmlspecialchars($entry['name']); ?></strong>
                </div>
                <div class="card-body">
                    <h6 style="margin-top: 20px; font-size: 17px;" class="card-title"><?php echo nl2br(htmlspecialchars($entry['message'])); ?></h6>
                    <p class="card-text"><em>Feedback By</em>: <?php echo htmlspecialchars($entry['email']); ?></p>
                </div>
                <div class="card-footer text-muted">
                    <small>Submitted on: <?php echo date('F j, Y', strtotime($entry['created_at'])); ?></small>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center">No feedback available.</p>
    <?php endif; ?>
</div>

    <?php
    include("footer.php");
    ?>
</body>
</html>