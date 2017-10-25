<?php
    // connect to the databse
    require("scripts/dbconnect.php");

    // grab the game information from the database and then close the connection to the database
    $result = $pdo->query("SELECT * FROM games");
    $pdo = null;

    // parse the result into array
    $row = $result->fetch();

    // return the data as a json to easily access in javascript
    echo json_encode(array($row[1], $row[2], $row[3], $row[4]));
?>