<?php
    //session_destroy();
    if(isset($_SESSION["user_admin"])){
        header("Location:../menu_admin.php");
        exit();
    }
    if(isset($_POST["user"]) && isset($_POST["password"]))
    {
        $user=$_POST["user"];
        $password=$_POST["password"];
        if($user=="dyuksha_admin" && $password=="gamayareloaded")
        {
            session_start();
            $_SESSION["user_admin"]=$user;
            header("Location: ../menu_admin.php");
            exit();
        }
        else
        {
            header("Location: ../admin");
            exit();
        }
    }
?>