<?php

/**
 * Description of Validator
 *
 * @author 001270562
 */

namespace Lab5\models\services;

use Lab5\models\interfaces\IService;

class Validator implements IService {
    
    
    
    /**
     * A method to check if an email is valid.
     *
     * @param {String} [$email] - must be a valid email
     *
     * @return boolean
     */
    public function emailIsValid($email) {
        return ( is_string($email) && !empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL) !== false );
    }
    
    
    /**
     * A method to check if a email type is valid.
     *
     * @param {String} [$type] - must be a valid string
     *
     * @return boolean
     */
    public function emailTypeIsValid($type) {
        return ( is_string($type) && preg_match("/^[a-zA-Z]+$/", $type) );
    }
    
    /**
     * A method to check if a email type is valid.
     *
     * @param {String} [$type] - must be a valid string
     *
     * @return boolean
     */
    public function activeIsValid($type) {
        return ( (is_string($type) || is_numeric($type)) && preg_match("/^[0-1]$/", $type) );
    }
}