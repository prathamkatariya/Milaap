<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Contactus.css">

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
            <a class="brand navbar-brand" href="#">Milaap</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
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
                <form action="Login.php" class="d-flex">
                    <button class=" button-left btn" type="submit">Login</button>
                </form>
                <form action="Signup.php" class="d-flex">
                    <button class="button-right btn" type="submit">Signup</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- contactus section starts here -->

    <div class="container">

        <div class="form">
            <div class="contact-info">
                <h3 class="title">Contact us</h3>
                <p class="text">
                    We believe that every missing person deserves to be found, and we are committed to working tirelessly towards this goal. Milaap is here to support you every step of the way.
                </p>

                <div class="info">
                    <div class="information">
                        <img src="../Project-image/location.png" class="icon" alt="location icon" />
                        <p>Rajendra Nagar, Indore, Madhya Pradesh</p>
                    </div>
                    <div class="information">
                        <img src="../Project-image/email.png" class="icon" alt="email icon" />
                        <p>milaap@gmail.com</p>
                    </div>
                    <div class="information">
                        <img src="../Project-image/phone.png" class="icon" alt="phone icon" />
                        <p>+919479821716</p>
                    </div>
                </div>

                <div class="social-media">
                    <p>Connect with us :</p>
                    <div class="social-icons">
                        <a href="#">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="contact-form">
                <form action="#" method="POST" autocomplete="off">
                    <h3 class="title">Contact us</h3>
                    <div class="input-container">
                        <input type="text" name="name" class="input" value="" required />
                        <label for="">Your Name</label>
                        <span>Username</span>
                    </div>
                    <div class="input-container">
                        <input type="email" name="email" class="input" value="" required />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-container">
                        <input type="number" name="phone" class="input" value="" required />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-container textarea">
                        <textarea name="message" class="input" value=""></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" value="Send" name="Send" class="btns" />
                </form>
            </div>
        </div>
    </div>

    <!-- Contact us Code ended -->

    <!-- PHP Starts Here  -->
    <?php
    include 'Database_connection.php';

    if (isset($_POST['Send'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];



        $insertquerry = "INSERT INTO `contactus` (`name`, `email`, `phone`, `message`) VALUES ('$name', '$email', '$phone', '$message')";

        $result = mysqli_query($con, $insertquerry);

        if ($result) {
    ?>
            <script>
                        location.replace("../index.php");
            </script>
        <?php
        } else {
        ?>
            <script>
                alert("data not inserted");
            </script>
    <?php
        }
    }
    ?>
    <!-- php ended -->

    <!-- contactus section ends here -->

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
                <span class="copyright_text">Copyright © 2021 <a href="#">Milaap.</a>All rights reserved</span>
                <span class="policy_terms">
                    <a href="#">Privacy policy</a>
                    <a href="#">Terms & condition</a>
                </span>
            </div>
        </div>
    </footer>

    <!-- footer code ends here  -->

    <!-- javascript link -->
    <script src="../JavaScript/contactus.js"></script>

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