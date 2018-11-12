<?php
    function create_auth_key($email){
        $key="";
        $apha="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
        $hash=md5($email);
        $str1="";
        $str2="";
        $length=strlen($hash);
        $first_half=substr($hash,5,10);
        
        for($i=0;$i<16;$i++){
            $str1 = $str1.$apha[rand(0,61)];
        }
        for($i=0;$i<16;$i++){
            $str2 = $str2.$apha[rand(0,61)];
        }

        $key=$str1.$first_half.$str2;
        return $key;
    }

   // echo create_auth_key("paulpjoby@gmail.com");
?>