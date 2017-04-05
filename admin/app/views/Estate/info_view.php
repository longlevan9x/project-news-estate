<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-info">
        		<div class="panel-heading">
        			<h3 class="panel-title">Thông tin - <?php echo $title; ?></h3>
        		</div>
        		<div class="panel-body">
        			<div class="form-group">
	        			<a class="btn btn-danger pull-right" href="#" role="button">Xóa</a>
	        			<a class="btn btn-warning pull-right" href="#" role="button" style="margin-right:15px ;">Chỉnh sửa</a>
        			</div>
        			<br><br>
        			<style type="text/css" media="screen">
        				th{
							width: 170px;
							text-indent: 15px;
        				}
        			</style>
		        	<table class="table table-striped table-hover">
		        		<tbody>
		        			<tr>
		        				<th>ID</th>
		        				<td><?php echo $id; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Title</th>
		        				<td><?php echo $title; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Địa chỉ</th>
		        				<td><?php echo $name_area; ?>, <?php echo $name_district; ?>, <?php echo $name_city; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Vị trí cụ thể</th>
		        				<td><?php echo $location; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Hướng</th>
		        				<td><?php echo $name_direction; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Loại BĐS</th>
		        				<td><?php echo $name_category; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Loại tin</th>
		        				<td>
		        					<?php if ($news_cate_id == 1): ?>
		        						Cần bán
		        					<?php elseif($news_cate_id == 2): ?>
		        						Cần mua
		        					<?php elseif($news_cate_id == 3): ?>
		        						Cần thuê
		        					<?php elseif($news_cate_id == 4): ?>
		        						Cần cho thuê
		        					<?php endif ?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<th>Diện tích</th>
		        				<td><?php echo $acreage; ?> m<sup>2</sup></td>
		        			</tr>
		        			<tr>
		        				<th>Giá</th>
		        				<td><?php echo number_format($price); ?> VND</td>
		        			</tr>
		        			<tr>
		        				<th>Số nhà xe</th>
		        				<td><?php echo $garage; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng bếp</th>
		        				<td><?php echo $kitchen; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng ngủ</th>
		        				<td><?php echo $bedroom; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng khách</th>
		        				<td><?php echo $livingroom; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Thương lượng</th>
		        				<td>
		        					<?php if ($bargain == 1): ?>
		        						Có thương lượng
		        					<?php else: ?>
		        						Không thương lượng
		        					<?php endif ?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<th>Số lượt xem</th>
		        				<td><?php echo $view; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Thông tin cơ bản</th>
		        				<td><?php echo $description; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Ngày đăng</th>
		        				<td><?php echo $posting_date; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Ngày hết hạn tin</th>
		        				<td><?php echo $expiration_time; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Ngày sửa tin</th>
		        				<td><?php echo $modify_date; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Hình ảnh</th>
		        				<td><img src="<?php echo "../../".PATH_IMG_ESTATE.$image; ?>" alt="<?php echo $image; ?>" width="200"></td>
		        			</tr>
		        		</tbody>
		        	</table>
        		</div>
        	</div>
        </div>
    </div>
</div>