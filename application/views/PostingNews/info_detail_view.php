<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <!-- list data -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-info">
        		<div class="panel-heading">
        			<h3 class="panel-title"><a title="Danh sách tin" href="<?php echo site_url('danh-sach-tin'); ?>" style="font-size: 26px;">Thông tin</a> - <?php echo $title; ?></h3>
        		</div>
        		<div class="panel-body">
	        			<h2 class="text-center"><p class="label label-success"><?php echo $success; ?></p></h2>
        			<div class="form-group">
	        			<a class="btn btn-danger pull-right" onclick="deleteNews('<?php echo $info['slug']."-".$info['id_estate']; ?>');" role="button">Xóa</a>
	        			<a class="btn btn-warning pull-right" href="<?php echo site_url('sua-tin/'.$info['slug']."-".$info['id_estate']); ?>" role="button" style="margin-right:15px ;">Chỉnh sửa</a>
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
		        			<!-- <tr>
		        				<th>ID</th>
		        				<td><?php /*echo $id_estate;*/ ?></td>
		        			</tr> -->
		        			<tr>
		        				<th>Title</th>
		        				<td><?php echo $info['title']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Địa chỉ</th>
		        				<td><?php echo $info['name_area']; ?>, <?php echo $info['name_district']; ?>, <?php echo $info['name_city']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Vị trí cụ thể</th>
		        				<td><?php echo $info['location']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Hướng</th>
		        				<td><?php echo $info['name_direction']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Loại BĐS</th>
		        				<td><?php echo $info['name_category']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Loại tin</th>
		        				<td>
		        					<?php if ($info['news_cate_id'] == 1): ?>
		        						Cần bán
		        					<?php elseif($info['news_cate_id'] == 2): ?>
		        						Cần mua
		        					<?php elseif($info['news_cate_id'] == 3): ?>
		        						Cần thuê
		        					<?php elseif($info['news_cate_id'] == 4): ?>
		        						Cần cho thuê
		        					<?php endif ?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<th>Diện tích</th>
		        				<td><?php echo $info['acreage']; ?> m<sup>2</sup></td>
		        			</tr>
		        			<tr>
		        				<th>Giá</th>
		        				<td><?php echo number_format($info['price']); ?> VND</td>
		        			</tr>
		        			<tr>
		        				<th>Số nhà xe</th>
		        				<td><?php echo $info['garage']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng bếp</th>
		        				<td><?php echo $info['kitchen']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng ngủ</th>
		        				<td><?php echo $info['bedroom']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Số phòng khách</th>
		        				<td><?php echo $info['livingroom']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Thương lượng</th>
		        				<td>
		        					<?php if ($info['bargain'] == 1): ?>
		        						Có thương lượng
		        					<?php else: ?>
		        						Không thương lượng
		        					<?php endif ?>
		        				</td>
		        			</tr>
		        			<tr>
		        				<th>Số lượt xem</th>
		        				<td><?php echo $info['view']; ?></td>
		        			<tr>
		        				<th>Ngày đăng</th>
		        				<td><?php echo $info['posting_date']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Ngày hết hạn tin</th>
		        				<td><?php echo $info['expiration_time']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Ngày sửa tin</th>
		        				<td><?php echo $info['modify_date']; ?></td>
		        			</tr>
		        			<tr>
		        				<th>Hình ảnh</th>
		        				<td><img src="<?php echo base_url(IMG_PATH_ESTATE.$info['image']); ?>" alt="<?php echo $info['image']; ?>" width="200"></td>
		        			</tr>
		        			</tr>
		        			<tr>
		        				<th>Thông tin cơ bản</th>
		        				<td><?php echo $info['description']; ?></td>
		        			</tr>
		        		</tbody>
		        	</table>
        		</div>
        	</div>
        </div>
    </div>
</div>
</div>