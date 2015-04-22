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
     * Class Loader
     */
    public function loadClass($base)
    {
        $baseName = explode( '\\', $base );
            $className = end( $baseName );     
            
            $folders = array(   "mvc".DIRECTORY_SEPARATOR."controllers",
                                "mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."dao",
                                "mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."do",
                                "mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."interfaces",
                                "mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."exceptions",
                                "mvc".DIRECTORY_SEPARATOR."models".DIRECTORY_SEPARATOR."services"
                            );
            $classFile = FALSE;
            
            foreach($folders as $folder)
            {
                $classFile = $folder.DIRECTORY_SEPARATOR.$className.'.php';
                if(is_dir($folder) && file_exists($classFile))
                {
                    require_once $classFile;
                    break;
                }
            }
    }
    
    
    protected function getPage()
    {
        $page = filter_input(INPUT_GET, 'page');
        if (NULL === $page || $page === FALSE)
        {
            $page = 'index';
        }
        return $this->checkPage($page);
    }
    
    protected  function getPageController($page)
    {
        return ucfirst(strtolower($page)).'Controller';
    }
    
    protected function checkPage($page)
    {
    if ( !( is_string($page) && preg_match('/^[a-z0-9-]+$/i', $page) != 0 ) ) {
                // TODO log attempt, redirect attacker, ...
               throw new PageNotFoundException('Unsafe page "' . $page . '" requested');
            }        
            
            return $page;
    }
    
    /**
     * Generate link.
     * @param string $page target page
     * @param array $params page parameters
     */
    public function createLink($page, array $params = array()) {        
        return $page . '?' .http_build_query($params);
    }
    
     /**
     * Redirect to the given page.
     * @param type $page target page
     * @param array $params page parameters
     */
    public function redirect($page, array $params = array()) {
        header('Location: ' . $this->createLink($page, $params));
        die();
    }
}


function runPage()
{
    $_configURL = '.' . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.ini.php';
    $index = new Index();
    
    /**
     * Functions to use for Dependency Injection
     */
    
    $_config = new Config($_configURL);
    $_log = new FileLogging();
    $index->setLog($_log);
    $_pdo = new DB($_config->getConfigData('db:dev'), $_log);
    $_scope = new Scope();
    $_scope->util = new Util();
    $_validator = new Validator();
    
    $_emailTypeModel = new EmailTypeModel();
    $_emailTypeDAO = new EmailTypeDAO($_pdo->getDB(), $_emailTypeModel, $_log);
    $_emailTypdService = new EmailTypeService($_emailTypeDAO, $validator, $_emailTypeModel);
    
    
    
    $index->addDIController('index', function()
    {
        return new \Lab3\controller\IndexController();
    })//########################################HERE!!!!!!!!!!!!!!!!!!!##############################
}
