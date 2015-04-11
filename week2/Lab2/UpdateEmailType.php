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
        
       
        
        $util = new Util();
        $emailTypeDAO = new EmailTypeDAO($db);
        $validator = new Validator();
        $emailTypeModel = new EmailTypeModel();
        
        
        if ( $util->isPostRequest() ) 
        {
            
            $emailTypeModel->map(filter_input_array(INPUT_POST));
                       
        } else {
            $emailTypeid = filter_input(INPUT_GET, 'emailtypeid');
            $emailTypeModel = $emailTypeDAO->getById($emailTypeid);
        }
        
        
        $emailTypeid = $emailTypeModel->getEmailtypeid();
        $emailType = $emailTypeModel->getEmailtype();
        $active = $emailTypeModel->getActive(); 
        
        
          
        
        var_dump($emailTypeModel);
        
       ?>
        <h3>Update Email type</h3>
        <form action="#" method="post">
            <label>Email Type:</label>
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />
            <br /><br />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?> " />
            <br /><br />
            <input type="submit" value="Submit" />
        </form>
        
        
        
    </body>
</html>
