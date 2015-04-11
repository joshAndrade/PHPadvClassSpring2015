<?php
namespace week2\jAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>
<!--

Deletes the Email based on the id pulled from the selected email.

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
       
       $emailid = filter_input(INPUT_GET, 'emailid');
               if(NULL !== $emailid)
               {
                   $emailDAO = new EmailDAO($db);
                   
                   if($emailDAO->delete($emailid))
                   {
                       echo "Email Deleted";
                   }
               }
               
               echo '<p><a href="',filter_input(INPUT_SERVER, 'HTTP_REFERER'),'">Back to Previous Page</a></p>';
        ?>
    </body>
</html>
