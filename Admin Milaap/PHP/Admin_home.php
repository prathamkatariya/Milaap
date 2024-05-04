<?php
session_start();

if (isset($_SESSION['admin_user_name'])) {
    include 'Database_connection.php';
} else {
?>
    <script>
        location.replace("Admin_login.php");
    </script>
<?php
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="../CSS/Admin_home.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Milaap Admin Dashboard Panel</title>
</head>

<body>
    <nav>
        <div class="logo-name">
            <i class="fab fa-slack"></i>
            <span class="logo_name">Admin Milaap</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li><a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Content</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-chart"></i>
                        <span class="link-name">Analytics</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="link-name">Like</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-comments"></i>
                        <span class="link-name">Comment</span>
                    </a></li>
                <li><a href="#">
                        <i class="uil uil-share"></i>
                        <span class="link-name">Share</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">
                <li><a href="#">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                        <span class="link-name">Dark Mode</span>
                    </a>

                    <div class="mode-toggle">
                        <span class="switch"></span>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search here...">
            </div>

            <!--<img src="images/profile.jpg" alt="">-->
        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">Total Likes</span>
                        <span class="number">50,120</span>
                    </div>
                    <div class="box box2">
                        <i class="uil uil-comments"></i>
                        <span class="text">Comments</span>
                        <span class="number">20,120</span>
                    </div>
                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Share</span>
                        <span class="number">10,120</span>
                    </div>
                </div>
            </div>
            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Pending Confirmation</span>
                </div>

                <!-- Table code starts here -->
                <?php
                ?>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-table">
                                <div class="card-body-table">
                                    <table class="table">
                                        <thead>
                                            <tr style="text-align: center;">
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
                                                    Confirmation Number
                                                </th>
                                                <th>
                                                    See all Detail
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 0;
                                            $query = "SELECT * FROM missing_person_data where confirmed != 'yes' and confirmed !='no' ";
                                            $query_run = mysqli_query($con, $query);
                                            if (mysqli_num_rows($query_run) > 0) {
                                                foreach ($query_run as $row) {
                                            ?>
                                                    <tr style="text-align: center;">
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
                                                            <img src="../../PHP/<?php echo $row['image']; ?>" alt="image" height="100px" width="100px" />
                                                        </td>
                                                        <td>
                                                            <?php echo $row['missing_city']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['verification_mobile_number']; ?>
                                                        </td>
                                                        <td>
                                                            <a href="missing_person_detail.php?id=<?php echo $row['id']; ?>" id="btn">See Details</a>
                                                            <!-- confirm php code starts here -->
                                                            <?php
                                                            if (isset($_POST['Submit_confirm'])) {
                                                                $confirmed = "yes";
                                                                $id = $row['id'];
                                                                $sql_1 = "UPDATE missing_person_data SET confirmed = '" . $confirmed . "' WHERE id='" . $id . "'";
                                                                $result = mysqli_query($con, $sql_1);
                                                                if ($result) {
                                                                    require_once("class.phpmailer.php");
                                                                    $full_name = $row['full_name'];
                                                                    $age = $row['age'];
                                                                    $body_color = $row['body_color'];
                                                                    $height = $row['height'];
                                                                    $build = $row['build'];
                                                                    $hair_color = $row['hair_color'];
                                                                    $eye_color = $row['eye_color'];
                                                                    $profession = $row['profession'];
                                                                    $dress_color = $row['dress_color'];
                                                                    $uniqueness = $row['uniqueness'];
                                                                    $missing_city = $row['missing_city'];
                                                                    $missing_state = $row['missing_state'];
                                                                    $missing_date = $row['missing_date'];
                                                                    $image = "../../PHP/".$row['image'];
                                                                    $gender = $row['gender'];

                                                                    function smtp_mailer($full_name, $age, $body_color, $height, $build, $hair_color, $eye_color, $profession, $dress_color, $uniqueness, $missing_city, $missing_state, $missing_date, $image, $gender)
                                                                    {
                                                                        include 'Database_connection.php';
                                                                        $mail = new PHPMailer(); // create a new object
                                                                        $mail->IsSMTP(); // enable SMTP
                                                                        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
                                                                        $mail->SMTPAuth = true; // authentication enabled
                                                                        $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
                                                                        $mail->Host = "smtp.gmail.com";
                                                                        $mail->Port = 587;
                                                                        $mail->IsHTML(true);
                                                                        $mail->Username = "theicodeofficial@gmail.com";
                                                                        $mail->Password = "iuyi srpr rbgu rplu";
                                                                        $mail->SetFrom("theicodeofficial@gmail.com");
                                                                        $mail->Subject = "New Missing Person Detail";
                                                                        $message = '<p>"We are reaching out to you for assistance in locating our fellow friend who is currently missing.</p><br><p>Information related to our friend is mentioned below.</p>';
                                                                        $message .= '<p>Name: ' . $full_name . '</p>';
                                                                        $message .= '<p>Age: ' . $age . '</p>';
                                                                        $message .= '<p>Body Color:' . $body_color . '</p>';
                                                                        $message .= '<p>Height: ' . $height . '</p>';
                                                                        $message .= '<p>Build(Slim/Fat/Normal): ' . $build . '</p>';
                                                                        $message .= '<p>Hair Color: ' . $hair_color . '</p>';
                                                                        $message .= '<p>Eye Color: ' . $eye_color . '</p>';
                                                                        $message .= '<p>Proffession: ' . $profession . '</p>';
                                                                        $message .= '<p>Last Wear Dress Color: ' . $dress_color . '</p>';
                                                                        $message .= '<p>Something: ' . $uniqueness . '</p>';
                                                                        $message .= '<p>Missing City: ' . $missing_city . '</p>';
                                                                        $message .= '<p>Missing State: ' . $missing_state . '</p>';
                                                                        $message .= '<p>Missing Date: ' . $missing_date . '</p>';
                                                                        $message .= '<p>Gender: ' . $gender . '</p>';
                                                                        $message .= '<p>"Please find a attachment below where <strong>image</strong> of the missing person is mentioned."</p>';
                                                                        $mail->Body = $message;
                                                                        $mail->isHTML(true);
                                                                        $mail->addAttachment($image);
                                                                        $address = "SELECT joinee_email FROM members";
                                                                        $address_res = $con->query($address);
                                                                        if ($address_res->num_rows > 0) {
                                                                            while ($row = $address_res->fetch_assoc()) {
                                                                                $mail->clearAddresses();
                                                                                $mail->addAddress($row['joinee_email']);
                                                                                if ($mail->send()) {
                                                                                    break;
                                                            ?>
                                                                                    <script>
                                                                                        alert("Mail Send to all Joinee");
                                                                                    </script>
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <script>
                                                                                        alert("Email Not Sent Error");
                                                                                    </script>
                                                                            <?php
                                                                                }
                                                                            }
                                                                        } else {
                                                                            ?>
                                                                            <script>
                                                                                alert("No Joinee Email Found");
                                                                            </script>
                                                                    <?php
                                                                        }
                                                                    }
                                                                    smtp_mailer($full_name, $age, $body_color, $height, $build, $hair_color, $eye_color, $profession, $dress_color, $uniqueness, $missing_city, $missing_state, $missing_date, $image, $gender);
                                                                    // if (!$mail->Send()) {
                                                                    //     echo "Mailer Error: " . $mail->ErrorInfo;
                                                                    // } else {
                                                                    //     echo "Message has been sent";
                                                                    // }
                                                                    ?>
                                                                    <!-- <script>
                                                                            location.replace("Poster.php");
                                                                    </script> -->
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <script>
                                                                        alert("data not inserted");
                                                                    </script>
                                                            <?php
                                                                }
                                                            }

                                                            ?>
                                                            <!-- confirm php code ends here -->
                                                        </td>
                                                        <td>
                                                            <!-- <form action="Admin_home.php" method="POST" enctype="multipart/form-data">
                                                                <button type="Submit" name="Submit_reject" id="btn">Reject Person</button>
                                                            </form> -->
                                                            <!-- Reject php code starts here -->
                                                            <?php
                                                            if (isset($_POST['Submit_reject'])) {
                                                                $Rejected = "no";
                                                                $id = $row['id'];
                                                                $sql_1 = "UPDATE missing_person_data SET confirmed = '" . $Rejected . "' WHERE id='" . $id . "'";
                                                                $result = mysqli_query($con, $sql_1);
                                                                if ($result) {
                                                                    break;
                                                            ?>
                                                                    <script>
                                                                        alert("Rejected");
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

                                                            ?>
                                                            <!-- Reject php code ends here -->
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
            </div>
        </div>
    </section>

    <script src="../JavaScript/Admin_home.js"></script>
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