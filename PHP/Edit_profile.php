<?php
include 'Database_connection.php';
$id = $_GET['id'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Edit_profile.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="../index.php">Milaap</a>
            <p>Update your profile here</p>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Registration form code starts here -->
    <div class="container">
        <div class="title">Update Profile !</div>
        <div class="content">
            <?php $query = "SELECT * FROM signup where id = '$id' ";
            $query_run = mysqli_query($con, $query);
            if (mysqli_num_rows($query_run) > 0) {
                foreach ($query_run as $row) {
            ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details">First Name</span>
                                <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Last Name</span>
                                <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Email</span>
                                <input type="text" name="Email_id" value="<?php echo $row['Email_id']; ?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Date of Birth</span>
                                <input type="Date" name="dob" value="<?php echo $row['dob']; ?>" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Mobile no.</span>
                                <input type="text" name="mobile_number" value="<?php echo $row['mobile_number']; ?>" required id="mobile" oninput="checkMobile()">
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
                                <input type="text" value="<?php echo $row['city']; ?>" name="city" required>
                            </div>
                            <div class="input-box">
                                <span class="details">State</span>
                                <input type="text" value="<?php echo $row['state']; ?>" name="state" required>
                            </div>
                            <div class="input-box">
                                <span class="details">Upload Profile Image (Passport size if possible)</span>
                                <input type="file" name="profile_image" required>
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
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $Email_id = $_POST['Email_id'];
            $dob = $_POST['dob'];
            $mobile_number = $_POST['mobile_number'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $profile_image = $_FILES['profile_image'];

            if (mysqli_num_rows(mysqli_query($con, "select * from signup where id!='$id'")) > 0) {
                if ('Email_id' == $Email_id) {
        ?>
                <script>
                    alert("Email already exist");
                </script>
                <?php
            } else {
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
                        $sql_1 = "UPDATE signup SET first_name = '".$first_name."', last_name = '".$last_name."', Email_id = '".$Email_id."', dob = '".$dob."', mobile_number = '".$mobile_number."', city = '".$city."', state = '".$state."', profile_image = '".$destinationimage."' WHERE id='".$id."'";
                        $result = mysqli_query($con, $sql_1);
                        if ($result) {
                            // session variables 
                            $_SESSION['email'] = $Email_id;
                ?>
                            <script>
                                location.replace("profile.php");
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