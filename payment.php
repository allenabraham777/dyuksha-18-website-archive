<?php
    session_start();
    
    require("lib/Instamojo.php");

    $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");

    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => "Dyuksha Tech Fest",
            "amount" => "10",
            "send_email" => true,
            "email" => "paulpjoby@gmail.com",
            "redirect_url" => "http://localhost/dyuksha.org/profile.php"
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


    
    
?>