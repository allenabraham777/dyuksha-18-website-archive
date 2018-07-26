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
<header>
    <img class="logo" src="images/navbar_logo.png">
    <span class="user_id" id="user_id" onclick="open_menu()">
        <i class="fas fa-user"></i> <?php echo $name ?> <i class="fas fa-sort-down"></i>
        <!-- PHP SCRIPT -->
    </span>
    <button class="menu-button" onclick="open_menu()"><i class="fas fa-bars"></i></button>
    <span class="filter">Filter <i class="fas fa-filter"></i></span>
    <div class="user_menu menu-collapse" id="user_menu">
        <ul>
            <li><a href="index"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li><a href="profile"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Profile</a></li>
            <li><a href="events"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Events</a></li>
            <li><a href=""><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Workshops</a></li>
            <li><a href="informals"><i class="fas fa-gamepad"></i>&nbsp;&nbsp;Informals</a></li>
            <li><a href="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>
</header> 
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