<?php include ('views/header.php'); ?>
    <!-- Header with Background Image -->
    <header class="coffee header">
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
        <div class="col-sm-6">
          <h5 class="mt-4">Calculate your Miles Per Gallon (MPG)</h4>
          <p>
            <a class="btn btn-primary" onClick="mpgCalc()">Calculate MPG &raquo;</a>
          </p>
          <p id="mpgResult"> </p>
        </div>
        <div class="col-sm-6">
          <h5 class="mt-4">Calculate your average test scores</h4>
          <p>
            <a class="btn btn-primary " onClick="testScores()">Calculate Scores &raquo;</a>
          </p>
          <p id="testScoreResult"> </p>
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
  </body>

</html>
