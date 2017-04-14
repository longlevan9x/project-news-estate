<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <!-- list data -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	            <div class="panel panel-success">
	                <div class="panel-heading">
	                    <h3 class="panel-title text-center" style="font-size: 30px;"><?php echo $content; ?></h3>
	                </div>
	                <div class="panel-body">
	                	<div class="row">
		                	<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3  pull-right">
			                    <a href="<?php echo site_url('dang-tin'); ?>" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-up"></span>&nbsp;&nbsp;Đăng tin</a>
		                	</div>
	                	</div>
	                    <!-- <div class="form-group">
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
	                    </div> -->
	                    <div class="clearfix"></div>
	                    <style type="text/css" media="screen">
	                    	th{
	                    		text-align: center;
	                    	}
	                    </style>
	                    <?php if (isset($estate) && !empty($estate)): ?>
		                    <div class="table-responsive">
		                        <table class="table table-striped table-hover">
		                            <thead>
		                                <tr>
		                                    <th style="width:50px;">#</th>
		                                    <th style="width:230px;">Tiêu đề</th>
		                                    <th style="width:100px;">Hình ảnh</th>
		                                    <th style="width:250px;">Địa chỉ</th>
		                                    <th style="width:80px;">Hướng</th>
		                                    <th style="width:100px;">Trạng thái</th>
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
		                                    <td><img style="width: 100px;" src="<?php echo IMG_PATH_ESTATE.$itemEstate['image']; ?>" alt="<?php echo $itemEstate['image']; ?>"/></td>
		                                    <td>
		                                        <?php echo $itemEstate['name_area']; ?>,
		                                        <?php echo $itemEstate['name_district']; ?>,
		                                        <?php echo $itemEstate['name_city']; ?></td>
		                                    <td class="text-center"><?php echo $itemEstate['name_direction']; ?></td>
		                                    <td>
		                                    <?php if ($itemEstate['status'] == 0): ?>
		                                    	<h5 style="font-size:13px;" class="label label-danger">Ẩn</h5>
		                                	<?php elseif($itemEstate['status'] == 1): ?>
												<h5 style="font-size:13px;" class="label label-warning">Chờ phê duyệt</h5>
		                                	<?php elseif($itemEstate['status'] == 2): ?>
		                                		<h5 style="font-size:13px;" class="label label-success">Hiện</h5>
		                                    <?php endif ?>
		                                    </td>
		                                    <td><?php echo number_format($itemEstate['price']); ?></td>
		                                    <td>
		                                    	<a title="Xem"  class='btn btn-warning' href="<?php echo site_url('chi-tiet-tin/'.$itemEstate['slug'] . '-' . $itemEstate['id_estate']); ?>" role=''><span class="glyphicon glyphicon-eye-open"></span></a>
		                                    	<a title="Sửa" style="background-color:#A647EE;border-color: #A647EE;" class='btn btn-warning' href="<?php echo site_url('sua-tin/'.$itemEstate['slug'] . '-' . $itemEstate['id_estate']); ?>" role=''><span class="glyphicon glyphicon-edit"></span></a>
		                                    	<a title="Xóa" class='btn btn-danger' onclick="deleteNews('<?php echo $itemEstate['slug']."-".$itemEstate['id_estate']; ?>');"><span class="glyphicon glyphicon-remove"></span></a>
		                                   	</td>
		                                </tr>
		                            <?php $i++; ?>
		                            <?php endforeach ?>
		                            </tbody>
		                        </table>
		                    </div>
                    	<?php else: ?>
	                    	<p>Bạn không đăng tin nào.</p>
	                    <?php endif ?>
	                </div>
	            </div>
        </div>
        <!-- end list data -->
    </div>
    <!-- /.container-fluid -->
	</div>
</div>
<!-- /#page-wrapper -->
