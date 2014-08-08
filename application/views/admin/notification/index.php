<div class="row-fluid">
                        <!-- .inner -->
                        <div class="span12 inner">
                            <!--Begin Datatables-->
                            <div class="row-fluid">
                                <div class="span12">
                                    <div class="box">
                                        <header>
                                            <div class="icons"><i class="icon-move"></i></div>
                                            <h5>Danh sách cảnh báo</h5>
                                        </header>
                                        <div id="collapse4" class="body">
                                            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Tiêu đề</th>
                                                        <th>Nội dung</th>
                                                        <th>Link tùy chọn</th>
                                                        <th>Ngày tạo</th>
                                                        <th>Trạng thái</th>
                                                        <th>Tùy chọn</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                            <?php if ($listcontent <> null): ?>
                            <?php foreach ($listcontent as $row): ?>
                            <tr>
                                <td>
                                    <a href="<?php echo site_url('admincp/notification/update_notification/' . $row->id); ?>" ><?php echo $row->nof_title; ?></a>
                                </td>
                                <td>
                                   <?php echo $row->nof_content; ?> 
                                </td>
                                <td>
                                  <?php echo $row->nof_link; ?> 
                                </td>
                                <td>
                                    <?php echo $row->nof_created; ?>
                                </td>
                                <td>
                                    <?php if ($row->nof_active == 1): ?>
                                        Đang hoạt động
                                    <?php else: ?>
                                        Dừng hoạt động
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="<?php echo site_url('admincp/notification/update_notification/'.$row->id)?>"><i class="icon-edit bigger-120"></i></a>
                                    <a href="<?php echo site_url('admincp/notification/del_notification/'.$row->id)?>"><i class="icon-trash bigger-120"></i></a>
                                </td>
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

