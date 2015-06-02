<?php
namespace finalProject\JAndrade;
/**
 * Description of SurveyModel
 *
 * @author 001270562
 */
class SurveyModel implements IModel
{
    private $surveyid;
    private $first;
    private $last;
    private $gender;
    private $city;
    private $state;
    private $favsport;
    private $favmusic;
    
    function getSurveyid() {
        return $this->surveyid;
    }    
    
    function getFirst() {
        return $this->first;
    }

    function getLast() {
        return $this->last;
    }

    function getGender() {
        return $this->gender;
    }

    function getCity() {
        return $this->city;
    }

    function getState() {
        return $this->state;
    }

    function getFavsport() {
        return $this->favsport;
    }

    function getFavmusic() {
        return $this->favmusic;
    }

    function setSurveyid($surveyid) {
        $this->surveyid = $surveyid;
    }
    
    function setFirst($first) {
        $this->first = $first;
    }

    function setLast($last) {
        $this->last = $last;
    }

    function setGender($gender) {
        $this->gender = $gender;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setFavsport($favsport) {
        $this->favsport = $favsport;
    }

    function setFavmusic($favmusic) {
        $this->favmusic = $favmusic;
    }

    public function reset()
    {
        $this->setSurveyid('');
        $this->setFirst('');
        $this->setLast('');
        $this->setGender('');
        $this->setCity('');
        $this->setState('');
        $this->setFavsport('');
        $this->setFavmusic('');
    }
    
    public function map(array $values)
    {
        if(array_key_exists('surveyid', $values))
        {
            $this->setEmailid($values['SurveyID']);
        }
        
        if(array_key_exists('first', $values))
        {
            $this->setEmailid($values['First']);
        }
        
        if(array_key_exists('last', $values))
        {
            $this->setEmailid($values['Last']);
        }
        
        if(array_key_exists('last', $values))
        {
            $this->setEmailid($values['Last']);
        }
        
        if(array_key_exists('gender', $values))
        {
            $this->setEmailid($values['Gender']);
        }
        
        if(array_key_exists('city', $values))
        {
            $this->setEmailid($values['City']);
        }
        
        if(array_key_exists('state', $values))
        {
            $this->setEmailid($values['State']);
        }
        
        if(array_key_exists('sport', $values))
        {
            $this->setEmailid($values['FavSport']);
        }
        
        if(array_key_exists('music', $values))
        {
            $this->setEmailid($values['FavMusic']);
        }
        
        return $this;
    }
    
}
