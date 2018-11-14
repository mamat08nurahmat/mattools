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
	* Submit Form Uploads
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('form_upload_file_name', 'File', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('custom_select[]', 'Custom Select', 'trim|required');
		
		if ($this->form_validation->run()) {
			$form_upload_file_uuid = $this->input->post('form_upload_file_uuid');
			$form_upload_file_name = $this->input->post('form_upload_file_name');
		
			$save_data = [
				'file' => $this->input->post('file'),
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
		
			
			$save_form_upload = $this->model_form_upload->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_upload;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
	/**
	* Upload Image Form Upload	* 
	* @return JSON
	*/
	public function upload_file_file()
	{
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
	
}


/* End of file form_upload.php */
/* Location: ./application/controllers/administrator/Form Upload.php */