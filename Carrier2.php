<?php
    $num= 0 ;
    session_start();
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php'; 
   
    $Name= $_POST['uploader_name'];
    $topic= $_POST['topic'];
    $heading= $_POST['heading'];
    $details= $_POST['details'];
    
   echo $Name;
    $sql = "INSERT INTO `carrier` (`uploder_name`, `topic`, `heading`, `details`)
     VALUES ('$Name', '$topic', '$heading', '$details');";
            $result = mysqli_query($con, $sql);
            echo $Name;
           header("Location:/EduShare/adminhome.html");

            exit();
        
    }
?>