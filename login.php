<?php
 session_start();
 //session_destroy();
 if(isset($_SESSION["user"])){
     header("Location:profile.php");
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
            header("Location:profile.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="shortcut icon" type="image/png" media="screen" href="images/logo.png" />
    <script src="js/create.js"></script>
</head>
<body>
    <div class="bg-create-page" align="center">
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
            <form action="login.php" method="post" algin="center" class="create-form">
            <img src="images/logo.png" class="login-image" width="58px"/>
                <input type="email" class="inputbox" name="email" placeholder="Email Id" required/><br/>
                <input type="password" class="inputbox" name="password" placeholder="Password" required/><br/>
                <input type="submit" class="button-tomato" value="Login" /></br>
                <a href="/reset" class="">Forgot Password</a>
                <a href="create.php" class="">Create an Account</a>
            </form>          
    </div>
    </div>
</body>
</html>