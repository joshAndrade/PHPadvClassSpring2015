<?php

/**
 * Description of EmailTypeDAO
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IModel;
use Lab3\models\interfaces\ILogging;
use \PDO;

abstract class BaseDAO 
{
    
    protected $DB = null;
    protected $model;
    protected $log = null;
    
   protected function getDB() 
    {
        return $this->DB;
    }

    protected function getModel() 
    {
        return $this->model;
    }

    protected function getLog() 
    {
        return $this->log;
    }

    protected function setDB(PDO $DB) 
    {
        $this->DB = $DB;
    }

    protected function setModel(IModel $model) 
    {
        $this->model = $model;
    }

    protected function setLog(ILogging8$log) 
    {
        if($log instanceof ILogging )
        {
        $this->log = $log;
        }
    }


    
    
}
