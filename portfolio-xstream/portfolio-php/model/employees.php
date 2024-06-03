<?php
/**
 * Created by PhpStorm.
 * User: tarmfield
 * Date: 9/13/2018
 * Time: 10:25 PM
 */

/******************************************************************
 *                         Employee Class
 ******************************************************************/
class Employees {
    private $id;
    private $first_name;
    private $last_name;
    private $position;

    public function __construct() {
        $this->id = 0;
        $this->first_name = '';
        $this->last_name = '';
        $this->position = '';
    }

    public function getEmployeeID() {
        return $this->id;
    }
    public function setEmployeeID($value) {
        $this->id = $value;
    }

    public function getEmployeeFirstName() {
        return $this->first_name;
    }
    public function setEmployeeFirstName($value) {
        $this->first_name = $value;
    }


    public function getEmployeeLastName() {
        return $this->last_name;
    }
    public function setEmployeeLastName($value) {
        $this->last_name = $value;
    }


    public function getPosition() {
        return $this->position;
    }
    public function setPosition($value)
    {
        $this->position = $value;
    }
}
?>