<?php
    session_start();
    
    if(isset($_SESSION['userid']))
    {
        header("location:index.php");
    }
?>

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
        
        <script type="text/javascript">
        
            function signupFormSubmit()
            {
                var nameRegex = /^[a-zA-Z]+(\s[a-zA-Z]+)+$/g;
                var mailRegex = /^[a-zA-Z0-9\.\-_]+@[a-z]+\.(com|net)(\.tr)?$/g;
                var passwordRegex = /^.{6,18}$/g
                
                var userName = document.forms["signupForm"]["userName"].value;
                var userMail = document.forms["signupForm"]["mailAddress"].value;
                var password = document.forms["signupForm"]["userPassword"].value;
                var repeatPassword = document.forms["signupForm"]["repeatUserPassword"].value;
                
                if(!nameRegex.test(userName))
                {
                    showErrorMessage("Adınız tanımlanamadı.");
                    return;
                }
                
                if(!mailRegex.test(userMail))
                {
                    showErrorMessage("Mail adresiniz tanımlanamadı.");
                    return;
                }
                
                if(password != repeatPassword)
                {
                    showErrorMessage("Şifreniz uyuşmuyor.");
                    return;
                }
                
                if(!passwordRegex.test(password))
                {
                    showErrorMessage("Şifreniz en az 6, en fazla 18 karakter olmalıdır.");
                    return;
                }
                
                $.ajax({
                    url:'adduser.php',
                    type: 'post',
                    dataType: 'text',
                    data:{username:userName, usermail:userMail, userpassword:password},
                    success:function(msg){
                        if(msg=="success")
                        {
                            window.location.href = 'index.php';
                        }
                        else
                        {
                            showErrorMessage(msg);
                        }
                    }
                });
                
            }
            
            function showErrorMessage(errorMessage)
            {
                $("#errorText").html(errorMessage).css("display","block");
            }
        
        </script>
    
    </head>
    
    <body>
    
        <?php include("components/loginBar.php"); ?>
        
        <div class="container" style="display:table;height:100%;">
            <div style="display:table-cell;vertical-align:middle;">
                <form name="signupForm" class="form-signin" role="form">
                    <input type="text" name="userName" class="form-control" placeholder="Ad Soyad" required autofocus>
                    <input type="text" name="mailAddress" class="form-control" placeholder="Mail Adresi" required>
                    <input type="password" name="userPassword" class="form-control" placeholder="Şifre" required>
                    <input type="password" name="repeatUserPassword" class="form-control" placeholder="Şifre Tekrarı" required>
                    <p id="errorText" style="display:none;"></p>
                    <button class="btn btn-lg btn-primary btn-block" type="button" onclick="signupFormSubmit()">Kayıt Ol</button>
                </form>
            </div>
        </div>
        
    </body>
    
</html>