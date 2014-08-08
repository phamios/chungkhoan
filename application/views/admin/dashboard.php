<!DOCTYPE html>
<!--[if lt IE 7]>       <html class="no-js lt-ie9 lt-ie8 lt-ie7">   <![endif]-->
<!--[if IE 7]>          <html class="no-js lt-ie9 lt-ie8">          <![endif]-->
<!--[if IE 8]>          <html class="no-js lt-ie9">                 <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js">                        <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Dashboard</title>
        <meta name="description" content="Metis: Bootstrap Responsive Admin Theme">
        <meta name="viewport" content="width=device-width">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/bootstrap.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/style_ck.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/bootstrap-responsive.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/Font-awesome/css/font-awesome.min.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/style.css">
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/calendar.css">

        <link rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/css/theme.css">

        
        <script src="<?php echo base_url('res/jquery.min.js'); ?>"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#loading").hide();
                $("#finish").hide();

            });
            function sendsms() {
                var message = document.getElementById("txt_message").value;
                var dataString = message;
                $("#loading").show();
                $("#finish").hide();
                $.ajax({
                    url: "<?php echo site_url('admincp/autocode/get_codeck') ?>/" + dataString,
                    type: 'POST',
                    data: dataString,
                    success: function(output_string) {
                        $("#loading").hide();  
                        //alert(output_string);
                        $('.div_processing').html(output_string); 
                        //$("#finish").show();
                    },
                    error: function() {
                        alert('null');

                    }
                });
            }
        </script>


        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url('res/html5.js'); ?>"></script><![endif]-->
        <!--[if IE 7]>
        <link type="text/css" rel="stylesheet" href="<?php echo base_url('res/assets/'); ?>/Font-awesome/css/font-awesome-ie7.min.css"/>
        <![endif]-->
 
    </head>
    <body>
        <!-- BEGIN WRAP -->
        <div id="wrap">


            <!-- BEGIN TOP BAR -->
            <div id="top">
                <!-- .navbar -->
                <?php //$this->load->view('widget/top_nav');?>
                <!-- /.navbar -->
            </div>
            <!-- END TOP BAR -->


            <!-- BEGIN HEADER.head -->
            <header class="head">
                <?php $this->load->view('widget/main_nav'); ?>
                <!-- /.main-bar -->
            </header>
            <!-- END HEADER.head -->

            <!-- BEGIN LEFT  -->
            <div id="left">
                <?php $this->load->view('widget/left'); ?>
            </div>
            <!-- END LEFT -->

            <!-- BEGIN MAIN CONTENT -->
            <div id="content">
                <!-- .outer -->
                <div class="container-fluid outer"> 

                    <?php if ($this->router->class == 'codeck'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/codeck/index'); ?>
                        <?php endif; ?>  
                        <?php if ($this->router->fetch_method() == 'add_codeck'): ?>
                            <?php $this->load->view('admin/codeck/add_codeck'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update_codeck'): ?>
                            <?php $this->load->view('admin/codeck/update_codeck'); ?>
                        <?php endif; ?>
                    <?php endif; ?>    

                    <?php if ($this->router->class == 'cate'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/cate/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_cate'): ?>
                            <?php $this->load->view('admin/cate/add_cate'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update_cate'): ?>
                            <?php $this->load->view('admin/cate/update_cate'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'post'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/post/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_post'): ?>
                            <?php $this->load->view('admin/post/add_post'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update_post'): ?>
                            <?php $this->load->view('admin/post/update_post'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'notification'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/notification/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_notification'): ?>
                            <?php $this->load->view('admin/notification/add_notification'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update_notification'): ?>
                            <?php $this->load->view('admin/notification/update_notification'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if ($this->router->class == 'rule'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/rule/index'); ?>
                        <?php endif; ?>
                    <?php endif; ?>
        
                    <?php if ($this->router->class == 'group'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/group/index'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'add_group'): ?>
                            <?php $this->load->view('admin/group/add_group'); ?>
                        <?php endif; ?>
                        <?php if ($this->router->fetch_method() == 'update_group'): ?>
                            <?php $this->load->view('admin/group/update_group'); ?>
                        <?php endif; ?>
                    <?php endif; ?>

                     <?php if ($this->router->class == 'user'): ?>
                        <?php if ($this->router->fetch_method() == 'listuser'): ?>
                            <?php $this->load->view('admin/user/list'); ?>
                        <?php endif; ?> 
                    <?php endif; ?>
                    
                    <?php if ($this->router->class == 'site'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/site/index'); ?>
                        <?php endif; ?> 
                    <?php endif; ?>

                    <?php if ($this->router->class == 'dashboard'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/default'); ?>
                        <?php endif; ?>                
                    <?php endif; ?>   

                    <?php if ($this->router->class == 'autocode'): ?>
                        <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('admin/craw/index'); ?>
                        <?php endif; ?>                
                    <?php endif; ?>    

                </div>
                <!-- /.outer -->
            </div>
            <!-- END CONTENT -->


            <!-- #push do not remove -->
            <div id="push"></div>
            <!-- /#push -->
        </div>
        <!-- END WRAP -->

        <div class="clearfix"></div>

        <!-- BEGIN FOOTER -->
        <div id="footer">
            <p>2013 Â© Metis Admin</p>
        </div>
        <!-- END FOOTER -->

        <!-- #helpModal -->
         
        <!-- /#helpModal -->

        <script src="<?php echo base_url('src/js/jquery.min.js');?> "></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('res/assets/'); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url('src/js/jquery-ui.min.js');?>"></script>
        <script>window.jQuery.ui || document.write('<script src="<?php echo base_url('res/assets/'); ?>/js/vendor/jquery-ui-1.10.0.custom.min.js"><\/script>')</script>


        <script src="<?php echo base_url('res/assets/'); ?>/js/vendor/bootstrap.min.js"></script>

        <script src="<?php echo base_url('res/assets/'); ?>/js/lib/jquery.tablesorter.min.js"></script>

        <script src="<?php echo base_url('res/assets/'); ?>/js/lib/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url('res/assets/'); ?>/js/lib/jquery.sparkline.min.js"></script>
 
  
 
    </body>
</html>
