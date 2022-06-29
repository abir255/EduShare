<?php
include '_dbconnect.php';

session_start();

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "DELETE FROM  user_feedback WHERE S_no = $id";
$result = mysqli_query($con, $sql);

$con->close();

header("Location: /EduShare/view_feedback.php");
exit();