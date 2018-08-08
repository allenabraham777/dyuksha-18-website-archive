<header>
    <a href="index"><img class="logo" src="images/navbar_logo.png"></a>
    <span class="user_id" id="user_id" onclick="open_menu()">
        <i class="fas fa-user"></i> <?php echo $name ?> <i class="fas fa-sort-down"></i>
        <!-- PHP SCRIPT -->
    </span>
    <button class="menu-button" onclick="open_menu()"><i class="fas fa-bars"></i></button>
    <div class="user_menu menu-collapse" id="user_menu">
        <ul>
            <li><a href="index"><i class="fas fa-home"></i>&nbsp;&nbsp;Home</a></li>
            <li><a href="profile"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Profile</a></li>
            <li><a href="events"><i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;Events</a></li>
            <li><a href="workshop"><i class="fas fa-briefcase"></i>&nbsp;&nbsp;Workshops</a></li>
            <li><a href="informals"><i class="fas fa-gamepad"></i>&nbsp;&nbsp;Informals</a></li>
            <?php if($name != 'Guest'){echo '<li><a href="logout"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Logout</a></li>';} ?>
        </ul>
    </div>
</header>



