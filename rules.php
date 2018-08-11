<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Details</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <style>
        body{
            margin: 0;
            padding: 30px;
            color: #000000;
            background: linear-gradient(rgba(255, 255, 255, 0.89),rgba(255, 255, 255, 0.911)),
                        url('images/bk_informal.jpg');
        }
        p{
            text-align: justify;
            padding-right: 100px;
            padding-left: 100px;
        }
        ul{
            margin-left: 60px; margin-right: 100px;
        }
        ul li{
            margin-bottom: 20px;
            text-align: justify;
        }
        h2{
            margin-left: 100px;
        }
        h1{
            margin-bottom: 50px;
        }
        @media screen and (max-width: 640px){
            
            body{
                padding: 5px;
            }
            p{
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
        <img src="images/logo2.png" style="margin-left: 10px; margin-top: 10px; height: 60px;">
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
                $flag=true;

            }
            catch(Exception $e){
                $flag=false;
            }
           

        }


    ?>
    <h1 align="center"><u>
    <?php 
        if($flag){
            echo $name;
        } 
    ?>
    </u></h1>

    <p>
        <?php 
        if($flag){
            echo $desp;
        } 
        ?>
    </p>

    <p>
    Price: &#8377;
    </p>
    <p>
    Contact: 
    </p>

    <h2><u>Rules and Regulations</u></h2>
    <p>
        <ul>
            <?php 
                if($flag){
                    $count = sizeof($rules);
                    for($i = 0; $i < $count; $i++){
                        echo "<li>{$rules[$i]}</li>";
                    }
                }
            ?>
        </ul>
    </p>

</body>
</html>