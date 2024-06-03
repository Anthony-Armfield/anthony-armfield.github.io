"use strict";

var $ = function(id) {
    return document.getElementById(id);
};

// MPG Calculator
var mpgCalc = function() {
  var miles = prompt("Enter miles driven:");
  miles = parseFloat(miles);

  var gallons = prompt("Enter number of gallons used:");
  gallons = parseFloat(gallons);

  var mpg = miles/gallons;
  mpg = parseInt(mpg);

  $("mpgResult").innerHTML = "Your average MPG is: " + mpg;
};

// Test Scores Calculator
var testScores = function() {
  var entry;
  var average;
  var total = 0;

  entry = prompt("Enter test score");
  var score1 = parseInt(entry);
  total = total + score1;

  entry = prompt("Enter test score");
  var score2 = parseInt(entry);
  total = total + score2;

  entry = prompt("Enter test score");
  var score3 = parseInt(entry);
  total = total + score3;

  average = parseInt(total/3);

  $("testScoreResult").innerHTML = "Your average test scores were: " + average;
};

// Mailing List
var joinList = function() {
  var emailAddress1 = $("email_address1").value;
  var emailAddress2 = $("email_address2").value;
  var firstName = $("first_name").value;
  var errorMessage = "";

  //validate the entries
  if (emailAddress1 == "") {
    errorMessage = "First email address entry required";
    $("email_address1").focus();
  }
  else if (emailAddress2 == "") {
    errorMessage = "Second email address entry required";
    $("email_address2").focus();
  }
  else if (emailAddress2 != emailAddress1) {
    errorMessage = "Email address entries must match";
    $("email_address2").focus();
  }
  else if (firstName == "") {
    errorMessage = "First name entry required";
    $("first_name").focus();
  }

  // Submit the form if all entries are valid
  // otherwise, display an error message
  if (errorMessage == "" ) {
    $("email_form").submit();
    $("email_form").reset();
    $("success").innerHTML = "Thanks for joining our email list " + firstName + "!";
  }
  else {
    alert(errorMessage);
  }
};


// Contact Form
document.querySelector('#email_submit').addEventListener('click', function(e) => {
  e.preventDefault();
  // the rest of your sendEmail code
  var sendEmail = function() {
    var emailAddress1 = $("email_address1").value;
    var firstName = $("first_name").value;
    var lastName = $("last_name").value;
    var comments = $("comments").value;
    var successString = "Thanks for reaching out! Someone will be in contact shortly.";
    var errorMessage = "";

    //validate the entries
    if (emailAddress1 == "") {
      errorMessage = "Email address required";
      $("email_address1").focus();
    }
    else if (firstName == "") {
      errorMessage = "First name required";
      $("first_name").focus();
    }
    else if (lastName == "") {
      errorMessage = "Last name required";
      $("last_name").focus();
    }

    // Submit the form if all entries are valid
    // otherwise, display an error message
    if (errorMessage == "" ) {
      $("contact_form").submit();
      document.getElementById("contact_form").reset();
      $("success").innerHTML = successString;
      console.log(successString);
    }
    else {
      alert(errorMessage);
    }
  };
});

// FAQs javascript
var toggle = function() {
    var href = this;
    var h4 = href.parentNode;                   
    var div = h4.nextElementSibling;
    
    if (h4.classList.contains("minus")) { 
        // h2.removeAttribute("class"); 
        h4.classList.remove("minus");
    } 
    else { 
        // h2.setAttribute("class", "minus"); 
        h4.classList.add("minus");
    }
    
    if (div.classList.contains("open")) { 
        // div.removeAttribute("class");
        div.classList.remove("open");
        div.classList.add("closed");
    } else { 
        // div.setAttribute("class", "open");
        div.classList.remove("closed");
        div.classList.add("open");
    } 
};

window.onload = function() {
    // get the h2 tags
    var faqs = $("faqs");
    var h4Elements = document.getElementsByTagName("a");
    
    // attach event handler for each h2 tag     
    for (var i = 0; i < h4Elements.length; i++ ) {
      h4Elements[i].onclick = toggle;
    }
    // set focus on first h2 tag's <a> tag
    h4Elements[0].focus();       
};


