<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/validate.js"></script>
    <script src="js/sweetalert.js"></script>
</head>
<body>
    <div class="bg-create-page" align="center">
         <div class="create-box" align="center">
            <form action="create.php" name="regform" method="post" algin="center" class="create-form" id="create-form-id">
                <img src="images/tag.png" width="60px" class="register-img">
                
                <div class="custom-input">
                        <input type="text" class="inputbox" name="name" id="field1" placeholder="Full Name" required/><br/>
                        <img src="icons/user.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="email" class="inputbox" name="email" id="field2" placeholder="Email Id" required/><br/>
                        <img src="icons/mail.png" width="20px" />
                </div>

                <div class="custom-input">
                        <input type="text" class="inputbox" name="phone" id="field3" placeholder="Phone Number" required/><br/>
                        <img src="icons/phone.png" width="20px" />
                </div>
                
                <div class="custom-input">
                        <input type="password" class="inputbox" id="password" name="password" placeholder="New Password" required/><br/>
                        <img src="icons/password.png" width="20px" />
                </div>
               
                <div class="custom-input">
                        <input type="password" class="inputbox" id="password-confirm" name="passwordconfirm" placeholder="Re-Enter Password" required/><br/>
                        <img src="icons/password.png" width="20px" />
                </div>
                <input type="submit" class="button-yellow" value="Create Account" onclick="checkPasswordField();"/>
            </form>
    
    <?php
    if(isset($_POST["name"]) && isset($_POST["email"])){
        include_once("connect.php");
        include_once("lib/extra.php");
        $name=mysqli_real_escape_string($con,$_POST["name"]);
        $phone=mysqli_real_escape_string($con,$_POST["phone"]);
        $email=mysqli_real_escape_string($con,$_POST["email"]);
        $password=md5(mysqli_real_escape_string($con,$_POST["password"]));
        $exist_query="SELECT email FROM dusers WHERE email='$email' or phone='$phone'";
        $query="INSERT INTO dusers VALUES('$name','$email','$phone','$password','NO')";

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