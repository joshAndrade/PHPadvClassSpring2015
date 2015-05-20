<?php
/**
 * Description of ValidationException
 *
 * @author 001270562
 */

namespace Lab5\models\services;

use Exception;

class ValidationException extends Exception
{
    protected  $errors;
    
    public function __construct($errors, $message, $code = 0, Exception $previous = null)
    {
        $this->errors = $errors;
        
        parent::__construct($message, $code, $previous);
    }
    
    public function getErrors()
    {
        return $this->errors;
    }
}
