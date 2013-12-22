<?php

    header('Content-type: text/html; charset=utf-8');

    $db = new SQLite3('istanbulweb.db');
    //$db->exec("PRAGMA encoding='UTF-8'");
    //TODO: Status filter is needed.
    $results = $db->query("SELECT id,reportdate,latitude,longtitude,photo,description,category FROM PROBLEMS");

    $motherArray = array();
    $problems = array();
    
    while( $arr = $results->fetchArray(SQLITE3_ASSOC) )
    {
        $p = array();

        $problemid = $arr["id"];
        $categoryid = $arr["category"];
        
        $p["problemid"] = $arr["id"];
        $p["latitude"] = $arr["latitude"];
        $p["longitude"] = $arr["longtitude"];
        $p["photo"] = $arr["photo"];
        $p["description"] = $arr["description"];
        $p["reportdate"] = $arr["reportdate"];
        $p["voteCount"] = $db->querySingle("SELECT count(id) FROM VOTES WHERE problem='$problemid'");
        $p["category"] = $db->querySingle("SELECT categoryName FROM CATEGORY WHERE id='$categoryid'");
        
        array_push($problems, $p);
    }
    
    $db->close();
    
    $motherArray["problems"] = $problems;
    
    echo json_encode($motherArray);

?>