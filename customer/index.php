<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yan Yan's Earth Floral House</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <style>
      .feedback-container {
    text-align: center;
    font-family: Arial, sans-serif;
    max-width: 500px;
    margin: auto;
    height: 180px;
  }
  
  .feedback-title h1 {
    font-size: 24px;
    margin-bottom: 30px;
    color: #333;
  }
  
  .feedback-content {
    position: relative;
    overflow: hidden;
    height: 100px;
  }
  
  .feedback-slider {
    display: flex;
    flex-direction: column;
    animation: slide 5s infinite;
  }
  
  .feedback-item {
    font-size: 18px;
    color: #555;
    /* opacity: 1000; */
    height: 60px;
    line-height: 20px;
    transition: 1s ease-in-out;
  }
  @keyframes slide {
    0% { transform: translateY(0); opacity: 0; }
    10% { opacity: 1; } /* Feedback stays fully visible */
    13% { opacity: 0; } /* Smooth fade-out */
    15% { transform: translateY(-60px); } /* Move to the next message */
    /* Repeat for subsequent feedbacks */
    100% { transform: translateY(-300px); } 
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
    <div class="swiper mySwiper">
		<div class="swiper-wrapper">
		  <div class="swiper-slide">
			<img src="../img/background1.jpg" alt="background">
		  </div>
		  <div class="swiper-slide">
			<img src="../img/background5.webp" alt="background2">
		  </div>
		  <div class="swiper-slide">
			<img src="../img/background3.jpg" alt="background3">
		  </div>
		  <div class="swiper-slide">
			<img src="../img/background4.jpg" alt="background3">
		  </div>
		</div>
		<div class="swiper-pagination"></div>
	</div>
    <div class="slide-container">
        <div class="slide">
            <a href="peonies.php"><img src="../img/slide1.webp" alt="peonies"></a>
            <div class="text-overlay">Peonies</div>
        </div>
        <div class="slide">
            <a href="hydrangeas.php"><img src="../img/slide2.webp" alt="hydrangeas"></a>
            <div class="text-overlay">Hydrangeas</div>
        </div>
    </div>
    <div class="best-sellers-title">
        <h1>Shop Best Sellers</h1>
    </div>
    <div class="best-sellers">
        <div class="best-seller">
            <a href="hydrangeas.php"><img src="../img/best-seller1.webp" alt="Incrediball Hydrangeas"></a>
            <div class="heart"><i class="fa-regular fa-heart fav"></i></div>
            <div class="best-seller-text">Incrediball Hydrangeas</div>
        </div>
        <div class="best-seller">
            <a href="roses.php"><img src="../img/best-seller2.webp" alt="Mister Lincoln Hybrid Tea Rose"></a>
            <div class="heart"><i class="fa-regular fa-heart fav"></i></div>
            <div class="best-seller-text">Mister Lincoln Hybrid Tea Rose</div>
        </div>
        <div class="best-seller">
            <a href="clematis.php"><img src="../img/best-seller3.webp" alt="Clematis Poet"></a>
            <div class="heart"><i class="fa-regular fa-heart fav"></i></div>
            <div class="best-seller-text">Clematis Poet</div>
        </div>
        <div class="best-seller">
            <a href="peonies.php"><img src="../img/best-seller4.webp" alt="Bouquet Builders Romance Iris Collection"></a>
            <div class="heart"><i class="fa-regular fa-heart fav"></i></div>
            <div class="best-seller-text">Bouquet Builders Romance Iris Collection</div>
        </div>
    </div>
    <div class="gallery">
    <div class="item large">
      <img src="../img/flower-content1.webp" alt="Lilacs">
      <p class="caption">Lilacs</p>
    </div>
    <div class="item">
      <img src="../img/flower-content2.webp" alt="Boxwood Shrubs">
      <p class="caption">Boxwood Shrubs</p>
    </div>
    <div class="item">
      <img src="../img/flower-content3.webp" alt="Fruit Trees">
      <p class="caption">Fruit Trees</p>
    </div>
    <div class="item">
      <img src="../img/flower-content4.webp" alt="Flowering Trees">
      <p class="caption">Flowering Trees</p>
    </div>
    <div class="item">
      <img src="../img/flower-content5.webp" alt="Arborvitae Shrubs">
      <p class="caption">Arborvitae Shrubs</p>
    </div>
  </div>
  <h1 class="history-header">174 Years of Nursery Excellence</h1>
    <div class="history">
    <div class="history-content">
        <i class="fa-solid fa-shield"></i>
        <p>All plants from our online plant nursery are backed by Spring Hill's No-Risk Guarantee so you can order nursery plants with complete confidence.</p>
    </div>
    <div class="history-content">
        <i class="fa-solid fa-leaf"></i>
        <p>Many new and unique varieties in our plant nursery are all thoroughly trialed in our own test gardens</p>
    </div>
    <div class="history-content">
        <i class="fa-solid fa-globe"></i>
        <p>Our nursery professionals preselect the very best sizes & varieties for safe shipment</p>
    </div>
    <div class="history-content">
        <i class="fa-regular fa-clipboard"></i>
        <p>Free planting guide, instructions and easy-to-follow diagrams with each order</p>
    </div>
  </div>
  <div class="flower">
    <div class="flower-content">
      <img src="../img/home_roses.webp" alt="Home Roses">
      <p class="cap">Rose Bushes</p>
    </div>
    <div class="flower-content">
      <img src="../img/flower2.webp" alt="Flower Bulbs">
      <p class="cap">Flower Bulbs</p>
    </div>
    <div class="flower-content">
      <img src="../img/flower3.webp" alt="Hostas">
      <p class="cap">Hostas</p>
    </div>
  </div>
  <?php
  require_once("connect.php");
  require_once("../admin/data.php");
  $feedbacks=getFeedback($conn);
  ?>
  <div class="feedback-container">
  <div class="feedback-title">
    <h1>Our Customers are Saying...</h1>
  </div>
  <div class="feedback-content">
    <div class="feedback-slider">
      <?php foreach ($feedbacks as $feedback) { ?>
        <p class="feedback-item"><?= $feedback['Message'] ?></p>
      <?php } ?>
    </div>
  </div>
</div>
  <div class="photo-section">
      <div class="left-photo">
        <img src="../img/SH_Rose_Grading_Tile_11052024.webp" alt="">
      </div>
      <div class="right-photo">
        <img src="../img/homepage-Gardening_Resources_tile.webp" alt="">
      </div>
    </div>
    <div class="sub">
        <p>Subscribe to our emails</p>
        <p>Be the first to know about new collections and exclusive offers.</p>
        <form action="">
        <input type="text" name="email" placeholder="Please enter email" class="email2" required>
        <button type="submit" name="submit" class="sub_btn">SUBSCRIBE</button>
        </form>
    </div>
    <?php
        include("footer.php");
    ?>
    <button onclick="topFunction()" id="top" style="width: 6%;" title="Go to top">Top</button>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="assets/js/index.js"></script>
</body>
</html>