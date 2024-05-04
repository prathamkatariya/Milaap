<?php
session_start();

if (isset($_SESSION['email'])) {
    include 'Database_connection.php';
    $id = $_GET['id'];
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
    <link rel="stylesheet" href="../CSS/Update_Lead.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="home.php">Milaap</a>
            <p>Update us about missing person</p>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Registration form code starts here -->
    <div class="container">
        <div class="title">Update Lead !</div>
        <div class="content">
            <?php $query = "SELECT * FROM missing_person_data where id = '$id' ";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
            ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">Missing Person id</span>
                                <?php echo $row['id']; ?>
                            </div>
                            <div class="input-box">
                                <span class="details">Missing Person Name</span>
                                <?php 
                                echo $row['full_name']; 
                                $full_name = $row['full_name'];
                                ?>
                            </div>
                            <div class="input-box">
                                <span class="details">Your Name</span>
                                <input type="text" name="name" placeholder="Enter Your Name" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Phone Number</span>
                                <input type="text" name="phone_number" placeholder="Enter Your Phone Number" required id="mobile" oninput="checkMobile()">
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
                                <span class="details">Short Description</span>
                                <input type="textarea" name="short_description" placeholder="Enter Short Description" required>
                            </div>
                        </div>

                        <p>By clicking Update, you agree to the <a href="#">Terms and Conditions</a> & <a href="#">Privacy Policy</a> of Milaap</p>
                        <div class="button">
                            <input type="submit" name="Submit" value="Update">
                        </div>
                    </form>
            <?php }
            } ?>
        </div>
    </div>
    <!-- Registration form code ends here -->

    <!-- php code starts here-->
    <?php
    if (isset($_POST['Submit'])) {
        $name = $_POST['name'];
        $phone_number = $_POST['phone_number'];
        $short_description = $_POST['short_description'];

        if (mysqli_num_rows(mysqli_query($con, "select * from signup where id!='$id'")) > 0) {
            $insertquerry = "INSERT INTO `update_lead`(`id`,`missing_name`, `user_email`, `Name`, `phone_number`, `short_description`) VALUES ('$id','$full_name','$email','$name','$phone_number','$short_description')";
                    $result = mysqli_query($con, $insertquerry);
                    if ($result) {
                ?>
                        <script>
                            location.replace("home.php");
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