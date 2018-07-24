<?php
    session_start();

    if(isset($_SESSION['user'])){
        
        //* This contains the either the price of items in cart or cost of workshop*//
        $cost = $_SESSION["total_price"]; 
        $message = "";
        $items_purchased= $_SESSION["ITEM_IN_CART"];

        require("lib/Instamojo.php");
        $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");

        try {
            $response = $api->paymentRequestCreate(array(
                "purpose" => "Dyuksha Events Payment",
                "amount" => "$cost",
                "send_email" => true,
                "email" => "paulpjoby@gmail.com",
                "redirect_url" => "http://localhost/dyuksha.org/{$m}purchased.php"
                // "webhook" => "http://localhost/dyuksha.org/webhook.php"
            ));

            $pay_ulr = $response['longurl'];
            //Redirect($response['longurl'],302); //Go to Payment page
            header("Location: $pay_ulr");
            exit();
        }
        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }

   }
   else{
       header("location:login.php");
   }
    
?>