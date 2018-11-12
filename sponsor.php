<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sponsors-Dyuksha</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <link rel="stylesheet" href="css/sponsor.css">
</head>
<body>
<h1>SPONSORS</h1>

<?php
    include_once("connect.php");
    $query='SELECT * FROM sponsor_type';
    $res = mysqli_query($con,$query);

    while($row=mysqli_fetch_array($res))
    {
        echo'<br><center><h3>'.$row[0].'</h3></center>';
        $query2='SELECT * FROM sponsors WHERE type="'.$row[1].'";';
        $res2 = mysqli_query($con,$query2);
        echo '<div class="ad_row">';
        while($row2=mysqli_fetch_array($res2))
        {
            echo'<div class="brand">';
            echo'<img src="images/'.$row2[1].'.jpg">';
            echo'</div>';
        }
        echo '</div>';
    }
    ?>
</body>
</html>