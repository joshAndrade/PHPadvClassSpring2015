<?php
/**
 * Description of Util
 *
 * @author 001270562
 */

namespace Lab3\models\services;

use Lab3\models\interfaces\IService;

class Util implements IService
{
    /**
     * Generate link
     * @param string $page target page
     * @page array $params page parameters
     */
    public function createLink($page, array $params = array())
    {
        return $page . '?' . http_build_query($params);
    }
    
    /**
     * Redirect to the given page.
     * @param type $page taget page
     * @param array $params page paramters
     */
    public function redirect($page, array $params = array())
    {
        header('Location: ' . $this->createLink($page,$params));
        die();
    }
    
    /**
     * Get value of the URL param.
     * @return string paramter value
     */
    public function getUrlParam($name)
    {
        return filter_input(INPUT_GET, $name);
    }
    
    /**
     * Get value of the URL param.
     * @return string parameter value
     */
    public function getPostParam($name)
    {
        $post = $this->getPostValues();
        if (is_array($post) && isset($post[$name]) )
        {
            return $post[$name];
        }
        return NULL;
    }
    
    public function getPostValues()
    {
        return filter_input_array(INPUT_POST);
    }
    
    public function getAction()
    {
        return $this->getPostParam('action');
    }
    
    /**
     * Get value of the URL param
     * #return string paramter value
     */
    public function getCurrentPage()
    {
        return $this->getUrlParam('page');
    }
    
    /**
     * A method to check if a Post request has been made.
     * @return boolean
     */
    public function isPostRequest()
    {
        return (filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST');
    }
    
    /*
     * A method to check if a Get reuest has been made
     * 
     *@return boolean
     */
    
    public function isGetRequest()
    {
        return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'GET');
    }
    
}
