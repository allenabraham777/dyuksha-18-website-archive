<?php
session_start();
include_once("connect.php");
include_once("lib/UserClass.php");
if(isset($_GET["itemId"]) && isset($_SESSION["user"])){
    $user = unserialize($_SESSION["user"]);
    $email= $user->email; 
    $itemId= mysqli_real_escape_string($con,$_GET["itemId"]);
    $remove_query="DELETE FROM dcart WHERE email='$email' AND itemID='$itemId'";
    
    
    $res=mysqli_query($con,$remove_query);
    if($res){
        echo "Item Removed Successfully Page Will be Refreshed! ";
    }
    else {
        echo "Error While Removing";
    }
    mysqli_close($con);
}
else{
    echo "Some Error Occured";
}
?>