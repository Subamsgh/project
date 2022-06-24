<?php
$searchWord=$_POST['search'];
$conn = mysqli_connect("localhost", "root", "", "information") or die("NOt Connected with database " . mysqli_connect_error());
$sql = "SELECT * FROM student WHERE fname LIKE '%{$searchWord}%' OR lname LIKE '%{$searchWord}%' ";
$result =
  mysqli_query($conn, $sql) or die("query Failed =>" . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {
  $output = '
<table>
  <tr>
    <th>Serial Number</th>
    <th>Full Name</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  ';
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "
  <tr>
    <td>{$row["sno"]}</td>
    <td>{$row["fname"]} {$row["lname"]}</td>
    <td><button type='button' class='edit-btn btn btn-success' data-id='{$row["sno"]}'>Edit</button></td>
    <td><button type='button' class='delete-btn btn btn-danger' data-id='{$row["sno"]}'>Delete</button></td>
  </tr>
  ";
  }
  $output .= '
</table>
';
  mysqli_close($conn);
  echo $output;
} else {
  echo "Record Not Found";
}