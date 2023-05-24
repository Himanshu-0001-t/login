<!-- @format -->

<?php
include "Header.php"
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="mystyle.css" />
</head>

<?php

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

?>

<body>
  <h1> Login</h1>
  <form action="" method="post">
    <div>
      <label for="name"></label>
      <input type="text" name="username" id="name" placeholder="Enter name" />
    </div>

    <button type="submit" id="btn">Login</button>
  </form>

  <?php


  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST['username'];

    while ($row = mysqli_fetch_assoc($result)) {

      if ($row['Name'] == $username) {
        header("location:welcome.php?id={$row['Id']}");
      }
    }
  }


  ?>

</body>

</html>