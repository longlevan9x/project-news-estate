<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $content; ?></h3>
                </div>
                <div class="panel-body">
                    <!-- <a href="<?php echo site_url('estate/index/create'); ?>" class="btn btn-lg btn-success pull-right">Thêm hàng</a> -->
                    <div class="form-group">
                        <label for="txtTypeEstate" class="control-label pull-left" style="line-height: 2.5;">Loại BDS</label>
                        <div class="form-group col-md-4 col-lg-4">
                            <select name="txtTypeEstate" id="txtTypeEstate" class="form-control " required="required">
                                <option value="prompt">--Chọn loại--</option>
                                <option value="1">Cần bán</option>
                                <option value="1">Cần mua</option>
                                <option value="2">Cần thuê</option>
                                <option value="2">Cần cho thuê</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width:50px;">#</th>
                                    <th style="width:210px;">Tiêu đề</th>
                                    <th style="width:260px;">Địa chỉ</th>
                                    <th style="width:100px;">Hướng</th>
                                    <th style="width:140px;">Trạng thái</th>
                                    <th style="width:110px;">Giá</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            <form action="" method="POST" accept-charset="utf-8">
                            </form>
                            <?php $i = 1; ?>
                            <?php foreach ($estate as $k => $itemEstate): ?>
                                <tr>
                                    <td class="text-center"><?php echo $i; ?></td>
                                    <td><?php echo $itemEstate['title']; ?></td>
                                    <td>
                                        <?php echo $itemEstate['name_area']; ?>,
                                        <?php echo $itemEstate['name_district']; ?>,
                                        <?php echo $itemEstate['name_city']; ?></td>
                                    <td><?php echo $itemEstate['name_direction']; ?></td>
                                    <td>
                                        <select name="txtStatus" onchange="activeNews(<?php echo $itemEstate['id_estate']; ?>);" id="txtStatus" class="form-control" required="required">
                                            <option value="0" <?php echo ($itemEstate['status'] == 0) ? 'selected="selected"' : ''; ?>>Ẩn</option>
                                            <option value="1" <?php echo ($itemEstate['status'] == 1) ? 'selected="selected"' : ''; ?>>Phê duyệt</option>
                                            <option value="2" <?php echo ($itemEstate['status'] == 2) ? 'selected="selected"' : ''; ?>>Hiện</option>
                                        </select>
                                    </td>
                                    <td><?php echo number_format($itemEstate['price']); ?></td>
                                    <td><a class='btn btn-info' href="<?php echo site_url('estate/index/view/'.$itemEstate['slug'] . '-' . $itemEstate['id_estate']); ?>" role=''>Xem</a>
                                    <a class='btn btn-danger' href='#' role=''>Xóa</a></td>
                                </tr>
                            <?php $i++; ?>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- end list data -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
<script  type="text/javascript" charset="utf-8" async defer>
function activeNews(id) {
    var status = $.trim($('#txtStatus').val());
    var Url = "<?php echo base_url('estate/actionActive'); ?>";
   $.ajax({
       url: Url,
       type: 'POST',
       data: {'status': status, 'id' : id},
       success: function (res){
            var obj = $.parseJSON(res);
            if (obj.res = 'ok') {
                window.location.reload(true);
            }
            else
            {
                alert('Thất bại');
                return false;
            }
       }
   });
}
</script>