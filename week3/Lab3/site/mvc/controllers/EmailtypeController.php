<?php

/**
 * Description of EmailtypeController
 *
 * @author 001270562
 */

namespace Lab3\controller;

use Lab3\models\interfaces\IController;
use Lab3\models\services\Scope;
use Lab3\models\interfaces\IService;
use Lab3\models\interfaces\IModel;


class EmailtypeController {
     
    public function execute(Scope $scope) {
                
        
        $viewPage = 'EmailType';
        return $this->view($viewPage,$scope);
    }
}
