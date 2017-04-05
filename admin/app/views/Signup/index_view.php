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
            <div class="col-md-4 col-md-offset-4 animated">
                <div class="signup-panel panel panel-default ">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Đăng ký</h3>
                    </div>
                    <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <?php foreach ($fail as $key => $err): ?>
                        <p class="text-center"><?php echo $err; ?></p>
                    <?php endforeach ?>

                    <p class="text-center"><?php echo $failimg; echo $success; echo $error;?></p>

                        <form role="form" action="<?php echo site_url('signup/addAccountAdmin'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tên tài khoản" name="txtUserName" type="text" autofocus minlength="3">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="txtPassword" type="password" value="" minlength="6" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu nhập lại" name="txtRePass" type="password" value="" minlength="6" maxlength="100">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-Mail" name="txtEmail" type="text" value="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Ngày sinh" name="txtBirthday" type="date" value="" title="Ngày sinh phải trước năm 2000">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Số điện thoại" name="txtPhone" type="text" value="" >
                                </div>
                                <div class="form-group">
                                    <select name="txtRole" class="form-control">
                                        <option value="-2">---Chọn quyền---</option>
                                        <option value="1">Admin bậc 1</option>
                                        <option value="2">Admin bậc 2</option>
                                        <option value="3">Admin bậc 3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="txtAvatar">Ảnh đại diện</label>
                                    <input type="file" name="txtAvatar" id="txtAvatar" title="Ảnh đại diện...">
                                    <br>
                                    <img src="" alt="">
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-lg btn-block btn-primary">Đăng ký</button>
                                <a href="<?php echo site_url('dashboard/index'); ?>" style="margin-top: 10px;" ><p class="text-center">Trang chủ</p></a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
