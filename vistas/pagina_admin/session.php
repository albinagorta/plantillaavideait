<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AvideaIT | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

     <!-- Bootstrap 3.3.7 -->
    <link href="../plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome Icons -->
    <link href="../asese/font/css/all.css" rel="stylesheet" type="text/css" />

    <!-- Theme style -->
    <link href="../css/AdminLTE.min.css" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="">AvideaIT</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Ingresar datos</p>
        <form action="" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="user" placeholder="Email"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="pass" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar
              </button>
              <input type="hidden" name="pro" value="loginadmin">
            </div><!-- /.col -->
          </div>
        </form>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
   
  </body>
</html>