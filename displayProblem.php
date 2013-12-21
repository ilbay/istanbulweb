<?php
    session_start();
    if(isset($_GET['problem']))
    {
        $problemid = $_GET['problem'];
        $db = new SQLite3('istanbulweb.db');
        
        $res = $db->query("SELECT reportdate,address,description,photo,CATEGORY.categoryName,USERS.fullname FROM PROBLEMS,CATEGORY,USERS WHERE PROBLEMS.id='$problemid' AND USERS.id=PROBLEMS.reporter AND CATEGORY.id=PROBLEMS.category");
        if($res)
        {
            $arr = $res->fetchArray(SQLITE3_ASSOC);
            if($arr)
            {
                $problem = array();
                $problem['reportdate'] = $arr['reportdate'];
                $problem['address'] = $arr['address'];
                $problem['description'] = $arr['description'];
                $problem['photo'] = $arr['photo'];
                $problem['category'] = $arr['categoryName'];
                $problem['username'] = $arr['fullname'];
            }
            else
            {
                header('location:index.php');
            }
        }
        else
        {
            header('location:index.php');
        }
        
        $vote = $db->querySingle("SELECT count(id) FROM VOTES WHERE problem='$problemid'");
        if(!$vote)
        {
            $vote = 1;
        }
        
        $isVoted = true;
        if(isset($_SESSION['userid']))
        {
            $userid=$_SESSION['userid'];
            $res = $db->querySingle("SELECT id from VOTES WHERE problem='$problemid' AND user='$userid'");
            if(!$res)
            {
                $isVoted = false;
            }
        }
        
        $db->close();
    }
?>

<html>
    <head>
    
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    
        <title>PROBLEM - <?php echo $problem["category"]; ?></title>
        
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
        
        <script type="text/javascript">
        
            function vote()
            {
                $.ajax({
                    url : 'vote.php',
                    type : 'post',
                    dataType : 'text',
                    data : {problem : <?=$problemid;?>},
                    success : function()
                    {
                        $("#voteButton").remove();
                        $("#voteCount").html(parseInt($("#voteCount").html())+1);
                    }
                });
            }
        
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
        
        <div class="container">
            <div class="jumbotron">
                <p><img src="<?php echo $problem['photo'];?>" style='width:100%;'></p>
                <h2><?php echo $problem['category']; ?></h2>
                <p><?php echo $problem['description']; ?></p>
                <p></p>
                <p style='font-size:12px;'>Adres: <?php echo $problem['address']; ?></p>
                <p style='font-size:12px;'>Tarih: <?php echo $problem['reportdate']; ?></p>
                <p>
                    <span style='font-size:12px;font-weight:bold;'><span id="voteCount"><?php echo $vote; ?></span> kişi bu problemi destekledi.</span>
                    <?php 
                        if(!$isVoted)
                        {
                             echo '<button onclick="vote()" id="voteButton" class="btn btn-lg btn-danger" type="button" role="button">Destekle +1</button>';
                        }
                    ?>
                </p>
            </div>
        </div>
    
    </body>
    
</html>