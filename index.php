<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dyuksha 18</title>
    <link rel="icon" href="images/logo.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" type="text/css" media="screen" href="css/animate.min.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/fullpage.min.css" />
    <link rel="stylesheet" type="text/css" href="css/main_menu.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/mystyle.css" />

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
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    

    <script>
    function load(){
        //location.href="#home/slide3";
        location.href="#home/countdown";
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
        anchors:['home', 'events', 'workshops','informals','sponsors','maps']
	});

    // myMap();

	//methods
    //$.fn.fullpage.setAllowScrolling(true);

        
    var date = new Date(2018, 8, 20);
        var now = new Date();
        var diff = (date.getTime()/1000) - (now.getTime()/1000);
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
        .section{
            background-color:grey;
        }
        .col-bg-tomato{
            background-color:tomato;
        }
        .col-bg-blue{
            background-color:DodgerBlue;
        }
        .col-bg-green{
            background-color:MediumSeaGreen;
        }
        .col-bg-stateblue{
            background-color:SlateBlue;
        }
        .col-bg-orange{
            background-color:orange;
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
<body onload="load();" >
    <div class="loader-container">
        <div class="loader">
                <img src="images/logoxx.png" class="logo">
        
                <!-- 
                Our Dice's Faces
                -->
                <div class="dice">
                
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
        <div id="dyukshamainmenubar">
            <div class="dyukshamainmenus" id="dyukshamenu">
                <ul>
                    <li data-toggle="tooltip" title="Home"><a href="#home"><i class="fas fa-home"></i></a></li>
                    <li data-toggle="tooltip" title="Events"><a href="events"><i class="fas fa-calendar-alt"></i></a></li>
                    <li data-toggle="tooltip" title="Workshops"><a href="workshop"><i class="fas fa-briefcase"></i></a></li>
                    <li data-toggle="tooltip" title="Informals"><a href="informals"><i class="fas fa-gamepad"></i></a></li>
                    <li data-toggle="tooltip" title="Accomodation"><a href=""><i class="fas fa-bed"></i></a></li>
                    <li data-toggle="tooltip" title="Reach Us"><a href="#maps"><i class="fas fa-map-marker-alt"></i></a></li>
                    <li data-toggle="tooltip" title="Profile"><a href="profile"><i class="fas fa-user"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="dyuksha-social">
            <span><i class="fab fa-facebook-f"></i></span>
            <span><i class="fab fa-instagram"></i></span>
            <span><i class="fab fa-youtube"></i></span>
        </div>

        <div id="fullpage">
                <div class="section col-bg-blue" data-anchor="home" style="text-align: center;">
                    <div class="slide bg-image" data-anchor="dyuksha">
                        <div class="my-bg-overlay" align="center">
                            <div class="main-logo place-vertical-middle">
                                <img src="images/main_logo.png" class="animated pulse 1s infinite" width="100px"><br><br>
                                <button class="know-more-button" onclick='location.href="#home/about";'>Know More</button>
                            </div>
                            
                        </div>
                         
                        <div class="arrow" style="top: 150px; cursor: pointer;" onclick='location.href="#events";'>
                                <i class="arrow-image fa fa-chevron-down text-white animated bounce 20s infinite" style="font-size:16px;" ></i>
                        </div>
                        
                        
                    </div>
                    <div class="slide bg-image2" data-anchor="about">
                            <div class="my-bg-overlay text-white">
                                <div class="about" align="center">
                                        <h3>About</h3>
                                        <p>
                                         DYUKSHA is the national level techno-cultural fest organised by the College Union. This year, it is scehduled in the month of September for the dates 20 , 21 and 22. DYUKSHA consists of 60+ events in total,including 30+ cultural events and 10+ workshops of International standards. It gives you a platform to showcase your technical skills and above all, to have an experience of a lifetime. 
                                        </p>
                                </div>
                            </div>
                    </div>
                    <div class="slide bg-image3" data-anchor="countdown">
                            <div class="my-bg-overlay" align="center">
                                <div class="my-clock place-vertical-middle">
                                    <img src="images/word.png" class="animated pulse 1s infinite">
                                    <br/><br/>
                                    <h3 style="color:white">Great Things Are Coming</h3>
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
                <div class="section col-bg-tomato" data-anchor="informals" style="text-align: center;">
                    <div class="slide" data-anchor="slide1">
                            <div class="mid">
                                    <div><i class="fas fa-dice" style="font-size:70px; color:white;" onclick='location.href="informals";'></i></div>
                                    <br/>
                                    <div><span style="font-size:30px; color:white;" onclick='location.href="informals";'>INFORMALS</span></div>
                            </div>
                    </div>
                    <div class="slide" data-anchor="slide2">
                            <div class="mid">
                                    <div><i class="fas fa-dice" style="font-size:70px; color:white;"></i></div>
                                    <br/>
                                    <div><span style="font-size:30px; color:white;">Proshows</span></div>
                            </div>
                    </div>
                    <div class="slide" data-anchor="slide3">
                            <div class="mid">
                                    <div><i class="fas fa-gamepad" style="font-size:70px; color:white;"></i></div>
                                    <br/>
                                    <div><span style="font-size:30px; color:white;">Gaming</span></div>
                            </div>
                    </div>
                    
                </div>
                <div class="section col-bg-stateblue" data-anchor="sponsors">
                    <div class="mid">
                        <div><i class="fas fa-dice" style="font-size:70px; color:white;"></i></div>
                        <br/>
                        <div><span style="font-size:30px; color:white;">SPONSOR</span></div>
                    </div>
                </div>

                <div class="section col-bg-stateblue" data-anchor="maps" style="text-align: center;" >
                            <div class="" style="height: 50%; top: 50%; transform: translateY(-50%); display: none;"  id="map1" >
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8339166795486!2d76.64040811480119!3d10.824018892289244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba86fd51d8e1faf%3A0x4e3d7915b3621961!2sN.S.S+Engineering+College%2C+Palakkad!5e0!3m2!1sen!2sin!4v1533568673383" frameborder="0" style="border:0; width:100%; height:100%;" allowfullscreen></iframe>          
                            </div>
                            <div class="row bg-light" style="height:100%; width:100%; margin: 0;" id="map2">
                                    <div class="col-md-6 col-bg-green"  id="map" >
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.8339166795486!2d76.64040811480119!3d10.824018892289244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba86fd51d8e1faf%3A0x4e3d7915b3621961!2sN.S.S+Engineering+College%2C+Palakkad!5e0!3m2!1sen!2sin!4v1533568673383" frameborder="0" style="border:0; width:100%; height:100%;" allowfullscreen></iframe>
                                     </div>
                                     <div class="col-md-6 bg-light" id="contact" style="text-align: left; padding-left: 50px;">
                                           <div>
                                                <i class="fa fa-map-signs" style="font-size:32px; margin-top:32px;"></i>
                                                <p style="text-align:left;"> NSS College of Engineering<br/>
                                                Akathethara P O , Palakkad , Kerala ,India - 678008<br/>
                                                info@entreprenia.org</p>
                                           </div>
                                            
                                            
                                            <p><b>Prof. Kiron K R</b>
                                            <br/>Convener<br/>
                                            +91 94963 29746<br/>
                                            kiron@entreprenia.org</p>
                                           
                                            <p><b>Sreehari</b><br/>
                                            Public Relation Officer<br/>
                                            +91 96058 71373<br/>
                                            hari@entreprenia.org</p>

                                           <p><b>Arun K</b>
                                            <br/>Student Coordinator<br/>
                                            <i class="fa fa-phone"></i> +91 89079 05554<br/>
                                            <i class="fa fa-envelope"></i> febin@entreprenia.org</p>

                                            
                                            
                                     </div>
                            </div>
                    </div>
                
        </div>
</body>
<script>
   
   
   if ($(window).width() < 700) {
            document.getElementById('map1').style.display = "block";
            document.getElementById('map1').classList.add("slide");
            document.getElementById('map2').classList.add("slide");
            document.getElementById('map2').classList.remove("row col-bg-tomato");
            document.getElementById('contact').classList.remove("col-md-6 bg-light");
            document.getElementById('map').style.display = "none";
            document.getElementById('map').style.position = "absolute";
        }
    


        
</script>
</html>