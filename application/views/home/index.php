<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
    <head>
        <title>Chứng khoán ảo</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url('src/home/css'); ?>/bootstrap.css" rel='stylesheet' type='text/css' />
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Custom Theme files -->
        <link href="<?php echo base_url('src/home/css'); ?>/style.css" rel='stylesheet' type='text/css' />
        <!-- Custom Theme files -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <link href="<?php echo base_url('src/home/css'); ?>/slider.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="<?php echo base_url('src/home/css'); ?>/nav.css" rel="stylesheet" type="text/css" media="all"/>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300:700' rel='stylesheet' type='text/css'>
        <script src="<?php echo base_url('src/home/js'); ?>/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url('src/home/js'); ?>/modernizr.custom.js" type="text/javascript"></script>
        <script src="<?php echo base_url('src/home/js'); ?>/jquery.openCarousel.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('#cbp-fwslider').cbpFWSlider();

            });
        </script>
        <!---- animated-css ---->
        <link href="<?php echo base_url('src/home/css'); ?>/animate.css" rel="stylesheet" type="text/css" media="all">
        <script src="<?php echo base_url('src/home/js'); ?>/wow.min.js"></script>
        <script>
            new WOW().init();
        </script>

        <script>
            $(function () {
                var button = $('#loginButton');
                var box = $('#loginBox');
                var form = $('#loginForm');
                button.removeAttr('href');
                button.mouseup(function (login) {
                    box.toggle();
                    button.toggleClass('active');
                });
                form.mouseup(function () {
                    return false;
                });
                $(this).mouseup(function (login) {
                    if (!($(login.target).parent('#loginButton').length > 0)) {
                        button.removeClass('active');
                        box.hide();
                    }
                });
            });
        </script>
        <!----font-Awesome----->
        <link rel="stylesheet" href="fonts/<?php echo base_url('src/home/css'); ?>/font-awesome.min.css">
        <!----font-Awesome----->
    </head>
    <body>
        <!-- Header -->
        <?php $this->load->view('home/top_menu'); ?>
        <div class="header_bottom">
            <div class="container">	 			
                <div class="logo">
                    <h1><a href="index.html">Box <span>Chứng khoán</span></a></h1>
                </div>				
                <?php $this->load->view('home/menu'); ?>
                <div class="clearfix"></div>		   
            </div>
        </div>	
        <div id="cbp-fwslider" class="cbp-fwslider wow fadeInLeft" data-wow-delay="0.4s" id="work">
            <div class="slider-line"></div>
            <ul>
                <li><a href="#"><img src="<?php echo base_url('src/home/images'); ?>/2.jpg" class="img-responsive" alt="img01"/></a></li>
                <li><a href="#"><img src="<?php echo base_url('src/home/images'); ?>/1.jpg" class="img-responsive" alt="img02"/></a></li>
            </ul>
            <script src="<?php echo base_url('src/home/js'); ?>/jquery.cbpFWSlider.min.js" type="text/javascript"></script>
        </div>
    </div>
    <!-- Ends Header -->
    <!------------ Start Content ---------------->
    <div class="main"> 
        <?php if ($this->router->class == 'home'): ?>
            <?php if ($this->router->fetch_method() == 'index'): ?>
                <?php $this->load->view('home/home'); ?>
            <?php endif; ?>
        <?php if ($this->router->fetch_method() == 'register'): ?>
                <?php $this->load->view('home/register'); ?>
            <?php endif; ?>
        <?php endif; ?>

    </div>
    <div class="footer">
        <?php $this->load->view('home/footer'); ?>
    </div>
</body>
</html>

