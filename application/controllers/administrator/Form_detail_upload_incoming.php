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
	* show all Form Detail Upload Incomings
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_detail_upload_incoming_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_detail_upload_incomings'] = $this->model_form_detail_upload_incoming->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_detail_upload_incoming_counts'] = $this->model_form_detail_upload_incoming->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_detail_upload_incoming/index/',
			'total_rows'   => $this->model_form_detail_upload_incoming->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Detail Upload Incoming List');
		$this->render('backend/standart/administrator/form_builder/form_detail_upload_incoming/form_detail_upload_incoming_list', $this->data);
	}

	/**
	* Update view Form Detail Upload Incomings
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_detail_upload_incoming_update');

		$this->data['form_detail_upload_incoming'] = $this->model_form_detail_upload_incoming->find($id);

		$this->template->title('Detail Upload Incoming Update');
		$this->render('backend/standart/administrator/form_builder/form_detail_upload_incoming/form_detail_upload_incoming_update', $this->data);
	}

	/**
	* Update Form Detail Upload Incomings
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_detail_upload_incoming_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
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

			
			$save_form_detail_upload_incoming = $this->model_form_detail_upload_incoming->change($id, $save_data);

			if ($save_form_detail_upload_incoming) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_detail_upload_incoming', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_detail_upload_incoming');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_detail_upload_incoming');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Detail Upload Incomings
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_detail_upload_incoming_delete');

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
            set_message(cclang('has_been_deleted', 'Form Detail Upload Incoming'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Detail Upload Incoming'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Detail Upload Incomings
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_detail_upload_incoming_view');

		$this->data['form_detail_upload_incoming'] = $this->model_form_detail_upload_incoming->find($id);

		$this->template->title('Detail Upload Incoming Detail');
		$this->render('backend/standart/administrator/form_builder/form_detail_upload_incoming/form_detail_upload_incoming_view', $this->data);
	}

	/**
	* delete Form Detail Upload Incomings
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_detail_upload_incoming = $this->model_form_detail_upload_incoming->find($id);

		
		return $this->model_form_detail_upload_incoming->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_detail_upload_incoming_export');

		$this->model_form_detail_upload_incoming->export('form_detail_upload_incoming', 'form_detail_upload_incoming');
	}
}


/* End of file form_detail_upload_incoming.php */
/* Location: ./application/controllers/administrator/Form Detail Upload Incoming.php */