<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
<div class="properties-listing spacer">

<div class="row">
<div class="col-lg-3 col-sm-4 ">
  <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span> Tim kiếm thông tin</h4>
    <div class="list-group row">
      <ul class="nav nav-pills nav-stacked drop-menu" style="font-size: 20px;">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle list-group-item" data-toggle="dropdown">Tìm theo thể loại<b class="caret"></b></a>
              <ul class="dropdown-menu" style="width: 100%;background-color: #F4F4F4;">
                <?php foreach ($menu_right as $item): ?>
                  <li style="font-size: 15px;padding: 2px;border-bottom: 1px dotted #8383F8;"><a style="padding-top: 5px;padding-bottom: 5px;" href="<?php echo site_url('the-loai/'.strtolower(vn2latin($item['name_category'].'-'.$item['id_cate']))); ?>"><?php echo $item['name_category']; ?></a></li>
                <?php endforeach; ?>
              </ul>
            </li>
      </ul>
    </div>
    <style type="text/css" media="screen">
      ul.drop-menu li a:hover{
        background-color: #52E077;
      }
    </style>
    <!-- End menu left -->

    <div class="row">
        <form action="<?php echo site_url('danh-sach-bds'); ?>" method="post" accept-charset="utf-8">
            <input type="text" class="form-control" name="txtKey" id="txtKey" placeholder="Nhập: Địa điểm, Tên dự án">
            <select name="txtTypeEstate" class="form-control">
                <option value="0">Tất cả</option>
                <option value="1">Mua</option>
                <option value="2">Bán</option>
                <option value="3">Thuê</option>
                <option value="4">Cho Thuê</option>
            </select>
          <div class="row">
              <div class="col-lg-6 col-sm-12">
                  <input type="text" name="txtPrice1" id="txtPrice1" class="form-control" value="" placeholder="Giá tiền từ" title="">
              </div>
              <div class="col-lg-6 col-sm-12">
                  <input type="text" name="txtPrice2" id="txtPrice2" class="form-control" value="" placeholder="Đến" title="">
              </div>
              <div class="col-lg-6 col-sm-12">
                  <input type="text" name="txtAcreage1" id="txtAcreage1" class="form-control" value="" placeholder="Diện tích từ" title="">
              </div>
              <div class="col-lg-6 col-sm-12">
                  <input type="text" name="txtAcreage2" id="txtAcreage2" class="form-control" value="" placeholder="Đến" title="">
              </div>
              <div class="col-lg-12 col-sm-12">
                  <button class="btn btn-success" type="submit" name="btnSearch" id="btnSearch">Tìm kiếm</button>
              </div>
          </div>
      </form>
    </div>
  </div>
<!-- end search form Left -->

<div class="hot-properties hidden-xs">
<h4>Xem nhiều nhất..</h4>
  <?php foreach ($estate_view as $k => $item): ?>
    <div class="row">
      <div class="col-lg-4 col-sm-5">
        <a href="<?php echo site_url('chi-tiet/'.$item['slug'].'-'.$item['id_estate']); ?>"><img src="<?php echo base_url(IMG_PATH_ESTATE.$item['image']); ?>" class="img-responsive img-circle" alt="<?php echo $item['image']; ?>" title="Xem chi tiết...">
        </a>
      </div>
      <div class="col-lg-8 col-sm-7">
        <h5><a href="<?php echo site_url('chi-tiet/'.$item['slug'].'-'.$item['id_estate']); ?>" title="Xem chi tiết..."><?php echo substr($item['title'], 0, 55); ?></a></h5>
        <p class="price">Giá: <?php echo number_format($item['price']); ?> VND</p>
        <p class="price">Số lươt xem:<?php echo number_format($item['view']); ?></p>
      </div>
    </div>
  <?php endforeach ?>
</div>


</div>