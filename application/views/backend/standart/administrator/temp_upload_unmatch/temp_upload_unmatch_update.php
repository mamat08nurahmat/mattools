
<script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
    function domo(){
     
       // Binding keys
       $('*').bind('keydown', 'Ctrl+s', function assets() {
          $('#btn_save').trigger('click');
           return false;
       });
    
       $('*').bind('keydown', 'Ctrl+x', function assets() {
          $('#btn_cancel').trigger('click');
           return false;
       });
    
      $('*').bind('keydown', 'Ctrl+d', function assets() {
          $('.btn_save_back').trigger('click');
           return false;
       });
        
    }
    
    jQuery(document).ready(domo);
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Temp Upload Unmatch        <small>Edit Temp Upload Unmatch</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/temp_upload_unmatch'); ?>">Temp Upload Unmatch</a></li>
        <li class="active">Edit</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
            <div class="box box-warning">
                <div class="box-body ">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header ">
                            <div class="widget-user-image">
                                <img class="img-circle" src="<?= BASE_ASSET; ?>/img/add2.png" alt="User Avatar">
                            </div>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username">Temp Upload Unmatch</h3>
                            <h5 class="widget-user-desc">Edit Temp Upload Unmatch</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/temp_upload_unmatch/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_temp_upload_unmatch', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_temp_upload_unmatch', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="RowID" class="col-sm-2 control-label">RowID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="RowID" id="RowID" placeholder="RowID" value="<?= set_value('RowID', $temp_upload_unmatch->RowID); ?>">
                                <small class="info help-block">
                                <b>Input RowID</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="BatchID" class="col-sm-2 control-label">BatchID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="BatchID" id="BatchID" placeholder="BatchID" value="<?= set_value('BatchID', $temp_upload_unmatch->BatchID); ?>">
                                <small class="info help-block">
                                <b>Input BatchID</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="OPEN_DATE" class="col-sm-2 control-label">OPEN DATE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="OPEN_DATE"  placeholder="OPEN DATE" id="OPEN_DATE" value="<?= set_value('temp_upload_unmatch_OPEN_DATE_name', $temp_upload_unmatch->OPEN_DATE); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="MERCHAN_DBA_NAME" class="col-sm-2 control-label">MERCHAN DBA NAME 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MERCHAN_DBA_NAME" id="MERCHAN_DBA_NAME" placeholder="MERCHAN DBA NAME" value="<?= set_value('MERCHAN_DBA_NAME', $temp_upload_unmatch->MERCHAN_DBA_NAME); ?>">
                                <small class="info help-block">
                                <b>Input MERCHAN DBA NAME</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="STATUS_EDC" class="col-sm-2 control-label">STATUS EDC 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="STATUS_EDC" id="STATUS_EDC" placeholder="STATUS EDC" value="<?= set_value('STATUS_EDC', $temp_upload_unmatch->STATUS_EDC); ?>">
                                <small class="info help-block">
                                <b>Input STATUS EDC</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="MSO" class="col-sm-2 control-label">MSO 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="MSO" id="MSO" placeholder="MSO" value="<?= set_value('MSO', $temp_upload_unmatch->MSO); ?>">
                                <small class="info help-block">
                                <b>Input MSO</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SOURCE_CODE" class="col-sm-2 control-label">SOURCE CODE 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SOURCE_CODE" id="SOURCE_CODE" placeholder="SOURCE CODE" value="<?= set_value('SOURCE_CODE', $temp_upload_unmatch->SOURCE_CODE); ?>">
                                <small class="info help-block">
                                <b>Input SOURCE CODE</b> Max Length : 255.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="POS1" class="col-sm-2 control-label">POS1 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="POS1" id="POS1" placeholder="POS1" value="<?= set_value('POS1', $temp_upload_unmatch->POS1); ?>">
                                <small class="info help-block">
                                <b>Input POS1</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="WILAYAH" class="col-sm-2 control-label">WILAYAH 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="WILAYAH" id="WILAYAH" placeholder="WILAYAH" value="<?= set_value('WILAYAH', $temp_upload_unmatch->WILAYAH); ?>">
                                <small class="info help-block">
                                <b>Input WILAYAH</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="CHANNEL" class="col-sm-2 control-label">CHANNEL 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="CHANNEL" id="CHANNEL" placeholder="CHANNEL" value="<?= set_value('CHANNEL', $temp_upload_unmatch->CHANNEL); ?>">
                                <small class="info help-block">
                                <b>Input CHANNEL</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TYPE_MID" class="col-sm-2 control-label">TYPE MID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TYPE_MID" id="TYPE_MID" placeholder="TYPE MID" value="<?= set_value('TYPE_MID', $temp_upload_unmatch->TYPE_MID); ?>">
                                <small class="info help-block">
                                <b>Input TYPE MID</b> Max Length : 100.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="IS_VALID" class="col-sm-2 control-label">IS VALID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="IS_VALID" id="IS_VALID" placeholder="IS VALID" value="<?= set_value('IS_VALID', $temp_upload_unmatch->IS_VALID); ?>">
                                <small class="info help-block">
                                <b>Input IS VALID</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                        
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                            <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a>
                            <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
      
             
      $('#btn_cancel').click(function(){
        swal({
            title: "Are you sure?",
            text: "the data that you have created will be in the exhaust!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No!",
            closeOnConfirm: true,
            closeOnCancel: true
          },
          function(isConfirm){
            if (isConfirm) {
              window.location.href = BASE_URL + 'administrator/temp_upload_unmatch';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_temp_upload_unmatch = $('#form_temp_upload_unmatch');
        var data_post = form_temp_upload_unmatch.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_temp_upload_unmatch.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#temp_upload_unmatch_image_galery').find('li').attr('qq-file-id');
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            $('.data_file_uuid').val('');
    
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
       
       
           
    
    }); /*end doc ready*/
</script>