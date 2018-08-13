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
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <style>
    body{
        margin:0;
        text-align:left;
        padding: 10px;
    }

    @import url('https://fonts.googleapis.com/css?family=Yatra+One');

    .contact_card{
        font-family: 'Yatra One', cursive;
        position: relative;
        width: 250px;
        font-size:18px;
        padding: 5px;
        padding-bottom: 20px;
        display: inline-block;
        border-radius: 10px;
        margin:10px;
        text-align: left;
        box-shadow: 2px 2px 8px #000;
    }
    
    .contact_card div{
        line-height: 13px;
        padding-top: 5px;
        padding-bottom:5px;

    }
    .contact_card img{
        margin-bottom: 10px;
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
            <div class="name"><i class="fas fa-user-secret" style="width:25px;"></i> <?php echo $list[$i]->name;?></div>
            <div class="post"><?php echo $list[$i]->post;?></div>
            <div class="phone"><i class="fas fa-mobile" style="width:25px;"></i> +91 <?php echo $list[$i]->phone;?></div>
            <div class="email"><i class="fas fa-envelope" style="width:25px;"></i>  <?php echo $list[$i]->email;?></div>
        </div>
    <?php
            $i = $i+1;
        endwhile;
    ?>
    </div>    
</body>
</html>