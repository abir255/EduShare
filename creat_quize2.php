<?php
    $num= 0 ;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php'; 
    $email = $_SESSION['email'];
    $Course_Name= $_POST['Course_Name'];
    $Course_Topic= $_POST['Course_Topic'];
    $Question_Link= $_POST['Question_Link'];
    

   
    $sql = "INSERT INTO `quize` (`course`, `topic`, `link`)
     VALUES ('$Course_Name', '$Course_Topic', '$Question_Link');";
            $result = mysqli_query($con, $sql);
            
            header("Location:/EduShare/adminhome.html");

            exit();
        
    }
?>