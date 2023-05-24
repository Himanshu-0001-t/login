<!-- @format -->

<?php

session_start();

if (isset($_SESSION['loggedin'])) {
  $loggedin = true;
} else {
  $loggedin = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title></title>
  <link rel="stylesheet" href="Mystyle.css" />
</head>

<body>
  <nav>
    <ul>
      <?php
      if ($loggedin) {
        echo '<li><a href="logout.php">Logout</a></li>';
      } else {
        echo '<li><a href="sign.php">Sign Up</a></li>;
        <li><a href="index.php">Login</a></li>';
      }

      ?>

    </ul>
  </nav>
</body>

</html>