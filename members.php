<?php
    class Members{
        public $image;
        public $name;
        public $post;
        public $phone;
        public $email;
    }
    $n = 7;
    $j=0;
    while($j<$n){
    $list[$j] = new Members;
    $j = $j + 1;
    }
    $list[0]->image = "images/a1.jpg";
    $list[0]->name = "Sreehari S";
    $list[0]->post = '<i class="fas fa-users" style="width:25px;"></i> DESIGNATION';
    $list[0]->phone = "9446680191";
    $list[0]->email = "support@dyuksha.org";

    $list[1]->image = "images/a2.jpg";
    $list[1]->name = "Arun K R";
    $list[1]->post = '<i class="fas fa-users" style="width:25px;"></i> DESIGNATION';
    $list[1]->phone = "8593807003";
    $list[1]->email = "suppport@dyuksha.org";

    $list[2]->image = "images/a3.jpg";
    $list[2]->name = "Dhaneesh";
    $list[0]->post =$list[1]->post =$list[2]->post = '<i class="fas fa-users"  style="width:25px;"></i> Convener';;
    $list[2]->phone = "8086733812";
    $list[2]->email = "support@dyuksha.org";

    $list[3]->image = "images/midhun.jpeg";
    $list[3]->name = "Midhun S";
    $list[3]->post = '<i class="fas fa-comments" style="width:25px;"></i> Public Relation Head';
    $list[3]->phone = "9048389771";
    $list[3]->email = "support@dyuksha.org";

    $list[4]->image = "images/alvin.jpg";
    $list[4]->name = "Alvin Sebastian";
    $list[4]->post = '<i class="fas fa-user-astronaut" style="width:25px;"></i> Technical head';
    $list[4]->phone = "9407167101";
    $list[4]->email = "support@dyuksha.org";

    $list[5]->image = "images/paul.jpg";
    $list[5]->name = 'Paul P Joby';
    $list[5]->post = '<i class="fas fa-globe"  style="width:25px;"></i> Website';
    $list[5]->phone = "9747730514";
    $list[5]->email = "paulpjoby@gmail.com";

    $list[6]->image = "images/a5.jpg";
    $list[6]->name = "Allen K Abraham";
    $list[6]->post = '<i class="fas fa-globe" style="width:25px;"></i> Website';
    $list[6]->phone = "8137073386";
    $list[6]->email = "allen@dyuksha.org";
?>
