<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
<?php
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        PNSC
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
		
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Agency</th>
                <th>Sales Center</th>
<!---
-->			
                <th>Nama</th>
                <th>Tgl Lahir</th>
                <th>Posisi</th>
                <th>Tgl Interview</th>
                <th>SLI</th>
<!---
--->				
				<th>ACT</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Agency</th>
                <th>Sales Center</th>
                <th>Nama</th>
<!---
-->			
                <th>Tgl Lahir</th>
                <th>Posisi</th>
                <th>Tgl Interview</th>
                <th>SLI</th>
<!---
-->				
				<th>ACT</th>
            </tr>
        </tfoot>
    </table>
		
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
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;


$(document).ready(function() {
/*
    $('#example').DataTable( {
        "ajax": "<?php echo site_url('employee/ajax_pnsc')?>",
//		"ajax": "<?php echo base_url('data/arrays.txt')?>",	//dummy data dev	
        "deferRender": true
    } );
} );
*/	
//=============================



    //datatables
    table = $('#example').DataTable({ 

	
        "ajax": "<?php echo site_url('employee/ajax_list_ahp')?>",
//		"ajax": "<?php echo base_url('data/arrays.txt')?>",	//dummy data dev	
        "deferRender": true,
	
	rowCallback: function(row, data, index){
  	if(data[6]<= 2){
    	$(row).find('td:eq(6)').css('background-color', 'green');
    }
	else if(data[6]==3){
    	$(row).find('td:eq(6)').css('background-color', 'yellow');		
	}
	else{
		$(row).find('td:eq(6)').css('background-color', 'red');
	}

   }	
	
    });

/*
 table = $('#example').DataTable({ 
	rowCallback: function(row, data, index){
  	if(data[6]> 3){
    	$(row).find('td:eq(6)').css('color', 'red');
    }
    if(data[2].toUpperCase() == 'EE'){
    	$(row).find('td:eq(2)').css('color', 'blue');
    }
  }
});
*/	
	
	

	    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

	

 });


 
 function reload_table(){
    table.ajax.reload(null,false); //reload datatable ajax 
}




function edit_employee(id)
{
//console.log(id); //ok
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('employee/ajax_edit_asp/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
console.log(data);			
            $('[name="AgencyName"]').val(data.AgencyName);
            $('[name="SalesCenterName"]').val(data.SalesCenterName);
            $('[name="EmployeeName"]').val(data.EmployeeName);
            $('[name="UserGroupName"]').val(data.UserGroupName);
/*
*/
            $('[name="ApprovedDate"]').val(data.ApprovedDate);
            $('[name="UserName"]').val(data.UserName);
            $('[name="ApprovedRemark"]').val(data.ApprovedRemark);

//            $('[name="address"]').val(data.address);
//            $('[name="dob"]').datepicker('update',data.dob);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit employee'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
/*
*/	
}


function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
console.log('save..............');		
//        url = "<?php echo site_url('employee/ajax_add')?>";
    } else {
console.log('update..............');		
		
        url = "<?php echo site_url('employee/ajax_update_asp')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }

            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}



 
</script>






<?php
$this->load->view('template/foot');
?>




<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">employee Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="EmployeeID"/> 
                    <div class="form-body">
					
					
					
					
					
					
                        <div class="form-group">
                            <label class="control-label col-md-3">Agency</label>
                            <div class="col-md-9">
                                <input name="AgencyName" placeholder="AgencyName" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3">Sales Center</label>
                            <div class="col-md-9">
                                <input name="SalesCenterName" placeholder="SalesCenterName" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>

	                        <div class="form-group">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-9">
                                <input name="EmployeeName" placeholder="Employee Name" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
					
                        <div class="form-group">
                            <label class="control-label col-md-3">Posisi</label>
                            <div class="col-md-9">
                                <input name="UserGroupName" placeholder="Posisi" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
					
						
				<h3>Hasil Interview Sebelumnya</h3>

                        <div class="form-group">
                            <label class="control-label col-md-3">Tgl Interview</label>
                            <div class="col-md-9">
                                <input name="ApprovedDate" placeholder="ApprovedDate" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
				
				
                        <div class="form-group">
                            <label class="control-label col-md-3">Interview Oleh</label>
                            <div class="col-md-9">
                                <input name="UserName" placeholder="UserName" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
				

                        <div class="form-group">
                            <label class="control-label col-md-3">Hasil Interview</label>
                            <div class="col-md-9">
                                <input name="ApprovedRemark" placeholder="ApprovedRemark" class="form-control" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                        </div>
				
				
				
				<h3>Keputusan</h3>				
				
                        <div class="form-group">
                            <label class="control-label col-md-3">Tanggal Keputusan</label>
                            <div class="col-md-9">
                                <input name="TanggalKeputusan" placeholder="yyyy-mm-dd" class="form-control datepicker" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>						

                        <div class="form-group">
                            <label class="control-label col-md-3">Rekomendasi</label>
                            <div class="col-md-9">
							<select name="rekomendasi" class="form-control">
							<option>-</option>
							<option value="1">Approve</option>
							<option value="2">Decline</option>
							<option value="3">Hold - Tidak Datang</option>
							<option value="4">Hold - Dokumen Tidak Lengkap</option>
							<option value="5">Hold - Data Tidak Sesuai</option>
							</select>

							<span class="help-block"></span>
                            </div>
                        </div>						

                        <div class="form-group">
                            <label class="control-label col-md-3">Keterangan</label>
                            <div class="col-md-9">
                                <textarea name="keterangan"  class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>						
						
						
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->