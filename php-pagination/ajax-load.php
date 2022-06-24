<?php
$conn = mysqli_connect("localhost", "root", "", "information") or die("connection Failed =>"
    . mysqli_connect_error());

//CODE START FOR PAGINATION LIMIT AND OFFSET//
$limit_per_page = 5;
$page = "";
if (isset($_POST["page_no"])) {
    $page = $_POST["page_no"];
} else {
    $page = 1;
}
$offset = ($page - 1) * $limit_per_page;
//CODE END FOR PAGINATION LIMIT AND OFFSET//
$sql = "SELECT * FROM student LIMIT {$offset},{$limit_per_page}";
$result =
    mysqli_query($conn, $sql) or die("query Failed =>" . mysqli_error($conn));
$output = "";
if (mysqli_num_rows($result) > 0) {
    $output = '
<table>
  <tr>
    <th>Serial Number</th>
    <th>Full Name</th>
    
  </tr>
  ';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= "
  <tr>
    <td>{$row["sno"]}</td>
    <td>{$row["fname"]} {$row["lname"]}</td>
     </tr>
  ";
    }
    $output .= '</table>';
    //PAGINATION CODE START//
    $sql_result = "SELECT * FROM student";
    $records = mysqli_query($conn, $sql_result) or die("Query Unsuccessful");
    $total_record = mysqli_num_rows($records);
    $total_pages = ceil($total_record / $limit_per_page);
    $output .= '<div class="container my-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination" id="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        $output .= "
    <a class='page-link' id='{$i}' href='' >{$i}</a>";
    }
    $output .=
        '</ul>
      </nav>
        </div>';
    //PAGINATION CODE END//

    echo $output;
} else {
    echo "Record Not Found";
}