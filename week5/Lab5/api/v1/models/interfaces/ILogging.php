<?php
/**
 *
 * @author 001270562
 */
namespace Lab5\models\interfaces;

interface ILogging 
{
    public function log($data);
    public function logDebug($data);
    public function logException($data);
    public function logError($data);
}
