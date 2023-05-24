<?php

include "Header.php";

$id = $_GET['id'];

$conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");

$sql = "DELETE FROM `student` WHERE `student`.`Id` = {$id}";

mysqli_query($conn, $sql);

header("location:user.php");

mysqli_close($conn)

    ?>