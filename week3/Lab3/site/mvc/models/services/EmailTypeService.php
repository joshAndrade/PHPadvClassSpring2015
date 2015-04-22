<?php


/**
 * Description of EmailTypeService
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IDAO;
use Lab3\models\interfaces\IService;
use Lab3\models\interfaces\IModel;


class EmailTypeService implements IService
{
    protected $DAO;
    protected $validator;
    
    function getValidator()
    {
        return $this->validator;
    }
    
    function setValidator($validator)
    {
        $this->validator = $validator;
    }
    
    function getDAO()
    {
        return $this->DAO;
    }
    
    function setDAO(IDAO $DAO)
    {
        $this->DAO = $DAO;
    }
    
    public function __construct(IDAO $PhoneTypeDAO, $validator) 
    {
        $this->DAO($EmailTypeDAO);
        $this->setValidator($validator);
    }
    
    public function getAllRows($limit = "", $offset = "")
    {
        return $this->getDAO()->getAllRows($limit, $offset);
    }
    
    public function read($id)
    {
        return $this->getDAO()->read($id);
    }
    
    public function delete($id)
    {
        return $this->getDAO()->delete($id);
    }
    
    public function create(IModel $model)
    {
        if(count($this->validate($model)) === 0)
        {
            return $this->getDAO()->create($model);
        }
        return false;
    }
    
    public function update(IModel $model)
    {
        if(count($this->validate($model)) === 0)
        {
            return $this->getDAO()->update($model);
        }
        return false;
    }
    
    public function validate(IModel $model) 
    {
        $errors = array();
        if(!$this->getValidator()->emailTypeIsValid($model->getEmaitype()))
        {
            $errors[] = 'Email Type is invalid';
        }
        
        if (!$this->getValidator()->activeIsValid($model->getActive()))
        {
            $errors[] = 'Active is invalid';
        }
        
        return $errors;
    }
}
