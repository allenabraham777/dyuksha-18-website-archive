<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Details</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <style>
        @font-face{
            font-family: title;
            src: url(css/fonts/fonarto.xt.ttf);
        }
        @font-face{
            font-family: roboto;
            src: url(css/fonts/roboto.ttf);
        }
        body{
            margin: 0;
            padding: 30px;
            color: #000000;
            background: linear-gradient(rgba(255, 255, 255, 0.89),rgba(255, 255, 255, 0.911)),
                        url('images/bk_informal.jpg');
        }
        p,h3{
            font-family: roboto;
            text-align: justify;
            padding-right: 100px;
            padding-left: 100px;
        }
        
        ul{
            margin-left: 60px; margin-right: 100px;
        }
        ul li{
            font-family: roboto;
            margin-bottom: 20px;
            text-align: justify;
        }
        h2{
            margin-left: 100px;
        }
        h1{
            font-family: title;
            margin-bottom: 50px;
        }
        @media screen and (max-width: 640px){
            
            body{
                padding: 5px;
            }
            p,h3{
                padding-right: 20px;
                padding-left: 20px;
            }
            ul{
                text-align: left;
                margin-left: 0px;
                margin-right: 20px;
            }
            h2{
                margin: 0;
                text-align: center;
            }

            h1{
                margin-bottom: 20px;
            }
            .title{
                text-align: center;
            }

        }
    </style>
</head>
<body>
    <div class="title">
        <a href="index"><img src="images/logo2.png" style="margin-left: 10px; margin-top: 10px; height: 60px;"></a>
    </div>

    <?php 
        $rules = array();
        $desp = "";
        $flag = false;
        $name = "";
        if(isset($_GET["i"])){
            $id = $_GET["i"];
            $id = trim($id);
            $file = "event_rules_json/".$id.".json";
           
            try{
                $data = file_get_contents($file);
                 // Decoding the Json file
                $obj = json_decode($data);
                $name = $obj->Name;
                $desp = $obj->Descriptions;
                $rules = $obj->Rules;
                $prize = $obj->Prize;
                $contact = $obj->Contact;
                $flag=true;

            }
            catch(Exception $e){
                $flag=false;
            }
           

        }


    ?>
    <h1 align="center">
    <?php 
        if($flag){
            echo $name;
        } 
    ?>
    </h1>

    <p style="font-size:18px; line-height:25px;">
        <?php 
        if($flag){
            echo $desp;
        } 
        ?>
    </p>

    <p>
    <?php 
        if($flag && $id!="TEPKG1" && $id!="ETGS31"){
            echo '<i class="fas fa-trophy" style="color: orange"></i> Prize: &#8377;';
            echo $prize;
        } 
    ?>
    </p>
    <br>
    <?php
        if($id!="ETGS31"){
    ?>
    <h3><u>Contacts</u></h3>

    <p>
    <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp; <?php echo $contact[0]; ?> <br><br>
    <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp; <?php echo $contact[1]; ?> <br><br><br><br>
    <i class="fas fa-user"></i>&nbsp;&nbsp;&nbsp; <?php echo $contact[2]; ?> <br><br>
    <i class="fas fa-phone"></i>&nbsp;&nbsp;&nbsp; <?php echo $contact[3]; ?>
    </p>
    <br><br>
    <?php 
    }
    ?>
    <?php
        if($id!="TEPKG1" && $id!="ETGS31")
        {
    ?>
    <h2><i class="fas fa-clipboard-list"></i> <u>Rules and Regulations</u></h2>
    <p>
        <ul>
            <?php 
                if($flag){
                    $count = sizeof($rules);
                    for($i = 0; $i < $count; $i++){
                        echo "<li style='font-size:16px; line-height:20px;'>{$rules[$i]}</li>";
                    }
                }
            ?>
        </ul>
    </p>
    <?php
       }
    ?>

</body>
</html>
