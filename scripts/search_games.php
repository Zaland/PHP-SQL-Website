<?php
    // include the database account information
	require("dbconnect.php");

	// get user information from ajax
    $name = $_GET["name"];
    $developer = $_GET["developer"];
    $publisher = $_GET["publisher"];

    // go through various queries depending on which if statement applies
    if($name != "" && $developer == "" && $publisher == "")
        $result = $pdo->query("SELECT * FROM games WHERE name = '$name'");
    else if($name != "" && $developer != "" && $publisher == "")
        $result = $pdo->query("SELECT * FROM games WHERE name = '$name' AND developer = '$developer'");
    else if($name != "" && $developer != "" && $publisher != "")
        $result = $pdo->query("SELECT * FROM games WHERE name = '$name' AND developer = '$developer' AND publisher = '$publisher'");
    else if($name == "" && $developer != "" && $publisher == "")
        $result = $pdo->query("SELECT * FROM games WHERE developer = '$developer'");
    else if($name == "" && $developer != "" && $publisher != "")
        $result = $pdo->query("SELECT * FROM games WHERE developer = '$developer' AND publisher = '$publisher'");
    else if($name == "" && $developer == "" && $publisher != "")
        $result = $pdo->query("SELECT * FROM games WHERE publisher = '$publisher'");
    else if($name != "" && $developer == "" && $publisher != "")
        $result = $pdo->query("SELECT * FROM games WHERE name = '$name' AND publisher = '$publisher'");

    // close connection with database
    $pdo = null;

    // check if there are any results
    if($result->rowCount() == 0)
        echo "1";
    
    // if there are results, echo the table to be sent to user
    else {
        echo "  <div class='container'>
                    <div class='panel'>
                        <table class='table table-striped table-hover'>
                            <thead>
                                <tr>
                                    <th> Name </th>
                                    <th> Developer </th>
                                    <th> Publisher </th>
                                    <th> Price </th>
                                    <th> </th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody>";
        
        // loop through all rows in array
        while($row = $result->fetch())
        {
            echo "              <tr class='table-elements'>
                                    <td>".$row[1]."</td>
                                    <td>".$row[2]."</td>
                                    <td>".$row[3]."</td>
                                    <td>".$row[4]."</td>
                                    <td><a href='#'><span class='glyphicon glyphicon-pencil'></span></a></td>
                                    <td><a href='#' id='$row[0]'><span class='glyphicon glyphicon-remove'></span></a></td>
                                </tr>";
        }               
        
        echo "              </tbody>
                        </table>
                    </div>
                </div>";
    }
?>