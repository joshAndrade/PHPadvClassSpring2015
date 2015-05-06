<?php


/**
 *
 * @author 001270562
 */

 namespace Lab3\models\interfaces;

use Lab3\models\interfaces\IService;


interface IController {
  
    public function execute(IService $scope);
}

