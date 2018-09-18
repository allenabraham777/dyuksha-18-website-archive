<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <link rel="stylesheet" href="css/sponsor.css">
</head>
<body>
    <h1>SPONSORS</h1>
    <div class="ad_row">
    <?php
    $i = 0;
    while($i<50):
    ?>
        <div class="brand">
            <img src="images/sponsor.png">
        </div>
        <?php
    $i = $i + 1;
    endwhile
    ?>
    </div>
    
</body>
</html>