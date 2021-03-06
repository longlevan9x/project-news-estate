<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php echo $this->breadcrumbs->show(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:30px;">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?></h3>
                </div>
                <div class="panel-body">
                    <p class="text-center bg-warning"><?php echo $editfail; ?></p>
                    <form action="<?php echo site_url('bank/index/editbank/'.$idBank); ?>" method="post" accept-charset="utf-8">
                        <input type="text" name="txtName" id="txtName" class="form-control" value="<?php echo $nameBank; ?>" title="Nhập vào tên <?php echo $title; ?>" placeholder="Nhập vào tên <?php echo $title; ?>...">
                        <input type="hidden" name="hddName" id="hddName" value="<?php echo $nameBank; ?>">
                        <br>
                        <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Sửa</button>
                        <a href="<?php echo site_url('bank/index'); ?>" class="btn btn-primary">Trở lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->