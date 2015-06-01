<?php include './bootstrap.php'; ?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/Style.css">
        <title></title>
    </head>
    <body>
        
            
            
        
        <div id="logAndReg">
        <h1>Create Account</h1>
        <form action="#" method="POST">
            
            UserName : <input type="text" name="user" value="" /> <br />
            Password : <input type="password" name="password" value="" /> 
            <br />
            <br />
            <input type="submit" value="Register" />
            
            <?php
            
            $util = new Util();
            $user = filter_input(INPUT_POST, 'user');
            $password = filter_input(INPUT_POST, 'password');
            if($util->isPostRequest())
            {
                $db = new DB($dbConfig);
                $model = new RegisterModel();
                $registerDAO = new RegisterDAO($db->getDB(), $model);
                $validator = new Validator();
                $errors = array();
                
                if(!$validator->userIsValid($user))
                {
                    $errors[] = 'User name is invalid.';
                }
                if(!$validator->passIsValid($password))
                {
                    $errors[] = 'Password is invalid.';
                }
                
                if(count($errors) > 0 )
                {
                    foreach($errors as $value)
                    {
                        echo '<p>',$value,'</p>';
                    }
                }
                else {
                $model->map(filter_input_array(INPUT_POST));
                
                
                
                if($registerDAO->create($model))
                {
                    echo'<p>Account Created.<p>';
                }
                else
                {
                    echo '<p>Registration failed.<p>';
                }
                }
            }
            ?>
            
        </form>
        <br />
        &nbsp&nbsp<a href="index.php">Back to Home.</a>
        </div>
    </body>
</html>
