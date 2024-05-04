<?php 
session_start();

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    include 'Database_connection.php';
}else{
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

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Joinee_page.css">

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
            <a class="brand navbar-brand" href="../index.php">Milaap</a>
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

    <!-- Navbar code ends here-->

    <!-- Have you seen someone section start here  -->
    <div class="missing">
        <div class="col col-lg-6 col-md-12 col-sm-12">
            <section class="container">
                <?php
                include 'Database_connection.php';
                if (isset($_SESSION['Joinee_City'])) {
                    $src_1 = $_SESSION['Joinee_City'];
                    $res_1 = mysqli_query($con, "select * from statelist where city_name ='$src_1'");
                    if (mysqli_num_rows($res_1) > 0) {
                        $row_1 = mysqli_fetch_array($res_1);
                        $lat1 = $row_1[2];
                        $long1 = $row_1[3];
                        $res_2 = mysqli_query($con, "select * from missing_person_data");
                        if ($res_2) {
                            $row_count = mysqli_num_rows($res_2);
                            for ($i = 0; $i < $row_count; $i++) {
                                $row = mysqli_fetch_array($res_2);
                                $full_name = $row['full_name'];
                                $age = $row['age'];
                                $body_color = $row['body_color'];
                                $height = $row['height'];
                                $build = $row['build'];
                                $hair_color = $row['hair_color'];
                                $eye_color = $row['eye_color'];
                                $profession = $row['profession'];
                                $missing_city = $row['missing_city'];
                                $missing_state = $row['missing_state'];
                                $missing_date = $row['missing_date'];
                                $image = $row['image'];
                                $gender = $row['gender'];
                                $src_2 = $missing_city;
                                $res_3 = mysqli_query($con, "select * from statelist where city_name ='$src_2'");
                                if (mysqli_num_rows($res_3) > 0) {
                                    $row_2 = mysqli_fetch_array($res_3);
                                    $lat2 = $row_2[2];
                                    $long2 = $row_2[3];
                                    // Function to calculate the distance between two sets of coordinates using the Haversine formula
                                    if (function_exists("haversineDistance") === FALSE) {
    
                                    function haversineDistance($lat1, $long1, $lat2, $long2)
                                    {
                                        // Radius of the Earth in kilometers
                                        $earthRadius = 6371;

                                        // Convert latitude and longitude from degrees to radians
                                        $lat1 = deg2rad($lat1);
                                        $long1 = deg2rad($long1);
                                        $lat2 = deg2rad($lat2);
                                        $long2 = deg2rad($long2);
                                        // Haversine formula
                                        $dlat = $lat2 - $lat1;
                                        $dlong = $long2 - $long1;
                                        $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlong / 2) * sin($dlong / 2);
                                        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
                                        $distance = $earthRadius * $c;
                                        return $distance;
                                    }
                                }
                                    $distance = haversineDistance($lat1, $long1, $lat2, $long2);
                                    if ($distance <= '500') {
                ?>
                                        <div class="card">
                                            <div class="center">
                                                <div class="image">
                                                    <img src="<?php echo $image; ?>" alt="image" />
                                                </div>
                                                <h2><?php echo $full_name; ?></h2>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>AGE AT DISAPPEARANCE : <?php echo $age; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Body Color: <?php echo $body_color; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Height: <?php echo $height; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Build: <?php echo $build; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Hair Color: <?php echo $hair_color; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Eye Color: <?php echo $eye_color; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Profession: <?php echo $profession; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing City: <?php echo $missing_city; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing State: <?php echo $missing_state; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing Date: <?php echo $missing_date; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Gender: <?php echo $gender; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">

                                                </div>
                                            </div>
                                        </div>
                <?php
                                    }
                                } else {
                                    echo 'Not Working 1';
                                }
                            }
                        } else {
                            echo 'Not Working 3';
                        }
                    } else {
                        echo 'Not Working 4';
                    }
                } else {
                    echo 'Not Working 5';
                }
                ?>
            </section>
        </div>
    </div>
    <!-- Have you seen someone section ends here  -->

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