  
<div class="row-fluid">
    <div class="span12">
        <div class="box dark">
            <header>
                <div class="icons"><i class="icon-edit"></i></div>
                <h5>Thêm Cate</h5>
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
                <div class="form-horizontal">
                    <div class="control-group">
                        <label for="text1" class="control-label">Điền mã sàn:</label>

                        <div class="controls with-tooltip">
                            <input type="text" id="txt_message" class="span6 input-tooltip"
                                   name="txt_message" data-placement="bottom"/>
                                   <br/> (HOSE / HNX)
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Tiến trình: </label>

                        <div class="controls">
                            <div class="div_processing"></div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">   
                                <div id="loading"> 
                                    <img src="<?php echo base_url('src/loading.gif');?>" width="30px" /> Đại ca đợi tí, em đang xử lý ...
                                </div>
                                <div id="finish"> 
                                    Xong rồi đại ca ơi ^ ^ !
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions"> 
                        <input type="submit" class="btn btn-primary" value="Cập nhật " onclick="sendsms()" /> 
                    </div>
                </div>
            </div>
            <!--END TEXT INPUT FIELD-->
