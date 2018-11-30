
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
                        <?= form_open('', [
                            'name'    => 'form_system_flpp', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_flpp', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="NAMA_PEMOHON" class="col-sm-2 control-label">NAMA PEMOHON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NAMA_PEMOHON" id="NAMA_PEMOHON" placeholder="NAMA PEMOHON" value="<?= set_value('NAMA_PEMOHON'); ?>">
                                <small class="info help-block">
                                <b>Input NAMA PEMOHON</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="PEKERJAAN_PEMOHON" class="col-sm-2 control-label">PEKERJAAN PEMOHON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="PEKERJAAN_PEMOHON" id="PEKERJAAN_PEMOHON" placeholder="PEKERJAAN PEMOHON" value="<?= set_value('PEKERJAAN_PEMOHON'); ?>">
                                <small class="info help-block">
                                <b>Input PEKERJAAN PEMOHON</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="JENIS_KELAMIN" class="col-sm-2 control-label">JENIS KELAMIN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="JENIS_KELAMIN" id="JENIS_KELAMIN" placeholder="JENIS KELAMIN" value="<?= set_value('JENIS_KELAMIN'); ?>">
                                <small class="info help-block">
                                <b>Input JENIS KELAMIN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NO_KTP_PEMOHON" class="col-sm-2 control-label">NO KTP PEMOHON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NO_KTP_PEMOHON" id="NO_KTP_PEMOHON" placeholder="NO KTP PEMOHON" value="<?= set_value('NO_KTP_PEMOHON'); ?>">
                                <small class="info help-block">
                                <b>Input NO KTP PEMOHON</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NPWP_PEMOHON" class="col-sm-2 control-label">NPWP PEMOHON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NPWP_PEMOHON" id="NPWP_PEMOHON" placeholder="NPWP PEMOHON" value="<?= set_value('NPWP_PEMOHON'); ?>">
                                <small class="info help-block">
                                <b>Input NPWP PEMOHON</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="GAJI_POKOK" class="col-sm-2 control-label">GAJI POKOK 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="GAJI_POKOK" id="GAJI_POKOK" placeholder="GAJI POKOK" value="<?= set_value('GAJI_POKOK'); ?>">
                                <small class="info help-block">
                                <b>Input GAJI POKOK</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NAMA_PASANGAN" class="col-sm-2 control-label">NAMA PASANGAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NAMA_PASANGAN" id="NAMA_PASANGAN" placeholder="NAMA PASANGAN" value="<?= set_value('NAMA_PASANGAN'); ?>">
                                <small class="info help-block">
                                <b>Input NAMA PASANGAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NO_KTP_PASANGAN" class="col-sm-2 control-label">NO KTP PASANGAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NO_KTP_PASANGAN" id="NO_KTP_PASANGAN" placeholder="NO KTP PASANGAN" value="<?= set_value('NO_KTP_PASANGAN'); ?>">
                                <small class="info help-block">
                                <b>Input NO KTP PASANGAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NO_REKENING_PEMOHON" class="col-sm-2 control-label">NO REKENING PEMOHON 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NO_REKENING_PEMOHON" id="NO_REKENING_PEMOHON" placeholder="NO REKENING PEMOHON" value="<?= set_value('NO_REKENING_PEMOHON'); ?>">
                                <small class="info help-block">
                                <b>Input NO REKENING PEMOHON</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TGL_AKAD" class="col-sm-2 control-label">TGL AKAD 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TGL_AKAD" id="TGL_AKAD" placeholder="TGL AKAD" value="<?= set_value('TGL_AKAD'); ?>">
                                <small class="info help-block">
                                <b>Input TGL AKAD</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="HARGA_RUMAH" class="col-sm-2 control-label">HARGA RUMAH 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="HARGA_RUMAH" id="HARGA_RUMAH" placeholder="HARGA RUMAH" value="<?= set_value('HARGA_RUMAH'); ?>">
                                <small class="info help-block">
                                <b>Input HARGA RUMAH</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NILAI_KPR" class="col-sm-2 control-label">NILAI KPR 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NILAI_KPR" id="NILAI_KPR" placeholder="NILAI KPR" value="<?= set_value('NILAI_KPR'); ?>">
                                <small class="info help-block">
                                <b>Input NILAI KPR</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="SUKU_BUNGA_KPR" class="col-sm-2 control-label">SUKU BUNGA KPR 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="SUKU_BUNGA_KPR" id="SUKU_BUNGA_KPR" placeholder="SUKU BUNGA KPR" value="<?= set_value('SUKU_BUNGA_KPR'); ?>">
                                <small class="info help-block">
                                <b>Input SUKU BUNGA KPR</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="TENOR" class="col-sm-2 control-label">TENOR 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="TENOR" id="TENOR" placeholder="TENOR" value="<?= set_value('TENOR'); ?>">
                                <small class="info help-block">
                                <b>Input TENOR</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ANGSURAN_KPR" class="col-sm-2 control-label">ANGSURAN KPR 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ANGSURAN_KPR" id="ANGSURAN_KPR" placeholder="ANGSURAN KPR" value="<?= set_value('ANGSURAN_KPR'); ?>">
                                <small class="info help-block">
                                <b>Input ANGSURAN KPR</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NILAI_FLPP" class="col-sm-2 control-label">NILAI FLPP 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NILAI_FLPP" id="NILAI_FLPP" placeholder="NILAI FLPP" value="<?= set_value('NILAI_FLPP'); ?>">
                                <small class="info help-block">
                                <b>Input NILAI FLPP</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NAMA_PENGEMBANG" class="col-sm-2 control-label">NAMA PENGEMBANG 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NAMA_PENGEMBANG" id="NAMA_PENGEMBANG" placeholder="NAMA PENGEMBANG" value="<?= set_value('NAMA_PENGEMBANG'); ?>">
                                <small class="info help-block">
                                <b>Input NAMA PENGEMBANG</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="NAMA_PERUMAHAN" class="col-sm-2 control-label">NAMA PERUMAHAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="NAMA_PERUMAHAN" id="NAMA_PERUMAHAN" placeholder="NAMA PERUMAHAN" value="<?= set_value('NAMA_PERUMAHAN'); ?>">
                                <small class="info help-block">
                                <b>Input NAMA PERUMAHAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="ALAMAT_AGUNAN" class="col-sm-2 control-label">ALAMAT AGUNAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="ALAMAT_AGUNAN" id="ALAMAT_AGUNAN" placeholder="ALAMAT AGUNAN" value="<?= set_value('ALAMAT_AGUNAN'); ?>">
                                <small class="info help-block">
                                <b>Input ALAMAT AGUNAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="KOTA_AGUNAN" class="col-sm-2 control-label">KOTA AGUNAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="KOTA_AGUNAN" id="KOTA_AGUNAN" placeholder="KOTA AGUNAN" value="<?= set_value('KOTA_AGUNAN'); ?>">
                                <small class="info help-block">
                                <b>Input KOTA AGUNAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="KODE_POS_AGUNAN" class="col-sm-2 control-label">KODE POS AGUNAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="KODE_POS_AGUNAN" id="KODE_POS_AGUNAN" placeholder="KODE POS AGUNAN" value="<?= set_value('KODE_POS_AGUNAN'); ?>">
                                <small class="info help-block">
                                <b>Input KODE POS AGUNAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LUAS_TANAH" class="col-sm-2 control-label">LUAS TANAH 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LUAS_TANAH" id="LUAS_TANAH" placeholder="LUAS TANAH" value="<?= set_value('LUAS_TANAH'); ?>">
                                <small class="info help-block">
                                <b>Input LUAS TANAH</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="LUAS_BANGUNAN" class="col-sm-2 control-label">LUAS BANGUNAN 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="LUAS_BANGUNAN" id="LUAS_BANGUNAN" placeholder="LUAS BANGUNAN" value="<?= set_value('LUAS_BANGUNAN'); ?>">
                                <small class="info help-block">
                                <b>Input LUAS BANGUNAN</b> Max Length : 250.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="batch_id" class="col-sm-2 control-label">Batch Id 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="batch_id" id="batch_id" placeholder="Batch Id" value="<?= set_value('batch_id'); ?>">
                                <small class="info help-block">
                                <b>Input Batch Id</b> Max Length : 50.</small>
                            </div>
                        </div>
                                                 
                         
                                                <div class="form-group ">
                            <label for="month" class="col-sm-2 control-label">Month 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="month" id="month" placeholder="Month" value="<?= set_value('month'); ?>">
                                <small class="info help-block">
                                <b>Input Month</b> Max Length : 5.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="year" class="col-sm-2 control-label">Year 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="year" id="year" placeholder="Year" value="<?= set_value('year'); ?>">
                                <small class="info help-block">
                                <b>Input Year</b> Max Length : 5.</small>
                            </div>
                        </div>
                                                 
                                                <div class="form-group ">
                            <label for="is_generate" class="col-sm-2 control-label">Is Generate 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="is_generate" id="is_generate" placeholder="Is Generate" value="<?= set_value('is_generate'); ?>">
                                <small class="info help-block">
                                <b>Input Is Generate</b> Max Length : 5.</small>
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
          url: BASE_URL + '/administrator/system_flpp/add_save',
          type: 'POST',
          dataType: 'json',
          data: data_post,
        })
        .done(function(res) {
          if(res.success) {
            
            if (save_type == 'back') {
              window.location.href = res.redirect;
              return;
            }
    
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