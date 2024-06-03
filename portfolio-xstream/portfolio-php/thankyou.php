<?php

/****************************************************************************************
 *                 This section is the contact form data                                *
 ****************************************************************************************/
// get the input from the form
$contact_first_name = filter_input(INPUT_POST, 'first_name');
$contact_last_name = filter_input(INPUT_POST, 'last_name');
$contact_email = filter_input(INPUT_POST, 'email_address1');
$contact_comments = filter_input(INPUT_POST, 'comments');
//echo "Fields: " . $contact_first_name . $contact_last_name . $contact_email . $contact_comments;

// combining the first and last name
$full_name = $contact_first_name . " " . $contact_last_name;

// validate inputs
if ($contact_first_name == null || $contact_last_name == null || $contact_email == null || $contact_comments == null) {
    $error = "Invalid input data. Please return to the "." previous page and try again.";
    /* include('error.php'); */
    echo "Form Data Error: " . $error;
    exit();
} elseif (!ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $contact_email)) { //verifying email is valid
    echo "That is not a valid email address.  Please return to the"
        ." previous page and try again.";
    exit;
} else {
    $dsn = 'mysql:host=localhost;dbname=form_140';
    $username = 'root';
    $password = 'Pa$$w0rd';

    // setting try/catch
    try {
        $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        /* include('database_error.php'); */
        echo "DB Error: " . $error_message;
        exit();
    }

// Setting column settings for items not user selectable
$customerID = NULL;
$employeeID = 1;
$entryDate = date("Y-m-d");

// Add the contact info to the contact table
$contactQuery = 'INSERT INTO contact
                     (customerID, employeeID, firstName, lastName, emailAddress, comment, entryDate)
                  VALUES
                     (:customerID, :employeeID, :contact_first_name, :contact_last_name, :contact_email, :contact_comment, :entryDate)';
$statement = $db->prepare($contactQuery);
$statement->bindValue(':customerID', $customerID);
$statement->bindValue(':employeeID', $employeeID);
$statement->bindValue(':contact_first_name', $contact_first_name);
$statement->bindValue(':contact_last_name', $contact_last_name);
$statement->bindValue(':contact_email', $contact_email);
$statement->bindValue(':contact_comment', $contact_comments);
$statement->bindValue(':entryDate', $entryDate);
$statement->execute();
$statement->closeCursor();
// echo "Fields: " . $contact_first_name . $contact_last_name . $contact_email . $contact_comments;


}

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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="display-3 text-center text-white mt-4">Thank You!</h1>
            </div>
        </div>
    </div>
</header>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Thank you, <?php echo $full_name; ?>, for contacting us! We will get back to you shortly.</h2>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <form name="form1" method="post" action="formmail.php">
            </form>
        </div>
        <div class="col-sm-4">
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
