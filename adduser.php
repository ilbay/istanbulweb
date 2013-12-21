<?php

    if(isset($_POST))
    {
        $username = $_POST['username'];
        $password = md5($_POST['userpassword']);
        $mail = $_POST['usermail'];
        
        $db = new SQLite3('istanbulweb.db');
        $res = $db->exec("INSERT INTO USERS(fullname, mail, password) VALUES('$username', '$password', '$mail')");
        $msg = "";
        if($res)
        {
            session_start();
            $_SESSION['userid'] = $db->lastInsertRowID();
            $msg = "success";
        }
        else
        {
            $msg = "$mail adresiyle zaten kayit olmussunuz.";
        }
        
        $db->close();
        echo $msg;
    }

?>