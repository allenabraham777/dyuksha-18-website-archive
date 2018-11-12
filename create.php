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
    <link rel="stylesheet" type="text/css" media="screen" href="css/college.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/menu7.css" />
    <link rel="icon" href="images/logo.png" type="image/png" />
    <script src="js/menu7.js" type="text/javascript"></script>
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

<?php include("menu7.php");?>




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
                        <!--<input type="text" class="inputbox" id="college" name="college" placeholder="College Name" required/><br/>
                        -->
                        <textbox></textbox>
                        <?php include("colleges.php"); ?>
                        <br/>
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
		
		  <div class="custom-input">
                        <input type="text" class="inputbox" name="referral" id="code" placeholder="Referral Code (Optional)"/><br/>
                        <img src="images/mail.png" width="20px" />
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
        $referral=mysqli_real_escape_string($con,$_POST["referral"]);
        $password=md5(mysqli_real_escape_string($con,$_POST["password"]));
        // This is a  New Line 
        $college = mysqli_real_escape_string($con,$_POST["college"]);
        $exist_query="SELECT email FROM dusers WHERE email='$email' or phone='$phone'";
        $query="INSERT INTO dusers VALUES('$name','$email','$phone','$password','YES','$college')";

        // Creating Auth Key
        $auth_key = create_auth_key($email);

        $confirm_link ="";
        // Create Function For Sending Mail
        // $mail_output = mail($email,"Email Confirmation","Please Click the Link to Confirm the Account");
        
        $query_nonactiveusers="INSERT INTO nonactiveusers VALUES('$email','$auth_key')";
        $query_referral="INSERT INTO referrals VALUES('$email','$referral')";
        $res=mysqli_query($con,$exist_query);
        if(mysqli_num_rows($res) > 0){
            echo "<script> swal('','Account Already Exist', 'info');</script>";
        }
        else{
            // ADDING TO USERS TABLE
            $res=mysqli_query($con,$query);
            // ADD TO REFERRAL TABLE
            if(strcmp($referral,"") != 0)
	    {
	    	$res3 = mysqli_query($con,$query_referral);
            }
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