<?php
    // load the header content
    require("content/header.php");

    // load the navbar
    require("content/navbar.php");
?>
    
            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-1">
                    <div class="addgame-alerts"></div>
                    <div class="jumbotron">
                        <h4 class="register-title"> Add Game </h4>
                        <form>
                            <fieldset>
                                <div class="form-group">
                                    <label> Name </label>
                                    <input type="text" id="name" class="form-control" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label> Developer </label>
                                    <input type="text" id="developer" class="form-control" placeholder="Enter Developer">
                                </div>
                                <div class="form-group">
                                    <label> Publisher </label>
                                    <input type="text" id="publisher" class="form-control" placeholder="Enter Publisher">
                                </div>
                                <div class="form-group">
                                    <label> Price </label>
                                    <input type="text" id="price" class="form-control" placeholder="Enter Price">
                                </div>
                                <input type="submit" value="Add Game" class="btn btn-custom btn-lg btn-block addgame-btn"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

<?php
    // load the footer content
    require("content/footer.php");
?>
