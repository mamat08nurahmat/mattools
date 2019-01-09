
<script src="<?= BASE_ASSET; ?>js/custom.js"></script>


<?= form_open('', [
    'name'    => 'form_form_detail_upload_incoming', 
    'class'   => 'form-horizontal form_form_detail_upload_incoming', 
    'id'      => 'form_form_detail_upload_incoming',
    'enctype' => 'multipart/form-data', 
    'method'  => 'POST'
]); ?>
 
<div class="form-group ">
    <label for="tanggal_submit" class="col-sm-2 control-label">Tanggal Submit 
    <i class="required">*</i>
    </label>
    <div class="col-sm-6">
    <div class="input-group date col-sm-8">
      <input type="text" class="form-control pull-right datetimepicker" name="tanggal_submit"  id="tanggal_submit" >
    </div>
    <small class="info help-block">
    </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="data_entry" class="col-sm-2 control-label">Data Entry 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="data_entry" id="data_entry" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="area" class="col-sm-2 control-label">Area 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="area" id="area" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="agency" class="col-sm-2 control-label">Agency 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="agency" id="agency" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="sales_center" class="col-sm-2 control-label">Sales Center 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="text" class="form-control" name="sales_center" id="sales_center" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="keterangan" class="col-sm-2 control-label">Keterangan 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <textarea id="keterangan" name="keterangan" rows="5" class="textarea" ></textarea>
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="jumlah_data" class="col-sm-2 control-label">Jumlah Data 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="number" class="form-control" name="jumlah_data" id="jumlah_data" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="approve" class="col-sm-2 control-label">Approve 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="number" class="form-control" name="approve" id="approve" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>
 
<div class="form-group ">
    <label for="reject" class="col-sm-2 control-label">Reject 
    <i class="required">*</i>
    </label>
    <div class="col-sm-8">
        <input type="number" class="form-control" name="reject" id="reject" placeholder=""  >
        <small class="info help-block">
        </small>
    </div>
</div>


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
            
        var form_form_detail_upload_incoming = $('#form_form_detail_upload_incoming');
        var data_post = form_form_detail_upload_incoming.serializeArray();
        var save_type = $(this).attr('data-stype');
    
        $('.loading').show();
    
        $.ajax({
          url: BASE_URL + 'form/form_detail_upload_incoming/submit',
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
          $('html, body').animate({ scrollTop: $(document).height() }, 1000);
        });
    
        return false;
      }); /*end btn save*/


      
             
           
    }); /*end doc ready*/
</script>