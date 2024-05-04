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
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Joinus.css">

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
                <form action="Joinee_page.php" class="d-flex">
                    <button class=" button-left btn" type="submit">Already joined! Click here</button>
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
        <div class="title">Join Our Community!</div>
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
                        <span class="details">Gender (Male/Female)</span>
                        <input type="text" name="gender" placeholder="Enter Gender" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Job Title</span>
                        <input type="text" name="job_title" placeholder="Enter Job Title" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Skill-1(90%-100%)</span>
                        <input type="text" name="skill_1" placeholder="Enter your skill" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Skill-2(70%-90%)</span>
                        <input type="text" name="skill_2" placeholder="Enter your skill" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Skill-3(50%-70%)</span>
                        <input type="text" name="skill_3" placeholder="Enter your skill" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email Address</span>
                        <input type="text" name="email_address" placeholder="Enter Email Address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phone Number</span>
                        <input type="text" name="phone_number" placeholder="Enter Phone Number" required id="mobile" oninput="checkMobile()">
                        <p id="error" style="color: red;"></p>
                    </div>
                    <!-- Checking of mobile number starts here -->
                    <script>
                        function checkMobile() {
                            var mobileNumber = document.getElementById("mobile").value;
                            var digitsOnly = /^\d+$/;

                            if (mobileNumber.length !== 10 || !digitsOnly.test(mobileNumber)) {
                                document.getElementById("error").innerText = "Please enter a valid 10-digit mobile number.";
                            } else {
                                document.getElementById("error").innerText = "";
                            }
                        }
                    </script>
                    <!-- Checking of mobile number ends here -->
                    <div class="input-box">
                        <span class="details">Postal Code</span>
                        <input type="text" name="postal_code" placeholder="Enter Postal Code" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Home Address</span>
                        <input type="text" name="home_address" placeholder="Enter Home Address" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Town/City</span>
                        <input type="text" name="city" placeholder="Enter Town/City" required>
                    </div>
                    <div class="input-box">
                        <span class="details">State</span>
                        <input type="text" name="state" placeholder="Enter State" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Amount of Time (in a week)</span>
                        <input type="text" name="time" placeholder="Enter the number of hours you would like to donate." required>
                    </div>
                </div>
                <br><br>
                <p>Clicking on submit shows that you are willing to help Missing People as a partner and you will do your best to meet the conditions. </p>
                <div class="button">
                    <input type="submit" name="Submit" value="Submit">
                </div>
            </form>
        </div>
    </div>

    <!-- Registration form code ends here -->

    <!-- Php code starts here -->

    <?php
    if (mysqli_num_rows(mysqli_query($con, "select * from members where joinee_email='$email'")) > 0) {
    ?>
        <script>
            alert("Already a member");
        </script>
        <?php
    } else {
        if (isset($_POST['Submit'])) {
            $full_name = $_POST['full_name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $job_title = $_POST['job_title'];
            $skill_1 = $_POST['skill_1'];
            $skill_2 = $_POST['skill_2'];
            $skill_3 = $_POST['skill_3'];
            $joinee_email = $_POST['email_address'];
            $phone_number = $_POST['phone_number'];
            $postal_code = $_POST['postal_code'];
            $home_address = $_POST['home_address'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $time = $_POST['time'];

            $insertquerry = "INSERT INTO `members` (`user_email`,`Full_Name`,`Age`,`Gender`,`Job_Title`,`skill_1`,`skill_2`,`skill_3`,`joinee_email`,`Phone_Number`,`Postal_Code`,`Home_Address`,`City`,`State`,`time`) VALUES ('$email','$full_name','$age','$gender','$job_title','$skill_1','$skill_2','$skill_3','$joinee_email','$phone_number','$postal_code','$home_address','$city','$state','$time')";

            $result = mysqli_query($con, $insertquerry);

            if ($result) {
                $_SESSION['Joinee_City'] = $city;
        ?>
                <script>
                    location.replace("Joinee_page.php");
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
    }
    ?>

    <!-- Php code ends here -->


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