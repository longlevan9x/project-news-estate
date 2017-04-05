<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- list data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        	<div class="panel panel-primary">
        		<div class="panel-heading">
        			<h3 class="panel-title">Duyệt tin - <?php echo $title; ?></h3>
        		</div>
        		<div class="panel-body">
                    <div  class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <p><?php echo validation_errors(); ?></p>
                    </div>
        			<form action="<?php echo site_url('estate/actionactive/'.$slug.'-'.$id_estate); ?>" method="POST" accept-charset="utf-8">
                        <div class="form-group col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <label for="txtStatus" class="control-label">Thương lượng</label>
                            <select name="txtStatus" id="txtStatus" class="form-control" required="required">
                                <option value="prompt">---Duyệt----</option>
                                <option value="0" <?php echo ($status == 0) ? 'selected="selected"' : ''; ?>>Ẩn</option>
                                <option value="1" <?php echo ($status == 1) ? 'selected="selected"' : ''; ?>>Chờ phê duyệt</option>
                                <option value="2" <?php echo ($status == 2) ? 'selected="selected"' : ''; ?>>Hiện</option>
                            </select>
                        </div>
                        <div class="clearfix"></div>
						<div class="form-group col-xs-12 col-sm-8 col-md-6 col-lg-4">
        					<button type="submit" class="btn btn-primary form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">Đăng tin</button>
        				</div>
        			</form>
        		</div>
        	</div>
        </div>
    </div>
</div>