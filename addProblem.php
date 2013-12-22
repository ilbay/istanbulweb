<?php

    if(isset($_POST["image"]))
    {
        $userid = $_POST["id"];
        $reportdate = $_POST["reportdate"];
        $address = $_POST["address"];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];
        $status = 1;
        $description = $_POST['description'];
        $categoryName = $_POST['category'];
        
        $datetime = date("Y_m_d_H_i");
        $photo = "photos/photo_".$userid."_".$datetime.".jpg";
        $file = fopen($photo, "wb");
        fwrite($file, base64_decode($_POST["image"]));
        fclose($file);
            
        $db = new SQLite3("istanbulweb.db");
        
        $category = $db->querySingle("SELECT id from CATEGORY WHERE categoryName='$categoryName'");
        
        $db->exec("INSERT INTO PROBLEMS(reportdate,reporter,address,latitude,longtitude,status,description,photo,category) VALUES('$reportdate','$userid','$address','$latitude','$longitude','$status','$description','$photo','$category')");
        
        $problemid = $db->lastInsertRowID();
        $db->exec("INSERT INTO VOTES(user,problem) VALUES('$userid','$problemid')");
        
        
        $db->close();
    }

?>