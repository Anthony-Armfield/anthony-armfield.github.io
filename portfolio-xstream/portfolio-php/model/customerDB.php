<?php
/**
 * Created by PhpStorm.
 * User: tarmfield
 * Date: 9/14/2018
 * Time: 12:04 AM
 */

class CustomerDB {

    // get all customers
    public function getCustomers() {
        $db = Database::getDB();
        $query = 'SELECT * FROM contact
                  INNER JOIN employees
                      ON contact.employeeID = employees.employeeID';
        $result = $db->query($query);
        $customers = array();
        foreach ($result as $row) {
            // create the Employee object
            $employee = new Employee();
            $employee->setEmployeeID($row['employeeID']);
            $employee->setFirstName($row['employeeFirstName']);
            $employee->setLastName($row['employeeLastName']);

            // create the Customers object
            $customer = new Customers();
            $customer->setEmployee($employee);
            $customer->setCustomerID($row['customerID']);
            $customer->setCustomerFirstName($row['firstName']);
            $customer->setCustomerLastName($row['lastName']);
            $customer->setCustomerEmail($row['emailAddress']);
            $customer->setComment($row['comment']);
            $customer->setEntryDate($row['entryDate']);
            $customers[] = $customer;
        }
        return $customers;
    }

    // getting the customers by each assigned employee
    public function getCustomersByEmployee($employee_id) {
        $db = Database::getDB();

        $employee = EmployeeDB::getEmployees($employee_id);

        $query = "SELECT * FROM contact
                  WHERE employeeID = '$employee_id'
                  ORDER BY customerID";
        $result = $db->query($query);
        $customers = array();
        foreach ($result as $row) {
            $customer = new Customers();
            $customer->setEmployee($employee);
            $customer->setCustomerID($row['customerID']);
            $customer->setCustomerFirstName($row['firstName']);
            $customer->setCustomerLastName($row['lastName']);
            $customer->setCustomerEmail($row['emailAddress']);
            $customer->setComment($row['comment']);
            $customer->setEntryDate($row['entryDate']);
            $customers[] = $customer;
        }
        return $customers;
    }

    // getting a single customer entity
    public function getCustomer($customer_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM contact
                  WHERE customerID = '$customer_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        $employee = EmployeeDB::getEmployee($row['employeeID']);

        $customer = new Customers();
        $customer->setEmployee($employee);
        $customer->setCustomerID($row['customerID']);
        $customer->setCustomerFirstName($row['firstName']);
        $customer->setCustomerLastName($row['lastName']);
        $customer->setCustomerEmail($row['emailAddress']);
        $customer->setComment($row['comment']);
        $customer->setEntryDate($row['entryDate']);

        return $customer;
    }

    // Removing a comment, but not deleting the entire customer row.
    public function deleteComment($customer_id) {
        $db = Database::getDB();
        $query = "UPDATE contact
                  SET comment = 'Answered', entryDate = NOW()
                  WHERE customerID = '$customer_id'";
        $statement = $db->exec($query);
        return $statement;
    }

}
?>