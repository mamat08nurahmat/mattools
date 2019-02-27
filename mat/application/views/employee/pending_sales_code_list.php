<?php 
$this->load->view('template/head');
?>
<!--tambahkan custom css disini-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

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
      

<!-- TABEL -->
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Agency</th>
                <th>Sales Center</th>
                <th>Nama</th>
                <th>Tgl lahir</th>
                <th>Posisi</th>
                <th>Kode Sales</th>
                <th>Act</th>
            </tr>
        </thead>
        <tbody>

        <?php

foreach ($query_employee as $e) {
        ?>

             <tr>
                <td><?=$e->AgencyName?></td>
                <td><?=$e->SalesCenterName?></td>
                <td><?=$e->EmployeeName?></td>
                <td><?=$e->EmployeeBirthDate?></td>
                <td><?=$e->UserGroupName?></td>
                <td><?=$e->EmployeeNewCode?></td>
                <td><a href="<?=site_url("employee/update_new_sales_code/".$e->EmployeeID)?>"><button class="btn btn-primary">Update</button></a></td>
            </tr>


<?php
}

?>        

<!--             <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
                <td><button>xxx</button></td>
            </tr>
 -->
        </tbody>
        <tfoot>
            <tr>
                <th>Agency</th>
                <th>Sales Center</th>
                <th>Nama</th>
                <th>Tgl lahir</th>
                <th>Posisi</th>
                <th>Kode Sales</th>
                <th>Act</th>
            </tr>
        </tfoot>
    </table>
<!-- TABEL -->


        </div><!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div><!-- /.box-footer-->
    </div><!-- /.box -->

</section><!-- /.content -->

<?php 
$this->load->view('template/js');
?>
<!--tambahkan custom js disini-->

    <!-- https://code.jquery.com/jquery-3.3.1.js -->
    
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    
$(document).ready(function() {
    $('#example').DataTable();
} );

</script>

<?php
$this->load->view('template/foot');
?>