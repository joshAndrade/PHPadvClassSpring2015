<?php
/**
 * Description of RestServerModel
 *
 * @author 001270562
 */

namespace Lab5\models\services;

class RestServerModel extends BaseModel
{
    
    private $verb;
    private $resource;
    private $id;
    private $requestData;
    private $endpoint;
    
    function getVerb() {
        return $this->verb;
    }

    function getResource() {
        return $this->resource;
    }

    function getId() {
        return $this->id;
    }

    function getEndpoint() {
        return $this->endpoint;
    }

    function setVerb($verb) {
        $this->verb = $verb;
    }

    function setResource($resource) {
        $this->resource = $resource;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEndpoint($endpoint) {
        $this->endpoint = $endpoint;
    }

    function getRequestData() {
        return $this->requestData;
    }

    function setRequestData($requestData) {
        $this->requestData = $requestData;
    }


}
