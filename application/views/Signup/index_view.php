<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
  		<form action="<?php echo site_url('dang-ky-tk'); ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data" role="form">
  			<?php echo validation_errors(); ?>
  			<h3 class="text-center"><?php echo $ok;echo $fail; ?></h3>
  			<legend class="text-center">Đăng ký tài khoản</legend>
  			<div class="form-group">
  				<label for="txt">Họ Tên</label>
  				<input type="text" class="form-control" name="txtFullname" id="txtFullname" placeholder="Họ Tên">
  			</div>
  			<div class="form-group">
  				<label for="txt">Tên tài khoản</label>
  				<input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Tên tài khoản">
  			</div>
  			<div class="form-group">
  				<label for="txt">Mật khẩu</label>
  				<input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu">
  			</div>
  			<div class="form-group">
  				<label for="txt">Mật khẩu nhập lại</label>
  				<input type="password" class="form-control" name="txtRepass" id="txtRepass" placeholder="Mật khẩu nhập lại">
  			</div>
  			<div class="form-group">
  				<label for="txt">E-Mail</label>
  				<input type="email" class="form-control" name="txtEmail" id="txtEmail" placeholder="E-Mail" required="required">
  			</div>
  			<div class="form-group">
  				<label for="txt">Facebook</label>
  				<input type="text" class="form-control" name="txtFace" id="txtFace" placeholder="Facebook" required="required">
  			</div>
  			<div class="form-group">
  				<label for="txt">Skype</label>
  				<input type="text" class="form-control" name="txtSkype" id="txtSkype" placeholder="Skype" required="required">
  			</div>
  			<div class="form-group">
  				<label for="txt">Số điện thoại</label>
  				<input type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Số điện thoại" required="required">
  			</div>
  			<div class="form-group">
  				<label for="txt">Địa chỉ</label>
  				<textarea name="txtAddress" id="txtAddress" class="form-control" rows="3" placeholder="Địa chỉ" required="required"></textarea>
  			</div>
  			<input type="file" name="txtFile" id="txtFile" value="" placeholder="">
  			<button type="submit" class="btn btn-primary">Submit</button>
  		</form>
    </div>

</div>
</div>
</div>
<style type="text/css" media="screen">
	.errPass{
		padding: 0;
		margin: 0;
		color: red;
	}
	.displayErr{
		display: none;
	}
	.inputErr{
		border-color: red;
	}
</style>
<script type="text/javascript" charset="utf-8" async defer>
	$(document).ready(function() {
		// Chech Password
		$("#txtPassword").blur(function () {
			if ($.trim($('#txtPassword').val()).length < 7) {
				$("#txtPassword").after('<p id="err">Mật khẩu phải lớn hơn 6 ký tự</p>');
				$('#txtPassword').next('p#err').addClass('errPass');
				$('#txtPassword').addClass('inputErr');
			}
		});
		$("#txtPassword").focus(function () {
			$('#txtPassword').next('p#err').addClass('displayErr');
			$('#txtPassword').removeClass('inputErr');
		});
		// check Repass
		$("#txtRepass").blur(function () {
			if ($.trim($('#txtRepass').val()).length < 7) {
				$("#txtRepass").after('<p id="err">Mật khẩu nhập lại phải lớn hơn 6 ký tự</p>');
				$('#txtRepass').next('p#err').addClass('errPass');
				$('#txtRepass').addClass('inputErr');
			}
		});
		$("#txtRepass").focus(function () {
			$('#txtRepass').next('p#err').addClass('displayErr');
			$('#txtRepass').removeClass('inputErr');
		});
		// check Fullname
		$("#txtFullname").blur(function () {
			if ($.trim($('#txtFullname').val()).length < 4) {
				$("#txtFullname").after('<p id="err">Họ tên lớn hơn 3 ký tự</p>');
				$('#txtFullname').next('p#err').addClass('errPass');
				$('#txtFullname').addClass('inputErr');
			}
		});
		$("#txtFullname").focus(function () {
			$('#txtFullname').next('p#err').addClass('displayErr');
			$('#txtFullname').removeClass('inputErr');
		});

		//check username
		$("#txtUsername").blur(function () {
			if ($.trim($('#txtUsername').val()).length < 4) {
				$("#txtUsername").after('<p id="err">Tên tài khoản phải lớn hơn 6 ký tự</p>');
				$('#txtUsername').next('p#err').addClass('errPass');
				$('#txtUsername').addClass('inputErr');
			}
		});
		$("#txtUsername").focus(function () {
			$('#txtUsername').next('p#err').addClass('displayErr');
			$('#txtUsername').removeClass('inputErr');
		});
	});
</script>