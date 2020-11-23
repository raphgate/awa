<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Register</title>

    <!-- Styles -->
    <link href="assets/css/page.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png">
    <link rel="icon" href="assets/img/favicon.ico">
  </head>

  <body class="layout-centered bg-img" style="background-image: url(assets/img/bg/4.jpg);">


    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Join AWA Community</h5>

        <form>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="fname" placeholder="First Name">
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="lname" placeholder="Last Name">
            </div>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>

          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email Address">
          </div>

          <div class="form-group">
            <input type="text" class="form-control" name="country" placeholder="Nationality">
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="city" placeholder="City">
            </div>

            <div class="form-group col-md-6">
              <input type="text" class="form-control" name="state" placeholder="State or Province">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="form-group col-md-6">
              <input type="password" class="form-control" name="password-confirm" placeholder="Password (confirm)">
            </div>
          </div>

          <div class="form-group py-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input">
              <label class="custom-control-label">I agree to the <a class="ml-1" href="terms.php">terms of service</a></label>
            </div>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Register</button>
          </div>
        </form>

        <div class="divider">Or Register With</div>
        <div class="text-center">
          <a class="btn btn-circle btn-sm btn-facebook mr-2" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-circle btn-sm btn-google mr-2" href="#"><i class="fa fa-google"></i></a>
          <a class="btn btn-circle btn-sm btn-twitter" href="#"><i class="fa fa-twitter"></i></a>
        </div>

        <hr class="w-30">

        <p class="text-center text-muted small-2">Already a member? <a href="login.php">Login here</a> OR <a href="index.php">return to Home.</a></p>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="assets/js/page.min.js"></script>
    <script src="assets/js/script.js"></script>

  </body>
</html>
