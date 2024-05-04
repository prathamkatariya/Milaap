<?php
session_start();

if (isset($_SESSION['email'])) {
    // Do Nothing
} else {
?>
    <script>
        location.replace("Login.php");
    </script>
<?php
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milaap Store - Shop</title>

    <!-- css link -->
    <link rel="stylesheet" href="../CSS/Shop.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <!-- Navbar code starts here -->

    <nav class=" nav-pvt- navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="Home.php">Milaap Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../store_home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Shop.php">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">Contact us</a>
                    </li>
                </ul>
                <li class="nav-item">
                    <a class="nav-link" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                        </svg>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" />
                        </svg>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Filter section code starts here -->

    <section id="filter">
        <div class="container">
            <div class="row">
                <div class="part col-sm-12">
                    <div class="shop-nav col-sm-12" id="filter-button">
                        <ul>
                            <li data-filter="^">
                                <span>All Categories</span>
                            </li>
                            <li data-filter=".topwear" class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Top-Wear
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Casual Shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Oversized T-shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Classic Fit T-shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Graphic T-shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Solid T-shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Hoddies & Jackets</a></li>
                                    <li><a class="dropdown-item" href="#">Sweatshirts & Sweaters</a></li>
                                </ul>
                            </li>
                            <li data-filter=".bottomwear" class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Bottom-Wear
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Jeans</a></li>
                                    <li><a class="dropdown-item" href="#">Cotton Pants</a></li>
                                    <li><a class="dropdown-item" href="#">Trousers</a></li>
                                    <li><a class="dropdown-item" href="#">Joggers</a></li>
                                    <li><a class="dropdown-item" href="#">Pajamas</a></li>
                                    <li><a class="dropdown-item" href="#">Boxers and Innerwear</a></li>
                                    <li><a class="dropdown-item" href="#">Shorts</a></li>
                                </ul>
                            </li>
                            <li data-filter=".shoes" class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Shoes
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Sneakers</a></li>
                                    <li><a class="dropdown-item" href="#">Sports Shoes</a></li>
                                    <li><a class="dropdown-item" href="#">Formal Shoes</a></li>
                                    <li><a class="dropdown-item" href="#">Loffers</a></li>
                                </ul>
                            </li>
                            <li data-filter=".accessories" class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Accessories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Shades</a></li>
                                    <li><a class="dropdown-item" href="#">Watches</a></li>
                                    <li><a class="dropdown-item" href="#">Chains & Lockets</a></li>
                                    <li><a class="dropdown-item" href="#">Socks</a></li>
                                    <li><a class="dropdown-item" href="#">Caps</a></li>
                                    <li><a class="dropdown-item" href="#">Perfumes</a></li>
                                    <li><a class="dropdown-item" href="#">Bags</a></li>
                                </ul>
                            </li>
                            <li data-filter=".collections" class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Collections
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Top-Seller Shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Top-Seller T-shirts</a></li>
                                    <li><a class="dropdown-item" href="#">Top-Seller Bottom-Wear</a></li>
                                    <li><a class="dropdown-item" href="#">New Arrivals</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Filter section code ends here -->

    <!-- Products section starts here -->

    <section id="products">
        <div class="container">
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-01.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-02.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-03.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-04.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-05.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-06.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-07.webp" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
            <div class="pro">
                <img src="../Store-Images/Top-Seller-Shirt-08.jpg" alt="image">
                <div class="des">
                    <span>Pure Cotton - Casual Wear</span>
                    <h5>Printed Shirt</h5>
                    <div class="star">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                    <h4>899 Rs /-</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </section>
    <!-- Products section ends here -->


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../Javascript/hover.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>