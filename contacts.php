<?php
include("members.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contacts</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
    body{
        margin:0;
        text-align:left;
        padding: 10px;
    }
    .contact_card{
        position: relative;
        width: 250px;
        font-size:18px;
        padding: 5px;
        display: inline-block;
        border-radius: 10px;
        margin:10px;
        text-align: left;
        box-shadow: 2px 2px 8px #000;
    }
    
    .contact_card div{
        padding-top: 5px;
        padding-bottom:5px;
        padding-left: 20px;

    }
    .contact_card img{
        border-radius: 5px;
        width:100%;
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
        while($i<$n):
    ?>
        <div class="contact_card">
            <img src="<?php echo $list[$i]->image;?>" alt="">
            <div class="name"><?php echo $list[$i]->name;?></div>
            <div class="post"><?php echo $list[$i]->post;?></div>
            <div class="phone"><?php echo $list[$i]->phone;?></div>
            <div class="email"><?php echo $list[$i]->email;?></div>
        </div>
    <?php
            $i = $i+1;
        endwhile;
    ?>
    </div>    
</body>
</html>