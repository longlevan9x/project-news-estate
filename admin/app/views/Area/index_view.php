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
                <?php echo (!empty($editok) || !empty($deleteok)) ? "<p class='text-center bg-success' style='padding: 5px;border-radius: 5px;'>" . $editok . $deleteok . "</p>" : ''; ?>

                    <table class="table table-striped table-bordered" >
                        <thead>
                            <tr>
                                <th style="width:40px;text-align:center;">STT</th>
                                <th style="width:350px;text-align:center;">Tên <?php echo $title; ?></th>
                                <th style="width:150px;text-align:center;">Quận / Huyện</th>
                                <th style="width:250px;text-align:center;">Action</th>
                              </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($area as $k => $val): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $i; ?></td>
                                <td><?php echo $val['name_area']; ?></td>
                                <td>
                                    <?php foreach ($district as $key => $valD): ?>
                                        <?php if ($valD['id'] == $val['id_district']): ?>
                                            <?php echo $valD['name_district']; ?>
                                            <?php break; ?>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('area/index/editarea/'.$val['id']); ?>" class="btn btn-lager btn-warning">
                                        <span class="glyphicon glyphicon-edit"></span> Sửa.
                                    </a>
                                    <!-- button delete -->
                                    <button type="button" class="btn btn-danger btn-lager" data-toggle="modal" data-target="#myModal<?php echo $val['id']; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                                    <div class="modal fade" id="myModal<?php echo $val['id']; ?>" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Bạn có muốn xóa <?php echo $title . " " . $val['name_area']; ?>?</h4>
                                                 </div>
                                                <div class="modal-footer">
                                                    <a href="<?php echo site_url('area/deleteArea/'.$val['id']); ?>" class="btn btn-lager btn-danger" >
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
                    <h3 class="panel-title">Thêm <?php echo $title; ?></h3>
                </div>
                <div class="panel-body">
                    <?php echo validation_errors();?>
                    <form action="<?php echo site_url('area/addArea'); ?>" method="post" accept-charset="utf-8">
                        <?php echo (!empty($success) || !empty($fail)) ? "<p class='text-center bg-success' style='padding: 5px;border-radius: 5px;'>" . $success . $fail . "</p>" : ''; ?>
                        <input type="text" name="txtName" id="txtName" class="form-control" value="" title="Nhập vào tên <?php echo $title; ?>" placeholder="Nhập vào tên <?php echo $title; ?>...">
                        <br>
                        <select name="txtDistrict" id="txtDistrict" class="form-control" required="required">
                            <option value="prompt">---Thuộc Quận / Huyện---</option>
                            <?php foreach ($district as $key => $val): ?>
                                <option value="<?php echo $val['id']; ?>"><?php echo $val['name_district']; ?></option>
                            <?php endforeach ?>
                        </select>
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
