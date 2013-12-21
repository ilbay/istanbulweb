    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">İSTANBUL</a>
            </div>
            <div class="navbar-collapse collapse">
                <div class="navbar-form navbar-right">
                    <span style="color:#ffffff">Hoşgeldiniz <?php echo $_SESSION['username'];?>,</span>
                    <a href="logout.php" style="color:#ffffff;font-weight:bold;"><u>Çıkış</u></a>
                </div>
            </div>
        </div>
    </div>