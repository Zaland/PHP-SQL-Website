<?php session_start() ?>        

        <div class="container">
            <div class="navbar navbar-default">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> PHP-SQL-Website </a>
                </div>
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                    <ul class="nav navbar-nav">
                        <li id="home"><a href="index.php"> Home </a></li>
                        <li id="viewgames"><a href="viewgames.php"> View Games </a></li>
                        <li id="searchgame"><a href="searchgames.php"> Search Game </a></li>
                        <?php if(isset($_SESSION['user'])) { echo '<li id="addgames"><a href="addgames.php"> Add Game </a></li>'; } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php
                            if(isset($_SESSION['user'])) { 
                                echo '  <li><a> Welcome back '.$_SESSION['user'].' </a></li>
                                        <li id="logout"><a href="scripts/sign_out.php"> Logout </a></li>';
                            }
                            else {
                                echo '  <li id="register"><a href="register.php"> Register </a></li>
                                        <li id="login"><a href="login.php"> Login </a></li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>