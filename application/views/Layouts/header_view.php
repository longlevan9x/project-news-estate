<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>
	<meta charset="UTF-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/bootstrap/css/bootstrap.css" />
  	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/style.css"/>
  	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.min.css"/>
  	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="<?php echo base_url(); ?>public/assets/bootstrap/js/bootstrap.js"></script>
  	<script src="<?php echo base_url(); ?>public/assets/script.js"></script>

	<!-- Owl stylesheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/owl-carousel/owl.theme.css">
	<script src="<?php echo base_url(); ?>public/assets/owl-carousel/owl.carousel.js"></script>
	<!-- Owl stylesheet -->


	<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>public/assets/slitslider/js/jquery.slitslider.js"></script>
	<!-- slitslider -->
	<!-- <script src="<?php echo base_url(); ?>public/js/ajax.js" type="text/javascript" charset="utf-8" async defer></script> -->
	<!-- CKEDITOR AND CKFINDER-->
	<script src="<?php echo base_url(); ?>public/ckeditor/ckeditor.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="<?php echo base_url(); ?>public/ckfinder/ckfinder.js" type="text/javascript" charset="utf-8" async defer></script>
</head>

<body>

<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
	        <div class="container">
	            <div class="navbar-header">

	              	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
	              	</button>
	            </div>

	            <!-- Nav Starts -->
	            <div class="navbar-collapse  collapse">
	              	<ul class="nav navbar-nav navbar-right">
		               	<li class=""><a href="<?php echo site_url('trang-chu'); ?>">TRANG CHỦ</a></li>
		                <li><a href="<?php echo site_url('gioi-thieu'); ?>">GIỚI THIỆU</a></li>
		                <li><a href="<?php echo site_url('blog'); ?>">BLOG</a></li>
		                <li><a href="<?php echo site_url('lien-he'); ?>">LIÊN HỆ</a></li>

		                <?php if (!empty($sessionUsername) && !empty($sessionEmail)): ?>
		                <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								XIN CHÀO <?php echo $sessionFullname; ?><b class="caret"></b></a>
							<ul class="dropdown-menu">
			                	<li><a href="<?php echo site_url('dang-ky'); ?>">Hồ sơ</a></li>
			                	<li><a href="<?php echo site_url('danh-sach-tin'); ?>">Danh sách bài đăng</a></li>
			                	<li><a href="<?php echo site_url('dang-ky'); ?>">ĐĂNG KÝ</a></li>
				                <li><a href="<?php echo site_url('home/logout'); ?>">ĐĂNG XUẤT (<?php echo $sessionUsername; ?>)</a></li>
							</ul>
						</li>
		                <?php else: ?>
		                	<li><a href="<?php echo site_url('login'); ?>">ĐĂNG NHẬP</a></li>
			                <li><a href="<?php echo site_url('dang-ky'); ?>">ĐĂNG KÝ</a></li>
		                <?php endif ?>
	              	</ul>
	            </div>
	            <!-- #Nav Ends -->
	        </div>
        </div>

    </div>
<!-- #Header Starts -->

<div class="container">
<!-- Header Starts -->
	<div class="header">
		<a href="<?php echo site_url('trang-chu'); ?>"><img src="<?php echo base_url(); ?>public/images/bds24h.png" alt="bds24h.jpg" width=100></a>
          	<ul class="pull-right">
	            <li><a href="<?php echo (!empty($sessionUsername) && !empty($sessionEmail)) ? base_url('dang-tin.html') : base_url('login.html'); ?>" class="post-new">Đăng tin</a> <a style="font-size: 13px;color: #171515;text-transform: lowercase;" title="Danh sách tin" href="<?php echo site_url('danh-sach-tin'); ?>"><?php echo (isset($newsPosted) && !empty($newsPosted)) ? '( '.count($newsPosted) .' tin đã đăng)' : ''; ?></a></li>
          	</ul>
	</div>
<!-- #Header Starts -->
</div>