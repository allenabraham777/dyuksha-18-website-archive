<?php
 $redir="login.php";
 if(isset($_GET["redir"])){
     $redir=$_GET["redir"];
 }
 session_start();
 session_destroy();
 header("Location:$redir");
?>