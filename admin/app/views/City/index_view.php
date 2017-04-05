<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?></h3>
                </div>
                <div class="panel-body">
                <!-- show mess -->
                <?php echo (!empty($editOk) || !empty($deleteOk)) ? "<p class='text-center bg-success' style='padding: 5px;border-radius: 5px;'>" . $editOk . $deleteOk . "</p>" : ''; ?>

                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="width:40px;text-align:center;">STT</th>
                                <th style="width:350px;text-align:center;">Tên thành phố</th>
                                <th style="text-align:center;">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($city as $k => $c): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i; ?></td>
                                <td><?php echo $c['name_city']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('city/index/editcity/'.$c['id']); ?>" class="btn btn-lager btn-warning">
                                        <span class="glyphicon glyphicon-edit">Sửa.</span>
                                    </a>
                                    <!-- button delete -->
                                    <button type="button" class="btn btn-danger btn-lager" data-toggle="modal" data-target="#myModal<?php echo $c['id']; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                                    <div class="modal fade" id="myModal<?php echo $c['id']; ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa <?php echo $title; ?> <?php echo $c['name_city']; ?>?</h4>
                                                 </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('city/deleteCity/'.$c['id']); ?>" class="btn btn-lager btn-danger" >
                                                        <span class="glyphicon glyphicon-remove"> Xóa.</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end delete -->
                                </td>
                            </tr>
                        <?php $i++; ?>
                        <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- end list data -->

        <!-- add data -->
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
            <div class="panel panel-primary" style="width: 450px">
                <div class="panel-heading">
                    <h3 class="panel-title">Thêm thành phố</h3>
                </div>
                <div class="panel-body">
                    <?php echo validation_errors();?>
                    <form action="<?php echo site_url('city/addCity'); ?>" method="post" accept-charset="utf-8">
                        <?php echo (!empty($success) || !empty($fail)) ? "<p class='text-center bg-success' style='padding: 5px;border-radius: 5px;'>" . $success . $fail . "</p>" : ''; ?>
                        <input type="text" name="txtName" id="txtName" class="form-control" value="" title="Nhập vào tên thành phố" placeholder="Nhập vào tên thành phố...">
                        <br>
                        <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Thêm</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end add data -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->