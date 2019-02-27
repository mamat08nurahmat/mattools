<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->

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


<!--body-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Custom Filter : </h3>
            </div>
            
            <div class="panel-body">
            
<form id="form-filter" class="form-horizontal">
                            
                       <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">BULAN</label>
                        <div class="col-sm-4">
                            <select id="bulan" name="bulan" class="form-control">
                            <option value="1">JANUARI</option>
                            <option value="2">FEBRUARI</option>
                            <option value="3">MARET</option>
                            <option value="4">APRIL</option>
                            <option value="5">MEI</option>
                            <option value="6">JUNI</option>
                            <option value="7">JULI</option>
                            <option value="8">AGUSTUS</option>
                            <option value="9">SEPTEMBER</option>
                            <option value="10">OKTOBER</option>
                            <option value="11">NOVEMBER</option>
                            <option value="12">DESEMBER</option>
                            
                            </select>
                        </div>

                                                
                    </div>
                    
                    
                    
                                        <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">Kode Promo</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_promo">
<button type="button" id="cek" class="btn btn-primary">CEK</button>                         
                        </div>
                    </div>


                    <div id="CekPromo"></div>

<!--
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Promo Name : XXXXX</label>
                        <label  class="col-sm-2 control-label">Start Date : 12-12-2018</label>
                        <label  class="col-sm-2 control-label">End Date   :12-12-2018</label>
                        <div class="col-sm-6">
                        </div>
                    </div>
-->

                    
 <div class="form-group">
                        <label for="Type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="type">
                            <option value="A">Approval</option>
                            <option value="I">Incoming</option>
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
    
            
<!--
  <form id="form-filter" class="form-horizontal">
                            
 <div class="container">

 
  <div class="row">

    <div class="col-sm-6" >
                       <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">BULAN</label>
                        <div class="col-sm-4">
                            <select id="bulan" name="bulan" class="form-control">
                            <option value="1">JANUARI</option>
                            <option value="2">FEBRUARI</option>
                            <option value="3">MARET</option>
                            <option value="4">APRIL</option>
                            <option value="5">MEI</option>
                            <option value="6">JUNI</option>
                            <option value="7">JULI</option>
                            <option value="8">AGUSTUS</option>
                            <option value="9">SEPTEMBER</option>
                            <option value="10">OKTOBER</option>
                            <option value="11">NOVEMBER</option>
                            <option value="12">DESEMBER</option>
                            
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">Kode Promo</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_promo">
<button type="button" id="cek" class="btn btn-primary">CEK</button>                         
                        </div>
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="Type" class="col-sm-2 control-label">Type</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="type">
                            <option value="A">Approval</option>
                            <option value="I">Incoming</option>
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

    </div>


    <div class="col-sm-6" >

                    
                    <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">Kode Promo</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_promo">
                        </div>
                    </div>
                                        
                    <div class="form-group">
                        <label for="TanggalAkhir" class="col-sm-2 control-label">Kode Promo</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="kode_promo">
                        </div>
                    </div>
                        
    
    </div>
  </div>
</div>
                </form>
-->                 
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
<!-------------->       


<!--body-->



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


    <script type="text/javascript">
//UPPERCASE KODE PROMO
$(function() {
    $('#kode_promo').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
        this.setAttribute("maxlength", "3");
    });
});


//CEK
const kode_promo =document.getElementById('kode_promo');
const cek_btn = document.getElementById('cek');

cek_btn.addEventListener('click',function(){
    
//console.log('cekkkkkkkkkkkkkkkkkk');  
$.ajax({
    
    type:'POST',
    url:"<?=site_url('performancedetail/cekKode')?>",
    dataType:"html",
    data:{kode_promo:kode_promo.value},
    success:function(data){
        console.log(data);
          $('#CekPromo').html(data);
    }
    
    
}); 
    
    
    
});


const generate = document.getElementById('generate');       
const excel = document.getElementById('excel');     

generate.addEventListener('click',function(){
//console.log('click'); 

//const tgl_awal =document.getElementById('tgl_awal');
//const tgl_akhir =document.getElementById('tgl_akhir');
const tgl_akhir =document.getElementById('bulan');
const kode_promo =document.getElementById('kode_promo');
const type =document.getElementById('type');
    
$.ajax({
        type:"POST",
        url:"<?=site_url('performancedetail/getData')?>",
        dataType:"html",
        data:{
            
            bulan:bulan.value,
            type:type.value,
            kode_promo:kode_promo.value},
        cache:false,
//-----------------
        beforeSend: function(){
        console.log('ajax beforeSend');                     
                
        // Show image container
//      $("#loader").show();
        $("#result").html('<h3>LOADING....</h3>');
        },      
        
//-----------------     
        success:function(data){
        console.log('ajax success');            
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
excel.addEventListener('click',function(){
//console.log('click'); 

const bulan =document.getElementById('bulan');
const kode_promo =document.getElementById('kode_promo');
const type =document.getElementById('type');
//const urls = '<?=site_url('/performancedetail/excel/')?>/'+tgl_awal.value+'/'+tgl_akhir.value+'/'+type.value;
const urls = '<?=site_url('/performancedetail/excel/')?>/'+bulan.value+'/'+type.value+'/'+kode_promo.value;
//const urls = '<?=site_url('/performancedetail/excel/')?>';
window.location = urls;
/*
$.ajax({
        type:"POST",
        url:urls,
        dataType:"html",
        data:{tgl_awal:tgl_awal.value,tgl_akhir:tgl_akhir.value,type:type.value},
//      cache:false,
        success:function(data){
console.log('dowbload excel');          

        }
    
}); 
*/
    
    
});
</script>           


<?php
$this->load->view('template/foot');
?>