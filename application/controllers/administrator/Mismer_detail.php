<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Mismer Detail Controller
*| --------------------------------------------------------------------------
*| Mismer Detail site
*|
*/
class Mismer_detail extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_mismer_detail');
	}

	/**
	* show all Mismer Details
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('mismer_detail_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mismer_details'] = $this->model_mismer_detail->get($filter, $field, $this->limit_page, $offset);
		$this->data['mismer_detail_counts'] = $this->model_mismer_detail->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/mismer_detail/index/',
			'total_rows'   => $this->model_mismer_detail->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mismer Detail List');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_list', $this->data);
	}
	
	/**
	* Add new mismer_details
	*
	*/
	public function add()
	{
		$this->is_allowed('mismer_detail_add');

		$this->template->title('Mismer Detail New');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_add', $this->data);
	}

	/**
	* Add New Mismer Details
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('mismer_detail_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('updated_at', 'Updated At', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_detail = $this->model_mismer_detail->store($save_data);

			if ($save_mismer_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mismer_detail;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/mismer_detail/edit/' . $save_mismer_detail, 'Edit Mismer Detail'),
						anchor('administrator/mismer_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/mismer_detail/edit/' . $save_mismer_detail, 'Edit Mismer Detail')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Mismer Details
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('mismer_detail_update');

		$this->data['mismer_detail'] = $this->model_mismer_detail->find($id);

		$this->template->title('Mismer Detail Update');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_update', $this->data);
	}

	/**
	* Update Mismer Details
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('mismer_detail_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('updated_at', 'Updated At', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_detail = $this->model_mismer_detail->change($id, $save_data);

			if ($save_mismer_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/mismer_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Mismer Details
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('mismer_detail_delete');

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
            set_message(cclang('has_been_deleted', 'mismer_detail'), 'success');
        } else {
            set_message(cclang('error_delete', 'mismer_detail'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Mismer Details
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('mismer_detail_view');

		$this->data['mismer_detail'] = $this->model_mismer_detail->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Mismer Detail Detail');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_view', $this->data);
	}
	
	/**
	* delete Mismer Details
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$mismer_detail = $this->model_mismer_detail->find($id);

		
		
		return $this->model_mismer_detail->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('mismer_detail_export');

		$this->model_mismer_detail->export('mismer_detail', 'mismer_detail');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('mismer_detail_export');

		$this->model_mismer_detail->pdf('mismer_detail', 'mismer_detail');
	}

// ==============
public function report()
{


	$tahun = $this->input->get('tahun');
	$bulan 	= $this->input->get('bulan');
	
	$this->data['query'] = $this->model_mismer_detail->get_report($bulan, $tahun);
	
	$this->data['tahun'] = $tahun;
	$this->data['bulan'] = $bulan;

	$this->template->title('Mismerdetail Report List');
	$this->render('backend/standart/administrator/mismer_detail/mismer_detail_list_report', $this->data);
// dev	//alt 
	// $this->render('backend/standart/administrator/Report/Report_list_dev', $this->data);
}

// ----------------
public function getResult1($tgl_awal,$tgl_akhir){


	$tgl_awal= date("Y-m-d",strtotime($tgl_awal));
	$tgl_akhir= date("Y-m-d",strtotime($tgl_akhir));

	// $report = $this->model_Report->get_report_between($tgl_awal,$tgl_akhir);
	$report = $this->model_mismer_detail->getResult1($tgl_awal,$tgl_akhir);



	$tabel_result1='';
	// $tabel_result1.='';
	$tabel_result1.='
	<table class="blueTable">
	<thead>
	<tr>
	<th width="10%">WILAYAH</th>
	<th width="10%">EDC</th>
	<th width="10%">YAP</th>
	<th width="10%">TOTAL</th>
	<th width="10%">#</th>
	</tr>
	</thead>
	
	<tbody>

	';


	$tot=0;
	$tot1=0;
	$tot2=0;
	$total=0;	
// 
	foreach ($report as $r)
	{

// total
$tot1+=$r->JUMLAH_EDC;
$tot2+=$r->JUMLAH_YAP;
$total =$tot1+$tot2;
// total


$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

	$tabel_result1.='
	<tr>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->JUMLAH_EDC.'</td>
	<td>'.$r->JUMLAH_YAP.'</td>
	<td>'.$jumlah.'</td>
	<td>
	<button type="button" id="detail1" dataTglAwal="'.$tgl_awal.'" dataTglAkhir="'.$tgl_akhir.'" dataWilayah="'.$r->WILAYAH.'" class=""   >Detail</button>			
	</td>
	</tr>
	';

}
// end forech

	$tabel_result1.='
	<tfoot>
	<tr >
	<td >TOTAL</td>
	<td>'.$tot1.'</td>
	<td>'.$tot2.'</td>
	<td>'.$total.'</td>
	<td></td>
	</tr>
	</tfoot>
	';
	
	$tabel_result1.='
	</tbody>
	</table>

	
	';

	echo $tabel_result1;

 }


// result 2

// ----------------
public function getResult2($tahun,$bulan){


	// $report = $this->model_Report->get_report($bulan,$tahun);
	$report = $this->model_mismer_detail->getresult2($bulan,$tahun);



	$tabel_result2='';
	// $tabel_result1.='';
	$tabel_result2.='
	<table class="blueTable">
	<thead>
	<tr>
	<th width="10%">WILAYAH</th>
	<th width="10%">EDC</th>
	<th width="10%">YAP</th>
	<th width="10%">TOTAL</th>
	<th width="10%">#</th>
	</tr>
	</thead>
	
	<tbody>

	';


	$tot=0;
	$tot1=0;
	$tot2=0;
	$total=0;	

	foreach ($report as $r)
	{

// total
$tot1+=$r->JUMLAH_EDC;
$tot2+=$r->JUMLAH_YAP;
$total =$tot1+$tot2;
// total


$jumlah =$r->JUMLAH_EDC+$r->JUMLAH_YAP;		

	$tabel_result2.='
	<tr>
	<td>'.$r->WILAYAH.'</td>
	<td>'.$r->JUMLAH_EDC.'</td>
	<td>'.$r->JUMLAH_YAP.'</td>
	<td>'.$jumlah.'</td>
	<td>
	<button type="button" id="detail2" dataTahun="'.$tahun.'" dataBulan="'.$bulan.'" dataWilayah="'.$r->WILAYAH.'" class="">Detail</button>			
	</td>
	</tr>
	';

}
// end forech

	$tabel_result2.='
	<tfoot>
	<tr >
	<td >TOTAL</td>
	<td>'.$tot1.'</td>
	<td>'.$tot2.'</td>
	<td>'.$total.'</td>
	<td></td>
	</tr>
	</tfoot>
	';
	
	$tabel_result2.='
	</table>

	
	';

	echo $tabel_result2;

// 	$tabel_result2='';
// 	// $tabel_result1.='';
// 	$tabel_result2.='
// 	<table class="blueTable">
// <thead>
// <tr>
// <th>WILAYAH</th>
// <th>EDC</th>
// <th>YAP</th>
// <th>TOTAL</th>
// <th>#</th>
// </tr>
// </thead>

// <tbody>
// <tr>
// <td>cell1_1</td>
// <td>cell2_1</td>
// <td>cell3_1</td>
// <td>cell4_1</td>
// <td>cell5_1</td>
// </tr>
// <tr>
// <td>cell1_2</td>
// <td>cell2_2</td>
// <td>cell3_2</td>
// <td>cell4_2</td>
// <td>cell5_2</td>
// </tr>
// <tr>
// <td>cell1_3</td>
// <td>cell2_3</td>
// <td>cell3_3</td>
// <td>cell4_3</td>
// <td>cell5_3</td>
// </tr>
// </tbody>
// </table>
// 	';

// 	echo $tabel_result2;

 }


// MODAL result1
public function getModalResult1($tgl_awal,$tgl_akhir,$wilayah){

	// $query = $this->model_Report->getModal_between($tgl_awal,$tgl_akhir,$wilayah);
	$query = $this->model_mismer_detail->getModalResult1($tgl_awal,$tgl_akhir,$wilayah);
	//print_r($query);die();
	
	$tabel='';
	
	
	
	// -------------
	$tabel.='
	<div class="modal-content">

			<div class="modal-header">
<center>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel">Detail report Wilayah '.$wilayah.' </h4>
<h5 class="modal-title" id="myModalLabel">Periode :  '.$tgl_awal.'  s/d : '.$tgl_akhir.'</h5>
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

				<th>CHANNEL</th>
				<th>JUMLAH YAP</th>
				<th>JUMLAH EDC</th>
				<th>TOTAL</th>

		 </tr>
	</thead>';


	$tabel.='
			<tbody>';

			$tot=0;
			$tot1=0;
			$tot2=0;
			$total=0;


	foreach ($query as $q) {
$jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;

$tot1+=$q->JUMLAH_EDC;
$tot2+=$q->JUMLAH_YAP;

$total =$tot1+$tot2;

			$tabel.='
<tr>

			<td>'.$q->CHANNEL.'</td>
			<td></td>
			<td>'.$q->JUMLAH_EDC.'</td>
			<td></td>
</tr>';

}


$tabel.='</tbody>';

$tabel.='
<tfoot>
<tr>
<td>TOTAL</td>
<td>'.$tot2.'</td>
<td>'.$tot1.'</td>
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


// MODAL Result2
public function getModalResult2($tahun,$bulan,$wilayah){

// $query = $this->model_Report->getModal($tahun,$bulan,$wilayah);
$query = $this->model_mismer_detail->getModalResult2($tahun,$bulan,$wilayah);
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

				<th>CHANNEL</th>
				<th>JUMLAH YAP</th>
				<th>JUMLAH EDC</th>
				<th>TOTAL</th>

		 </tr>
	</thead>';


	$tabel.='
			<tbody>';

			$tot=0;
			$tot1=0;
			$tot2=0;
			$total=0;


	foreach ($query as $q) {
$jumlah = $q->JUMLAH_YAP+$q->JUMLAH_EDC;

$tot1+=$q->JUMLAH_EDC;
$tot2+=$q->JUMLAH_YAP;

$total =$tot1+$tot2;

			$tabel.='
<tr>

			<td>'.$q->CHANNEL.'</td>
			<td></td>
			<td>'.$q->JUMLAH_EDC.'</td>
			<td></td>
</tr>';

}


$tabel.='</tbody>';

$tabel.='
<tfoot>
<tr>
<td>TOTAL</td>
<td>'.$tot2.'</td>
<td>'.$tot1.'</td>
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


// ============ STEP 1 
//clean match in mismer_detail by BatchID ($tahun+$bulan) where IS_UPDATE=0
public function clean_match($tahun,$bulan){

	// $result = 	clean_match($tahun,$bulan);
	$result = 	$this->db->query(" CALL clean_match($tahun,$bulan)");

	print_r($result);

	}

// ============ STEP 2 
//insert into mismer_detail 
public function generate_match($tahun,$bulan){

	// $result = 	clean_match($tahun,$bulan);
	$result = 	$this->db->query(" CALL generate_match($tahun,$bulan)");

	print_r($result);

	}

// ============ STEP 3 
//clean unmatch in mismer_unmatch by BatchID ($tahun+$bulan) where IS_UPDATE=0
public function clean_unmatch($tahun,$bulan){

	// $result = 	clean_match($tahun,$bulan);
	$result = 	$this->db->query(" CALL clean_unmatch($tahun,$bulan)");

	print_r($result);

	}

// ============ STEP 4 
//insert into mismer_unmatch 
public function generate_unmatch($tahun,$bulan){

	// $result = 	clean_match($tahun,$bulan);
	$result = 	$this->db->query(" CALL generate_unmatch($tahun,$bulan)");

	print_r($result);

	}




}


/* End of file mismer_detail.php */
/* Location: ./application/controllers/administrator/Mismer Detail.php */