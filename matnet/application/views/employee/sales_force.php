

        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <div class='box'>
			  
                <div class='box-header'>
                  <h3 class='box-title'>SALES FORCE <?//php echo anchor('performancedetail/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
		<?//php echo anchor(site_url('performancedetail/excel'), ' <i class="fa fa-file-excel-o"></i> Excel', 'class="btn btn-primary btn-sm"'); ?>
		<?//php echo anchor(site_url('performancedetail/word'), '<i class="fa fa-file-word-o"></i> Word', 'class="btn btn-primary btn-sm"'); ?>
		<?//php echo anchor(site_url('performancedetail/pdf'), '<i class="fa fa-file-pdf-o"></i> PDF', 'class="btn btn-primary btn-sm"'); ?></h3>
                </div>
				<!-- /.box-header -->
				

<!---FILTER--->
<!---FILTER---->
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" > 
					CEK SALES FORCE
				</h3>
            </div>
			

<div class="panel-body">
			

 <form class="form-horizontal" action="/action_page.php">

   <div class="form-group">
    <label class="control-label col-sm-2" for="email">CEK KTP:</label>
    <div class="col-sm-2">
      <input type="text" class="form-control" id="KTP" placeholder="Enter KTP" maxlength="15">
    </div>
    <div class="col-sm-2">
      <button type="button" id="Cek" class="btn btn-default">Cek</button>
    </div>
  </div>

<!--result Employee---> 

<div id="result_employee"></div>
<!--result Employee--->   


  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-3">
      <button type="button" id="Generate" class="btn btn-default">PROSES</button>
    </div>
  </div>
</form> 
	
</div>
									
        </div>			
<!---FILTER--->				
<!---FILTER--->					
				
                <div class='box-body'>
				

<!--LOAD TABLE---->		
<div id="result_tabel"></div>
<!--LOAD TABLE---->		
		
		
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>

<script type="text/javascript">

//TOMBOL CEK KTP
const cek_btn = document.getElementById('Cek');		
const KTP = document.getElementById('KTP');		
//KLIK CEK EmployeeNewCode
cek_btn.addEventListener('click',function(){
//console.log('cekkkkk'+KTP.value);	
$.ajax({
	
	url:'<?=base_url()?>index.php/Employee/getCekKTP',
	method:'POST',
	data:{KTP:KTP.value}	
	
	
}).done(function(hasil){
//console.log(hasil);	
	$('#result_employee').html(hasil);
});	
/*
*/	


});



/*
$(document).ready(function () {
$("#mytable").dataTable(); //DataTabel LOAD


//---
//tampilTabel(); //Panggil fungsi tampil tabel
	
	
});

*/


		
    
        </script>
		
                    </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->				
				
				
