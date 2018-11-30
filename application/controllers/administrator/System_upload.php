<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| System Upload Controller
*| --------------------------------------------------------------------------
*| System Upload site
*|
*/
class System_upload extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_system_upload');
	}

	/**
	* show all System Uploads
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('system_upload_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['system_uploads'] = $this->model_system_upload->get($filter, $field, $this->limit_page, $offset);
		$this->data['system_upload_counts'] = $this->model_system_upload->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/system_upload/index/',
			'total_rows'   => $this->model_system_upload->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('System Upload List');
		$this->render('backend/standart/administrator/system_upload/system_upload_list', $this->data);
	}

	
	public function flpp($offset = 0)
	{
		$this->is_allowed('system_upload_list');

		// $filter = $this->input->get('q');
		// $field 	= $this->input->get('f');

		$filter = 'flpp';
		$field 	= 'application_source';


		$this->data['system_uploads'] = $this->model_system_upload->get($filter, $field, $this->limit_page, $offset);
		$this->data['system_upload_counts'] = $this->model_system_upload->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/system_upload/index/',
			'total_rows'   => $this->model_system_upload->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('System Upload List');
		$this->render('backend/standart/administrator/system_upload/system_upload_list', $this->data);
	}


	/**
	* Add new system_uploads
	*
	*/
	public function add()
	{

		// print_r(db_get_auto_increment('system_upload'));die();

		$this->is_allowed('system_upload_add');

		$this->template->title('System Upload New');
		$this->render('backend/standart/administrator/system_upload/system_upload_add', $this->data);
	}

	/**
	* Add New System Uploads
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('system_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('system_upload_file_name_name', 'File Name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('application_source', 'Application Source', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('process_month', 'Process Month', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('process_year', 'Process Year', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
			$system_upload_file_name_uuid = $this->input->post('system_upload_file_name_uuid');
			$system_upload_file_name_name = $this->input->post('system_upload_file_name_name');
		
			$save_data = [
				'application_source' => $this->input->post('application_source'),
				'batch_id' => $this->input->post('batch_id'),
				'process_month' => $this->input->post('process_month'),
				'process_year' => $this->input->post('process_year'),
				'uploader' => get_user_data('id'),				
				'update_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/system_upload/')) {
				mkdir(FCPATH . '/uploads/system_upload/');
			}

			if (!empty($system_upload_file_name_name)) {
				//exp MISMER_1.csv
				$system_upload_file_name_name_copy = $this->input->post('application_source').'_'.$this->input->post('batch_id').'.csv';

				// $system_upload_file_name_name_copy = date('YmdHis') . '-' . $system_upload_file_name_name;

				rename(FCPATH . 'uploads/tmp/' . $system_upload_file_name_uuid . '/' . $system_upload_file_name_name, 
						FCPATH . 'uploads/system_upload/'.$this->input->post('application_source').'/'. $system_upload_file_name_name_copy);

				if (!is_file(FCPATH . '/uploads/system_upload/'.$this->input->post('application_source').'/'. $system_upload_file_name_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}
				$save_data['file_name'] = $system_upload_file_name_name_copy;
			}
		
			
			$save_system_upload = $this->model_system_upload->store($save_data);

			if ($save_system_upload) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_system_upload;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/system_upload/edit/' . $save_system_upload, 'Edit System Upload'),
						anchor('administrator/system_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/system_upload/edit/' . $save_system_upload, 'Edit System Upload')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/system_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/system_upload');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view System Uploads
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('system_upload_update');

		$this->data['system_upload'] = $this->model_system_upload->find($id);

		$this->template->title('System Upload Update');
		$this->render('backend/standart/administrator/system_upload/system_upload_update', $this->data);
	}

	/**
	* Update System Uploads
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('system_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('system_upload_file_name_name', 'File Name', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('application_source', 'Application Source', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('process_month', 'Process Month', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('process_year', 'Process Year', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
			$system_upload_file_name_uuid = $this->input->post('system_upload_file_name_uuid');
			$system_upload_file_name_name = $this->input->post('system_upload_file_name_name');
		
			$save_data = [
				'application_source' => $this->input->post('application_source'),
				'batch_id' => $this->input->post('batch_id'),
				'process_month' => $this->input->post('process_month'),
				'process_year' => $this->input->post('process_year'),
				'uploader' => get_user_data('id'),				'update_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/system_upload/')) {
				mkdir(FCPATH . '/uploads/system_upload/');
			}

			if (!empty($system_upload_file_name_uuid)) {
				$system_upload_file_name_name_copy = date('YmdHis') . '-' . $system_upload_file_name_name;

				rename(FCPATH . 'uploads/tmp/' . $system_upload_file_name_uuid . '/' . $system_upload_file_name_name, 
						FCPATH . 'uploads/system_upload/' . $system_upload_file_name_name_copy);

				if (!is_file(FCPATH . '/uploads/system_upload/' . $system_upload_file_name_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_name'] = $system_upload_file_name_name_copy;
			}
		
			
			$save_system_upload = $this->model_system_upload->change($id, $save_data);

			if ($save_system_upload) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/system_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/system_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/system_upload');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete System Uploads
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('system_upload_delete');

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
            set_message(cclang('has_been_deleted', 'system_upload'), 'success');
        } else {
            set_message(cclang('error_delete', 'system_upload'), 'error');
        }

		redirect_back();
	}

//-------

public function approve($id = null)
{
	// $this->is_allowed('system_upload_delete');
	
	
	$this->load->helper('file');
	$arr_id = $this->input->get('id');
	// print_r($arr_id);die();

	$approve = false;

	if (!empty($id)) {
		$approve = $this->_approve($id);
	} elseif (count($arr_id) >0) {
		foreach ($arr_id as $id) {
			$approve = $this->_approve($id);
		}
	}

	if ($approve) {
		set_message(cclang('has_been_approved', 'system_upload'), 'success');
	} else {
		set_message(cclang('error_approve', 'system_upload'), 'error');
	}

	redirect_back();
}


//------
		/**
	* View view System Uploads
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('system_upload_view');

		$this->data['system_upload'] = $this->model_system_upload->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('System Upload Detail');
		$this->render('backend/standart/administrator/system_upload/system_upload_view', $this->data);
	}
	
	/**
	* delete System Uploads
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$system_upload = $this->model_system_upload->find($id);

		if (!empty($system_upload->file_name)) {
			$path = FCPATH . '/uploads/system_upload/' . $system_upload->file_name;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_system_upload->remove($id);
	}

//----
private function _approve($id)
{
	$system_upload = $this->model_system_upload->find($id);

// print_r($system_upload);die();	
	// if (!empty($system_upload->file_name)) {
	// 	$path = FCPATH . '/uploads/system_upload/' . $system_upload->file_name;

	// 	if (is_file($path)) {
	// 		$delete_file = unlink($path);
	// 	}
	// }
	
	
	// return $this->model_system_upload->remove($id);
//delete system_flpp batch
$del = $this->db->query("DELETE from system_flpp WHERE batch_id=$system_upload->batch_id");

//insert system_flpp batch
//next dev exec() php run background
$xxx = '"';

$res = $this->db->query("

LOAD DATA INFILE 'C:/xampp/htdocs/mattools/uploads/system_upload/FLPP/FLPP_".$system_upload->batch_id.".csv'
INTO TABLE system_flpp
FIELDS TERMINATED BY ','  ENCLOSED BY '$xxx'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS
(
  NAMA_PEMOHON,
  PEKERJAAN_PEMOHON,
  JENIS_KELAMIN,
  NO_KTP_PEMOHON,
  NPWP_PEMOHON,
  GAJI_POKOK,
  NAMA_PASANGAN,
  NO_KTP_PASANGAN,
  NO_REKENING_PEMOHON,
  TGL_AKAD,
  HARGA_RUMAH,
  NILAI_KPR,
  SUKU_BUNGA_KPR,
  TENOR,
  ANGSURAN_KPR,
  NILAI_FLPP,
  NAMA_PENGEMBANG,
  NAMA_PERUMAHAN,
  ALAMAT_AGUNAN,
  KOTA_AGUNAN,
  KODE_POS_AGUNAN,
  LUAS_TANAH,
  LUAS_BANGUNAN,
  @batch_id,
  @create_date,
  @month,
  @year,
  @is_generate 

)

  SET batch_id=$system_upload->batch_id,
  create_date = CURRENT_TIMESTAMP,
  month = $system_upload->process_month,
  year = $system_upload->process_year,
  is_generate = 0;

");
return $res;

}

//----
public function gen_angsuran_detail($id)
{
	

	$system_flpp = $this->model_system_flpp->find($id);

	// print_r($system_flpp);die();
	
	$batch_id= $system_flpp->batch_id;
	$nama_pemohon = $system_flpp->NAMA_PEMOHON;
	$no_ktp_pemohon = $system_flpp->NO_KTP_PEMOHON;


	// $where = array(
	// 	'NO_KTP_PEMOHON' => $ktp,	
	// );
	
	// $this->data['system_flpp'] = $this->model_system_flpp->find($id);
	// $get_single = $this->model_system_flpp->get_single($where);
	
	// $batch_id   = $get_single->batch_id; //string
	// $nama_pemohon   = $get_single->NAMA_PEMOHON; //string
	$tgl_akad   = $system_flpp->TGL_AKAD; //string
	$tenor 		= $system_flpp->TENOR;
	$nilai_kpr	= $system_flpp->NILAI_KPR;
	$bunga_kpr 	= $system_flpp->SUKU_BUNGA_KPR; //0,5
	// print_r($tgl_akad);die();
//===================================================
	$m_time =   strtotime($tgl_akad);	
	// $y_tenor1 		=  date('Y', strtotime($tgl_akad));
	// $m_tenor1 		=  date('m', strtotime("+1 month", $tgl_akad)); //+1 month bulan berikutnya
	$y_tenor1 =  date('Y', strtotime("+1 months",$m_time));		
	$m_tenor1 =  date('m', strtotime("+1 months",$m_time));
		// $m1 = (string)$m2;            
		// $m1 = '$m1';

	

// TENOR 1

$outstanding_t1 = $nilai_kpr;
$angsuran_pokok_t1 = $nilai_kpr * (($bunga_kpr/12)/(1-pow((($bunga_kpr/12)+1),-$tenor)))-($bunga_kpr*($nilai_kpr/12)) ;
$angsuran_bunga_t1 = $nilai_kpr * ($bunga_kpr/12); 
$angsuran_total_t1 = $angsuran_pokok_t1 + $angsuran_bunga_t1;


	$data_array[] = array(

		'NO' => 1,
		'tahun' => $y_tenor1, 
		'bulan' => $m_tenor1, //helper baca bulan 
		'OUTSTANDING' => $outstanding_t1,
		'ANGSURAN_POKOK' => $angsuran_pokok_t1,
		'ANGSURAN_BUNGA' => $angsuran_bunga_t1,
		'ANGSURAN_TOTAL' => $angsuran_total_t1,
		'NO_KTP_PEMOHON' => $no_ktp_pemohon,
		'batch_id' => $batch_id

		
				 
	);

// print_r($data_array[0]['OUTSTANDING'] - $data_array[0]['ANGSURAN_POKOK'] );die();

// TENOR NEXT LOOP
		$no=2;
		// $tenor_loop = $tenor - 1;
	for ($x = 1; $x < $tenor; $x++):
		
		$no = $x+1;
		$z  = $x-1;

		// $date = '25/05/2010';
		// $date = str_replace('/', '-', $date);
		// $y =  date('Y', strtotime($date));

		// $m_time =   strtotime($date);

		$y 		=  date('Y', strtotime($tgl_akad));
		$m_time =   strtotime($tgl_akad);


		$m2 =  date('m', strtotime("+".$no." months",$m_time));
		$m1 = (string)$m2;            
		// $m1 = '$m1';
		$y1 =  date('Y', strtotime("+".$no." months",$m_time));		


$outstanding_before	   = $data_array[$z]['OUTSTANDING'];
$angsuran_pokok_before = $data_array[$z]['ANGSURAN_POKOK'];

//------- 
$outstanding_loop    =((float)$outstanding_before  - (float)$angsuran_pokok_before);
$angsuran_bunga_loop = $outstanding_loop * ($bunga_kpr/12);
$angsuran_pokok_loop =$angsuran_total_t1 - $angsuran_bunga_loop;

		$data_array[] = array(


			'NO' => $no,
			'tahun' => $y1, 
			'bulan' => $m1, //helper baca bulan 
			'OUTSTANDING' => $outstanding_loop,
			'ANGSURAN_POKOK' => $angsuran_pokok_loop,
			'ANGSURAN_BUNGA' => $angsuran_bunga_loop,
			'ANGSURAN_TOTAL' => $angsuran_total_t1,
			'NO_KTP_PEMOHON' => $no_ktp_pemohon,
			'batch_id' => $batch_id
			
			 		
		);
	endfor;

		// print_r($data_array);die();

	
	$cek = $this->db->insert_batch('angsuran_detail', $data_array);
//	print_r($cek);die();
	return $cek	;	
	// print_r($data_array);die();

	// $this->data['data_array'] = $data_array;
	// $this->data['nama_pemohon'] = $nama_pemohon;
	// $this->data['no_ktp'] = $ktp;

	// $this->template->title('System Flpp Detail');
	// $this->render('backend/standart/administrator/system_flpp/system_flpp_detail', $this->data);


}



	/**
	* Upload Image System Upload	* 
	* @return JSON
	*/
	public function upload_file_name_file()
	{
		if (!$this->is_allowed('system_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'system_upload',
		]);
	}

	/**
	* Delete Image System Upload	* 
	* @return JSON
	*/
	public function delete_file_name_file($uuid)
	{
		if (!$this->is_allowed('system_upload_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file_name', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'system_upload',
            'primary_key'       => 'ID',
            'upload_path'       => 'uploads/system_upload/'
        ]);
	}

	/**
	* Get Image System Upload	* 
	* @return JSON
	*/
	public function get_file_name_file($id)
	{
		if (!$this->is_allowed('system_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$system_upload = $this->model_system_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file_name', 
            'table_name'        => 'system_upload',
            'primary_key'       => 'ID',
            'upload_path'       => 'uploads/system_upload/',
            'delete_endpoint'   => 'administrator/system_upload/delete_file_name_file'
        ]);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('system_upload_export');

		$this->model_system_upload->export('system_upload', 'system_upload');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('system_upload_export');

		$this->model_system_upload->pdf('system_upload', 'system_upload');
	}
}


/* End of file system_upload.php */
/* Location: ./application/controllers/administrator/System Upload.php */