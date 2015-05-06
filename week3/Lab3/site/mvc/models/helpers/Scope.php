<?php



/**
 * Description of Scope
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IService;

class Scope implements IService
{
    private $data = array();
    
    public function __construct() 
    {
        $this->data = array();
    }
    
    public function __get($varName)
    {
        if (!array_key_exists($varName, $this->data))
        {
            throw new ScopeVarNotFound('Scope variable ' . $varName . 'not found or set.');
        }
        else 
        {
            return $this->data[$varName];
        }
    }
    
    public function __set($varName, $value) 
    {
        $this->data[$varName] = $value;      
    }
}
