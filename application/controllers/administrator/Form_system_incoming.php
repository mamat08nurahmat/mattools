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
	* show all Form System Incomings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_system_incoming_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_system_incomings'] = $this->model_form_system_incoming->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_system_incoming_counts'] = $this->model_form_system_incoming->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_system_incoming/index/',
			'total_rows'   => $this->model_form_system_incoming->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('System Incoming List');
		$this->render('backend/standart/administrator/form_builder/form_system_incoming/form_system_incoming_list', $this->data);
	}

	/**
	* Update view Form System Incomings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_system_incoming_update');

		$this->data['form_system_incoming'] = $this->model_form_system_incoming->find($id);

		$this->template->title('System Incoming Update');
		$this->render('backend/standart/administrator/form_builder/form_system_incoming/form_system_incoming_update', $this->data);
	}

	/**
	* Update Form System Incomings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_system_incoming_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
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

			
			$save_form_system_incoming = $this->model_form_system_incoming->change($id, $save_data);

			if ($save_form_system_incoming) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_system_incoming', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_system_incoming');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_system_incoming');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form System Incomings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_system_incoming_delete');

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
            set_message(cclang('has_been_deleted', 'Form System Incoming'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form System Incoming'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form System Incomings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_system_incoming_view');

		$this->data['form_system_incoming'] = $this->model_form_system_incoming->find($id);

		$this->template->title('System Incoming Detail');
		$this->render('backend/standart/administrator/form_builder/form_system_incoming/form_system_incoming_view', $this->data);
	}

	/**
	* delete Form System Incomings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_system_incoming = $this->model_form_system_incoming->find($id);

		
		return $this->model_form_system_incoming->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_system_incoming_export');

		$this->model_form_system_incoming->export('form_system_incoming', 'form_system_incoming');
	}
}


/* End of file form_system_incoming.php */
/* Location: ./application/controllers/administrator/Form System Incoming.php */