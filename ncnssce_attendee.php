<?php 
   include("connect2.php");
    if(!isset($_POST["name"])){
    	header("Location:ncnssce_attendee_reg.html");
    }
    $title = mysqli_real_escape_string($con, $_POST["title"]);
    $phone = mysqli_real_escape_string($con, $_POST["phone"]);
    $name = mysqli_real_escape_string($con, $_POST["name"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $college = mysqli_real_escape_string($con, $_POST["college"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    $city = mysqli_real_escape_string($con, $_POST["city"]);
    $state = mysqli_real_escape_string($con, $_POST["state"]);
    $pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
    $price ="";
   
    $query = "INSERT INTO dconfrence_attendee VALUES('$title','$name','$email','$college','$address','$city','$state','$pincode','$price','$phone')";
    $res = mysqli_query($con,$query);
    mysqli_close($con);
?>

<html>
    <head>
        <title>
            Registration Successful
        </title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
    </head>
    <style>
        .messagebox{
            width:300px;
            padding: 10px;
            border-radius:5px;
            box-shadow: 0px 0px 5px 1px grey;
            background-color:rgba(255, 0, 0, 0.623);
            color:white;
        }
        .messageboxx{
            margin-top:30px;
            width:300px;
            padding: 10px;
            border-radius:5px;
            box-shadow: 0px 0px 5px 1px grey;
            background-color:rgba(0, 60, 255, 0.623);
            color:white;
        }
    </style>
    <body>
        <div align="center">

        <div class="messagebox">
            <h4>Successfully Registered</h4>
        </div>
        <div class="messageboxx">
                <h4>Payment Link will be forwarded to your mail <?php echo $email1 ?> soon ! <br/> Kindly contact us at ncnssce@dyuksha.org</h4>
        </div>
    </div>
    </body>
</html>