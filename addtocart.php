<?php
session_start();
include_once("connect.php");
include_once("lib/UserClass.php");
if(isset($_GET["itemId"]) && isset($_SESSION["user"])){
    $user = unserialize($_SESSION["user"]);
    $email= $user->email; 
    $itemId= mysqli_real_escape_string($con,$_GET["itemId"]);
    $check_query="SELECT email FROM dcart WHERE email='$email' AND itemID='$itemId'";
    $res=mysqli_query($con,$check_query);
    if(mysqli_num_rows($res) > 0){
        echo "Item Already Added";
    }
    else{
        $query="INSERT INTO dcart VALUES('$email','$itemId')";
        $res=mysqli_query($con,$query);
        if($res){
            echo "Added to Cart Successfully";
        }    
        else{
            echo "Adding to Cart Failed";
        }
    }   
    mysqli_close($con);
}
else{
    echo "test";
}
?>