<?php
session_start();
if(!isset($_SESSION["user_admin"])){
    header("Location: admin");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registered Users</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
    th{
        background-color:rgb(102, 168, 226);
        color:white;
    } 
    </style>
</head>
<body>
    <div class="form-group" style="font-size:30px;">
        <br>
        <center>
            REFERRALS
        </center>
    </div>
    <?php
    include_once("connect.php");
    $query2='SELECT referrals.email,referrals.code FROM referrals WHERE 1 ORDER BY referrals.code;';
    $res2 = mysqli_query($con,$query2);
    echo '<div>';
    echo '<table class="table table-bordered table-striped">';
    echo '<th>Sl No.</th>';
    echo '<th>Email</th>';
    echo '<th>Code</th>';
    $slno = 1;
    while($row2=mysqli_fetch_array($res2))
    {
        echo '<tr>';
        echo '<td>'.$slno.'</td>';
        echo '<td>'.$row2[0].'</td>';
        echo '<td>'.$row2[1].'</td>';
        echo '</tr>';
        $slno=$slno + 1;
    }
    echo '</table>';
    echo '</div>';
    ?>
    

    
</body>
</html>