<?php
    class Members{
        public $image;
        public $name;
        public $post;
        public $phone;
        public $email;
    }
    $n = 5;
    $j=0;
    while($j<$n){
    $list[$j] = new Members;
    $j = $j + 1;
    }
    $list[0]->image = "images/a1.jpg";
    $list[0]->name = "SREEHARI S";
    $list[0]->post = "DESIGNATION";
    $list[0]->phone = "9446680191";
    $list[0]->email = "name@dyuksha.org";

    $list[1]->image = "images/a2.jpg";
    $list[1]->name = "ARUN K R";
    $list[1]->post = "DESIGNATION";
    $list[1]->phone = "8593807003";
    $list[1]->email = "name@dyuksha.org";

    $list[2]->image = "images/a3.jpg";
    $list[2]->name = "DHANEESH K";
    $list[2]->post = "DESIGNATION";
    $list[2]->phone = "8086733812";
    $list[2]->email = "name@dyuksha.org";

    $list[2]->image = "images/a3.jpg";
    $list[2]->name = "DHANEESH K";
    $list[2]->post = "DESIGNATION";
    $list[2]->phone = "8086733812";
    $list[2]->email = "name@dyuksha.org";

    $list[3]->image = "images/a3.png";
    $list[3]->name = "PAUL P JOBY";
    $list[3]->post = "WEBSITE SUPPORT";
    $list[3]->phone = "PHONE";
    $list[3]->email = "name@dyuksha.org";

    $list[4]->image = "images/a5.jpg";
    $list[4]->name = "ALLEN K ABRAHAM";
    $list[4]->post = "WEBSITE SUPPORT";
    $list[4]->phone = "8137073386";
    $list[4]->email = "name@dyuksha.org";
?>