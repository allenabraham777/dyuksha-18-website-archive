<?php
session_start();
include_once("connect.php");
include_once("lib/UserClass.php");
if(isset($_GET["itemId"]) && isset($_SESSION["user"])){
    $user = unserialize($_SESSION["user"]);
    $email= $user->email; 
    $itemId= mysqli_real_escape_string($con,$_GET["itemId"]);
    $check_query="SELECT email FROM dcart WHERE email='$email' AND itemID='$itemId'";
    $check_query2="SELECT email FROM purchases WHERE email='$email' AND itemID='$itemId'";

    // Check whether the id is valid or not 
    // The User must only add items that are present in eprices to their cart not from the tech events
    $check_query3="SELECT eventId FROM eprices WHERE eventId='$itemId'";

    $res=mysqli_query($con,$check_query);
    $res1=mysqli_query($con,$check_query2);
    $res2=mysqli_query($con,$check_query3);

    if(mysqli_num_rows($res) > 0){
        echo "Item Already Added";
    }
    else if(mysqli_num_rows($res1) > 0){
        echo "Item Already Purchased";
    }
    else if(mysqli_num_rows($res2) <= 0){
        echo "Not A Valid Item";
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
    echo "Some Error Occured";
}
?>