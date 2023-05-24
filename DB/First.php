<?php

$server = 'localhost';
$user = 'root';
$password = "";
$db = 'panda';

$conn = mysqli_connect($server, $user, $password, $db);

if (!$conn) {
    die("Sorry");
}

// $sql = "CREATE DATABASE Panda";

// if (mysqli_query($conn, $sql)) {
//     echo "Database create succesfully";
// } else {
//     echo "Cannot be create";
// }
// ;

// $sql = "CREATE TABLE `panda`.`Student` (`Id` INT NOT NULL AUTO_INCREMENT , `Name` VARCHAR(15) NOT NULL , `Email` VARCHAR(15) NOT NULL , `Password` VARCHAR(20) NOT NULL , PRIMARY KEY (`Id`))";

// $sql = "INSERT INTO `student` (`Id`, `Name`, `Email`, `Password`) VALUES (NULL, 'Himanshu', 'Himanshu@gmail.com', 'mypass')";

mysqli_query($conn, "INSERT INTO `student` (`Id`, `Name`, `Email`, `Password`) VALUES (NULL, 'badmash', 'Hiamanshu@gmail.com', 'Password');");


$sql = "SELECT * FROM `student`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Hello " . $row['Name'];
        echo "<br>";
    }
} else {
    echo "No Result found";
}




















?>