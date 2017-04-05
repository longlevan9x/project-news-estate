<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="properties-listing spacer">
        <a href="<?php echo site_url('danh-sach-bds');?>" class="pull-right viewall">Xem tất cả...</a>
        <h2>Nhà đất nổi bật</h2>
        <div id="owl-example" class="owl-carousel">
            <?php foreach ($estate as $k => $itemEstate): ?>
            <div class="properties" style="height: 620px;">
                <div class="image-holder">
                    <a href="<?php echo site_url('chi-tiet/'.$itemEstate['slug']."-".$itemEstate['id_estate']); ?>">
                        <img src="<?php echo base_url(); ?>uploads/imgEstate/<?php echo $itemEstate['image']; ?>" class="img-responsive" alt="properties" style="height: 270px;" title="Xem chi tiết..."/>
                    </a>
                        <?php if ($itemEstate['news_cate_id'] == 1): ?>
                    <div class="status sold">
                            Cần bán
                    </div>
                        <?php elseif($itemEstate['news_cate_id'] == 2): ?>
                    <div class="status new">
                            Cần mua
                    </div>
                        <?php endif ?>
                    <div class="status rent">
                        <?php if ($itemEstate['news_cate_id'] == 3): ?>
                            Cần thuê
                        <?php elseif($itemEstate['news_cate_id'] == 4): ?>
                            Cần cho thuê
                        <?php endif ?>
                    </div>
                    <div class="news new">
                        Mới
                    </div>
                </div>
                <p class="price">Giá: <?php echo number_format($itemEstate['price']); ?> VND - <?php echo number_format($itemEstate['acreage']); ?>m2</p>
                <h6><span><?php echo $itemEstate['name_category']; ?></span></h6><hr style="margin: 5px 0;">
                <h6><span><?php echo $itemEstate['name_district']; ?>, <?php echo $itemEstate['name_city']; ?></span></h6><hr style="margin: 5px 0;">
                <h6><span><?php echo $itemEstate['name_category']; ?></span></h6><hr style="margin: 5px 0;">
                <div class="listing-detail">
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng ngủ"><?php echo $itemEstate['bedroom']; ?></span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="phòng khách"><?php echo $itemEstate['livingroom']; ?></span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Nhà xe"><?php echo $itemEstate['garage']; ?></span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng bếp"><?php echo $itemEstate['kitchen']; ?></span>
                    <span data-toggle="tooltip" data-placement="bottom" data-original-title="Số lượt xem"><?php echo $itemEstate['view']; ?></span>
                </div>
                <a class="btn btn-primary" href="<?php echo site_url('chi-tiet/'.$itemEstate['slug']."-".$itemEstate['id_estate']); ?>">Xem chi tiết</a>
                <h4>
                    <a href="<?php echo site_url('chi-tiet/'.$itemEstate['slug']."-".$itemEstate['id_estate']); ?>" title="Xem chi tiết - <?php echo $itemEstate['title']; ?>"><?php echo substr($itemEstate['title'], 0, 70); ?></a>
                </h4>
            </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="spacer">
    <div class="row">
        <div class="col-lg-6 col-sm-9 recent-view">
            <h3>Thông tin về chúng tôi</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            <br>
                <a href="about.php">Chi tiết...</a>
            </p>
        </div>
      <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
        <a href="<?php echo site_url('danh-sach-bds');?>"><h6 class="pull-right">Xem tất cả..</h6></a>
        <h3>Xem nhiều nhất..</h3>

        <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
                <?php $i1 = 0; ?>
                <?php foreach ($estate_view as $k => $val): ?>
                    <li data-target="#myCarousel" data-slide-to="<?php echo $i1; ?>" class="<?php echo ($i1 == 0) ? 'active' : '' ?>"></li>
                    <?php $i1++; ?>
                <?php endforeach ?>
            </ol>
          <!-- Carousel items -->
            <div class="carousel-inner">
            <?php $i2=0; ?>
            <?php foreach ($estate_view as $k => $val): ?>
                <div class="item <?php echo ($i2 == 0) ? 'active' : '' ?>">
                    <div class="row">
                        <div class="col-lg-4">
                            <a href="<?php echo site_url('chi-tiet/'.$val['slug']."-".$val['id_estate']); ?>"><img src="<?php echo base_url(IMG_PATH_ESTATE).$val['image']; ?>" class="img-responsive" alt="<?php echo $val['image']; ?>" title="<?php echo $val['image']; ?> - Xem chi chi tiết..."/></a>
                        </div>
                        <div class="col-lg-8">
                            <a href="<?php echo site_url('chi-tiet/'.$val['slug']."-".$val['id_estate']); ?>" title="<?php echo $val['title']; ?> - Xem chi tiết..."><h5><?php echo substr($val['title'], 0, 25); ?></h5></a>
                            <p class="price"><?php echo number_format($val['price']); ?> VND</p>
                            <p class="">Số lượt xem: <?php echo number_format($val['view']); ?></p>
                            <a href="<?php echo site_url('chi-tiet/'.$val['slug']."-".$val['id_estate']); ?>" class="more">Chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php $i2++; ?>
            <?php endforeach ?>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>