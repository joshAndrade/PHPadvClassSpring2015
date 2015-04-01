
<?php include 'EmailTypeDB.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        
 
        <?php
        
$util = new Util();
$validator = new Validator();
$EmailType = new EmailTypeDB();

$emailType = filter_input(INPUT_POST, 'emailtype');

$errors = array();

if ( $util->isPostRequest() ) {

    if ( !$validator->emailTypeIsValid($emailType) ) {
        $errors[] = 'Email type is not valid';
    }
}

if ( count($errors) > 0 ) {
    foreach ($errors as $value) {
        echo '<p>',$value,'</p>';
    }
} else {
    
    //save to to database.
    $EmailType->sendToDB($emailType);
    
    }       



        ?>
        
         <h1>Please enter Email Type</h1>
        
         <form action="#" method="Post">
            <label>Email Type:</label>
            <input type="text" name="emailtype" value="<?php echo $emailType; ?>" placeholder="" />

            <input type="submit" value="Submit"/>
                
        </form>
         
    <?php 
    
    $EmailType->displayEmailType($emailType);
    
    ?>
         
         
         
    </body>
</html>
        
        
        
        
        
    </body>
</html>
