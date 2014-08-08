<div class="row-fluid">
         <div class="span12">
             <div class="box dark">
                 <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>Cấu hình luật chơi</h5>
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
                        <?php foreach ($rules as $rule): ?>
                        <?php echo form_open_multipart('admincp/rule/index/'.$rule->id,array('class'=>'form-horizontal')); ?>
                         <div class="control-group">
                             <label for="text1" class="control-label">Tỉ lệ %</label>

                             <div class="controls with-tooltip">
                                 <input type="text"  class="span6 input-tooltip"
                                        name="rate" data-placement="bottom"
                                        value="<?php echo $rule->rate?>"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Giờ mở cửa</label>

                             <div class="controls with-tooltip">
                                 <input type="text"  class="span6 input-tooltip"
                                        name="start_time" data-placement="bottom"
                                        value="<?php echo $rule->start_time?>"/>
                             </div>
                         </div>
                         <div class="control-group">
                             <label for="text1" class="control-label">Giờ đóng cửa</label>

                             <div class="controls with-tooltip">
                                 <input type="text"  class="span6 input-tooltip"
                                        name="end_time" data-placement="bottom"
                                        value="<?php echo $rule->end_time?>"/>
                             </div>
                         </div>
                         <div class="control-group">
                             <label for="text1" class="control-label">Chế độ rút</label>

                             <div class="controls with-tooltip">
                                 <input type="text"  class="span6 input-tooltip"
                                        name="draw_mode" data-placement="bottom"
                                        value="<?php echo $rule->draw_mode?>"/>
                             </div>
                         </div>

                         <div class="form-actions">
                             <input type="submit" value="Cập nhật" name="submit" class="btn btn-primary">
                         </div>
                      <?php echo form_close(); ?>
				<?php endforeach ?>
                 </div>
          <!--END TEXT INPUT FIELD-->
