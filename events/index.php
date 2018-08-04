<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Departments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.css" />
    
    <link rel="stylesheet" type="text/css" media="screen" href="../css/cards.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/menuitems.css" />
    
    <link href="https://fonts.googleapis.com/css?family=Chela+One" rel="stylesheet">

    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    
</head>
<?php 

include("../lib/UserClass.php");
if(isset($_SESSION['user'])){
    $userObj = unserialize($_SESSION["user"]);
    $name = $userObj->name;
}
else{
    $name = "Guest";
}

?>

<script>
        function gotoLocation(page){
            location.href=page;
        }
</script>
<style>
    
    
    .basic{
        margin-top:60px;
    }
    .row div  img{
        padding:50px;
      
    }
    .row div p{
        font-weight: bold;
        color:white;
        font-size:22px;
    }
    .row div{
        border:1px solid rgba(0, 0, 0, 0.418);
        cursor: pointer;
    }
    .cs{
       background-color:#ab47bc;
    }
    .ce{
       background-color:#ffc663;
    }
    .me{
       background-color:royalblue;
    }
    
    .ic{
       background-color:orange;
    }
    .ee{
       background-color:dodgerblue;
    }
    .ec{
       background-color:turquoise;
    }
    .general{
       background-color:#ffd740;
    }
</style>
<body>
    <?php 
        include("../menu.php");
    ?>
    <div class="container-fluid basic">
        <div class="row" >
                    <div class="col-md-6 cs" align="center" onclick="gotoLocation('cs');">
                        <img src="images/dept/cs.png">
                        <p>Computer Science</p>
                    </div>

                    <div class="col-md-6 ce" align="center" onclick="gotoLocation('ce');">
                            <img src="images/dept/ce.png">
                            <p>Civil Engineering</p>
                    </div>
        </div>
        <div class="row">
                    <div class="col-md-6 me" align="center" onclick="gotoLocation('me');">
                            <img src="images/dept/me.png">
                            <p>Mechanical</p>
                    </div>
                    <div class="col-md-6 ic" align="center" onclick="gotoLocation('ic');">
                            <img src="images/dept/ic.png">
                            <p>Instrumentation Control</p>
                    </div>
        </div>
        <div class="row">
                    <div class="col-md-6 ec" align="center" onclick="gotoLocation('ec');">
                            <img src="images/dept/ec.png">
                            <p>Electronics</p>
                    </div>
                    <div class="col-md-6 ee" align="center" onclick="gotoLocation('ee');">
                            <img src="images/dept/ee.png">
                            <p>Electrical</p>
                    </div>
        </div>
        <div class="row">
            <div class="col-sm-12 general" align="center" onclick="gotoLocation('general');">
                    <img src="images/dept/event.png">
                    <p>General Events</p>
            </div>
            
  </div>
</div>
</body>

<script type="text/javascript">
    function open_menu(){
        if(document.getElementById("user_menu").classList.contains("menu-collapse")){
           document.getElementById("user_menu").classList.add("menu-open");
           document.getElementById("user_menu").classList.remove("menu-collapse");
        }
        else{
           document.getElementById("user_menu").classList.add("menu-collapse");
           document.getElementById("user_menu").classList.remove("menu-open");
       }
    }

    var  show = false;
    function openOrCloseDialog(){
        if(show){
        document.getElementsByClassName("dialog-container")[0].style.display="none";
        show=false;
        }
        else{
        document.getElementsByClassName("dialog-container")[0].style.display="block";
        show=true;
        }
    }
     /*------------------------------------ Filter Method --------------------------------------------
    | 0 ->CE 1->IC 2->CS 3->ME 4->EC 5->EE OTHER -> ALL
    ------------------------------------------------------------------------------------------------*/
    function filter(cat){
        var x = parseInt(cat);
        switch(x){
            case 0:
                var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = ce_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(ce_events[i])[0].style.display="inline-block";
                }
                break;
            case 1:
                var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = ic_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(ic_events[i])[0].style.display="inline-block";
                }
                break;
            case 2:
            var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = cs_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(cs_events[i])[0].style.display="inline-block";
                }
                break;
            case 3:
            var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = me_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(me_events[i])[0].style.display="inline-block";
                }
                break;
            case 4:
            var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = ec_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(ec_events[i])[0].style.display="inline-block";
                }
                break;
            case 5:
            var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="none";
                }
                len = ee_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(ee_events[i])[0].style.display="inline-block";
                }
                break;
            default:
            var len = all_events.length;
                for(var i=0;i<len;i++){
                    document.getElementsByClassName(all_events[i])[0].style.display="inline-block";
                }
                

        }
    }

    function s(){
        var x = document.getElementsByName("dialog-radio");
        for(var i=0;i<x.length;i++){
            if(x[i].checked){
            filter(x[i].value);
            }
        }
        openOrCloseDialog();
    }
</script>
</html>