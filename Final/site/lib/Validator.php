<?php
namespace finalProject\JAndrade;
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
    
    public function firstIsValid($first)        
    {
        return (is_string($first) && !empty($first));
    }
    
    public function lastIsValid($last)        
    {
        return (is_string($last) && !empty($last));
    }
    
    public function genderIsValid($gender)        
    {
        return (isset($gender));
    }
    
    public function cityIsValid($city)        
    {
        return (!empty($city));
    }
    
    public function stateIsValid($state)        
    {
        return (!empty($state));
    }
    
    public function sportIsValid($sport)        
    {
        return (isset($sport));
    }
    
    public function musicIsValid($music)
    {
        return (isset($music));
    }
}
