<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../CSS/insert_Product.css">
  <title>Insert Product</title>
</head>

<body>
  <div class="cards">
    <div class="container">
      <div class="wrapper">
        <div class="banner-image-1">

        </div>
        <h3>Insert Top-Wear Products</h3>
      </div>
      <div class="button-wrapper">
        <button class="btn fill" onclick="redirectToTopWear()">Insert</button>
      </div>
      <!-- Javascript for redirecting to Top Wear starts here -->
      <script>
        function redirectToTopWear() {
          window.location.href = "Insert-Top-Wear-Product.php"; // Replace with the URL of the page you want to redirect to
        }
      </script>
      <!-- Javascript for redirecting to Top Wear ends here -->
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="banner-image-2"> </div>
        <h3>Insert Bottom-Wear Products</h3>
      </div>
      <div class="button-wrapper">
        <button class="btn fill" onclick="redirectToBottomWear()">Insert</button>
      </div>
    </div>
    <!-- Javascript for redirecting to Bottom Wear starts here -->
    <script>
      function redirectToBottomWear() {
        window.location.href = "Insert-Bottom-Wear-Product.php"; // Replace with the URL of the page you want to redirect to
      }
    </script>
    <!-- Javascript for redirecting to Bottom Wear ends here -->
    <div class="container">
      <div class="wrapper">
        <div class="banner-image-3"> </div>
        <h3>Insert Foot-Wear Products</h3>
      </div>
      <div class="button-wrapper">
        <button class="btn fill">Insert</button>
      </div>
    </div>
    <div class="container">
      <div class="wrapper">
        <div class="banner-image-4"> </div>
        <h3>Insert Accessories Products</h3>
      </div>
      <div class="button-wrapper">
        <button class="btn fill">Insert</button>
      </div>
    </div>
  </div>
</body>

</html>