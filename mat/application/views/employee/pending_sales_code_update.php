<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
   <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
     <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
     <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css" />

    
    
    


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

<!-- FORM -->
<?php
foreach ($query_employee as $e) {
?>   

   <form class="form-horizontal" action="<?=site_url('employee/save_new_sales_code')?>" method="POST">


        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Nama:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?=$e->EmployeeName?>" readonly>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Agency:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?=$e->AgencyName?>" readonly>
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Sales Center:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?=$e->SalesCenterName?>" readonly>
            </div>
        </div>




        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Posisi:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" value="<?=$e->UserGroupName?>" readonly>
            </div>
        </div>



        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">ID:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="EmployeeID" id="EmployeeID"
                value="<?=$e->EmployeeID?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">    IS MERGING ?  </label>
            <div class="col-xs-3">
    <input type="checkbox" id="chkPassport" />

<hr />		
            </div>
        </div>



<div id="dvPassport" >		
<!-- Employee ID HIDDEN -->
        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Employee New Code(MERGING):</label>
            <div class="col-xs-3">
            <input type="text" class="form-control" name="EmployeeNewCode2" id="EmployeeNewCode2"  />						
            </div>
			
			 <div class="col-xs-2">
               <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">. . .</button>
                    </div>
        </div>

<!-------------------------->
 </div>
        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Employee New Code:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="EmployeeNewCode" id="EmployeeNewCode">
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Active Date:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="ActiveDate"
                value="<?=date('Y-m-d')?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-xs-3" for="Nama">Approval Status:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="ApprovalStatus"
                value="1" readonly>
            </div>
        </div>

 
        <br>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" value="Kirim">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </div>
    </form>
<?php
}
?>

<!-- FORM -->

        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<!---Modal--->
      <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Employee</h4>
                    </div>
                    <div class="modal-body">


 <!--  -->
 <table id="example" class="display responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Extn.</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>
 <!--  -->
                    </div>
                </div>
            </div>
        </div>

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->
        <script type="text/javascript">

		
$(document).ready(function() {
    $('#example').DataTable( {
        //"ajax": "../../../../examples/ajax/data/objects.txt",
        "ajax": 
		
 [
    {
      "id": "1",
      "name": "Tiger Nixon",
      "position": "System Architect",
      "salary": "$320,800",
      "start_date": "2011/04/25",
      "office": "Edinburgh",
      "extn": "5421"
    },
    {
      "id": "2",
      "name": "Garrett Winters",
      "position": "Accountant",
      "salary": "$170,750",
      "start_date": "2011/07/25",
      "office": "Tokyo",
      "extn": "8422"
    },
    {
      "id": "3",
      "name": "Ashton Cox",
      "position": "Junior Technical Author",
      "salary": "$86,000",
      "start_date": "2009/01/12",
      "office": "San Francisco",
      "extn": "1562"
}		
		
		
		,
//--------------------------------		
        "columns": [
            { "data": "name" },
            { "data": "position" },
            { "data": "office" },
            { "data": "extn" },
            { "data": "start_date" },
            { "data": "salary" }
        ]
    } );
} );            
 


//=====================
$(function () {
        $("#chkPassport").click(function () {
            if ($(this).is(":checked")) {
                $("#dvPassport").show();
                $("#AddPassport").hide();
            } else {
                $("#dvPassport").hide();
                $("#AddPassport").show();
            }
        });
    });


        </script>

<script type="text/javascript">
    
$(function() {
    $('#EmployeeNewCode').keyup(function() {
        this.value = this.value.toLocaleUpperCase();
        this.setAttribute("maxlength", "3");
    });
});    



</script>
<?php
$this->load->view('template/foot');
?>

