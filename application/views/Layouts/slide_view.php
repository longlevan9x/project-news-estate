<?php  defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="">
    <div id="slider" class="sl-slider-wrapper">
        <div class="sl-slider">
            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-1"></div>
                    <h2><a href="#">2 phòng ngủ và 1 phòng ăn</a></h2>
                    <blockquote>
                        <p class="location"><span class="glyphicon glyphicon-map-marker"></span> Cao Viên, Thanh Oai, Hà Nội</p>
                        <p>Cho đến khi ông mở rộng vòng tròn từ bi của mình cho tất cả các sinh vật, con người sẽ không tìm thấy sự bình an.</p>
                        <cite>2,000,000,000 VND</cite>
                  </blockquote>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-2"></div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-3"></div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-4"></div>
                </div>
            </div>

            <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
                <div class="sl-slide-inner">
                    <div class="bg-img bg-img-5"></div>
                </div>
            </div>
        </div><!-- /sl-slider -->

        <nav id="nav-dots" class="nav-dots">
            <span class="nav-dot-current"></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </nav>

    </div><!-- /slider-wrapper -->
</div>
<div class="banner-search">
    <div class="container"> 
        <!-- banner -->
        <div class="searchbar">
            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <h3 class="text-center">Mua, Bán & Thuê</h3>
                    <form action="<?php echo site_url('danh-sach-bds'); ?>" method="post" accept-charset="utf-8">
                        <div class="col-lg-9 col-sm-4">
                            <input type="text" class="form-control" name="txtKey" id="txtKey" placeholder="Nhập: Địa điểm, Tên dự án">
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <select name="txtTypeEstate" class="form-control">
                                <option value="0">Tất cả</option>
                                <option value="1">Mua</option>
                                <option value="2">Bán</option>
                                <option value="3">Thuê</option>
                                <option value="4">Cho Thuê</option>
                            </select>
                        </div>

                        <div class="col-lg-3 col-sm-4">
                            <input type="text" name="txtPrice1" id="txtPrice1" class="form-control" value="" placeholder="Giá tiền từ" title="">
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <input type="text" name="txtPrice2" id="txtPrice2" class="form-control" value="" placeholder="Đến" title="">
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <input type="text" name="txtAcreage1" id="txtAcreage1" class="form-control" value="" placeholder="Diện tích từ" title="">
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <input type="text" name="txtAcreage2" id="txtAcreage2" class="form-control" value="" placeholder="Đến" title="">
                        </div>

                        <div class="col-lg-6 col-sm-4">
                            <button class="btn btn-success" name="btnSearch" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                </div>
                <?php if (empty($sessionUsername) || empty($sessionEmail)): ?>
                    <div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
                        <p>Tham gia ngay bây giờ và nhận được cập nhật với tất cả các giao dịch bất động sản.</p>
                        <button class="btn btn-info"   data-toggle="modal" data-target="#loginpop">Đăng nhập</button>
                        <button class="btn btn-info"   data-toggle="modal" data-target="" onclick="window.location.href='<?php echo site_url('dang-ky'); ?>'">Đăng ký</button>
                    </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>
<!-- banner -->