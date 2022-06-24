<?php
$student_id = $_POST["id"];
$first_name = $_POST["sname"];
$last_name = $_POST["ename"];

$conn = mysqli_connect("localhost", "root", "", "information") or die("NOt Connected with database " . mysqli_connect_error());
$sql = "UPDATE `student` SET `fname`='{$first_name}',`lname`='{$last_name}' WHERE sno={$student_id}";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}