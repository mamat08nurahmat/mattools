
<!-- <script src="<?= BASE_ASSET; ?>/js/jquery.hotkeys.js"></script>
<script type="text/javascript">
   
</script> -->
<!-- Content Header (Page header) -->

<!-- //  -->
<style>
table.blueTable {
  border: 1px solid #1C6EA4;
  background-color: #EEEEEE;
  width: 80%;
  text-align: left;

}
table.blueTable td, table.blueTable th {
  border: 1px solid #AAAAAA;
  padding: 1px 1px;
}
table.blueTable tbody td {
  font-size: 13px;
  font-weight: bold;  
}
table.blueTable tr:nth-child(even) {
  background: #D0E4F5;
}
table.blueTable thead {
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;
}
table.blueTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {
  /* 
  background: #1C6EA4;
  background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
  border-bottom: 2px solid #444444;    
  */
  font-size: 14px;
  font-weight: bold;
  color:#070B00;
  background: #D0E4F5;
  background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
  border-top: 2px solid #444444; 
}
table.blueTable tfoot td {
  font-size: 14px;
}
/* table.blueTable tfoot .links {
  text-align: right;
} */
/* table.blueTable tfoot .links a{
  display: inline-block;
  background: #1C6EA4;
  color: #FFFFFF;
  padding: 2px 8px;
  border-radius: 5px;
} */

</style>

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


      


<!-- //  -->
<hr>

    <h3>
    <small>Batch : </small> <?=$batch_id;?>
    <br>

    </h3>




<!-- //  -->
<table class="blueTable">
<thead>
<tr>
<th>NO</th>
<th>Y</th>
<th>M</th>
<th>OUTSTANDING</th>
<th>ANGSURAN_POKOK</th>
<th>ANGSURAN_BUNGA</th>
<th>ANGSURAN_TOTAL</th>
</tr>
</thead>

<tbody>

    <?php
    $no=1;
    if(isset($data_generate)){
$nama_bln=array(1=>'January','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember','januari');
//print_r($data_generate[0]['total_dana']);
//-------------
//tr looping
$no=1;
$sum_angsuran_pokok1=0;
$sum_estimasi_angsuran_tarif1=0;

//print_r($data_generate);die();
foreach($data_generate as  $row ){
//print_r($row['bulan']);

	$outstanding_pokok ="Rp. ".number_format(round($row['sum_outstanding'],9),0,',','.');
	$angsuran_pokok ="Rp. ".number_format(round($row['total_dana'],9),0,',','.');
	$estimasi_angsuran_tarif ="Rp. ".number_format(round($row['sum_angsuran_bunga'],9),0,',','.');
	$sisa_pokok ="Rp. ".number_format(round($row['sum_outstanding']-$row['total_dana'],9),0,',','.');

$sum_angsuran_pokok1 +=round($row['total_dana'],9);

$sum_estimasi_angsuran_tarif1 +=round($row['sum_angsuran_bunga'],9);


	$sum_angsuran_pokok ="Rp. ".number_format($sum_angsuran_pokok1,0,',','.');
	$sum_estimasi_angsuran_tarif ="Rp. ".number_format($sum_estimasi_angsuran_tarif1,0,',','.');


/*
*/

    ?>


	<tr class="gradeX">
	<td><?php echo $no; ?></td>
	<td><?php echo $row['tahun']; ?></td>
	<td><?php echo $nama_bln[$row['bulan']]; ?></td>
	<td><?php echo $outstanding_pokok; ?></td>
	<td><?php echo $angsuran_pokok; ?></td>
	<td><?php echo $estimasi_angsuran_tarif; ?></td>
	<td><?php echo $sisa_pokok; ?></td>
   </tr>

  <?php
$no++;
    }
   }
    ?>
<!-- //  -->
<tr>
	<td colspan="4">TOTAL</td>

<!--
	<td><?php// echo currency_format(round($sum_angsuran_pokok,0)); ?></td>
	<td><?php// echo currency_format(round($sum_estimasi_angsuran_tarif,0)); ?></td>
-->
	<td><?php echo $sum_angsuran_pokok; ?></td>
	<td><?php echo $sum_estimasi_angsuran_tarif; ?></td>

	<td></td>

   </tr>
<!-- //  -->
</tbody>
</table>


<!-- //  -->
</section>
<!-- /.content -->
<!-- Page script -->
<script>
    $(document).ready(function(){
                   
    //   $('#btn_cancel').click(function(){
    //     swal({
    //         title: "<?= cclang('are_you_sure'); ?>",
    //         text: "<?= cclang('data_to_be_deleted_can_not_be_restored'); ?>",
    //         type: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#DD6B55",
    //         confirmButtonText: "Yes!",
    //         cancelButtonText: "No!",
    //         closeOnConfirm: true,
    //         closeOnCancel: true
    //       },
    //       function(isConfirm){
    //         if (isConfirm) {
    //           window.location.href = BASE_URL + 'administrator/system_flpp';
    //         }
    //       });
    
    //     return false;
    //   }); /*end btn cancel*/
    
    //   $('.btn_save').click(function(){
    //     $('.message').fadeOut();
            
    //     var form_system_flpp = $('#form_system_flpp');
    //     var data_post = form_system_flpp.serializeArray();
    //     var save_type = $(this).attr('data-stype');

    //     data_post.push({name: 'save_type', value: save_type});
    
    //     $('.loading').show();
    
    //     $.ajax({
    //       url: BASE_URL + '/administrator/system_flpp/add_save',
    //       type: 'POST',
    //       dataType: 'json',
    //       data: data_post,
    //     })
    //     .done(function(res) {
    //       if(res.success) {
            
    //         if (save_type == 'back') {
    //           window.location.href = res.redirect;
    //           return;
    //         }
    
    //         $('.message').printMessage({message : res.message});
    //         $('.message').fadeIn();
    //         resetForm();
    //         $('.chosen option').prop('selected', false).trigger('chosen:updated');
                
    //       } else {
    //         $('.message').printMessage({message : res.message, type : 'warning'});
    //       }
    
    //     })
    //     .fail(function() {
    //       $('.message').printMessage({message : 'Error save data', type : 'warning'});
    //     })
    //     .always(function() {
    //       $('.loading').hide();
    //       $('html, body').animate({ scrollTop: $(document).height() }, 2000);
    //     });
    
    //     return false;
    //   }); /*end btn save*/
      
       
 
       
    
    
    }); /*end doc ready*/
</script>