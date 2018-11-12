<?php
    if(!isset($_POST["name1"])){
	header("Location:ncnssce_reg.html");
    }    
    include("connect2.php");
    $teamid = "P". date("dmisy") . rand(111,9999);
    $title1 = mysqli_real_escape_string($con, $_POST["title1"]);
    $title2 = mysqli_real_escape_string($con, $_POST["title2"]);
    $title3 = mysqli_real_escape_string($con, $_POST["title3"]);
    $title4 = mysqli_real_escape_string($con, $_POST["title4"]);
    $phone1 = mysqli_real_escape_string($con, $_POST["phone1"]);
    $phone2 = mysqli_real_escape_string($con, $_POST["phone2"]);
    $phone3 = mysqli_real_escape_string($con, $_POST["phone3"]);
    $phone4 = mysqli_real_escape_string($con, $_POST["phone4"]);
    $name1 = mysqli_real_escape_string($con, $_POST["name1"]);
    $name2 = mysqli_real_escape_string($con, $_POST["name2"]);
    $name3 = mysqli_real_escape_string($con, $_POST["name3"]);
    $name4 = mysqli_real_escape_string($con, $_POST["name4"]);
    $email1 = mysqli_real_escape_string($con, $_POST["email1"]);
    $email2 = mysqli_real_escape_string($con, $_POST["email2"]);
    $email3 = mysqli_real_escape_string($con, $_POST["email3"]);
    $email4 = mysqli_real_escape_string($con, $_POST["email4"]);
    $design1 = mysqli_real_escape_string($con, $_POST["designation1"]);
    $design2 = mysqli_real_escape_string($con, $_POST["designation2"]);
    $design3 = mysqli_real_escape_string($con, $_POST["designation3"]); 
    $design4 = mysqli_real_escape_string($con, $_POST["designation4"]);
    $college1 = mysqli_real_escape_string($con, $_POST["college1"]);
    $college2 = mysqli_real_escape_string($con, $_POST["college2"]);
    $college3 = mysqli_real_escape_string($con, $_POST["college3"]);
    $college4 = mysqli_real_escape_string($con, $_POST["college4"]);
    $address = mysqli_real_escape_string($con, $_POST["address"]);
    $city = mysqli_real_escape_string($con, $_POST["city"]);
    $state = mysqli_real_escape_string($con, $_POST["state"]);
    $pincode = mysqli_real_escape_string($con, $_POST["pincode"]);
    $main_theme = mysqli_real_escape_string($con, $_POST["main_theme"]);
    $sub_theme = mysqli_real_escape_string($con, $_POST["sub_theme"]);
    $price ="";
    $numberofmembers = mysqli_real_escape_string($con, $_POST["number"]);

   
    $query = "INSERT INTO dconfrence VALUES('$teamid','$name1','$name2','$name3','$name4','$numberofmembers','$main_theme','$sub_theme','$title1','$title2','$title3','$title4','$email1','$email2','$email3','$email4','$design1','$design2','$design3','$design4','$college1','$college2','$college3','$college4','$phone1','$phone2','$phone3','$phone4','$address','$city','$state','$pincode','$price')";
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
                <h4>Payment Link will be forwarded to your mail <?php echo $email1 ?> soon ! Last date of paper submission is October 25th <br/> Kindly mail you paper to ncnssce@dyuksha.org</h4>
        </div>
    </div>
    </body>
</html>
