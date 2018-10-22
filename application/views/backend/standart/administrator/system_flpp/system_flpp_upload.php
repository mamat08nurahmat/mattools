
<!-- <script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
   
</script> -->
<!-- Content Header (Page header) -->

<!-- //  -->


<!-- //  -->
<section class="content-header">

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""><a  href="<?= site_url('administrator/system_flpp'); ?>">System Flpp</a></li>
        <li class="active">Detail</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
<!-- //  -->

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
                            <li class="active"><a href="#tab1default" data-toggle="tab">Upload FLPP</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Total By Batch</a></li>    	
                        </ul>
                </div>

                <div class="panel-body">
                    <div class="tab-content">

 <!--TAB 1 Active  -->
<div class="tab-pane fade in active" id="tab1default">
<form class="form-inline" action="<?php echo base_url(); ?>index.php/administrator/system_flpp/upload_save" method="post" name="upload_excel" enctype="multipart/form-data">

<div class="form-group mx-sm-3 mb-2">
<label for="batch">Batch</label>

</div>

<div class="form-group mx-sm-3 mb-2">

<input type="file" name="file" id="file">

</div>
<button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>

<!-- <button type="button" id="upload_batch" class="btn btn-primary">Upload</button> -->
</form>
						

<!-- <form action="<?php echo base_url(); ?>index.php/upload/import" method="post" name="upload_excel" enctype="multipart/form-data">
<table>
<tr>
	<td>Batch : <input type="text" name="batch_id" value="<?//=$batch_id;?>" ></td>	
	<td colspan='8'></td>

</tr>
</table>
<input type="file" name="file" id="file">
<button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
</form>
<a href="<?php echo base_url(); ?>upload_csv.csv"> Sample csv file </a> -->


<hr>


<!-- /RESULT  -->
						</div>
 <!--/TAB 1 Active  -->

 <!--TAB 2  -->
 <div class="tab-pane fade" id="tab2default">
	
 <form class="form-inline">

<div class="form-group mx-sm-3 mb-2">
<label for="batch">Batch</label>
     <select  class="form-control" name="batch_id_tot" id="batch_id_tot" data-placeholder="Select batch" >
      <option value=""></option>
      <?php foreach (db_get_all_data_distinct_batch('system_flpp') as $row): ?>
        <option value="<?= $row->batch_id ?>"><?= $row->batch_id; ?></option>
      <?php endforeach; ?>  
    </select>
</div>

<div class="form-group mx-sm-3 mb-2">

<!-- <label for="batch">Type</label>
     <select  class="form-control" name="type" id="type"  >
     <option value="FLPP">Tarif FLPP</option>
     <option value="IPMT">IPMT</option>
     <option value="PPMT">PPMT</option>
    </select> -->

</div>
<button type="button" id="view_total_batch" class="btn btn-primary">View Total</button>
<!-- <button type="button" id="export_batch" class="btn btn-primary">Export</button> -->
</form>

<hr>
<form action="<?php echo base_url(); ?>index.php/administrator/system_flpp/upload_save" method="post" name="upload_excel" enctype="multipart/form-data">
<table>
<tr>
	<!-- <td>Batch : <input type="text" name="batch_id" value="<?//=$batch_id;?>" ></td>	 -->
	<td colspan='8'></td>

</tr>
</table>
<input type="file" name="file" id="file">
<button type="submit" id="submit" name="import" class="btn btn-primary button-loading">Import</button>
</form>
<a href="<?php echo base_url(); ?>upload_csv.csv"> Sample csv file </a>

<hr>
<!-- RESULT  -->
<div id="result2"></div>


        </div>
<!-- /TAB 2  -->
					
                    </div>
                </div>
            </div>
        </div>

	</div>
		
		
<!--------------->


<!-- //  -->
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
                   
 //tab1
// UPLOAD BATCH
// const export_batch = document.getElementById('export_batch');

// export_batch.addEventListener('click',function(e){
//   let export_batch = document.getElementById('batch_id').value;
//   let type = document.getElementById('type').value;
// let url='<?= site_url('administrator/system_flpp/export_pengembalian/') ?>'+export_batch+'/'+type;

// // console.log(url);
// // console.log(type);
// location.href = url;
// // alert(export_batch.value);
// // windows.open(url,"_self");

// });
       
    
    
    }); /*end doc ready*/
</script>