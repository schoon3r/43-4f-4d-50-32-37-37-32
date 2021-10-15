<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product Page</title>
  <meta charset="UTF-8">
  <meta name="Richard" content="Star Wars">
  <link rel="stylesheet" href="styles/product-style.css" />
  <link rel="stylesheet" href="styles/header-nav-style.css">
  <link rel="stylesheet" href="styles/footer-style2.css">
  <script src="https://kit.fontawesome.com/646e59b3d4.js" crossorigin="anonymous"></script>
  <script src="" defer></script>
</head>

<body>

  <?php
  require_once "inc/dbconn.php";

  $id = htmlspecialchars(($_GET["id"]));
  $sql = "SELECT * FROM product WHERE prodID = '$id'";
  $sqlimage = "SELECT imageRef FROM productimage WHERE prodID = '$id'";
  $i = -1;

  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      $product = mysqli_fetch_assoc($result);
      mysqli_free_result($result);
    }
  }

  if ($result = mysqli_query($conn, $sqlimage)) {
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_row($result)) {
        $i++;
        $productimage[$i] = $row[0];
      }
      mysqli_free_result($result);
    }
  }
  ?>


  <!-- HEADER - NAVBAR -->
  <?php
  require_once "inc/header-nav.php"
  ?>
  <div class="nav-spacer"></div>

  <!-- START OF PRODUCT PAGE CONTENT -->
  <div class="productPage-banner"></div>

  <div class="productPage-contentArea">

    <div class="productPage-imageContentArea">
      <div class="productPage-mainImage">
        <?php echo "<img id='MainImg' src='$productimage[0]' alt='Main Image' style='width:100%'>" ?>
      </div>

      <div class="productPage-subImages">
        <?php echo "<img class='thumb_image' src='$productimage[0]' alt='Image #1' style='width:25%'>" ?>
        <?php echo "<img class='thumb_image' src='$productimage[1]' alt='Image #2' style='width:25%'>" ?>
        <?php echo "<img class='thumb_image' src='$productimage[2]' alt='Image #3' style='width:25%'>" ?>
      </div>
    </div>

    <form action="addtoCart.php" method="GET">
      <div class="productPage-productInformation">
        <div class="productPage-productInformationTopSection">
          <h1><?php echo "$product[prodName]"; ?></h1>
          <p class="productPage-price">AUD$<?php echo "$product[price]"; ?></p>
        </div>
        <div class="productPage-productInformationMiddleSection">
          <p><?php echo "$product[description]"; ?></p>
        </div>
        <div class="productPage-productInformationBottomSection">
          <div class="productPage-buttonCart">
            <p><button type="submit">Add to Cart</button></p>
          </div>
          <div class="productPage-quantityInput">
            <input id="hideme" name="prodID" value=<?php echo "$product[prodID]"; ?>>
            <label class="productPage-quantityText">Quantity</label>
            <input type="number" class="productPage-quantityTextInput" step="1" min="1" max="99" name="quantity" value="1">
          </div>
        </div>
      </div>
    </form>

    <div class="productPage-productDetails">
      <h2>ADDITIONAL DETAILS & DIMENSIONS</h2>
      <!-- <div class="productPage-productMaterials">  -->
      <h3>Materials</h3>
      <p>Fabric, Plastic, Resin</p>
      <!-- </div>
        <div class="productPage-productSize"> -->
      <h3>Product Size</h3>
      <p>Height: 16.5" (41.9 cm)<br>Width: 13" (33 cm)<br>Depth: 9" (22.9 cm) *</p>
      <!-- </div>
        <div class="productPage-productBoxSize"> -->
      <h3>Box Size</h3>
      <p>Height: 12.00" (30.5 cm)<br>Width: 17.50" (44.4 cm)<br>Depth: 20.00" (50.8 cm) *</p>
      <!-- </div>
        <div class="productPage-productWeigth"> -->
      <h3>Shipping Weight</h3>
      <p>12.00 lbs (5.4 kg) **</p>
      <!-- </div>
          <br>
        <div class="productPage-productDeatilsFooter"> -->
      <p><span id="measurementsDisclaimer">Size and weight are approximate values.</span></p>
      <p>SKU-400369 UPC-747720250611<br>© & ™ Lucasfilm Ltd.</p>
    </div>
  </div>
  </div>

  <!-- FOOTER -->
  <div class="nav-spacer"></div>

<?php
  require_once "inc/footer2.php"
  ?>
  <?php
  mysqli_close($conn);
  ?>

  <!-- JIM SCRIPT TO CHANGE THE IMAGES -->
  <script>
    let showcase = document.getElementById('MainImg');
    let thumb_img = document.getElementsByClassName('thumb_image');

    thumb_img[0].onclick = function() {
      showcase.src = thumb_img[0].src;
    }
    thumb_img[1].onclick = function() {
      showcase.src = thumb_img[1].src;
    }
    thumb_img[2].onclick = function() {
      showcase.src = thumb_img[2].src;
    }
  </script>
</body>

</html>