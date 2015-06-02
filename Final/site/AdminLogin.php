<?php 
namespace finalProject\JAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title>Admin Login</title>
    </head>
    <body>
        <?php
        $util = new Util();
        
        if($util->isPostRequest())
        {
            $db = new DB($dbConfig);
            $model = new RegisterModel();
            $registerDAO = new RegisterDAO($db->getDB(), $model);
                
            $model->map(filter_input_array(INPUT_POST));
            
            if ($registerDAO->login($model))
            {
                echo 'Now logged in.';
                $util->setLoggedin(true);
                $util->redirect('adminhome.php');
            }
            else
            {
                echo 'Login Failed.';
            }
        }
        
        
        ?>
        <div id="logAndReg">
        <h1>Admin Login</h1>
        <form action="#" method="POST">
            
           User Name : <input type="text" name="user" value="" /> <br />
           Password : <input type="password" name="password" value="" /> <br /> 
            <br />
            <input type="submit" value="Login" />
            
        </form>
        &nbsp&nbsp<a href="index.php">Back to Home.</a>
        </div>
    </body>
</html>
