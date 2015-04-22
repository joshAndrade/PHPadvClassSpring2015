<?php
/**
 * Description of IndexController
 *
 * @author 001270562
 */

namespace Lab3\controller;

use Lab3\models\interfaces\IController;
use Lab3\models\services\Scope;

class IndexController extends BaseController implements IController
{
    public function __construct( )
    {}
    
    public function execute(Scope $scope)
    {
        $this->data["cool"] = 'testing';
        $scope->view = $this->data;
        return $this->view('index',$scope);
    }
}
