<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form System Upload Controller
*| --------------------------------------------------------------------------
*| Form System Upload site
*|
*/
class Form_system_upload extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_system_upload');
		$this->load->model('model_form_detail_upload_incoming');
	}

	/**
	* Submit Form System Uploads
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('form_system_upload_file_name_name', 'File Name', 'trim|required');
		$this->form_validation->set_rules('application_source', 'Application Source', 'trim|required');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required');
		$this->form_validation->set_rules('process_month', 'Process Month', 'trim|required');
		$this->form_validation->set_rules('process_year', 'Process Year', 'trim|required');
		// $this->form_validation->set_rules('upload_at', 'Upload At', 'trim|required');
		
		if ($this->form_validation->run()) {
			$form_system_upload_file_name_uuid = $this->input->post('form_system_upload_file_name_uuid');
			$form_system_upload_file_name_name = $this->input->post('form_system_upload_file_name_name');
		
			$save_data = [
				'file_name' => $this->input->post('file_name'),
				'application_source' => $this->input->post('application_source'),
				'batch_id' => $this->input->post('batch_id'),
				'process_month' => $this->input->post('process_month'),
				'process_year' => $this->input->post('process_year'),
				// 'uploader' => $this->input->post('uploader'),
				'uploader' => get_user_data('id'),
				
				// 'upload_at' => $this->input->post('upload_at'),
				'upload_at' => date('Y-m-d H:i:s'),
				'update_at' => date('Y-m-d H:i:s'),
			];

			if (!is_dir(FCPATH . '/uploads/form_system_upload/')) {
				mkdir(FCPATH . '/uploads/form_system_upload/');
			}

			if (!empty($form_system_upload_file_name_uuid)) {

				// $form_system_upload_file_name_name_copy = date('YmdHis') . '-' . $form_system_upload_file_name_name;
				$form_system_upload_file_name_name_copy = $this->input->post('application_source') . '_' .date('YmdHis').'.csv';

				rename(FCPATH . 'uploads/tmp/' . $form_system_upload_file_name_uuid . '/' . $form_system_upload_file_name_name, 
						FCPATH . 'uploads/form_system_upload/' . $form_system_upload_file_name_name_copy);

				if (!is_file(FCPATH . '/uploads/form_system_upload/' . $form_system_upload_file_name_name_copy)) {
					echo json_encode([
						'success' => false,
						'message' => 'Error uploading file'
						]);
					exit;
				}

				$save_data['file_name'] = $form_system_upload_file_name_name_copy;
			}
		
			//id form_system_upload
			$save_form_system_upload = $this->model_form_system_upload->store($save_data);

if($this->input->post('application_source')=='INCOMING'){

	//generate import_csv($id)
	$total_rows = $this->import_csv($save_form_system_upload);


	//detail_upload_uncoming
	$save_data = [
		'tanggal_submit' => date('Y-m-d H:i:s'),
		'data_entry' => get_user_data('username'),
		'area' => 'area',
		'agency' => 'agency',
		'sales_center' => 'sales_center',
		'keterangan' => 'keterangan',
		'jumlah_data' => $total_rows,
		'approve' => 0,
		'reject' => 0,
		'update_at' => date('Y-m-d H:i:s'),
	];

	
	$save_form_detail_upload_incoming = $this->model_form_detail_upload_incoming->store($save_data);

	
	
	//!!!!!!!!next dev total rows detail
	$this->data['total_rows'] 	 = $total_rows;
}
	
			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_system_upload;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
	/**
	* Upload Image Form System Upload	* 
	* @return JSON
	*/
	public function upload_file_name_file()
	{
		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'form_system_upload',
		]);
	}

	/**
	* Delete Image Form System Upload	* 
	* @return JSON
	*/
	public function delete_file_name_file($uuid)
	{
		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file_name', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'form_system_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_system_upload/'
        ]);
	}

	/**
	* Get Image Form System Upload	* 
	* @return JSON
	*/
	public function get_file_name_file($id)
	{
		$form_system_upload = $this->model_form_system_upload->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file_name', 
            'table_name'        => 'form_system_upload',
            'primary_key'       => 'id',
            'upload_path'       => 'uploads/form_system_upload/',
            'delete_endpoint'   => 'administrator/form_system_upload/delete_file_name_file'
        ]);
	}
	
//==================
public function import_csv($id)
{
	$form_system_upload = $this->model_form_system_upload->find($id);

	// print_r($form_system_upload );die();

	$this->load->library('csvimport');

$file = 	FCPATH . 'uploads/form_system_upload/'.$form_system_upload->file_name;

$batch_id = $form_system_upload->batch_id; //xxxxxxxxxx
$file_data = $this->csvimport->get_array($file);
// print_r($file_data);die();
	// $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
	foreach($file_data as $row)
	{
		$data[] = array(
			'KODE_SALES' 		=>	$row["KODE_SALES"] ,
			'NO_IDENTITAS'		=>	$row["NO_IDENTITAS"] ,
			'NAMA_NASABAH'		=>	$row["NAMA_NASABAH"] ,
			'DOB'				=>	$row["DOB"] ,
			'NAMA_PERUSAHAAN'	=>	$row["NAMA_PERUSAHAAN"] ,
			'KOTA'				=>	$row["KOTA"] ,
			'JENIS_PERUSAHAAN'	=>	$row["JENIS_PERUSAHAAN"] ,
			'KODE_POS'			=>	$row["KODE_POS"] ,
			'SOURCECODE'		=>	$row["SOURCECODE"] ,
			'KETERANGAN'		=>	$row["KETERANGAN"], 
			'batch_id'		=>	$batch_id, 
			'status'		=>	'P'

		);
	}

	// print_r($data);die();

	// $this->csv_import_model->insert($data);
	$tot_rows = $this->db->insert_batch('form_system_incoming', $data);
	return $tot_rows;
	// print_r($tot_rows);die();

}




}


/* End of file form_system_upload.php */
/* Location: ./application/controllers/administrator/Form System Upload.php */