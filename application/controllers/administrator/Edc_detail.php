<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Edc Detail Controller
*| --------------------------------------------------------------------------
*| Edc Detail site
*|
*/
class Edc_detail extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_edc_detail');
	}

	/**
	* show all Edc Details
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('edc_detail_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['edc_details'] = $this->model_edc_detail->get($filter, $field, $this->limit_page, $offset);
		$this->data['edc_detail_counts'] = $this->model_edc_detail->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/edc_detail/index/',
			'total_rows'   => $this->model_edc_detail->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Edc Detail List');
		$this->render('backend/standart/administrator/edc_detail/edc_detail_list', $this->data);
	}
	
	/**
	* Add new edc_details
	*
	*/
	public function add()
	{
		$this->is_allowed('edc_detail_add');

		$this->template->title('Edc Detail New');
		$this->render('backend/standart/administrator/edc_detail/edc_detail_add', $this->data);
	}

	/**
	* Add New Edc Details
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('edc_detail_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];

			
			$save_edc_detail = $this->model_edc_detail->store($save_data);

			if ($save_edc_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_edc_detail;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/edc_detail/edit/' . $save_edc_detail, 'Edit Edc Detail'),
						anchor('administrator/edc_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/edc_detail/edit/' . $save_edc_detail, 'Edit Edc Detail')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/edc_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/edc_detail');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Edc Details
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('edc_detail_update');

		$this->data['edc_detail'] = $this->model_edc_detail->find($id);

		$this->template->title('Edc Detail Update');
		$this->render('backend/standart/administrator/edc_detail/edc_detail_update', $this->data);
	}

	/**
	* Update Edc Details
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('edc_detail_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];

			
			$save_edc_detail = $this->model_edc_detail->change($id, $save_data);

			if ($save_edc_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/edc_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/edc_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/edc_detail');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Edc Details
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('edc_detail_delete');

		$this->load->helper('file');

		$arr_id = $this->input->get('id');
		$remove = false;

		if (!empty($id)) {
			$remove = $this->_remove($id);
		} elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				$remove = $this->_remove($id);
			}
		}

		if ($remove) {
            set_message(cclang('has_been_deleted', 'edc_detail'), 'success');
        } else {
            set_message(cclang('error_delete', 'edc_detail'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Edc Details
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('edc_detail_view');

		$this->data['edc_detail'] = $this->model_edc_detail->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Edc Detail Detail');
		$this->render('backend/standart/administrator/edc_detail/edc_detail_view', $this->data);
	}
	
	/**
	* delete Edc Details
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$edc_detail = $this->model_edc_detail->find($id);

		
		
		return $this->model_edc_detail->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('edc_detail_export');

		$this->model_edc_detail->export('edc_detail', 'edc_detail');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('edc_detail_export');

		$this->model_edc_detail->pdf('edc_detail', 'edc_detail');
	}

	// dev
	public function report(){


		// $this->data['no_ktp'] = $ktp;

		$this->template->title('Mismer Detail DEV');
		$this->render('backend/standart/administrator/edc_detail/edc_detail_report', $this->data);
	


	}

	//generate1 
//klik generate action ajax
public function get_generate1($bulan,$tahun,$type){


	// $this->data['no_ktp'] = $ktp;

// $report = $this->model_Report->get_report($bulan,$tahun);
$report = $this->model_edc_detail->getresult1($bulan,$tahun,$type);

// print_r($report);die();

$tabel_result1='';
$tabel_result1.='
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
  font-size: 10px;
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
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {

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


</style>
	

 ';
$tabel_result1.='
<button type="button" id="export1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'"  class="">Export</button>			
';
$tabel_result1.='
<table class="blueTable">
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">TOTAL</th>
<th width="10%">#</th>
</tr>
</thead>

<tbody>


';
$total=0;
foreach($report as $r):

$total+=$r->JUM_TOT;
$tabel_result1.='
<tr>
<td>'.$r->TYPE_MID.'</td>
<td>'.$r->WILAYAH.'</td>
<td>'.$r->TAHUN.'</td>
<td>'.$r->BULAN.'</td>
<td>'.$r->JUM_TOT.'</td>
<td>
<button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" dataTYPE_MID="'.$r->TYPE_MID.'" class="">Detail</button>			
</td>
</tr>

';

endforeach;

// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

$tabel_result1.='
</tbody>
<tfoot>
<tr >
<td colspan="4">TOTAL</td>
<td>'.$total.'</td>
<td></td>
</tr>
</tfoot>
';

$tabel_result1.='
</table>


';

// $tabel_result1.=$bulan.'----'.$tahun;


echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}

	//klik modal dari generate1
	//get Modal result 1
	public function getModalResult1($tahun,$bulan,$wilayah,$TYPE_MID){

		// $query = $this->model_Report->getModal($tahun,$bulan,$wilayah);
		$query = $this->model_edc_detail->getModalResult1($tahun,$bulan,$wilayah,$TYPE_MID);
			// print_r($query);die();
			
			$tabel='';
			
			
			
			// -------------
			$tabel.='
			<div class="modal-content">
		
					<div class="modal-header">
		<center>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
		<h5 class="modal-title" id="myModalLabel">Bulan :  '.$bulan.'  Tahun : '.$tahun.'</h5>
		</center>
					</div>
					<div class="modal-body">
			 ';
		// -------------
		
			$tabel.='
			<center>
			<table class="blueTable">		
			<thead>
				 <tr>
		
	  					<th>TYPE_MID</th>
	          			<th>WILAYAH</th>
						<th>CHANNEL</th>
						<th>JUMLAH</th>
		
				 </tr>
			</thead>';
			$total=0;
		foreach($query as $q ):
			$total+=$q->JUM_TOT;
			$tabel.='
			<tbody>
			<tr>
			<td>'.$q->TYPE_MID.'</td>
			<td>'.$q->WILAYAH.'</td>
			<td>'.$q->CHANNEL.'</td>
			<td>'.$q->JUM_TOT.'</td>
			</tr>
			</tbody>
			
			';

		endforeach;

		
		// 	$tabel.='
		// 			<tbody>';
		
		// 			$tot=0;
		// 			$tot1=0;
		// 			$tot2=0;
		// 			$total=0;
		
		
		// 	foreach ($query as $q) {
		// $jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;
		
		// $tot1+=$q->JUMLAH_EDC;
		// $tot2+=$q->JUMLAH_YAP;
		
		// $total =$tot1+$tot2;
		
		// 			$tabel.='
		// <tr>
		
		// 			<td>'.$q->CHANNEL.'</td>
		// 			<td></td>
		// 			<td>'.$q->JUMLAH_EDC.'</td>
		// 			<td></td>
		// </tr>';
		
		// }
		
		
		// $tabel.='</tbody>';
		
		$tabel.='
		<tfoot>
		<tr>
		<td colspan="3">TOTAL</td>
		<td>'.$total.'</td>
		</tr>
		</tfoot>
		';
		
		$tabel.='
			</table>
			</center>		
			';
		// ------------
		
		$tabel.='
		
		</div>
		
		
		</div>
			';
		
		
		echo $tabel;
		}	

//export excel
//generate1 
//klik generate action ajax
public function get_export1($bulan,$tahun){


	// $this->data['no_ktp'] = $ktp;

// $report = $this->model_Report->get_report($bulan,$tahun);
$report = $this->model_edc_detail->getExport1($bulan,$tahun);

// print_r($report);die();

$tabel_result1='';

header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=REPORT_MISMER_".$bulan."-".$tahun.".xls");

// $tabel_result1 .= '
// header("Content-Disposition: attachment; filename=sss.xls")';

// $tabel_result1.='
// <style>
// table.blueTable {
//   border: 1px solid #1C6EA4;
//   background-color: #EEEEEE;
//   width: 80%;
//   text-align: left;

// }
// table.blueTable td, table.blueTable th {
//   border: 1px solid #AAAAAA;
//   padding: 1px 1px;
// }
// table.blueTable tbody td {
//   font-size: 10px;
//   font-weight: bold;  
// }
// table.blueTable tr:nth-child(even) {
//   background: #D0E4F5;
// }
// table.blueTable thead {
//   background: #1C6EA4;
//   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   border-bottom: 2px solid #444444;
// }
// table.blueTable thead th {
//   font-size: 10px;
//   font-weight: bold;
//   color: #FFFFFF;
//   border-left: 2px solid #D0E4F5;
// }
// table.blueTable thead th:first-child {
//   border-left: none;
// }

// table.blueTable tfoot {

//   font-size: 14px;
//   font-weight: bold;
//   color:#070B00;
//   background: #D0E4F5;
//   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   border-top: 2px solid #444444; 
// }
// table.blueTable tfoot td {
//   font-size: 14px;
// }


// </style>
	

// ';

$tabel_result1.='
<table border=1>
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">CHANNEL</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">JUMLAH</th>
</tr>
</thead>


';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->TYPE_MID.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->CHANNEL.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	<td>'.$r->JUM_TOT.'</td>
	</tr>
	';	

endforeach;	

// <tbody>


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</table>


';

echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}




//-------------------------------------------------
//generate2 
//klik generate action ajax
public function get_generate2($tgl_awal,$tgl_akhir,$type2){


$tgl_awal= date("Y-m-d",strtotime($tgl_awal));
$tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));

// $report = $this->model_Report->get_report_between($tgl_awal,$tgl_akhir);
$report = $this->model_edc_detail->getResult2($tgl_awal,$tgl_akhir,$type2);
// print_r($report);die();


$tabel_result1='';
$tabel_result1.='

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
  font-size: 10px;
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
  font-size: 10px;
  font-weight: bold;
  color: #FFFFFF;
  border-left: 2px solid #D0E4F5;
}
table.blueTable thead th:first-child {
  border-left: none;
}

table.blueTable tfoot {

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


</style>	

';
$tabel_result1.='
<button type="button" id="export2" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'"  class=""   >Export2</button>			
';
$tabel_result1.='


<table class="blueTable">
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">JUMLAH</th>
<th width="10%">#</th>
</tr>
</thead>


<tbody>
';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->TYPE_MID.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	<td>'.$r->JUM_TOT.'</td>
	<td>
	<button type="button" id="detail_modal2" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" dataTYPE_MID="'.$r->TYPE_MID.'" class="">Detail</button>			
	</td>
	</tr>
	';	
endforeach;	


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	
// // 
// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal2" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" class=""   >Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</tbody>
</table>


';

echo $tabel_result1;


}


	//klik modal dari generate2
	//get Modal result 2
	public function getModalResult2($tgl_awal,$tgl_akhir,$wilayah,$TYPE_MID){

		// $query = $this->model_Report->getModal($tahun,$bulan,$wilayah);
		$query = $this->model_edc_detail->getModalResult2($tgl_awal,$tgl_akhir,$wilayah,$TYPE_MID);
			// print_r($query);die();
			
			$tabel='';
			
			
			
			// -------------
			$tabel.='
			<div class="modal-content">
		
					<div class="modal-header">
		<center>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
		<h5 class="modal-title" id="myModalLabel">Bulan :  '.$tgl_awal.'  Tahun : '.$tgl_akhir.'</h5>
		</center>
					</div>
					<div class="modal-body">
			 ';
		// -------------
		
			$tabel.='
			<center>
			<table class="blueTable">		
			<thead>
				 <tr>
		
	  					<th>TYPE_MID</th>
	          			<th>WILAYAH</th>
						<th>CHANNEL</th>
						<th>TOTAL</th>
		
				 </tr>
			</thead>';
			$total=0;
		foreach($query as $q ):
			$total+=$q->JUM_TOT;
			$tabel.='
			<tbody>
			<tr>
			<td>'.$q->TYPE_MID.'</td>
			<td>'.$q->WILAYAH.'</td>
			<td>'.$q->CHANNEL.'</td>
			<td>'.$q->JUM_TOT.'</td>
			</tr>
			</tbody>
			
			';

		endforeach;

		
		// 	$tabel.='
		// 			<tbody>';
		
		// 			$tot=0;
		// 			$tot1=0;
		// 			$tot2=0;
		// 			$total=0;
		
		
		// 	foreach ($query as $q) {
		// $jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;
		
		// $tot1+=$q->JUMLAH_EDC;
		// $tot2+=$q->JUMLAH_YAP;
		
		// $total =$tot1+$tot2;
		
		// 			$tabel.='
		// <tr>
		
		// 			<td>'.$q->CHANNEL.'</td>
		// 			<td></td>
		// 			<td>'.$q->JUMLAH_EDC.'</td>
		// 			<td></td>
		// </tr>';
		
		// }
		
		
		// $tabel.='</tbody>';
		
		$tabel.='
		<tfoot>
		<tr>
		<td colspan="3">TOTAL</td>
		<td>'.$total.'</td>
		</tr>
		</tfoot>
		';
		
		$tabel.='
			</table>
			</center>		
			';
		// ------------
		
		$tabel.='
		
		</div>
		
		
		</div>
			';
		
		
		echo $tabel;
		}	


//export excel
//generate2 
//klik generate action ajax
public function get_export2($tgl_awal,$tgl_akhir){


	// $this->data['no_ktp'] = $ktp;

// $report = $this->model_Report->get_report($bulan,$tahun);
$report = $this->model_edc_detail->getExport2($tgl_awal,$tgl_akhir);

// print_r($report);die();

$tabel_result1='';

header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=REPORT_MISMER_".$tgl_awal."-".$tgl_akhir.".xls");

// $tabel_result1 .= '
// header("Content-Disposition: attachment; filename=sss.xls")';

// $tabel_result1.='
// <style>
// table.blueTable {
//   border: 1px solid #1C6EA4;
//   background-color: #EEEEEE;
//   width: 80%;
//   text-align: left;

// }
// table.blueTable td, table.blueTable th {
//   border: 1px solid #AAAAAA;
//   padding: 1px 1px;
// }
// table.blueTable tbody td {
//   font-size: 10px;
//   font-weight: bold;  
// }
// table.blueTable tr:nth-child(even) {
//   background: #D0E4F5;
// }
// table.blueTable thead {
//   background: #1C6EA4;
//   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   border-bottom: 2px solid #444444;
// }
// table.blueTable thead th {
//   font-size: 10px;
//   font-weight: bold;
//   color: #FFFFFF;
//   border-left: 2px solid #D0E4F5;
// }
// table.blueTable thead th:first-child {
//   border-left: none;
// }

// table.blueTable tfoot {

//   font-size: 14px;
//   font-weight: bold;
//   color:#070B00;
//   background: #D0E4F5;
//   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   border-top: 2px solid #444444; 
// }
// table.blueTable tfoot td {
//   font-size: 14px;
// }


// </style>
	

// ';

$tabel_result1.='
<table border=1>
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">CHANNEL</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">JUMLAH</th>
</tr>
</thead>


';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->TYPE_MID.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->CHANNEL.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	<td>'.$r->JUM_TOT.'</td>
	</tr>
	';	

endforeach;	

// <tbody>


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</table>


';

echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}		




//export excel edc_unmatch 
//klik generate action ajax
public function get_export_edc_unmatch($tahun,$bulan){


	// $this->data['no_ktp'] = $ktp;


$report = $this->model_edc_detail->getExportEDCUnmatch($tahun,$bulan);

// print_r($report);die();

$tabel_result1='';

header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=EDC_UNMATCH_".$tahun."-".$bulan.".xls");

// $tabel_result1 .= '
// header("Content-Disposition: attachment; filename=sss.xls")';

// $tabel_result1.='
// <style>
// table.blueTable {
//   border: 1px solid #1C6EA4;
//   background-color: #EEEEEE;
//   width: 80%;
//   text-align: left;

// }
// table.blueTable td, table.blueTable th {
//   border: 1px solid #AAAAAA;
//   padding: 1px 1px;
// }
// table.blueTable tbody td {
//   font-size: 10px;
//   font-weight: bold;  
// }
// table.blueTable tr:nth-child(even) {
//   background: #D0E4F5;
// }
// table.blueTable thead {
//   background: #1C6EA4;
//   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   border-bottom: 2px solid #444444;
// }
// table.blueTable thead th {
//   font-size: 10px;
//   font-weight: bold;
//   color: #FFFFFF;
//   border-left: 2px solid #D0E4F5;
// }
// table.blueTable thead th:first-child {
//   border-left: none;
// }

// table.blueTable tfoot {

//   font-size: 14px;
//   font-weight: bold;
//   color:#070B00;
//   background: #D0E4F5;
//   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   border-top: 2px solid #444444; 
// }
// table.blueTable tfoot td {
//   font-size: 14px;
// }


// </style>
	

// ';

$tabel_result1.='
<table border=1>
<thead>
<tr>
<th width="10%">MID</th>
<th width="10%">MERCHANT_DBA_NAME</th>
<th width="10%">MSO</th>
<th width="10%">SOURCE_CODE</th>
<th width="10%">WILAYAH</th>
<th width="10%">CHANNEL</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
</tr>
</thead>


';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->MID.'</td>
	<td>'.$r->MERCHANT_DBA_NAME.'</td>
	<td>'.$r->MSO.'</td>
	<td>'.$r->SOURCE_CODE.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->CHANNEL.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	</tr>
	';	

endforeach;	

// <tbody>


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</table>


';

echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}		

public function get_download1($bulan,$tahun,$type){


	// $this->data['no_ktp'] = $ktp;

// $report = $this->model_Report->get_report($bulan,$tahun);
// $report = $this->model_edc_detail->getExport1($bulan,$tahun);
$report = $this->model_edc_detail->getresult1($bulan,$tahun,$type);

// print_r($report);die();

$tabel_result1='';

header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=REPORT_MISMER_".$bulan."-".$tahun.".xls");

// $tabel_result1 .= '
// header("Content-Disposition: attachment; filename=sss.xls")';

// $tabel_result1.='
// <style>
// table.blueTable {
//   border: 1px solid #1C6EA4;
//   background-color: #EEEEEE;
//   width: 80%;
//   text-align: left;

// }
// table.blueTable td, table.blueTable th {
//   border: 1px solid #AAAAAA;
//   padding: 1px 1px;
// }
// table.blueTable tbody td {
//   font-size: 10px;
//   font-weight: bold;  
// }
// table.blueTable tr:nth-child(even) {
//   background: #D0E4F5;
// }
// table.blueTable thead {
//   background: #1C6EA4;
//   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   border-bottom: 2px solid #444444;
// }
// table.blueTable thead th {
//   font-size: 10px;
//   font-weight: bold;
//   color: #FFFFFF;
//   border-left: 2px solid #D0E4F5;
// }
// table.blueTable thead th:first-child {
//   border-left: none;
// }

// table.blueTable tfoot {

//   font-size: 14px;
//   font-weight: bold;
//   color:#070B00;
//   background: #D0E4F5;
//   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   border-top: 2px solid #444444; 
// }
// table.blueTable tfoot td {
//   font-size: 14px;
// }


// </style>
	

// ';

$tabel_result1.='
<table border=1>
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">JUMLAH</th>
</tr>
</thead>


';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->TYPE_MID.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	<td>'.$r->JUM_TOT.'</td>
	</tr>
	';	

endforeach;	

// <tbody>


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</table>


';

echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}


public function get_download2($tgl_awal,$tgl_akhir,$type2){


	// $this->data['no_ktp'] = $ktp;

// $report = $this->model_Report->get_report($bulan,$tahun);
// $report = $this->model_edc_detail->getExport1($bulan,$tahun);
$report = $this->model_edc_detail->getresult2($tgl_awal,$tgl_akhir,$type2);

// print_r($report);die();

$tabel_result1='';

header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=REPORT_MISMER_".$tgl_awal."-".$tgl_akhir.".xls");

// $tabel_result1 .= '
// header("Content-Disposition: attachment; filename=sss.xls")';

// $tabel_result1.='
// <style>
// table.blueTable {
//   border: 1px solid #1C6EA4;
//   background-color: #EEEEEE;
//   width: 80%;
//   text-align: left;

// }
// table.blueTable td, table.blueTable th {
//   border: 1px solid #AAAAAA;
//   padding: 1px 1px;
// }
// table.blueTable tbody td {
//   font-size: 10px;
//   font-weight: bold;  
// }
// table.blueTable tr:nth-child(even) {
//   background: #D0E4F5;
// }
// table.blueTable thead {
//   background: #1C6EA4;
//   background: -moz-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: -webkit-linear-gradient(top, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   background: linear-gradient(to bottom, #5592bb 0%, #327cad 66%, #1C6EA4 100%);
//   border-bottom: 2px solid #444444;
// }
// table.blueTable thead th {
//   font-size: 10px;
//   font-weight: bold;
//   color: #FFFFFF;
//   border-left: 2px solid #D0E4F5;
// }
// table.blueTable thead th:first-child {
//   border-left: none;
// }

// table.blueTable tfoot {

//   font-size: 14px;
//   font-weight: bold;
//   color:#070B00;
//   background: #D0E4F5;
//   background: -moz-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: -webkit-linear-gradient(top, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   background: linear-gradient(to bottom, #dcebf7 0%, #d4e6f6 66%, #D0E4F5 100%);
//   border-top: 2px solid #444444; 
// }
// table.blueTable tfoot td {
//   font-size: 14px;
// }


// </style>
	

// ';

$tabel_result1.='
<table border=1>
<thead>
<tr>
<th width="10%">TYPE_MID</th>
<th width="10%">WILAYAH</th>
<th width="10%">TAHUN</th>
<th width="10%">BULAN</th>
<th width="10%">JUMLAH</th>
</tr>
</thead>


';

foreach($report as $r):

	$tabel_result1.='
	<tr>
	<td>'.$r->TYPE_MID.'</td>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->TAHUN.'</td>
	<td>'.$r->BULAN.'</td>
	<td>'.$r->JUM_TOT.'</td>
	</tr>
	';	

endforeach;	

// <tbody>


// $tot=0;
// $tot1=0;
// $tot2=0;
// $total=0;	

// foreach ($report as $r)
// {

// // total
// $tot1+=$r->JUMLAH_EDC;
// $tot2+=$r->JUMLAH_YAP;
// $total =$tot1+$tot2;
// // total


// $jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

// $tabel_result1.='
// <tr>
// <td>'.$r->WILAYAH.'</td>
// <td>'.$r->JUMLAH_EDC.'</td>
// <td>'.$r->JUMLAH_YAP.'</td>
// <td>'.$jumlah.'</td>
// <td>
// <button type="button" id="detail_modal1" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
// </td>
// </tr>
// ';

// }
// // end forech

// $tabel_result1.='
// <tfoot>
// <tr >
// <td >TOTAL</td>
// <td>'.$tot1.'</td>
// <td>'.$tot2.'</td>
// <td>'.$total.'</td>
// <td></td>
// </tr>
// </tfoot>
// ';

$tabel_result1.='
</table>


';

echo $tabel_result1;



	// $tabel ='';
	// echo $tabel;


}


}


/* End of file edc_detail.php */
/* Location: ./application/controllers/administrator/Edc Detail.php */