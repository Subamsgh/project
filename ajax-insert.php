<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$conn = mysqli_connect("localhost", "root", "", "information") or die("NOt Connected with database " . mysqli_connect_error());
$sql = "INSERT INTO student(fname,lname) VALUES('{$first_name}','{$last_name}') ";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}