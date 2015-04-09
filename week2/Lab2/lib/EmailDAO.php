<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailDAO
 *
 * @author Josh
 */
class EmailDAO {
    private $DB = null;
    
    public function __construct(PDO $db) 
    {
        $this->setDB($db);
    }
    
    private function setDB(PDO $db) 
    {
        return $this->DB;
    }
      
    private  function getDB()
    {
        $this->DB = $DB;
    }
    
    public function idExisit($id) 
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT emailid FROM email WHERE emailid = :emailid");
        
        if($stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 ) 
        {
            return true;
        }
        return false;
    }
    
    public function getById($id) 
    {
        $model = new EmailTypeModel();
        $db = $this->getDB();
        
        $stmt = $db->prepare("SELECT * FROM email WHERE emailid = :emailid");
        
        if($stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0 )
        {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $model->map($reults);
        }
        return $model;
    }
    
    public function save(IModel $model)
    {
        $db = $this->getDB();
        
        $values = array(":email" => $model->getEmail(),
                        ":emailtypeid" => $model->getEmailType(),
                        ":active" => $model->getActive());
        
        if ($this->idExisit($model->getEmailtypeid())) 
        {
            $values[":emailtypeid"] = $model->getPhonetypeid();
            $stmt = $db->prepare("UPDATE email SET email = :email, emailtypedid = :emailtypeid, active = :active, lastupdated = now() WHERE emailid = :emailid");
        }
        else
        {
            $stmt = $db->prepare("INSERT INTO email SET email = :email, emailtypeid = :emailtypeid, active = :active, logged = now(), lastupdated = now() " );
        }
        
        
        
        if ($stmt->execute($values) && $stmt->rowCount() > 0 )
        {
            return true;
        }
        
        return false;
    }
    
    public function delete($id) 
    {
        $db = $this->getDB();
        $stmt = $db->prepare("Delete FROM email WHERE emailid = :emailid");
        
        if ($stmt->execute(array(':email' => $id)) && $stmt->rowCount() > 0 )
        {
            return true;
        }
        
        return false;
    }
    
    public function getAllRows() 
    {
        $values = array();
        $db = $this->getDB();
        //#####################################################################################################################################################################
        $stmt= $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive"); // ########### FINISH THIS SELECT STATMENT
        
        if ($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $value)
            {
                $model = new EmailTypeModel();
                $model->reset()->map($value);
                $values[] = $model;
            }
        }
            else
            {
               // log($db->errorInfo() .$stmt->queryString);
            }
            $stmt->closeCursor();
            return $values;
        }
    
}
