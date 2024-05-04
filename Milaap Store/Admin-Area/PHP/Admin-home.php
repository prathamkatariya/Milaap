<?php
session_start();

if (isset($_SESSION['admin_user_name'])) {
    // Do Nothing
} else {
?>
    <script>
        location.replace("Admin-login.php");
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

    <!-- css link -->
    <link rel="stylesheet" href="../CSS/Admin-home.css">

    <!-- font awesome link -->
    <script src="https://kit.fontawesome.com/415069f141.js" crossorigin="anonymous"></script>

    <title>Admin Panel</title>
</head>

<body>
    <div class="side-menu">
        <div class="brand-name">
            <h1>Milaap Store</h1>
            <h1>Admin Pannel</h1>
        </div>
        <ul>
            <li>&nbsp;
                <a class="nav-link" href="#"><span>Dashboard</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="insert_Product.php"><span>Insert Product</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="#"><span>View Product</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="#"><span>All Orders</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="#"><span>All Payments</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="#"><span>All Users</span></a>
            </li>
            <li>&nbsp;
                <a class="nav-link" href="Admin-logout.php"><span>Logout</span></a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <a href="insert_Product.php">
                            <h1>Insert Products</h1>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>View Products</h1>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>All Orders</h1>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>All Payments</h1>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>Users List</h1>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>School</th>
                            <th>Amount</th>
                            <th>Option</th>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                        <tr>
                            <td>John Doe</td>
                            <td>St. James College</td>
                            <td>$120</td>
                            <td><a href="#" class="btn">View</a></td>
                        </tr>
                    </table>
                </div>
                <div class="new-students">
                    <div class="title">
                        <h2>New Students</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Profile</th>
                            <th>Name</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td><img src="../img/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="../img/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="../img/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="../img/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="../img/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="../img/info.png" alt=""></td>
                        </tr>
                        <tr>
                            <td><img src="../img/user.png" alt=""></td>
                            <td>John Steve Doe</td>
                            <td><img src="../img/info.png" alt=""></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>