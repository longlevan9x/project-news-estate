<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?> tài khoản - <?php echo $username; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <p class="text-center bg-warning"><?php echo $editerror; ?></p>
                    <?php foreach ($fail as $key => $err): ?>
                        <p class="text-center bg-warning"><?php echo $err; ?></p>
                    <?php endforeach ?>
                    <form action="<?php echo site_url('infoadmin/index/action-edit-info/'.$id); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <input class="form-control" placeholder="Tên tài khoản..." title="Tên tài khoản..." name="txtUserName" id="txtUserName" type="text" autofocus minlength="3" value="<?php echo $username; ?>">
                        <input type="hidden" name="hddName" id="hddName" value="<?php echo $username; ?>">
                        <br>
                        <input type="text" name="txtPhone" id="txtPhone" class="form-control" title="Số điện thoại..." placeholder="Số điện thoại..." value="<?php echo $phone; ?>">
                        <br>
                         <input class="form-control" placeholder="E-Mail" name="txtEmail" id="txtEmail" type="text" title="E-mail" value="<?php echo $email; ?>">
                        <br>
                        <div class="form-group">
                            <select name="txtStatus" id="txtStatus" class="form-control">
                                <option value="-2">---Chọn trạng thái---</option>
                                <option value="1" <?php echo (!empty($is_active) && $is_active == 0) ? "selected='selected'" : ''; ?>>Không kích hoạt</option>
                                <option value="2" <?php echo (!empty($is_active) && $is_active == 1) ? "selected='selected'" : ''; ?>>Kích hoạt</option>
                            </select>
                        </div>
                        <!-- <input type="text" name="txtStatus" id="txtStatus" class="form-control"  title="Trạng thái" placeholder="Trạng thái" value="<?php echo $status; ?>"> -->
                        <br>
                        <div class="form-group">
                            <label for="txthdAvatar">Ảnh đại diện mới</label>
                            <input type="hidden" name="txthdAvatar" id="txthdAvatar" value="<?php echo $avatar; ?>" title="Ảnh đại diện...">
                            <input type="file" name="txtAvatar" id="txtAvatar" title="Ảnh đại diện...">
                            <br>
                            <label for="">Ảnh cũ</label><br>
                            <img src="../../<?php echo PATH_IMG_MEMBER.$avatar; ?>" alt=""  style="width: 100px;">
                        </div>
                        <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Sửa</button>
                        <a href="<?php echo site_url('infoadmin/index'); ?>" class="btn btn-primary">Trở lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->