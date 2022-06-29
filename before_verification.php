<?php
    $num= 0 ;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php'; 
    $email = $_SESSION['email'];
    $teacher_name= $_POST['t_name'];
    $subject = $_POST['subject'];
    $type = $_POST['type'];
    $link= $_POST['link']; 
    echo"$teacher_name"; 

    $sql1 = "SELECT u_name FROM `user` WHERE u_email = '$email'";

    $result1 = mysqli_query($con, $sql1);
    $num1 = mysqli_num_rows($result1);
    $html = "";

    if ($num1 > 0) {
        while ($row = $result1->fetch_assoc()) {
            
            $name =  $row["u_name"] ;
        }
    }
    $sql = "INSERT INTO `before_verification` (`uploader_name`, `uploader_email`, `teacher_name`, `subject`, `type`, `link`)
     VALUES ('$name', '$email ', '$teacher_name', '$subject', ' $type', '$link');";
            $result = mysqli_query($con, $sql);
            
           
            header("Location:/EduShare/userhome.html");

            exit();
        
    }
?>