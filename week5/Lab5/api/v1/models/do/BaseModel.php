<?php
/**
 * Description of BaseModel
 *
 * @author 001270562
 */

namespace Lab5\models\services;

use Lab5\models\interfaces\IModel;

class BaseModel implements IModel 
{
    
    public function map(array $values) {
        
        foreach ($values as $key => $value) {
           $method = 'set' . $key;
            if ( method_exists($this, $method) ) {
                $this->$method($value);
            }       
        } 
        return $this;
    }
    
    public function reset() {
        
        $class_methods = get_class_methods($this);

        foreach ($class_methods as $method_name) {
           if ( strrpos($method_name, 'set', -strlen($method_name)) !== FALSE ) {
               $this->$method_name('');
           }
            
        } 
         return $this;
    }
    
    public function getAllPropteries() {
        $class_methods = get_class_methods($this);
        $thisFunc = __FUNCTION__;
        $values = array();       
        
        foreach ($class_methods as $method_name) {
            if ( $method_name !== $thisFunc &&  strrpos($method_name, 'get', -strlen($method_name)) !== FALSE ) {                
                $var_name = strtolower(substr($method_name, 3));              
                $values[$var_name] = $this->$method_name();
            }           
        }

        return $values; 
        
    }
}