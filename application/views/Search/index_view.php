<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="col-lg-9 col-sm-8">
<div class="sortby clearfix">
<div class="pull-left result">HIển thị: <?php echo count($estate); ?> trên <?php echo count($allInfo); ?> </div>
  <div class="pull-right">
    <select class="form-control" id="txtSort">
      <option value="prompt">Sắp xếp</option>
      <option value="1" <?php echo ($sort == 1) ? 'selected="selected"' : ''; ?>>Giá: Thấp đến cao</option>
      <option value="0" <?php echo ($sort == 0) ? 'selected="selected"' : ''; ?>>Giá: Cao đến thấp</option>
    </select>
  </div>

</div>
<div class="row">
     <!-- properties -->
     <?php foreach ($estate as $k => $item): ?>
      <div class="col-lg-4 col-sm-6">
        <div class="properties" style="height: 620px;">
          <div class="image-holder">
            <a href="<?php echo site_url('chi-tiet/'.$item['slug']."-".$item['id_estate']); ?>">
              <img src="<?php echo base_url(); ?>uploads/imgEstate/<?php echo $item['image']; ?>" class="img-responsive" alt="properties" style="height: 270px;" title="Xem chi tiết..."/>
            </a>
            <?php if ($item['news_cate_id'] == 1): ?>
            <div class="status sold">
                    Cần bán
            </div>
                <?php elseif($item['news_cate_id'] == 2): ?>
            <div class="status new">
                    Cần mua
            </div>
                <?php endif ?>
            <div class="status rent">
                <?php if ($item['news_cate_id'] == 3): ?>
                    Cần thuê
                <?php elseif($item['news_cate_id'] == 4): ?>
                    Cần cho thuê
                <?php endif ?>
            </div>
            <div class="news new">
                Mới
            </div>
          </div>
          <p class="price">Giá: <?php echo number_format($item['price']); ?> VND</p>
          <h6><span><?php echo $item['name_category']; ?></span></h6><hr style="margin: 5px 0;">
          <h6><span><?php echo $item['name_district']; ?>, <?php echo $item['name_city']; ?></span></h6><hr style="margin: 5px 0;">
          <h6><span><?php echo $item['name_category']; ?></span></h6><hr style="margin: 5px 0;">
          <div class="listing-detail">
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng ngủ"><?php echo $item['bedroom']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="phòng khách"><?php echo $item['livingroom']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Nhà xe"><?php echo $item['garage']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Phòng bếp"><?php echo $item['kitchen']; ?></span>
            <span data-toggle="tooltip" data-placement="bottom" data-original-title="Số lượt xem"><?php echo $item['view']; ?></span>
          </div>
          <a class="btn btn-primary" href="<?php echo site_url('chi-tiet/'.$item['slug']."-".$item['id_estate']); ?>">Xem chi tiết</a>
          <h4>
              <a href="<?php echo site_url('chi-tiet/'.$item['slug']."-".$item['id_estate']); ?>" title="Xem chi tiết - <?php echo $item['title']; ?>"><?php echo substr($item['title'], 0, 70); ?></a>
          </h4>
        </div>
      </div>
     <?php endforeach ?>
     <div class="clearfix"></div>
      <!-- properties -->
      <div class="center">
       <?php echo $page; ?>
      </div>

</div>
</div>
</div>
</div>
</div>


<script type="text/javascript" charset="utf-8" async defer>
  $(document).ready(function() {
    $('#txtSort').change(function(event) {
      var sort_by = $.trim($('#txtSort').val());
      if (sort_by == 1 || sort_by == 0)
      {
        window.location.href = '<?php echo base_url('danh-sach-bds/'); ?>' + sort_by+'.html';
      }
    });
  });
</script>