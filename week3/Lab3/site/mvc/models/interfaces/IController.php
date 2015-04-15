<?php


/**
 *
 * @author 001270562
 */

 namespace Lab3\models\interfaces;

use Lab3\models\services\Scope;


interface IController {
  
    public function execute(Scope $scope);
}

