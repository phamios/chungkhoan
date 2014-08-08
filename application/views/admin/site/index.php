<div class="row-fluid">
         <div class="span12">
             <div class="box dark">
                 <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>Cấu hình site</h5>
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
                     
                        <?php if ($site_info <> null): ?>
                        <?php foreach ($site_info as $site): ?>
                        <?php echo form_open_multipart('admincp/site/update_info/'.$site->id,array('class'=>'form-horizontal')); ?>
                         
                         <div class="control-group">
                             <label for="text1" class="control-label">Tên site</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="sitename" data-placement="bottom"
                                        value="<?php echo $site->site_name?>"/>
                             </div>
                         </div>
                         
                         <div class="control-group">
                             <label for="text1" class="control-label">Giới thiệu</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="sitedes" data-placement="bottom"
                                        value="<?php echo $site->site_des?>"/>
                             </div>
                         </div>
                         
                         
                         <div class="control-group">
                             <label for="text1" class="control-label">Footer</label>

                             <div class="controls with-tooltip">
                                
                                  <textarea rows="5" cols="10" name="sitefooter"><?php echo $site->site_footer?></textarea>
                             </div>
                         </div>
                         

                          
                          <div class="form-actions">
                             <input type="submit" value="Đồng ý" name="submit" class="btn btn-primary">
                         </div>
                      <?php echo form_close(); ?>
<?php endforeach ?>
<?php endif ?>
                 </div>
          <!--END TEXT INPUT FIELD-->
