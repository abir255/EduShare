<?php
    $num= 0 ;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php'; 
    $email = $_SESSION['email'];
    $feedcack= $_POST['feedback'];
    

    $sql1 = "SELECT u_name FROM `user` WHERE u_email = '$email'";

    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);
    $html = "";

    if ($num1 > 0) {
        while ($row = $result1->fetch_assoc()) {
            
            $name =  $row["u_name"] ;
        }
    }
    $sql = "INSERT INTO `user_feedback` (`user_name`, `u_email`, `feedback`)
     VALUES ( '$name', '$email', '$feedcack');";
            $result = mysqli_query($con, $sql);
            
            header("Location:/EduShare/userhome.html");

            exit();
            
        
    }
?>