<?php
  if(isset($_GET["e"]) &&  isset($_GET["k"])){
    include_once("connect.php");
    $email=mysqli_real_escape_string($con,$_GET["e"]);
    $key=mysqli_real_escape_string($con,$_GET["k"]);

    $query_success_confirm = "UPDATE dusers SET active='YES' WHERE email='$email' LIMIT 1";
    $query = "SELECT * FROM nonactiveusers WHERE email='$email' AND auth_key='$key'";
    $query_delete = "DELETE FROM nonactiveusers WHERE email='$email' AND auth_key='$key'";

    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_array($res);
        if(strcmp($row[0],$email)==0){
            $s=mysqli_query($con,$query_success_confirm);
            $d=mysqli_query($con,$query_delete);
            if($s && $d){
                header("Location:login.php?m=200");
                // Mail Confirmation Successful
            }
        }
        else{
            header("Location:login.php?m=404");
            // Mail Not Confirmed
        }
    }
    else
    {
        header("Location:login.php?m=404");
        // Mail Not Confirmed
    }
  }
  else{
      header("Location:login.php");
      exit();
  }
?>