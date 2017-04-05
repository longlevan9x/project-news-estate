<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="<?php echo site_url('home/index'); ?>">Trang chủ</a> / Chi tiết</span>
    <h2>Chi tiết</h2>
</div>
</div>
<!-- banner -->


<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 hidden-xs">

<div class="hot-properties hidden-xs">
<h4>Tin liên quan</h4>
  <?php foreach ($infoView as $key => $itemView): ?>
    <div class="row">
      <div class="col-lg-4 col-sm-5">
        <a href="<?php echo site_url('chi-tiet/'.$itemView['slug']."-".$itemView['id_estate']); ?>"><img src="<?php echo base_url().IMG_PATH_ESTATE.$itemView['image']; ?>" class="img-responsive img-circle" alt="<?php echo $itemView['image']; ?>" title="Xem chi tiết..."/></a>
        </div>
      <div class="col-lg-8 col-sm-7">
          <h5>
            <a href="<?php echo site_url('chi-tiet/'.$itemView['slug']."-".$itemView['id_estate']); ?>" title="<?php echo $itemView['title']; ?>"><?php echo substr($itemView['title'], 0, 40); ?></a>
          </h5>
          <p class="price">Giá: <?php echo number_format($itemView['price']); ?> VND</p>
          <p>Số lượt xem: <?php echo $itemView['view'];?></p>
      </div>
    </div>
  <?php endforeach ?>
</div>



<div class="advertisement">
  <img src="<?php echo base_url(); ?>public/images/advertisements.jpg" class="img-responsive" alt="advertisement">

</div>

</div>

<div class="col-lg-9 col-sm-8 ">

<h2><?php echo $title; ?></h2>
<?php $date=date_create($posting_date); ?>
<p>Bài đăng:  lúc <?php echo date_format($date, "H"); ?> giờ <?php echo date_format($date, "i"); ?> phút <?php echo date_format($date, "d-m-Y"); ?></p>
<div class="row">
  <div class="col-lg-8">
  <div class="property-images">
    <!-- Slider Starts -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <div class="carousel-inner">
        <!-- Item 1 -->
        <div class="item active">
          <img src="<?php echo base_url(); ?>uploads/imgEstate/<?php echo $image; ?>" class="properties" alt="<?php echo $image; ?>" style="min-width: 560px;max-width: 570px;"/>
        </div>

      </div>
    </div>
<!-- #Slider Ends -->

  </div>
  <div class="img-slide" style="width: 554px;">
    <?php foreach ($images as $val): ?>
      <img src="<?php echo base_url(); ?>uploads/imgEstate/<?php echo $val['name']; ?>" class="properties" alt="<?php echo $val['name']; ?>" style="margin: 5px 1px 0 3px;width: 49%;height: 200px;float: left;"/>
    <?php endforeach ?>
  </div>

  <div class="clearfix"></div>

  <div class="spacer"><h4><span class="glyphicon glyphicon-th-list"></span> Thông tin chi tiết</h4>
    <div><b>Diện tích:</b> <?php echo $acreage; ?> m<sup>2</sup></div>
    <div><b>Loại BDS:</b> <?php echo $name_category; ?></div>
    <div><b>Loại tin:</b>
          <?php if ($news_cate_id == 1): ?>
              Cần bán
          <?php elseif ($news_cate_id == 2): ?>
              Cần mua
          <?php elseif ($news_cate_id == 3): ?>
              Cần thuê
          <?php elseif ($news_cate_id == 4): ?>
              Cần cho thuê
          <?php endif ?>
    </div>
    <div><b>Thương lượng:</b>
      <?php if ($bargain == 1): ?>
        Có thương lượng
      <?php else: ?>
        Không thương lượng
      <?php endif ?>
    </div>
    <div><b>Vị trí cụ thể:</b> <?php echo $location; ?></div>
    <div><b>Ngày đăng:</b> <?php echo date_format($date, "d-m-Y"); ?>, lúc <?php echo date_format($date, "H"); ?> giờ <?php echo date_format($date, "i"); ?> phút
    <div><b>Ngày hết hạn:</b> <?php echo $expiration_time; ?>
    </div>
    </div>
    <div><big><b>Miêu tả</b></big></div>
    <div style="background-color: #EEE6E6;padding: 15px;">
      <?php echo $description; ?>
    </div>

  </div>


  </div>
  <div class="col-lg-4">
  <div class="col-lg-12  col-sm-6">
<div class="property-info">
<p class="price"><?php echo number_format($price); ?> VND</p>
<p><big><?php echo number_format($acreage); ?></big> m <sup>2</sup></p>
  <p class="area"><span class="glyphicon glyphicon-map-marker"></span> <?php echo $name_area; ?>, <?php echo $name_district; ?>, <?php echo $name_city; ?></p>
  <p>Hướng: <?php echo $name_direction; ?></p>
  <p>Số lượt xem: <?php echo $view; ?></p>

  <div class="profile">
  <h5><span class="glyphicon glyphicon-user"></span> Người đăng</h5>
  <div title="Tài khoản người đăng"><i class="fa fa-user-md"></i>&nbsp; <?php echo $username; ?></div>
  <div title="Số điện thoại"><span class="glyphicon glyphicon-phone"></span>0<?php echo number_format($phone,0, ","," "); ?></div>
  </div>
</div>

  <h5><span class="glyphicon glyphicon-home"></span> Tiện ích</h5>
  <div class="listing-detail">
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng ngủ"><?php echo $bedroom; ?></span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng khách"><?php echo $livingroom; ?></span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Nhà xe"><?php echo $garage; ?></span>
    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng bếp"><?php echo $kitchen; ?></span>
  </div>

</div>
<div class="col-lg-12 col-sm-6 ">
<div class="enquiry">
  <h4><span class="glyphicon glyphicon-envelope"></span> Thông tin liên hệ</h4>
      <div title="Họ tên"><i class="fa fa-user"></i>  &nbsp;<?php echo $full_name; ?></div>
      <div title="Số điện thoại"><span class="glyphicon glyphicon-phone"></span>&nbsp;0<?php echo number_format($phone,0, ","," "); ?></div>
      <div title="Email"><i class="fa fa-envelope"></i> <?php echo $email; ?></div>
      <div title="Facebook"><i class="fa fa-facebook-official"></i> &nbsp;<?php echo $nick_fb; ?></div>
      <div title="Skype"><i class="fa fa-skype"></i> &nbsp;<?php echo $nick_skype; ?></div>
      <div title="Địa chỉ"><span class="glyphicon glyphicon-road"></span> &nbsp;<?php echo $address; ?></div>
      <div>
      <div title="Ảnh đại diện"><span class="glyphicon glyphicon-picture"></span>&nbsp;Ảnh đại diện</div>
      <img title="Ảnh đại diện" src="<?php echo base_url().IMG_PATH_MEMBER.$avatar; ?>" alt="<?php echo $avatar; ?>" style="width: 150px;"></div>
 </div>
</div>
  </div>
</div>
</div>
</div>
</div>
</div>