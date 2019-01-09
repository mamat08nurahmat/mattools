<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Detail Upload Incoming Controller
*| --------------------------------------------------------------------------
*| Form Detail Upload Incoming site
*|
*/
class Form_detail_upload_incoming extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_detail_upload_incoming');
	}

	/**
	* Submit Form Detail Upload Incomings
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('tanggal_submit', 'Tanggal Submit', 'trim|required');
		$this->form_validation->set_rules('data_entry', 'Data Entry', 'trim|required');
		$this->form_validation->set_rules('area', 'Area', 'trim|required');
		$this->form_validation->set_rules('agency', 'Agency', 'trim|required');
		$this->form_validation->set_rules('sales_center', 'Sales Center', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('jumlah_data', 'Jumlah Data', 'trim|required');
		$this->form_validation->set_rules('approve', 'Approve', 'trim|required');
		$this->form_validation->set_rules('reject', 'Reject', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'tanggal_submit' => $this->input->post('tanggal_submit'),
				'data_entry' => $this->input->post('data_entry'),
				'area' => $this->input->post('area'),
				'agency' => $this->input->post('agency'),
				'sales_center' => $this->input->post('sales_center'),
				'keterangan' => $this->input->post('keterangan'),
				'jumlah_data' => $this->input->post('jumlah_data'),
				'approve' => $this->input->post('approve'),
				'reject' => $this->input->post('reject'),
				'update_at' => date('Y-m-d H:i:s'),
			];

			
			$save_form_detail_upload_incoming = $this->model_form_detail_upload_incoming->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_detail_upload_incoming;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_detail_upload_incoming.php */
/* Location: ./application/controllers/administrator/Form Detail Upload Incoming.php */