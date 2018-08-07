<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/sponsor.css">
    <style>
        body{
            margin: 0;
        }
        .ad_row{
            text-align: center;
            position: relative;
            padding: 20px;
            padding-right: 50px;
            padding-left: 50px;

        }
        .brand{
            width: 200px;
            height: 200px;
            margin-bottom: 20px;
            margin-right: 20px;
            display: inline-block;
        }
        .brand:nth-last-child(n){
            margin-right: 0px;
        }
        .brand img{
            width: 100%;
        }
        h1{
            text-align: center;
        }
        @media screen and (max-width: 640px){
            .ad_row{
                padding-right: 20px;
                padding-left: 20px;
            }
        }
    </style>
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