<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php echo $this->breadcrumbs->show(); ?>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $content; ?> tiêu đề- <?php echo $title; ?></h3>
				</div>
				<div class="panel-body">
					<!-- button delete -->
                    <button type="button" class="btn btn-lager btn-primary pull-right btnDelete" data-toggle="modal" data-target="#myModal<?php echo $id; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                    <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Bạn có muốn xóa tài khoản <?php echo $title; ?>?</h4>
                                 </div>
                                <div class="modal-footer">
                                    <a href="<?php echo site_url('webintroduce/deleteIntro/'. $id); ?>" class="btn btn-lager btn-danger" >
                                        <span class="glyphicon glyphicon-remove"> Xóa.</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end delete -->
					<a href="<?php echo site_url('webintroduce/index/update/'. $id); ?>" class="btn btn-lager btn-warning pull-right btnUpdate">Cập nhật</a>
					<br>
					<hr>
					<table class="table table-striped table-hover">
					<style type="text/css" media="screen">
						th{width: 250px;text-indent: 30px;}
					</style>
						<tr>
							<th>ID</th>
							<td><?php echo $id; ?></td>
						</tr>
						<tr>
							<th>Tiêu đề</th>
							<td><?php echo $title; ?></td>
						</tr>
						<tr>
							<th>Nội dung</th>
							<td><?php echo $description; ?></td>
						</tr>
						<tr>
							<th>Trạng thái</th>
							<td><?php echo $author; ?></td>
						</tr>
						<tr>
							<th>Tác giả</th>
							<td>
								<?php if ($status == 0): ?>
									Ẩn
								<?php else: ?>
									Hiện
								<?php endif ?>
							</td>
						</tr>
						<tr>
							<th>Ngày đăng</th>
							<td><?php echo $posting_date; ?></td>
						</tr>
						<tr>
							<th>Ngày sửa</th>
							<td><?php echo $modify_date; ?></td>
						</tr>
					</table>
				</div>
			</div>
      	</div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->