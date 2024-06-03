<?php
require('../model/database.php');
require('../model/employees.php');
require('../model/employeeDB.php');
require('../model/customerDB.php');
require('../model/customer.php');
/******************************************************************
 *              Open the database
 ******************************************************************/
$db = Database::getDB();

// create the EmployeeDB and customer objects
$employeeDB = new EmployeeDB();
$customerDB = new CustomerDB();


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_customers';
    }
}

if ($action == 'list_customers') {
    $employee_id = filter_input(INPUT_GET, 'employee_id',
        FILTER_VALIDATE_INT);
    if ($employee_id == NULL || $employee_id == FALSE) {
        $employee_id = 1;
    }

    // Get employee and customer data
    $current_employee = $employeeDB->getEmployee($employee_id);
    $employees = $employeeDB->getEmployees();
    $customers = $customerDB->getCustomersByEmployee($employee_id);

    include('customer_list.php');
} else if ($action == 'view_customer') {
    $employees = $employeeDB->getEmployees();

    $customer_id = filter_input(INPUT_GET, 'customer_id',
        FILTER_VALIDATE_INT);
    $customer = $customerDB->getCustomer($customer_id);

    include('customer_view.php');
} else if ($action == 'delete_comment') {
    $customer_id = filter_input(INPUT_POST, 'customer_id',
        FILTER_VALIDATE_INT);

    // Delete the comment
    $customerDB->deleteComment($customer_id);

    // Display the Customer List page for the current employee
    header("Location: .?action=view_customer&customer_id=$customer_id");
}
?>