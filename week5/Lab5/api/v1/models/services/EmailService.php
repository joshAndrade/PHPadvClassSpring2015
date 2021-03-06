<?php
/**
 * Description of EmailService
 *
 * @author 001270562
 */
namespace Lab5\models\services;

use Lab5\models\interfaces\IDAO;
use Lab5\models\interfaces\IService;
use Lab5\models\interfaces\IModel;

class EmailService implements IService
{
    protected $DAO;
    protected $validator;
    protected  $model;
    protected $emailTypeService;
            
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
    
    function getModel() {
        return $this->model;
    }

    function setModel(IModel $model) {
        $this->model = $model;
    }

    function getEmailTypeService() {
        return $this->emailTypeService;
    }
      
    function setEmailTypeService(IService $service) {
        $this->emailTypeService = $service;
    }

        
    public function __construct( IDAO $EmailDAO, IService $emailTypeService, IService $validator,  IModel $model) 
    {
        $this->setDAO($EmailDAO);
        $this->setValidator($validator);
        $this->setModel($model);
        $this->setEmailTypeService($emailTypeService);
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
    
    public function getEmailTypes()
    {
        return $this->getEmailTypeService()->getAllRows();
    }

    

    public function validate(IModel $model) 
    {
        $errors = array();
        if(!$this->getValidator()->emailIsValid($model->getEmail()))
        {
            $errors[] = 'Email is invalid';
        }
        if (!$this->getValidator()->activeIsValid($model->getActive()))
        {
            $errors[] = 'Active is invalid';
        }
        if(!$this->getEmailTypeService()->idExists($model->getEmailTypeid()))
        {
            $errors[] = "Email type is invalid.";
        }
        
        return $errors;
    }
    
    public function getNewEmailModel()
    {
        return clone $this->getModel();
    }
}
