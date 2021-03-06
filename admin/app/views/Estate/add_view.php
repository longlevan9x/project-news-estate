<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title"><?php echo $title; ?></h3>
        		</div>
        		<div class="panel-body">
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p><?php echo validation_errors(); ?></p>
                    </div>
                    <p class="text-center"><?php echo $failimg; ?></p>
        			<form action="<?php echo site_url('estate/index/action-create'); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="txtFile" class="control-label">Ảnh</label>
                            <input type="file" name="txtFile" id="txtFile"  value="" title=""/>
                        </div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        					<label for="txtTitle" class="control-label">Tiêu đề</label>
    						<input type="text" name="txtTitle" id="txtTitle" class="form-control" required="required">
        				</div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label for="txtCity" class="control-label">Thành phố</label>
                            <select name="txtCity" id="txtCity" class="form-control" required="required">
                                <option value="prompt">---Thành phố---</option>
                                <?php foreach ($city as $k => $itemCity): ?>
                                    <option value="<?php echo $itemCity['id']; ?>" id='idCity-<?php echo $itemCity['id']; ?>'><?php echo $itemCity['name_city']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label for="txtDist" class="control-label">Quận / Huyện</label>
                            <select name="txtDist" id="txtDist" class="form-control" required="required">
                                <option value="prompt" id="promptD">---Quận / Huyện---</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label for="txtArea" class="control-label">Khu vực</label>
                            <select name="txtArea" id="txtArea" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Khu vực---</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                            <label for="txtDirect" class="control-label">Hướng</label>
                            <select name="txtDirect" id="txtDirect" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Hướng---</option>
                                <?php foreach ($direction as $k => $itemDirect): ?>
                                    <option value="<?php echo $itemDirect['id']; ?>"><?php echo $itemDirect['name_direction']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
						    <label  for="txtAcreage">Diện tích</label>
						    <div class="input-group">
						      	<input type="text" class="form-control" id="txtAcreage" name="txtAcreage" placeholder="Diện tích">
						      	<div class="input-group-addon">m<sup>2</sup></div>
						    </div>
						</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
						    <label  for="txtPrice">Giá</label>
						    <div class="input-group">
						      	<input type="text" class="form-control" id="txtPrice" name="txtPrice" placeholder="Giá">
						      	<div class="input-group-addon">VND</div>
						    </div>
						</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
						    <label  for="txtGara">Số nhà xe</label>
                            <select name="txtGara" id="txtGara" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Số nhà xe---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
						</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
        					<label for="txtKitchen" class="control-label">Số phòng bếp</label>
                            <select name="txtKitchen" id="txtKitchen" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Số phòng bếp---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
        				</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
        					<label for="txtBedroom" class="control-label">Số phòng ngủ</label>
                            <select name="txtBedroom" id="txtBedroom" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Số phòng ngủ---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
        				</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
        					<label for="txtLiving" class="control-label">Số phòng khách</label>
                            <select name="txtLiving" id="txtLiving" class="form-control" required="required">
                                <option value="prompt" id="promptA">---Số phòng khách---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
        				</div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <label for="txtBargain" class="control-label">Thương lượng</label>
                            <select name="txtBargain" id="txtBargain" class="form-control" required="required">
                                <option value="prompt">---Chọn----</option>
                                <option value="1">Có thương lượng</option>
                                <option value="2">Không thương lượng</option>
                            </select>
                        </div>
                        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <label for="txtNewsCate" class="control-label">Loại tin</label>
                            <select name="txtNewsCate" id="txtNewsCate" class="form-control" required="required">
                                <option value="prompt">---Chọn loại tin----</option>
                                <option value="1">Cần bán</option>
                                <option value="2">Cần mua</option>
                                <option value="3">Cần thuê</option>
                                <option value="4">Cần cho thuê</option>
                            </select>
                        </div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
        					<label for="txtTypeEstate" class="control-label">Loại BĐS</label>
    						<select name="txtTypeEstate" id="txtTypeEstate" class="form-control" required="required">
    							<option value="prompt">---Chọn loại BĐS----</option>
                                <?php foreach ($newsCate as $k => $itemCate): ?>
        							<option value="<?php echo $itemCate['id_cate']; ?>"><?php echo $itemCate['name_category']; ?></option>
                                <?php endforeach ?>
    						</select>
        				</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        					<label for="txtExp" class="control-label">Hạn đăng</label>
    						<input type="date" name="txtExp" id="txtExp" class="form-control" value="<?php echo date("Y-m-d",strtotime("+10days")); ?>" title="Hạn đăng mắc định là 10 ngày" required="required">
                            <span><i>Hạn đăng mặc định là 10 ngày.</i></span>
        				</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        					<label for="txtLocation" class="control-label">Vị trí cụ thể</label>
    						<input type="text" name="txtLocation" id="txtLocation" class="form-control" required="required">
        				</div>
        				<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
        					<label for="txtDescrip" class="control-label">Thông tin cơ bản</label>
							<textarea name="txtDescrip" id="txtDescrip" class="form-control" rows="5" required="required"></textarea>
        				</div>
						<div class="clearfix">
						</div>
						<div class="form-group col-xs-12 col-sm-8 col-md-6 col-lg-4">
        					<button type="submit" class="btn btn-primary form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">Đăng tin</button>
        				</div>
        			</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    $(document).ready(function() {
        $("#txtCity").change( function(event) {
            // event.preventDefault();
            //var city = $("#txtCity")[0]; // return a html dom obj

            var idCity = $.trim($("#txtCity").val());

            $.ajax({
                url: '<?php echo site_url('estate/loadDistrict'); ?>',
                type: 'post',
                data: {'idCity' : idCity},
                success: function(res) {
                    var obj = $.parseJSON(res);
                    html = "";
                    html += '<option value="prompt" id="promptD">---Quận / Huyện---</option>';
                    $.each(obj.result,function(key, item){
                        html += '<option value="'+ item['id']+'" id="idDist-'+ item['id'] +'">'+ item['name_district'] +'</option>';
                    });
                    $('select#txtDist').html(html);
                }
            });

        });
        $("#txtDist").change( function(event) {
            // event.preventDefault();
            //var dist = $("#txtDist")[0]; //  <==>  var dist = document.getElementById("txtDist");

            var idDist = $.trim($("#txtDist").val());

            $.ajax({
                url: '<?php echo site_url('estate/loadArea'); ?>',
                type: 'post',
                data: {'idDist' : idDist},
                success: function(res) {
                    var obj = $.parseJSON(res);
                    html = "";
                    html += '<option value="prompt" id="promptA">---Khu vực---</option>';
                    $.each(obj.result,function(key, item){ // duyet mang trong jquery
                        html += '<option value="'+ item['id']+'" id="idDist-'+ item['id'] +'">'+ item['name_area'] +'</option>';
                    });
                    $('select#txtArea').html(html);
                }
            });

        });
    });
</script>