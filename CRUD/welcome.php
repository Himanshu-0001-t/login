<!-- @format -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome</title>
  <link rel="stylesheet" href="mystyle.css">
</head>

<body>
  <?php
  include "Header.php";
  $id = $_GET['id'];

  echo "<h1>Welcome</h1>"

    ?>

  <body>
    <table>
      <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Class</th>
        <th>Phone No</th>
        <th>Email Id</th>

      </thead>
      <tbody>
        <?php

        $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");
        $sql = "SELECT * FROM student WHERE id = '{$id}'  ";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {

          echo "<tr>
          <td>" . $row['Id'] . "</td>
          <td> " . $row['Name'] . "</td>
          <td>" . $row['Course'] . "</td>
          <td>" . $row['Phone'] . "</td>
          <td>" . $row['Email'] . "</td>
                  </tr>";
        }

        mysqli_close($conn);

        ?>
      </tbody>
    </table>
  </body>

</html>