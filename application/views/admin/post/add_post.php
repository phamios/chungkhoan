<script src="http://tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
        selector: "textarea",
        plugins: [
                "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons template textcolor paste fullpage textcolor"
        ],

        toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",

        menubar: true,
        toolbar_items_size: 'small',

        style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
        ],

        
});</script>

<div class="row-fluid">
         <div class="span12">
             <div class="box dark">
                 <header>
                     <div class="icons"><i class="icon-edit"></i></div>
                     <h5>Thêm mới tin</h5>
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
                     
                        <?php echo form_open_multipart('admincp/post/add_post',array('class'=>'form-horizontal')); ?>
                         <div class="control-group">
                             <label for="text1" class="control-label">Tiêu đề</label>

                             <div class="controls with-tooltip">
                                 <input type="text" id="text1" class="span6 input-tooltip"
                                        name="post_title" data-placement="bottom"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label class="control-label">Danh sách cate</label>

                             <div class="controls">
                                 <select name="cateid" class="validate[required]">
                                     <option value=""></option>
                                     <?php foreach ($cates as $cate): ?>
                                        <option value="<?php echo $cate->id ?>"><?php echo ucfirst($cate->cate_name) ?></option>
                                     <?php endforeach ?>
                                 </select>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Ảnh minh họa</label>

                             <div class="controls with-tooltip">
                                 <input type="file" id="text1" class="span6 input-tooltip"
                                        name="post_image" size=40 data-placement="bottom"/>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Miêu tả</label>

                             <div class="controls with-tooltip">
                                 <textarea class="span6 input-tooltip"
                                        name="post_short" data-placement="bottom"
                                        cols="30" rows="4" ></textarea>
                             </div>
                         </div>

                         <div class="control-group">
                             <label for="text1" class="control-label">Nội dung</label>

                             <div class="controls with-tooltip">
                                 <textarea   class="span6 input-tooltip"
                                        name="post_content" data-placement="bottom"
                                        cols="30" rows="16"  ></textarea>
                             </div>
                         </div>

                         <div class="row-fluid">
                             <div class="span6">
                                 <div class="control-group">   
                                     <label class="control-label">Trạng thái</label>
                                     <div class="controls">        
                                         <label>
                                             <input class="uniform" type="radio" value="1" name="active" checked> Kích hoạt
                                         </label>
                                         <label>
                                             <input class="uniform" type="radio" value="0" name="active" > Không kích hoạt
                                         </label>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="form-actions">
                             <input type="submit" value="Đồng ý" name="submit" class="btn btn-primary">
                         </div>
                      <?php echo form_close(); ?>
                 </div>
          <!--END TEXT INPUT FIELD-->
