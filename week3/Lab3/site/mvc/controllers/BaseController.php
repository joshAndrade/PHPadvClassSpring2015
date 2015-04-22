<?php
/**
 * Description of BaseController
 *
 * @author 001270562
 */

namespace Lab3\controller;

use Lab3\models\services\Scope;

class BaseController {
    
    protected $data = array();
    
    protected function view($page, Scope $scope)
    {
        $folder = "mvc".DIRECTORY_SEPARATOR."views";
        $file = $folder.DIRECTORY_SEPARATOR.$page.'php';
        if (is_dir($folder) && file_exists($file))
        {
            include_once $file;
            return true;
        }
        
        return false;
    }
}
