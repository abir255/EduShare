<?php
$num= 0 ;
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
$email = $_SESSION['email'];
$req_qs = $_POST['req_qs'];


$sql1 = "SELECT u_name FROM `user` WHERE u_email = '$email'";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        
        $name =  $row["u_name"] ;
        
    }
}
$sql = "INSERT INTO `req_qs` ( `User_name`, `user_email`, `qs`) 
        VALUES ('$name', '$email', '$req_qs');";
        $result = mysqli_query($con, $sql);
        
        header("Location:/EduShare/userhome.html");

        exit();
        
    
}

?>