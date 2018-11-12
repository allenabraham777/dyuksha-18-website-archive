<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dyuksha 18</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="ASFIRE INSFIRE PERSFIRE. A techfest organised by NSS COLLEGE OF ENGINEERING, PALAKKAD"/>
    <meta name="keywords" content="dyuksha18,dyuksha-18,dyuksha2018,dyuksha'18,dyuksha nssce,dyuksha,nssce techfest,nssce,dyuksha 18"/>
    <meta name="google-site-verification" content="Ak9o-nQ9E8Oq0xrJ8gloK30H-QP6OX8uZNCmqdcns9A" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/fullpage.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main_menu.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/mystyle.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/social_menu.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.1.0/js/all.js" integrity="sha384-3LK/3kTpDE/Pkp8gTNp2gR/2gOiwQ6QaO7Td0zV76UFJVhqLl4Vl3KL1We6q6wR9" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/flipclock.css">
    <link rel="stylesheet" href="css/fullpage.min.css">

    <!--<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/particles.min.js"></script>
    <script src="js/particle_exex.js"></script>
    <script src="js/flipclock.min.js"></script>   
    <script type="text/javascript" src="js/fullpage.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="css/loader.css">
    <link rel="stylesheet" href="css/menu2.css">
    <link rel="stylesheet" href="css/menu5.css">
    <link rel="stylesheet" href="css/sparks.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/notice.css">
    <script src="js/menu5.js"></script>

    <script>
    function load(){
      
        //location.href="#home/countdown";
        alert("All participants are requested to bring their college IDs.");
        //alert("This is to notify that dyuksha.org will be shutdown for maintenance on Monday 22 October 2018 From: 02:00 IST TO: 22:00 IST");
    } 
    
   /*  // Map Function Starts here   
    function myMap() {
        var location = new google.maps.LatLng(10.824022, 76.642588);
        var mapOptions = {
            center: location,
            zoom: 17,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
         var map = new google.maps.Map(document.getElementById("map"), mapOptions);
         var map1 = new google.maps.Map(document.getElementById("map1"), mapOptions);
        var marker = new google.maps.Marker({
            position:location,
            map:map
         });
         var marker = new google.maps.Marker({
            position:location,
            map1:map1
         });
    } // Google Map Function Ends Here

    // Call the map functions */
    
    $(document).ready(function() {
        
    $('#fullpage').fullpage({
        slidesNavigation:true,
        controlArrows:false, 
        lockAnchors: false,
        continuousHorizontal: true,
        anchors:['home', 'events', 'workshops','ncssce','informals','proshow','sponsors','maps']
	});

    // myMap();

	//methods
    //$.fn.fullpage.setAllowScrolling(true);

        
    var date = new Date(2018, 10, 09);
        var now = new Date();
        var diff = 0//(date.getTime()/1000) - (now.getTime()/1000);
        var clock = $('.clock').FlipClock(diff,{
          clockFace: 'DailyCounter',
          countdown: true
    });  
    $('[data-toggle="tooltip"]').tooltip({
        tooltipClass:"tooltip1",
        show: {
        effect: "slide",
        delay: 0
      },
        position: {
            my: "left center",
            at: "right center"
        }
    });
    $(".loader-container").fadeOut("slow");
});


    </script>
    <style>
        *{
            margin:0px;
            padding:0px;
        }
        .hide{
            display:none;
        }
        .show{
            display:block;
        }
        .section{
            background-color:#1d293a;
            background: url(images/asad.png);
        }
        .section img{
            cursor: pointer;
        }
        .col-bg-tomato{
            background-color:#1d293a;
        }
        .col-bg-blue{
            background-color:#1d293a;
        }
        .col-bg-green{
            background-color:#1d293a;
        }
        .col-bg-stateblue{
            background-color:#1d293a;
        }
        .col-bg-orange{
            background-color:#1d293a;
        }
        
        .fp-viewing-home-slide1 .fp-controlArrow{
            display: none;
        }
        .fp-viewing-home-slide2 .fp-controlArrow{
            display: none;
        }
        .fp-viewing-home-slide3 .fp-controlArrow{
            display: none;
        }
    </style>
    
</head>
<body onload="load();" style="color:black; font-weight:bold;">
    <?php
      // include("notice.php");
       include("login_status.php");
    ?>
    <div class="loader-container">
        <div class="loader">
            <img src="images/logoxx.png" class="logo">
    
            <!-- 
            Our Dice's Faces
            -->
            <div class="dice" style="zoom: -1;">
            
            <div class="face first-face">
                <img src="images/logo/D.png" height="100%;" > 
            </div>
            
            <div class="face second-face">
                <img src="images/logo/Y.png" height="100%;" >  
            </div>
            
            <div class="face third-face">
                <img src="images/logo/U.png" height="100%;" >
            </div>
            
            <div class="face fourth-face">
                <img src="images/logo/K.png" height="100%;" > 
            </div>
            
            <div class="face fifth-face">
                <img src="images/logo/S.png" height="100%;" > 
            </div>
            
            <div class="face sixth-face">
                <img src="images/logo/H.png" height="100%;" >
            </div>
            <div class="face seventh-face">
                <img src="images/logo/A.png" height="100%;" >
                </div>
                <div class="face eighth-face">
                    <img src="images/logo/co.png" height="100%;" >
                </div>
                <div class="face nineth-face">
                    <img src="images/logo/1.png" height="100%;" >
                </div>
                <div class="face tenth-face">
                    <img src="images/logo/8.png" height="100%;" >
                </div>
            
            </div>
        </div>
    </div>
    <?php include("menu_flow.php"); ?>
    <?php include("menu2.php"); ?>

    <div id="fullpage">
        <div class="section col-bg-blue" data-anchor="home" style="background:url(images/dark.jpg);text-align: center;">
        <div class="slide bg-image" id="main_home"style="background-image:url(images/dark.jpg) !important;" data-anchor="dyuksha">
            <div id='stars'></div>
            <div id='stars2'></div>
            <div id='stars3'></div>
                <center>
                <img src="images/dyukshamet.png" class="metallic" alt="" srcset="">

                </center>
                
            </div>
            <div class="slide bg-image2" data-anchor="about">
                    <div class="my-bg-overlay text-white">
                        <div class="about" align="center">
                                <h3>About</h3>
                                <p>
                                    DYUKSHA is the national level techno-cultural fest organised by College Union, NSS College of Engineering, Palakkad. This year, it is scheduled in the month of November for the dates 9 , 10 and 11. DYUKSHA consists of 60+ events in total,including 30+ cultural events and 10+ workshops of International standards. It gives you a platform to showcase your technical skills and above all, to have an experience of a lifetime. 
                                </p>
                        </div>
                    </div>
            </div>
            <div class="slide bg-image3" data-anchor="countdown">
                    <div class="my-bg-overlay" align="center">
                        <div class="my-clock place-vertical-middle">
                            <img src="images/word.png" class="animated pulse 1s infinite">
                            <br/><br/>
                            <h3 style="color:white">Great Things Are Here</h3>
                            <br/>
                            <div class="clock" style="width:auto">

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        
        <div class="section col-bg-orange" style="padding:0px;" data-anchor="events">
            <div class="mid">
                <div><img src="images/events.png" width="110px" onclick='location.href="events";'></div>
                <br/>
                <div><span style="font-size:30px; color:white;" onclick='location.href="events";'>EVENTS</span></div>
            </div>
        </div>
        <div class="section col-bg-green" data-anchor="workshops">
            <div class="mid">
                <div><img src="images/workshops.png" width="110px" onclick='location.href="workshop";'></div>
                <br/>
                <div><span style="font-size:30px; color:white;" onclick='location.href="workshop";'>WORKSHOPS</span></div>
            </div>
        </div>
        <div class="section" style="padding:0px;" data-anchor="ncnssce">
           <div class="mid">
              <div><img src="images/conference.png" width="110px" onclick='location.href="ncnssce";'></div>
              <br/>
              <div><span style="font-size:30px; color:white;">NATIONAL CONFERENCE</span></div>
           </div>
        </div>
        <div class="section col-bg-tomato" data-anchor="informals" style="text-align: center;">
                    <div class="mid">
                        <div><img src="images/informals.png" width="110px" onclick='location.href="informals";'></div>
                        <br/>
                        <div><span style="font-size:30px; color:white;" onclick='location.href="informals";'>INFORMALS</span></div>
                    </div>
        </div>
        <div class="section col-bg-tomato" data-anchor="proshow" style="text-align: center;">
                    <div class="mid">
                        <div><img src="images/mc.jpg" width="110px" style="border-radius:50%;" onclick='location.href="proshow";'></div>
                        <br/>
                        <div><span style="font-size:30px; color:white;" onclick='location.href="proshow";'>PROSHOW</span></div>
                    </div>
        </div>
        <div class="section col-bg-stateblue" data-anchor="sponsors">
                <div class="mid">
                    <div><img src="images/sponsors.png" width="110px" onclick='location.href="sponsor";'></div>
                    <br/>
                    <div><span style="font-size:30px; color:white;" onclick='location.href="sponsor";'>SPONSORS</span></div>
                </div>
        </div>

        <div class="section col-bg-stateblue" data-anchor="maps" style="text-align: center;" >
                   
                    <div class="row bg-light" style="height:100%; width:100%; margin: 0;background: #fff;" id="map2">
                           
                            <div class="col-md-6 bg-light" id="contact" style="text-align: left; width: 100%;background: #fff !important;">
                                <div style="position: absolute; background: #fff; width: 50%; top:50%; left:50px; transform: translateY(-50%);">
                                    <div>
                                        <i class="fa fa-map-signs" style="font-size:32px; margin-top:32px;"></i>
                                        <p style="text-align:left;"> NSS College of Engineering<br/>
                                        Akathethara P O , Palakkad<br/>Kerala ,India<br/>Pin - 678008
                                        <br/><br/><br/>
                                        <i class="fa fa-envelope"></i> connect2dyuksha@gmail.com</p>
                                    </div>
                                    
                                    
                                    <p>
                                    <i class="fas fa-globe"></i> <a href="http://www.nssce.ac.in/" style="color: black; text-decoration:none;">www.nssce.ac.in</a></p>
                                    <p><i class="fas fa-info-circle"></i> <a href="contacts" style="text-decoration:none;">Contact details</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-bg-green"  id="map" style="padding:0;" >
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8339166795486!2d76.64040811480119!3d10.824018892289244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba86fd51d8e1faf%3A0x4e3d7915b3621961!2sN.S.S+Engineering+College%2C+Palakkad!5e0!3m2!1sen!2sin!4v1533568673383" frameborder="0" style="margin:0;border:0; width:100%; height:100%;" allowfullscreen></iframe>
                            </div>
                    </div>
                    <div class="hide" style="padding:0;"  id="map1" >
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8339166795486!2d76.64040811480119!3d10.824018892289244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba86fd51d8e1faf%3A0x4e3d7915b3621961!2sN.S.S+Engineering+College%2C+Palakkad!5e0!3m2!1sen!2sin!4v1533568673383" frameborder="0" style="border:0; width:50%; height:50%; top:50%;right:0;transform:translateY(-50%);position:absolute;" allowfullscreen></iframe>
                    </div>
            </div>
            
    </div>
</body>
<script>
   
   
   if ($(window).width() < 700) {
            $('#map').css('display','none');
            $('#map2').addClass("slide");
            $('#map1').addClass("slide");
            $('#map1').addClass("show");
            $('#map1').removeClass("hide");
            $('#map2').removeClass("row col-bg-tomato");
            $('#contact').removeClass("col-md-6 bg-light");
            $('#contact').css('position','absolute');
            $('#contact').css('top','0');
            $('#contact').css('height','100vh');
            $('#contact').css('background','#ffffff');
            
        }
    


        
</script>
</html>
