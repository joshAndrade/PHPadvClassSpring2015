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
            
            <h1>Survey</h1>
            <div id="user">
            <?php 
            $util = new Util();
            if ( !$util->isLoggedin() ) {
                $util->redirect("Login.php");
            } else {
                echo' <a href="?logout">Logout</a>';
            }
        ?>
            </div> <!-- end user-->
            
            <div id="nav">
               
                <a href="index.php">Home</a> 
            
            </div><!-- end nav-->
            
            
        </div><!-- end header-->
        
        
        <div id="main">
            
            <p>Main</p>
    
        </div><!-- end main-->
        
        <div id="sidebar">
            <br />
            <p>SideBar</p>
              
        </div>
        
        <div id="footer">
            
            <p>Footer</p>
            
        </div> 
        
        <?php
        
        ?>
    </body>
</html>