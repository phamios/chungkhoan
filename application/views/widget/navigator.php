<li class="accordion-group active">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#dashboard-nav" href="<?php echo site_url('admincp/dashboard');?>">
        <i class="icon-dashboard icon-large"></i> Dashboard <span
            class="label label-inverse pull-right"></span>
    </a>

</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#component-nav">
        <i class="icon-tasks icon-large"></i>  Mã chứng khoán <span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="component-nav">
        <li><a href="<?php echo base_url('admincp/codeck') ?>"><i class="icon-angle-right"></i> Danh sách</a></li>
        <li><a href="<?php echo base_url('admincp/codeck/add_codeck') ?>"><i class="icon-angle-right"></i> Thêm mới</a></li>
        <li><a href="<?php echo base_url('admincp/autocode') ?>"> <i class="icon-angle-right"></i> Lấy mã tin tự động </a></li>
    </ul>
</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-nav">
        <i class="icon-pencil icon-large"></i>QUản lý cate<span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="form-nav">
        <li><a href="<?php echo base_url('admincp/cate') ?>"><i class="icon-angle-right"></i> Danh sách cate</a></li>
        <li><a href="<?php echo base_url('admincp/cate/add_cate') ?>"><i class="icon-angle-right"></i> Thêm cate</a></li>
<!--                             <li><a href="form-wysiwyg.html"><i class="icon-angle-right"></i> WYSIWYG</a></li> -->
<!--                             <li><a href="form-wizard.html"><i class="icon-angle-right"></i> Wizard &amp; File Upload</a></li> -->
    </ul>
</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-navv">
        <i class="icon-pencil icon-large"></i> Tin thị trường <span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="form-navv">
        <li><a href="<?php echo base_url('admincp/post') ?>"><i class="icon-angle-right"></i> Danh sách tin</a></li>
        <li><a href="<?php echo base_url('admincp/post/add_post') ?>"><i class="icon-angle-right"></i> Thêm tin</a></li> 
    </ul>
</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-navvv">
        <i class="icon-pencil icon-large"></i> Notification <span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="form-navvv">
        <li><a href="<?php echo base_url('admincp/notification') ?>"><i class="icon-angle-right"></i> Danh sách cảnh báo</a></li>
        <li><a href="<?php echo base_url('admincp/notification/add_notification') ?>"><i class="icon-angle-right"></i> Thêm cảnh báo</a></li> 
    </ul>
</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-naw">
        <i class="icon-pencil icon-large"></i> Luật chơi <span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="form-naw">
        <li><a href="<?php echo base_url('admincp/rule') ?>"><i class="icon-angle-right"></i> Cấu hình luật chơi</a></li>
    </ul>
</li>
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle collapsed" data-target="#form-naww">
        <i class="icon-pencil icon-large"></i> Quản lý Group <span class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse " id="form-naww">
        <li><a href="<?php echo base_url('admincp/group') ?>"><i class="icon-angle-right"></i> Danh sách group</a></li>
        <li><a href="<?php echo base_url('admincp/group/add_group') ?>"><i class="icon-angle-right"></i> Thêm group</a></li> 
    </ul>
</li>

<li><a href="<?php echo base_url('admincp/user/listuser') ?>"><i class="icon-table icon-large"></i>  Quản lý user</a></li>
<!-- <li><a href="#"><i class="icon-file icon-large"></i> Quản lý  giao dịch</a></li> -->
<!-- <li><a href="#"><i class="icon-font icon-large"></i> Quản lý  nạp tiền</a></li> -->
<!-- <li><a href="#"><i class="icon-map-marker icon-large"></i> Quản lý rút tiền</a></li> -->

<!-- <li><a href="calendar.html"><i class="icon-calendar icon-large"></i> Calendar</a></li> -->
<li class="accordion-group ">
    <a data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#error-nav">
        <i class="icon-warning-sign icon-large"></i> Cấu hình site<span
            class="label label-inverse pull-right"></span>
    </a>
    <ul class="collapse" id="error-nav">
        <li><a href="<?php echo site_url('admincp/site/index');?>"><i class="icon-angle-right"></i> THay đổi</a></li> 
    </ul>
</li>
 
<li><a href="#"><i class="icon-signin icon-large"></i> Thoát hệ thống </a></li>
