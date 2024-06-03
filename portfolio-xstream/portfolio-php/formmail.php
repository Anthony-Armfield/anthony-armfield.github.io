<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META HTTP-EQUIV="refresh" content="0;URL=thankyou.php">
<title>Email Form</title>
</head>

<body>
<?php
    $firstName=addslashes($_POST['first_name']);
    $lastName=addslashes($_POST['last_name']);
    $contact_email=addslashes($_POST['contact_email1']);
    $contact_comments=addslashes($_POST['comments']);

 // you can specify which email you want your contact form to be emailed to here

  $toemail = "anthony.armfield@gmail.com";
  $subject = "from Sussix Calculators";

  $headers = "MIME-Version: 1.0\n"
            ."From: \"".$name."\" <".$contact_email.">\n"
            ."Content-type: text/html; charset=iso-8859-1\n";

  $body = "First Name: ".$firstName."<br>\n"
            ."Last Name: ".$lastName."<br>\n"
            ."Email: ".$contact_email."<br>\n"
            ."Comments:<br>\n"
            .$contact_comments;

  if (!ereg("^[a-zA-Z0-9_]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$", $contact_email))
  {
    echo "That is not a valid email address.  Please return to the"
           ." previous page and try again.";
    exit;
  }

    mail($toemail, $subject, $body, $headers);
    echo "Thanks for submitting your comments";
?>
</body>
</html>