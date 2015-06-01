<?php
/**
 * Description of DB
 *
 * @author 001270562
 */
class DB {
    protected $db = null;
    private $dbConfig = array();
    
    /**
     * This requires.
     * 
     * @param [Array} [$dbConfig] - Database config
     */
    
    public function __construct($dbConfig) 
    {
        $this->setDbConfig($dbConfig);
    }
    
    private function getDbConfig() {
        return $this->dbConfig;
    }

    private function setDbConfig($dbConfig) {
        $this->dbConfig = $dbConfig;
    }

    public function getDB() { 
        if ( null != $this->db ) {
            return $this->db;
        }
        try {
            $config = $this->getDbConfig();
            $this->db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $ex) {
          
           $this->closeDB();
        }
        return $this->db;        
    }
    
    
     public function closeDB() {        
        $this->db = null;        
    }
    
    
}
