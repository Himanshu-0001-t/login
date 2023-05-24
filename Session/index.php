<!-- @format -->

<?php
include 'header.php';
?>
<?php

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {

  $name = $_POST['name'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM User WHERE NAME='$name'AND PASSWORD='$pass'";
  $result = mysqli_query($conn, $sql);

  $num = mysqli_num_rows($result);

  echo $num;

  if ($num == 1) {

    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['Name'] = $name;
    header("location:welcome.php");
  } else {
    echo "<h1 class='red'>User Not Found </h1>";
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="Mystyle.css">
</head>

<body>
  <form action="" method="post">
    <p>
      Name: <input type="text" name="name" placeholder="Enter Your name" autocomplete="off" required />
    </p>
    <p>
      Password:
      <input type="password" name="pass" placeholder="Enter Your password" required />
    </p>
    <button type="submit">Login</button>
  </form>


</body>

</html>