<?php
/**
 * Created by PhpStorm.
 * User: tarmfield
 * Date: 9/13/2018
 * Time: 10:28 PM
 */

/******************************************************************
 *                        Class EmployeeDB
 ******************************************************************/
class EmployeeDB {

    //get all employees
    public function getEmployees() {
        $db = Database::getDB();
        $query = 'SELECT * FROM employees
                  ORDER BY employeeID';
        $statement = $db->query($query);

        //create the employee array
        $employees = array();
        foreach ($statement as $row) {
            $employee = new Employees();
            $employee->setEmployeeID($row['employeeID']);
            $employee->setEmployeeFirstName($row['employeeFirstName']);
            $employee->setEmployeeLastName($row['employeeLastName']);
            $employees[] = $employee;
        }
        return $employees;
    }

    // get a single employee
    public function getEmployee($employee_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM employees
                  WHERE employeeID = '$employee_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $employee = new Employees();
        $employee->setEmployeeID($row['employeeID']);
        $employee->setEmployeeFirstName($row['employeeFirstName']);
        $employee->setEmployeeLastName($row['employeeLastName']);
        return $employee;
    }
}
?>