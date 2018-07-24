<?php
    session_start();
    if(isset($_SESSION["user"]) && isset($_SESSION["purchased_workshop_id"]) && isset($_GET["payment_id"]) )
    {
        include("connect.php");
        include("lib/UserClass.php");
        require("lib/Instamojo.php");
        
        $payment_id= $_GET['payment_id'];
        $payment_request= $_GET['payment_request_id'];

        $wid = $_SESSION["purchased_workshop_id"];
        $userObj = unserialize($_SESSION['user']);
        $email = $userObj->email;
        
        // Query to check whether this payment was already Used ;
        $isOldPayment = "SELECT * FROM payments WHERE payment_id='$payment_id' AND payment_request_id='$payment_request'";

        $secure = mysqli_query($con,$isOldPayment);
        if(mysqli_num_rows($secure) !=0){
            // this means there was already a payment which made use of this payment id and payment request id
            // So prevent the user from proceeding
        
            
            die("Something Went Wrong !");
            exit();
        }

        $insQuery = "INSERT INTO purchases VALUES('$email','$wid')";
        

        $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");
      

        $insQueryPayments = "INSERT INTO payments VALUES('$payment_id','$payment_request')";
         

        try {
            $response = $api->paymentRequestPaymentStatus($payment_request, $payment_id);
            // print_r($response['purpose']);  // print purpose of payment request
            $status = $response['payment']['status'];  // print status of payment
            
            if(strcmp($status,"Credit") == 0){
                // Transaction Successful
                // Add the payment request to table
                $res = mysqli_query($con,$insQueryPayments);
                // Add Item to Purchased Table;
                $res = mysqli_query($con,$insQuery);
                // Unset all Session Variable
                unset($_SESSION["purchased_workshop_id"]);
                // Display Success Message
                echo "Purchase Successful";
            }
            else{
                  // Unset all Session Variable
                  unset($_SESSION["purchased_workshop_id"]);
                  // Display Failed Message
                  echo "Purchase Failed";
              }
            
        
            mysqli_close($con);

        }
        catch (Exception $e) {
            // Unset All Session Variable
            unset($_SESSION["purchased_workshop_id"]);
            echo "Purchase Failed";
            //print('Error: ' . $e->getMessage());
        }

    }
    else{
        echo "Oops ! Unknown Error";
    }
?>