<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dyuksha Workshops</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/cards_3.css" />
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
        location.href="login";
    }
    function getTicketWorkshop(itemId){
      location.href = "construction";
    }

</script>
<body style="background:#000000 !important;">

<?php
    include("menu.php"); // This menu php page is in Parent Directory
?>

<div align="center" style="margin-top: 70px;">
         
<?php
        include("connect.php");
        if(isset($_SESSION['user'])){
            
            $email = $userObj->email;
            // Fetches All the Workshops user did not purchase
            $query="SELECT workshopid,wname,wprice,wdesp FROM wprices WHERE workshopid NOT IN (SELECT itemId FROM purchases WHERE email='$email')" ;
            // Fetches All The workshops that user Registerd
            $query2="SELECT workshopid,wname,wprice,wdesp FROM wprices WHERE workshopid IN (SELECT itemId FROM purchases WHERE email='$email')" ;
            
            $res = mysqli_query($con,$query);
            echo '<div class="cols">';            
            while($row=mysqli_fetch_array($res)){
                echo '<div class="col" ontouchstart="this.classList.toggle("hover");">';
                echo '<div class="container">';
                echo '<div class="front" style="background-image: url(images/workshop/'.$row[0].'.jpg)">';
                echo '<div class="inner">';
                echo '<p>';
                echo $row[1];
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="back">';
                echo '<div class="inner">';
                echo '<p style="text-align:justify; font-size:20px; margin-top:-40px; font-face:roboto;">';
                echo $row[3];
                echo "<br/><br/><span>Price: {$row[2]}</span><br/><br/>";
                echo '<center>';
                echo "<button onclick=\"getTicketWorkshop('{$row[0]}')\" style='width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);'><i class='fas fa-file-signature'></i>&nbsp;&nbsp;Register Now</button>";
                echo '</center>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }

            // Now Print the Workshops that user has already registered for
            $res2= mysqli_query($con,$query2);
            while($row=mysqli_fetch_array($res2)){
                echo '<div class="col" ontouchstart="this.classList.toggle("hover");">';
                echo '<div class="container">';
                echo '<div class="front" style="background-image: url(images/workshop/'.$row[0].'.jpg)">';
                echo '<div class="inner">';
                echo '<p>';
                echo $row[1];
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="back">';
                echo '<div class="inner">';
                echo '<p style="text-align:justify; font-size:20px; margin-top:-40px; font-face:roboto;">';
                echo $row[3];
                echo "<br/><br/><span>Price: {$row[2]}</span><br/><br/>";
                echo '<center>';
                echo "<button class=\"registered\" style=\"width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);\"><i class=\"fas fa-file-contract\"></i>&nbsp;Registered</button>"; 
                echo '</center>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';                
            }
            echo '<div class="cols">';            


        }
        else{
            $query="SELECT workshopid,wname,wprice,wdesp FROM wprices";
            $res = mysqli_query($con,$query);
            echo '<div class="cols">';            

            while($row=mysqli_fetch_array($res)){
                echo '<div class="col" ontouchstart="this.classList.toggle("hover");">';
                echo '<div class="container">';
                echo '<div class="front" style="background-image: url(images/workshop/'.$row[0].'.jpg)">';
                echo '<div class="inner">';
                echo '<p>';
                echo $row[1];
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '<div class="back">';
                echo '<div class="inner">';
                echo '<p style="text-align:justify; font-size:20px; margin-top:-40px; font-face:roboto;">';
                echo $row[3];
                echo "<br/><br/><span>Price: {$row[2]}</span><br/><br/>";
                echo '<center>';
                echo "<button class=\"registered\" style=\"width: 70%; margin: 0; position: absolute; left: 50%; transform: translateX(-50%);\"><i class=\"fas fa-file-contract\"></i>&nbsp;Registered</button>"; 
                echo '</center>';
                echo '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';            

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
