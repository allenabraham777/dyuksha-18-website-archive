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
    <link rel="shortcut icon" type="image/png" href="images/tag.png" />
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
            <a href="index.html"><i class="fa fa-home"></i></a>
            <a href="javascript:void(0)" onclick="openPurchases(); closeCart();"><i class="fa fa-ticket"></i></a>
            <?php
                 $code=md5($user->email);
                 echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$code}' width='52px'></img>";
            ?>
            <a href="javascript:void(0)" onclick="openCart(); closePurchases();"><i class="fa fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fa fa-sign-out"></i></a>
            </div>    
        </div>
<?php
// This will be false if no user or no items purchased or no items in the cart
$isItemsPresentInCart = false;
$isItemsPurchased = false; 


if(isset($_SESSION["user"])){
    include("connect.php");
    $user=unserialize($_SESSION["user"]);
    $email=$user->email;
    $name=$user->name;

    // Workshop in Cart
    $query1="SELECT wname,wprice FROM wprices WHERE workshopid IN (SELECT itemID FROM dcart WHERE email='$email')";
    // Events in Cart
    $query2="SELECT ename,price FROM eprices WHERE eventId IN (SELECT itemID FROM dcart WHERE email='$email')";
    
    // Events in Purchases
    $queryPurchased1="SELECT ename FROM eprices WHERE eventId IN (SELECT itemID FROM purchases WHERE email='$email')";
    // Workshop in purchases
    $queryPurchased2="SELECT wname FROM wprices WHERE workshopid IN (SELECT itemID FROM purchases WHERE email='$email')";
}
?>
        <div class="cart_items" style="display:none" id="cart"align="center">
           <i class="fa fa-shopping-cart" style="font-size:22px; color:slateblue;"></i>
            <h4 style="color:grey;"> Your Cart </h4>

            <?php
            if(isset($_SESSION['user'])){
               // Fetches the Names of Events and Workshops In The Cart 
                $res=mysqli_query($con,$query1);
                if(mysqli_num_rows($res)>0){
                    $isItemsPresentInCart=true;
                    while($row=mysqli_fetch_array($res)){
                        echo "<div class='item'>";
                        echo "<p class='left'>{$row[0]}</p> <p class='right'> Rs.{$row[1]} <a onclick='remove()'> <i class='fa fa-times'></i> </a> </p>";
                        echo "</div>";
                        
                    }
                }
                $res=mysqli_query($con,$query2);
                if(mysqli_num_rows($res)>0){
                    $isItemsPresentInCart=true;
                    while($row=mysqli_fetch_array($res)){
                        echo "<div class='item'>";
                        echo "<p class='left'>{$row[0]}</p> <p class='right'> Rs.{$row[1]} <a onclick='remove()'> <i class='fa fa-times'></i> </a> </p>";
                        echo "</div>";
                    }
                }

                if(!$isItemsPresentInCart){
                    // means its empty
                    echo "<div><br/><i class='fa fa-inbox' style='font-size:22px; color:tomato;'></i><p>Empty<p></div>";
                }
                else{
                   echo "<button onclick='paynow();'>Pay Now</button>";
                }
            }
            
            ?>
           
            
            
        </div>

        <div class="cart_items" id="purchases" style="display:none" align="center">
           <i class="fa fa-money" style="font-size:22px; color:slateblue;"></i>
            <h4 style="color:grey;"> Your Purchases </h4>

            <?php
            if(isset($_SESSION["user"])){
                 // Fetch the Names of Workshops and Events In Purchases
                $res=mysqli_query($con,$queryPurchased1);
                if(mysqli_num_rows($res)>0){
                    $isItemsPurchased=true;
                    while($row=mysqli_fetch_array($res)){
                        echo "<div class='item'>",
                        "<p >{$row[0]} </p>  </p>", 
                        "</div>";
                    }
                }
                $res=mysqli_query($con,$queryPurchased2);
                if(mysqli_num_rows($res)>0){
                    $isItemsPurchased=true;
                    while($row=mysqli_fetch_array($res)){
                        echo "<div class='item'>",
                        "<p >{$row[0]} </p>  </p>", 
                        "</div>";
                    }
                }
                if(!$isItemsPurchased){
                    // means empty
                    echo "<div><br/><i class='fa fa-inbox' style='font-size:22px; color:tomato;'></i><p>Empty<p></div>";
                }
            }
            ?>
            <button onclick='closePurchases();'>Close</button>
        </div>
    </div>
 
  <?php
    mysqli_close($con);
  ?>
  
</body>
<script>
    function paynow(){
        location.href="epayment.php";
    }
    function closeCart(){
        document.getElementById("cart").style.display="none";
    }
    function closePurchases(){
        document.getElementById("purchases").style.display="none";
    }
    function openPurchases(){
        document.getElementById("purchases").style.display="block";
    }
    function openCart(){
        document.getElementById("cart").style.display="block";
    }
</script>
</html>
