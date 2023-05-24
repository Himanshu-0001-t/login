<!-- @format -->

<?php
include 'header.php';
$error = false;
?>

<?php
$exists = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];

  include 'db.php';

  $sql = "SELECT * FROM User";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['NAME'] == $name) {

      $exists = true;

    }
    ;

  }
  ;


  if ($exists === false) {

    $sql = "INSERT INTO `user` (`ID`, `NAME`, `EMAIL`, `PASSWORD`) VALUES (NULL, '{$name}', '{$email}', '{$pass}')";

    mysqli_query($conn, $sql);

    header("location:index.php");
  }

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sign in</title>
  <link rel="stylesheet" href="Mystyle.css">
</head>

<body>
  <form action="" method="post">
    <div>
      <label for="Name">Name</label>
      <input type="text" name="name" id="Name" autocomplete="off" placeholder="Enter Your Name" required />
    </div>
    <div>
      <label for="Email">Email Id</label>
      <input type="email" name="email" id="Email" autocomplete="off" placeholder="Enter Your Email id" required />
    </div>
    <div>
      <label for="Pass">Password</label>
      <input type="password" name="pass" id="Pass" autocomplete="off" placeholder="Enter Your Password" required />
    </div>
    <button type="submit">Submit</button>
  </form>

  <?php

  if ($exists) {
    echo " <div>
    <h1 class='red'>Username already exists Change usename </h1>
  </div>";
  }

  ?>

</body>

</html>