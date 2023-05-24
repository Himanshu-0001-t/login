<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update</title>
  <link rel="stylesheet" href="mystyle.css">
</head>

<body>
  <?php
  include "Header.php";
  $get_id = $_GET['id'];
  $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");
  $sql = "SELECT * FROM student WHERE id = '{$get_id}'  ";
  $result = mysqli_query($conn, $sql);

  while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <form action="" method="post">
      <div>
        <label for="Name">Name</label>
        <input type="text" name="name1" id="Name" value="<?php echo $row['Name'] ?>" autocomplete="off"
          placeholder="Enter Your Name" required />
      </div>
      <div>
        <label for="Phone">Phone No</label>
        <input type="text" name="phone2" id="Phone" value="<?php echo $row['Phone'] ?>" autocomplete="off"
          placeholder="Enter Your Phone No" required />
      </div>
      <div>
        <label for="Email">Email Id</label>
        <input type="email" name="email3" value="<?php echo $row['Email'] ?>" id="Email" autocomplete="off"
          placeholder="Enter Your Email id" required />
      </div>
      <div>
        <label for="course">Select Course</label>
        <select name="course4" id="course" required ?>>
          <option value="<?php echo $row['Course'] ?>" selected> <?php echo $row['Course'] ?></option>
          <option value="BA">BA</option>
          <option value="BCOM">BCOM</option>
          <option value="BSC">BSC</option>
          <option value="BTECH">BTECH</option>
          <option value="MSC">MSC</option>
        </select>
      </div>
      <button type="submit">Update</button>
    </form>
  <?php } ?>

  <?php

  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $uname = $_POST['name1'];
    $uphone = $_POST['phone2'];
    $uemail = $_POST['email3'];
    $ucourse = $_POST['course4'];


    $sql1 = "UPDATE `student` SET `Name` = '{$uname}', `Course` = '{$ucourse}', `Email` = '{$uemail}', `Phone` = '{$uphone}' WHERE `student`.`Id` = {$get_id};";

    $result1 = mysqli_query($conn, $sql1);

    header("location: user.php");

    mysqli_close($conn);

  }
  ?>
</body>

</html>