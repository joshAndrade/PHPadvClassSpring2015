<?php
namespace finalProject\JAndrade;
use PDO;
/**
 * Description of SurveyDAO
 *
 * @author 001270562
 */
class SurveyDAO implements IDAO
{
    private $DB = null;
    
    public function __construct(PDO $db)
    {
        $this->setDB($db);
    }
    
    function getDB() {
        return $this->DB;
    }

    function setDB(PDO $DB) {
        $this->DB = $DB;
    }

    public function idExist($id) 
    {
        $db = $this->getDB();
        $stmt = $db->prepare("SELECT SurveyID FROM survey WHERE SurveyID = :surveyid");
        
        if($stmt->execute(array(':surveyid' => $id)) && $stmt->rowCount() > 0 ) 
        {
            return true;
        }
        return false;
    }
    
    public function getById($id) 
    {
        $model = new SurveyModel();
        $db = $this->getDB();
        
        $stmt = $db->prepare("SELECT * FROM survey WHERE SurveyID = :surveyid"); 
        
        if($stmt->execute(array(':surveyid' => $id)) && $stmt->rowCount() > 0 )
        {
            
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
            $model->map($results);
            
        }
        
        return $model;
    }
    
    public function create(IModel $model)
    {
            $db = $this->getDB();
            
            $values = array(":first" => $model->getFirst(),
                            ":last" => $model->getLast(),
                            ":gender" => $model->getGender(),
                            ":city" => $model->getCity(),
                            ":state" => $model->getState(),
                            ":favsport" => $model->getFavsport(),
                            ":favmusic" => $model->getFavmusic()
                    );
            
            if($this->idExist($model->getSurveyid()))
            {
                $values[":surveyid"] = $model->getSurveyid();
                $stmt = $db->prepare("UPDATE survey SET First = :first, Last = :last, Gender = :gender, City = :city, State = :state, FavSport = :favsport, FavMusic = :favmusic WHERE SurveyID = :surveyid");
            }
            else
                {
            
            $stmt = $db->prepare("INSERT INTO survey SET First = :first, Last = :last, Gender = :gender, City = :city, State = :state, FavSport = :favsport, FavMusic = :favmusic");
                }
            
            if ($stmt->execute($values) && $stmt->rowCount() > 0)
            {
                return true;
            }
            
            return false;
    }
    
    public function delete($id)
    {
        $db = $this->getDB();
        $stmt = $db->prepare("Delete FROM survey WHERE SurveyID = :surveyid");
        
        if($stmt->execute(array(':surveyid' => $id)) && $stmt->rowCount() > 0)
        {
           
            return true;
        }
        return false;
    }
    
    public function getAllRows() 
    {
        $values = array();
        $db = $this->getDB();
        
        $stmt= $db->prepare("SELECT * FROM survey"); 
        
        if ($stmt->execute() && $stmt->rowCount() > 0)
        {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            foreach ($results as $value)
            {
                $model = new SurveyModel();
                $model->reset()->map($value);
                $values[] = $model;
            }
        }
            else
            {
               
            }
            $stmt->closeCursor();
            return $values;
        }
    
    
}
