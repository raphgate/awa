<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../asset/img/favicon.ico">

    <title>Awa Network</title>

    <!-- Bootstrap core CSS -->
    <link href="../asset/plugins/bootstrap-4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" type="text/css" href="../asset/plugins/fontawesome/css/all.css">

    <!-- Custom styles for this template -->
    <link href="../asset/css/style.css" rel="stylesheet">
  </head>

  <body class="signin bg-awa-dark text-center">
    <form class="form-signin">
      <div class="card text-center rounded-0 p-3 bg-awa-grey box-shadow-dark">
          <div class="text-center"><img class="mb-3" src="../asset/img/logocolor.png" alt="" height="32"></div>
          <h1 class="h5 mb-3 font-weight-normal">Admin Area</h1>
          <div class="alert alert-danger rounded-0 d-none p-1 fade show" role="alert">
            user name or password incorrect...!
          </div>
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
          <div class="login-area">
            
          </div>
          <button class="btn btn-lg btn-primary btn-block rounded-0 bg-awa-prim border-0 text-dark my-2" type="submit" id="signin">Sign in</button>
      </div> 
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
    </form>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../asset/js/jquery.min.js"></script>
    <script src="../asset/plugins/bootstrap-4.1.1/js/bootstrap.min.js"></script>
    <script  src="../asset/js/main.js" type="text/javascript"></script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('form').on('submit', function(e){
          e.preventDefault();
          $('#signin').attr('disabled', true).html('Processing <i class="fas fa-spinner fa-pulse fa-fw "></i>');
          var formData = new FormData(this);
          $.ajax({
            url: '../src/admin_login',
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
                  window.location.assign('index.php')
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

