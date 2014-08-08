
<?php $this->load->view('front/widget/header');?>
<body id="_mainBlock" >

	<div class="wrapper">
		<div class="headerWrapper">
			<ul class="header clearfix">
				<li class="logo"></li>
			<?php $this->load->view('front/widget/menu');?>
			<?php $this->load->view('front/widget/login');?>
			
		</ul>
		</div>  
		<?php $this->load->view('front/home');?>
         
	<?php $this->load->view('front/widget/footer');?>
</div>
 
 

 

</body></html>