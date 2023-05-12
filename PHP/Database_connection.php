<?php
  $username = "root";
  $password = "";
  $SERVER = 'localhost';
  $db = 'milaap';

  $con = mysqli_connect($SERVER, $username, $password, $db);

  if ($con) {
    ?>
            <!-- <script>
                alert('connected to database');
            </script>  -->
    <?php
  } else {
    die("no connection" . mysqli_connect_error());
  }
?>  