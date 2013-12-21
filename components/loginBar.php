    <script type="text/javascript">
    
        function signinFormSubmit()
        {
            var usermail = document.forms["signinForm"]["mail"].value;
            var userpassword = document.forms["signinForm"]["password"].value;
            
            $.ajax({
                url : 'login.php',
                type : 'post',
                dataType : "text",
                data : {usermail : usermail, userpassword : userpassword},
                success : function(msg)
                {
                    if(msg == "success")
                    {
                        window.location.reload();
                    }
                    else
                    {
                        alert("Giris basarisiz.");
                    }
                }
            });
        }
    
    </script>


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">&#304;STANBUL</a>
            </div>
            <div class="navbar-collapse collapse">
                <form name="signinForm" class="navbar-form navbar-right" role="form">
                    <div class="form-group">
                        <input name="mail" type="text" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input name="password" type="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="button" class="btn btn-success" onclick="signinFormSubmit()">Sign in</button>
                    <button type="button" class="btn" onclick="window.location='signup.php'">Sign up!</button>
                </form>
            </div>
        </div>
    </div>