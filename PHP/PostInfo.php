<?php 
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/PostInfo.css">

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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">News</a>
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
                <form action="GetInfo.php" class="d-flex">
                    <button class=" button-left btn" type="submit">Get info about missing</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Registration form code starts here -->

    <div class="container">
        <div class="title">Provide Missing Info!</div>
        <div class="content">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="full_name" placeholder="Enter name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Age</span>
                        <input type="text" name="age" placeholder="Enter Age" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Body Color</span>
                        <input type="text" name="body_color" placeholder="Enter Body Color" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Height</span>
                        <input type="text" name="height" placeholder="Enter Height" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Build (Slim/Fat/Normal)</span>
                        <input type="text" name="build" placeholder="Enter Body type" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Hair color</span>
                        <input type="text" name="hair_color" placeholder="Enter Hair Color" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Eye Color</span>
                        <input type="text" name="eye_color" placeholder="Enter Eye Color" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Profession</span>
                        <input type="text" name="profession" placeholder="Enter Profession" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Missing Location</span>
                        <input type="text" name="missing_location" placeholder="Enter missing Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Living Location</span>
                        <input type="text" name="living_location" placeholder="Enter living Location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Missing Date</span>
                        <input type="Date" name="missing_date" placeholder="Enter missing date" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Gender (Male/Female)</span>
                        <input type="text" name="gender" placeholder="Enter Gender" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Recent Photo (Passport size if possible)</span>
                        <input type="file" name="image" placeholder="Provide image" required>
                    </div>
                </div>
                <br><br>
                <p>By clicking on upload you agree <a href="#">Terms & Condition</a> and <a href="#">Privacy Policy</a> of Milaap </p>
                <div class="button">
                    <input type="submit" name="Submit" value="Upload">
                </div>
            </form>
        </div>
    </div>

    <!-- Registration form code ends here -->

    <!-- Php code starts here -->

    <?php
    include 'Database_connection.php';

    if (isset($_POST['Submit'])) {
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $body_color = $_POST['body_color'];
        $height = $_POST['height'];
        $build = $_POST['build'];
        $hair_color = $_POST['hair_color'];
        $eye_color = $_POST['eye_color'];
        $profession = $_POST['profession'];
        $missing_location = $_POST['missing_location'];
        $living_location = $_POST['living_location'];
        $missing_date = $_POST['missing_date'];
        $image = $_FILES['image'];
        $gender = $_POST['gender'];
        $username = $_SESSION['user_name'];


        // print_r($image);

        $imagename = $image['name'];
        $imagepath = $image['tmp_name'];
        $imageerror = $image['error'];

        if ($imageerror == 0) {
            
            $destinationimage = '../images/'.$imagename;
            move_uploaded_file($imagepath,$destinationimage);
            $insertquerry = "INSERT INTO `missing_person_data`(`user_name`,`full_name`, `age`, `body_color`, `height`, `build`, `hair_color`, `eye_color`, `profession`, `missing_location`, `living_location`, `missing_date`, `image`, `gender`) VALUES ('$username','$full_name','$age','$body_color','$height','$build','$hair_color','$eye_color','$profession','$missing_location','$living_location','$missing_date','$destinationimage','$gender')";

            $result = mysqli_query($con, $insertquerry);

            if ($result) {
                ?>
                    <script>
                      location.replace("Poster.php");
                    </script>
                  <?php
                  } else {
                  ?>
                    <script>
                      alert("data not inserted");
                    </script>
                <?php
                  }
        }else{
            ?>
                    <script>
                      alert("Image not inserted");
                    </script>
                <?php
        }
    }
    ?>

    <!-- Php code starts here -->


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