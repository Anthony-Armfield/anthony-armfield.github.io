<?php
require('model/database.php');
require('model/employees.php');
require('model/employeeDB.php');
/******************************************************************
 *              Open the database
 ******************************************************************/
$db = Database::getDB();

// create the EmployeeDB object
$employeeDB = new EmployeeDB();


// create variable for employees
$listEmployees = EmployeeDB::getEmployees();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sussix Creative Calculators</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/business-frontpage.css" rel="stylesheet">

    <script type="text/javascript" src="js/externalJS.js"></script>
    <script type="text/javascript" src="js/date.js"></script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Sussix Creative Calculators</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="calcs.html">Calculators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="faq.html">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
