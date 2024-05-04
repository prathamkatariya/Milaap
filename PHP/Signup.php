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
    <link rel="stylesheet" href="../CSS/Signup.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="../index.php">Milaap</a>
            <p>Already Registered? <a href="Login.php">Login</a> here</p>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Registration form code starts here -->
    <div class="container">
        <div class="title">Signup For Additional Benefits!</div>
        <div class="content">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">First Name</span>
                        <input type="text" name="first_name" placeholder="Enter your First name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Last Name</span>
                        <input type="text" name="last_name" placeholder="Enter your Last name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="Email_id" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Date of Birth</span>
                        <input type="Date" name="dob" placeholder="Enter your Date of Birth" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password (Use Strong Password)</span>
                        <input type="password" name="Password" placeholder="Enter your password" required id="password" oninput="checkPasswordStrength()">
                        <p id="Password_Strength" style="color: red;"></p>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="Confirm_Password" placeholder="Enter your Confirm Password" required id="confirm_password" oninput="checkConfirmPasswordStrength()">
                        <p id="Confirm_Password_Strength" style="color: red;"></p>
                    </div>
                    <!-- Checking for password validation starts here  -->
                    <script>
                        function checkPasswordStrength() {
                            var password = document.getElementById("password").value;
                            var P_strength = document.getElementById("Password_Strength");

                            // Reset the strength indicator
                            P_strength.innerText = "";

                            // Check if the password is long enough
                            if (password.length < 8) {
                                P_strength.innerText = "Password is too short (must be at least 8 characters).";
                                return;
                            }

                            // Check if the password contains at least one uppercase letter
                            if (!/[A-Z]/.test(password)) {
                                P_strength.innerText = "Password should contain at least one uppercase letter.";
                                return;
                            }

                            // Check if the password contains at least one lowercase letter
                            if (!/[a-z]/.test(password)) {
                                P_strength.innerText = "Password should contain at least one lowercase letter.";
                                return;
                            }

                            // Check if the password contains at least one digit
                            if (!/\d/.test(password)) {
                                P_strength.innerText = "Password should contain at least one digit.";
                                return;
                            }

                            // Password is strong
                            P_strength.innerText = "Password strength: Strong";
                            P_strength.style.color = "green";
                        }

                        function checkConfirmPasswordStrength() {
                            var confirm_password = document.getElementById("confirm_password").value;
                            var CP_strength = document.getElementById("Confirm_Password_Strength");

                            // Reset the strength indicator
                            CP_strength.innerText = "";

                            // Check if the password is long enough
                            if (confirm_password.length < 8) {
                                CP_strength.innerText = "Password is too short (must be at least 8 characters).";
                                return;
                            }

                            // Check if the password contains at least one uppercase letter
                            if (!/[A-Z]/.test(confirm_password)) {
                                CP_strength.innerText = "Password should contain at least one uppercase letter.";
                                return;
                            }

                            // Check if the password contains at least one lowercase letter
                            if (!/[a-z]/.test(confirm_password)) {
                                CP_strength.innerText = "Password should contain at least one lowercase letter.";
                                return;
                            }

                            // Check if the password contains at least one digit
                            if (!/\d/.test(confirm_password)) {
                                CP_strength.innerText = "Password should contain at least one digit.";
                                return;
                            }

                            // Password is strong
                            CP_strength.innerText = "Password strength: Strong";
                            CP_strength.style.color = "green";
                        }
                    </script>
                    <!-- Checking for password validation ends here -->
                    <div class="input-box">
                        <span class="details">Mobile no.</span>
                        <input type="text" name="mobile_number" placeholder="Enter your mobile number" required id="mobile" oninput="checkMobile()">
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
                        <span class="details">City</span>
                        <input type="text" placeholder="Enter your City" name="city" required>
                    </div>
                    <div class="input-box">
                        <span class="details">State</span>
                        <input type="text" placeholder="Enter your State" name="state" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Profile Image (Passport size if possible)</span>
                        <input type="file" placeholder="Enter your State" name="profile_image" required>
                    </div>
                </div>

                <p>By clicking Register, you agree to the <a href="#">Terms and Conditions</a> & <a href="#">Privacy Policy</a> of Milaap</p>
                <div class="button">
                    <input type="submit" name="Submit" value="Register">
                </div>
            </form>
        </div>
    </div>
    <!-- Registration form code ends here -->

    <!-- php code starts here-->
    <?php include 'Database_connection.php';

    if (isset($_SESSION['email'])) {
    ?>
        <script>
            location.replace("Home.php");
        </script>
        <?php
    } else {
        if (isset($_POST['Submit'])) {
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $Email_id = $_POST['Email_id'];
            $dob = $_POST['dob'];
            $Password = $_POST['Password'];
            $Confirm_Password = $_POST['Confirm_Password'];
            $mobile_number = $_POST['mobile_number'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $profile_image = $_FILES['profile_image'];

            if (mysqli_num_rows(mysqli_query($con, "select * from signup where Email_id='$Email_id'")) > 0) {
        ?>
                <script>
                    alert("Email already exist");
                </script>
                <?php
            } else {
                if ($_POST['Password'] === $_POST['Confirm_Password']) {

                    $Password = password_hash($Password, PASSWORD_DEFAULT);
                    $Confirm_Password = password_hash($Confirm_Password, PASSWORD_DEFAULT);
                    $imagename = $profile_image['name'];
                    $imagepath = $profile_image['tmp_name'];
                    $imageerror = $profile_image['error'];
                    if ($imageerror == 0) {
                        $last_image_number = 1;
                        $files = scandir('../Profile_images/');
                        foreach ($files as $file) {
                            if (preg_match('/^img(\d+)\.(jpg|jpeg|png|gif)$/', $file, $matches)) {
                                $image_number = intval($matches[1]);
                                if ($image_number >= $last_image_number) {
                                    $last_image_number = $image_number + 1;
                                }
                            }
                        }
                        $new_imagename = 'img' . $last_image_number . '.' . pathinfo($imagename, PATHINFO_EXTENSION);

                        $destinationimage = '../Profile_images/' . $new_imagename;
                        move_uploaded_file($imagepath, $destinationimage);
                        $insertquerry = "INSERT INTO `signup` (`first_name`, `last_name`, `Email_id`, `dob`, `Password`, `Confirm_Password`, `mobile_number`, `city`, `state`, `profile_image`) VALUES ('$first_name', '$last_name', '$Email_id', '$dob', '$Password', '$Confirm_Password', '$mobile_number', '$city', '$state', '$destinationimage')";

                        $result = mysqli_query($con, $insertquerry);
                        if ($result) {
                            // session variables 
                            $_SESSION['email'] = $Email_id;
                ?>
                            <script>
                                location.replace("Home.php");
                            </script>
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
                } else {
                    ?>
                    <script>
                        alert("invalid Confirm Password");
                    </script>
    <?php
                }
            }
        }
    }

    ?>



    <!-- php code ends here-->

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