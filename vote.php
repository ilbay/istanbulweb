<?php

    session_start();
    if(isset($_SESSION['userid']) && isset($_POST))
    {
        $userid = $_SESSION['userid'];
        $problemid = $_POST['problem'];
        
        $db = new SQLite3('istanbulweb.db');
        
        $res = $db->exec("INSERT INTO VOTES(user,problem) VALUES('$userid','$problemid')");
        
        $db->close();
    }

?>