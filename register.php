<?php
    // load the header content
    require("content/header.php");

    // load the navbar
    require("content/navbar.php");
?>

            <div class="container">
                <div class="col-lg-6 col-md-6 col-sm-10 col-lg-offset-3 col-md-offset-3 col-sm-offset-1">
                    <div id="register-alerts"></div>
                    <div class="jumbotron">
                        <h4 class="register-title"> Registration Form </h4>
                        <form>
                            <fieldset>
                                <div class="form-group">
                                    <label> Username </label>
                                    <input type="text" id="username" class="form-control" placeholder="Enter Username">
                                </div>
                                <div class="form-group">
                                    <label> Password </label>
                                    <input type="password" id="password1" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label> Confirm Password </label>
                                    <input type="password" id="password2" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="checkbox">
                                    <input class="showpass" type="checkbox" onclick="showPasswordReg()">
                                    <label> Show Password </label>
                                </div>
                                <input type="submit" value="Register" id="register" class="btn btn-custom btn-lg btn-block"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>

<?php
    // load the footer content
    require("content/footer.php");
?>