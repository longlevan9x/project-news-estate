<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?></h3>
                </div>
                <div class="panel-body">
                    <p class="text-center  bg-success"></p><?php echo $addSuccess; echo $deleteSuccess; echo $editSuccess; ?>
                    <a href="<?php echo site_url('webintroduce/index/create'); ?>" class="btn btn-lager btn-warning pull-right">
                        <span class="glyphicon glyphicon-edit"></span> Tạo nội dung.
                    </a>
                    <br>
                    <br>
                    <table class="table table-striped table-bordered" id="web-intro">
                        <thead>
                            <tr>
                                <th style="width:40px;text-align:center;">STT</th>
                                <th style="text-align:center;">Tiêu đề</th>
                                <th style="width: 300px;text-align:center;">Nội dung</th>
                                <th style="width: 100px;text-align:center;">Trạng thái</th>
                                <th style="text-align:center;">Tác giả</th>
                                <th style="width: 250px;text-align:center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($webIntro as $key => $val): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i; ?></td>
                                <td><?php echo $val['title']; ?></td>
                                <td><?php echo $val['description']; ?></td>
                                <td>
                                    <?php if ($val['status'] == 0): ?>
                                        Ẩn
                                    <?php else: ?>
                                        Hiển thị
                                    <?php endif ?>
                                </td>
                                <td><?php echo $val['author']; ?></td>
                                <td>
                                    <a href="<?php echo site_url('webintroduce/index/view-content/'. $val['id']); ?>" class="btn btn-lager btn-info">
                                        <span class="glyphicon glyphicon-eye-open">Xem.</span>
                                    </a>
                                    <a href="<?php echo site_url('webintroduce/index/update/'. $val['id']); ?>" class="btn btn-lager btn-warning">
                                        <span class="glyphicon glyphicon-edit">Sửa.</span>
                                    </a>
                                    <!-- button delete -->
                                    <button type="button" class="btn btn-danger btn-lager" data-toggle="modal" data-target="#myModal<?php echo $val['id']; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                                    <div class="modal fade" id="myModal<?php echo $val['id']; ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa <?php echo $title; ?>?</h4>
                                                 </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('webintroduce/deleteIntro/'. $val['id']); ?>" class="btn btn-lager btn-danger" >
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