<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<script type="text/javascript" charset="utf-8" async defer>
    $(function() {
        var editor =  CKEDITOR.replace('txtDescrip',
        {
            filebrowserBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html"; ?>',
            filebrowserImageBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Images";?>',
            filebrowserFlashBrowseUrl : '<?php echo base_url()."public/ckfinder/ckfinder.html?Type=Flash" ?>',
            filebrowserUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files"?>',
            filebrowserImageUploadUrl : '<?php echo base_url()."public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images";?>',
            filebrowserFlashUploadUrl : '<?php echo base_url()."ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash";?>',
            filebrowserWindowWidth : '800',
            filebrowserWindowHeight : '480'
        });
        CKFinder.setupCKEditor( editor, "<?php echo base_url().'public/ckfinder/'?>" );
    });
</script>
<div class="container">
    <div class="properties-listing spacer">
        <div class="row">
            <!-- list data -->
            <div class="col-xs-12 col-sm-12 col-md-offset-1 col-md-10 col-lg-10">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center" style="font-size: 30px;"><?php echo $title; ?></h3>
                    </div>
                    <div class="panel-body">
                        <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <p><?php echo validation_errors(); ?></p>
                        </div>
                        <p class="text-center"><?php echo $fail;$fail1; ?></p>
                        <?php if (!empty($failgallery)): ?>
                            <div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-6">
                                <p class="text-center btn btn-success" style="font-size:15px;"><?php echo $success;echo $failgallery; ?></p>
                            </div>
                        <?php endif ?>
                        <form action="<?php echo site_url('sua-tin/'.$info['slug'] .'-'.$info['id_estate']); ?>" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtFile" class="control-label">Ảnh bìa</label>
                                <input type="file" name="txtFile" id="txtFile"  value="" title=""/>
                                <img style="width: 200px;" src="<?php echo base_url(IMG_PATH_ESTATE.$info['image']); ?>" alt="">
                                <input type="hidden" name="txtHddFile" id="txtHddFile" value="<?php echo $info['image']; ?>">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtFile1" class="control-label">Ảnh 1</label>
                                <input type="file" name="txtFile1[<?php echo $gallery[0]['id']; ?>]" id="txtFile1[]"  value="" title=""/>
                                <img style="width: 200px;" src="<?php echo base_url(IMG_PATH_ESTATE.$gallery[0]['name']); ?>" alt="<?php echo $gallery[0]['name']; ?>">
                                <input type="hidden" name="txtHddFile1" id="txtHddFile1" value="<?php echo $gallery[0]['name']; ?>">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtFile1" class="control-label">Ảnh 2</label>
                                <input type="file" name="txtFile1[<?php echo $gallery[1]['id']; ?>]" id="txtFile1[]"  value="" title=""/>
                                <img style="width: 200px;" src="<?php echo base_url(IMG_PATH_ESTATE.$gallery[1]['name']); ?>" alt="<?php echo $gallery[1]['name']; ?>">
                                <input type="hidden" name="txtHddFile2" id="txtHddFile2" value="<?php echo $gallery[1]['name']; ?>">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="txtTitle" class="control-label">Tiêu đề</label>
                                <input type="text" name="txtTitle" id="txtTitle" class="form-control" required="required" value="<?php echo $info['title']; ?>">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="txtCity" class="control-label">Tỉnh Thành</label>
                                <select name="txtCity" id="txtCity" class="form-control" required="required">
                                    <option value="prompt">---Tỉnh Thành---</option>
                                    <?php foreach ($city as $k => $itemCity): ?>
                                        <option <?php echo ($info['city_id'] == $itemCity['id']) ? 'selected="selected"'  : ''; ?> value="<?php echo $itemCity['id']; ?>" id='idCity-<?php echo $itemCity['id']; ?>'><?php echo $itemCity['name_city']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="txtDist" class="control-label">Quận / Huyện</label>
                                <select name="txtDist" id="txtDist" class="form-control" required="required">
                                    <option value="prompt" id="promptD">---Quận / Huyện---</option>
                                    <?php foreach ($district as $k => $itemD): ?>
                                        <?php if ($info['city_id'] == $itemD['id_city']): ?>
                                            <option <?php echo ($info['district_id'] == $itemD['id']) ? 'selected="selected"'  : ''; ?> value="<?php echo $itemD['id']; ?>"><?php echo $itemD['name_district']; ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="txtArea" class="control-label">Khu vực</label>
                                <select name="txtArea" id="txtArea" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Khu vực---</option>
                                    <?php foreach ($area as $k => $itemA): ?>
                                        <?php if ($info['district_id'] == $itemA['id_district']): ?>
                                            <option <?php echo ($info['area_id'] == $itemA['id']) ? 'selected="selected"'  : ''; ?> value="<?php echo $itemA['id']; ?>"><?php echo $itemA['name_area']; ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                <label for="txtDirect" class="control-label">Hướng</label>
                                <select name="txtDirect" id="txtDirect" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Hướng---</option>
                                    <?php foreach ($direction as $k => $itemDirect): ?>
                                        <option <?php echo ($info['direction_id'] == $itemDirect['id']) ? 'selected="selected"'  : ''; ?> value="<?php echo $itemDirect['id']; ?>"><?php echo $itemDirect['name_direction']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label  for="txtAcreage">Diện tích</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtAcreage" name="txtAcreage" placeholder="Diện tích" value="<?php echo $info['acreage']; ?>">
                                    <div class="input-group-addon">m<sup>2</sup></div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label  for="txtPrice">Giá</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="txtPrice" name="txtPrice" placeholder="Giá" value="<?php echo $info['price']; ?>">
                                    <div class="input-group-addon">VND</div>
                                </div>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label  for="txtGara">Số nhà xe</label>
                                <select name="txtGara" id="txtGara" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Số nhà xe---</option>
                                    <option <?php echo ($info['garage'] == 1) ? 'selected="selected"' : ''; ?> value="1" >1</option>
                                    <option <?php echo ($info['garage'] == 2) ? 'selected="selected"' : ''; ?> value="2" >2</option>
                                    <option <?php echo ($info['garage'] == 3) ? 'selected="selected"' : ''; ?> value="3" >3</option>
                                    <option <?php echo ($info['garage'] == 4) ? 'selected="selected"' : ''; ?> value="4" >4</option>
                                    <option <?php echo ($info['garage'] == 5) ? 'selected="selected"' : ''; ?> value="5" >5</option>
                                    <option <?php echo ($info['garage'] == 6) ? 'selected="selected"' : ''; ?> value="6" >6</option>
                                    <option <?php echo ($info['garage'] == 7) ? 'selected="selected"' : ''; ?> value="7" >7</option>
                                    <option <?php echo ($info['garage'] == 8) ? 'selected="selected"' : ''; ?> value="8" >8</option>
                                    <option <?php echo ($info['garage'] == 9) ? 'selected="selected"' : ''; ?> value="9" >9</option>
                                    <option <?php echo ($info['garage'] == 10) ? 'selected="selected"' : ''; ?> value="10">10</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtKitchen" class="control-label">Số phòng bếp</label>
                                <select name="txtKitchen" id="txtKitchen" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Số phòng bếp---</option>
                                    <option <?php echo ($info['kitchen'] == 1) ? 'selected="selected"' : ''; ?> value="1">1</option>
                                    <option <?php echo ($info['kitchen'] == 2) ? 'selected="selected"' : ''; ?> value="2">2</option>
                                    <option <?php echo ($info['kitchen'] == 3) ? 'selected="selected"' : ''; ?> value="3">3</option>
                                    <option <?php echo ($info['kitchen'] == 4) ? 'selected="selected"' : ''; ?> value="4">4</option>
                                    <option <?php echo ($info['kitchen'] == 5) ? 'selected="selected"' : ''; ?> value="5">5</option>
                                    <option <?php echo ($info['kitchen'] == 6) ? 'selected="selected"' : ''; ?> value="6">6</option>
                                    <option <?php echo ($info['kitchen'] == 7) ? 'selected="selected"' : ''; ?> value="7">7</option>
                                    <option <?php echo ($info['kitchen'] == 8) ? 'selected="selected"' : ''; ?> value="8">8</option>
                                    <option <?php echo ($info['kitchen'] == 9) ? 'selected="selected"' : ''; ?> value="9">9</option>
                                    <option <?php echo ($info['kitchen'] == 10) ? 'selected="selected"' : ''; ?> value="10">10</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtBedroom" class="control-label">Số phòng ngủ</label>
                                <select name="txtBedroom" id="txtBedroom" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Số phòng ngủ---</option>
                                    <option <?php echo ($info['bedroom'] == 1) ? 'selected="selected"' : ''; ?> value="1">1</option>
                                    <option <?php echo ($info['bedroom'] == 2) ? 'selected="selected"' : ''; ?> value="2">2</option>
                                    <option <?php echo ($info['bedroom'] == 3) ? 'selected="selected"' : ''; ?> value="3">3</option>
                                    <option <?php echo ($info['bedroom'] == 4) ? 'selected="selected"' : ''; ?> value="4">4</option>
                                    <option <?php echo ($info['bedroom'] == 5) ? 'selected="selected"' : ''; ?> value="5">5</option>
                                    <option <?php echo ($info['bedroom'] == 6) ? 'selected="selected"' : ''; ?> value="6">6</option>
                                    <option <?php echo ($info['bedroom'] == 7) ? 'selected="selected"' : ''; ?> value="7">7</option>
                                    <option <?php echo ($info['bedroom'] == 8) ? 'selected="selected"' : ''; ?> value="8">8</option>
                                    <option <?php echo ($info['bedroom'] == 9) ? 'selected="selected"' : ''; ?> value="9">9</option>
                                    <option <?php echo ($info['bedroom'] == 10) ? 'selected="selected"' : ''; ?> value="10">10</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtLiving" class="control-label">Số phòng khách</label>
                                <select name="txtLiving" id="txtLiving" class="form-control" required="required">
                                    <option value="prompt" id="promptA">---Số phòng khách---</option>
                                    <option <?php echo ($info['livingroom'] == 1) ? 'selected="selected"' : ''; ?> value="1">1</option>
                                    <option <?php echo ($info['livingroom'] == 2) ? 'selected="selected"' : ''; ?> value="2">2</option>
                                    <option <?php echo ($info['livingroom'] == 3) ? 'selected="selected"' : ''; ?> value="3">3</option>
                                    <option <?php echo ($info['livingroom'] == 4) ? 'selected="selected"' : ''; ?> value="4">4</option>
                                    <option <?php echo ($info['livingroom'] == 5) ? 'selected="selected"' : ''; ?> value="5">5</option>
                                    <option <?php echo ($info['livingroom'] == 6) ? 'selected="selected"' : ''; ?> value="6">6</option>
                                    <option <?php echo ($info['livingroom'] == 7) ? 'selected="selected"' : ''; ?> value="7">7</option>
                                    <option <?php echo ($info['livingroom'] == 8) ? 'selected="selected"' : ''; ?> value="8">8</option>
                                    <option <?php echo ($info['livingroom'] == 9) ? 'selected="selected"' : ''; ?> value="9">9</option>
                                    <option <?php echo ($info['livingroom'] == 10) ? 'selected="selected"' : ''; ?> value="10">10</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtBargain" class="control-label">Thương lượng</label>
                                <select name="txtBargain" id="txtBargain" class="form-control" required="required">
                                    <option value="prompt">---Chọn----</option>
                                    <option <?php echo ($info['bargain'] == 1) ? 'selected="selected"' : ''; ?> value="1">Có thương lượng</option>
                                    <option <?php echo ($info['bargain'] == 2) ? 'selected="selected"' : ''; ?> value="2">Không thương lượng</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtNewsCate" class="control-label">Loại tin</label>
                                <select name="txtNewsCate" id="txtNewsCate" class="form-control" required="required">
                                    <option value="prompt">---Chọn loại tin----</option>
                                    <option <?php echo ($info['news_cate_id'] == 1) ? 'selected="selected"' : ''; ?> value="1">Cần bán</option>
                                    <option <?php echo ($info['news_cate_id'] == 1) ? 'selected="selected"' : ''; ?> value="1">Cần mua</option>
                                    <option <?php echo ($info['news_cate_id'] == 2) ? 'selected="selected"' : ''; ?> value="2">Cần thuê</option>
                                    <option <?php echo ($info['news_cate_id'] == 2) ? 'selected="selected"' : ''; ?> value="2">Cần cho thuê</option>
                                </select>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <label for="txtTypeEstate" class="control-label">Loại BĐS</label>
                                <select name="txtTypeEstate" id="txtTypeEstate" class="form-control" required="required">
                                    <option value="prompt">---Chọn loại BĐS----</option>
                                    <?php foreach ($newsCate as $k => $itemCate): ?>
                                        <option <?php echo ($info['real_estate_type'] == $itemCate['id_cate']) ? 'selected="selected"'  : ''; ?> value="<?php echo $itemCate['id_cate']; ?>"><?php echo $itemCate['name_category']; ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <?php $date=date_create($info['posting_date']); ?>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="txtExp" class="control-label">Hạn đăng</label>
                                <input type="date" name="txtExp" id="txtExp" class="form-control" value="<?php echo date_format($date,'Y-m-d'); ?>" title="Hạn đăng mắc định là 10 ngày" required="required">
                                <span><i>Hạn đăng mặc định là 10 ngày.</i></span>
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="txtLocation" class="control-label">Vị trí cụ thể</label>
                                <input type="text" name="txtLocation" id="txtLocation" class="form-control" value="<?php echo $info['location']; ?>">
                            </div>
                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="txtDescrip" class="control-label">Thông tin cơ bản</label>
                                <textarea name="txtDescrip" id="txtDescrip" class="form-control" rows="5"><?php echo $info['description']; ?></textarea>
                            </div>
                            <div class="clearfix">
                            </div>
                            <div class="form-group col-xs-12 col-sm-8 col-md-6 col-lg-4">
                                <button type="submit" class="btn btn-primary form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">sửa tin</button>
                            </div>
                        </form>
                    </div>
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
                url: '<?php echo site_url('postingnews/loadDistrict'); ?>',
                type: 'post',
                data: {'idCity' : idCity},
                success: function(res) {
                    var obj = $.parseJSON(res);

                    html = "";

                    if (obj.result.length < 1) {
                        html += '<option value="prompt" id="promptD">---Tất cả---</option>';
                        html += '<option>Chưa có dữ liệu</option>';
                    }
                    else{
                        html += '<option value="prompt" id="promptD">---Quận / Huyện---</option>';
                        $.each(obj.result,function(key, item){
                            html += '<option value="'+ item['id']+'" id="idDist-'+ item['id'] +'">'+ item['name_district'] +'</option>';
                        });
                    }
                    $('select#txtDist').html(html);
                }
            });

        });
        $("#txtDist").change( function(event) {
            // event.preventDefault();
            //var dist = $("#txtDist")[0]; //  <==>  var dist = document.getElementById("txtDist");

            var idDist = $.trim($("#txtDist").val());

            $.ajax({
                url: '<?php echo site_url('postingnews/loadArea'); ?>',
                type: 'post',
                data: {'idDist' : idDist},
                success: function(res) {
                    var obj = $.parseJSON(res);

                    html = "";
                    if (obj.result.length < 1) {
                        html += '<option value="prompt" id="promptA">---Tất cả---</option>';
                        html += '<option>Chưa có dữ liệu</option>';
                    }
                    else{
                        html += '<option value="prompt" id="promptA">---Khu vực---</option>';
                        $.each(obj.result,function(key, item){ // duyet mang trong jquery
                            html += '<option value="'+ item['id']+'" id="idDist-'+ item['id'] +'">'+ item['name_area'] +'</option>';
                            // console.log(item);
                        });
                    }
                    $('select#txtArea').html(html);
                }
            });

        });
    });

</script>