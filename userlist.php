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
    <link rel="icon" href="images/logo.png" type="image/png" />
    <title>Registered Users</title>
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
            TECHNICAL PACKS
        </center>
    </div>
    <?php
    include_once("connect.php");
    $query2='SELECT dusers.name,dusers.email,dusers.phone,dusers.college FROM dusers WHERE dusers.email NOT IN (SELECT purchases.email FROM purchases) ORDER BY dusers.college;';
    $res2 = mysqli_query($con,$query2);
    echo '<div class="form-group" style="font-size:20px;">';
    echo '<center>';
    echo 'NON REGISTERED';
    echo '</center>';
    echo '</div>';
    echo '<div>';
    echo '<table class="table table-bordered table-striped">';
    echo '<th>Sl No.</th>';
    echo '<th>Name</th>';
    echo '<th>College</th>';
    echo '<th>Phone</th>';
    echo '<th>Email</th>';
    $slno = 1;
    while($row2=mysqli_fetch_array($res2))
    {
        echo '<tr>';
        echo '<td>'.$slno.'</td>';
        echo '<td>'.$row2[0].'</td>';
        echo '<td>'.$row2[3].'</td>';
        echo '<td>'.$row2[2].'</td>';
        echo '<td>'.$row2[1].'</td>';
        echo '</tr>';
        $slno=$slno + 1;
    }
    echo '</table>';
    echo '</div>';
    $query2='SELECT dusers.name,dusers.email,dusers.phone,dusers.college FROM dusers WHERE dusers.email IN (SELECT purchases.email FROM purchases) ORDER BY dusers.college;';
    $res2 = mysqli_query($con,$query2);
    echo '<div class="form-group" style="font-size:20px;">';
    echo '<center>';
    echo 'REGISTERED USERS';
    echo '</center>';
    echo '</div>';
    echo '<div>';
    echo '<table class="table table-bordered table-striped">';
    echo '<th>Sl No.</th>';
    echo '<th>Name</th>';
    echo '<th>College</th>';
    echo '<th>Phone</th>';
    echo '<th>Email</th>';
    $slno=1;
    while($row2=mysqli_fetch_array($res2))
    {
        echo '<tr>';
        echo '<td>'.$slno.'</td>';
        echo '<td>'.$row2[0].'</td>';
        echo '<td>'.$row2[3].'</td>';
        echo '<td>'.$row2[2].'</td>';
        echo '<td>'.$row2[1].'</td>';
        echo '</tr>';
        $slno=$slno + 1;
    }
    echo '</table>';
    echo '</div>';

    ?>
    

    
</body>
</html>