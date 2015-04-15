<?php



/**
 * Description of TestController
 *
 * @author 001270562
 */
namespace APP\controller;

use App\models\interfaces\IController;
use App\models\interfaces\IService;


class TestController extends BaseController implements IController {
    
    protected $service;
    
    public function __construct(IService $testService) 
    {
     $this->service = $testService;   
    }
    
    public function execute(IService $scope) {
        
        /*if ($scope->util->isPostRequest())
        {
            
        }*/
        
        $this->data['test1'] = 'hello';
        $this->data['test2'] = 'world';
        
        $scope->view = $this->data;
        $page = 'test';
        return $this->view($page, $scope);
        
    }
}
