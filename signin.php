<?php

    if(isset($_POST))
    {
        $usermail = $_POST['usermail'];
        $userpassword = md5($_POST['password']);
                
        $db = new SQLite3('istanbulweb.db');
        
        $arr = $db->querySingle("SELECT * from USERS WHERE mail='$usermail' AND password='$userpassword'", true);
        if($arr)
        {
            $result = array();
            $result["id"] = $arr["id"];
            $result["name"] = $arr["fullname"];
            $result["mail"] = $arr["mail"];
            $result["status"] = "success";
            echo json_encode(array("result" => $result));
        }
        else
        {
            echo json_encode(array("result" => array("status"=>"failure")));
        }
        
        $db->close();
    }

?>