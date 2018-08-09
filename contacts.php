<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
    body{
        margin:0;
        text-align:left;
    }
    .contact_card{
        position: relative;
        width: 300px;
        font-size:18px;
        padding: 5px;
        display: inline-block;
        margin:10px;
        text-align: left;
        box-shadow: 2px 2px 8px #000;
    }
    
    .contact_card div{
        padding-top: 5px;
        padding-bottom:5px;
    }
    h1{
        text-align:center;
    }
    .contact_row{
        text-align: center;
    }
    </style>

</head>
<body>
    <h1>Contacts</h1>
    <div class="contact_row">
    <?php
        $i=0;
        while($i<=10):
    ?>
        <div class="contact_card">
            <div class="name">NAME</div>
            <div class="post">CHARGE</div>
            <div class="phone">+91-9999999999</div>
            <div class="email">dyuksha@dyuksha.org</div>
        </div>
    <?php
            $i = $i+1;
        endwhile;
    ?>
    </div>    
</body>
</html>