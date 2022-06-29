<?php
$check = 0;
include '_dbconnect.php';
session_start();
$email = $_SESSION['email'];



$sql1 = "SELECT u_name FROM `user` WHERE u_email = '$email'";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        
        $name =  $row["u_name"] ;
        
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $qs = $_POST['comment'];
    $Answer = $_POST['Answer'];
  
    if ($Answer  == null) {
        $a = 1;
        $check = 1;
    }
   
    if ($check == 0) {
        $sql = "INSERT INTO `ans_before_varification` (`qs_id`, `qs`, `ans_name`, `ans`)
         VALUES ('$id', '$qs', '$name', '$Answer');";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        //echo $sql;
        header("Location: /EduShare/user_qs_ans.php");
        $con->close();
        exit();
    }


}
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];
echo $id;
$sql = "select * FROM req_qs_accept WHERE S_no = $id";
$result1 = mysqli_query($con, $sql);

$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $qs = $row["qs"];
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- fonts -->
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!-- font awsome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" crossorigin="anonymous"></script>
    <!-- custom css -->
    <link rel="stylesheet" href="css/signup.css">

    <title>Answer Question</title>
</head>

<body>
    <!-- animations -->
    <section class="navbar_bg">
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container ">
                <a class="navbar-brand" href="#"><img src="images/logo_written.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto text-center">
                        <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="index.html">Home</a>
                        </li>
                       
                      
                   
                        <li class="nav-item">
                            <a class="nav-link active" href="adminhome.html">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="login.html">Logout</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </section>



    <!-- news latter section -->
    <section class="news-latter ">
        <div class="container">
            <div class="row d-flex justify-content-around align-items-center mt-5">
                
                <div class="col-12 col-md-12 col-lg-6 ol-xxl-6 col-xl-6 row d-flex justify-content-center card">
                    <h3 class="text-center fw-bold">Submit Your Answer</h3>
                    <form action="/EduShare/user_attemp_ans.php" method="POST">
                        <input hidden type="text" name="id" value="<?php echo $id ?>">
                        <div class="row d-flex justify-content-center">
                            <div class="col-xl-12	col-lg-12 col-md-12 inputBox">
                            <textarea name="comment" rows="3" cols="30"><?php echo $qs;?></textarea>
                            </div>
                            <div class="col-xl-12	col-lg-12 col-md-12  inputBox">
                                <textarea name="Answer" placeholder="Submit Your Answer"></textarea>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="text-center col-12">
                                <button class="btn-login">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</body>

</html>