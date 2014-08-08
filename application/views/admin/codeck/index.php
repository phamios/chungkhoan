<div class="row-fluid">
	<!-- .inner -->
	<div class="span12 inner">
		<!--Begin Datatables-->
		<div class="row-fluid">
			<div class="span12">
				<div class="box">
					<header>
						<div class="icons">
							<i class="icon-move"></i>
						</div>
						<h5>Danh sách Mã chứng khoán - <a href="<?php echo site_url('admincp/codeck/index/1')?>">HOSE</a> | <a href="<?php echo site_url('admincp/codeck/index/0')?>">HNX</a></h5>
					</header>
					<div id="collapse4" class="body">
						 <table class="hsx">
<thead>
<tr>
    <th id="sto" class="sto" rowspan="2" colspan="3">Chứng<br>khoán</th>
    <th id="ref" class="ref" rowspan="2">Giá TC</th>
    <th id="cei" class="cei" rowspan="2">Trần</th>
    <th id="flo" class="flo" rowspan="2">Sàn</th>
    <th id="bid" colspan="6">Mua</th>
    <th id="mat" colspan="3">Khớp lệnh</th>
    <th id="ask" colspan="6">Bán</th>
    <th id="pht" colspan="4">Lịch sử giá</th>
    <th id="fbu" class="fbu" rowspan="2">NN Mua</th>
</tr>
<tr>
    <th id="bp3" class="bp3">Giá 3</th>
    <th id="bv3" class="bv3">KL 3</th>
    <th id="bp2" class="bp2">Giá 2</th>
    <th id="bv2" class="bv2">KL 2</th>
    <th id="bp1" class="bp1">Giá 1</th>
    <th id="bv1" class="bv1">KL 1</th>

    <th id="mpr" class="mpr">Giá</th>
    <th id="mtv" class="mtv">Tổng KL</th>
    <th id="mch" class="mch">T Đổi</th>

    <th id="sp1" class="sp1">Giá 1</th>
    <th id="sv1" class="sv1">KL 1</th>
    <th id="sp2" class="sp2">Giá 2</th>
    <th id="sv2" class="sv2">KL 2</th>
    <th id="sp3" class="sp3">Giá 3</th>
    <th id="sv3" class="sv3">KL 3</th>
    
    <th id="pho" class="pho">Mở</th>
    <th id="phh" class="phh">Cao</th>
    <th id="phl" class="phl">Thấp</th>
    <th id="pha" class="pha">BQ</th>
</tr>
</thead>
<tbody id="fix"></tbody>
</table>
<div class="scroll" id="scroll_div" style="height: 452px;">
    <table class="hsx" id="scroll_tab">
    <thead>
        <tr class="emp">
            <th class="sto"></th>
            <th class="sym"></th>
            <th class="img"></th>
            <th class="ref"></th>
            <th class="cei"></th>
            <th class="flo"></th>
            <th class="bp3"></th>
            <th class="bv3"></th>
            <th class="bp2"></th>
            <th class="bv2"></th>
            <th class="bp1"></th>
            <th class="bv1"></th>
            <th class="mpr"></th>
            <th class="mtv"></th>
            <th class="mch"></th>
            <th class="sp1"></th>
            <th class="sv1"></th>
            <th class="sp2"></th>
            <th class="sv2"></th>
            <th class="sp3"></th>
            <th class="sv3"></th>
            <th class="pho"></th>
            <th class="phh"></th>
            <th class="phl"></th>
            <th class="pha"></th>
            <th class="fbu"></th>
        </tr>
        </thead>
        <tbody id="scroll">
        <?php if($list_code <> null):?>  
        <?php foreach($list_code as $code):?>      
        <tr>
<td onclick="add(this.innerHTML);" class="c11"><?php echo $code->name?></td>
<td class="c21"><?php echo $code->col1?></td>
<td class="c31d"><?php echo $code->col2?></td>
<td class="c41"><?php echo $code->col3?></td>
<td class="c41"><?php echo $code->col4?></td>
<td class="c41"><?php echo $code->col5?></td>
<td class="c51d"><?php echo $code->col6?></td>
<td class="c51"><?php echo $code->col7?></td>
<td class="c51d"><?php echo $code->col8?></td>
<td class="c51"><?php echo $code->col9?></td>
<td class="c51d"><?php echo $code->col10?></td>
<td class="c51"><?php echo $code->col11?></td>
<td class="c61d"><?php echo $code->col12?></td>
<td class="c61"><?php echo $code->col13?></td>
<td class="c61d"><?php echo $code->col14?></td>
<td class="c51d"><?php echo $code->col15?></td>
<td class="c51"><?php echo $code->col16?></td>
<td class="c51d"><?php echo $code->col16?></td>
<td class="c51"><?php echo $code->col18?></td>
<td class="c51u"><?php echo $code->col19?></td>
<td class="c51"><?php echo $code->col20?></td>
<td class="c61d"><?php echo $code->col21?></td>
<td class="c61d"><?php echo $code->col22?></td>
<td class="c61d"><?php echo $code->col23?></td>
<td class="c61d"><?php echo $code->col24?></td>
<td class="c61"><?php echo $code->col25?></td> 
</tr>
<?php endforeach;?>
<?php endif;?>
</tbody>
        </table>
</div>
					</div>
				</div>
			</div>
		</div>
		<!--End Datatables-->