<?php
/**
 * Description of Validator
 *
 * @author 001270562
 */
class Validator {
    
    public function userIsValid($user) {
        return ( is_string($user) && !empty($user));
    }
    
    public function passIsValid($pass) {
        return ( is_string($pass) && !empty($pass));
    }
    
}
