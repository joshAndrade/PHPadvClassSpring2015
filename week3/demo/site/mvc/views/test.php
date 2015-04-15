<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>Test</h1>
        <?php
        if(isset($scope->view['email']))
        {
            echo $scope->view['email'];
        }
        ?>
        <form action="#" method="post">
            <input type="text" name="email"/>
            <input type="submit" name="submit"/>
            
        </form>
        
        
        <?php
        echo $scope->view['test1'];
       
        ?>
    </body>
</html>
