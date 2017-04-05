<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
<div class="spacer">
<div class="row register">
  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
		<?php echo validation_errors(); ?>
		<!-- <h3 class="text-center"><?php /*echo $ok;echo $fail;*/ ?></h3> -->
		<legend class="text-center">Đăng nhập</legend>
		<div class="form-group">
			<label for="txtUsernameLg">Tên tài khoản</label>
			<input type="text" class="form-control" name="txtUsernameLg" id="txtUsernameLg" placeholder="Tên tài khoản">
		</div>
		<div class="form-group">
			<label for="txtPasswordLg">Mật khẩu</label>
			<input type="password" class="form-control" name="txtPasswordLg" id="txtPasswordLg" placeholder="Mật khẩu">
		</div>
		<button type="button" id="btnSubmitLogin" class="btn btn-primary">Đăng nhập</button>
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
		$("#btnSubmitLogin").click(function () {
            var username = $.trim($('#txtUsernameLg').val());
            var password = $.trim($('#txtPasswordLg').val());
            $.ajax({
                url: '<?php echo site_url("login/getInfo"); ?>',
                type: 'POST',
                data: { 'password': password, 'username': username},
                success: function (res) {
                    if (res == "empty") {
                        $("#txtPasswordLg").after('<p id="err-pass">Tài khoản hoặc mật khẩu không được để rỗng.</p>');
                    }
                    else if(res == "fail") {
                        $("#txtPasswordLg").after('<p id="err-pass">Tài khoản hoặc mật khẩu không tồn tại.</p>');
                    }
                    else
                    {
                        window.location.href = '<?php echo site_url('trang-chu'); ?>'
                    }
                }
            });
        });
		// Chech Password
		$("#txtPasswordLg").blur(function () {
			if ($.trim($('#txtPasswordLg').val()).length < 7) {
				$("#txtPasswordLg").after('<p id="err">Mật khẩu phải lớn hơn 6 ký tự</p>');
				$('#txtPasswordLg').next('p#err').addClass('errPass');
				$('#txtPasswordLg').addClass('inputErr');
			}
		});
		$("#txtPasswordLg").focus(function () {
			$('#txtPasswordLg').next('p#err').addClass('displayErr');
			$('#txtPasswordLg').removeClass('inputErr');
		});


		//check username
		$("#txtUsernameLg").blur(function () {
			if ($.trim($('#txtUsernameLg').val()).length < 4) {
				$("#txtUsernameLg").after('<p id="err">Tên tài khoản phải lớn hơn 6 ký tự</p>');
				$('#txtUsernameLg').next('p#err').addClass('errPass');
				$('#txtUsernameLg').addClass('inputErr');
			}
		});
		$("#txtUsernameLg").focus(function () {
			$('#txtUsernameLg').next('p#err').addClass('displayErr');
			$('#txtUsernameLg').removeClass('inputErr');
		});
	});
</script>