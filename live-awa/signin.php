<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="asset/img/favicon.ico" type="image/x-icon">

    <title>AWA Network</title>

    <!-- Bootstrap core CSS -->
    <link href="asset/plugins/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="asset/plugins/fontawesome/css/all.css">

    <!-- Custom styles for this template -->
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body class="signin bg-awa-white text-center">
<form class="form-signin" method="POST" action="" id="login-form">
    <div class="card text-center rounded-0 p-3 bg-awa-white">
        <div class="text-center"><a href="index"> <img class="mb-3" src="asset/img/logocolor.png" alt="" height="32"></a></div>
        <h1 class="h5 mb-3 font-weight-normal">Member Area</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="login-area">
          
        </div>
          <button class="btn btn-lg btn-primary btn-block rounded-0 bg-awa-prim border-0 text-dark my-2" type="submit" id="signin">Sign in</button>
        <div class="d-flex justify-content-between align-items-middle w-100 my-2">
            <a href="signin.php" class="text-secondary">Forgot password?</a>
            <a href="signup.php" class="text-awa-prim">Register</a>
        </div>
    </div>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/plugins/bootstrap-4.1.1/js/bootstrap.min.js"></script>
<script  src="asset/js/main.js" type="text/javascript"></script>

<script type="text/javascript">
      $(document).ready(function(){
        $('#login-form').on('submit', function(e){
          e.preventDefault();
          $('#signin').attr('disabled', true).html('Processing <i class="fas fa-spinner fa-spin fa-fw "></i>');
          var formData = new FormData(this);
          $.ajax({
            url: 'src/login',
            type : 'POST',
            data : formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
              if (data == 'done') {
                $("#signin").slideUp();
                $(".login-area").slideDown();
                $('.login-area').html('<div class="alert alert-success"><p>Login successful! Redirecting in 3 seconds</></div>');
                setTimeout(
                  function () {
                  window.location.assign('profile.php')
                  }, 3000);
              }
              else{
                $(".login-area").slideDown();
                $('.login-area').html('<div class="alert alert-danger"><p>'+data+'</></div>');
                setTimeout(
                  function () {
                  $(".login-area").slideUp();
                  }, 5000);
                $('#signin').attr('disabled', false).html('Sign in');
              }
            }
          });
        });
      });
    </script>
</body>
</html>

