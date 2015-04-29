<?php
/**
 * Description of Page404Controller
 *
 * @author 001270562
 */

namespace Lab3\controller;

use Lab3\models\interfaces\IController;
use Lab3\models\interfaces\IService;

class Page404Controller extends BaseController implements IController
{
    public function execute(IService $scope) {
        $this->data['error'] = $scope->util->getUrlParam('error');
        $scope->view = $this->data;
        return $this->view('page404',$scope);
    }
}
