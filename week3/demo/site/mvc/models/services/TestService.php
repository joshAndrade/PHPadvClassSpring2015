<?php



/**
 * Description of TestService
 *
 * @author 001270562
 */
class TestService implements IService{
    
    public function validateForm($email)
    {
        if(!empty($email))
        {
            return true;
        }
        else
        {
        return false;
        }
        
    }
}
