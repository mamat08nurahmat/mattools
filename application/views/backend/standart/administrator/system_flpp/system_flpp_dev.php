
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">

    <!-- //  panel with-nav-tabs-->
    <div class="panel with-nav-tabs panel-default">

                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                        <!-- NAV TAB -->
                            <li class="active"><a href="#tab1default" data-toggle="tab">Upload</a></li>
                            <li><a href="#tab2default" data-toggle="tab">RESULT</a></li>
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
                            <h5 class="widget-user-desc"><?= cclang('new', ['Temp Upload Unmatch']); ?></h5>
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
                            <label for="RowID" class="col-sm-1 control-label">BatchID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" name="batch_id" id="batch_id" placeholder="BatchID" value="<?= set_value('BatchID'); ?>">
                                <small class="info help-block">
                                <b>BatchID</b></small>
                            </div>
                        </div>


                                        <!-- //  -->
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
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            </select>

                            </div>

                        </div>
<!-- //  -->





                                                <div class="form-group ">
                            <label for="BatchID" class="col-sm-1 control-label">Upload Unmatch 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-2">

				<input type="file" name="csv_file" id="csv_file" required accept=".csv" />

                                <!-- <input type="file" class="form-control" name="file" id="file"> -->
                                <!-- <small class="info help-block">
                                <b>Input BatchID</b> Max Length : 11.</small> -->
                            </div>
                        </div>
                                                 
                        
                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <!-- <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button> -->
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

                        <!--  -->

			<!-- <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button> -->

                        <!--  -->
                        <?= form_close(); ?>
                    </div>
                </div>
                <!--/box body -->
            </div>
            <!--/box -->

					</div>
 <!--/TAB 1 Active  -->

<!--TAB 2  -->
<div class="tab-pane fade" id="tab2default">

<!-- /ISI/  -->
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
                            <h5 class="widget-user-desc">Data Debitur</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_system_flpp2', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_flpp2', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         
                                                <div class="form-group ">
                            <label for="RowID" class="col-sm-1 control-label">BatchID 
                            <i class="required">*</i>
                            </label>
                            <div class="col-sm-2">
                                <!-- <input type="number" class="form-control" name="batch_id" id="batch_id" placeholder="BatchID" value="<?= set_value('BatchID'); ?>"> -->

                                <select  class="form-control" name="batch_id2" id="batch_id2"  >
                                    <option value=""></option>
                                    <?php foreach (db_get_all_data_distinct_batch('system_flpp') as $row): ?>
                                    <option value="<?= $row->batch_id ?>"><?= $row->batch_id; ?></option>
                                    <?php endforeach; ?>  
                                </select>

                                <small class="info help-block">
                                <b>BatchID</b></small>
                            </div>


                            <div class="col-sm-1">
                            <a class="btn btn-flat btn-info generate " id="generate"  title="Generate">
                            Generate
                            </a>                            
                             </div>

                            <div class="col-sm-1">
                            <a class="btn btn-flat btn-info generate_total " id="generate_total"  title="Generate Total">
                            TOTAL
                            </a>                            
                                </div>



                        </div>



<!-- //  -->



                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <!-- <button class="btn btn-flat btn-primary btn_save btn_action" id="btn_save" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button> -->
                            <!-- <a class="btn btn-flat btn-info btn_save btn_action btn_save_back" id="generate" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                            Generate
                            </a> -->

                            <!-- <a class="btn btn-flat btn-default btn_action" id="btn_cancel" title="<?= cclang('cancel_button'); ?> (Ctrl+x)">
                            <i class="fa fa-undo" ></i> <?= cclang('cancel_button'); ?>
                            </a> -->

                            <span class="loading loading-hide">
                            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
                            <i><?= cclang('loading_saving_data'); ?></i>
                            </span>

                        </div>

                        <!--  -->

			<!-- <button type="submit" name="import_csv" class="btn btn-info" id="import_csv_btn">Import CSV</button> -->

                        <!--  -->
                        <?= form_close(); ?>

                   </div>
                </div>

<hr>
<br>
<!-- RESULT  -->
<div id="result2"></div>
<!-- 
-->


 
                <!--/box body -->
            </div>
            <!--/box -->
<!-- /ISI/  -->
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


      $('.btn_save').click(function(event){

        // console.log('submitttttt');  
        // var form_system_flpp = $('#form_system_flpp');
        // var data_post = form_system_flpp.serializeArray();
        // var save_type = $(this).attr('data-stype');

        var data = new FormData();
        jQuery.each(jQuery('#csv_file')[0].files, function(i, file) {
            data.append('file-'+i, file);
        });


        // console.log('dattttttttttttaaaa');
        // console.log(data);
        // console.log('dattttttttttttaaaa');

        let batch_id= document.getElementById('batch_id').value;
        let month = document.getElementById('month').value;
        let year = document.getElementById('year').value;


        
        event.preventDefault();


		$.ajax({
			// url:"<?php echo base_url(); ?>administrator/system_flpp/import_batch/"+batch_id+"/"+month+"/"+year,
			url:'<?= site_url('administrator/system_flpp/import_batch/') ?>'+batch_id+'/'+month+'/'+year,
			method:"POST",
            data: data,
            dataType: 'json',
			// data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,


			beforeSend:function(){
				// $('#import_csv_btn').html('Importing...');
                console.log('beforeSend');

			},
			success:function(data)
			{
                console.log('success');
                console.log(data);

                // window.location.href = BASE_URL + 'administrator/system_flpp';


				// $('#import_csv')[0].reset();
				// $('#import_csv_btn').attr('disabled', false);
				// $('#import_csv_btn').html('Import Done');
				// load_data();
			}

            
		})


            // .done(function(res) {
            //     console.log('done');
            // //     console.log(res);

            // //     //   window.location.href = BASE_URL + 'administrator/system_flpp';
            // } //done   

        // .fail(function() {
        //     console.log('fail');
        //         // console.log(res);

        // //   $('.message').printMessage({message : 'Error save data', type : 'warning'});
        // })
        // .always(function() {
        //   $('.loading').hide();
        //   $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        // });
    
        // return false;            
// ============
        // $('.message').fadeOut();
            
        // var form_system_flpp = $('#form_system_flpp');
        // var data_post = form_system_flpp.serializeArray();
        // var save_type = $(this).attr('data-stype');

        // data_post.push({name: 'save_type', value: save_type});
    
        // $('.loading').show();
    
        // $.ajax({
        //   url: BASE_URL + '/administrator/system_flpp/upload_save',
        //   type: 'POST',
        //   dataType: 'json',
        //   data: data_post,
        // })
        // .done(function(res) {
        //   if(res.success) {
            
        //     if (save_type == 'back') {
        //       window.location.href = res.redirect;
        //       return;
        //     }
    
        //     $('.message').printMessage({message : res.message});
        //     $('.message').fadeIn();
        //     resetForm();
        //     $('.chosen option').prop('selected', false).trigger('chosen:updated');
                

        //   } else {
        //     $('.message').printMessage({message : res.message, type : 'warning'});
        //   }
    
        // })
        // .fail(function() {
        //   $('.message').printMessage({message : 'Error save data', type : 'warning'});
        // })
        // .always(function() {
        //   $('.loading').hide();
        //   $('html, body').animate({ scrollTop: $(document).height() }, 2000);
        // });
    
        // return false;

      }); 
      
      /*end btn save*/
      

// =========

      $('.generate').click(function(event){

console.log('generate...........');
        let batch_id= document.getElementById('batch_id2').value;
        // let month = document.getElementById('month').value;
        // let year = document.getElementById('year').value;


        
        event.preventDefault();

        var url='<?= site_url('administrator/system_flpp/get_generate/') ?>'+batch_id;
        // console.log(url);
        // $('#result2').load(url);


    $.ajax({
        url: url, 

	beforeSend:function(){
		$('#result2').html('Generate.....');
       console.log('beforeSend');

			},
    success: function(result){
        console.log('success');

        $("#result2").html(result);
    }
    
    });




/*
		$.ajax({
			// url:"<?php echo base_url(); ?>administrator/system_flpp/import_batch/"+batch_id+"/"+month+"/"+year,
			url:'<?= site_url('administrator/system_flpp/get_generate/') ?>'+batch_id,
			method:"POST",
            // data: data,
            dataType: 'html',
			// data:new FormData(this),
			contentType:false,
			cache:false,
			processData:false,


			beforeSend:function(){
				// $('#import_csv_btn').html('Importing...');
                console.log('beforeSend');

			},
			success:function(data)
			{
                console.log('success');
                console.log(data);
                $('#result2').html(data);

                // window.location.href = BASE_URL + 'administrator/system_flpp';


				// $('#import_csv')[0].reset();
				// $('#import_csv_btn').attr('disabled', false);
				// $('#import_csv_btn').html('Import Done');
				// load_data();
			}

            
		})
*/




        }); 

//Generate total batch



      $('.generate_total').click(function(event){

console.log('generate Total...........');
console.log('$this->gen_angsuran_detail_all($batch_id)');

        let batch_id= document.getElementById('batch_id2').value;
        // let month = document.getElementById('month').value;
        // let year = document.getElementById('year').value;


        
        event.preventDefault();

        var url='<?= site_url('administrator/system_flpp/batch_total/') ?>'+batch_id;
        // console.log(url);
        // $('#result2').load(url);


    $.ajax({
        url: url, 

	beforeSend:function(){
		$('#result2').html('Generate.....');
       console.log('beforeSend');

			},
    success: function(result){
        console.log('success');

        $("#result2").html(result);
    }
    
    });

        }); 


//generate total batch

    }); /*end doc ready*/
</script>