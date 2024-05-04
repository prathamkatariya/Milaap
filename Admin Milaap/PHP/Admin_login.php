<?php
session_start();
if (isset($_SESSION['admin_user_name'])) {
?>
    <script>
        location.replace("Home.php");
    </script>
<?php
} else {
    // die();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Admin_login.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap Admin Login</title>
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
        <div class="wrapper">
            <div class="title">
                Login
            </div>

            <!-- Form Code Starts here -->

            <form action="#" method="POST">
                <div class="field first">
                    <input type="username" name="admin_user_name" required>
                    <label>Enter your username</label>
                </div>
                <div class="field first">
                    <input type="password" name="Password" required>
                    <label>Enter your password</label>
                </div>
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
                    location.replace("Admin_home.php");
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



</body>

</html>