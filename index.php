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
                height:90%;
                width:50%;
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
    
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">İSTANBUL</a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" role="form">
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success">Sign in</button>
                        <button type="button" class="btn">Sign up!</button>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="mapCanvas"></div>
        
    </body>
</html>