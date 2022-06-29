<?php
include '_dbconnect.php';

session_start();

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "DELETE FROM  req_qs WHERE S_no = $id";
$result = mysqli_query($con, $sql);

$con->close();

header("Location: /EduShare/req_qs_view.php");
exit();