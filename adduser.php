<?php

    if(isset($_POST))
    {
        $username = $_POST['username'];
        $password = md5($_POST['userpassword']);
        $mail = $_POST['usermail'];
        
        $db = new SQLite3('istanbulweb.db');
        $res = $db->exec("INSERT INTO USERS(fullname, mail, password) VALUES('$username', '$mail', '$password')");
        $msg = "";
        if($res)
        {
            session_start();
            $_SESSION['userid'] = $db->lastInsertRowID();
            $_SESSION['username'] = $username;
            $_SESSION['usermail'] = $mail;
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