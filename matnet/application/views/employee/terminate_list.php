<?php 
//aa
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<!---datatable
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
-->

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>



<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Blank page
        <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
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
                            <li class="active"><a href="#tab1default" data-toggle="tab">Filter 1</a></li>
                            <li><a href="#tab2default" data-toggle="tab">Filter 2</a></li>
<!---
                            <li><a href="#tab3default" data-toggle="tab">Default 3</a></li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
                                    <li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
                                </ul>
                            </li>
-->							
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab1default">
						
                <form id="form-filter" class="form-horizontal">
                    
                    <div class="form-group">
                        <label for="TanggalAwal" class="col-sm-2 control-label">Tanggal Awal</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tgl_awal">
                        </div>
                    </div>
					
                    <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">Tanggal Akhir</label>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="tgl_akhir">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Type" class="col-sm-2 control-label">Agency</label>
                        <div class="col-sm-4">
						<select id="AgencyID"  name="AgencyID" class="form-control">
							<option value=0>ALL Agency</option>
							<?php
							foreach ($query_agency as $agency) {
							// echo "<option value=".$agency->AgencyID." > ".$agency->AgencyName."  <option>";
							?>
							<option value="<?=$agency->AgencyID;?>"><?=$agency->AgencyName;?></option>
							<?php
							}
							?>
						</select>	
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Type" class="col-sm-2 control-label">Sales Center</label>
                        <div class="col-sm-4">
						<select id="SalesCenterID" name="SalesCenterID" class="form-control">
							<option value=0>ALL Sales Center</option>
						</select>  		
                        </div>
                    </div>						
						
					
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
							
                            <button type="button" id="generate" class="btn btn-primary">Generate</button>
                            <button type="button" id="excel" class="btn btn-default"><i class="fa fa-file-excel-o"></i></button>
                        </div>
                    </div>

                </form>
										
						
						</div>
                        <div class="tab-pane fade" id="tab2default">
						
                <form id="form-filter" class="form-horizontal">
                    
                    <div class="form-group">
                        <label for="TanggalAwal" class="col-sm-2 control-label">Name / Code</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="code">
                        </div>
                    </div>				
						
					
                    <div class="form-group">
                        <label for="LastName" class="col-sm-2 control-label"></label>
                        <div class="col-sm-4">
							
                            <button type="button" id="generate2" class="btn btn-primary">Generate</button>
                            <button type="button" id="excel2" class="btn btn-default"><i class="fa fa-file-excel-o"></i></button>
                        </div>
                    </div>

                </form>
						
						</div>
<!--
                        <div class="tab-pane fade" id="tab3default">Default 3</div>
                        <div class="tab-pane fade" id="tab4default">Default 4</div>
                        <div class="tab-pane fade" id="tab5default">Default 5</div>
-->						
                    </div>
                </div>
            </div>
        </div>

	</div>
		
		
<!--------------->

<div class="container-fluid">

    <div class="row-fluid">
        <div class="span4">&nbsp;</div>
        <div class="span4 loader" style="text-align: center">
            <div class="progress progress-striped active" style="display: none">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
        <div class="span4">&nbsp;</div>
    </div>

    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>

    <div class="row-fluid">
        <div id="result"></div>
    </div>

    <div style="border-bottom: 1px #999 dashed; margin-bottom: 20px"></div>


</div>
<!--------------->		



		</div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>


<!--tambahkan custom js disini
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<!--tambahkan custom js disini-->
    
	<script type="text/javascript">

//Combobox agency change		
$("#AgencyID").change(function(){
let AgencyID=$(this).val();	
//console.log(AgencyID);
$.ajax({
	url:'<?=base_url()?>index.php/employee/getSalesCenter',
	method:'POST',
	data:{AgencyID:AgencyID},
	dataType:'json',
	success:function(response){
		//console.log(response);


//----
// Add options Combobox Sales Center
$.each(response,function(index,data){
	$('#SalesCenterID').append('<option value="'+data['SalesCenterID']+'">'+data['SalesCenterName']+'</option>');
	
///RESET ??????????????	
});
//----		
		
	}
	
	
});	
	
	
});

//Generate
const generate = document.getElementById('generate');		
generate.addEventListener('click',function(){
//console.log('click');	

const tgl_awal =document.getElementById('tgl_awal');
const tgl_akhir =document.getElementById('tgl_akhir');
const AgencyID =document.getElementById('AgencyID');
const SalesCenterID =document.getElementById('SalesCenterID');

	
$.ajax({
		type:"POST",
		url:"<?=site_url('employee/getTerminate')?>",
		dataType:"html",
		data:{
			
			tgl_awal:tgl_awal.value,
			tgl_akhir:tgl_akhir.value,
			AgencyID:AgencyID.value,
			SalesCenterID:SalesCenterID.value
			},
		cache:false,
//-----------------
		beforeSend: function(){
		console.log('ajax beforeSend');						
				
		// Show image container
//	    $("#loader").show();
		$("#result").html('<h3>LOADING....</h3>');
		},		
		
//-----------------		
		success:function(data){
		console.log('ajax success');			
//console.log(data);			
//                    $(".loader").fadeIn(500).fadeOut(500).queue(function(){
              $('#result').html(data);
 //                   });			
		},
//-----------------
	complete:function(data){
	console.log('ajax complete');					
			

	//$('#result').html(data);	
    // Hide image container
   // $("#loader").hide();
   }	
	
});	
	
	
});



////excel
const excel = document.getElementById('excel');		
excel.addEventListener('click',function(){
//console.log('click');	

//const bulan =document.getElementById('bulan');
const tgl_awal =document.getElementById('tgl_awal');
const tgl_akhir =document.getElementById('tgl_akhir');
const AgencyID =document.getElementById('AgencyID');
const SalesCenterID =document.getElementById('SalesCenterID');
//const type =document.getElementById('type');
const urls = '<?=site_url('/employee/excel_terminate/')?>/'+tgl_awal.value+'/'+tgl_akhir.value+'/'+AgencyID.value+'/'+SalesCenterID.value;
//const urls = '<?=site_url('/performancedetail_promo/excel/')?>/'+bulan.value+'/'+type.value+'/'+kode_promo.value;
//const urls = '<?=site_url('/performancedetail_promo/excel/')?>';
window.location = urls;
/*
$.ajax({
		type:"POST",
		url:urls,
		dataType:"html",
		data:{tgl_awal:tgl_awal.value,tgl_akhir:tgl_akhir.value,type:type.value},
//		cache:false,
		success:function(data){
console.log('dowbload excel');			

		}
	
});	
*/
	
	
});

//FILTER 2
//========================================
$(function() {
    $('#code').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
        this.setAttribute("minlength", "3");
    });
});

//GENERATE 2 
//Generate
const generate2 = document.getElementById('generate2');		
generate2.addEventListener('click',function(){
//console.log('click');	

const code =document.getElementById('code');

	
$.ajax({
		type:"POST",
		url:"<?=site_url('employee/getTerminate2')?>",
		dataType:"html",
		data:{
			
			code:code.value
			},
		cache:false,
//-----------------
		beforeSend: function(){
		console.log('ajax beforeSend');						
				
		// Show image container
//	    $("#loader").show();
		$("#result").html('<h3>LOADING....</h3>');
		},		
		
//-----------------		
		success:function(data){
		console.log('ajax success');			
//console.log(data);			
//                    $(".loader").fadeIn(500).fadeOut(500).queue(function(){
              $('#result').html(data);
 //                   });			
		},
//-----------------
	complete:function(data){
	console.log('ajax complete');					
			

	//$('#result').html(data);	
    // Hide image container
   // $("#loader").hide();
   }	
	
});	
	
	
});

////excel
const excel2 = document.getElementById('excel2');		
excel2.addEventListener('click',function(){
//console.log('click');	

const code =document.getElementById('code');
//const type =document.getElementById('type');
const urls = '<?=site_url('/employee/excel_terminate2/')?>/'+code.value;
//const urls = '<?=site_url('/performancedetail_promo/excel/')?>/'+bulan.value+'/'+type.value+'/'+kode_promo.value;
//const urls = '<?=site_url('/performancedetail_promo/excel/')?>';
window.location = urls;

});



</script>			



<?php
$this->load->view('template/foot');
?>