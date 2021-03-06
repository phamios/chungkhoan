<div class="row-fluid">
         <div class="span12">
             <div class="box dark">
                 <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>Chỉnh sửa tin</h5>
                     <!-- .toolbar -->
                     <div class="toolbar">
                         <ul class="nav">
                             <li>
                                 <a class="accordion-toggle minimize-box" data-toggle="collapse" href="#div-1">
                                     <i class="icon-chevron-up"></i>
                                 </a>
                             </li>
                         </ul>
                     </div>
                     <!-- /.toolbar -->
                 </header>
                 <div id="div-1" class="accordion-body collapse in body">
                     
                        <?php if ($groups <> null): ?>
                        <?php foreach ($groups as $group): ?>
                        <?php echo form_open_multipart('admincp/group/update_group/'.$group->id,array('class'=>'form-horizontal')); ?>
                         <div class="control-group">
                             <label for="text1" class="control-label">Tên nhóm</label>

                             <div class="controls with-tooltip">
                                 <input type="text"  class="span6 input-tooltip"
                                        name="group_name" data-placement="bottom"
                                        value="<?php echo $group->group_name?>"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Loại Nhóm</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="group_type" data-placement="bottom"
                                        value="<?php echo $group->group_type?>"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Miêu tả</label>

                             <div class="controls with-tooltip">
                                 <textarea   class="span6 input-tooltip"
                                        name="group_desc" data-placement="bottom"
                                        cols="30" rows="16"  ><?php echo $group->group_desc?></textarea>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Min Balance</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="group_min_balance" data-placement="bottom"
                                        value="<?php echo $group->group_min_balance?>"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Ngày hết hạn</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="group_expired" data-placement="bottom"
                                        value="<?php echo $group->group_expired?>"/> (Số ngày tính từ ngày tạo)
                             </div>
                         </div>

                         <div class="row-fluid">
                             <div class="span6">
                                 <div class="control-group">   
                                     <label class="control-label">Trạng thái</label>
                                     <div class="controls">        
                                         <?php if ($group->group_active == 1): ?>
                                         <label>
                                             <input class="uniform" type="radio" value="1" name="active" checked> Kích hoạt
                                         </label>
                                         <label>
                                             <input class="uniform" type="radio" value="0" name="active"> Không kích hoạt
                                         </label>
                                         <?php else: ?>
                                         <label>
                                             <input class="uniform" type="radio" value="1" name="active"> Kích hoạt
                                         </label>
                                         <label>
                                             <input class="uniform" type="radio" value="0" name="active" checked> Không kích hoạt
                                         </label>
                                         <?php endif ?>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="form-actions">
                             <input type="submit" value="Cập nhật" name="submit" class="btn btn-primary">
                         </div>
                      <?php echo form_close(); ?>
				<?php endforeach ?>
				<?php endif ?>
                 </div>
          <!--END TEXT INPUT FIELD-->
