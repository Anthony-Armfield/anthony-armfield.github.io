<?php
/******************************************************************
 *                         Customers Class
 ******************************************************************/
class Customers {
    private $employee;
    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $comment;
    private $entryDate;

    public function __construct() {
        $this->employee = null;
        $this->id = 0;
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->comment = '';
        $this->entryDate = '';
    }

    public function getEmployee() {
        return $this->employee;
    }
    public function setEmployee($value) {
        $this->employee = $value;
    }

    public function getCustomerID() {
        return $this->id;
    }
    public function setCustomerID($value) {
        $this->id = $value;
    }

    public function getCustomerFirstName() {
        return $this->first_name;
    }
    public function setCustomerFirstName($value) {
        $this->first_name = $value;
    }


    public function getCustomerLastName() {
        return $this->last_name;
    }
    public function setCustomerLastName($value) {
        $this->last_name = $value;
    }

    public function getCustomerEmail() {
        return $this->email;
    }
    public function setCustomerEmail($value) {
        $this->email = $value;
    }


    public function getComment() {
        return $this->comment;
    }
    public function setComment($value)
    {
        $this->comment = $value;
    }

    public function getEntryDate() {
        return $this->entryDate;
    }
    public function setEntryDate($value) {
        $this->entryDate = $value;
    }
}


?>