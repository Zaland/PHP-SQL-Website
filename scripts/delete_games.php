<?php
    // include the database account information
    require("dbconnect.php");

    // store the value of the ID to delete
    $id = $_GET['id'];

    // delete the game from the database and then close the connection
    $pdo->query("DELETE FROM games WHERE ID = '$id'");
    $pdo = null;
?>
