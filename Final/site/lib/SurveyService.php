<?php
namespace finalProject\JAndrade;
/**
 * Description of SurveyService
 *
 * @author 001270562
 */
class SurveyService 
{
    private $_errors = array();
    private $_Util;
    private $_DB;
    private $_Validator;
    private $_SurveyDAO;
    private $_SurveyModel;
    
    public function __construct($db, $util, $validator, $surveyDAO, $surveyModel) 
    {
        $this->_DB = $db;    
        $this->_Util = $util;
        $this->_Validator = $validator;
        $this->_PhoneTypeDAO = $surveyDAO;
        $this->_PhoneTypeModel = $surveyModel;
    }
    
    public function saveForm()
    {
        if(!$this->_Util->isPostRequest())
        {
            return false;
        }
        
        $this->validateForm();
        
        if($this->hasErrors())
        {
            $this->displayErrors();
        }
        else
        {
            if($this->_SurveyDAO->create($this->_SurveyModel))
            {
                echo 'Survey Added.';
            }
            else
            {
                echo 'Survey not added.';
            }
        }
    }
    
    public function validateForm()
    {
        if($this->_Util->isPostRequest())
        {
            $this->_errors = array();
            if( !$this->_Validator->firstIsValid($this->_SurveyModel->getFirst()))
            {
                $this->_errors[] = 'First name is invalid';
            }
            if( !$this->_Validator->lastIsValid($this->_SurveyModel->getLast()))
            {
                $this->_errors[] = 'Last name is invalid';
            }
            if( !$this->_Validator->genderIsValid($this->_SurveyModel->getGender()))
            {
                $this->_errors[] = 'Gender was not selected.';
            }
            if( !$this->_Validator->cityIsValid($this->_SurveyModel->getCity()))
            {
                $this->_errors[] = 'City is invalid';
            }
            if( !$this->_Validator->stateIsValid($this->_SurveyModel->getState()))
            {
                $this->_errors[] = 'State is invalid';
            }
            if( !$this->_Validator->sportIsValid($this->_SurveyModel->getFavsport()))
            {
                $this->_errors[] = 'Favorite Sport was not selected.';
            }
            if( !$this->_Validator->musicIsValid($this->_SurveyModel->getFavmusic()))
            {
                $this->_errors[] = 'Favorite Music Genre was not selected.';
            }
        }
    }
    
    public function displayErrors()
    {
        foreach($this->_errors as $value)
        {
            echo '<p>',$value,'</p>';
        }
    }
    
    public function hasErrors()
    {
        return(count($this->_errors) > 0);
    }
    
    public function displayResults()
    {
        $surveyDAO = new SurveyDAO();
        $results = $surveyDAO->getAllRows();
        
        foreach ($results as $values)
        {
            echo '<tr><td>',$values->getFirst() . " " . $values->getLast(),'</td><td>',$values->getGender(),'</td>';
            echo '<td>',$values->getCity(),'</td><td>', $values->getState(),'</td><td>',$values->getFavsport(),'</td><td>',$values->getFavmusic(),'</td></tr>';
        }
    }
    
    public function adminDisplayResults()
    {
        
        $surveyDAO = new SurveyDAO();
        $results = $surveyDAO->getAllRows();
        
        foreach ($results as $values)
        {
            echo '<tr><td>',$values->getFirst() . " " . $values->getLast(),'</td><td>',$values->getGender(),'</td>';
            echo '<td>',$values->getCity(),'</td><td>', $values->getState(),'</td><td>',$values->getFavsport(),'</td><td>',$values->getFavmusic(),'</td>';
            echo '<td><form action="#" method="post"><input type="hidden"  name="surveyid" value="',$values->getSurveyid(),'" /><input type="hidden" name="action" value="',$surveyDAO->delete(filter_input(INPUT_POST, 'surveyid')),'" /><input type="submit" value="DELETE" /> </form></td>';
            echo '</tr>';
        }
        
    }
    
}
