<?php
namespace finalProject\JAndrade;
/**
 *
 * @author 001270562
 */
interface IModel {
    /**
     * 
     * 
     * 
     */
    public function reset();
    
    /**
     * 
     * @param array $values
     * 
     */   
    public function map(array $values);
}
