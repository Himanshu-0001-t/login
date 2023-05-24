<?php


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $sname = $_POST['name'];
    $sphone = $_POST['phone'];
    $semail = $_POST['email'];
    $scourse = $_POST['course'];

    // echo $sname . $scourse . $sphone . $semail;

    $conn = mysqli_connect("localhost", "root", "", "crud") or die("Connection Faild");

    $sql = "INSERT INTO `student` (`Id`, `Name`, `Course`, `Email`, `Phone`) VALUES (NULL, '{$sname}', '{$scourse}', '{$semail}', '{$sphone}');";

    mysqli_query($conn, $sql);

    header("location:index.php");

    mysqli_close($conn);

}





?>