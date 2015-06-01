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
            
            if($util->isPostRequest())
            {
                $db = new DB($dbConfig);
                $model = new RegisterModel();
                $registerDAO = new RegisterDAO($db->getDB(), $model);
                
                $model->map(filter_input_array(INPUT_POST));
                
                if($registerDAO->create($model))
                {
                    echo'<h3>Account Created.</h3>';
                }
                else
                {
                    echo '<h3>Registration failed.</h3>';
                }
                
            }
            
            
        ?>
        
        <h1>Create Account</h1>
        <form action="#" method="POST">
            
            UserName : <input type="text" name="user" value="" /> <br />
            Password : <input type="password" name="password" value="" /> 
            <br />
            <br />
            <input type="submit" value="Register" />
            
        </form>
        <a href="index.php">Back to Home.</a>
        
    </body>
</html>
