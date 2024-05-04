<?php
session_start();
if (isset($_SESSION['email'])) {
    // DO Nothing 
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
    <link rel="stylesheet" href="../CSS/Send_otp.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="../index.php">Milaap</a>
            <p>Not Signup yet? <a href="Signup.php">Signup</a> here</p>
        </div>
    </nav>

    <!-- Navbar code ends here-->
    <section class="container">
    <h5>OTP is send to your "email id" please check and verify.</h5>
        <div class="wrapper">
            <div class="title">
                Login
            </div>

            <!-- Form Code Starts here -->

            <form action="#" method="POST">
                <div class="field first">
                    <input type="password" name="otp" required>
                    <label>OTP</label>
                </div>
                <!-- <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                </div> -->
                <div class="field">
                    <input type="submit" name="Submit" value="Submit OTP">
                </div>
            </form>
        </div>
    </section>
    <!-- Form Code ended -->

    <!-- PHP Starts Here  -->
    <?php
    include 'Database_connection.php';
    $email = $_SESSION['email'];
    if (isset($_POST['Submit'])) {
        $otp = $_POST['otp'];
        $res = mysqli_query($con, "SELECT otp FROM signup where Email_id ='$email'");
        if (mysqli_num_rows($res) > 0) {
            $row = $res->fetch_assoc();
            $stored_otp = $row["otp"];
            if ($otp == $stored_otp) {
            mysqli_query($con, "UPDATE signup SET otp='0' WHERE Email_id='$email'");
    ?>
                <script>
                    location.replace("Home.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Invalid OTP Entered');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Invalid Email id');
            </script>
    <?php
        }
    }
    ?>
    <!-- Php ended -->



</body>

</html>