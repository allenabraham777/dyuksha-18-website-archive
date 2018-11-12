<?php
 /*
    100 : PURCHASED_NOT_ATTENDED
    101 : PURCHASED_ATTENDED
    102 : NOT_PURCHASED
    103 : ERROR_UNKNOWN
 */

$CON = mysqli_connect("localhost","root","fa42eb599c9dc9b80e4088ccbae803af95da1595c5849301","dyuksha_db");

 if(!isset( $_GET["U"]) || !isset($_GET["P"]))
 {
     $array = array('STATUS'=> '103' ,'MESSAGE'=> 'ERROR_UNKNOWN');
     echo json_encode($array);
     exit(0);
 }


 // GET VARIABLES
 $USERNAME = mysqli_real_escape_string($CON, $_GET["U"]);
 $USERNAME = base64_decode($USERNAME);
 $PACKAGE = mysqli_real_escape_string($CON, $_GET["P"]);
 
 
 // CHECK WHETHER PURCHASED
 $Q1 = "SELECT * FROM purchases WHERE email = '$USERNAME' AND itemID ='$PACKAGE'";
 
 // CHECK WHETHER ATTENDED
 $Q2 = "SELECT * FROM attendee WHERE email = '$USERNAME' AND itemID ='$PACKAGE'"; 

 // INSERT INTO ATTENDEEE
 $Q3 = "INSERT INTO attendee VALUES('$USERNAME', '$PACKAGE')";

 // GET STUDENT DETAILS 
 $Q4 = "SELECT name,phone,college FROM dusers WHERE email = '$USERNAME'";

 $PURCHASED = mysqli_query($CON, $Q1);
 $ATTENDED = mysqli_query($CON, $Q2);
 $DETAILS = mysqli_query($CON, $Q4);
 $NAME = "NAME UNKNOWN";
 $PHONE = "PHONE UNKNOWN";
 $COLLEGE = "COLLEGE UNKNOWN";

 if(!$PURCHASED)
 {
     $array = array('STATUS'=> '103' ,'MESSAGE'=> 'ERROR_UNKNOWN', 'NAME' => $NAME, 'PHONE'=> $PHONE, 'COLLEGE'=> $COLLEGE, 'EMAIL'=> $USERNAME);
     echo json_encode($array);
     exit(0);
 }





 if(mysqli_num_rows($PURCHASED) >= 1)
 {
     if(mysqli_num_rows($DETAILS) >= 1)
     {
        $row = mysqli_fetch_array($DETAILS);
        $NAME = $row[0];
        $PHONE = $row[1];
        $COLLEGE = $row[2];
     }

    // PURCHASED
    if(mysqli_num_rows($ATTENDED) >= 1)
    {
        // PURCHASED AND ATTENDED
        $array = array('STATUS'=> '101' ,'MESSAGE'=> 'PURCHASED_ATTENDED', 'NAME' => $NAME, 'PHONE'=> $PHONE, 'COLLEGE'=> $COLLEGE, 'EMAIL'=> $USERNAME);
        echo json_encode($array);
        exit(0);
    }
    else
    {
        // PURCHASED NOT ATTENDED ; SO GRANT PERMISSION ; ADD TO ATTENDEE TABLE
        $res = mysqli_query($CON, $Q3);
        $array = array('STATUS'=> '100' ,'MESSAGE'=> 'PURCHASED_NOT_ATTENDED', 'NAME' => $NAME, 'PHONE'=> $PHONE, 'COLLEGE'=> $COLLEGE, 'EMAIL'=> $USERNAME);
        echo json_encode($array);
        exit(0);
    }
 }
 else
 {
    // NOT PURCHASED
    $array = array('STATUS'=> '102' ,'MESSAGE'=> 'NOT_PURCHASED', 'NAME' => $NAME, 'PHONE'=> $PHONE, 'COLLEGE'=> $COLLEGE, 'EMAIL'=> $USERNAME);
    echo json_encode($array);
    exit(0);
 }

?>