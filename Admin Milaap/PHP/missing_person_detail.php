<?php
session_start();

if (isset($_SESSION['admin_user_name'])) {
    include 'Database_connection.php';
} else {
?>
    <script>
        location.replace("Login.php");
    </script>
<?php
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Link-->
    <link rel="stylesheet" href="../CSS/missing_person_detail.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Javascript for html to img -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>

    <title>Milaap</title>
</head>

<body>

    <!-- See all details section start here  -->
    <div class="poster">
        <div class="col">
            <div class="row missing" id="downloadposter">
                <div class="col col-lg-12 col-md-12 col-sm-12">
                    <section class="container">
                        <?php
                        $id = $_GET['id'];
                        $res = mysqli_query($con, "select * from missing_person_data where id='$id' ");
                        if (mysqli_num_rows($res) > 0) {
                            foreach ($res as $row) {
                        ?>
                                <div class="card">
                                    <div class="logo-details">
                                        <i class="fab fa-slack"></i>
                                        <span class="logo_name">Milaap</span>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h1 class="text-center">Missing: <?php echo $row['full_name']; ?></h1>
                                            <div class="center">
                                                <div class="image">
                                                    <img src="../../PHP/<?php echo $row['image']; ?>" alt="image" />
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col">
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>AGE AT DISAPPEARANCE : <?php echo $row['age']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Body Color: <?php echo $row['body_color']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Height: <?php echo $row['height']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Build: <?php echo $row['build']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Hair Color: <?php echo $row['hair_color']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Eye Color: <?php echo $row['eye_color']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Profession: <?php echo $row['profession']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing City: <?php echo $row['missing_city']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing State: <?php echo $row['missing_state']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Missing Date: <?php echo $row['missing_date']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Gender: <?php echo $row['gender']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Something Uniquee: <?php echo $row['uniqueness']; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-lg-6 col-md-12 col-sm-12">
                                                    <p>Dress Color (When last Seen): <?php echo $row['dress_color']; ?></p>
                                                </div>
                                                <div class="col col-lg-6 col-md-12 col-sm-12">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "No Record Available";
                        }
    ?>
                    </section>
                </div>
            </div>
            <div class="row missing">
                <div class="col">
                    <div class="Confirm">
                        <form action="confirm.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
                            <button class="button btn" type="Submit" name="confirm" id="confirm_report">Confirm Missing's Report</button>
                        </form>
                    </div>
                </div>
                <div class="col">
                    <div class="download">
                        <button class="button btn" type="Submit" id="downloadpdf">Download</button>
                    </div>
                </div>
                <div class="col">
                    <div class="Reject">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <button class="button btn" type="Submit" name="reject" id="reject_report">Reject Missing's Report</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Javascript to download image starts here -->

            <script>
                document.getElementById('downloadpdf').addEventListener('click', function() {
                    html2canvas(document.getElementById('downloadposter'), {
                        onrendered: function(canvas) {
                            var imageDataURL = canvas.toDataURL('image/png');
                            console.log('Image data URL:', imageDataURL);

                            var link = document.createElement('a');
                            link.href = imageDataURL;
                            link.download = 'myImage.png';
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        }
                    });
                });
            </script>

            <!-- Javascript to download image ends here -->
        </div>
    </div>
    <!-- See all details section ends here  -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>