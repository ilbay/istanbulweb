<?php

    if(isset($_POST))
    {
        $usermail = $_POST['usermail'];
        $password = md5($_POST['userpassword']);
                
        $db = new SQLite3('istanbulweb.db');
        
        $res = $db->query("SELECT * from USERS WHERE mail='$usermail' AND password='$password'");

        if($res)
        {
            $user = $res->fetchArray(SQLITE3_ASSOC);
            if($user == FALSE)
            {
                echo "failure";
            }
            else
            {
                session_start();
                $_SESSION["userid"] = $user["id"];
                $_SESSION["usermail"] = $user["mail"];
                $_SESSION["username"] = $user["fullname"];
                echo "success";
            }
        }
        else
        {
            echo "failure";
        }
        
        $db->close();
    }

?>