<?php
echo '<div onclick="location.href=\'login.php\'" style="cursor:pointer;position:absolute;right:10px;top:10px;padding:2.5px;padding-right:10px;padding-left:10px;border-radius:15px;font-weight:80;font-size:15px;z-index:100;background:#ffffff;">';
if(isset($_SESSION['userloggedin']))
    echo '<i class="fas fa-user"></i> '.$_SESSION['userloggedin'];
else
    echo '<i class="fas fa-user"></i> Not Logged In';
echo '</div>';
?>
