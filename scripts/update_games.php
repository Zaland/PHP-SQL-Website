<?php
    // connect to the databse
    require("dbconnect.php");

    // grab the values from AJAX and store it in variables
    $id = $_GET['id'];
    $name = $_GET['name'];
    $developer = $_GET['developer'];
    $publisher = $_GET['publisher'];
    $price = $_GET['price'];

    // update the game into the database
    $pdo->query("UPDATE `games` SET `name`='$name', `developer`='$developer', `publisher`='$publisher', `price`='$price' WHERE `id`='$id'");

    // close the connection with the database
    $pdo = null;
?>
