<?php if($this->session->userdata('user_id') != null):?>

<div class="clearfix">
	<ul class="gameAction">
		<li class="joinGame"><a href="#" >Kích hoạt vòng chơi</a></li>
		<li class="recharge"><a href="#" >Nạp tiền ảo</a></li>
	</ul>
</div>
<ul>
	<li class="boxCorner marginB20"><ul class="accountGeneral">
			<li class="clearfix"><a href="#"
				 title="Thông tin cá nhân"><img
					id="_avatar" src="<?php echo base_url('src/front/m_avatar.png'); ?>"></a>Hoang Xuan Long</li>
			<li>Mã giao dịch:<span>118221</span></li>
			<li>Nhóm thi đấu:<span class="leagueName">Anh Tài Chứng Khoán</span></li>
			<li>Ngày mở tài khoản:<span>27/12/2013 09:28:04 PM</span></li>
			<li>Giao dịch lần cuối:<span>---</span></li>
			<li>Trạng thái:<span>Chưa kích hoạt vòng chơi</span></li>
		</ul></li>
	<li class="marginB20">
		<h4 class="gTitle">Cổ Phiếu NÓNG Trên Vnstockgame</h4>
		<table class="tblGray">
			<tbody>
				<tr class="rowHeader">
					<td>Mã CK</td>
					<td>KL mua (CP)</td>
					<td>KL bán (CP)</td>
					<td>Giá</td>
				</tr>
				<tr>
					<td class="symbol" align="center"><a
						href="http://vnstockgame.com/company/detail/symbol/VHG"
						>VHG</a></td>
					<td align="right">46,100</td>
					<td align="right">413,900</td>
					<td align="right"><span class="priceChangeUpIcon">9,6</span></td>
				</tr>
				<tr class="rowDark">
					<td class="symbol" align="center"><a
						href="#"
						>PVX</a></td>
					<td align="right">68,000</td>
					<td align="right">214,830</td>
					<td align="right"><span class="priceChangeUpIcon">4,7</span></td>
				</tr>
				<tr>
					<td class="symbol" align="center"><a
						href="#"
						>ASP</a></td>
					<td align="right">40,000</td>
					<td align="right">103,810</td>
					<td align="right"><span class="priceChangeNormalIcon">7,6</span></td>
				</tr>
				<tr class="rowDark">
					<td class="symbol" align="center"><a
						href="#"
						>ITA</a></td>
					<td align="right">11,000</td>
					<td align="right">101,660</td>
					<td align="right"><span class="priceChangeUpIcon">7,9</span></td>
				</tr>
				<tr>
					<td class="symbol" align="center"><a
						href="#"
						>KLF</a></td>
					<td align="right">68,650</td>
					<td align="right">1,000</td>
					<td align="right"><span class="priceChangeUpIcon">12,4</span></td>
				</tr>
			</tbody>
		</table>
	</li>
	<li id="quickMemberShareWrapper" class="marginB20">
		<h4 class="gTitle">Theo Dõi Giao Dịch Nhà Đầu Tư</h4>
		<div id="quickMemberShare">
			<table class="tblGray tradeShareList">
				<tbody>
					<tr>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="loupnl">loupnl</span>  
						</td>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/f_avatar.png'); ?>"></span>
							<span class="linkBold" title="vuthaoly">vuthaoly</span>  
						</td>
					</tr>
					<tr class="rowDark">
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="phuloivan2014">phuloivan2014</span>
							
						</td>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/f_avatar.png'); ?>"></span>
							<span class="linkBold" title="big_big_eyes">big_big_eyes</span>  
						</td>
					</tr>
					<tr>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="dmlocdc01@gmail.com">dmlocdc01@gmail.com</span>
							
						</td>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/538767e2312e3.jpg'); ?>"></span>
							<span class="linkBold" title="thuhuyen2378">thuhuyen2378</span>  
						</td>
					</tr>
					<tr class="rowDark">
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="trieuduykg">trieuduykg</span> 
						</td>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="zencozhang">zencozhang</span> 
						</td>
					</tr>
					<tr>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/f_avatar.png'); ?>"></span>
							<span class="linkBold" title="camlai">camlai</span>  
						</td>
						<td><span class="avatar"><img src="<?php echo base_url('src/front/m_avatar.png'); ?>"></span>
							<span class="linkBold" title="Phuoc13050206">Phuoc13050206</span>
							
						</td>
					</tr>
				</tbody>
			</table>
			 
		</div>
	</li>
 
</ul>
<?php else:?>

<ul>
	<li class="awardInfo">
		<h3>Giải thưởng đang là</h3>
		<h1>6.774.000 đ</h1>
		<h3>vẫn tiếp tục tăng...</h3> <a
		href="#"
		 class="btnRegisterNow">Đăng ký</a>
	</li>
	<li>
		<div class="boxNoticeSmall marginT10 marginB10">
			<span class="noticeIcon">&nbsp;</span>
			<h3>Thông báo thời gian vòng thi ATCK tháng 07/2014</h3>
			<br> <span style="color: #0000FF;">Vòng thi đấu Anh Tài Chứng Khoán
				mới bắt đầu từ ngày </span><span style="color: #FF0000;"><strong>01/07/2014
					và sẽ kết thúc vào ngày 30/09/2014</strong>.</span><br> <span
				style="color: #0000FF;">Có một số thay đổi trong vòng chơi này là số
				tiền kích hoạt vòng chơi là 50,000 đ/lần qua Ngânluong.vn hoặc thẻ
				cào điện thoại. Lí do của thay đổi là nâng chất lượng giải thưởng
				cao hơn, trang trải chi phí máy chủ và dữ liệu của website, đồng
				thời BTC sẽ quảng bá website thêm&nbsp;<br> Ngoài các thứ hạng 01,
				02 và 03. BTC cũng sẽ tăng thêm các giải khuyến khích mỗi giải
				200.000đ cho các bạn đạt thứ hạng từ 04 đến 10. Giá trị giải thưởng
				vẫn đang tiếp tục tăng từng ngày và bạn có thể theo dõi trên trang
				chủ của Vnstockgame.

			</span>
			<div style="text-align: right;">
				<strong>BTC Vnstockgame</strong>
			</div>
		</div>
	</li>
	<li class="winnerList">
		<h4>Danh sách đoạt giải tháng 06/2014</h4>
		<div>
			Giải nhất: 8.220.000đ<span> haqn577</span>
		</div>

		<div>
			Giải nhì: 4.930.000đ<span> hotuan</span>
		</div>

		<div>
			Giải ba: 3.280.000đ<span> dinhmenh38</span>
		</div>
	</li>
	<li class="adsHome"><object visibility="visible"
			data="<?php echo base_url('src/front/'); ?>/index_files/alpari_formulaFX_new_200x270.swf"
			type="application/x-shockwave-flash" height="270" width="200">
			<param name="movie"
				value="http://alpari.ru/static/interface/flash/lk-banners/new/en/alpari_formulaFX_new_200x270.swf?">

			<param value="transparent" name="wmode">

		</object></li>
	<li class="vngStatistic">
		<h4>Hiện đang có</h4>
		<ul>
			<li class="statisticMemberTotal"><span>132,981: </span>Thành viên</li>
			<li class="statisticVisitor"><span>6,251,359: </span>Lượt truy cập</li>
			<li class="statisticOnline"><span>5: </span>Đang truy cập</li>
			<!--<li class="statisticJoinGame"><span>136: </span>Kích hoạt trò chơi</li>!-->
		</ul>
	</li>
</ul>

<?php endif;?>