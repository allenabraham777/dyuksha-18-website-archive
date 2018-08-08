<?php
    // This Payments is for workshop will pass the workshop id by POST method
    session_start();

    if(isset($_SESSION['user']) && isset($_GET['wid'])){
        
        include("lib/UserClass.php");
        $userObj = unserialize($_SESSION['user']);
        $email = $userObj->email;

        include("connect.php");
        $id = mysqli_real_escape_string($con,$_GET['wid']); // the workshop id
        $query="SELECT * FROM wprices WHERE workshopid='$id'";
        
        $query2="SELECT * FROM purchases WHERE email='$email' AND itemID='$id'";
        $res = mysqli_query($con,$query2);
        if(mysqli_num_rows($res) >= 1){
            header("location:Error.php?msg=100"); // already purchased
            die();
        } 

        
        $res = mysqli_query($con,$query);
        if(mysqli_num_rows($res) ==1){
                $row = mysqli_fetch_array($res);

                //* This contains the either the price of items in cart or cost of workshop*//
                $cost = $row[2];
                $name = "";
                $_SESSION['purchased_workshop_id']=$row[0];

                require("lib/Instamojo.php");
                
                // ORIGINAL KEYS 
                //  $api = new Instamojo\Instamojo("2d91fc9f3cc6edd636a73ff69fe4d7ec","038026548903b5fa12d59aa06ff3e664");//"https://test.instamojo.com/api/1.1/");
                
                // TEST KEYS INSTALLED
                $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");
                
                try {
                    $response = $api->paymentRequestCreate(array(
                        "purpose" => "Dyuksha Workshop Payment",
                        "amount" => "$cost",
                        "send_email" => true,
                        "email" => "$email",
                        "redirect_url" => "http://www.dyuksha.org/wpurchased.php"
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
            header('location:profile');
        }
    
   }
   else{
       header("location:login");
   }
    
?>