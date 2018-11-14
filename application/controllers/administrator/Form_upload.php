<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Upload Controller
*| --------------------------------------------------------------------------
*| Form Upload site
*|
*/
class Form_upload extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_upload');
	}

	/**
	* show all Form Uploads
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		print_r(get_user(1));
		print_r('<hr>');
		print_r($this->aauth->get_user(3));
		print_r('xxxxxxxxxxxxxxxxxx');die();
		$this->is_allowed('form_upload_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_uploads'] = $this->model_form_upload->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_upload_counts'] = $this->model_form_upload->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_upload/index/',
			'total_rows'   => $this->model_form_upload->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Upload List');
		$this->render('backend/standart/administrator/form_builder/form_upload/form_upload_list', $this->data);
	}

	/**
	* Update view Form Uploads
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_upload_update');

		$this->data['form_upload'] = $this->model_form_upload->find($id);

		$this->template->title('Upload Update');
		$this->render('backend/standart/administrator/form_builder/form_upload/form_upload_update', $this->data);
	}

	/**
	* Update Form Uploads
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('form_upload_file_name', 'File', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('custom_select[]', 'Custom Select', 'trim|required');
		
		if ($this->form_validation->run()) {
			$form_upload_file_uuid = $this->input->post('form_upload_file_uuid');
			$form_upload_file_name = $this->input->post('form_upload_file_name');
		
			$save_data = [
				'keterangan' => $this->input->post('keterangan'),
				'custom_select' => implode(',', (array) $this->input->post('custom_select')),
				'timestamp' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/form_upload/')) {
				mkdir(FCPATH . '/uploads/form_upload/');
			}

			if (!empty($form_upload_file_uuid)) {
				$form_upload_file_name_copy = date('YmdHis') . '-' . $form_upload_file_name;

				rename(FCPATH . 'uploads/tmp/' . $form_upload_file_uuid . '/' . $form_upload_file_name, 
						FCPATH . 'uploads/form_upload/' . $form_upload_file_name_copy);

				if (!is_file(FCPATH . '/uploads/form_upload/' . $form_upload_file_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file'] = $form_upload_file_name_copy;
			}
		
			
			$save_form_upload = $this->model_form_upload->change($id, $save_data);

			if ($save_form_upload) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_upload', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_upload');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_upload');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Uploads
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_upload_delete');

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
            set_message(cclang('has_been_deleted', 'Form Upload'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Upload'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Uploads
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_upload_view');

		$this->data['form_upload'] = $this->model_form_upload->find($id);

		$this->template->title('Upload Detail');
		$this->render('backend/standart/administrator/form_builder/form_upload/form_upload_view', $this->data);
	}

	/**
	* delete Form Uploads
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_upload = $this->model_form_upload->find($id);

		if (!empty($form_upload->file)) {
			$path = FCPATH . '/uploads/form_upload/' . $form_upload->file;

			if (is_file($path)) {
				$delete_file = unlink($path);
			}
		}

		
		return $this->model_form_upload->remove($id);
	}
	
	/**
	* Upload Image Form Upload	* 
	* @return JSON
	*/
	public function upload_file_file()
	{
		if (!$this->is_allowed('form_upload_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'form_upload',
		]);
	}

	/**
	* Delete Image Form Upload	* 
	* @return JSON
	*/
	public function delete_file_file($uuid)
	{
		if (!$this->is_allowed('form_upload_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'form_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_upload/'
        ]);
	}

	/**
	* Get Image Form Upload	* 
	* @return JSON
	*/
	public function get_file_file($id)
	{
		if (!$this->is_allowed('form_upload_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$form_upload = $this->model_form_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file', 
            'table_name'        => 'form_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_upload/',
            'delete_endpoint'   => 'administrator/form_upload/delete_file_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_upload_export');

		$this->model_form_upload->export('form_upload', 'form_upload');
	}
}


/* End of file form_upload.php */
/* Location: ./application/controllers/administrator/Form Upload.php */