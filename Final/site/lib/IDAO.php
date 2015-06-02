<?php
namespace finalProject\JAndrade;
/**
 *
 * @author 001270562
 */
interface IDAO {
    /**
     * 
     */
    public function idExist($id);
    /**
     * 
     * 
     */
    public function getById($id);
    /**
     * 
     * 
     */
    public function delete($id);
    /**
     * 
     * 
     */
    public function create(IModel $model);
    /*
     * 
     * 
     */
    public function getAllRows();
}
