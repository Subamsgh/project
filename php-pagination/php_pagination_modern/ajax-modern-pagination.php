<?php
$conn = mysqli_connect("localhost", "root", "", "information") or die("connection Failed =>"
  . mysqli_connect_error());
//PAGINATION CODE START//
$limit = 5;
if (isset($_POST["page_no"])) {
  $page = $_POST["page_no"];
} else {
  $page = 0;
}
$serialNo = $page + 1;

// $offset = ($page - 1) * $limit_per_page;
//PAGINATION CODE END//
$sql = "SELECT * FROM student LIMIT {$page},$limit";
$result =
  mysqli_query($conn, $sql) or die("query Failed =>" . mysqli_error($conn));

if (mysqli_num_rows($result) > 0) {
  $output = "";
  $output .= "<tbody>";
  while ($row = mysqli_fetch_assoc($result)) {
    $last_id = $serialNo;
    //$lastid = $row['sno'];
    $output .= "<tr><td align='center'>{$row['sno']}</td><td align='center'>{$row['fname']} {$row['lname']}</td></tr>";
    $serialNo++;
  }

  $output .= "</tbody>";
  $output .= "<tbody id='pagination'>
                <tr>
                  <td colspan='2'><button id='ajax-btn' type='button' data-id='{$last_id}' class='btn-outline-success btn-block'>Load More</button></td>
                </tr>
             </tbody>";
  echo $output;
} else {
  echo "";
}