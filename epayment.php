<?php
    session_start();

    if(isset($_SESSION['user'])){

        include("connect.php");
        include("lib/UserClass.php");
        $user=unserialize($_SESSION["user"]);
        $email=$user->email;
        $name=$user->name;

        $query="SELECT * FROM dcart WHERE email='$email'";
        $costQuery = "SELECT SUM(price) FROM eprices WHERE eventId IN (SELECT itemID from dcart WHERE email='$email')";

        $items_purchased= array();

        // Collect all the list of items in the specific user cart and store it in the item_purchased array;
        $res=mysqli_query($con,$query);
        if(mysqli_num_rows($res)>0){
          while($row=mysqli_fetch_array($res)){
            array_push($items_purchased,$row[1]);
            }
        }
        
        
        // Calculate the cost of all items that is present in users cart and store it in cost
        $cost_res= mysqli_query($con,$costQuery);
        if($cost_res){
            $row = mysqli_fetch_array($cost_res);
            $cost = $row[0]; 
        }
        else{
            mysqli_close($con);
            die("Some Error Happened");
            exit();
        }
       
        // Close the mysqli connection as its no more used
        mysqli_close($con);
        
        // Save the Items List to Session Variable so that it can be passed to next success page
        $_SESSION['ITEMS_IN_CART']=$items_purchased;

        
        //* This contains the either the price of items in cart or cost of workshop*//

        require("lib/Instamojo.php");
        $api = new Instamojo\Instamojo("test_660de698c90df23def44a6f660a","test_ac345a4fca86cc30fe9c4761feb","https://test.instamojo.com/api/1.1/");

        try {
            $response = $api->paymentRequestCreate(array(
                "purpose" => "Dyuksha Events Payment",
                "amount" => "$cost",
                "send_email" => true,
                "email" => "$email",
                "redirect_url" => "http://localhost/dyuksha.org/epurchased.php"
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