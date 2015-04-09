<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EmailModel
 *
 * @author 001270562
 */
class EmailModel implements IModel{
    private $emailid;
    private $email;
    private $emailtypepeid;
    private $logged;
    private $lastupdated;
    private $active;
    
    function getEmailid() {
        return $this->emailid;
    }

    function getEmail() {
        return $this->email;
    }

    function getEmailtypepeid() {
        return $this->emailtypepeid;
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

    function setEmailid($emailid) {
        $this->emailid = $emailid;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setEmailtypepeid($emailtypepeid) {
        $this->emailtypepeid = $emailtypepeid;
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


    public function reset() {
        $this->setEmail('');
        $this->setEmailtypeid('');
        $this->setEmailid('');
        $this->setActive('');
        $this->setLogged('');
        $this->setLastupdated('');
        return $this;
    }
    
    public function map(Array $values) {
        
        if ( array_key_exists('emailtypeid', $values) ) {
            $this->setPhonetypeid($values['emailtypeid']);
        }
        
        if ( array_key_exists('emailtype', $values) ) {
            $this->setPhonetype($values['emailtype']);
        }
        
        if ( array_key_exists('active', $values) ) {
            $this->setActive($values['active']);
        }
        return $this;
    }
    
    


    
    
}
