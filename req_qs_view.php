<?php
include '_dbconnect.php';
$sql = "SELECT *  FROM req_qs";

$result = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result);
$html = "";
if ($num1 > 0) {
    while ($row = $result->fetch_assoc()) {

        $html = $html  . "<tr>" .
            
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["S_no"] . '">' . $row["User_name"] . " </td>" .
            "<td>" . $row["user_email"] . "</td>" .
            "<td>" . $row["qs"] . "</td> " .
           
            '<td>' .
            '<a class="btn btn-primary" href="/EduShare/req_qs_accept.php?id=' . $row["S_no"] . '">Accept</a> ' .
            '<a class="btn btn-danger" href="/EduShare/req_qs_delete.php?id=' . $row["S_no"] . '">Delete</a> ' .
            '</td>' .
           
            '</form>' .
            "</tr>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requsted Qustion</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
</head>

<body>

    <div class="shadow p-3 mb-5 bg-white rounded">
        <h2 class="text-center p-4 text-capitalize text-info">Requsted Qustion</h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>

                    <th>Uploder name</th>
                    <th>Uploder email</th>
                    <th>Question</th>
                    <th>Action</th>
                    

                </tr>

            </thead>
            <tbody>

                <?php
                echo  $html
                ?>


            </tbody>

        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });

        function print_sonod(value) {
            location.href = '../../oaressonod.php?id=' + value;
        }
    </script>
    <script src="https://use.fontawesome.com/2c7ebecd35.js"></script>

</body>

</html>