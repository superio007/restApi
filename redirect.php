<?php
require_once "./config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `user_info` WHERE client_id = $id";
    $result = mysqli_query($con, $query);
    $res = mysqli_fetch_assoc($result);
    // Fetch the row directly since we are fetching only one row
    $query = "DELETE FROM user_info WHERE client_id = $id";
    mysqli_query($con, $query); 

    // Redirect to the same page after deleting data
    header("Location: read.php");
    exit();
}
?>