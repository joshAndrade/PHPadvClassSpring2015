<?php 
namespace week2\jAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>
<!--

Updates Email type based on the id pulled from the selected type.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $dbConfig = array(
            "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
            "DB_USER"=>'root',
            "DB_PASSWORD"=>''
        );
        
        $pdo = new DB($dbConfig);
        $db = $pdo->getDB();
        
        $emailType = filter_input(INPUT_GET , 'emailtype');
        $active = filter_input(INPUT_GET, 'active');
        
        
        echo $emailType;
        echo $active;
        
        $util = new Util();
        $emailTypeDAO = new EmailTypeDAO($db);
        
        
        
       ?>
        <h3>Add Email type</h3>
        <form action="#" method="post">
            <label>Email Type:</label>
            <input type="text" name="emailtype" value="<?php echo $emailType ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?> " />
            <br /><br />
            <input type="submit" value="Submit" />
        </form>
        
        
        <?php
        
        
        
        ?>
    </body>
</html>
