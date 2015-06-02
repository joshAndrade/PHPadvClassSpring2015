<?php
namespace finalProject\JAndrade;
use PDO;
/**
 * Description of RegisterDAO
 *
 * @author 001270562
 */
class RegisterDAO 
{
   private $DB = null;
   private $model = null;
   
   public function __construct(PDO $db, $model)
   {
       $this->setDB($db);
       $this->setModel($model);
   }
   
   private function getDB() {
       return $this->DB;
   }

   private function getModel() {
       return $this->model;
   }

   private function setDB(PDO $DB) {
       $this->DB = $DB;
   }

   private function setModel($model) {
       $this->model = $model;
   }

   public function login($model)
   {
       $user = $model->getUser();
       $password = $model->getPassword();
       $db = $this->getDB();
       
       $stmt = $db->prepare("SELECT * FROM login WHERE UserName = :user");
       
       
       if($stmt->execute(array(':user' => $user)) && $stmt->rowCount() > 0)
       {
           $results = $stmt->fetch(PDO::FETCH_ASSOC);
           var_dump(password_verify($password, $results['PassWord']));
           return password_verify($password, $results['PassWord']);
       }
       return false;
   }
   
   public function create($model)
   {
       $db = $this->getDB();
       
       $binds = array(":user" => $model->getUser(),
                      ":password" => password_hash($model->getPassword(), PASSWORD_DEFAULT)
           );
       
       $stmt = $db->prepare("INSERT INTO login SET UserName = :user, PassWord = :password, created = now()");
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0)
       {
           return true;
       }
       return false;
       
   }
   
   public function update($model)
   {
       $db = $this->getDB();
       $binds = array(":id" => $model->getId(),
                      ":user" => $model->getUser(),
                      ":password" => $model->getPassword()
               );
       
       $stmt = $db->prepare("UPDATE login SET UserName = :user, PassWord = :password WHERE UserID = :id");
       
       if($stmt->execute($binds) && $stmt->rowCount() > 0)
       {
           return true;
       }
       return false;
   }
   
}
