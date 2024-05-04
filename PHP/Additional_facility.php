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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS link  -->
    <link rel="stylesheet" href="../CSS/Additional_facility.css">

    <!-- Font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Additional Facility</title>
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
                <ul>
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
                </ul>
            </div>
        </div>
    </nav>
<h6 style="text-align: center; margin-top:5px;"> 
Note: All the money that is taken from you is not our profit. It is used to pay for newspaper, television, and Instagram page services.</h6>
    <!-- Navbar code ends here-->
    <div class="cards">
        <div class="container">
            <div class="wrapper">
                <h5>Basic</h5>
                <h3>FREE</h3>
                <br>
                    <ul>
                        <li>Send to all the milaap members.</li>
                        <li>Forwarded to all Whatsapp groups.</li>
                        <li>See all the related updates.</li>
                        <li>Display on all Platforms of Milaap.</li>
                    </ul>
            </div>
            <div class="button-wrapper">
                <button class="btn-facility fill" onclick="redirectToTopWear()">Let's Find</button>
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
                <h5>Popular</h5>
                <h3>₹1000</h3>
                <br>
                    <ul>
                        <li>Send to all the milaap members.</li>
                        <li>Forwarded to all Whatsapp groups.</li>
                        <li>See all the related updates.</li>
                        <li>Display on all Platforms of Milaap.</li>
                        <li>Display on a <strong>regional</strong> Newspaper.</li>
                        <li>Display on a <strong>regional</strong> Television.</li>
                        <li>Display on a <strong>regional</strong> Instagram page.</li>
                        <li>Display on youtube News Channel.</li>
                    </ul>
            </div>
            <div class="button-wrapper">
                <button class="btn-facility fill" onclick="redirectToTopWear()">Let's Find Fast</button>
            </div>
            <!-- Javascript for redirecting to Top Wear starts here -->
            <script>
                function redirectToTopWear() {
                    window.location.href = "Find_Fast_Checkout.php"; // Replace with the URL of the page you want to redirect to
                }
            </script>
            <!-- Javascript for redirecting to Top Wear ends here -->
        </div>
        <div class="container">
            <div class="wrapper">
            <h5>Premium</h5>
                <h3>₹10000</h3>
                <ul>
                        <li>Send to all the milaap members.</li>
                        <li>Forwarded to all Whatsapp groups.</li>
                        <li>See all the related updates.</li>
                        <li>Display on all Platforms of Milaap.</li>
                        <li>Display on two <strong style="color: yellow;">National</strong>  Newspaper.</li>
                        <li>Display on two <strong style="color: yellow;">National</strong> Television.</li>
                        <li>Display on two <strong style="color: yellow;">National</strong> Instagram page.</li>
                        <li>Display on youtube News Channel.</li>
                    </ul>
            </div>
            <div class="button-wrapper">
                <button class="btn-facility fill" onclick="redirectToTopWear()">Let's Find Ultra Fast</button>
            </div>
            <!-- Javascript for redirecting to Top Wear starts here -->
            <script>
                function redirectToTopWear() {
                    window.location.href = "Find_Ultra_Fast_Checkout.php"; // Replace with the URL of the page you want to redirect to
                }
            </script>
            <!-- Javascript for redirecting to Top Wear ends here -->
        </div>
    </div>

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
                    <li><a href="Contactus.php">Contact Us</a></li>
                    <li><a href="#">Join us</a></li>
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

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>