<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>public/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/css/login.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>public/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body>

    <div class="container login-page">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 animated fadeInUp">
                <div class="login-panel panel panel-default ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Đăng nhập</h3>
                    </div>
                    <div class="panel-body">
                    <p class="text-center"><?php echo $mess; ?></p>
                        <form role="form" method="post" action="<?php echo site_url('login/actionlogin'); ?>" accept-charset="utf-8">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên tài khoản..." name="txtTenTaiKhoan" id="txtTenTaiKhoan" type="text" autofocus minlength="3" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu..." name="txtMatKhau" id="txtMatKhau" type="password" minlength="6" maxlength="100" value="">
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Nhớ mật khẩu.
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
