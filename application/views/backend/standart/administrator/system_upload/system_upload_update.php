
<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>
<?php $this->load->view('core_template/fine_upload'); ?>
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
        System Upload        <small>Edit System Upload</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/system_upload'); ?>">System Upload</a></li>
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
                            <h3 class="widget-user-username">System Upload</h3>
                            <h5 class="widget-user-desc">Edit System Upload</h5>
                            <hr>
                        </div>
                        <?= form_open(base_url('administrator/system_upload/edit_save/'.$this->uri->segment(4)), [
                            'name'    => 'form_system_upload', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_upload', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="upload_date" class="col-sm-2 control-label">Upload Date 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datepicker" name="upload_date"  placeholder="Upload Date" id="upload_date" value="<?= set_value('system_upload_upload_date_name', $system_upload->upload_date); ?>">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div>
                       
                                                 
                                                <div class="form-group ">
                            <label for="upload_remark" class="col-sm-2 control-label">Upload Remark 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <textarea id="upload_remark" name="upload_remark" rows="10" cols="80"> <?= set_value('upload_remark', $system_upload->upload_remark); ?></textarea>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="source" class="col-sm-2 control-label">Source 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="source" id="source" data-placeholder="Select Source" >
                                    <option value=""></option>
                                    <option <?= $system_upload->source == "MISMER" ? 'selected' :''; ?> value="MISMER">MISMER</option>
                                    <option <?= $system_upload->source == "UNMATCH_MISMER" ? 'selected' :''; ?> value="UNMATCH_MISMER">UNMATCH_MISMER</option>
                                    </select>
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="file_path" class="col-sm-2 control-label">File Path 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <div id="system_upload_file_path_galery"></div>
                                <input class="data_file data_file_uuid" name="system_upload_file_path_uuid" id="system_upload_file_path_uuid" type="hidden" value="<?= set_value('system_upload_file_path_uuid'); ?>">
                                <input class="data_file" name="system_upload_file_path_name" id="system_upload_file_path_name" type="hidden" value="<?= set_value('system_upload_file_path_name', $system_upload->file_path); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>
                                                  
                                                <div class="form-group ">
                            <label for="file_size" class="col-sm-2 control-label">File Size 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="file_size" id="file_size" placeholder="File Size" value="<?= set_value('file_size', $system_upload->file_size); ?>">
                                <small class="info help-block">
                                <b>Input File Size</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="row_data_count" class="col-sm-2 control-label">Row Data Count 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="row_data_count" id="row_data_count" placeholder="Row Data Count" value="<?= set_value('row_data_count', $system_upload->row_data_count); ?>">
                                <small class="info help-block">
                                <b>Input Row Data Count</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="row_data_succeed" class="col-sm-2 control-label">Row Data Succeed 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="row_data_succeed" id="row_data_succeed" placeholder="Row Data Succeed" value="<?= set_value('row_data_succeed', $system_upload->row_data_succeed); ?>">
                                <small class="info help-block">
                                <b>Input Row Data Succeed</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="row_data_failed" class="col-sm-2 control-label">Row Data Failed 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="row_data_failed" id="row_data_failed" placeholder="Row Data Failed" value="<?= set_value('row_data_failed', $system_upload->row_data_failed); ?>">
                                <small class="info help-block">
                                <b>Input Row Data Failed</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="is_approved" class="col-sm-2 control-label">Is Approved 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="is_approved" id="is_approved" placeholder="Is Approved" value="<?= set_value('is_approved', $system_upload->is_approved); ?>">
                                <small class="info help-block">
                                <b>Input Is Approved</b> Max Length : 11.</small>
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
<script src="<?= BASE_ASSET; ?>ckeditor/ckeditor.js"></script>
<!-- Page script -->
<script>
    $(document).ready(function(){
      
      CKEDITOR.replace('upload_remark'); 
      var upload_remark = CKEDITOR.instances.upload_remark;
                   
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
              window.location.href = BASE_URL + 'administrator/system_upload';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
        $('#upload_remark').val(upload_remark.getData());
                    
        var form_system_upload = $('#form_system_upload');
        var data_post = form_system_upload.serializeArray();
        var save_type = $(this).attr('data-stype');
        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: form_system_upload.attr('action'),
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id = $('#system_upload_image_galery').find('li').attr('qq-file-id');
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
      
                     var params = {};
       params[csrf] = token;

       $('#system_upload_file_path_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/system_upload/upload_file_path_file',
              params : params
          },
          deleteFile: {
              enabled: true, // defaults to false
              endpoint: BASE_URL + '/administrator/system_upload/delete_file_path_file'
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
          },
           session : {
             endpoint: BASE_URL + 'administrator/system_upload/get_file_path_file/<?= $system_upload->id; ?>',
             refreshOnRequest:true
           },
          multiple : false,
          validation: {
              allowedExtensions: ["*"],
              sizeLimit : 0,
                        },
          showMessage: function(msg) {
              toastr['error'](msg);
          },
          callbacks: {
              onComplete : function(id, name, xhr) {
                if (xhr.success) {
                   var uuid = $('#system_upload_file_path_galery').fineUploader('getUuid', id);
                   $('#system_upload_file_path_uuid').val(uuid);
                   $('#system_upload_file_path_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#system_upload_file_path_uuid').val();
                  $.get(BASE_URL + '/administrator/system_upload/delete_file_path_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#system_upload_file_path_uuid').val('');
                  $('#system_upload_file_path_name').val('');
                }
              }
          }
      }); /*end file_path galey*/
              
       
           
    
    }); /*end doc ready*/
</script>