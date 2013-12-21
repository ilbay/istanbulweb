<?php

    header('Content-type: text/html; charset=iso-8859-9');

    $db = new SQLite3('istanbulweb.db');
    $db->exec("PRAGMA encoding='UTF-8'");
    //TODO: Status filter is needed.
    $results = $db->query("SELECT reportdate,latitude,longtitude,photo,description FROM PROBLEMS");

    $motherArray = array();
    $problems = array();
    
    while( $arr = $results->fetchArray(SQLITE3_ASSOC) )
    {
        $p = array();
        
        $p["latitude"] = $arr["latitude"];
        $p["longitude"] = $arr["longtitude"];
        $p["photo"] = $arr["photo"];
        $p["description"] = utf8_encode($arr["description"]);
        $p["reportdate"] = $arr["reportdate"];
        
        array_push($problems, $p);
    }
    
    $db->close();
    
    $motherArray["problems"] = $problems;
    
    echo json_encode($motherArray);

?>