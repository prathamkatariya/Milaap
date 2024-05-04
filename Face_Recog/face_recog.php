<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Style Css  -->
    <link rel="stylesheet" href="face_recog.css">
    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>
    <title>Face Matching</title>
</head>

<body>
    <div class="container">
        <h1>Upload the image of the person</h1>
        <form action="#" method="POST" enctype="multipart/form-data">
            <div>
                <input class="form-control form-control-lg" name="image" id="formFileLg" type="file" require>
                <button type="Submit" name="Upload" value="Upload" class="btn btn-primary btn-lg">Upload Image</button>
            </div>
        </form>
    </div>

    <!-- PHP Starts Here  -->
    <?php
    include 'Database_connection.php';

    if (isset($_POST['Upload'])) {
        $image = $_FILES['image'];

        $imagename = $image['name'];
        $imagepath = $image['tmp_name'];
        $imageerror = $image['error'];

        if ($imageerror == 0) {
            $last_image_number = 1;
            $files = scandir('../Check_Images/');
            foreach ($files as $file) {
                if (preg_match('/^img(\d+)\.(jpg|jpeg|png|gif)$/', $file, $matches)) {
                    $image_number = intval($matches[1]);
                    if ($image_number >= $last_image_number) {
                        $last_image_number = $image_number + 1;
                    }
                }
            }
            $new_imagename = 'img' . $last_image_number . '.' . pathinfo($imagename, PATHINFO_EXTENSION);

            $destinationimage = '../Check_Images/' . $new_imagename;
            move_uploaded_file($imagepath, $destinationimage);
            $insertquerry = "INSERT INTO `face_recognition` (`image_to_check`) VALUES ('$destinationimage')";

            $result = mysqli_query($con, $insertquerry);

            if ($result) {
                $res = mysqli_query($con, "SELECT * FROM missing_person_data");
                if (mysqli_num_rows($res) > 0) {
                    foreach ($res as $row) {
                        $database_image = $row['image'];
                        $upload_image = $destinationimage;
                        $command = "python main.py " . escapeshellarg($database_image) . " " . escapeshellarg($upload_image);
                        $output = shell_exec($command);
                        // echo $output;
                        if ($output == 1) {
    ?>
                            <!-- <h1 style=" margin:50px 50px 50px 50px; border-radius:20px; color: black; padding: 10px 10px 10px 10px; background-color:white;"> <?php echo $row['full_name']; ?></h1> -->
                            <section class="container">
                                <div class="card">
                                    <div class="center">
                                        <div class="image">
                                            <img src="<?php echo $row['image']; ?>" alt="image" height="150px" width="130px"/>
                                        </div>
                                        <h2><?php echo $row['full_name']; ?></h2>
                                    </div>
                                    <br>
                                    <a style="text-decoration: none; background-color: black; color: white; padding: 5px 5px 5px 5px; " href="../PHP/GetInfo.php?id=<?php echo $row['id']; ?>" class="button">Get Information</a>
                                    <!-- <div class="buttons">
                                        <button class="button">Seen Somewhere</button>
                                    </div> -->
                                </div>
                                <section class="container">
                        <?php
                            break;
                        } elseif ($output == 0) {
                            echo " ";
                        } elseif ($output == 00) {
                            echo "No Face detected in the image";
                        }
                    }
                }
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
                        alert("Image Error");
                    </script>
            <?php
            }
        }
            ?>
            <!-- php ended -->
</body>

</html>