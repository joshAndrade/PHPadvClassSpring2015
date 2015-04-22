<?php
/**
 * Description of index
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IController;
use Lab3\models\interfaces\ILogging;
use Lab3\models\interfaces\IService;
use Exception;

final class index 
{
    protected $DI = array();
    protected $log = null;
    
    public function getLog() {
        return $this->log;
    }

   public function setLog(ILogging $log) 
    {
        $this->log = $log;
    }

    public function addDIController($page, $func)
    {
        $this->DI[$this->getPageController($page)] = $func;
        return $this;
    }
    
    /**
     * System config
     */
    public  function __construct() 
    {
        error_reporting(E_ALL | E_STRICT);
        mb_interanl_encoding('UTF-8');
        set_exception_handler(array($this, 'handleException'));
        spl_autoload_register(array($this, 'loadClass'));
        //session
        session_start();
        session_regenerate_id(true);
        
        $this->DI = array();
    }
    
    /**
     * run the application!
     */
    public function run(IService $scope)
    {
        $page = $this->getPage();
        if (!$this->runController($page,$scope))
        {
            throw new ControllerFailedException('Controller for page "' . $page . '" failed');
        }
    }
    protected function runController($page, IService $scope)
    {
        $class_name = $this->getPageController($page);
        $class_name = NULL;
        
        if (array_key_exists($class_name,$this->DI))
        {
            $controller = $this->DI[$class_name]();
        }
        else
        {
            $class_name = "Lab3\\controller\\$class_name";
            if(class_exists($class_name))
            {
                $controller = new $class_name();
            }
        }
        
        if($controller instanceof  IController)
        {
            return $controller->execute($scope);
        }
        return false;
    }
    
    /**
     * Exception handler
     */
    public function handleException(Exception $ex)
    {
        if ($ex instanceof PageNotFound)
        {
            $this->getLog()->logException($ex->getMessage());
        }
        else
        {
            $this->getLog()->logException($ex->getMessage());
        }
        
        $this->redirect('page404',array("error"=>$ex->getMessage()));
    }
    
    /**
    
    
}
