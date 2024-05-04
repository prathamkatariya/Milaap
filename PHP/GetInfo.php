<?php
session_start();

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    include 'Database_connection.php';
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/GetInfo.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Javascript for html to img -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

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

    <!-- Get info section start here  -->
    <div class="poster">
        <div class="col">
            <div class="row missing" id="downloadposter">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <section class="container">
                        <?php
                        $id = $_GET['id'];
                        $res = mysqli_query($con, "select * from missing_person_data where id='$id' ");
                        if (mysqli_num_rows($res) > 0) {
                            foreach ($res as $row) {
                        ?>
                                <div class="card">
                                    <div class="logo-details">
                                        <i class="fab fa-slack"></i>
                                        <span class="logo_name">Milaap</span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="text-center">Missing: <?php echo $row['full_name']; ?></h1>
                                            <div class="center">
                                                <div class="image">
                                                    <img src="<?php echo $row['image']; ?>" alt="image" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col">
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
                                                    <p>Missing City: <?php echo $row['missing_city']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing State: <?php echo $row['missing_state']; ?></p>
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
                                                    <p>Something Uniquee: <?php echo $row['uniqueness']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Dress Color (When last Seen): <?php echo $row['dress_color']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No Record Available";
                        }
                        ?>
                    </section>
                </div>
            </div>
            <div class="row missing">
                <div class="download">
                    <button class="button btn" type="Submit" id="downloadpdf">Download</button>
                </div>
            </div>
            <!-- Javascript to download image starts here -->

            <script>
                document.getElementById('downloadpdf').addEventListener('click', function() {
                    html2canvas(document.getElementById('downloadposter'), {
                        onrendered: function(canvas) {
                            var imageDataURL = canvas.toDataURL('image/png');
                            console.log('Image data URL:', imageDataURL);

                            var link = document.createElement('a');
                            link.href = imageDataURL;
                            link.download = 'myImage.png';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    });
                });
            </script>

            <!-- Javascript to download image ends here -->
        </div>
    </div>
    <!-- Get info section ends here  -->

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