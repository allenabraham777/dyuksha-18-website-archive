function menupop()
    {
        event.stopPropagation();
        document.getElementById("down_menu").classList.toggle("show_down");
        document.getElementById("down_menu_1").classList.toggle("show_down_1");
        document.getElementById("down_menu_2").classList.toggle("show_down_2");
        document.getElementById("right_menu").classList.toggle("show_right");
        document.getElementById("menu5_button").classList.toggle("color_menu");
    }
$(window).click(function() {
    if($("#down_menu").hasClass("show_down"))
    {
    document.getElementById("down_menu").classList.remove("show_down");
    document.getElementById("down_menu_1").classList.remove("show_down_1");
    document.getElementById("down_menu_2").classList.remove("show_down_2");
    document.getElementById("right_menu").classList.remove("show_right");
    document.getElementById("menu5_button").classList.remove("color_menu");
    }
});