<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename='$nama_file'.xls");
?>

<!-- <style>
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

</style> -->

<!-- //  -->
<table class="blueTable">
<thead>

<tr>
<th>Nama : </th>
<th><?=$nama_pemohon?></th>
<th>(<?=$no_ktp?>)</th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>

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
foreach($data_array as $r):
?>
<tr>
<td><?=$r['NO']?></td>
<td><?=$r['Y']?></td>
<td><?=$r['M']?></td>
<td><?=$r['OUTSTANDING']?></td>
<td><?=$r['ANGSURAN_POKOK']?></td>
<td><?=$r['ANGSURAN_BUNGA']?></td>
<td><?=$r['ANGSURAN_TOTAL']?></td>
</tr>
<?php
endforeach;
?>
</tbody>
</table>
