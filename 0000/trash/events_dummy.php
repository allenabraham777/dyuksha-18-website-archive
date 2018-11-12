<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Events</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/cards.css" />
    <script src="main.js"></script>
</head>
<script>
    var username="<?php session_start(); if(isset($_SESSION['user'])){ echo 'logged';}else{echo ' ';} ?>";
    function gotoLoginPage(){
        location.href="http://localhost/dyuksha.org/login.php";
    }
    function addToCart(itemId){
        var link="addtocart.php?itemId="+itemId;
        if(username.localeCompare("logged") == 0){
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange=function(){
                if(this.status==200 && this.readyState==4){
                    alert(this.responseText);
                    alert(username);
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
<body >
 
    <div align="center">
    <?php
        include("connect.php");
        $query="SELECT eventId,ename,price FROM eprices";
        $res = mysqli_query($con,$query);
        while($row=mysqli_fetch_array($res)){
            echo "<div class='events_card'>";
            echo "<img src=\"https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg\"/>";
            echo "<h4>{$row[1]}</h4>";
            echo "<p>Some Event Decription Will Be Shown Here as a paragraph of text. this is a sample <br/> Price : Rs.{$row[2]} <br/> <button onclick=\"addToCart('{$row[0]}');\"> Add to Card</button> <button onclick=\"readMoreAbout('{$row[0]}');\"> ReadMore</button></p>";
            echo "</div>";
        }

    ?>
   
</div>
</body>
</html>
