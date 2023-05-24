<!-- @format -->
<?php


$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");
$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link rel="stylesheet" href="mystyle.css" />
</head>

<body>
  <table>
    <thead>
      <th>Id</th>
      <th>Name</th>
      <th>Class</th>
      <th>Phone No</th>
      <th>Email Id</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      include "header.php";

      $sno = 0;
      while ($row = mysqli_fetch_assoc($result)) {
        $sno = $sno + 1;
        echo "<tr>
          <td>" . $sno . "</td>
          <td> " . $row['Name'] . "</td>
          <td>" . $row['Course'] . "</td>
          <td>" . $row['Phone'] . "</td>
          <td>" . $row['Email'] . "</td>
          <td class='btn'>" . " <a href='Update.php?id={$row['Id']}' >Update </a>" . " <a href='Delete.php?id={$row['Id']}' >Delete</a>" . "<?td>
          </tr>";
      }

      mysqli_close($conn);

      ?>
    </tbody>
  </table>
</body>

</html>