<?php
    // connect to the database
    require("dbconnect.php");
    
    // get user information from ajax
    $username = $_GET["username"];
    $password = $_GET["password"];
    
    // run a query for the username provided by user
    $result = $pdo->query("SELECT * FROM accounts WHERE username = '$username'");

    // check if there are any values in the query completed
    // if there are no values, that means no usernames exist in the database
    // if there is a value, then a username already exists and return an error code
    if($result->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO `accounts` (`id`, `username`, `password`) VALUES (NULL, :username, :password)");
        
        $sql->bindValue(':username', $username);
        $sql->bindValue(':password', $password);
        $sql->execute();
        $pdo = null;

        // check if user was created
        if($sql->rowCount() == 0) 
            echo "2";
        else 
            echo "0";
    }
    else {
        $pdo = null;
        echo "1";
    }