<button id="sub_menu_ham" class="sub-menu-ham" onclick="sub_menu_oc();">
    <i class="fa fa-bars" aria-hidden="true"></i>
</button>
<div id="sub_menu" class="sub-menu-body sub-menu-close">
    <div class="sub-menu-items">
    <img src="images/dyukshaw.png" alt="" srcset="">
    <ul>
        <li><a href="index">HOME</a></li>
        <li><a href="events">EVENTS</a></li>
        <li><a href="workshop">WORKSHOPS</a></li>
        <li><a href="accomodation">ACCOMODATION</a></li>
        <li><a href="proshow">PROSHOW</a></li>
        <li><a href="informals">INFORMALS</a></li>
        <li><a href="profile">PROFILE</a></li>
        <?php if(isset($_SESSION["user"])){echo '<li><a href="../logout">LOGOUT</a></li>';} ?>
    </ul>
    </div>
</div>