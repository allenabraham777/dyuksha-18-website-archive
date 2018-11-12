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
            $_SESSION['userloggedin']=$name;
            $_SESSION['user']=serialize($userObj);
            if(isset($_GET["r"])){
                $message=$_GET["r"];
                
                if($message==0){
                    header("Location:registration22");
                    exit();
                }
                else {
                    header("Location:profile");
                    exit();
                }
    
            }
            
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
    <meta name="viewport" content="width=device-width,if(isset($_GET["i"])){ initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu7.css" />
    <script src="js/menu7.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/png" media="screen" href="images/logo.png" />
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="js/create.js"></script>
</head>
<body>
    <?php include("menu7.php");?>
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
     
     ?>   
    <div class="login-box" align="center">
    <?php
        if(isset($_GET["r"])){
            $message=$_GET["r"];
            
            if($message==1){
            echo '<form action="login22?r=1" method="post" algin="center" class="create-form">';
            }
            else if($message==0){
            echo '<form action="login22?r=0" method="post" algin="center" class="create-form">';
            }
            else {
            echo '<form action="login22" method="post" algin="center" class="create-form">';
            }

        }
    ?>
                <a href="home"><img src="images/logo.png" class="login-image" width="58px"/></a>
                <input type="email" class="inputbox" name="email" placeholder="Email Id" required/><br/>
                <input type="password" class="inputbox" name="password" placeholder="Password" required/><br/>
                <input type="submit" class="button-tomato" value="Login" /></br>
                <!-- <a href="/reset" class="">Forgot Password</a> -->
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
