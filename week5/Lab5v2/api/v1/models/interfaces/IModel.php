<?php
/**
 * Description of IModel
 *
 * @author User
 */
namespace Lab5\models\interfaces;

interface IModel {
    public function reset();
    public function map(array $values);
    public function getAllPropteries();
}