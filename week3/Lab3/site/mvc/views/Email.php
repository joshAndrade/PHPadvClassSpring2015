<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            if($scope->util->isPostRequest())
        {
            if(isset($scope->view['errors']) )
            {
                print_r($scope->view['errors']);
            }
            
            if(isset($scope->view['saved']) && $scope->view['saved'])
            {
                echo 'Email added';
            }
            
            if(isset($scope->view['deleted']) && $scope->view['deleted'])
            {
                echo 'Email deleted';
            }
        }
        
        $email = $scope->view['model']->getEmail();
        $active = $scope->view['model']->getActive();
        $emailTypeid = $scope->view['model']->getEmailtypeid();
        
       
        
       
        ?>
        
        <h3>Add Email</h3>
        <form action="#" method="post">
            <label>Email:</label> 
            <input type="text" name="email" value="<?php echo $email; ?>" placeholder="" />
            <label>Active:</label>
            <input type="number" max="1" min="0" name="Active" value="<?php echo $active; ?>" />
            <br />
            <br />
            <label>Email:</label>
            <select name="emailtype">
                <?php
                    foreach($scope->view['EmailTypes'] as $value)
                    {
                        if($value->getEmailtypeid() == $emailTypeid)
                        {
                            echo '<option value="',$value->getEmailtypeid(),'" selected=selected">',$value->getEmailtype(),'</option>';
                        } 
                        else 
                        {
                            echo '<option value="',$value->getEmailtypeid(),'">',$value->getEmailtype(),'</option>';
                    
                        }
                    }
                ?>
            </select>
            <input type="hidden" name="action" value="create" />
            <input type="submit" value="Submit" />
        </form>
         <br />
         <br />
         
        <form action="#" method="post">
            <input type="hidden" name="action" value="add" />
            <input type="submit" value="ADD Page" /> 
        </form>
        
         <?php
        
        if(count($scope->view['Emails']) <= 0)
        {
            echo '<p>No Data</p>';
        }
        else
        {
           echo '<table border="1" cellpadding="5"><tr><th>Email</th><th>Email Type</th><th>Last Updated</th><th>Logged</th><th>Active</th><th></th></tr>'; 
           foreach($scope->view['Emails'] as $value)
           {
               echo '<tr>';
               echo '<td>', $value->getEmail(), '</td>';
               echo '<td>', $value->getEmailtype(), '</td>';
               echo '<td>', date("F j, Y g:i(s) a", strtotime($value->getLastupdated())),'</td>';
               echo '<td>', date("F j, Y g:i(s) a", strtotime($value->getLogged())),'</td>';
               echo '<td>', ($value->getActive() == 1 ? 'Yes' : 'No'), '</td>';
               echo '<td><form action="#" method="post"><input type="hidden" name="emailtypeid" value="',$value->getEmailtypeid(),'" /><input type="hidden" name="action" value="edit" /><input type="submit" value="EDIT" /> </form></td>';
               echo '<td><form action="#" method="post"><input type="hidden"  name="emailtypeid" value="',$value->getEmailtypeid(),'" /><input type="hidden" name="action" value="delete" /><input type="submit" value="DELETE" /> </form></td>';
               echo '</tr>';
           }
           echo '</table>';
        }
        
            
            ?>
    </body>
</html>
