<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sussix Creative Calculators</title>
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/business-frontpage.css" rel="stylesheet">

    <script type="text/javascript" src="../js/externalJS.js"></script>
    <script type="text/javascript" src="../js/date.js"></script>
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
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../about.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../calcs.php">Calculators</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin.php">Admin Page</a>
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
        <div class="col-sm-6">
            <h1>Employees</h1>

            <!-- display a list of the employees -->
            <?php foreach($employees as $employee) : ?>
            <li style="list-style: none;">
                <a href="?employee_id=<?php echo $employee->getEmployeeID(); ?>">
                    <b><?php echo $employee->getEmployeeFirstName() . ' ' . $employee->getEmployeeLastName(); ?></b>
                </a>
            </li>
            <?php endforeach; ?>
        </div>
        <div class="col-sm-6">
            <!-- display a list of customers assigned to the current employee -->
            <h4 style="background: none;"><?php echo $current_employee->getEmployeeFirstName() . ' ' .  $current_employee->getEmployeeLastName(); ?></h4>
            <nav>
                <ul style="list-style: none;">
                    <?php foreach ($customers as $customer) : ?>
                    <li style="list-style: none;">
                        <a href="?action=view_customer&amp;customer_id=<?php echo $customer->getCustomerID(); ?>"> <?php echo $customer->getCustomerFirstName() . ' ' . $customer->getCustomerLastName(); ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
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
