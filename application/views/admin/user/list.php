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
						<h5>Danh sách Thành Viên hệ thống</h5>
					</header>
					<div id="collapse4" class="body">
						<table id="dataTable"
							class="table table-bordered table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên user</th>
									<th>Loại user</th>
									<th>Ngày đăng ký</th>
									<th>Balance</th>
									<th>Điện thoại</th>
									<th>Email</th> 
									<th>Trạng thái</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
                        <?php if ($list_users <> null): ?>
                        <?php foreach($list_users as $codeck):?>
                            <tr>
									<td><?php echo $codeck->id ?></td>
									<td><?php echo $codeck->member_name ?></td>
									<td><?php echo $codeck->member_type ?></td>
									<td><?php echo $codeck->member_created ?></td>
									<td><?php echo $codeck->member_balance ?></td>
									<td><?php echo $codeck->member_phone ?></td>
									<td><?php echo $codeck->member_email ?></td> 
									<td>
                                    <?php if ($codeck->member_status == 1): ?>
                                        <a href="#">Đang hoạt động</a>
                                    <?php else: ?>
                                        <a href="#">Dừng hoạt động</a>
                                    <?php endif; ?>
 									</td>
									<td><a
										href="<?php echo site_url('admincp/codeck/update_codeck/'.$codeck->id)?>"><i
											class="icon-edit bigger-120"></i></a> <a
										href="<?php echo site_url('admincp/codeck/del_codeck/'.$codeck->id)?>"><i
											class="icon-trash bigger-120"></i></a></td>
								</tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                                                </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--End Datatables-->