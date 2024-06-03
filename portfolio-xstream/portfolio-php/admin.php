<?php
//require('model/database.php');
//require('model/employees.php');
//require('model/employeeDB.php');
///******************************************************************
// *              Open the database
// ******************************************************************/
//$db = Database::getDB();
//
//// create the EmployeeDB object
//$employeeDB = new EmployeeDB();
//$customerDB = new CustomerDB();
//
//
//$action = filter_input(INPUT_POST, 'action');
//if ($action == NULL) {
//    $action = filter_input(INPUT_GET, 'action');
//    if ($action == NULL) {
//        $action = 'list_employees';
//    }
//}
//
//if ($action == 'list_employees') {
//    $employee_id = filter_input(INPUT_GET, 'employee_id',
//        FILTER_VALIDATE_INT);
//    if ($employee_id == NULL || $employee_id == FALSE) {
//        $employee_id = 1;
//    }
//
//    // Get employee and customer data
//    $current_employee = $employeeDB->getEmployee($employee_id);
//    $employees = $employeeDB->getEmployees();
//    $customers = $customerDB->getCustomerssByEmployee($employee_id);
//
//    include('customer_list.php');
//} else if ($action == 'view_customer') {
//$employees = $employeeDB->getEmployees();
//
//$customer_id = filter_input(INPUT_GET, 'customer_id',
//    FILTER_VALIDATE_INT);
//$customer = $customerDB->getProduct($customer_id);
//
//include('customer_view.php');
//
//?>





<?php include ('views/header.php'); ?>

<!-- Header with Background Image -->
<header class="meeting header">
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Employees</h1>

        </div>
        <!-- Display all employees -->
        <?php foreach ($listEmployees as $employee) : ?>
            <div class="col-sm-3">
                <ul style="list-style: none;">
                    <li>
                        <?php echo $employee->getFirstName() . ' ' . $employee->getLastName(); ?> <br>
                        <?php echo 'ID: ' . $employee->getID(); ?> <br>
                        <?php echo 'Position: ' . $employee->getPosition(); ?><br><br>
                    </li>
                </ul>
            </div>
        <?php endforeach; ?>
        <div class="col-sm-12">
            <h2 class="mt-4">Contact Us</h2>
            <address>
                <strong>Sussix Creative Calculators</strong>
                <br>123 Anywhere Pl.
                <br>My City, YS 12345
                <br>
            </address>
            <address>
                <abbr title="Phone">P:</abbr>
                (123) 456-7890
                <br>
                <abbr title="Email">E:</abbr>
                <a href="mailto:#">name@example.com</a>
            </address>
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Today's date is: <script>
                date();
            </script></p>
        <p class="m-0 text-center text-white">Copyright &copy; Sussix Creative Calculators 2018</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
