<?php
    session_start();
?>

<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
        <title>ANA SAYFA</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        
        <style type="text/css">
            body {
                padding-top: 70px;
                padding-bottom: 20px;
            }
            .navbar, .navbar-inverse, .navbar-fixed-top
            {
                margin-bottom: 40px;
            }
        </style>
        
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

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
        
        <div class="container">
            <div class="jumbotron">
                <h1>Navbar example</h1>
                <p>This example is a quick exercise to illustrate how the default, static navbar and fixed to top navbar work. It includes the responsive CSS and HTML, so it also adapts to your viewport and device.</p>
                <p>
                    <a class="btn btn-lg btn-primary" href="../../components/#navbar" role="button">View navbar docs &raquo;</a>
                </p>
            </div>
        </div>
    
    </body>
    
</html>