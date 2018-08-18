<?php
session_start();
 //session_destroy();
 if(isset($_SESSION["user"])){
     header("Location:profile");
     exit();
 }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menuitems.css" />
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/sweetalert.js"></script>
    <script>
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
</head>
<body>

<header>
    <a href="index"><img class="logo" src="images/navbar_logo.png"></a>
    <span class="user_id" id="user_id" onclick="open_menu()">
        <i class="fas fa-user"></i> Guest <i class="fas fa-sort-down"></i>
        <!-- PHP SCRIPT -->
    </span>
    <button class="menu-button" onclick="open_menu()"><i class="fas fa-bars"></i></button>
    <div class="user_menu menu-collapse" id="user_menu">
        <ul>
            <li><a href="index"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li><a href="events"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Events</a></li>
            <li><a href="workshop"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Workshops</a></li>
            <li><a href="informals"><i class="fas fa-gamepad"></i>&nbsp;&nbsp;Informals</a></li>
        </ul>
    </div>
</header>




    <div class="bg-create-page" align="center" style="margin-top:60px;">
         <div class="create-box" align="center">
            <form action="create.php" name="regform" method="post" algin="center" class="create-form" id="create-form-id">
                <a href="login"><img src="images/tag.png" width="60px" class="register-img"></a>
                
                <div class="custom-input">
                        <input type="text" class="inputbox" name="name" id="field1" placeholder="Full Name" required/><br/>
                        <img src="images/user.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="email" class="inputbox" name="email" id="field2" placeholder="Email Id" required/><br/>
                        <img src="images/mail.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="text" class="inputbox" name="phone" id="field3" placeholder="Phone Number" required/><br/>
                        <img src="images/phonex.png" width="20px" />
                </div>
                
                <div class="custom-input">
                        <input type="text" class="inputbox" id="college" name="college" placeholder="College Name" required/><br/>
                        <img src="images/password.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="password" class="inputbox" id="password" name="password" placeholder="New Password" required/><br/>
                        <img src="images/password.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="password" class="inputbox" id="password-confirm" name="passwordconfirm" placeholder="Re-Enter Password" required/><br/>
                        <img src="images/password.png" width="20px" />
                </div>
                <input type="submit" class="button-yellow" value="Create Account" onclick="checkPasswordField();"/>
                or <a href="login">Login</a> to Dyuksha          

            </form>
    
    <?php
    if(isset($_POST["name"]) && isset($_POST["email"])){
        include_once("connect.php");
        include_once("lib/extra.php");
        $name=mysqli_real_escape_string($con,$_POST["name"]);
        $phone=mysqli_real_escape_string($con,$_POST["phone"]);
        $email=mysqli_real_escape_string($con,$_POST["email"]);
        $password=md5(mysqli_real_escape_string($con,$_POST["password"]));
        // This is a  New Line 
        $college = mysqli_real_escape_string($con,$_POST["college"]);
        $exist_query="SELECT email FROM dusers WHERE email='$email' or phone='$phone'";
        $query="INSERT INTO dusers VALUES('$name','$email','$phone','$password','NO','$college')";

        // Creating Auth Key
        $auth_key = create_auth_key($email);

        $confirm_link ="";
        // Create Function For Sending Mail
        // $mail_output = mail($email,"Email Confirmation","Please Click the Link to Confirm the Account");
        
        $query_nonactiveusers="INSERT INTO nonactiveusers VALUES('$email','$auth_key')";
        $res=mysqli_query($con,$exist_query);
        if(mysqli_num_rows($res) > 0){
            echo "<script> swal('','Account Already Exist', 'info');</script>";
        }
        else{
            // ADDING TO USERS TABLE
            $res=mysqli_query($con,$query);
            // ADDING TO NON CONFIRMED TABLE
            $res2=mysqli_query($con,$query_nonactiveusers);

            if($res && $res2){
                echo "<script> swal('','Registration Successful', 'success'); </script>";
            }
            else
            {
            echo "<script> swal('','Something Went Wrong', 'Error'); </script>";
            }
        }
    
    }
?>

         </div>
    </div>
</body>
</html>