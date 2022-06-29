<?php
include '_dbconnect.php';

session_start();
$a = 0;
$check = 0;
$t = 0;

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "SELECT * FROM `before_verification` WHERE S_no = $id";

$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);

if ($num1 > 0) {
    while ($row = $result->fetch_assoc()) {
        $u_name = $row["uploader_name"];
        $u_email = $row["uploader_email"];
        $t_name = $row["teacher_name"];
        $sub  = $row["subject"];
        $type= $row["type"];
        $link = $row["link"];
        
        

        $sql1 = "INSERT INTO `after_verification` (`uploader_name`, `uploader_email`, `teacher_name`, `subject`, `type`, `link`) 
        VALUES ('$u_name', '$u_email', '$t_name', '$sub', '$type', '$link');";
            $result1 = mysqli_query($con, $sql1);
        
            //header("Location:/EduShare/requestedfile.php");
            $sql3 = "DELETE FROM  before_verification WHERE S_no = $id";
            echo $sql3 ;
            $result3 = mysqli_query($con, $sql3);


            

        $con->close();

        header("Location: /EduShare/requestedfile.php");
            exit();

            
    }
}


