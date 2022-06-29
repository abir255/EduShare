<?php
$num= 0 ;
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
    $email = $_POST['username'];
    $pass =  $_POST['password'];
   
    $sql = "SELECT * FROM `user` WHERE u_email = '$email' and u_password = '$pass' ";
    
    $result = mysqli_query($con,$sql);
    
    $num = mysqli_num_rows($result);

    if($num == 1){
        $_SESSION["email"] = $email;
        header("Location:/EduShare/userhome.html");
         exit();
    }else {
        $sql2 = "SELECT * FROM `admin` WHERE a_email = '$email' and a_password = '$pass' ";
        $result2 = mysqli_query($con,$sql2);
    
        $num2 = mysqli_num_rows($result2);
       
        if($num2 == 1){
            
         header("Location:/EduShare/adminhome.html");

         exit();
        }
        else{
            header("Location:/EduShare/login.html");
        }
        
    }
    $con->close();
}
?>