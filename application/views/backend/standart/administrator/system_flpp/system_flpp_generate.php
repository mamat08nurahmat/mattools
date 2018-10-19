
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Mismerdetail<small>Report></small>
   </h1>
   <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mismerdetail Report</li>
   </ol>
</section>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

		
		
<!---
    <div class="page-header">
        <h1>Panels with nav tabs.<span class="pull-right label label-default">:)</span></h1>
    </div>
-->
    <div class="row">
    	<div class="col-md-12">
            <div class="panel with-nav-tabs panel-default">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1default" data-toggle="tab">Generate All Batch</a></li>
                            <!-- <li><a href="#tab2default" data-toggle="tab">Pengembalian Perbulan</a></li>    	 -->
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">

 <!--TAB 1 Active  -->
<div class="tab-pane fade in active" id="tab1default">
<form class="form-inline">

<div class="form-group mx-sm-3 mb-2">
<label for="batch">Batch</label>
     <select  class="form-control" name="batch_id" id="batch_id" data-placeholder="Select batch" >
      <option value=""></option>
      <?php
    //   $where = array(
    //       'is_generate' =>1
    //   );
      
      foreach (db_get_all_data_generate('system_flpp') as $row): ?>
        <option value="<?= $row->batch_id ?>"><?= $row->batch_id; ?></option>
      <?php endforeach; ?>  
    </select>
</div>

<div class="form-group mx-sm-3 mb-2">

<!-- <label for="batch">Type</label>
     <select  class="form-control" name="type" id="type"  >
     <option value="IPMT">IPMT</option>
     <option value="PPMT">PPMT</option>
    </select> -->

</div>
<button type="button" id="generate_batch" class="btn btn-primary">Export</button>
</form>
						


<hr>

<!-- RESULT  -->

<!-- /RESULT  -->
						</div>
 <!--/TAB 1 Active  -->

 <!--TAB 2  -->
 
<!-- /TAB 2  -->
					
                    </div>
                </div>
            </div>
        </div>

	</div>
		
		
<!--------------->


</section><!-- /.content -->
<!-- Main content -->




<!-- Page script -->
<script>
  $(document).ready(function(){

// EXPORT ALL BATCH
const generate_batch = document.getElementById('generate_batch');

generate_batch.addEventListener('click',function(e){

  let batch_id = document.getElementById('batch_id').value;
//   let type = document.getElementById('type').value;
let url='<?= site_url('administrator/system_flpp/generate_all/') ?>'+batch_id;
// console.log(url);
location.href = url;
// $.ajax({

// type:"POST",
// url:url,
// dataType:"json",
// beforeSend : function(data){

// console.log('beforeSend');

// },
// // success
// success : function(data){
//   console.log('success');

// // $('#result1').html(data);

// },
// // complete
// complete : function(data){
//   console.log('complete');


// }

// });

// console.log('clickkkkkkkkkk');
// console.log(url);
// console.log(type);
// location.href = url;
// alert(export_batch.value);
// windows.open(url,"_self");

});


// tab 1
/*
const generate1 = document.getElementById('generate1');
generate1.addEventListener('click',function(e){
let TglAwal = document.getElementById('tgl_awal').value;   
let TglAkhir = document.getElementById('tgl_akhir').value;


var url='<?= site_url('administrator/mismerdetail/getResult1/') ?>'+TglAwal+'/'+TglAkhir;
$('#result1').load(url);
//ajax--------
$.ajax({

  type:"POST",
  url:"<?=site_url('administrator/mismerdetail/getfilter1')?>",
  dataType:"html",
  data:{
    TglAwal:TglAwal,
    TglAkhir:TglAkhir
  },
  cache:false,
// before
beforeSend : function(data){

console.log('beforeSend');

},
// success
success : function(data){
  console.log('success');

$('#result1').html(data);

},
// complete
complete : function(data){
  console.log('complete');


}


});
//ajax--------

});
*/



// tab 2




  }); /*end doc ready*/







</script>