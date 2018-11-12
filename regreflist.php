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
        <br>
        <br>
        <center><h3>REGISTERED</h3></center>
    </div>
    <?php
    include_once("connect.php");
    $query2='SELECT dusers.name,dusers.college,referrals.code,dusers.email,dusers.phone FROM dusers,referrals WHERE dusers.email IN (SELECT referrals.email FROM referrals WHERE referrals.email IN (SELECT dusers.email FROM dusers WHERE dusers.email IN (SELECT purchases.email FROM purchases))) AND dusers.email=referrals.email';
    $res2 = mysqli_query($con,$query2);
    echo '<div>';
    echo '<table class="table table-bordered table-striped">';
    echo '<th>Sl No.</th>';
    echo '<th>NAME</th>';
    echo '<th>COLLEGE</th>';
    echo '<th>REFFERAL CODE</th>';
    echo '<th>EMAIL</th>';
    echo '<th>PHONE NO.</th>';
    $slno = 1;
    while($row2=mysqli_fetch_array($res2))
    {
        echo '<tr>';
        echo '<td>'.$slno.'</td>';
        echo '<td>'.$row2[0].'</td>';
        echo '<td>'.$row2[1].'</td>';
        echo '<td>'.$row2[2].'</td>';
        echo '<td>'.$row2[3].'</td>';
        echo '<td>'.$row2[4].'</td>';
        echo '</tr>';
        $slno=$slno + 1;
    }
    echo '</table>';
    echo '</div>';

    echo '<br>';
    echo '<br>';
    echo '<center><h3>NOT REGISTERED</h3></center>';

    $query2='SELECT dusers.name,dusers.college,referrals.code,dusers.email,dusers.phone FROM dusers,referrals WHERE dusers.email IN (SELECT referrals.email FROM referrals WHERE referrals.email IN (SELECT dusers.email FROM dusers WHERE dusers.email NOT IN (SELECT purchases.email FROM purchases))) AND dusers.email=referrals.email';
    $res3 = mysqli_query($con,$query2);
    echo '<div>';
    echo '<table class="table table-bordered table-striped">';
    echo '<th>Sl No.</th>';
    echo '<th>NAME</th>';
    echo '<th>COLLEGE</th>';
    echo '<th>REFFERAL CODE</th>';
    echo '<th>EMAIL</th>';
    echo '<th>PHONE NO.</th>';
    $slno = 1;
    while($row3=mysqli_fetch_array($res3))
    {
        echo '<tr>';
        echo '<td>'.$slno.'</td>';
        echo '<td>'.$row3[0].'</td>';
        echo '<td>'.$row3[1].'</td>';
        echo '<td>'.$row3[2].'</td>';
        echo '<td>'.$row3[3].'</td>';
        echo '<td>'.$row3[4].'</td>';
        echo '</tr>';
        $slno=$slno + 1;
    }
    echo '</table>';
    echo '</div>';
    ?>
    

    
</body>
</html>
