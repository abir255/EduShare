<?php
include '_dbconnect.php';

session_start();
$a = 0;
$check = 0;
$t = 0;

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "SELECT * FROM `ans_before_varification` WHERE S_no = $id";

$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);

if ($num1 > 0) {
    while ($row = $result->fetch_assoc()) {
        $ans_name = $row["ans_name"];
        $ans = $row["ans"];
        $qs_id= $row["qs_id"];
        $qs = $row["qs"];

        $sql1 = "SELECT * FROM `req_qs_accept` WHERE S_no = $qs_id";

        $result1 = mysqli_query($con, $sql1);
        $num2 = mysqli_num_rows($result1);
        
        if ($num2 > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $u_name =  $row1["User_name"];
                $u_email =  $row1["user_email"];
                $ans2 =  $row1["ans"];
            }
        }
        
        echo $ans2;
        if($ans2 == "None"){
            $sql1 = "UPDATE req_qs_accept SET ans_name = '$ans_name' , ans = '$ans' WHERE S_no = $qs_id;";
            $result1 = mysqli_query($con, $sql1);
        

        }
        else{
            $sql1 = "INSERT INTO `req_qs_accept` (`User_name`, `user_email`, `qs`, `ans_name`, `ans`)
         VALUES ('$u_name', '$u_email', '$qs', '$ans_name', '$ans');";
            $result1 = mysqli_query($con, $sql1);
        
            //header("Location:/EduShare/requestedfile.php");
           
        }

        $sql3 = "DELETE FROM ans_before_varification WHERE S_no = $id";
           
        $result3 = mysqli_query($con, $sql3);
        $con->close();

        header("Location: /EduShare/ans_list.php");
            exit();

            
    }
}