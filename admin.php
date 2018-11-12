<?php
session_start();
if(isset($_SESSION["user_admin"])){
    header("Location: menu_admin");
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
    <title>Dyuksha Admin</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <center>
        <div style="width:300px;box-shadow:5px 5px 20px;border-radius:10px;margin-top:150px;padding:10px;">
            <form action="includes/ad.log.php" method="post">
            <div class="form-group">
            <a href="index">
                <img src="images/head.png" alt="Logo" style="width:100px;">
            </a>
            </div>
                <div class="form-group">
                    <label for="">Admin Panel</label>
                </div>
                <div class="form-group">
                    <input type="text" name="user" id="user" class="form-control" placeholder="Username"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group">
                <button type="submit" class="form-control btn btn-primary">
                    LOGIN
                </button>
                </div>
            </form>
        </div>
    </center>
</body>
</html>