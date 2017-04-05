<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Thông tin</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo site_url('gioi-thieu'); ?>">Thông tin về chúng tôi</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.php">Thành viên</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo site_url('bog'); ?>">Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="<?php echo site_url('lien-he'); ?>">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-sm-3">
                <h4>Nhần thông tin</h4>
                <p>Nhận thông báo về các thông tin mới nhất trên thị trường của chúng tôi.</p>
                <form class="form-inline" role="form">
                    <input type="text" placeholder="Nhập địa chỉ Emai của bạn..." class="form-control">
                    <button class="btn btn-success" type="button">OK! Send.</button>
                </form>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Theo dõi</h4>
                <a href="https://www.facebook.com/"><img src="<?php echo base_url(); ?>public/images/facebook.png" alt="facebook"  title="Facebook"></a>
                <a href="#"><img src="<?php echo base_url(); ?>public/images/twitter.png" alt="twitter" title="Twitter"></a>
                <a href="#"><img src="<?php echo base_url(); ?>public/images/linkedin.png" alt="linkedin" title="Linkedin"></a>
                <a href="#"><img src="<?php echo base_url(); ?>public/images/instagram.png" alt="instagram" title="Instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Liên hệ</h4>
                <p><b>BDS24h Inc.</b><br>
                <span class="glyphicon glyphicon-map-marker"></span> 1020 Cao Viên, Thanh Oai, Hà Nội <br>
                <span class="glyphicon glyphicon-envelope"></span> vanlong9x@gmail.com<br>
                <span class="glyphicon glyphicon-earphone"></span> 0969696969</p>
            </div>
        </div>
        <p class="copyright">Copyright 2017. All rights reserved.	</p>

    </div>
</div>




<!-- Modal -->
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Đăng nhập</h4>
                    <form class="" role="form">
                        <div class="form-group">
                            <label class="sr-only" for="txtUsername">Tên tài khoản</label>
                            <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Tên tài khoản..."">
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="txtPassword">Mật khẩu</label>
                            <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Mật khẩu...">
                        </div>
                        <div class="checkbox">
                            <label>  <input type="checkbox"> Nhớ mật khẩu  </label>
                        </div>
                        <button type="button" id="btnSubmit" class="btn btn-success">Đăng nhập</button>
                    </form>
                </div>
                <!-- end form -->
                <div class="col-sm-6">
                    <h4>Bạn chưa có tài khoản</h4>
                    <p>Tham gia ngay hôm nay và nhận được cập nhật tất cả các thỏa thuận tài sản, thông tin ưu đãi.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='<?php echo site_url('dang-ky'); ?>'">Đăng ký ngay</button>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<style type="text/css" media="screen">

    .err-login{
        position: absolute;
        top: 5px;
        right: -5px;
        color: red;
        padding: 3px;
        border-radius: 4px;
        box-shadow: 0 0 4px 1px hsla(12, 0.5%, 0.5%, 0.1);
    }
    .err-pass{
        position: absolute;
        top: 109px;
        right: -190px;
        color: red;
        border-radius: 4px;
        box-shadow: 0 0 4px 1px hsla(12, 0.5%, 0.5%, 0.1);
    }
    .input-err{
        border-color: red;
    }
    .hide-err{
        display: none;
    }
</style>
<script  type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $("#btnSubmit").click(function () {
            var username = $.trim($('#txtUsername').val());
            var password = $.trim($('#txtPassword').val());
            $.ajax({
                url: '<?php echo site_url("login/getInfo"); ?>',
                type: 'POST',
                data: { 'password': password, 'username': username},
                success: function (res) {
                    if (res == 'empty' || res == "fail") {
                        if (res == "empty") {
                            $("#txtPassword").after('<p id="err-pass">Tài khoản hoặc mật khẩu không được để rỗng.</p>');
                        }
                        else if(res == "fail") {
                            $("#txtPassword").after('<p id="err-pass">Tài khoản hoặc mật khẩu không tồn tại.</p>');
                        }
                    }
                    else
                    {
                        window.location.reload(true);
                    }
                }
            });
        });

        //check username
        $("#txtUsername").blur(function () {
            var username = $.trim($('#txtUsername').val());
            $.ajax({
                url: '<?php echo site_url("login/getUsername"); ?>',
                type: 'POST',
                data: { 'username': username},
                success: function (res) {
                    if (res == 'empty' || res == "fail") {
                        if (res == "empty") {
                            $("#txtUsername").after('<p id="err-login">Tài khoản không được để rỗng.</p>');
                        }
                        else if(res == "fail") {
                            $("#txtUsername").after('<p id="err-login">Tài khoản không tồn tại.</p>');
                        }
                        $("#btnSubmit").attr('disabled', 'disabled');
                        $("#txtUsername").next("p#err-login").addClass('err-login');
                        $('#txtUsername').addClass('input-err');
                    }
                }
            });
        });

        $("#txtUsername").focus(function() {
            $("#txtUsername").removeClass('input-err');
            $("#txtUsername").next('p#err-login').removeClass('err-login');
            $("#txtUsername").next('p#err-login').addClass('hide-err');
        });
        //check pass
        $("#txtPassword").blur(function () {
            var username = $.trim($('#txtUsername').val());
            var password = $.trim($('#txtPassword').val());
            $.ajax({
                url: '<?php echo site_url("login/getPassword"); ?>',
                type: 'POST',
                data: { 'password': password, 'username': username},
                success: function (res) {
                    if (res == 'empty' || res == "fail") {
                        if (res == "empty") {
                            $("#txtPassword").after('<p id="err-pass">Mật khẩu không được để rỗng.</p>');
                        }
                        else if(res == "fail") {
                            $("#txtPassword").after('<p id="err-pass">Mật khẩu không tồn tại.</p>');
                        }
                        $("#btnSubmit").attr('disabled', 'disabled');
                        $("#txtPassword").next("p#err-pass").addClass('err-pass');
                        $('#txtPassword').addClass('input-err');
                    }
                    else if(res == 'ok')
                    {
                        $("#btnSubmit").removeAttr('disabled');
                    }
                }
            });
        });

        $("#txtPassword").focus(function() {
            $("#txtPassword").removeClass('input-err');
            $("#txtPassword").next('p#err-pass').removeClass('err-pass');
            $("#txtPassword").next('p#err-pass').addClass('hide-err');
        });
    });
</script>
<script  type="text/javascript" charset="utf-8" async defer>
function deleteNews(id) {
    if (confirm("Bạn chắc chắn xóa?")) {
        window.location.href = "<?php echo base_url('postingnews/deleteNews/'); ?>" + id;
    }
}
</script>
</body>
</html>



