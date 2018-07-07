<?php
 include_once("lib/UserClass.php");
 session_start();
 if(!isset($_SESSION["user"]))
 {
    session_destroy();
    header("Location:login.php");
    exit();
 }
 else{
     $user=unserialize($_SESSION["user"]);
 }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $user->name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/profile.css" />
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
    <div class="profile-bg" align="center">
        <div class="profile-cover">
        </div>
        <div class="profile-desp">
            <img src="images/tag.png" width="64px" class="profile-avatar"></img>
            
            <p><?php echo $user->name?></p>
            <br/>
            <div class="menu-items">
            <a href=""><i class="fa fa-home"></i></a>
            <a href=""><i class="fa fa-calendar"></i></a>
            <?php
                 $code=md5($user->email);
                 echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$code}' width='52px'></img>";
            ?>
            <a href=""><i class="fa fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fa fa-sign-out"></i></a>
            </div>
            
        </div>
    </div>
 
  
  
</body>
</html>
