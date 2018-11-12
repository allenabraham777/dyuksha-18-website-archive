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
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/profile.css" />
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    
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
            <a href="events"><i class="fas fa-calendar-alt"></i></a>
            <a href="javascript:void(0)" onclick="openPurchases(); closeCart();"><i class="fas fa-receipt"></i></a>
            <?php
                 $code=$user->email;//md5($user->email);
                 echo "<img src='https://api.qrserver.com/v1/create-qr-code/?size=150x150&data={$code}' width='52px'></img>";
            ?>
            <a href="workshop"><i class="fa fa-briefcase"></i></a>
            <a href="javascript:void(0)" onclick="openCart(); closePurchases();"><i class="fa fa-shopping-cart"></i></a>
            <a href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
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

    // Workshop in Cart No Need Workshops wont be added to Cart
    // $query1="SELECT wname,wprice FROM wprices WHERE workshopid IN (SELECT itemID FROM dcart WHERE email='$email')";
    // Events in Cart
    $query2="SELECT ename,price,eventId FROM eprices WHERE eventId IN (SELECT itemID FROM dcart WHERE email='$email')";
    
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
               // Fetches the Names of Events In The Cart and Workshops wont be added to Cart 
                $res=mysqli_query($con,$query2);
                if(mysqli_num_rows($res)>0){
                    $isItemsPresentInCart=true;
                    while($row=mysqli_fetch_array($res)){
                        echo "<div class='item'>";
                        echo "<p class='left'>{$row[0]}</p> <p class='right'> Rs.{$row[1]} <a onclick=\"removeFromCart('{$row[2]}')\"> <i class='fa fa-times' style='margin-left:5px;color:red;'></i> </a> </p>";
                        echo "</div>";
                    }
                }

                if(!$isItemsPresentInCart){
                    // means its empty
                    echo "<div><br/><i class='fas fa-box-open' style='font-size:22px; color:tomato;'></i><p>Empty<p></div>";
                }
                else{
                   echo "<button onclick='paynow();'> <i class='far fa-credit-card' style='color:white;'></i> Pay Now</button>";
                }
            }
            
            ?>
           
            
            
        </div>

        <div class="cart_items" id="purchases" style="display:none" align="center">
           <i class="fas fa-receipt" style="font-size:22px; color:slateblue;"></i>
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
                    echo "<div><br/><i class='fas fa-box-open' style='font-size:22px; color:tomato;'></i><p>Empty<p></div>";
                }
            }
            ?>
            
            <button style="margin-top:6px;" onclick='closePurchases();'><i class='fas fa-times'></i> Close</button>
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
    function removeFromCart(itemId){
        var link = "removeFromCart.php?itemId="+itemId;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange=function(){
            if(this.status==200 && this.readyState == 4){
                alert(this.responseText);
                location.reload(true);
            }
        };
        xhttp.open("GET",link,true);
        xhttp.send();
    }

    // By Default Display Cart
    openCart();
</script>
</html>
