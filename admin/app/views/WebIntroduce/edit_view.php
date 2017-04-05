<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div id="page-wrapper">
    <div class="container-fluid">
        <?php echo $this->breadcrumbs->show(); ?>
        <!-- add data -->
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $title; ?></h3>
                </div>
                <div class="panel-body">
                    <form action="<?php echo site_url('webintroduce/updateIntro/'.$webIntroId['id']); ?>" method="post" accept-charset="utf-8">
                        <input type="text" name="txtTitle" id="txtTitle" class="form-control" title="Nhập vào tiêu đề" placeholder="Nhập vào tiêu đề..." value="<?php echo $webIntroId['title']; ?>">
                        <br>
                        <textarea name="txtDescript" title="Nhập vào Nội dung" class="form-control" placeholder="Nhập vào Nội dung..." rows="10" ><?php echo $webIntroId['description']; ?></textarea>
                        <br>
                        <select name="txtStatus" class="form-control">
                            <option value="prompt">---Chọn trạng thái---</option>
                            <option value="0" selected="<?php ($webIntroId['description'] == 0) ? 'selected' : ''; ?>">Ẩn</option>
                            <option value="1" selected="<?php ($webIntroId['description'] == 1) ? 'selected' : ''; ?>">Hiện</option>
                        </select>
                        <br>
                        <input type="text" name="txtAuthor" id="txtAuthor" class="form-control" value="<?php echo $webIntroId['author']; ?>" title="Nhập vào tác giả" placeholder="Nhập vào tác giả...">
                        <br>
                        <button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-success">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end add data -->
    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->