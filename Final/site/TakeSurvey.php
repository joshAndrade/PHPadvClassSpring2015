<?php include './bootstrap.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title></title>
    </head>
    <body>
        
        <?php 
            $util = new Util();
            if ( !$util->isLoggedin() ) {
                $util->redirect("Login.php");
            } else {
                echo '<h2>Logged in</h2>';
            }
        ?>
        <div id="header">
            
            <h1>Survey</h1>
            
            <div id="nav">
               
                <a href="index.php">Home</a> 
            
            </div><!-- end nav-->
            
            
        </div><!-- end header-->
        
        
        <div id="main">
            
            Main
    
        </div><!-- end main-->
        
        <div id="sidebar">
            
            SideBar
              
        </div>
        
        <div id="footer">
            
            Footer
            
        </div> 
        
        <?php
        
        ?>
    </body>
</html>