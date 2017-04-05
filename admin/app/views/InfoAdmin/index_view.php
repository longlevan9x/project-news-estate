<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?></h3>
                </div>
                <div class="panel-body">
                <!-- show mess -->
                <?php echo (!empty($editsuccess) || !empty($deleteok)) ? "<p class='text-center bg-success' style='padding: 5px;border-radius: 5px;'>" . $editsuccess . $deleteok . "</p>" : ''; ?>

                    <table class="table table-striped table-infoadmin" >
                        <thead>
                            <tr>
                                <th style="width:40px;text-align:center;">STT</th>
                                <th style="text-align:center;">Tên tài khoản</th>
                                <th style="text-align:center;">Số điện thoại</th>
                                <th style="text-align:center;">Email</th>
                                <th style="text-align:center;">Ảnh đại diện</th>
                                <th style="text-align:center;">Role</th>
                                <th style="text-align:center;">Trạng thái</th>
                                <th style="text-align:center;">Ngày sinh</th>
                                <!-- <th style="text-align:center;">Ngày tạo</th> -->
                                <th style="text-align:center;">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($admin as $k => $val): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i; ?></td>
                                <td><?php echo $val['username']; ?></td>
                                <td><?php echo $val['phone']; ?></td>
                                <td><?php echo $val['email']; ?></td>
                                <td>
                                    <img src="<?php echo PATH_IMG_ADMIN.$val['avatar']; ?>" alt="" style="width: 90px">
                                </td>
                                <td style="text-align:center;">
                                    <?php if ($val['role'] == 1): ?>
                                        Admin1
                                    <?php elseif($val['role'] == 2): ?>
                                        Admin2
                                    <?php elseif($val['role'] == 3): ?>
                                        Admin3
                                    <?php else: ?>
                                        Boss
                                    <?php endif ?>
                                </td>
                                <td style="text-align:center;">
                                    <?php if ($val['status'] == 0): ?>
                                        Ko kích hoạt
                                    <?php elseif($val['status'] == 1): ?>
                                        kích hoạt
                                    <?php endif ?>
                                </td>
                                <td><?php echo $val['birthday']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('infoadmin/index/view-info/'.$val['id']); ?>" class="btn btn-xs btn-info">
                                        <span class="glyphicon glyphicon-eye-open">Xem.</span>
                                    </a>
                                    <a href="<?php echo site_url('infoadmin/index/edit-info/'.$val['id']); ?>" class="btn btn-xs btn-warning">
                                        <span class="glyphicon glyphicon-edit">Sửa.</span>
                                    </a>
                                    <!-- button delete -->
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal<?php echo $val['id']; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                                    <div class="modal fade" id="myModal<?php echo $val['id']; ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa tài khoản <?php echo $val['username']; ?>?</h4>
                                                 </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('infoadmin/deleteInfo/'.$val['id']); ?>" class="btn btn-lager btn-danger" >
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
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->