<?php
session_start();

if (isset($_SESSION['admin_user_name'])) {
    include 'Database_connection.php';
    $id = $_GET['id'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css link -->
    <link rel="stylesheet" href="../CSS/confirm.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <title>Millap Admin | Confirmation </title>
</head>

<body>
    <div class="container">
        <div class="card">
            <h1>Thanks for confirmation</h1>
            <br>
            <a href="Admin_home.php">Go To Home Page</a>
        </div>
    </div>
    <!-- confirm php code starts here -->
    <?php
    require_once("class.phpmailer.php");
    $res = mysqli_query($con, "select * from missing_person_data where id='$id' ");
    if (mysqli_num_rows($res) > 0) {
        foreach ($res as $row) {
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
                            $sql_1 = "UPDATE missing_person_data SET Confirmed = 'yes' WHERE id='$id'";
                                                                $result = mysqli_query($con, $sql_1);
                                                                if ($result) {
                                                                    ?>
                                                                        <script>
                                                                            alert("Confirmed Updated")
                                                                        </script>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <script>
                                                                            alert("Confirmed not Updated")
                                                                        </script>
                                                                    <?php
                                                                }
    ?>
                            <!-- <script>
                                alert("Mail Send to all Joinee");
                            </script> -->
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
        }
    }
    ?>
    <!-- confirm php code starts here -->

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