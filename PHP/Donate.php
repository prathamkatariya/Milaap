<?php
session_start();

if (isset($_SESSION['email'])) {
    include 'Database_connection.php';
    $email = $_SESSION['email'];
} else {
?>
    <script>
        location.replace("Login.php");
    </script>
<?php
    die();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../CSS/swiper-bundle.min.css" />

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Donate.css">

    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="Home.php">Milaap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contactus.php" tabindex="-1" aria-disabled="true">Contact Us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Helpline No.
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">+91 8517005529</a></li>
                            <li><a class="dropdown-item" href="#">+919479821716</a></li>
                            <li><a class="dropdown-item" href="#"></a></li>
                        </ul>
                    </li>
                </ul>
                <form action="All_missing.php" class="d-flex">
                    <button class=" button-left btn" type="submit">Get info about missing</button>
                </form>
                <form action="PostInfo.php" class="d-flex">
                    <button class="button-right btn" type="submit">Post info about missing</button>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?php
                                    $image_path = "SELECT profile_image FROM signup WHERE Email_id = '$email'";
                                    $answer = $con->query($image_path);
                                    if ($answer->num_rows > 0) {
                                        while ($row = $answer->fetch_assoc()) {
                                            echo $row["profile_image"];
                                        }
                                    } else {
                                        echo "0 results";
                                    }
                                    ?>" alt="Profile_Image">
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">My Profile</a></li>
                        <li><a class="dropdown-item" href="Destroy.php">Logout</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- heading section starts here -->
    <div class="container" id="blur">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="heading-col">
                    <a href="#"><img src="../Project-image/Donation Image.jpeg" alt="Image"></a>
                </div>
            </div>
            <div class="col heading-content col-lg-6 col-md-12 col-sm-12">
                <h1>Be a lifeline to someone in crisis</h1>
                <p>
                    "Every small contribution brings us one step closer to finding our missing loved one. Please consider donating today and help us reunite a family in need."
                </p>
                <button type="submit" class="link" onclick="toggle()">Donate</button>
            </div>
        </div>
    </div>
    <div class="popup" id="popup">
        <img src="../Project-image/Donation-QR-Code.png" alt="Donation Image">
        <button type="button" onclick="toggle()">OK</button>
    </div>

    <!-- heading section ends here -->

    <!-- swiper-1 section starts here -->

    <section class="slider">
        <h1>Ways your donation can help</h1>
        <div class="testimonial mySwiper">
            <div class="testi-content swiper-wrapper">
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">Funding Search and Rescue Efforts</span>
                    </div>
                    <p>
                        Donations provide the financial resources necessary to fund search and rescue operations. This includes mobilizing teams, equipment, and technology needed to conduct thorough searches and investigations.
                    </p>
                </div>
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">Awareness Campaigns</span>
                    </div>
                    <p>
                        Donations enable us to run awareness campaigns, which can help locate missing individuals faster. These campaigns might involve distributing flyers, running social media ads, or organizing community events to garner public attention.
                    </p>
                </div>
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">Support for Families</span>
                    </div>
                    <p>
                        Donations often go towards providing support services for the families of missing persons. This can include counseling, legal assistance, and resources to help them navigate the challenging emotional and legal aspects of a missing loved one.
                    </p>
                </div>
            </div>
            <div class="swiper-button-next nav-btn"></div>
            <div class="swiper-button-prev nav-btn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- swiper-1 section ends here -->

    <!-- Donation with shopping code starts here -->

    <div class="shopping">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="shop-col">
                    <a href="#"><img src="../Project-image/Shopping Image.jpeg" alt="Image"></a>
                </div>
            </div>
            <div class="col shop col-lg-6 col-md-12 col-sm-12">
                <h1>You can also support us by shopping! </h1>
                <p>
                    " Your shopping makes a meaningful impact! Every purchace on our e-commerce website support families of missing person through charitable contributions. "
                </p>
                <form action="../Milaap Store/store_home.php">
                    <button type="submit" class="link">Shop</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Donation with shopping code ends here -->

    <!-- swiper-2 section starts here -->

    <section class="slider">
        <h1>Why we need your support?</h1>
        <div class="testimonial mySwiper">
            <div class="testi-content swiper-wrapper">
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">39 People</span>
                    </div>
                    <p>
                        39 people are reported missing every hour in India.
                    </p>
                </div>
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">50 Percent</span>
                    </div>
                    <p>
                        50% of the missing person in India are untraced.
                    </p>
                </div>
                <div class="slide swiper-slide">
                    <i class="bx bxs-quote-alt-left quote-icon"></i>
                    <div class="details">
                        <span class="name">90 Seconds</span>
                    </div>
                    <p>
                        Every 90 second someone is reportedly missing in India.
                    </p>
                </div>
            </div>
            <div class="swiper-button-next nav-btn"></div>
            <div class="swiper-button-prev nav-btn"></div>
            <div class="swiper-pagination"></div>
        </div>
    </section>
    <!-- swiper-2 section ends here -->


    <!-- Footer code starts here  -->

    <footer>
        <div class="content">
            <div class="top">
                <div class="logo-details">
                    <i class="fab fa-slack"></i>
                    <span class="logo_name">Milaap</span>
                </div>
                <div class="media-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="link-boxes">
                <ul class="box">
                    <li class="link_name">Company</li>
                    <li><a href="Home.php">Home</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="Contactus.php">Contact us</a></li>
                    <li><a href="#">Join Us</a></li>
                </ul>
                <ul class="box">
                    <li class="link_name">Services</li>
                    <li><a href="PostInfo.php">Post Info About Missing</a></li>
                    <li><a href="GetInfo.php">Get Info About Missing</a></li>
                    <li><a href="#">Donate</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul class="box">
                    <li class="link_name">Account</li>
                    <li><a href="#">Profile</a></li>
                    <li><a href="#">My account</a></li>
                    <li><a href="#">Prefrences</a></li>
                    <li><a href="#">Portfolio</a></li>
                </ul>
                <!-- <ul class="box">
                    <li class="link_name">Courses</li>
                    <li><a href="#">HTML & CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                    <li><a href="#">Photography</a></li>
                    <li><a href="#">Photoshop</a></li>
                </ul> -->
                <ul class="box input-box">
                    <li class="link_name">Download Guide</li>
                    <li><input type="text" placeholder="Enter your email"></li>
                    <li><input type="button" value="Download"></li>
                </ul>
            </div>
        </div>
        <div class="bottom-details">
            <div class="bottom_text">
                <span class="copyright_text">Copyright © 2023 <a href="#">Milaap.</a>All rights reserved</span>
                <span class="policy_terms">
                    <a href="#">Privacy policy</a>
                    <a href="#">Terms & condition</a>
                </span>
            </div>
        </div>
    </footer>

    <!-- footer code ends here  -->

    <!-- Popup JavaScript link -->
    <script src="../JavaScript/popup.js"></script>
    <!-- Swiper JS -->
    <script src="../JavaScript/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <script src="../JavaScript/swiper.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>