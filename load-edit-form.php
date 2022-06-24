<?php
$studentId = $_POST["id"];
$conn = mysqli_connect("localhost", "root", "", "information") or die("connection Failed =>"
    . mysqli_connect_error());
$sql = "SELECT * FROM student WHERE sno={$studentId}";
$result =
    mysqli_query($conn, $sql) or die("query Failed =>" . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "<tr>
                        <td><label>First Name</label></td>
                        <td><input type='text' id='edit-fname' value = '{$row["fname"]}'>
                        <input type='text' id='sno-id' hidden value = '{$row["sno"]}' >
                        </td>
                    </tr>
                    <tr>
                        <td><label>Last Name</label></td>
                        <td><input type='text' id='edit-lname' value='{$row["lname"]}'></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type='submit' id='edit-submit' value='Save'></td>
                    </tr>";
    }

    mysqli_close($conn);
    echo $output;
} else {
    echo "Record Not Found";
}