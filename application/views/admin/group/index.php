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
						<h5>Danh sách Group của hệ thống</h5>
					</header>
					<div id="collapse4" class="body">
						<table id="dataTable"
							class="table table-bordered table-condensed table-hover table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên group</th>
									<th>Loại group</th>
									<th>Mô tả</th>
									<th>Min balance</th>
									<th>Ngày tạo</th>
									<th>Ngày hết hạn</th> 
									<th>Trạng thái</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
                        <?php if ($groups <> null): ?>
                        <?php foreach($groups as $g):?>
                            <tr>
									<td><?php echo $g->id ?></td>
									<td><?php echo $g->group_name ?></td>
									<td><?php echo $g->group_type ?></td>
									<td><?php echo $g->group_desc ?></td>
									<td><?php echo $g->group_min_balance ?></td>
									<td><?php echo $g->group_created ?></td>
									<td><?php echo date('Y-m-d h:i:s',strtotime($g->group_created . ' +' . $g->group_expired . ' days'))?></td> 
									<td>
                                    <?php if ($g->group_active == 1): ?>
                                        <a href="#">Đang hoạt động</a>
                                    <?php else: ?>
                                        <a href="#">Dừng hoạt động</a>
                                    <?php endif; ?>
 									</td>
									<td><a
										href="<?php echo site_url('admincp/group/update_group/'.$g->id)?>"><i
											class="icon-edit bigger-120"></i></a> <a
										href="<?php echo site_url('admincp/group/del_group/'.$g->id)?>"><i
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
