<?php session_start(); ?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9"/>
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
        </style>
        
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 
        <!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfnlGcQMbxsiSpsnFGzKkzw3Qx4VsHBnw&sensor=false&region=TR"></script>-->
        
        <script type="text/javascript">
        
            function initialize() {
                
                var mapOptions = {
                    zoom: 8,
                    center: new google.maps.LatLng(41.077281, 28.986633)
                };

                var map = new google.maps.Map(document.getElementById('mapCanvas'), mapOptions);
            }
        
            function loadGoogleMaps()
            {
                var googleMapsScript = document.createElement("script");
                googleMapsScript.text="text/javascript";
                googleMapsScript.src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfnlGcQMbxsiSpsnFGzKkzw3Qx4VsHBnw&sensor=false&region=TR&callback=initialize";
                document.body.appendChild(googleMapsScript);
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
                <div></div>
            </div>
        </div>
        
    </body>
</html>