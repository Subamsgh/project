<?php
$conn = mysqli_connect("localhost", "root", "", "information") or die("connection falied " . mysqli_connect_error());
$name = $_POST["fullname"];
$age = $_POST["age"];
$gender = $_POST['gender'];
$country = $_POST['country'];
$sql = "INSERT INTO `employee` (`name`, `age`, `gender`, `country`) VALUES ('{$name}', '{$age}', '{$gender}', '{$country}')";
$result = mysqli_query($conn, $sql);
if ($result) {
    echo "Hello {$name} Your Record Is Successfully Inserted";
} else {
    echo "Can't Save Your Data";
}