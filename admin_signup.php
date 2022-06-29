<?php
$check = 0;
$check_pass = 0;
$check_email  = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $date = $_POST['date'];
    $gender= $_POST['gender'];
   
    if ($name == null) {
        $a = 1;
        $check = 1;
    }
    if ($email == null) {
        $a = 1;
        $check = 1;
    }
    if ($pass1 == null || strlen($pass1) < 6) {
        $a = 1;
        $check = 1;
    }
    if ($pass2 == null || strlen($pass2) < 6) {
        $a = 1;
        $check = 1;
    }
    if ($gender == null) {
        $a = 1;
        $check = 1;
    }
    if ($date == null) {
        $a = 1;
        $check = 1;
    }
    if ($check == 0) {
        if ($pass1 == $pass2) {
            $check_pass = 1;

        $sql2 = "SELECT * FROM user WHERE u_email = '$email'";
        $result1 = mysqli_query($con, $sql2);
        $num1 = mysqli_num_rows($result1);
        
        if ($num1 == 0) {
        $sql = "INSERT INTO `admin` (`a_name`, `a_email`, `a_gender`, `a_password`, `a_date`)
         VALUES ('$name', '$email', ' $gender', '$pass1', '$date');";
            $result = mysqli_query($con, $sql);
        
            header("Location:/EduShare/adminhome.html");

            exit();
        }
               
        }
    }else{
        header("Location:/EduShare/create_admin.php");
        
    }
    

}
