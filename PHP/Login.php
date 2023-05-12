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
    <link rel="stylesheet" href="../CSS/Login.css">

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
        <div class="wrapper">
            <div class="title">
                Login
            </div>

            <!-- Form Code Starts here -->

            <form action="#" method="POST">
                <div class="field">
                    <input type="text" name="user_name" required>
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
    include 'Database_connection.php';

    if (isset($_POST['Submit'])) {
        $user_name = $_POST['user_name'];
        $Password = $_POST['Password'];

    $res=mysqli_query($con,"select * from signup where user_name='$user_name'");    
        if(mysqli_num_rows($res)>0){
            $row = mysqli_fetch_assoc($res);
            $verify = password_verify($Password,$row['Password']);
            if ($verify==1) {
                $_SESSION['user_name'] = $user_name;
                ?>
                  <script>
                      location.replace("Home.php");
                  </script>
                   <?php
            }
            else {
                ?>
                    <script>
                        alert('Password incorrect');
                    </script>
                     <?php
            }
        }else{
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