<?php
session_start();

if (isset($_SESSION['admin_user_name'])) {
    // Do Nothing
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
    <link rel="stylesheet" href="../CSS/Insert-Bottom-Wear-Product.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Milaap</title>
</head>

<body>

    <!-- Navbar code starts here-->

    <nav class=" nav-pvt navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="brand navbar-brand" href="Admin-home.php">Milaap Store Admin Pannel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <form action="All_missing.php" class="d-flex">
                    <button class=" button-left btn" type="submit">View Products</button>
                </form>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo $_SESSION['admin_user_name']; ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">My Dashboard</a></li>
                        <li><a class="dropdown-item" href="Destroy.php">Logout</a></li>
                        <li><a class="dropdown-item" href="#"></a></li>
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <!-- Navbar code ends here-->

    <!-- Registration form code starts here -->

    <div class="container">
        <div class="title">Provide Product Info!</div>
        <div class="content">
            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Product Name</span>
                        <input type="text" name="product_name" placeholder="Enter Product Name" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Price</span>
                        <input type="text" name="product_price" placeholder="Enter Price in Rupee" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Category</span>
                        <select name="categories" id="broadCategories">
                            <option value="">Select an option</option>
                            <option value="Casual_Shirt">Casual Shirt</option>
                            <option value="Oversized_Tshirt">Oversized T-shirt</option>
                            <option value="Classic_Fit_Tshirt">Classic Fit T-shirt</option>
                            <option value="Graphic_Tshirt">Graphic T-shirt</option>
                            <option value="Solid_Tshirt">Solid T-shirt</option>
                            <option value="Hoody">Hoddy</option>
                            <option value="Jacket">Jacket</option>
                            <option value="Sweat_shirt">Sweat Shirt</option>
                            <option value="Sweaters">Sweaters</option>

                        </select>
                    </div>
                    <div class="input-box" id="categoriesDetails">

                    </div>
                    <div class="input-box">
                        <span class="details">Product Color</span>
                        <input type="text" name="product_color" placeholder="Enter Product Color" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Size (S/M/L/XL/XXL/XXXL)</span>
                        <input type="text" name="product_size" placeholder="Enter the all available size spererated by a '/' in caps" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Transparency (Solid/Semi-Solid/Transparent)</span>
                        <input type="text" name="product_transparency" placeholder="Enter Transparency type" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Fabric</span>
                        <input type="text" name="product_fabric" placeholder="Enter Product fabric" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Fit-Type (Slim/Regular/Relaxed)</span>
                        <input type="text" name="product_fit_type" placeholder="Enter Fit-Type" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Brand</span>
                        <input type="text" name="product_brand" placeholder="Enter Product Brand" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Quantity</span>
                        <input type="text" name="product_quantity" placeholder="Enter Product Quantity" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Product Length</span>
                        <input type="text" name="product_length" placeholder="Enter Product Length in inches" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Neckline Type</span>
                        <select name="product_neckline">
                            <option value="No_Neckline">No Neckline</option>
                            <option value="Crew_Neck">Crew Neck</option>
                            <option value="V_Neck">V-Neck</option>
                            <option value="Scoop_Neck">Scoop Neck</option>
                            <option value="Square_Neck">Square Neck</option>
                            <option value="Boat_Neck">Boat Neck</option>
                            <option value="Halter_Neck">Halter Neck</option>
                            <option value="Sweetheart_Neck">Sweetheart Neck</option>
                            <option value="Keyhole_Neck">Keyhole Neck</option>
                            <option value="Turtleneck">Turtleneck</option>

                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Pattern Type</span>
                        <select name="product_pattern">
                            <option value="No_Pattern">No Pattern</option>
                            <option value="Stripes">Stripes</option>
                            <option value="Checks">Checks</option>
                            <option value="Plaid">Plaid</option>
                            <option value="Houndstooth">Houndstooth</option>
                            <option value="Paisley">Paisley</option>
                            <option value="Polka_Dot">Polka Dot</option>
                            <option value="Floral">Floral</option>
                            <option value="Camouflage">Camouflage</option>
                            <option value="Animal_Print">Animal Print</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Sleeves Type</span>
                        <select name="product_sleeves">
                            <option value="">Select an option</option>
                            <option value="Set_In_Sleeves">Set-In Sleeves</option>
                            <option value="Raglan_Sleeves">Raglan Sleeves</option>
                            <option value="Dolman_Sleeves">Dolman Sleeves</option>
                            <option value="Bell_Sleeves">Bell Sleeves</option>
                            <option value="Puff_Sleeves">Puff Sleeves</option>
                            <option value="Cap Sleeves">Cap Sleeves</option>
                            <option value="Sleeveless">Sleeveless</option>
                            <option value="Short_Sleeves">Short Sleeves</option>
                            <option value="Three_Quarter_Sleeves">Three-Quarter Sleeves</option>
                            <option value="Long Sleeves">Long Sleeves</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Limited Edition</span>
                        <select name="limited_edition">
                            <option value="">Select an option</option>
                            <option value="no">Yes</option>
                            <option value="yes">No</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">LiningType</span>
                        <select name="product_lining">
                            <option value="">Select an option</option>
                            <option value="Polyester">Polyester</option>
                            <option value="Acetate">Acetate</option>
                            <option value="Viscose">Viscose</option>
                            <option value="Cotton">Cotton</option>
                            <option value="Silk">Silk</option>
                            <option value="Quilted">Quilted</option>
                            <option value="Fleece">Fleece</option>
                            <option value="Mesh">Mesh</option>
                            <option value="Bemberg ">Bemberg </option>
                            <option value="Georgette">Georgette</option>
                            <option value="Rayon">Rayon</option>
                            <option value="Crepe">Crepe</option>
                            <option value="Satin">Satin</option>
                            <option value="Muslin">Muslin</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Delivery Information</span>
                        <select name="devivery_info">
                            <option value="">Select an option</option>
                            <option value="company_paid">Company Paid</option>
                            <option value="customer_paid">Customer Paid</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Number of Pockets</span>
                        <input type="text" name="product_pockets" placeholder="Enter the Number of Pockets" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Returning Period (in days)</span>
                        <input type="text" name="returing_period" placeholder="Enter Returning Period" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Front Face Image</span>
                        <input type="file" name="image_front" placeholder="Provide Front image" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Right-Side Image</span>
                        <input type="file" name="image_right" placeholder="Provide Right-Side image" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Left-Side Image</span>
                        <input type="file" name="image_left" placeholder="Provide Left-Side image" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Upload Back Image</span>
                        <input type="file" name="image_back" placeholder="Provide Back-Side image" required>
                    </div>
                    <div class="input-box" style="padding: 5px;">
                        <span class="details">Product Description</span>
                        <textarea style="padding: 20px;" id="paragraph" name="product_description" rows="10" cols="130" placeholder="Enter Product Description" required></textarea><br>
                    </div>
                </div>
                <br><br>
                <p>By clicking on upload you agree <a href="#">Terms & Condition</a> and <a href="#">Privacy Policy</a> of Milaap </p>
                <div class="button">
                    <input type="submit" name="Submit" value="Upload">
                </div>
            </form>
        </div>
    </div>

    <!-- Registration form code ends here -->

    <!-- Php code starts here -->

    <?php
    include '../../PHP/Database_connection.php';

    if (isset($_POST['Submit'])) {
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $categories = $_POST['categories'];
        $product_specification = $_POST['product_specification'];
        $product_color = $_POST['product_color'];
        $product_size = $_POST['product_size'];
        $product_transparency = $_POST['product_transparency'];
        $product_fabric = $_POST['product_fabric'];
        $product_fit_type = $_POST['product_fit_type'];
        $product_brand = $_POST['product_brand'];
        $product_quantity = $_POST['product_quantity'];
        $product_length = $_POST['product_length'];
        $product_neckline = $_POST['product_neckline'];
        $product_pattern = $_POST['product_pattern'];
        $product_sleeves = $_POST['product_sleeves'];
        $limited_edition = $_POST['limited_edition'];
        $product_lining = $_POST['product_lining'];
        $devivery_info = $_POST['devivery_info'];
        $product_pockets = $_POST['product_pockets'];
        $returing_period = $_POST['returing_period'];
        $image_front = $_FILES['image_front'];
        $image_right = $_FILES['image_right'];
        $image_left = $_FILES['image_left'];
        $image_back = $_FILES['image_back'];
        $product_description = $_POST['product_description'];
        // print_r($image);

        $image_front_name = $image_front['name'];
        $image_front_path = $image_front['tmp_name'];
        $image_front_error = $image_front['error'];
        $image_right_name = $image_right['name'];
        $image_right_path = $image_right['tmp_name'];
        $image_right_error = $image_right['error'];
        $image_left_name = $image_left['name'];
        $image_left_path = $image_left['tmp_name'];
        $image_left_error = $image_left['error'];
        $image_back_name = $image_back['name'];
        $image_back_path = $image_back['tmp_name'];
        $image_back_error = $image_back['error'];

        if ($image_front_error == 0 && $image_right_error == 0 && $image_left_error == 0 && $image_back_error == 0) {
            $last_image_number = 1;
            $files = scandir('../../product_images/');
            foreach ($files as $file) {
                if (preg_match('/^img(\d+)\.(jpg|jpeg|png|gif)$/', $file, $matches)) {
                    $image_number = intval($matches[1]);
                    if ($image_number >= $last_image_number) {
                        $last_image_number = $image_number + 1;
                    }
                }
            }
            $new_imagename_front = 'img' . $last_image_number . '_a' . '.' . pathinfo($image_front_name, PATHINFO_EXTENSION);
            $new_imagename_right = 'img' . $last_image_number . '_b' . '.' . pathinfo($image_right_name, PATHINFO_EXTENSION);
            $new_imagename_left = 'img' . $last_image_number . '_c' . '.' . pathinfo($image_left_name, PATHINFO_EXTENSION);
            $new_imagename_back = 'img' . $last_image_number . '_d' . '.' . pathinfo($image_back_name, PATHINFO_EXTENSION);

            $destinationimage_front = '../../product_images/' . $new_imagename_front;
            $destinationimage_right = '../../product_images/' . $new_imagename_right;
            $destinationimage_left = '../../product_images/' . $new_imagename_left;
            $destinationimage_back = '../../product_images/' . $new_imagename_back;

            move_uploaded_file($image_front_path, $destinationimage_front);
            move_uploaded_file($image_right_path, $destinationimage_right);
            move_uploaded_file($image_left_path, $destinationimage_left);
            move_uploaded_file($image_back_path, $destinationimage_back);

            $insertquerry_1 = "INSERT INTO `products` (`product_name`,`product_size`, `product_color`, `product_price`, `product_brand`, `product_limited_edition`, `product_description`, `product_category`) VALUES ('$product_name','$product_size','$product_color','$product_price','$product_brand','$limited_edition','$product_description','$categories')";
            $result_1 = mysqli_query($con, $insertquerry_1);

            if ($result_1) {
                $product_id = $con->insert_id;
                $insertquerry_2 = "INSERT INTO `product_image` (`product_id`,`image_front`,`image_right`, `image_left`, `image_back`) VALUES ('$product_id','$destinationimage_front','$destinationimage_right','$destinationimage_left','$destinationimage_back')";
                $result_2 = mysqli_query($con, $insertquerry_2);
                if ($result_2) {
                    $insertquerry_3 = "INSERT INTO `brand_table` (`product_id`,`product_name`,`product_brand`) VALUES ('$product_id','$product_name','$product_brand')";
                    $result_3 = mysqli_query($con, $insertquerry_3);
                    if ($result_3) {
                        $insertquerry_4 = "INSERT INTO `product_attribute` (`product_id`,`product_name`,`product_transparency`, `product_fabric`, `product_fit`, `product_neckline`, `product_pattern`, `product_sleeves`, `product_lining`, `product_pockets`, `product_size`,`product_length`) VALUES ('$product_id','$product_name','$product_transparency','$product_fabric','$product_fit_type','$product_neckline','$product_pattern','$product_sleeves','$product_lining','$product_pockets','$product_size','$product_length')";
                        $result_4 = mysqli_query($con, $insertquerry_4);
                        if ($result_4) {
                            $insertquerry_5 = "INSERT INTO `product_stock` (`product_id`,`product_name`,`total_quantity`) VALUES ('$product_id','$product_name','$product_quantity')";
                            $result_5 = mysqli_query($con, $insertquerry_5);
                            if ($result_5) {
                                $insertquerry_6 = "INSERT INTO `category_table` (`product_id`,`product_name`,`product_category`,`product_specification`) VALUES ('$product_id','$product_name','$categories','$product_specification')";
                                $result_6 = mysqli_query($con, $insertquerry_6);
                                if ($result_6) {
                                    $insertquerry_7 = "INSERT INTO `product_logistics` (`product_id`,`product_name`,`product_delivery`,`product_return_period`) VALUES ('$product_id','$product_name','$devivery_info','$returing_period')";
                                    $result_7 = mysqli_query($con, $insertquerry_7);
                                    if ($result_7) {
    ?>
                                        <script>
                                            location.replace("Admin-home.php");
                                        </script>
                                    <?php
                                    } else {
                                    ?>
                                        <script>
                                            alert("error : 7");
                                        </script>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <script>
                                        alert("error : 6");
                                    </script>
                                <?php
                                }
                            } else {
                                ?>
                                <script>
                                    alert("error : 5");
                                </script>
                            <?php
                            }
                        } else {
                            ?>
                            <script>
                                alert("error : 4");
                            </script>
                        <?php
                        }
                    } else {
                        ?>
                        <script>
                            alert("error : 3");
                        </script>
                    <?php
                    }
                } else {
                    ?>
                    <script>
                        alert("error : 2");
                    </script>
                <?php
                }
            } else {
                ?>
                <script>
                    alert("error : 1");
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
    ?>

    <!-- Php code starts here -->


    <!-- Optional JavaScript; choose one of the two! -->
    <script src="../Javascript/Insert-Bottom-Wear-Product.js"></script>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>

</html>