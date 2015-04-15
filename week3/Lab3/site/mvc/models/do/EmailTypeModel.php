<?php


/**
 * Description of EmailTypeModel
 *
 * @author 001270562
 */

namespace Lab3\models\services;

class EmailTypeModel extends BaseModel{
    
    private $emailtypeid;
    private $emailtype;
    private $activel;
    
    function getEmailtypeid() {
        return $this->emailtypeid;
    }

    function getEmailtype() {
        return $this->emailtype;
    }

    function getActivel() {
        return $this->activel;
    }

    function setEmailtypeid($emailtypeid) {
        $this->emailtypeid = $emailtypeid;
    }

    function setEmailtype($emailtype) {
        $this->emailtype = $emailtype;
    }

    function setActivel($activel) {
        $this->activel = $activel;
    }


    
}
