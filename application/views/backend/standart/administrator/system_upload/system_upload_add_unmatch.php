
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
        System Upload        <small><?= cclang('new', ['System Upload']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/system_upload'); ?>">System Upload</a></li>
        <li class="active"><?= cclang('new'); ?></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">
<!-- ?? -->
    <!-- //  panel with-nav-tabs-->
    <div class="panel with-nav-tabs panel-default">

                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                        <!-- NAV TAB -->
                            <li class="active"><a href="#tab1default" data-toggle="tab">UPLOAD UNMATCH</a></li>
                            <li><a href="#tab2default" data-toggle="tab">EXPORT UNMATCH</a></li>
                            <!-- <li><a href="#tab3default" data-toggle="tab">TAB 3</a></li> -->
                        <!-- /NAV TAB -->        	
                        </ul>
                </div>

                <div class="panel-body">
<!-- // panel-body -->
                 <div class="tab-content">
<!-- // panel-content -->

<!-- TAB PANEL CONTENT/  -->


 <!--TAB 1 Active  -->
 <div class="tab-pane fade in active" id="tab1default">
<!--  ??-->

            <!--box -->
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
                            <h5 class="widget-user-desc"><?= cclang('new', ['System Upload']); ?></h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_system_upload', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_upload', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="file_name" class="col-sm-2 control-label">File Upload Unmatch 
                            <i class="required">save format CSV (comma delimiter) </i>
                            </label>
                            <div class="col-sm-8">
                                <div id="system_upload_file_name_galery"></div>
                                <input class="data_file" name="system_upload_file_name_uuid" id="system_upload_file_name_uuid" type="hidden" value="<?= set_value('system_upload_file_name_uuid'); ?>">
                                <input class="data_file" name="system_upload_file_name_name" id="system_upload_file_name_name" type="hidden" value="<?= set_value('system_upload_file_name_name'); ?>">
                                <small class="info help-block">
                                </small>
                            </div>
                        </div>

                        <div class="form-group ">
                        <label  class="col-sm-2 control-label"><i class="required"> sample file upload <a href='<?=base_url('EDC_UNMATC_DEV.csv')?>' >klik</a></i>

                        <!-- MID 
                        MERCHANT_DBA_NAME	
                        MSO	
                        SOURCE_CODE	
                        WILAYAH	
                        CHANNEL	
                        TAHUN	
                        BULAN -->

                            </label>                        
                        </div>                         
                                                <!-- <div class="form-group ">
                            <label for="application_source" class="col-sm-2 control-label">Application Source 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <select  class="form-control chosen chosen-select" name="application_source" id="application_source" data-placeholder="Select Application Source" >
                                    <option value=""></option>
                                    <option value="INCOMING">INCOMING</option>
                                    <option value="FLPP">FLPP</option>
                                    <option value="MISMER">MISMER</option>
                                    </select>
                                <small class="info help-block">
                                <b>Input Application Source</b> Max Length : 225.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="batch_id" class="col-sm-2 control-label">Batch Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="batch_id" id="batch_id" placeholder="Batch Id" value="<?= set_value('batch_id'); ?>">
                                <small class="info help-block">
                                <b>Input Batch Id</b> Max Length : 11.</small>
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
                                    </select>
                                <small class="info help-block">
                                <b>Input Process Month</b> Max Length : 11.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="process_year" class="col-sm-2 control-label">Process Year 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-2">
                                <select  class="form-control chosen chosen-select-deselect" name="process_year" id="process_year" data-placeholder="Select Process Year" >
                                    <option value=""></option>
                                    <?php for ($i = 1970; $i < date('Y')+100; $i++){ ?>
                                    <option value="<?= $i;?>"><?= $i; ?></option>
                                    <?php }; ?>  
                                </select>
                                <small class="info help-block">
                                <b>Input Process Year</b> Max Length : 4.</small>
                            </div>
                        </div>
                                                 
                         
                                                <div class="form-group ">
                            <label for="upload_at" class="col-sm-2 control-label">Upload At 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-6">
                            <div class="input-group date col-sm-8">
                              <input type="text" class="form-control pull-right datetimepicker" name="upload_at"  id="upload_at">
                            </div>
                            <small class="info help-block">
                            </small>
                            </div>
                        </div> -->
                                                 
                        
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button>
                            <!-- <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a> -->
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
<!-- ?? -->
<!-- /ISI/  -->
</div>
 <!--/TAB 1 Active  -->

<!--TAB 2  -->
<div class="tab-pane fade" id="tab2default">

<!-- ?? -->

<!-- 2 -->

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
                            <h3 class="widget-user-username">EDC UNMATCH</h3>
                            <h5 class="widget-user-desc">By Month</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_system_flpp', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_flpp', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                


<!-- /form-group/  -->
                            <div class="form-group ">
                            <label for="RowID" class="col-sm-1 control-label">Month 
                            <i class="required">*</i>
                            </label>

                            <div class="col-sm-2">

                            <select name="month" id="month" class="form-control">
                            <option value="1">Januari</option>
                            <option value="2">Februari</option>
                            <option value="3">Maret</option>
                            <option value="4">April</option>
                            <option value="5">Mei</option>
                            <option value="6">Juni</option>
                            <option value="7">Juli</option>
                            <option value="8">Agustus</option>
                            <option value="9">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                            </select>
                            </div>

                            <label for="RowID" class="col-sm-1 control-label">Year 
                            <i class="required">*</i>
                            </label>

                            <div class="col-sm-2">

                            <select name="year" id="year" class="form-control">
                            <!-- <option value="2017">2017</option> -->
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            </select>

                            </div>




                            <div class="col-sm-1">
                                <a class="btn btn-flat btn-info " id="download1"  title="download">
                                DOWNLOAD</a>                            
                            </div>

                        </div>
<!-- /end form-group/  -->





                        <!--  -->
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
                <br>
<!-- RESULT  -->
<div id="result1"></div>


 
                <!--/box body -->
                </div>
            <!--/box -->

            </div>
<!-- /TAB 2  -->




<!-- END TAB PANEL CONTENT/  -->


                    </div>
<!-- // END panel-body -->
                </div>
<!-- // END panel-content -->

            </div>
 <!-- //END  panel with-nav-tabs-->
       



<!-- //  -->

<!--  2-->
        </div>
    </div>
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
                   
      $('#btn_cancel').click(function(){
        swal({
            title: "<?= cclang('are_you_sure'); ?>",
            text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
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
            
        var form_system_upload = $('#form_system_upload');
        var data_post = form_system_upload.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/system_upload/add_save_unmatch',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            var id_file_name = $('#system_upload_file_name_galery').find('li').attr('qq-file-id');
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
            if (typeof id_file_name !== 'undefined') {
                    $('#system_upload_file_name_galery').fineUploader('deleteFile', id_file_name);
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
          $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        });
    
        return false;
      }); /*end btn save*/
      
              var params = {};
       params[csrf] = token;

       $('#system_upload_file_name_galery').fineUploader({
          template: 'qq-template-gallery',
          request: {
              endpoint: BASE_URL + '/administrator/system_upload/upload_file_name_file',
              params : params
          },
          deleteFile: {
              enabled: true, 
              endpoint: BASE_URL + '/administrator/system_upload/delete_file_name_file',
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
                   var uuid = $('#system_upload_file_name_galery').fineUploader('getUuid', id);
                   $('#system_upload_file_name_uuid').val(uuid);
                   $('#system_upload_file_name_name').val(xhr.uploadName);
                } else {
                   toastr['error'](xhr.error);
                }
              },
              onSubmit : function(id, name) {
                  var uuid = $('#system_upload_file_name_uuid').val();
                  $.get(BASE_URL + '/administrator/system_upload/delete_file_name_file/' + uuid);
              },
              onDeleteComplete : function(id, xhr, isError) {
                if (isError == false) {
                  $('#system_upload_file_name_uuid').val('');
                  $('#system_upload_file_name_name').val('');
                }
              }
          }
      }); /*end file_name galery*/
              
 
    //  download edc_unmatch
//btn download 1
$(document).on('click', '#download1', function (e) {

let month = document.getElementById('month').value;
let year = document.getElementById('year').value;
    // let type = document.getElementById('type').value;
    console.log(month);
    console.log(year);
//  var url='<?= site_url('administrator/report/getModal/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;
var url='<?= site_url('administrator/edc_detail/get_export_edc_unmatch/') ?>'+year+'/'+month;

window.location.href = url;
// $('#result1').load(url);


});      
    
    
    }); /*end doc ready*/
</script>