<div id="_bodyBlock" class="bodyWrapper">
			<?php if($this->session->userdata('user_id') != null):?>
			<div id="_toolbarWrapper" style="display: block;">
		<div class="toolbarWrapper">
			<ul class="toolbar">
				<li class="dashboard"><a href="<?php echo site_url('home/stock');?>"  >Bảng Tóm Tắt</a></li>
				<li class="league"><a href="<?php echo site_url('home/team');?>"  >Nhóm Thi Đấu</a></li>
				<li class="order"><a href="<?php echo site_url('home/order');?>"  >Đặt Lệnh</a></li>
				<li class="portfolio"><a href="<?php echo site_url('home/history');?>" >Danh Mục Đầu Tư</a></li>
				<li class="financeChart"><a href="#" >Phân Tích Kỹ Thuật</a></li>
				<li class="profileWrapper clearfix">
					<a href="<?php echo site_url('home/profile');?>" class="profile"  >Trang cá nhân</a>
					<a href="<?php echo site_url('home/logout');?>" class="logout"  >Thoát</a>
				</li>
			</ul>
		</div>
		<div class="symbolSearch barYellow clearfix">
	<ul class="clearfix">
		<li class="floatRight"> 
				<ul class="clearfix">
					<li class="searchBy">
						<input id="gSearchBy" name="gSearchBy" value="0" checked="checked" onchange="Utility.switchDisplay({show:'gSymbol',hide:'gIndustryId,gFromPrice,gToPrice'})" type="radio">Mã Chứng khoán
						<span><input id="gSearchBy" name="gSearchBy" value="1" onchange="Utility.switchDisplay({show:'gFromPrice,gToPrice',hide:'gSymbol,gIndustryId'})" type="radio">Giá</span>
						<input id="gSearchBy" name="gSearchBy" value="2" onchange="Utility.switchDisplay({show:'gIndustryId',hide:'gSymbol,gFromPrice,gToPrice'})" type="radio">Nhóm ngành
					</li>
					<li class="searchItem">
						<ul class="clearfix">
							<li><h4>Tìm kiếm</h4></li>
							<li>
								<input id="gSymbol" name="gSymbol" class="inputBig" onfocus="if(this.value=='Ví dụ: AAM,FPT,REE')this.value=''" onblur="if(Utility.isEmpty(this.value))this.value='Ví dụ: AAM,FPT,REE'" onkeyup="if(event.keyCode == 13) $('gCmdSearch').onclick();" type="text">
								<input id="gFromPrice" name="gFromPrice" value="Giá từ(nghìn đồng)" maxlength="4" class="searchFromPrice inputBig" style="display:none" onfocus="if(this.value=='Giá từ(nghìn đồng)')this.value=''" onblur="if(Utility.isEmpty(this.value))this.value='Giá từ(nghìn đồng)'" onkeyup="Utility.inputMask(this, '0-9.');if(event.keyCode == 13) $('gCmdSearch').onclick();" type="text"><input id="gToPrice" name="gToPrice" value="Đến(nghìn đồng)" maxlength="4" class="searchToPrice inputBig" style="display:none" onfocus="if(this.value=='Đến(nghìn đồng)')this.value=''" onblur="if(Utility.isEmpty(this.value))this.value='Đến(nghìn đồng)'" onkeyup="Utility.inputMask(this, '0-9.');if(event.keyCode == 13) $('gCmdSearch').onclick();" type="text">
								<select id="gIndustryId" name="gIndustryId" class="selectBig" style="display:none"><option selected="selected" value="0">Tất cả</option><option label="Bán lẻ Thực phẩm &amp; Dược phẩm" value="94">Bán lẻ Thực phẩm &amp; Dược phẩm</option>
										<option label="Bảo hiểm nhân thọ" value="95">Bảo hiểm nhân thọ</option>
										<option label="Bảo hiểm phi nhân thọ" value="96">Bảo hiểm phi nhân thọ</option>
										<option label="Bất động sản" value="97">Bất động sản</option>
										<option label="Công nghệ Phần mềm &amp; Dịch vụ tin học " value="98">Công nghệ Phần mềm &amp; Dịch vụ tin học </option>
										<option label="Các dịch vụ hỗ trợ" value="99">Các dịch vụ hỗ trợ</option>
										<option label="Các ngành Công nghiệp chung" value="100">Các ngành Công nghiệp chung</option>
										<option label="Công nghiệp cơ khí/Công nghiệp sản xuất máy" value="101">Công nghiệp cơ khí/Công nghiệp sản xuất máy</option>
										<option label="Công nghiệp vận tải" value="102">Công nghiệp vận tải</option>
										<option label="Đại lý bán lẻ" value="103">Đại lý bán lẻ</option>
										<option label="Dịch vụ tài chính" value="104">Dịch vụ tài chính</option>
										<option label="Dịch vụ viễn thông cố định" value="105">Dịch vụ viễn thông cố định</option>
										<option label="Dịch vụ viễn thông di động" value="106">Dịch vụ viễn thông di động</option>
										<option label="Điện" value="153">Điện</option>
										<option label="Đồ dùng cá nhân" value="107">Đồ dùng cá nhân</option>
										<option label="Đồ gia dụng" value="108">Đồ gia dụng</option>
										<option label="Đồ uống" value="109">Đồ uống</option>
										<option label="Du lịch &amp; Giải trí" value="131">Du lịch &amp; Giải trí</option>
										<option label="Dược phẩm &amp; Công nghệ sinh học" value="132">Dược phẩm &amp; Công nghệ sinh học</option>
										<option label="Gas, nước &amp; công ty dịch vụ tiện ích đa ngành" value="133">Gas, nước &amp; công ty dịch vụ tiện ích đa ngành</option>
										<option label="Giấy &amp; các chế phẩm từ gỗ" value="134">Giấy &amp; các chế phẩm từ gỗ</option>
										<option label="Hàng không &amp; Quốc phòng" value="135">Hàng không &amp; Quốc phòng</option>
										<option label="Hoá chất" value="136">Hoá chất</option>
										<option label="Khai khoáng" value="137">Khai khoáng</option>
										<option label="Kim loại công nghiệp" value="138">Kim loại công nghiệp</option>
										<option label="Ngân hàng" value="139">Ngân hàng</option>
										<option label="Nuôi trồng &amp; Chế biến thực phẩm" value="140">Nuôi trồng &amp; Chế biến thực phẩm</option>
										<option label="Ô tô &amp; phụ tùng" value="141">Ô tô &amp; phụ tùng</option>
										<option label="Phần cứng và thiết bị phần cứng" value="142">Phần cứng và thiết bị phần cứng</option>
										<option label="Quỹ đầu tư đóng" value="143">Quỹ đầu tư đóng</option>
										<option label="Quỹ đầu tư mở" value="144">Quỹ đầu tư mở</option>
										<option label="Sản xuất dầu khí" value="145">Sản xuất dầu khí</option>
										<option label="Thiết bị &amp; Dịch vụ y tế" value="146">Thiết bị &amp; Dịch vụ y tế</option>
										<option label="Thiết bị điện &amp; điện tử" value="147">Thiết bị điện &amp; điện tử</option>
										<option label="Thiết bị giải trí" value="148">Thiết bị giải trí</option>
										<option label="Thiết bị, dịch vụ và phân phối dầu khí" value="149">Thiết bị, dịch vụ và phân phối dầu khí</option>
										<option label="Thuốc lá" value="150">Thuốc lá</option>
										<option label="Truyền thông" value="151">Truyền thông</option>
										<option label="Xây dựng &amp; Vật liệu xây dựng" value="152">Xây dựng &amp; Vật liệu xây dựng</option>
								</select>						
							</li>
							<li><input id="gCmdSearch" value="Tìm" class="btnMedium"   type="button"></li>
						</ul>
					</li>
				</ul> 
		</li>
		<li class="smallAwardInfo">
			<h3>Giải thưởng nhóm thi đấu ATCK hiện đang là</h3>
			<h1 id="_awardAmount">7.219.000 đ</h1>
			<h4>và vẫn tiếp tục tăng mỗi ngày...</h4>
		</li>
</ul></div>	</div>


			<?php else:?>
			
			
			<div class="vngIntroWrapper">
				<div id="vngIntro" class="vngIntro">
					<h1 class="vng">
						<span><cufon style="width: 30px; height: 26px;" alt="VN"
								class="cufon cufon-canvas">
							<canvas
								style="width: 38px; height: 39px; top: -11px; left: -1px;"
								height="39" width="38"></canvas>
							<cufontext>VN</cufontext></cufon></span>
						<cufon style="width: 173px; height: 26px;" alt="stockgame.com" class="cufon cufon-canvas">
						<canvas style="width: 176px; height: 39px; top: -11px; left: -1px;" height="39" width="176"></canvas>
						<cufontext>stockgame.com</cufontext></cufon>
					</h1>
					<h1>
						<cufon style="width: 48px; height: 26px;" alt="Sàn "
							class="cufon cufon-canvas">
						<canvas style="width: 66px; height: 39px; top: -11px; left: -1px;"
							height="39" width="66"></canvas>
						<cufontext>Sàn </cufontext></cufon>
						<cufon style="width: 73px; height: 26px;" alt="chứng "
							class="cufon cufon-canvas">
						<canvas style="width: 91px; height: 39px; top: -11px; left: -1px;"
							height="39" width="91"></canvas>
						<cufontext>chứng </cufontext></cufon>
						<cufon style="width: 73px; height: 26px;" alt="khoán "
							class="cufon cufon-canvas">
						<canvas style="width: 91px; height: 39px; top: -11px; left: -1px;"
							height="39" width="91"></canvas>
						<cufontext>khoán </cufontext></cufon>
						<cufon style="width: 33px; height: 26px;" alt="ảo "
							class="cufon cufon-canvas">
						<canvas style="width: 51px; height: 39px; top: -11px; left: -1px;"
							height="39" width="51"></canvas>
						<cufontext>ảo </cufontext></cufon>
						<cufon style="width: 41px; height: 26px;" alt="lớn "
							class="cufon cufon-canvas">
						<canvas style="width: 58px; height: 39px; top: -11px; left: -1px;"
							height="39" width="58"></canvas>
						<cufontext>lớn </cufontext></cufon>
						<cufon style="width: 54px; height: 26px;" alt="nhất "
							class="cufon cufon-canvas">
						<canvas style="width: 72px; height: 39px; top: -11px; left: -1px;"
							height="39" width="72"></canvas>
						<cufontext>nhất </cufontext></cufon>
						<cufon style="width: 47px; height: 26px;" alt="Việt "
							class="cufon cufon-canvas">
						<canvas style="width: 65px; height: 39px; top: -11px; left: -1px;"
							height="39" width="65"></canvas>
						<cufontext>Việt </cufontext></cufon>
						<cufon style="width: 50px; height: 26px;" alt="Nam"
							class="cufon cufon-canvas">
						<canvas style="width: 54px; height: 39px; top: -11px; left: -1px;"
							height="39" width="54"></canvas>
						<cufontext>Nam</cufontext></cufon>
					</h1>
					<ul class="vngFeature">
						<li>Đầy đủ các thông tin tài chính, chứng khoán</li>
						<li>Công cụ thực hành chứng khoán dành cho các sinh viên, nhà đầu
							tư</li>
						<li>Thoả sức đầu tư, sở hữu cổ phiếu, kiếm được tiền thật thông
							qua các giải thưởng</li>
						<li>Cơ hội nhận được các giải thưởng có giá trị do VNstockgame tổ
							chức thường xuyên</li>
					</ul>
				</div>
			</div> 
			 <?php endif; ?>
			<div class="body bodyNoBg">
				<ul class="homeLayout clearfix">
					<li class="leftColumn">
					 <?php if ($this->router->fetch_method() == 'index'): ?>
                            <?php $this->load->view('front/default');?>
                        <?php endif; ?>
					 <?php if ($this->router->fetch_method() == 'register'): ?>
                            <?php $this->load->view('front/register');?>
                        <?php endif; ?>	
                                        
					<?php if ($this->router->fetch_method() == 'profile'): ?>
			             <?php $this->load->view('front/profile');?>
			         <?php endif; ?>  
			         <?php if ($this->router->fetch_method() == 'update_profile'): ?>
			             <?php $this->load->view('front/update_profile');?>
			         <?php endif; ?>  
			         
			         <?php if ($this->router->fetch_method() == 'order'): ?>
			             <?php $this->load->view('front/order');?>
			         <?php endif; ?>  
			         
			         
			         
					</li>
					
					<li class="rightColumn">
					 <?php if ($this->router->fetch_method() == 'index'): ?>
                           <?php $this->load->view('front/widget/sidebar');?> 
                        <?php endif; ?>
					 <?php if ($this->router->fetch_method() == 'register'): ?>
                          <?php $this->load->view('front/widget/info_reg');?> 
                        <?php endif; ?>	
                        
                        <?php if ($this->router->fetch_method() == 'profile'): ?>
                           <?php $this->load->view('front/widget/sidebar');?> 
                        <?php endif; ?>	
                        
                        <?php if ($this->router->fetch_method() == 'checkout'): ?>
                           <?php $this->load->view('front/widget/sidebar');?> 
                        <?php endif; ?>	
                        
                        
                        <?php if ($this->router->fetch_method() == 'update_profile'): ?>
                           <?php $this->load->view('front/widget/sidebar');?> 
                        <?php endif; ?>	
                        
                        
						
					</li>
	</ul>
</div>

		
		</div>