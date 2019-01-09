
<!-- Main content -->
<section class="content">
    <div class="row" >
        <div class="col-md-12">

    <!-- //  panel with-nav-tabs-->
    <div class="panel with-nav-tabs panel-default">

                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                        <!-- NAV TAB -->
                            <li class="active"><a href="#tab1default" data-toggle="tab">By Month</a></li>
                            <li><a href="#tab2default" data-toggle="tab">By Date</a></li>
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
                            <h3 class="widget-user-username">Mismer Report</h3>
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


                            <div class="col-sm-2">
                                <a class="btn btn-flat btn-info btn_generate1 btn_action btn_generate1_back" id="btn_generate1" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
                                Generate</a>
                                <small class="info help-block">
                                <b>*</b></small>                                
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
<!-- /ISI/  -->
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
                            <h3 class="widget-user-username">Mismer Report</h3>
                            <h5 class="widget-user-desc">By Date</h5>
                            <hr>
                        </div>
                        <?= form_open('', [
                            'name'    => 'form_system_flpp2', 
                            'class'   => 'form-horizontal', 
                            'id'      => 'form_system_flpp2', 
                            'enctype' => 'multipart/form-data', 
                            'method'  => 'POST'
                            ]); ?>
                         

<!-- /form-group/  -->
<div class="form-group ">
                            <label for="RowID" class="col-sm-1 control-label">Tanggal Awal 
                            <i class="required">*</i>
                            </label>

                            <div class="col-sm-2">
                            <input type="date" class="form-control" id="tgl_awal">
                            </div>

                            <label for="RowID" class="col-sm-1 control-label">Tanggal Akhir
                            <i class="required">*</i>
                            </label>

                            <div class="col-sm-2">
                            <input type="date" class="form-control" id="tgl_akhir">
                            </div>


                            <div class="col-sm-2">
                                <a class="btn btn-flat btn-info btn_generate2 btn_action btn_generate2_back" id="btn_generate2" data-stype='back' title="generate 2">
                                Generate</a>
                                <small class="info help-block">
                                <b>*</b></small>                                
                            </div>

                        </div>
<!-- /end form-group/  -->

<!-- //  -->



                        <div class="message"></div>
                        <div class="row-fluid col-md-7">
                           <!-- <button class="btn btn-flat btn-primary btn_generate1 btn_action" id="btn_generate1" data-stype='stay' title="<?= cclang('save_button'); ?> (Ctrl+s)">
                            <i class="fa fa-save" ></i> <?= cclang('save_button'); ?>
                            </button> -->
                            <!-- <a class="btn btn-flat btn-info btn_generate1 btn_action btn_generate1_back" id="generate" data-stype='back' title="<?= cclang('save_and_go_the_list_button'); ?> (Ctrl+d)">
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:800px">

            <!--  -->
            <!-- <div class="modal-content">

                <div class="modal-header">
                <center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
                    <h5 class="modal-title" id="myModalLabel">Bulan :  '.$bulan.'  Tahun : '.$tahun.'</h5>
                </center>
                </div>

            <div class="modal-body"> -->

            <!--  -->
            <span class="loading loading-hide">
            <img src="<?= BASE_ASSET; ?>/img/loading-spin-primary.svg"> 
            <i><?= cclang('loading_saving_data'); ?></i>
            </span>

            <div id="result_modal"></div>

            <!--  -->
            </div>

            </div>
            <!--  -->
                </div>
            </div>
<!--MODAL-->


<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
                   

// Generate 1
      $('.btn_generate1').click(function(event){

        console.log('generate1............');  
        // var form_system_flpp = $('#form_system_flpp');
        // var data_post = form_system_flpp.serializeArray();
        // var save_type = $(this).attr('data-stype');

        let month = document.getElementById('month').value;
        let year = document.getElementById('year').value;


        
        event.preventDefault();


		$.ajax({
			// url:"<?php echo base_url(); ?>administrator/system_flpp/import_batch/"+batch_id+"/"+month+"/"+year,
			url:'<?= site_url('administrator/edc_detail/get_generate1/') ?>'+month+'/'+year,
			// method:"POST",
            // data: data,
            // dataType: 'html',
			// // data:new FormData(this),
			// contentType:false,
			// cache:false,
			// processData:false,


			beforeSend:function(){
				$('#result1').html('<center><img src="<?= BASE_ASSET; ?>/img/loading.gif"></center>');
                console.log('beforeSend');

			},
			success:function(data)
			{
                console.log('success');

                $("#result1").html(data);


			}

            
		})


      }); 
      
   /*end btn generate 1*/

$(document).on('click', '#detail_modal1', function (e) {

// console.log('klikkkkk');

var dataTahun = $(this).attr('dataTahun');
var dataBulan = $(this).attr('dataBulan');
var Wilayah = $(this).attr('dataWilayah');
var TYPE_MID = $(this).attr('dataTYPE_MID');

console.log(dataTahun);
console.log(dataBulan);
console.log(Wilayah);
console.log(TYPE_MID);

$('#myModal').modal('show');

//  var url='<?= site_url('administrator/report/getModal/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;
var url='<?= site_url('administrator/edc_detail/getModalResult1/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah+'/'+TYPE_MID;

$('#result_modal').load(url);


});


//export excel get_generate1
$(document).on('click', '#export1', function (e) {

// console.log('klikkkkk');

var dataTahun = $(this).attr('dataTahun');
var dataBulan = $(this).attr('dataBulan');
// var Wilayah = $(this).attr('dataWilayah');

// console.log(dataTahun);
// console.log(dataBulan);
// console.log(Wilayah);

// $('#myModal').modal('show');

//  var url='<?= site_url('administrator/report/getModal/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;
var url='<?= site_url('administrator/edc_detail/get_export1/') ?>'+dataBulan+'/'+dataTahun;
window.location.href = url;
// $('#result1').load(url);


});


// =========
// Generate 2
$('.btn_generate2').click(function(event){

console.log('generate2............');  
// var form_system_flpp = $('#form_system_flpp');
// var data_post = form_system_flpp.serializeArray();
// var save_type = $(this).attr('data-stype');

let tgl_awal = document.getElementById('tgl_awal').value;
let tgl_akhir = document.getElementById('tgl_akhir').value;

console.log(tgl_awal);
console.log(tgl_akhir);

event.preventDefault();


$.ajax({
    // url:"<?php echo base_url(); ?>administrator/system_flpp/import_batch/"+batch_id+"/"+month+"/"+year,
    url:'<?= site_url('administrator/edc_detail/get_generate2/') ?>'+tgl_awal+'/'+tgl_akhir,
    // method:"POST",
    // data: data,
    // dataType: 'html',
    // // data:new FormData(this),
    // contentType:false,
    // cache:false,
    // processData:false,


    beforeSend:function(){
        $('#result2').html('<center><img src="<?= BASE_ASSET; ?>/img/loading.gif"></center>');
        console.log('beforeSend');

    },
    success:function(data)
    {
        console.log('success');

        $("#result2").html(data);


    }

    
})


}); 

/*end btn generate 1*/

// detail1 click
$(document).on('click', '#detail_modal2', function (e) {


let TglAwal = $(this).attr('dataTglAwal');
let TglAkhir = $(this).attr('dataTglAkhir');
let Wilayah = $(this).attr('dataWilayah');
let TYPE_MID = $(this).attr('dataTYPE_MID');

// console.log(TglAwal);
// console.log(TglAkhir);
// console.log(Wilayah);

$('#myModal').modal('show');

// var url='<?= site_url('administrator/report/getModal_between/') ?>'+TglAwal+'/'+TglAkhir+'/'+Wilayah;
var url='<?= site_url('administrator/edc_detail/getModalResult2/') ?>'+TglAwal+'/'+TglAkhir+'/'+Wilayah+'/'+TYPE_MID;

$('#result_modal').load(url);


});

//export excel get_generate1
$(document).on('click', '#export2', function (e) {

// console.log('klikkkkk');
let TglAwal = $(this).attr('dataTglAwal');
let TglAkhir = $(this).attr('dataTglAkhir');

// console.log(dataTahun);
// console.log(dataBulan);
// console.log(Wilayah);

// $('#myModal').modal('show');

//  var url='<?= site_url('administrator/report/getModal/') ?>'+dataTahun+'/'+dataBulan+'/'+Wilayah;
var url='<?= site_url('administrator/edc_detail/get_export2/') ?>'+TglAwal+'/'+TglAkhir;
window.location.href = url;
// $('#result1').load(url);


});





    }); /*end doc ready*/
</script>