<?php session_start(); ?>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informals</title>
    <link rel="stylesheet" href="css/informals.css">
    <link rel="stylesheet" href="css/menuitems.css">
    <link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">
    <script src="main.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
</head>
<body>
<?php include('menu.php');?>
    <div class="informal-container" style="margin-top: 70px;" align="center">
        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/cs.png">
            </div>
        </div>

        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/nfsmw.png">
            </div>
        </div>
        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/pubg.png">
            </div>
        </div>

        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/fifa.png">
            </div>
        </div>
        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/bmtn.png" style="margin-bottom: 50px; width: 120%;">
            </div>
        </div>
        
        <div class="informal-card">
            <div class="informal-card-content">
                <img src="images/photo.png" style="margin-bottom: 50px;">
            </div>
        </div>

    </div>

    <script type="text/javascript">
        function open_menu(){
            if(document.getElementById("user_menu").classList.contains("menu-collapse")){
               document.getElementById("user_menu").classList.add("menu-open");
               document.getElementById("user_menu").classList.remove("menu-collapse");
               document.getElementById("user_id").classList.add("make-rectangle");
            }
            else{
               document.getElementById("user_menu").classList.add("menu-collapse");
               document.getElementById("user_id").classList.remove("make-rectangle");
               document.getElementById("user_menu").classList.remove("menu-open");
           }
        }
    </script>
</body>
</html>