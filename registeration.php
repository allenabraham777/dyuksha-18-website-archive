<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Events Registration</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/cards.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menuitems.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">
    <link href="css/dialog.css" rel="stylesheet"/>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
</head>

<script>
 
    //  0 1 2 3 4 5 6-all dept 
    var all_events=["ETCE01","ETCE02","ETCE03","ETCE04","ETIC05","ETIC06","ETIC07","ETIC08","ETIC09","ETCS10","ETCS11","ETCS12","ETCS13","ETCS14","ETME15","ETME16","ETME17","ETME18","ETME19","ETEC20","ETEC21","ETEC22","ETEC23","ETEE24","ETEE25","ETEE26","ETEE27","ETEE28"];
    var ce_events=["ETCE01","ETCE02","ETCE03","ETCE04"];
    var ic_events=["ETIC05","ETIC06","ETIC07","ETIC08","ETIC09"];
    var cs_events=["ETCS10","ETCS11","ETCS12","ETCS13","ETCS14"];
    var me_events=["ETME15","ETME16","ETME17","ETME18","ETME19"];
    var ec_events=["ETEC20","ETEC21","ETEC22","ETEC23"];
    var ee_events=["ETEE24","ETEE25","ETEE26","ETEE27","ETEE28"];

   
    var username="<?php if(isset($_SESSION['user'])){ echo 'logged';}else{echo ' ';} ?>";
    <?php 

        include("lib/UserClass.php");
        if(isset($_SESSION['user'])){
            $userObj = unserialize($_SESSION["user"]);
            $name = $userObj->name;
        }
        else{
            $name = "Guest";
        }
       
    ?>
   
    function gotoLoginPage(){
        location.href="login";
    }
    function addToCart(itemId){
        var link="addtocart.php?itemId="+itemId;
        if(username.localeCompare("logged") == 0){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.status==200 && this.readyState==4){
                    alert(this.responseText);
                }
            };
            xhttp.open("GET",link,true);
            xhttp.send();
        }
        else{
            gotoLoginPage();
        }
    }
    
</script>
<body onload="">



<div class="dialog-container">
        <div class="dialog">
            <button class="dialog-close-button" onclick="openOrCloseDialog();"><i class="fas fa-times"></i></button>
            <div class="dialog-radio-container-parent">
                <label class="dialog-radio-container">All
                        <input type="radio" value="6" name="dialog-radio" checked="checked" id="all" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Computer Science
                        <input type="radio" value="2" name="dialog-radio" id="cse" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Mechanical
                        <input type="radio" value="3" name="dialog-radio" id="me" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Electrical
                        <input type="radio" value="5" name="dialog-radio" id="eee" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Electronics
                        <input type="radio" value="4" name="dialog-radio" id="ece" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Civil
                        <input type="radio" value="0" name="dialog-radio" id="ce" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    
                    <label class="dialog-radio-container">Instrumentation Control
                        <input type="radio" value="1" name="dialog-radio" id="ic" class="dialog-radio">
                        <span class="dialog-radio-checkmark"></span>
                    </label>
                    <button class="dialog-filter-button" onclick="s();">Filter</button>
            </div>      
        </div>
    </div>

<?php
    // Menu as a Include File
    include("menu.php");
?>

<div align="center" style="margin-top: 70px;">

    <?php
            include("connect.php");
        
         //   $query="SELECT eventId,ename,price FROM eprices WHERE eventId NOT IN (SELECT itemID FROM dcart WHERE email='$email') AND eventId  NOT IN (SELECT itemID FROM purchases WHERE email='$email')  ";
            $query="SELECT eventId,ename,price,desp FROM eprices";
            $res = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($res)){
       
                echo "<div class='events-card-1 {$row[0]}'>";
                echo "<img src=\"https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg\" style=\"width:100%; margin-bottom:0px;\">";
                echo "<h4>{$row[1]}</h4>";
                echo "<p>{$row[3]} <br/><br/>";
                echo "<span>Price : Rs.{$row[2]}</span>";
                echo "<br/><br/>";
                echo "<button onclick=\"addToCart('{$row[0]}');\" style=\"position: absolute; left: 10%;\"><i class=\"fas fa-cart-plus\"> </i></button>"; 
                echo "<button onclick=\"readMore('{$row[0]}');\" style=\"position: absolute; right: 10%;\"><i class=\"fas fa-eye\"></i></button>";
                echo "</p></div>";
          }

          mysqli_close($con);

    ?>
   
     

    
</div>

<script type="text/javascript">
    function open_menu(){
        if(document.getElementById("user_menu").classList.contains("menu-collapse")){
           document.getElementById("user_menu").classList.add("menu-open");
           document.getElementById("user_menu").classList.remove("menu-collapse");
        }
        else{
           document.getElementById("user_menu").classList.add("menu-collapse");
           document.getElementById("user_menu").classList.remove("menu-open");
       }
    }

    // Filter Function No Longer Required
    
</script>
</body>
</html>
