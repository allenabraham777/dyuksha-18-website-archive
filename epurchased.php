<?php
    session_start();
    if(isset($_SESSION["user"])  && isset($_SESSION["ITEMS_IN_CART"]) && isset($_GET["payment_id"]) )
    {
        // All the required Includes
        include("connect.php");
        include("lib/UserClass.php");
        require("lib/Instamojo.php");
        
        //Main Variables
        $payment_id= $_GET['payment_id'];
        $payment_request= $_GET['payment_request_id'];

        // Get the items in the cart
        $items_purchased = $_SESSION["ITEMS_IN_CART"];
        $userObj = unserialize($_SESSION['user']);
        $email = $userObj->email; 

        // Queries
        $insQueryPayments = "INSERT INTO payments VALUES('$payment_id','$payment_request')";
        $insQuery = "INSERT INTO purchases VALUES ('$email','{$items_purchased[0]}')";
        $remQuery = "DELETE FROM dcart WHERE email='$email'";

        //Preparing Insert Query
        $len = sizeof($items_purchased);
        for($i=1;$i<$len;$i++){
            $insQuery.=",('$email','{$items_purchased[$i]}')";
        }
        // Now the insert query is ready


        // Now Check Whether Its using an Old Payment Id

        $isOldPayment = "SELECT * FROM payments WHERE payment_id='$payment_id' AND payment_request_id='$payment_request'";
        $secure = mysqli_query($con,$isOldPayment);
        if(mysqli_num_rows($secure) !=0){
            // this means there was already a payment which made use of this payment id and payment request id
            // So prevent the user from proceeding
            die("Something Went Wrong !");
            exit();
        }

        // Check whether the payment was successfull
        $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");     

        try {
            $response = $api->paymentRequestPaymentStatus($payment_request, $payment_id);
            // print_r($response['purpose']);  // print purpose of payment request
            $status = $response['payment']['status'];  // print status of payment
            
            if(strcmp($status,"Credit") == 0){
                // Transaction Successful
                // If not successful make no changes to items in cart 
                // if successful then add the items in Session list to purchased for that email
                // remove the items from the cart that has been purchased
                // Add the payment request to table
                $res1 = mysqli_query($con,$insQueryPayments);
                // Add Item to Purchased Table;
                $res2 = mysqli_query($con,$insQuery);
                // Remove Items From Cart
                $res3 = mysqli_query($con,$remQuery);
                // Unset all Session Variable
                unset($_SESSION["ITEMS_IN_CART"]);
                // Display Success Message
                //echo "Purchase Successful";
                header("Location:success.html");
            }
            else{
                  // Unset all Session Variable
                  unset($_SESSION["ITEMS_IN_CART"]);
                  // Display Failed Message
                  //echo "Purchase Failed";
                  header("Location:failed.html");
              }
            
        
            mysqli_close($con);

        }
        catch (Exception $e) {
            // Unset All Session Variable
            unset($_SESSION["ITEMS_IN_CART"]);
            echo "Purchase Failed";
            header("Location:failed.html");
            //print('Error: ' . $e->getMessage());
        }
 

    }
    else{
        header("location:login");
    }
?>