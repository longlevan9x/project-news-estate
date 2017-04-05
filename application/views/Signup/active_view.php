<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Kíc hoạt tài khoản</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.css"/>
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-3 col-md-5 col-lg-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Kích hoạt tài khoản</h3>
					</div>
					<div class="panel-body">
						<p class="text-center"><big><strong><?php echo $mess; ?></strong></big></p>
						<?php if (isset($mess1) && $mess1 == "fail"): ?>
							<?php show_404(); ?>
						<?php else: ?>
							<a href="<?php echo site_url('trang-chu'); ?>" style="margin-left: 150px;" class="btn btn-primary">Đăng nhập</a>
							<a href="<?php echo site_url('dang-ky'); ?>" class="btn btn-warning">Đăng ký</a>
						<?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
