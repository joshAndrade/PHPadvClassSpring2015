<?php
/**
 * Description of FileLogging
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\ILogging; 

class FileLogging implements ILogging
{
    private $logFiles = array(  "log" => 'logs\log.log.php',
                                "error" => 'logs\errors.log.php',
                                "debug" => 'log\debug.log.php',
                                "exception" => 'logs\exception.log.php');
    
    private function _log($data, $type)
    {
        if (is_string($data) && strlen($data))
        {
            $refID = uniqid();
            $dataLog = "\r\n[" . $refID . "]\t[" . $type . "]\t[" .date( "m-d-y g:ia") . "]\t" . $data;
            if (error_log($dataLog, 3, $this->logFiles[$type]))
            {
                return true;
            }
        }
            return false;
        }
    
        public function log($data)
        {
            return $this->_log($data, 'log');
        }
        
        public function logDebug($data)
        {
            return $this->_log($data, 'debug');
        }
        
        public function logException($data)
        {
            return $this->_log($data, 'exception');
        }
        
        public function logError($data)
        {
            return $this->_log($data, 'error');
        }
    
}
