<?php include 'views/header.php'; ?>
    <!-- Header with Background Image -->
    <header class="meeting header">
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
        <div class="col-sm-8">
          <h2 class="mt-4">Contact Us</h2>
          <p>Fill out the form below to let us know how we are doing.</p>

          <!-- Contact form -->
          <form id="contact_form" name="contact_form" action="thankyou.php" method="post">  <!-- send to thankyou.php-->
            <div class="row">
              <div class="col-sm-4">
                <span id="emailTextField">
                    <label for="email_address1"></label>
                    <input type="text" id="email_address1" name="email_address1" placeholder="Email Address">
                    <span class="textfieldRequiredMsg">An email address is required.</span>
                </span>
                <br>
                <span id="firstNameTextField">
                    <label for="first_name"></label>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name">
                    <span class="textfieldRequiredMsg">You must put your first name.</span>
                </span>
                <br>
                <span id="lastNameTextField">
                    <label for="last_name"></label>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                    <span class="textfieldRequiredMsg">You must put your last name.</span>
                </span>
              </div>
              <div class="col-sm-4">
                  <p>
                      <span id="messageTextArea">
                          <label for="comments"></label>
                          <textarea form="contact_form" id="comments" name="comments" cols="25" rows="4" placeholder="Enter your comments here."></textarea>
                          <span id="countmessageTextArea">&nbsp;</span><span class="textareaRequiredMsg">You must enter a comment</span><span class="textareaMaxCharsMsg">Exceeded maximum number of characters.</span>
                      </span>
                  </p>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5">
                <input type="submit" id="email_submit" class="btn btn-primary float-right" value="Send us an email" name="submit">
              </div>
            </div>
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
    <script type="text/javascript" src="js/externalJS.js"></script>

    <!-- Javascript for Form alerts -->
      <script type="text/javascript">
          var sprytextfield1 = new Spry.Widget.ValidationTextField("emailTextField", "email", {hint:"Your Email", validateOn:["blur"]});
          var sprytextfield2 = new Spry.Widget.ValidationTextField("firstNameTextField", "none", {hint:"Your First Name", validateOn:["blur"]});
          var sprytextfield3 = new Spry.Widget.ValidationTextField("lastNameTextField", "none", {hint:"Your Last Name", validateOn:["blur"]});
          var sprytextarea1 = new Spry.Widget.ValidationTextarea("messageTextArea", {minChars:1, maxChars:255, counterType:"chars_remaining", counterId:"countmessageTextArea", validateOn:["blur"], hint:"Your Message"});
      </script>
  </body>

</html>
