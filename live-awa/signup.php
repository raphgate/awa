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

    <!-- Custom styles for this template was-validated -->
    <link href="asset/css/style.css" rel="stylesheet">
</head>

<body class="signin bg-awa-light" style="background: #ffffff!important">
<form class="form-signup" id="registerUser">
    <div class="text-center mt-0">
        <img class="mb-3" src="asset/img/logocolor.png" alt="" height="32">
        <h1 class="h5 mb-3 font-weight-normal">Join AWA Community</h1>
    </div>
    <div class="card rounded-0 p-3 bg-awa-light">
        <div class="login-area">

        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="text" name="fName" class="form-control" id="firstName" placeholder="First name" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="lName" class="form-control" id="lastName" placeholder="Last name" required>
            </div>
        </div>
        <div class="form-group">
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="text" name="country" class="form-control" id="country" placeholder="Country" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="city" class="form-control" id="city" placeholder="City" required>
            </div>
            <div class="form-group col-md-6">
                <input type="text" name="state" class="form-control" id="state" placeholder="State" required>
            </div>
        </div>
        <div class="form-group">
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <div class="d-flex justify-content-between align-items-middle w-100">
            <button class="btn btn-primary rounded-0 bg-awa-prim border-0 text-dark" type="submit" id="register">Sign up</button>
            <a href="signin.php" class="text-awa-sec">Have an account?</a>
        </div>

    </div>
    <p class="mt-3 mb-1 text-muted text-center">&copy; 2017-2019</p>
</form>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="asset/js/jquery.min.js"></script>
<script src="asset/plugins/bootstrap-4.1.1/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script  src="asset/js/main.js" type="text/javascript"></script>
<script type="text/javascript">
      $(document).ready(function(){
        $('#registerUser').on('submit', function(e){
          e.preventDefault();
          $('#register').attr('disabled', true).html('Processing <i class="fas fa-spinner fa-pulse fa-fw "></i>');
          var formData = new FormData(this);
          $.ajax({
            url: 'src/register',
            type : 'POST',
            data : formData,
            processData: false,
            cache: false,
            contentType: false,
            success: function(data){
              if (data == 'done') {
                $("#register").slideUp();
                $(".login-area").slideDown();
                $('.login-area').html('<div class="alert alert-success"><p>Registration successful! Redirecting in 3 seconds</></div>');
                setTimeout(
                  function () {
                  window.location.assign('signin.php')
                  }, 3000);
              }
              else{
                $(".login-area").slideDown();
                $('.login-area').html('<div class="alert alert-danger"><p>'+data+'</></div>');
                setTimeout(
                  function () {
                  $(".login-area").slideUp();
                  }, 5000);
                $('#register').attr('disabled', false).html('Sign up');
              }
            }
          });
        });
      });
    </script>
</body>
</html>

