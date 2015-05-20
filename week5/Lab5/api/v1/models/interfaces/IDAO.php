<?php

/**
 *
 * @author 001270562
 */
namespace Lab5\models\interfaces; 
    

interface IDAO {
    public function create(IModel $model);
    public function update(IModel $model);
    public function delete($id);
    public function read($id);
}
