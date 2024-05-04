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
    <link rel="stylesheet" href="../CSS/Admin-login.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="../index.php">Milaap Store Admin login</a>
            <p>Only assigned workers can login.</p>
        </div>
    </nav>

    <!-- Navbar code ends here-->
    <section class="container">
        <div class="wrapper">
            <div class="title">
                Login
            </div>

            <!-- Form Code Starts here -->

            <form action="#" method="POST">
                <div class="field">
                    <input type="text" name="admin_user_name" required>
                    <label>Username</label>
                </div>
                <div class="field">
                    <input type="password" name="Password" required>
                    <label>Password</label>
                </div>
                <!-- <div class="content">
                    <div class="checkbox">
                        <input type="checkbox" id="remember-me">
                        <label for="remember-me">Remember me</label>
                    </div>
                </div> -->
                <div class="field">
                    <input type="submit" name="Submit" value="Login">
                </div>
            </form>
        </div>
    </section>
    <!-- Form Code ended -->

    <!-- PHP Starts Here  -->
    <?php
    include '../../PHP/Database_connection.php';

    if (isset($_POST['Submit'])) {
        $admin_user_name = $_POST['admin_user_name'];
        $Password = $_POST['Password'];

        $res = mysqli_query($con, "select * from admin_detail where admin_user_name='$admin_user_name'");
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if ($row['admin_user_name']===$admin_user_name && $row['Password']===$Password) {
                $_SESSION['admin_user_name'] = $admin_user_name;
    ?>
                <script>
                    location.replace("Admin-home.php");
                </script>
            <?php
            } else {
            ?>
                <script>
                    alert('Password incorrect');
                </script>
            <?php
            }
        } else {
            ?>
            <script>
                alert('Invalid username');
            </script>
    <?php
        }
    }
    ?>
    <!-- Php ended -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

</body>

</html>