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
                                    <th> Price </th>";
        
        // add two more options for users that are logged in
        if(isset($_SESSION['user'])) {
            echo "                  <th> </th>
                                    <th> </th>";
        }                            
        
        echo "                  </tr>
                            </thead>
                            <tbody>";
        
        // loop through all rows in array
        while($row = $result->fetch())
        {
            echo "              <tr class='table-elements ".$row[0]."'>
                                    <td id='1'>".$row[1]."</td>
                                    <td id='2'>".$row[2]."</td>
                                    <td id='3'>".$row[3]."</td>
                                    <td id='4'>".$row[4]."</td>";
            
            // add two more options for users that are logged in
            if(isset($_SESSION['user'])) { 
                echo "              <td><a class='edit-game' href='#' id='$row[0]'><span class='glyphicon glyphicon-pencil'></span></a></td>           
                                    <td><a class='delete-game' href='#' id='$row[0]'><span class='glyphicon glyphicon-remove'></span></a></td>";
            }
            
            echo "              </tr>";
        }               
        
        echo "              </tbody>
                        </table>
                    </div>
                </div>
                <div class='container edit-form hide-content'>
                    <div class='col-lg-6 col-md-6 col-sm-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-1'>
                        <div class='jumbotron'>
                            <h4 class='form-title'> Update Game </h4>
                            <form>
                                <fieldset>
                                    <div class='form-group'>
                                        <label> Name </label>
                                        <input type='text' id='edit-name' class='form-control' placeholder='Enter Name'>
                                    </div>
                                    <div class='form-group'>
                                        <label> Developer </label>
                                        <input type='text' id='edit-developer' class='form-control' placeholder='Enter Developer'>
                                    </div>
                                    <div class='form-group'>
                                        <label> Publisher </label>
                                        <input type='text' id='edit-publisher' class='form-control' placeholder='Enter Publisher'>
                                    </div>
                                    <div class='form-group'>
                                        <label> Price </label>
                                        <input type='text' id='edit-price' class='form-control' placeholder='Enter Price'>
                                    </div>
                                    <input type='submit' value='Update Game' class='btn btn-custom btn-lg btn-block update-btn'/>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>";
    }
    
    // load the footer content
    require("content/footer.php");
?>
