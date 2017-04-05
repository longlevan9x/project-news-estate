<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
    <?php echo $this->breadcrumbs->show(); ?>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?php echo $content; ?> tài khoản - <?php echo $username; ?></h3>
				</div>
				<div class="panel-body">
						<!-- button delete -->
                        <button type="button" class="btn btn-lager btn-primary pull-right btnDelete" data-toggle="modal" data-target="#myModal<?php echo $id; ?>"><span class="glyphicon glyphicon-remove"></span>  Xóa.</button>
                        <div class="modal fade" id="myModal<?php echo $id; ?>" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Bạn có muốn xóa tài khoản <?php echo $username; ?>?</h4>
                                     </div>
                                    <div class="modal-footer">
                                        <a href="<?php echo site_url('infoadmin/deleteInfo/'. $id); ?>" class="btn btn-lager btn-danger" >
                                            <span class="glyphicon glyphicon-remove"> Xóa.</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end delete -->
						<a href="<?php echo site_url('infoadmin/index/edit-info/' . $id); ?>" class="btn btn-lager btn-warning pull-right btnUpdate">Cập nhật</a>
						<br>
						<hr>
					<div class="info-box">
						<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 info-head">
							<p class="info-content">ID</p>
							<p class="info-content">Tên tài khoản</p>
							<p class="info-content">Mật khẩu</p>
							<p class="info-content">Số điện thoại</p>
							<p class="info-content">Email</p>
							<p class="info-content">Ngày sinh</p>
							<p class="info-content">Role</p>
							<p class="info-content">Trạng thái</p>
							<p class="info-content">Ngày tạo</p>
							<p class="info-content">Ngày sửa</p>
							<p class="info-content1">Ảnh đại diện</p>
						</div>
						<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 info-body">
							<p class="info-content"><?php echo $id; ?></p>
							<p class="info-content"><?php echo $username; ?></p>
							<p class="info-content"><?php echo $password; ?></p>
							<p class="info-content"><?php echo $phone; ?></p>
							<p class="info-content"><?php echo $email; ?></p>
							<p class="info-content"><?php echo $birthday; ?></p>
							<p class="info-content">
								<?php if ($role == 1): ?>
	                                Admin1
	                            <?php elseif($role == 2): ?>
	                                Admin2
	                            <?php elseif($role == 3): ?>
	                                Admin3
	                            <?php else: ?>
	                                Boss
	                            <?php endif ?>
                            </p>
							<p class="info-content">
								<?php if ($status == 0): ?>
                                    Ko kích hoạt
                                <?php elseif($status == 1): ?>
                                    kích hoạt
                                <?php endif ?>
							</p>
							<p class="info-content"><?php echo $created_date; ?></p>
							<p class="info-content"><?php echo $modify_date; ?></p>
							<p class="info-content1">
								<img src="<?php echo '../../../../uploads/imgAdmin/'.$avatar; ?>" alt="" style="width: 90px">
							</p>
						</div>
					</div>
				</div>
			</div>
      	</div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->