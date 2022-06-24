<?php
$student_id = $_POST["id"];
$conn = mysqli_connect("localhost", "root", "", "information") or die("NOt Connected with database " . mysqli_connect_error());
$sql = "DELETE FROM student WHERE sno={$student_id} ";
if (mysqli_query($conn, $sql)) {
    echo 1;
} else {
    echo 0;
}