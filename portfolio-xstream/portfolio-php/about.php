<?php include ('views/header.php'); ?>
    <!-- Header with Background Image -->
    <header class="city header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="display-3 text-center text-white mt-4">We create the maths.</h1>
          </div>
        </div>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2 class="mt-4 text-center">About Us</h2>
          <p>We started as a small group of mathematical wonders who set out to make the world a better place by helping our fellow students with solving their mathematical problems. We identified there was a need for digital calculators when we went searching for a calculator to solve our own problems. Finding no solution, it really surprised us that calculators could not be found. It turns out there is a much larger need than originally anticipated and Sussix Creative Calculators was born!</p>
        </div>
        <div class="col-sm-6">
          <h2 class="mt-4">Do you need a calculator?</h2>
          <p>We at Sussix Creative Calculators, are specialists in the calculator industry. If you need one, we create it for you!</p>
          <p>Check below to check out our calculators!</p>
          <p>
            <a class="btn btn-primary" href="calcs.html">Calculators &raquo;</a>
          </p>
        </div>
        <div class="col-sm-6">
          <h2 class="mt-4">Need something else?</h2>
          <p>We are not limited to just calculators here as Sussix Creative Calculators. If you need specialized software, let us know.</p>
          <p>Click the button below to contact us today!</p>
            <a class="btn btn-primary" href="calcs.html">Contact Us &raquo;</a>
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <h2 class="mt-4">Sign up for our mailing list.</h2>
          <p>Want to know what we are currently working on at Sussix Creative Calculators? Sign up for our monthly newsletter and you will get the skinny on projects like interactive games, fancy web development techniques, and Arduino/Raspberry Pi projects. We might even throw in some DIY stuff for those tinkerers at heart!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 mailing-list" id="mailing-list">
          <form id="email_form" name="email_form" action="join.php" method="post">  <!-- send to join.php-->
            <div class="row">
              <div class="col-sm-4">
                <span id="emailTextField">
                    <label for="email_address1"></label>
                    <input type="text" id="email_address1" name="email_address1" placeholder="Email Address">
                    <span class="textfieldRequiredMsg">An email address is required.</span>
                </span>
                <br>
                <span id="nameTextField">
                    <label for="name"></label>
                    <input type="text" id="name" name="name" placeholder="Name">
                    <span class="textfieldRequiredMsg">You must put your name.</span>
                </span>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <input type="submit" id="mailing_submit" class="btn btn-primary float-right" value="Sign Up" name="submit">
              </div>
            </div>
          </form>
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
    <script type="text/javascript" src="js/externalJS.js"></script>

    <!-- Javascript for Form alerts -->
    <script type="text/javascript">
        var sprytextfield1 = new Spry.Widget.ValidationTextField("emailTextField", "email", {hint:"Your Email Here", validateOn:["blur"]});
        var sprytextfield3 = new Spry.Widget.ValidationTextField("nameTextField", "none", {hint:"Your Name Here", validateOn:["blur"]});


    </script>
  </body>

</html>
