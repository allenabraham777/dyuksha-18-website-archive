<?php
     
     include("lib/UserClass.php");
     require("lib/Instamojo.php");

     $payment_id= $_GET['payment_id'];
     $payment_request= $_GET['payment_request_id'];
 $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");     

try {
    $response = $api->paymentRequestPaymentStatus($payment_request, $payment_id);
    // print_r($response['purpose']);  // print purpose of payment request
    print_r($response);
}
catch (Exception $e) {

    echo "Purchase Failed";
    //print('Error: ' . $e->getMessage());
}
?>
