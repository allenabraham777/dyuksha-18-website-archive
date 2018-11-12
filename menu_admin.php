<?php
session_start();
if(!isset($_SESSION["user_admin"])){
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.png" type="image/png" />
    <title>Admin Menu</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <center>
        <div style="width:300px; margin-top:100px; box-shadow: 5px 5px 20px;padding:10px;border-radius:20px;">
            <div class="form-group">
                <img src="images/head.png" style="width:100px;" alt="logo">
            </div>
            <div class="form-group">
                <label for="">Menu</label>
            </div>
            <div class="form-group">
                <button onclick="location.href='userlist.php';" class="form-control btn btn-success">Users</button>
            </div>
            <div class="form-group">
                <button onclick="location.href='techlist.php';" class="form-control btn btn-primary">Technical</button>
            </div>
            <div class="form-group">
                <button onclick="location.href='worklist.php';" class="form-control btn btn-info">Workshop</button>
            </div>
            <div class="form-group">
                <button onclick="location.href='reflist.php';" style="color:white; background:#333333; "class="form-control btn">Referrals</button>
            </div>
            <div class="form-group">
                <button onclick="location.href='regreflist.php';" style="color:white; background:#000000; "class="form-control btn">Registered Referrals</button>
            </div>
            <div class="form-group">
                <button onclick="location.href='logout_admin.php';" class="form-control btn btn-danger">Logout</button>
            </div>
        </div>
    </center>
    
</body>
</html>