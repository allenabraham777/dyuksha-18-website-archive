<?php
 session_start();
 //session_destroy();
 if(isset($_SESSION["user"])){
     header("Location:profile");
     exit();
 }
 if(isset($_POST["email"]) && isset($_POST["password"])){
    include_once("connect.php");
    include_once("lib/UserClass.php");
    $email=mysqli_real_escape_string($con,$_POST["email"]);
    $password=md5(mysqli_real_escape_string($con,$_POST["password"]));
    $query="SELECT * FROM dusers WHERE email='$email' AND password='$password'";
    
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res) > 0){
        $row=mysqli_fetch_array($res);
        $name=$row[0];
        $phone=$row[2];
        $active=$row[4];
        if(strcmp($active,"YES")==0){
            $userObj = new UserClass($name,$email,$phone);
            var_dump($userObj);      
            $_SESSION['user']=serialize($userObj);
            header("Location:profile");
            exit();
        }
    }
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menuitems.css" />
    <link rel="shortcut icon" type="image/png" media="screen" href="images/logo.png" />
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="js/create.js"></script>
</head>
<body>
    <header>
        <a href="index"><img class="logo" src="images/navbar_logo.png"></a>
        <span class="user_id" id="user_id" onclick="open_menu()">
            <i class="fas fa-user"></i> Guest <i class="fas fa-sort-down"></i>
            <!-- PHP SCRIPT -->
        </span>
        <button class="menu-button" onclick="open_menu()"><i class="fas fa-bars"></i></button>
        <div class="user_menu menu-collapse" id="user_menu">
            <ul>
                <li><a href="index"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
                <li><a href="events"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Events</a></li>
                <li><a href="workshop"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Workshops</a></li>
                <li><a href="informals"><i class="fas fa-gamepad"></i>&nbsp;&nbsp;Informals</a></li>
            </ul>
        </div>
    </header>
    <div class="bg-create-page" align="center" style="margin-top:60px;">
     <?php


    if(isset($_POST["email"]) && isset($_POST["password"]))
     {
         if(isset($active)){
            if(strcmp($active,"YES") != 0){
                echo "<div class='error_msg'> Email Id Not Comfirmed  </div>";   
            }
            else{
                echo "<div class='error_msg'> Invalid Username or Password </div>";
            }
         }
         else{
            echo "<div class='error_msg'> Invalid Username or Password </div>";
         }
     }
     // Display Messages
     if(isset($_GET["m"])){
         $message=$_GET["m"];
         
         if($message==404){
            echo "<div class='error_msg'>  Email Verification Failed </div>";
         }
         else if($message==200){
            echo "<div class='error_msg'> Email Verified Successfully  </div>";
         }

     }
     ?>   
    <div class="login-box" align="center">
            <form action="login" method="post" algin="center" class="create-form">
            <a href="home"><img src="images/logo.png" class="login-image" width="58px"/></a>
                <input type="email" class="inputbox" name="email" placeholder="Email Id" required/><br/>
                <input type="password" class="inputbox" name="password" placeholder="Password" required/><br/>
                <input type="submit" class="button-tomato" value="Login" /></br>
                <a href="/reset" class="">Forgot Password</a>
                <a href="create.php" class="">Create an Account</a>
            </form>
    </div>
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
</script>
</body>
</html>