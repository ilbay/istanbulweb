<?php session_start(); ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
        <title>ANA SAYFA</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        
        <style type="text/css">
            body
            {
                padding-top:50px;
                padding-bottom:20px;
            }
            #mapCanvas
            {
                margin-top:5px;
                height:95%;
                width:100%;
            }
            .markerContent
            {
                overflow:hidden;
                width:100%;
                display:table-row;
                padding:5px;
            }
            .markerLeft
            {
                overflow:hidden;
                padding:0;
                margin:0;
                width:25%;
                display:table-cell;
            }
            .markerRight{
                overflow:hidden;
                padding:1px;
                margin:0;
                width:75%;
                display:table-cell;
            }
            .markerImage
            {
                width: 100%;
                height: 50%;
                margin:0;
            }
            .thumbnail
            {
                width:100%;
                height:125px;
            }
            .thumbnail:hover
            {
                background-color:#428bca;
                border-color:#428bca;
                cursor:pointer;
            }
            ul.thumbnails
            {
                padding: 10px;
                list-style:none;
            }
        </style>
        
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 
        <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfnlGcQMbxsiSpsnFGzKkzw3Qx4VsHBnw&sensor=false&region=TR"></script>-->
        
        <script type="text/javascript">
        
            var googlemap = null;
                    
            function initialize() {
                google.maps.visualRefresh = true;
                var mapOptions = {
                    zoom: 9,
                    center: new google.maps.LatLng(41.077281, 28.986633),
                    panControl:false,
                    zoomControl:true,
                    scaleControl:true
                };

                googlemap = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
                
                loadRegionalProblems();
            }
        
            function loadGoogleMaps()
            {
                var googleMapsScript = document.createElement("script");
                googleMapsScript.text="text/javascript";
                googleMapsScript.src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfnlGcQMbxsiSpsnFGzKkzw3Qx4VsHBnw&sensor=false&region=TR&callback=initialize";
                document.body.appendChild(googleMapsScript);
            }
            
            function loadRegionalProblems()
            {
                var infowindow = new google.maps.InfoWindow({size: new google.maps.Size(20,20)});

                $.getJSON('loadBasicProblems.php',function(data){
                    data = data["problems"];
                    for(var i = 0; i < data.length; i++)
                    {
                        var marker = new google.maps.Marker({
                            position: new google.maps.LatLng(parseFloat(data[i]["latitude"]), parseFloat(data[i]["longitude"])),
                            map: googlemap,
                            title: 'Detay için tıklayınız.'
                        });
                
                        google.maps.event.addListener(marker, 'click', (function(marker,data) {
                            return function(){
                                infowindow.setContent("<div class='markerContent'><div class='markerLeft'><img class='markerImage' src='"+data["photo"]+"'/></div><div class='markerRight'>"+decodeURIComponent(data["description"])+"</div><a href='displayProblem.php?problem="+data["problemid"]+"'>fazlası&#62;&#62;</a></div>");
                                infowindow.open(googlemap,marker);
                            };
                        })(marker,data[i]));
                    }
                    
                    var str = "<ul class='thumbnails'>";
                    for(var i = 0; i < data.length; i++)
                    {
                        str += "<li><div class='thumbnail' attr='"+data[i]["problemid"]+"' style='display:block;' onclick='onClickProblemList(this)'>";
                        str += "<img src='"+data[i]["photo"]+"' style='width:25%;height:100%;float:left;margin-right:20px;'/>";
                        str += "<div style='height:100%;word-wrap:break-word;margin:0;height:80%;'>"+data[i]["description"]+"</div>";
                        str += "<span class='badge badge-warning' style='float:right;'>"+data[i]["voteCount"]+"</span>";
                        str += "</div></li>";
                    }
                    str += "</ul>";
                    $("#problemsList").html(str);
                });
            }
            
            function onClickProblemList(el)
            {
                window.location.href='displayProblem.php?problem='+$(el).attr('attr');
            }
            
            window.onload = loadGoogleMaps;
        
        </script>
        
    </head>
    
    <body>
        
        <?php
            if(isset($_SESSION['userid']))
            {
                include("components/welcomeBar.php");
            }
            else
            {
                include("components/loginBar.php");
            }
        ?>

        <div class="row">
            <div class="col-md-7">
                <div id="mapCanvas"></div>
            </div>
            <div class="col-md-5">
                <div class="list-group" id="problemsList">
                </div>
            </div>
        </div>
        
    </body>
</html>