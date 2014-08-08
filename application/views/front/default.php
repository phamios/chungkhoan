<?php if($this->session->userdata('user_id') != null):?> 
			<ul class="tooltip clearfix">
				<li>
					<h4>Số Dư Tiền Mặt</h4>
					<h3><span>0 <sup>đ</sup></span></h3>
				</li>
				<li>
					<h4>Cổ Phiếu Quy Đổi</h4>
					<h3><span>0 <sup>đ</sup></span></h3>
				</li>
				<li>
					<h4>Lãi/Lỗ</h4>
					<h3><span>0 <sup>đ</sup></span></h3>
				</li>
				<li>
					<h4>ROI</h4>
					<h3><span>0%</span></h3>
				</li>
				<li>
					<h4>Tổng Giá Trị</h4>
					<h3><span>0 <sup>đ</sup></span></h3>
				</li>
				<li>
					<h4>Thứ Hạng</h4>
					<h3><span>Chưa có</span></h3>
				</li>
			</ul>
			<ul>
				<li id="_msgId" class="msgContainer"></li>
				<li id="_contentBlock"><ul>
	<li class="marginB20"><ul class="box">
	<li class="boxTitle"><h3>Cổ Phiếu Sở Hữu</h3></li>
	<li class="boxContent"><table class="tblGray">
  <tbody><tr class="rowHeader">
    <td width="1%">STT</td>
    <td>Mã CK</td>
    <td>Khối lượng (CP)</td>
    <td>Giá hiện tại</td>
    <td>+/-</td>
    <td>Giá trị thị trường (đ)</td>
	<td>Tác vụ</td>
  </tr>
</tbody></table>
<div class="emptyData">Không có cổ phiếu nào!</div>
</li>
</ul></li>
	<li><ul class="box">
	<li class="boxTitle"><h3>Phân Tích Danh Mục</h3></li>
	<li class="boxContent"><table class="tblGray">
  <tbody><tr class="rowHeader">
    <td>Mã CK</td>
    <td>KL đang sở hữu (CP)</td>
    <td>KL mua chờ về</td>
    <td>Tiền bán chờ về</td>
    <td>Giá mua trung bình</td>
	<td>Giá hiện tại</td>
	<td>Lãi/Lỗ</td>
  </tr>
</tbody></table>
<div class="emptyData">Không có cổ phiếu nào!</div>
</li>
</ul></li>
</ul></li>
			</ul> 
<?php else: ?>
<ul>
	<li id="_msgId" class="msgContainer">msg</li>
	<li id="_contentBlock"><h2 class="VNGTop">TOP 10 ANH TÀI CHỨNG KHOÁN</h2>
		<ul class="clearfix">
			<li class="floatLeft"><div class="champion">
					<div class="champion1st">
						<div class="championRank1st">
							<h4>
								THỨ HẠNG <span>¹</span>
							</h4>
						</div>
						<div class="avatar">
							<img
								src="<?php echo base_url('src/front/'); ?>/index_files/m_avatar.png">
						</div>
						<div class="championMember">
							<a href="#" title="phuongnamtncm" onclick="return false">phuongnamtncm</a>
						</div>
						<div class="championDetail">
							<ul>
								<li><span>366.527.020 đ</span><br>
								<span>ROI: </span>2.548%</li>
								<li><span>Giải thưởng:<br>3.387.000 đ
								</span></li>
							</ul>
						</div>
					</div>
					<ul class="clearfix">
						<li class="champion23st">
							<div class="championRank2st">
								<h4>
									THỨ HẠNG <span>²</span>
								</h4>
							</div>
							<div class="avatar">
								<img
									src="<?php echo base_url('src/front/'); ?>/index_files/avatar3.png">
							</div>
							<div class="championMember">
								<a href="#" title="e.wsabu@gmail.com" onclick="return false">e.wsabu@gmail.com</a>
							</div>
							<div class="championDetail">
								<ul>
									<li><span>236.025.724 đ</span><br>
									<span>ROI: </span>4.258%</li>
									<li><span>Giải thưởng:<br>2.032.200 đ
									</span></li>
								</ul>
							</div>
						</li>
						<li class="champion23st">
							<div class="championRank3st">
								<h4>
									THỨ HẠNG <span>³</span>
								</h4>
							</div>
							<div class="avatar">
								<img
									src="<?php echo base_url('src/front/'); ?>/index_files/m_avatar.png">
							</div>
							<div class="championMember">
								<a href="#" title="cuongv3s" onclick="return false">cuongv3s</a>
							</div>
							<div class="championDetail">
								<ul>
									<li><span>152.162.312 đ</span><br>
									<span>ROI: </span>2.378%</li>
									<li><span>Giải thưởng:<br>1.354.800 đ
									</span></li>
								</ul>
							</div>
						</li>
					</ul>
				</div></li>
			<li class="floatRight"><table class="rankList tblGray">
					<tbody>
						<tr>
							<td align="right"><span class="rank">04</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/avatar6.png">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="ishajames">ishajames</a><span class="rankGain">57.118.370
									đ</span><span>ROI: 4.98%</span></td>
						</tr>
						<tr class="rowDark">
							<td align="right"><span class="rank">05</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/m_avatar.png">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="frank9">frank9</a><span class="rankGain">56.214.606 đ</span><span>ROI:
									0.827%</span></td>
						</tr>
						<tr>
							<td align="right"><span class="rank">06</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/538767e2312e3.jpg">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="XUADQUAN">XUADQUAN</a><span class="rankGain">48.433.520 đ</span><span>ROI:
									1.625%</span></td>
						</tr>
						<tr class="rowDark">
							<td align="right"><span class="rank">07</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/m_avatar.png">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="Lehuy264">Lehuy264</a><span class="rankGain">48.052.640 đ</span><span>ROI:
									2.025%</span></td>
						</tr>
						<tr>
							<td align="right"><span class="rank">08</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/m_avatar.png">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="kidanhdetu">kidanhdetu</a><span class="rankGain">35.942.724
									đ</span><span>ROI: 8.279%</span></td>
						</tr>
						<tr class="rowDark">
							<td align="right"><span class="rank">09</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/f_avatar.png">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="tieumy1">tieumy1</a><span class="rankGain">35.779.762 đ</span><span>ROI:
									0.342%</span></td>
						</tr>
						<tr>
							<td align="right"><span class="rank">10</span></td>
							<td align="center">
								<div class="avatar">
									<img
										src="<?php echo base_url('src/front/'); ?>/index_files/53e09124211b8.jpg">
								</div>
							</td>
							<td class="rankDetail"><a href="#" onclick="return false;"
								title="phamtruongnbvn">phamtruongnbvn</a><span class="rankGain">31.126.020
									đ</span><span>ROI: 2.191%</span></td>
						</tr>
					</tbody>
				</table></li>
		</ul></li>
</ul>

<?php endif;?>