<div id="_contentBlock">
	<ul class="boxYellow">
		<li class="boxTitle"><h3>Chi Tiết Tài Khoản</h3></li>
		<li class="boxContent"><ul class="frmProfile clearfix">
				<li class="leftColumn">
					<div>
						<img src="<?php echo base_url('src/front/m_avatar.png');?>">
					</div> <input value="Thay đổi avatar" class="btn" type="button">
				</li>
				<li class="rightColumn">
					<ul>
						<li class="gTitleGray"><h4>Thông Tin Cá Nhân</h4></li>
						<li>
							<table class="tblGray tblBold">
								<tbody>
									<tr>
										<td>Họ và tên</td>
										<td><?php echo $mem_name;?></td>
									</tr>
									<tr>
										<td>Giới tính</td>
										<td><?php echo $mem_sex;?></td>
									</tr>
									<tr>
										<td>Ngày sinh</td>
										<td><?php echo $mem_birth;?></td>
									</tr>
									<tr>
										<td>Địa chỉ</td>
										<td><?php echo $mem_add." - ".$mem_country;?></td>
									</tr>
									<tr>
										<td>Lĩnh vực chuyên môn</td>
										<td><?php echo $mem_job;?></td>
									</tr>
								</tbody>
							</table>
						</li>

						<li class="gTitleGray"><h4>Thông Tin Liên Hệ</h4></li>
						<li>
							<table class="tblGray tblBold">
								<tbody>
									<tr>
										<td>E-mail</td>
										<td><?php echo $mem_email;?></td>
									</tr>
									<tr>
										<td>ĐTDĐ</td>
										<td><?php echo $mem_phone;?></td>
									</tr>
								</tbody>
							</table>
						</li>
						 
						<li class="profileCmd">
						<a href="<?php echo site_url('home/update_profile');?>"><input  value="Sửa Thông Tin"
							class="btnYellow" style="width: 120px" type="button"></a></li>
					</ul>
				</li>
			</ul></li>
	</ul>
</div>