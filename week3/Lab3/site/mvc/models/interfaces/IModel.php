<?php


/**
 *
 * @author 001270562
 */

namespace Lab3\models\interfaces;

interface IModel {
    public function reset();
    public function map(array $values);
    public function getAllValues();
}
