<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/create.css" />
    <script src="js/custom.js"></script>
</head>
<body>
    <div class="bg-create-page">
         <div class="create-box" align="center">
             <h3>Create Account</h3><br/>
            <form action="" method="post" algin="center" class="create-form" id="create-form-id">
                <input type="text" class="inputbox" name="name" placeholder="Full Name" required/><br/>
                <input type="email" class="inputbox" name="email" placeholder="Email Id" required/><br/>
                <input type="text" class="inputbox" name="phone" placeholder="Phone Number" required/><br/>
                <input type="password" class="inputbox" id="password" name="password" placeholder="Password" required/><br/>
                <input type="password" class="inputbox" id="password-confirm" name="password-confirm" placeholder="Re-Enter Password" required/><br/>
                <input type="button" class="button-yellow" value="Create Account" onclick="checkPasswordField();"/>
            </form>
         </div>
    </div>
</body>
</html>