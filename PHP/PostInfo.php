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
                        <a class="nav-link active" aria-current="page" href="Home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Contactus.php" tabindex="-1" aria-disabled="true">Contact us</a>
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
                        <span class="details">Dress Color (When last seen)</span>
                        <input type="text" name="dress_color" placeholder="Enter dress Color" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Something Unique information compare to others</span>
                        <input type="text" name="uniqueness" placeholder="Enter Something Unique" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Missing City/Town</span>
                        <input type="text" name="missing_city" placeholder="Enter missing city/Town" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Missing State</span>
                        <input type="text" name="missing_state" placeholder="Enter missing state" required>
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
                    <div class="input-box">
                        <span class="details">Enter Mobile no. (For Verification through a video call)</span>
                        <input type="text" name="verification_mobile_number" placeholder="Enter Mobile Number" required>
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

    if (isset($_POST['Submit'])) {
        $full_name = $_POST['full_name'];
        $age = $_POST['age'];
        $body_color = $_POST['body_color'];
        $height = $_POST['height'];
        $build = $_POST['build'];
        $hair_color = $_POST['hair_color'];
        $eye_color = $_POST['eye_color'];
        $profession = $_POST['profession'];
        $dress_color = $_POST['dress_color'];
        $uniqueness = $_POST['uniqueness'];
        $missing_city = $_POST['missing_city'];
        $missing_state = $_POST['missing_state'];
        $missing_date = $_POST['missing_date'];
        $image = $_FILES['image'];
        $gender = $_POST['gender'];
        $verification_mobile_number = $_POST['verification_mobile_number'];


        // print_r($image);

        $imagename = $image['name'];
        $imagepath = $image['tmp_name'];
        $imageerror = $image['error'];

        if ($imageerror == 0) {
            $last_image_number = 1;
            $files = scandir('../images/');
            foreach ($files as $file) {
                if (preg_match('/^img(\d+)\.(jpg|jpeg|png|gif)$/', $file, $matches)) {
                    $image_number = intval($matches[1]);
                    if ($image_number >= $last_image_number) {
                        $last_image_number = $image_number + 1;
                    }
                }
            }
            $new_imagename = 'img' . $last_image_number . '.' . pathinfo($imagename, PATHINFO_EXTENSION);

            $destinationimage = '../images/' . $new_imagename;
            move_uploaded_file($imagepath, $destinationimage);
            $insertquerry = "INSERT INTO `missing_person_data`(`user_email`,`full_name`, `age`, `body_color`, `height`, `build`, `hair_color`, `eye_color`, `profession`, `dress_color`, `uniqueness`, `missing_city`, `missing_state`, `missing_date`, `image`, `gender`,`verification_mobile_number`) VALUES ('$email','$full_name','$age','$body_color','$height','$build','$hair_color','$eye_color','$profession','$dress_color','$uniqueness','$missing_city','$missing_state','$missing_date','$destinationimage','$gender','$verification_mobile_number')";

            $result = mysqli_query($con, $insertquerry);

            if ($result) {
                require_once("class.phpmailer.php");
                function smtp_mailer($full_name,$age,$body_color,$height,$build,$hair_color,$eye_color,$profession,$dress_color,$uniqueness,$missing_city,$missing_state,$missing_date,$destinationimage,$gender)
                {
                    include 'Database_connection.php';
                    $mail = new PHPMailer(); // create a new object
                    $mail->IsSMTP(); // enable SMTP
                    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                    $mail->SMTPAuth = true; // authentication enabled
                    $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                    $mail->Host = "smtp.gmail.com";
                    $mail->Port = 587;
                    $mail->IsHTML(true);
                    $mail->Username = "theicodeofficial@gmail.com";
                    $mail->Password = "iuyi srpr rbgu rplu";
                    $mail->SetFrom("theicodeofficial@gmail.com");
                    $mail->Subject = "New Missing Person Detail";
                    $message = '<p>"We are reaching out to you for assistance in locating our fellow friend who is currently missing.</p><br><p>Information related to our friend is mentioned below.</p>';
                    $message .= '<p>Name: '.$full_name.'</p>';
                    $message .= '<p>Age: '.$age.'</p>';
                    $message .= '<p>Body Color:'.$body_color.'</p>';
                    $message .= '<p>Height: ' .$height.'</p>';
                    $message .= '<p>Build(Slim/Fat/Normal): '.$build.'</p>';
                    $message .= '<p>Hair Color: '.$hair_color.'</p>';
                    $message .= '<p>Eye Color: '.$eye_color.'</p>';
                    $message .= '<p>Proffession: '.$profession.'</p>';
                    $message .= '<p>Last Wear Dress Color: '.$dress_color.'</p>';
                    $message .= '<p>Something: '.$uniqueness.'</p>';
                    $message .= '<p>Missing City: '.$missing_city.'</p>';
                    $message .= '<p>Missing State: '.$missing_state.'</p>';
                    $message .= '<p>Missing Date: '.$missing_date.'</p>';
                    $message .= '<p>Gender: '.$gender.'</p>';
                    $message .= '<p>"Please find a attachment below where <strong>image</strong> of the missing person is mentioned."</p>';
                    $mail->Body = $message;
                    $mail->isHTML(true);
                    $mail->addAttachment($destinationimage);
                    $address = "SELECT joinee_email FROM members";
                    $address_res = $con->query($address);
                    if ($address_res->num_rows > 0) {
                        while ($row = $address_res->fetch_assoc()) {
                            $mail->clearAddresses();
                            $mail->addAddress($row['joinee_email']);
                            if ($mail->send()) {
    ?>
                                <script>
                                    location.replace("Additional_facility.php");
                                </script>
                            <?php
                            } else {
                            ?>
                                <script>
                                    alert("Email Not Sent Error");
                                </script>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <script>
                            alert("No Joinee Email Found");
                        </script>
                <?php
                    }
                }
                smtp_mailer($full_name,$age,$body_color,$height,$build,$hair_color,$eye_color,$profession,$dress_color,$uniqueness,$missing_city,$missing_state,$missing_date,$destinationimage,$gender);
                // if (!$mail->Send()) {
                //     echo "Mailer Error: " . $mail->ErrorInfo;
                // } else {
                //     echo "Message has been sent";
                // }
                ?>
                <!-- <script>
                    location.replace("Poster.php");
                </script> -->
            <?php
            } else {
            ?>
                <script>
                    alert("data not inserted");
                </script>
            <?php
            }
        } else {
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