<?php
    // load the header content
    require("content/header.php");

    // load the navbar
    require("content/navbar.php");

    // connect to the databse
    require("scripts/dbconnect.php");

    // grab all the content from the database and store it in result, then close the database
    $result = $pdo->query("SELECT * FROM games");
    $pdo = null;

    // if no data found, echo nothing
    if($result->rowCount() == 0)
    {
        echo "  <div class='container'>
                    <div class='jumbotron'>
                        <h2 class='home-title'> Nothing in database. </h2>
                    </div>
                </div>";
    }
    else
    {
        // set up the table with appropriate headers
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

    require("content/footer.php");
?>
