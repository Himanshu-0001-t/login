<!-- @format -->

<?php
include "Header.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="mystyle.css">
</head>

<body>
  <form action="" method="post">
    <div>
      <label for="Name">Name</label>
      <input type="text" name="name" id="Name" autocomplete="off" placeholder="Enter Your Name" required />
    </div>
    <div>
      <label for="Phone">Password</label>
      <input type="password" name="pass" id="Phone" autocomplete="off" placeholder="Enter Your Phone No" required />
    </div>

    <button type="submit">Login</button>
  </form>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['pass'];

    if ($name == "Himanshu" && $password == "Harsh") {
      header("location:user.php");
    } else {
      echo "<h1>Not Authorized</h1>";
    }
  }
  ?>
</body>

</html>