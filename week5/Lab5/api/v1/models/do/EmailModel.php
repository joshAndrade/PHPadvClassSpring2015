<?php
/**
 * Description of EmailModel
 *
 * @author 001270562
 */

namespace Lab5\models\services;

class EmailModel extends BaseModel
{

    private $emailid;
    private $email;
    private $emailtypeid;
    private $emailtype;
    private $logged;
    private $lastupdated;
    private $active;
    private $emailtypeactive;
    
    function getEmailid() {
        return $this->emailid;
    }

    function getEmail() {
        return $this->email;
    }

    function getEmailtypeid() {
        return $this->emailtypeid;
    }

    function getEmailtype() {
        return $this->emailtype;
    }

    function getLogged() {
        return $this->logged;
    }

    function getLastupdated() {
        return $this->lastupdated;
    }

    function getActive() {
        return $this->active;
    }

    function getEmailtypeactive() {
        return $this->emailtypeactive;
    }

    function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEmailtypeid($emailtypeid) {
        $this->emailtypeid = $emailtypeid;
    }

    function setEmailtype($emailtype) {
        $this->emailtype = $emailtype;
    }

    function setLogged($logged) {
        $this->logged = $logged;
    }

    function setLastupdated($lastupdated) {
        $this->lastupdated = $lastupdated;
    }

    function setActive($active) {
        $this->active = $active;
    }

    function setEmailtypeactive($emailtypeactive) {
        $this->emailtypeactive = $emailtypeactive;
    }

}
