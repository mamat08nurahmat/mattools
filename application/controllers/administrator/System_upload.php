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
	
	/**
	* Add new system_uploads
	*
	*/
	public function add()
	{
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

		$this->form_validation->set_rules('upload_date', 'Upload Date', 'trim|required');
		$this->form_validation->set_rules('upload_remark', 'Upload Remark', 'trim|required');
		$this->form_validation->set_rules('source', 'Source', 'trim|required');
		$this->form_validation->set_rules('system_upload_file_path_name', 'File Path', 'trim|required');
		$this->form_validation->set_rules('file_size', 'File Size', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_count', 'Row Data Count', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_succeed', 'Row Data Succeed', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_failed', 'Row Data Failed', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('is_approved', 'Is Approved', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
			$system_upload_file_path_uuid = $this->input->post('system_upload_file_path_uuid');
			$system_upload_file_path_name = $this->input->post('system_upload_file_path_name');
		
			$save_data = [
				'upload_date' => $this->input->post('upload_date'),
				'upload_remark' => $this->input->post('upload_remark'),
				'source' => $this->input->post('source'),
				'file_size' => $this->input->post('file_size'),
				'row_data_count' => $this->input->post('row_data_count'),
				'row_data_succeed' => $this->input->post('row_data_succeed'),
				'row_data_failed' => $this->input->post('row_data_failed'),
				'is_approved' => $this->input->post('is_approved'),
				'upload_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/system_upload/')) {
				mkdir(FCPATH . '/uploads/system_upload/');
			}

			if (!empty($system_upload_file_path_name)) {
				// $system_upload_file_path_name_copy = date('YmdHis') . '-' . $system_upload_file_path_name;
				$system_upload_file_path_name_copy = $this->input->post('source') . '-' . $this->input->post('upload_date').'.csv';

				rename(FCPATH . 'uploads/tmp/' . $system_upload_file_path_uuid . '/' . $system_upload_file_path_name, 
						FCPATH . 'uploads/system_upload/' . $system_upload_file_path_name_copy);

				if (!is_file(FCPATH . '/uploads/system_upload/' . $system_upload_file_path_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_path'] = $system_upload_file_path_name_copy;
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
		
		$this->form_validation->set_rules('upload_date', 'Upload Date', 'trim|required');
		$this->form_validation->set_rules('upload_remark', 'Upload Remark', 'trim|required');
		$this->form_validation->set_rules('source', 'Source', 'trim|required');
		$this->form_validation->set_rules('system_upload_file_path_name', 'File Path', 'trim|required');
		$this->form_validation->set_rules('file_size', 'File Size', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_count', 'Row Data Count', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_succeed', 'Row Data Succeed', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('row_data_failed', 'Row Data Failed', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('is_approved', 'Is Approved', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
			$system_upload_file_path_uuid = $this->input->post('system_upload_file_path_uuid');
			$system_upload_file_path_name = $this->input->post('system_upload_file_path_name');
		
			$save_data = [
				'upload_date' => $this->input->post('upload_date'),
				'upload_remark' => $this->input->post('upload_remark'),
				'source' => $this->input->post('source'),
				'file_size' => $this->input->post('file_size'),
				'row_data_count' => $this->input->post('row_data_count'),
				'row_data_succeed' => $this->input->post('row_data_succeed'),
				'row_data_failed' => $this->input->post('row_data_failed'),
				'is_approved' => $this->input->post('is_approved'),
				'upload_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/system_upload/')) {
				mkdir(FCPATH . '/uploads/system_upload/');
			}

			if (!empty($system_upload_file_path_uuid)) {
				$system_upload_file_path_name_copy = date('YmdHis') . '-' . $system_upload_file_path_name;

				rename(FCPATH . 'uploads/tmp/' . $system_upload_file_path_uuid . '/' . $system_upload_file_path_name, 
						FCPATH . 'uploads/system_upload/' . $system_upload_file_path_name_copy);

				if (!is_file(FCPATH . '/uploads/system_upload/' . $system_upload_file_path_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_path'] = $system_upload_file_path_name_copy;
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

// approve upload

public function reset_approve($id = null)
{
	$reset['truncate'] = $this->db->query("truncate temp_upload_mismer;");		 

	$reset['is_approved'] = $this->model_system_upload->change($id,$data = array('IS_APPROVED'=>0));

	if ($reset) {
		redirect('/administrator/system_upload', 'refresh');
		set_message(cclang('has_been_approve', 'system_upload'), 'success');
		// redirect_back();
	} else {
		redirect('/administrator/system_upload', 'refresh');
		set_message(cclang('error_approve', 'system_upload'), 'error');
		// redirect_back();
	}	


}

public function approve_upload($id = null)
{
	// $this->is_allowed('system_upload_delete');

	// $this->load->helper('file');

	// $arr_id = $this->input->get('id');
	// $remove = false;
	$system_upload = $this->model_system_upload->find($id);
	$approve['is_approved'] = $this->model_system_upload->change($id,$data = array('IS_APPROVED'=>1));
	

	// print_r($system_upload);

$approve['import']  = 	import_csv($system_upload->file_path,$system_upload->id);


// print_r($approve);
// 	die();
	// if (!empty($id)) {
	// 	$remove = $this->_remove($id);
	// } elseif (count($arr_id) >0) {
	// 	foreach ($arr_id as $id) {
		// $approve = $this->_approve($id);
	// 	}
	// }

	if ($approve) {
		redirect('/administrator/temp_upload_mismer', 'refresh');
		set_message(cclang('has_been_approve', 'system_upload'), 'success');
	} else {
		set_message(cclang('error_approve', 'system_upload'), 'error');
		redirect_back();
	}

}



	
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

		if (!empty($system_upload->file_path)) {
			$path = FCPATH . '/uploads/system_upload/' . $system_upload->file_path;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}
		
		
		return $this->model_system_upload->remove($id);
	}
	
	/**
	* Upload Image System Upload	* 
	* @return JSON
	*/
	public function upload_file_path_file()
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
	public function delete_file_path_file($uuid)
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
            'field_name'        => 'file_path', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'system_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/system_upload/'
        ]);
	}

	/**
	* Get Image System Upload	* 
	* @return JSON
	*/
	public function get_file_path_file($id)
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
            'field_name'        => 'file_path', 
            'table_name'        => 'system_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/system_upload/',
            'delete_endpoint'   => 'administrator/system_upload/delete_file_path_file'
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

// upload csv to temp_upload_mismer
	public function  import_temp_upload_mismer($file_path,$BatchID){

		// print_r('import csv');die();

		print_r(import_csv($file_path,$BatchID));

	}

	public function step1($BatchID){

		print_r(import_csv($BatchID));

	}

	public function step2($BatchID){

		print_r(insert_mismer_detail($BatchID));
		print_r(insert_mismer_unmatch($BatchID));

	}



}


/* End of file system_upload.php */
/* Location: ./application/controllers/administrator/System Upload.php */