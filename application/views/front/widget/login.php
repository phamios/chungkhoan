<?php if($this->session->userdata('user_id') != null):?>
 	
<?php else:?>
<li id="_authWrapper" class="authWrapper" style="display:block"> 
	<?php echo form_open_multipart('home/login',array('id'=>'frmQuickAuth' )); ?>
	<ul class="clearfix">
		<li>
			<span>Tên đăng nhập</span>
			<span><input oldclass="input" id="qUsername" name="username" required="Y" tabindex="1" class="input inputRequiredField"  type="text"></span>
			<span><a href="<?php echo site_url('home/register');?>" >Đăng ký</a></span>
		</li>
		<li>
			<span>Mật khẩu</span>
			<span><input oldclass="input" id="qPassword" name="password" required="Y" tabindex="2" class="input inputRequiredField" type="password"></span>
			<span><a href="<?php echo site_url('home/lostpass');?>">Quên mật khẩu?</a></span>
		</li>
		<li class="quickAuth">
			<input required="null" id="cmdQuickAuth" value="Đăng nhập" tabindex="3" class="btn" type="submit" name="login_submit"> 
		</li>
	</ul>
	<?php echo form_close(); ?>
</li>
<?php endif;?>
