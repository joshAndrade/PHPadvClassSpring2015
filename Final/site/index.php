<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title></title>
    </head>
    <body>
        <div id="header">
            
            <h1>Header</h1>
            <div id="user">
             <?php 
            $util = new Util();
            if ( !$util->isLoggedin() ) {
                echo'<a href="Register.php">Register</a> &nbsp <a href="Login.php">Login</a>';
            } else {
                echo' <a href="?logout">Logout</a>';
            }
        ?>
            </div>
            
            <div id="nav">
               
                <a href="TakeSurvey.php">Survey</a> 
            
            </div><!-- end nav-->
            
            
        </div><!-- end header-->
        
        
        <div id="main">
            
            <p> Main</p>
    
        </div><!-- end main-->
        
        <div id="sidebar">
            <br />
            <p>SideBar</p>
              
        </div>
        
        <div id="footer">
            
            <p>Footer<p/>
            
        </div> 
        
        <?php
        
        ?>
    </body>
</html>
