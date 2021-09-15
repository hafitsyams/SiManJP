<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - SIMANJP</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  </head>
  
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?=base_url()?>assets/index2.html"><b>SIMan</b>JP</a>
      </div>
      <div class="login-box-msg">
        <h3>Sistem Informasi Manajemen Join Program</h3>
      </div>
      <div class="login-box-body">
        <p class="login-box-msg">
          <img src="<?=base_url()?>assets/dist/img/pptik.png" title="PPTIK" class="" width="90px">
        </p>
        <form action="<?=site_url('auth/process')?>" method="post">
          <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <a href="#" class="pull-right">Lupa password?</a></br>
          </div>
          <div class="row">
            <div class="col-xs-8"></div>
            <div class="col-xs-12">
              <button type="submit" Name="login" class="btn btn-primary btn-block btn-flat">Masuk</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>