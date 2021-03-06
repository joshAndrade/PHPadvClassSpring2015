<?php 
namespace week2\jAndrade;
include './bootstrap.php'; ?>
<!DOCTYPE html>

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
        
        $email = filter_input(INPUT_POST, 'email');
        $emailtypeid = filter_input(INPUT_POST, 'emailtypeid');
        $active = filter_input(INPUT_POST, 'active');
        
        $util = new Util();
        $emailTypeDAO = new EmailTypeDAO($db);
        $emailDAO = new EmailDAO($db);
        
        $emailTypes = $emailTypeDAO->getAllRows();
        
        if($util->isPostRequest())
        {
            $validator = new Validator();
            $errors = array();
            
            if(!$validator->emailIsValid($email))
            {
                $errors[] = 'Email is invalid.';
            }
            
            if(!$validator->emailTypeIsValid($emailtypeid))
            {
                $errors[] = 'Email type is invalid';
            }
            
            if(!$validator->activeIsValid($active))
            {
                $errors[] = 'Active is invalid';
            }
            
            if(count($errors) > 0)
            {
                foreach($errors as $value)
                    echo'<p>', $value ,'</p>';
            }
            else
            {
                $emailModel = new EmailModel();
                
                $emailModel->map(filter_input_array(INPUT_POST));
                
                
                if($emailDAO->save($emailModel))
                {
                    echo'Email added.';
                }
            }
            
            
            }
        ?>
        
        <h3>Add Email</h3>
        <form action="#" method="post">
            <label>Email:</label>            
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" />
            
            <br /><br />
            
            <label>Active:</label>
            <input type="number" max="1" min="0" name="active" value="<?php echo $active; ?>" />
            
            <br /><br />
            
            <label>Email Type:</label>
            <select name="emailtypeid">
            <?php 
                foreach ($emailTypes as $value) 
                    {
                    if ( $value->getEmailtypeid() == $emailtypeid) 
                    {
                        echo '<option value="',$value->getEmailtypeid(),'" selected="selected">',$value->getEmailtype(),'</option>';  
                    } else {
                        echo '<option value="',$value->getEmailtypeid(),'">',$value->getEmailtype(),'</option>';
                    }
                }
            ?>
            </select>
            
             <br /><br />
            <input type="submit" value="Submit" />
        </form>
         
            <table border="1" cellpadding="5">
                <tr>
                    <th>Email</th>
                    <th>Email Type</th>
                    <th>Last updated</th>
                    <th>Logged</th>
                    <th>Active</th>
                    
                </tr>
                
        <?php
            $emails = $emailDAO->getAllRows();
            
           
            foreach($emails as $value)
            {
                
                echo '<tr><td>',$value->getEmail(),'</td><td>',$value->getEmailtype(),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLastupdated())),'</td><td>',date("F j, Y g:i(s) a", strtotime($value->getLogged())),'</td>';
                echo '<td>',($value->getActive() == 1 ? 'Yes' : 'No'), '</td>';
                echo '<td><a href="DeleteEmail.php?emailid=' . $value->getEmailid() . '">Delete</a>  ' . '  <a href="UpdateEmail.php?emailid=' . $value->getEmailid() . '">Update</a></td></tr>';
                
            }
        
        ?>
            </table>
                
    </body>
</html>
