<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-9"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        
        <title>KAYIT SAYFASI</title>
        
        <link href="css/bootstrap.min.css" rel="stylesheet"/>
        <link href="css/bootstrap-theme.min.css" rel="stylesheet"/>
        
        <style type="text/css">
        
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #eee;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }

            .form-signin .form-signin-heading,.form-signin .checkbox {
                margin-bottom: 10px;
            }
            
            .form-signin .checkbox {
                font-weight: normal;
            }

            .form-signin .form-control {
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                margin-bottom: 5px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }
            
            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="text"] {
                /*margin-bottom: -1px;*/
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        
        </style>
        
        <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script> 
    
    </head>
    
    <body>
    
        <?php include("components/loginBar.php"); ?>
        
        <div class="container" style="display:table;height:100%;">
            <div style="display:table-cell;vertical-align:middle;">
                <form class="form-signin" role="form">
                    <input type="text" name="userName" class="form-control" placeholder="Ad Soyad" required autofocus>
                    <input type="text" name="mailAddress" class="form-control" placeholder="Mail Adresi" required>
                    <input type="password" name="userPassword" class="form-control" placeholder="Şifre" required>
                    <input type="password" name="repeatUserPassword" class="form-control" placeholder="Şifre Tekrarı" required>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Kayıt Ol</button>
                </form>
            </div>
        </div>
        
    </body>

</html>