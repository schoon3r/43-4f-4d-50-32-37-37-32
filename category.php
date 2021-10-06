<!DOCTYPE html>
<html lang="en">

<head>
  <title>Star Wars - Category</title>
  <meta charset="UTF-8" />
  <meta name="author" content="" />
  <link rel="stylesheet" href="styles/category-style.css">
  <link rel="stylesheet" href="styles/header-nav-style.css">
  <link rel="stylesheet" href="styles/footer-style2.css">
  <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
  <script src="" defer></script>
</head>

<body>
  <!-- Richard's Code -->
  <!-- HEADER - NAVBAR -->
  <?php
  require_once "inc/header-nav.php"
  ?>
  <div class="nav-spacer"></div>

  <!-- START OF CATEGORY PAGE CONTENT -->
  <div class="productPage-banner">
    <div class="productPage-bannerInformation">
      <h1>Categories</h1>
      <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit tempora explicabo voluptatem error pariatur omnis.</p>
    </div>
  </div>

  
      <!-- RICHARD: BELOW 1 LINE IS THE ORIGINAL CODE FOR YOUR IMAGES -->
      <!-- <img src="images/example_front.png" alt="Product Image" style="width:75%"> -->
      <?php
      require_once "inc/dbconn.php";

      $category = ($_GET["category"]);
      $sql = "SELECT * FROM product, productimage WHERE product.prodID = productimage.prodID AND category = '$category' AND imageRef LIKE '%1.png';";

      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='categoryPage-productInformationCard'>";
            echo    "<div class='categoryPage-productImage'>";
            echo      "<a href='product.php?id=$row[prodID]'>";
            echo      "<img src='$row[imageRef]'/>";
            echo      "</a>";
            echo    "</div>";
            echo  "<div class='categoryPage-productData'>";
            echo    "<h1 class='categoryPage-productName'>$row[prodName]</h1>";
            echo    "<p class='categoryPage-productPrice'>AUD$$row[price]</p>";
            echo  "</div>";
            echo "</div>";
          }
          mysqli_free_result($result);
        }
      }
      mysqli_close($conn);
      ?>
    
  <!-- End of Richard's Code -->



  <!-- <div class="row">
      <div class="column">
       <img src="images/LukeSkywalker1.jpg"/>
      </div>
      <div class="column">
       <img src="images/Rey1.jpg"/>
      </div>
     <div class="column">
        <img src="images/Yoda1.jpg"/>
    </div>
    </div> -->

  </div>
  <!-- FOOTER -->
  <?php
  require_once "inc/footer2.php"
  ?>

</body>

</html>