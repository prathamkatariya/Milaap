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
    <link rel="stylesheet" href="../CSS/All_missing.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="Home.php">Milaap</a>
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
                        <a class="nav-link" href="Contactus.php" tabindex="-1" aria-disabled="true">Contact Us</a>
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
                <form action="PostInfo.php" class="d-flex">
                    <button class="button-right btn" type="submit">Post info about missing</button>
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

    <!-- Table code starts here -->
    <?php
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>
                            All Missing Person Details
                        </h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        S.No.
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Age
                                    </th>
                                    <th>
                                        Image
                                    </th>
                                    <th>
                                        Location
                                    </th>
                                    <th>
                                        Get Information
                                    </th>
                                    <th>
                                        Seen SomeWhere
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 0;
                                $query = "SELECT * FROM missing_person_data";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $row) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo ++$counter; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['full_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['age']; ?>
                                            </td>
                                            <td>
                                                <img src="<?php echo $row['image']; ?>" alt="image" height="100px" width="100px" />
                                            </td>
                                            <td>
                                                <?php echo $row['missing_city']; ?>
                                            </td>
                                            <td>
                                                <a href="GetInfo.php?id=<?php echo $row['id']; ?>" class="btn">Get Info</a>
                                            </td>
                                            <td>
                                                <a href="Update_Lead.php?id=<?php echo $row['id']; ?>" class="btn">Update Lead</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td>No Record Available</td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Table code ends here  -->


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