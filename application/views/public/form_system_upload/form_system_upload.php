
<script src="<?= BASE_ASSET; ?>js/custom.js"></script>

<!-- Fine Uploader Gallery CSS file
    ====================================================================== -->
<link href="<?= BASE_ASSET; ?>/fine-upload/fine-uploader-gallery.min.css" rel="stylesheet">
<!-- Fine Uploader jQuery JS file
    ====================================================================== -->
<script src="<?= BASE_ASSET; ?>/fine-upload/jquery.fine-uploader.js"></script>

<?php $this->load->view('core_template/fine_upload'); ?>

<?= form_open('', [
    'name'    => 'form_form_system_upload', 
    'class'   => 'form-horizontal form_form_system_upload', 
    'id'      => 'form_form_system_upload',
    'enctype' => 'multipart/form-data', 
    'method'  => 'POST'
]); ?>
 
<div class="form-group ">
    <label for="file_name" class="col-sm-2 control-label">File Name 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <div id="form_system_upload_file_name_galery" ></div>
        <input class="data_file" name="form_system_upload_file_name_uuid" id="form_system_upload_file_name_uuid" type="hidden" >
        <input class="data_file" name="form_system_upload_file_name_name" id="form_system_upload_file_name_name" type="hidden" >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="application_source" class="col-sm-2 control-label">Application Source 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select-deselect" name="application_source" id="application_source" data-placeholder="Select Application Source"  >
            <option value=""></option>
            <?php foreach (db_get_all_data('form_application_source') as $row): ?>
            <option value="<?= $row->source_name ?>"><?= $row->source_name; ?></option>
            <?php endforeach; ?>  
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>

 
<div class="form-group ">
    <label for="batch_id" class="col-sm-2 control-label">Batch Id 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="batch_id" id="batch_id" value="<?=db_auto_increment('form_system_upload')?>"  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="process_month" class="col-sm-2 control-label">Process Month 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <select  class="form-control chosen chosen-select" name="process_month" id="process_month" data-placeholder="Select Process Month" >
            <option value=""></option>
            <option value="1">JANUARI</option>
            <option value="2">FEBRUARI</option>
            <option value="3">MARET</option>
            <option value="4">APRIL</option>
            </select>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="process_year" class="col-sm-2 control-label">Process Year 
    <i class="required">*</i>
    </label>
    <div class="col-sm-2">
        <select  class="form-control chosen chosen-select-deselect" name="process_year" id="process_year" data-placeholder="Select Process Year" >
            <option value=""></option>
            <?php for ($i = 2000; $i < date('Y')+50; $i++){ ?>
            <option value="<?= $i; ?>"><?= $i; ?></option>
            <?php }; ?> 
        </select>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<!-- <div class="form-group ">
    <label for="upload_at" class="col-sm-2 control-label">Upload At 
    <i class="required">*</i>
    </label>
    <div class="col-sm-6">
    <div class="input-group date col-sm-8">
      <input type="text" class="form-control pull-right datetimepicker" name="upload_at"  id="upload_at" >
    </div>
    <small class="info help-block">
    </small>
    </div>
</div> -->


<div class="row col-sm-12 message">
</div>
<div class="col-sm-2">
</div>
<div class="col-sm-8 padding-left-0">
    <button class="btn btn-flat btn-primary btn_save" id="btn_save" data-stype='stay'>
    Submit
    </button>
    <span class="loading loading-hide">
    <img src="http://localhost:81/mattools/asset//img/loading-spin-primary.svg"> 
    <i>Loading, Submitting data</i>
    </span>
</div>
</form></div>


<!-- Page script -->
<script>
    $(document).ready(function(){
          $('.form-preview').submit(function(){
        return false;
     });

     $('input[type="checkbox"].flat-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
     });


    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_form_system_upload = $('#form_form_system_upload');
        var data_post = form_form_system_upload.serializeArray();
        var save_type = $(this).attr('data-stype');
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + 'form/form_system_upload/submit',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_file_name = $('#form_system_upload_file_name_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_file_name !== 'undefined') {
                    $('#form_system_upload_file_name_galery').fineUploader('deleteFile', id_file_name);
                }
            $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
          } else {
            $('.message').printMessage({message : res.message, type : 'warning'});
          }
    
        })
        .fail(function() {
          $('.message').printMessage({message : 'Error save data', type : 'warning'});
        })
        .always(function() {
          $('.loading').hide();
          $('html, body').animate({ scrollTop: $(document).height() }, 1000);
        });
    
        return false;
      }); /*end btn save*/


      
             
       var params = {};
       params[csrf] = token;

       $('#form_system_upload_file_name_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + 'form/form_system_upload/upload_file_name_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + 'form/form_system_upload/delete_file_name_file',
          },
          thumbnails: {
              placeholders: {
                  waitingPath: BASE_URL + '/asset/fine-upload/placeholders/waiting-generic.png',
                  notAvailablePath: BASE_URL + '/asset/fine-upload/placeholders/not_available-generic.png'
              }
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
                   var uuid = $('#form_system_upload_file_name_galery').fineUploader('getUuid', id);
                   $('#form_system_upload_file_name_uuid').val(uuid);
                   $('#form_system_upload_file_name_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#form_system_upload_file_name_uuid').val();
                  $.get(BASE_URL + 'form/form_system_upload/delete_file_name_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#form_system_upload_file_name_uuid').val('');
                  $('#form_system_upload_file_name_name').val('');
                }
              }
          }
      }); /*end file_name galey*/
           
    }); /*end doc ready*/
</script>