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
        else
        {
            // no items in the cart for that user means to redirect the user to profile or login page
            header("Location:login");
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
        $api = new Instamojo\Instamojo("2d91fc9f3cc6edd636a73ff69fe4d7ec","038026548903b5fa12d59aa06ff3e664"); //,"https://test.instamojo.com/api/1.1/");

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
           // print('Error: ' . $e->getMessage());
           print("Error Occured");
        }

   }
   else{
       header("location:login.php");
   }
    
?>