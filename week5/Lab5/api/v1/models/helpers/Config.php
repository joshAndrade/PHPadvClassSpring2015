<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author 001270562
 */
namespace Lab5\models\services;

use Lab5\models\interfaces\IService;

class Config implements IService 
{
    private $data = false;
    
    public function __construct($iniFile) 
    {
        $this->setData($iniFile);
    }
    
    private function getData()
    {
        return $this->data;
    }
    
    private function setData($iniFile)
    {
        if (!empty($iniFile) && file_exists($iniFile))
        {
            $this->data = parse_ini_file($iniFile, true);
        }
    }
    
    public function getConfigData($section = null, $name = null)
    {
        if(NULL != $section && is_array($this->getData()) && array_key_exists($section, $this->getData()))
        {
            if(NULL !== $name && is_array($this->getData()[$section]) && array_key_exists($name, $this->getData()[$section]))
            {
                return $this->getData()[$section][$name];
            }
            else
            {
                return $this->getData()[$section];
            }
        }
            else
            {
                return $this->getData();
            }
            
            
}}