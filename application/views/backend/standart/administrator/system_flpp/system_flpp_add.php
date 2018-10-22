
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
        System Flpp        <small><?= cclang('new', ['System Flpp']); ?> </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/system_flpp'); ?>">System Flpp</a></li>
        <li class="active"><?= cclang('new'); ?></li>
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
                            <h3 class="widget-user-username">System Flpp</h3>
                            <h5 class="widget-user-desc"><?= cclang('new', ['System Flpp']); ?></h5>
                            <hr>
                        </div>

<form action="<?php echo base_url(); ?>index.php/administrator/system_flpp/import_tes" method="post" name="upload_excel" enctype="multipart/form-data">
                         
<div class="form-group ">

                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="file" id="file"  >
                                <small class="info help-block">
                                <!-- <b>Input NAMA PEMOHON</b> Max Length : 250.</small> -->
                            </div>
                        </div>
                                                 


                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="batch_id"  placeholder="BatchID"  >
                                <small class="info help-block">
                                <!-- <b>Input NAMA PEMOHON</b> Max Length : 250.</small> -->
                            </div>
                        </div>
                                  

                                                
                         
                                                <div class="form-group ">
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                            <select name="bulan" class="form-control">
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            <option value=1>Januari</option>
                            </select>

                            </div>
                        </div>
                                                 
                         
                        <div class="form-group ">
                            </label>
                            <div class="col-sm-8">
                            <select name=tahun class="form-control">
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            </select>

                            </div>
                        </div>
                                                 

                                                
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">


<button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>

                           <!-- <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button> -->
                            <!-- <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="btn_save" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            <i class="ion ion-ios-list-outline" ></i> <?= cclang('save_and_go_the_list_button'); ?>
                            </a> -->

                            <!-- <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a>
                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span> -->
                        </div>
                        </form>
                        <?//= form_close(); ?>
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
              window.location.href = BASE_URL + 'administrator/system_flpp';
            }
          });
    
        return false;
      }); /*end btn cancel*/
    
      $('.btn_save').click(function(){
        $('.message').fadeOut();
            
        var form_system_flpp = $('#form_system_flpp');
        var data_post = form_system_flpp.serializeArray();
        var save_type = $(this).attr('data-stype');

        data_post.push({name: 'save_type', value: save_type});
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + '/administrator/system_flpp/import_tes',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {

console.log(res);

          if(res.success) {
            
            // if (save_type == 'back') {
            //   window.location.href = res.redirect;
            //   return;
            // }
    
            $('.message').printMessage({message : res.message});
            $('.message').fadeIn();
            resetForm();
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
      
       
 
       
    
    
    }); /*end doc ready*/
</script>