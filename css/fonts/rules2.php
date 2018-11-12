<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
    <link rel="stylesheet" href="css/rules2.css">
</head>
<body>
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
                $schedule = $obj->Schedule;
                $flag=true;

            }
            catch(Exception $e){
                $flag=false;
            }
           

        }


    ?>
    <center>
        <div class="content" align="left">
            <div class="heading">
                <span class="title">
                    <?php 
                        if($flag){
                            echo $name;
                        } 
                    ?>
                </span>
                <br>
                <br>
                <span class="desc">
                    <?php 
                        if($flag){
                            echo $desp;
                        } 
                    ?>
                </span>
            </div>
            <?php
                if($flag && $id!="TEPKG1" && $id!="ETGS31"){
            ?>
            <div class="prize">
                <span class="title">
                P R I Z E S&nbsp;&nbsp;W O R T H
                </span>
                <br>
                <br>
                <br>
                <span class="value">
                    <?php 
                        echo $prize;
                    ?>
                </span>
            </div>
            <?php
                }
            ?>
            <?php
                if($flag && $id!="TEPKG1" && $id!="ETGS31"){
            ?>
            <div class="reg">
                <span class="title">
                    &nbsp;DAY
                </span>
                
                <span class="value">
                    <?php
                        echo $schedule;
                    ?>
                </span>
            </div>
            <?php
                }
            ?>
            <?php
                if($id!="ETGS31"){
            ?>
            <div class="contact">
                <span class="title">
                    CONTACT   
                </span>     
                <span class="value">
                    <div class="name">
                        <?php echo $contact[0]; ?>
                    </div>
                    <div class="number">
                        <?php echo $contact[1]; ?>
                    </div>
                    <div class="name">
                        <?php echo $contact[2]; ?>
                    </div>
                    <div class="number">
                        <?php echo $contact[3]; ?>
                    </div>
                </span>
            </div>
            <?php
                }
            ?>
            <?php
                if($id!="TEPKG1" && $id!="ETGS31")
                {
            ?>
            <div class="rules">
                <span class="title">
                    RULES AND REGULATIONS
                </span>
                <br><br><br>
                <div class="value">
                    <ul>
                        <?php 
                            if($flag){
                                $count = sizeof($rules);
                                for($i = 0; $i < $count; $i++){
                                    echo '<li style="font-size:20px;line-height:25px;">{$rules[$i]}</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
    </center>
    
</body>
</html>