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
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <a href="logout.php" >Logout</a>
</body>
</html>