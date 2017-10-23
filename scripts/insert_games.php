<?php
    // connect to the database
    require("dbconnect.php");
    
    // get user information from ajax
    $name = $_GET["name"];
    $developer = $_GET["developer"];
    $publisher = $_GET["publisher"];
    $price = $_GET["price"];
    
    // run a query for the same game name
    $result = $pdo->query("SELECT * FROM games WHERE name = '$name'");

    // check if there are any values in the query completed
    // if there are no values, that means there doesnt exist a game with the same name in the database
    if($result->rowCount() == 0) {
        $sql = $pdo->prepare("INSERT INTO `games` (`id`, `name`, `developer`, `publisher`, `price`) VALUES (NULL, :name, :developer, :publisher, :price)");
        
        $sql->bindValue(':name', $name);
        $sql->bindValue(':developer', $developer);
        $sql->bindValue(':publisher', $publisher);
        $sql->bindValue(':price', $price);
        $sql->execute();
        $pdo = null;

        // check if game was added
        if($sql->rowCount() == 0) 
            echo "1";
        else 
            echo "0";
    }

    // otherwise there may be a game with the same name and developer and publisher
    // if there doesnt exist a game with the same values, then add it to the database
    else {
        // loop through all names that were gathered with previous query
        // if a game with same name, developer, and publisher is found, set match to true and break
        $match = false;
        while($row = $result->fetch()) {
            if($name == $row[1] && $developer == $row[2] && $publisher == $row[3]) {
                $match = true;
                break;
            }
        }
        
        // if a game has same parameters, then it already exists in database
        if($match == true) {
            $pdo = null;
            echo "2";
        }
        
        // otherwise add the game to the database
        else {
            $sql = $pdo->prepare("INSERT INTO `games` (`id`, `name`, `developer`, `publisher`, `price`) VALUES (NULL, :name, :developer, :publisher, :price)");
        
            $sql->bindValue(':name', $name);
            $sql->bindValue(':developer', $developer);
            $sql->bindValue(':publisher', $publisher);
            $sql->bindValue(':price', $price);
            $sql->execute();
            $pdo = null;

            // check if game was added
            if($sql->rowCount() == 0) 
                echo "1";
            else 
                echo "0";
        }
    }
?>