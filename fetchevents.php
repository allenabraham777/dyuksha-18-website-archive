<?php
// This php file fetches id of each items in cart for a user who is logged in 
// If No one is logged in or Nothing in Cart Returns EMPTY ARRAY      
header("Content-type","application/json");
session_start();
include_once("connect.php");
include_once("lib/UserClass.php");
class EventsInCart{
  public $name="";
  public $status=404; // NO USER 
  public $events_in_cart=array();

  function set($n,$s,$e)
  {
    $this->name=$n;
    $this->status=$s;
    $this->events_in_cart=$e;
  }
}

$events_in_cart=array();

// Checks Whether User is Logged In
if(isset($_SESSION["user"])){
    $user=unserialize($_SESSION["user"]);
    $email=$user->email;
    $name=$user->name;

    $query="SELECT * FROM dcart WHERE email='$email'";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)>0){
        while($row=mysqli_fetch_array($res)){
            array_push($events_in_cart,$row[1]);
        }
    }
    $obj = new EventsInCart();
    $obj->set($name,200,$events_in_cart);
    echo json_encode($obj);

}
else{ // no user logged in
    $obj = new EventsInCart();
    $obj->set("",404,$events_in_cart);
    echo json_encode($obj);
}
?>