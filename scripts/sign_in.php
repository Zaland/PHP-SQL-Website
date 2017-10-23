<?php
	// start session
	session_start();

	// include the database account information
	require("dbconnect.php");

	// get user information from ajax
    $username = $_GET["username"];
    $password = $_GET["password"];

    // run a query for the username provided by user
    $result = $pdo->query("SELECT * FROM accounts WHERE username = '$username'");
    $pdo = null;

    // if no username exists in the database
    if($result->rowCount() == 0)
        echo "1";

    // check username and password and see if they match
    else
    {
        $row = $result->fetch();
            
        // if the account exists, set the user session
        if($row[1] === $username && $row[2] === $password)
        {
            $_SESSION['user'] = $row[1];
            echo "0";
        }

        // if username and password do not match
        else
            echo "2";
    }
?>
