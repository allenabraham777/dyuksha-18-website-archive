<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dyuksha Workshops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/workshop.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menuitems.css" />
    <link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">
    <script src="main.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
</head>
<script>
    var workshoplist = ["w100","w101","w102","w103","w104","w105"];
    var username="<?php if(isset($_SESSION['user'])){ echo 'logged';}else{echo ' ';} ?>";
    <?php 

        include("lib/UserClass.php");
        if(isset($_SESSION['user'])){
            $userObj = unserialize($_SESSION["user"]);
            $name = $userObj->name;
        }
        else{
            $name = "Guest";
        }
       
    ?>
   
    function gotoLoginPage(){
        location.href="http://localhost/dyuksha.org/login.php";
    }
    function getTicketWorkshop(itemId){
        var link="wpayments.php?wid="+itemId+"&key=07989897958858";
        if(username.localeCompare("logged") == 0){
            location.href=link;
        }
        else{
            gotoLoginPage();
        }
    }

</script>
<body>

<header>
    <img class="logo" src="images/navbar_logo.png">
    <span class="user_id" id="user_id" onclick="open_menu()">
        <i class="fas fa-user"></i> <?php echo $name ?> <i class="fas fa-sort-down"></i>
        <!-- PHP SCRIPT -->
    </span>
    <button class="menu-button" onclick="open_menu()"><i class="fas fa-bars"></i></button>
    <span class="filter">Filter <i class="fas fa-filter"></i></span>
    <div class="user_menu menu-collapse" id="user_menu">
        <ul>
            <li><a href="index"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li><a href="profile"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Profile</a></li>
            <li><a href="events"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Events</a></li>
            <li><a href="workshop"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Workshops</a></li>
            <li><a href="informals"><i class="fas fa-gamepad"></i>&nbsp;&nbsp;Informals</a></li>
            <li><a href="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>
        </ul>
    </div>
</header>


<div align="center" style="margin-top: 70px;">
         
<?php
        include("connect.php");
        if(isset($_SESSION['user'])){
            
            $email = $userObj->email;
            // Fetches All the Workshops user did not purchase
            $query="SELECT workshopid,wname,wprice FROM wprices WHERE workshopid NOT IN (SELECT itemId FROM purchases WHERE email='$email')" ;
            // Fetches All The workshops that user Registerd
            $query2="SELECT workshopid,wname,wprice FROM wprices WHERE workshopid IN (SELECT itemId FROM purchases WHERE email='$email')" ;
            
            $res = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($res)){
                echo  "<div class='workshop-card-1'>";
                echo  "<img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg' style='width:100%; margin-bottom:0px;'>";
                echo "<h4>{$row[1]}</h4>";
                echo "<p>";
                echo "Some Event Decription Will Be Shown Here as a paragraph of text. this is a sample";       
                echo "<br/><br/>";
                echo "<span>Price : Rs.{$row[2]}</span>";
                echo "<br/><br/>";       
                echo "<button onclick=\"getTicketWorkshop('{$row[0]}')\" style='width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);'><i class='fas fa-file-signature'></i>&nbsp;&nbsp;Register Now</button>";   
                echo "</p>";
                echo "</div>";
            }

            // Now Print the Workshops that user has already registered for
            $res2= mysqli_query($con,$query2);
            while($row=mysqli_fetch_array($res2)){
                echo "<div class=\"workshop-card-1\">";
                echo "<img src=\"https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg\" style=\"width:100%; margin-bottom:0px;\">";
                echo "<h4>{$row[1]}</h4>";
                echo "<p> Some Event Decription Will Be Shown Here as a paragraph of text. this is a sample";
                echo "<br/><br/><span>Price : Rs.{$row[2]}</span><br/> <br/>";
                echo "<button class=\"registered\" style=\"width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);\"><i class=\"fas fa-file-contract\"></i>&nbsp;Registered</button>"; 
                echo "</p></div>";                
            }

        }
        else{
            $query="SELECT workshopid,wname,wprice FROM wprices";
            $res = mysqli_query($con,$query);
            while($row=mysqli_fetch_array($res)){
                echo "<div class='workshop-card-1'>";
                echo "<img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sample68.jpg' style='width:100%; margin-bottom:0px;'>";
                echo "<h4>{$row[1]}</h4>";
                echo "<p>";
                echo "Some Event Decription Will Be Shown Here as a paragraph of text. this is a sample";       
                echo "<br/><br/>";
                echo "<span>Price : {$row[2]}</span>";
                echo "<br/><br/>";       
                echo "<button onclick=\"getTicketWorkshop('{$row[0]}')\" style='width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);'><i class='fas fa-file-signature'></i>&nbsp;&nbsp;Register Now</button>";   
                echo "</p>";
                echo "</div>";
            }
        }
        
?>
    

</div>

<script type="text/javascript">
    function open_menu(){
        if(document.getElementById("user_menu").classList.contains("menu-collapse")){
           document.getElementById("user_menu").classList.add("menu-open");
           document.getElementById("user_menu").classList.remove("menu-collapse");
        }
        else{
           document.getElementById("user_menu").classList.add("menu-collapse");
           document.getElementById("user_menu").classList.remove("menu-open");
       }
    }
</script>
</body>
</html>
