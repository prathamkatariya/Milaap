<?php
session_start();
if (isset($_SESSION['email'])) {
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
                <div class="field first">
                    <input type="email" name="email" required>
                    <label>Enter your email</label>
                </div>
                <div class="field first">
                    <input type="password" name="Password" required>
                    <label>Enter your password</label>
                </div>
                <div class="field">
                    <input type="submit" name="Submit" value="Send OTP">
                </div>
            </form>
        </div>
    </section>
    <!-- Form Code ended -->

    <!-- PHP Starts Here  -->
    <?php
    include 'Database_connection.php';

    if (isset($_POST['Submit'])) {
        $email = $_POST['email'];
        $Password = $_POST['Password'];

        $res = mysqli_query($con, "SELECT * FROM signup where Email_id ='$email'");
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $verify = password_verify($Password, $row['Password']);
            if ($verify == 1) {
                $_SESSION['email'] = $email;
                $otp = rand(11111, 99999);
                mysqli_query($con, "UPDATE signup SET otp='$otp' WHERE Email_id='$email'");
                $msg = "Your OTP Verification Code is : " . $otp;
                require_once("class.phpmailer.php");
                function smtp_mailer($to, $subject, $msg)
                {
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
                    $mail->Subject = $subject;
                    $mail->Body = $msg;
                    $mail->AddAddress($to);
                    if (!$mail->Send()) {
                        echo "Mailer Error: " . $mail->ErrorInfo;
                    } else {
                        echo "Message has been sent";
                    }
                }
                smtp_mailer($email, "OTP-Verification Milaap", $msg);
    ?>
                <script>
                    location.replace("Send_otp.php");
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
                alert('Invalid Email id');
            </script>
    <?php
        }
    }
    ?>
    <!-- Php ended -->



</body>

</html>