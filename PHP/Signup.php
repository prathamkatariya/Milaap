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
            <form action="#" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Full Name</span>
                        <input type="text" name="user_name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="text" name="Email_id" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="Password" placeholder="Enter your password" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" name="Confirm_Password" placeholder="Enter your location" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile no.</span>
                        <input type="text" name="mobile_number" placeholder="Enter your mobile number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Location</span>
                        <input type="text" placeholder="Enter your Location" name="Location" required>
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

    if (isset($_SESSION['user_name'])) {
    ?>
        <script>
            location.replace("Home.php");
        </script>
        <?php
    } else {
        if (isset($_POST['Submit'])) {
            $user_name = $_POST['user_name'];
            $Email_id = $_POST['Email_id'];
            $Password = $_POST['Password'];
            $Confirm_Password = $_POST['Confirm_Password'];
            $mobile_number = $_POST['mobile_number'];
            $Location = $_POST['Location'];


            if (mysqli_num_rows(mysqli_query($con, "select * from signup where user_name='$user_name'")) > 0) {
        ?>
                <script>
                    alert("Username already exist");
                </script>
                <?php
            } else {
                if ($_POST['Password'] === $_POST['Confirm_Password']) {

                    $Password = password_hash($Password, PASSWORD_DEFAULT);
                    $Confirm_Password = password_hash($Confirm_Password, PASSWORD_DEFAULT);
                    $insertquerry = "INSERT INTO `signup` (`user_name`, `Email_id`, `Password`, `Confirm_Password`, `mobile_number`, `Location`) VALUES ('$user_name', '$Email_id', '$Password', '$Confirm_Password', '$mobile_number', '$Location')";

                    // session variables 

                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['Email_id'] = $Email_id;
                    $_SESSION['mobile_number'] = $mobile_number;
                    $_SESSION['Location'] = $Location;

                    $result = mysqli_query($con, $insertquerry);
                } else {
                ?>
                    <script>
                        alert("invalid Confirm Password");
                    </script>
                <?php
                }

                if ($result) {
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