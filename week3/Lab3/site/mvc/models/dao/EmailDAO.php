<?php
/**
 * Description of EmailDAO
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IDAO;
use Lab3\models\interfaces\IModel;
use Lab3\models\interfaces\ILogging;
use \PDO;

class EmailDAO extends BaseDAO implements IDAO
{
     public function __construct(PDO $db, IModel $model, ILogging $log) {
        $this->setDB($db);
        $this->setModel($model);
        $this->setLog($log);
    }
    
    protected function idExist($id)
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT * FROM email WHERE emailid = :emailid");
        
        if ($stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0)
        {
             return true;
        }
        return false;
    }
    
    public function read($id)
    {
        $model = clone $this->getModel();
        $db = $this->getDB();
        
        $stmt = $db->prepare("SELECT * FROM email WHERE emailid = :emailid");
        
        if ($stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0)
        {
                $results = $stmt->fetch(PDO::FETCH_ASSOC);
                $model->reset()->map($results);
        }
        return $model;
        
    }
    
    public function create (IModel $model)
    {
        $db = $this->getDB();
        
        $binds = array(":email" => $model->getEmail(),
                        ":emailtypeid" => $model->getEmailtypeid(),
                        ":active" => $model->getActive()
                        );
        
        if (!$this->idExist($model->getEmailTypeid()))
        {
            $stmt = $db->prepare("INSERT INTO email SET email = :email, emailtypeid = :emailtypeid, active = :active, logged = now(), lastupdated = now()");
            
            if ($stmt->execute($binds) && $stmt->rowCount() > 0)
            {
                return true;
            }
        }
        return false;
    }
    
    
    public function update(IModel $model)
    {
        $db = $this->getDB();
        
        $binds = array(":emailtypeid" => $model->getEmailtypeid(),
                        ":email" => $model->getEmail(),
                        ":active" => $model->getActive(),
                        ":emailid" => $model->getEmailid()
                
                        );
        
        
        if($this->idExist($model->getEmailid()))
        {
            $stmt = $db->prepare("UPDATE email SET email = :email, emailtypeid = :emailtypeid, active = :active, lastupdated = now() WHERE emailid = :emailid");
            
            if ($stmt->execute($binds) && $stmt->rowcount() > 0)
            {
                return true;
            }
            else
            {
                $error = implode(",", $db->errorInfo());
                $this->getLog()->logError($error);
            }
            
        }
        
        return false;
    }
    
    public function delete($id) 
    {
        $db = $this->getDB();
        $stmt = $db->prepare("Delete FROM email WHERE emailid = :emailid");
                             
        if($stmt->execute(array(':emailid' => $id)) && $stmt->rowCount() > 0)
        {
            return true;
            
        }
        else
        {
            $error = implode(",", $db->errorInfo());
            $this->getLog()->logError($error);
        }
        return false;
       
    }
    
    public function getAllRows()
    {
        $db = $this->getDB();
        $values = array();
        
        $stmt = $db->prepare("SELECT email.emailid, email.email, email.emailtypeid, emailtype.emailtype, emailtype.active as emailtypeactive, email.logged, email.lastupdated, email.active FROM email LEFT JOIN emailtype on email.emailtypeid = emailtype.emailtypeid");
        
        if($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $value)
            {
                $model = clone $this->getModel();
                $model->reset()->map($value);
                $values[] = $model;
            }
        }
        $stmt->closeCursor();
        return $values;
    }
}
