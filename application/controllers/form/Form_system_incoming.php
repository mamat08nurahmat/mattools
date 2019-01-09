<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form System Incoming Controller
*| --------------------------------------------------------------------------
*| Form System Incoming site
*|
*/
class Form_system_incoming extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_system_incoming');
	}

	/**
	* Submit Form System Incomings
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('kode_sales', 'KODE SALES', 'trim|required');
		$this->form_validation->set_rules('no_identitas', 'NO IDENTITAS', 'trim|required');
		$this->form_validation->set_rules('nama_nasabah', 'NAMA NASABAH', 'trim|required');
		$this->form_validation->set_rules('dob', 'DOB', 'trim|required');
		$this->form_validation->set_rules('nama_perusahaan', 'NAMA PERUSAHAAN', 'trim|required');
		$this->form_validation->set_rules('kota', 'KOTA', 'trim|required');
		$this->form_validation->set_rules('jenis_perusahaan', 'JENIS PERUSAHAAN', 'trim|required');
		$this->form_validation->set_rules('kode_pos', 'KODE POS', 'trim|required');
		$this->form_validation->set_rules('sourcecode', 'SOURCECODE', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'KETERANGAN', 'trim|required');
		$this->form_validation->set_rules('batch_id', 'Batch Id', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'kode_sales' => $this->input->post('kode_sales'),
				'no_identitas' => $this->input->post('no_identitas'),
				'nama_nasabah' => $this->input->post('nama_nasabah'),
				'dob' => $this->input->post('dob'),
				'nama_perusahaan' => $this->input->post('nama_perusahaan'),
				'kota' => $this->input->post('kota'),
				'jenis_perusahaan' => $this->input->post('jenis_perusahaan'),
				'kode_pos' => $this->input->post('kode_pos'),
				'sourcecode' => $this->input->post('sourcecode'),
				'keterangan' => $this->input->post('keterangan'),
				'batch_id' => $this->input->post('batch_id'),
				'status' => $this->input->post('status'),
			];

			
			$save_form_system_incoming = $this->model_form_system_incoming->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_system_incoming;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_system_incoming.php */
/* Location: ./application/controllers/administrator/Form System Incoming.php */