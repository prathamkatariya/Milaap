<?php
session_start();
include 'Database_connection.php';
if (isset($_SESSION['user_name'])) {
    $source = $_SESSION['user_name'];
    $res = mysqli_query($con, "select * from missing_person_data where user_name='$source'");
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_array($res);
        $full_name = $row[1];
        $age = $row[2];
        $body_color = $row[3];
        $height = $row[4];
        $build = $row[5];
        $hair_color = $row[6];
        $eye_color = $row[7];
        $profession = $row[8];
        $missing_location = $row[9];
        $living_location = $row[10];
        $missing_date = $row[11];
        $image = $row[12];
        $gender = $row[13];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/Poster.css">

    <!-- Font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Milaap</title>
</head>

<body>
    <div class="col">
        <div class="row">
            <section class="container">
                <div class="card">
                    <h1>Missing : <?php echo $full_name ?></h1>
                    <div class="row">
                        <div class="col">
                            <div class="image">
                                <img src="<?php echo $image; ?>" alt="image" />
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>AGE AT DISAPPEARANCE : <?php echo $age; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Body Color: <?php echo $body_color; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Height: <?php echo $height; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Build: <?php echo $build; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Hair Color: <?php echo $hair_color; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Eye Color: <?php echo $eye_color; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Profession: <?php echo $profession; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Missing Location: <?php echo $missing_location; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Living Location: <?php echo $living_location; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Missing Date: <?php echo $missing_date; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">
                            <p>Gender: <?php echo $gender; ?></p>
                        </div>
                        <div class="col col-lg-4 col-md-12 col-sm-12">

                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="row">
            <div class="download">
                <form action="#" class="d-flex">
                    <button class="button-right-btn" type="submit">Download</button>
                </form>
            </div>
        </div>
    </div>

    
</body>

</html>