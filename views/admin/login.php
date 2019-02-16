<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - Landing Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="./../../public/admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./../../public/admin/bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="./../../public/admin/bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="./../../public/admin/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="./../../public/admin/dist/css/skins/skin-blue.min.css">
  <meta name="author" content="paulowebphp@gmail.com" />
  <meta name="theme-color" content="#3c8dbc">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#"><b>Admin</b>LandingPage</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg">Acesso a Área Restrita</p>

      <?php if( isset($_SESSION[User::ERROR]) && $_SESSION[User::ERROR] != '' ): ?>
        <div class="alert alert-danger">
            <?php echo User::getError(); ?>
        </div>
      <?php endif; ?>

      <form action="/admin/login" method="post">
        <div class="form-group has-feedback">
          <input type="email" name="email" class="form-control" placeholder="E-mail">
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" name="password" class="form-control" placeholder="Senha">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery 3 -->
  <script src="./../../public/admin/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="./../../public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>