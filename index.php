<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="style.css">

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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="PHP/Contactus.php" tabindex="-1" aria-disabled="true">Contact Us</a>
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
                <form action="PHP/Login.php" class="d-flex">
                    <button class=" button-left btn" type="submit">Login</button>
                </form>
                <form action="PHP/Signup.php" class="d-flex">
                    <button class="button-right btn" type="submit">Signup</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Heading starts here -->
    <div class="header">
        <div class="heading">
            <h1>Search For Missing Persons</h1>
            <p>Bringing Loved ones home : Milaap</p>
            <a href="PHP/PostInfo.php" class="hero_btn">Report a Missing</a>
        </div>
    </div>
    <!-- Heading ends here -->

    <!-- Have you seen someone section start here  -->
    <div class="missing">
        <div class="row">
            <div class="col seenSomeone col-lg-6 col-md-12 col-sm-12">
                <h1>Have you <br> Seen Someone?</h1>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <section class="container">
                    <?php
                    include 'PHP/Database_connection.php';
                    $res = mysqli_query($con, "select * from missing_person_data");
                    if (mysqli_num_rows($res) > 0) {
                        foreach ($res as $row) {
                    ?>
                            <div class="card">
                                <div class="center">
                                    <div class="image">
                                        <img src="PHP/<?php echo $row['image']; ?>" alt="image" />
                                    </div>
                                    <h2><?php echo $row['full_name']; ?></h2>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>AGE AT DISAPPEARANCE : <?php echo $row['age']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Body Color: <?php echo $row['body_color']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Height: <?php echo $row['height']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Build: <?php echo $row['build']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Hair Color: <?php echo $row['hair_color']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Eye Color: <?php echo $row['eye_color']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Profession: <?php echo $row['profession']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Missing Location: <?php echo $row['missing_location']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Living Location: <?php echo $row['living_location']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Missing Date: <?php echo $row['missing_date']; ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-lg-6 col-md-12 col-sm-12">
                                        <p>Gender: <?php echo $row['gender']; ?></p>
                                    </div>
                                    <div class="col col-lg-6 col-md-12 col-sm-12">

                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
    <!-- Have you seen someone section ends here  -->

    <!-- About us Section code starts here  -->
    <div class="aboutus">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="milaap-col">
                    <a href="#"><img src="Project-image/milaap-image.jpg" alt="Image"></a>
                </div>
            </div>
            <div class="col about col-lg-6 col-md-12 col-sm-12">
                <h1>
                    Milaap : Bringing loved ones home
                </h1>
                <p>
                    Welcome to Milaap, the online platform dedicated to reuniting missing people with their loved ones. We understand the pain and anxiety that comes with having a missing family member or friend, which is why we strive to help you find them quickly and efficiently.

                    Our platform connects you with resources such as local authorities, news outlets, and social media channels, to increase the chances of locating your missing loved one.

                    We believe that every missing person deserves to be found, and we are committed to working tirelessly towards this goal. Whether you're searching for a missing child, adult, or elderly person, Milaap is here to support you every step of the way.

                    Join our community and help us bring missing individuals back home. Together, we can make a difference.
                </p>
                <div class="link">
                    <a href="#">Join US</a>
                </div>
            </div>
        </div>
    </div>


    <!-- About us Section code ends here  -->

    <!-- Charity section code starts here  -->
    <div class="charity">
        <div class="row">
            <div class="col donate col-lg-6 col-md-12 col-sm-12">
                <h1>
                    Be a lifeline to someone in crisis
                </h1>
                <div class="link">
                    <a href="#">Donate</a>
                </div>
            </div>
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="donate-col">
                    <a href="#"><img src="Project-image/donate-image.png" alt="Computer Image"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Charity section code ends here  -->

    <!-- Get in touch section code starts here  -->
    <div class="GetInTouch">
        <div class="row">
            <div class="col col-lg-6 col-md-12 col-sm-12">
                <div class="contact-col">
                    <a href="#"><img src="Project-image/contact-us-image.jpg" alt="Computer Image"></a>
                </div>
            </div>
            <div class="col contact col-lg-6 col-md-12 col-sm-12">
                <h1>
                    Get In Touch
                </h1>
                <p>If you have been affected by a disappearance, you have information about a missing person, you're interested in supporting us, or you a professional working with missing persons, we'd love to hear from you.</p>
                <div class="link">
                    <a href="PHP/Contactus.php">Contact US</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Get in touch section code ends here  -->

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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="PHP/Contactus.php">Contact Us</a></li>
                    <li><a href="#">Join us</a></li>
                </ul>
                <ul class="box">
                    <li class="link_name">Services</li>
                    <li><a href="PHP/PostInfo.php">Post Info About Missing</a></li>
                    <li><a href="PHP/GetInfo.php">Get Info About Missing</a></li>
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