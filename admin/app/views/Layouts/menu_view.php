<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li class="active">
                        <a href="<?php echo site_url('dashboard/index'); ?>"><i class="fa fa-fw fa-home"></i> Trang chủ</a>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#account"><i class="fa fa-fw fa-arrows-v"></i> Quản lý tài khoản <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="account" class="collapse">
                            <li>
                                <a href="<?php echo site_url('signup/index'); ?>"><i class="fa fa-fw fa-plus-circle"></i> Tạo tài khỏan</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('infoadmin/index'); ?>"><i class="fa fa-fw fa-plus-circle"></i> Thông tin admin</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('infomember/index'); ?>"><i class="fa fa-fw fa-plus-circle"></i> Thông tin thành viên</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('webintroduce/index'); ?>"><i class="fa fa-fw fa-table"></i> Giới thiệu web</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('estate/index'); ?>"><i class="fa fa-fw fa-edit"></i>Thông tin</a>
                    </li>
                    <li class="<?php echo ($className == "bank" || $className == "area" || $className == "direction" || $className == "district" || $className == "city" || $className == "newscategory") ? 'active' : ''; ?>">
                        <a href="javascript:;" data-toggle="collapse" data-target="#object"><i class="fa fa-fw fa-chevron-circle-right"></i> Đối tượng <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="object" class="collapse">
                            <li>
                                <a href="<?php echo site_url('bank/index'); ?>"><i class="fa fa-university"></i>&nbsp;Ngân hàng</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('city/index'); ?>"><i class="fa fa-taxi"></i>&nbsp;Thành phố</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('direction/index'); ?>"><i class="fa fa-arrow-circle-right"></i>&nbsp;Hướng</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('district/index'); ?>"><span class="glyphicon glyphicon-road"></span>&nbsp;Quận / Huyện</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('area/index'); ?>"><i class="fa fa-circle-thin"></i>&nbsp;Khu vực</a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('newscategory/index'); ?>"><i class="fa fa-list"></i>&nbsp;Thể loại tin tức</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </header>