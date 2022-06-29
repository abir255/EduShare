<?php
include '_dbconnect.php';

session_start();

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "SELECT * FROM `req_qs` WHERE S_no = $id";

$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);

if ($num1 > 0) {
    while ($row = $result->fetch_assoc()) {
        $u_name = $row["User_name"];
        $u_email = $row["user_email"];
        $qs = $row["qs"];
        

        $sql1 = "INSERT INTO `req_qs_accept` (`User_name`, `user_email`, `qs`, `ans_name`, `ans`)
         VALUES ('$u_name', '$u_email', '$qs', 'None', 'None');";
            $result1 = mysqli_query($con, $sql1);
        
            //header("Location:/EduShare/requestedfile.php");
            $sql3 = "DELETE FROM  req_qs WHERE S_no = $id";
            
            $result3 = mysqli_query($con, $sql3);


        $con->close();

        header("Location: /EduShare/req_qs_view.php");
            exit();

            
    }
}