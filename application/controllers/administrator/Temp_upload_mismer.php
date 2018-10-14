<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Temp Upload Mismer Controller
*| --------------------------------------------------------------------------
*| Temp Upload Mismer site
*|
*/
class Temp_upload_mismer extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_temp_upload_mismer');
	}

	/**
	* show all Temp Upload Mismers
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('temp_upload_mismer_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['temp_upload_mismers'] = $this->model_temp_upload_mismer->get($filter, $field, $this->limit_page, $offset);
		$this->data['temp_upload_mismer_counts'] = $this->model_temp_upload_mismer->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/temp_upload_mismer/index/',
			'total_rows'   => $this->model_temp_upload_mismer->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Temp Upload Mismer List');
		$this->render('backend/standart/administrator/temp_upload_mismer/temp_upload_mismer_list', $this->data);
	}
	
	/**
	* Add new temp_upload_mismers
	*
	*/
	public function add()
	{
		$this->is_allowed('temp_upload_mismer_add');

		$this->template->title('Temp Upload Mismer New');
		$this->render('backend/standart/administrator/temp_upload_mismer/temp_upload_mismer_add', $this->data);
	}

	/**
	* Add New Temp Upload Mismers
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('temp_upload_mismer_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'BatchID' => $this->input->post('BatchID'),
			];

			
			$save_temp_upload_mismer = $this->model_temp_upload_mismer->store($save_data);

			if ($save_temp_upload_mismer) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_temp_upload_mismer;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/temp_upload_mismer/edit/' . $save_temp_upload_mismer, 'Edit Temp Upload Mismer'),
						anchor('administrator/temp_upload_mismer', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/temp_upload_mismer/edit/' . $save_temp_upload_mismer, 'Edit Temp Upload Mismer')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/temp_upload_mismer');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/temp_upload_mismer');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Temp Upload Mismers
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('temp_upload_mismer_update');

		$this->data['temp_upload_mismer'] = $this->model_temp_upload_mismer->find($id);

		$this->template->title('Temp Upload Mismer Update');
		$this->render('backend/standart/administrator/temp_upload_mismer/temp_upload_mismer_update', $this->data);
	}

	/**
	* Update Temp Upload Mismers
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('temp_upload_mismer_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'BatchID' => $this->input->post('BatchID'),
			];

			
			$save_temp_upload_mismer = $this->model_temp_upload_mismer->change($id, $save_data);

			if ($save_temp_upload_mismer) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/temp_upload_mismer', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/temp_upload_mismer');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/temp_upload_mismer');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Temp Upload Mismers
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('temp_upload_mismer_delete');

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
            set_message(cclang('has_been_deleted', 'temp_upload_mismer'), 'success');
        } else {
            set_message(cclang('error_delete', 'temp_upload_mismer'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Temp Upload Mismers
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('temp_upload_mismer_view');

		$this->data['temp_upload_mismer'] = $this->model_temp_upload_mismer->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Temp Upload Mismer Detail');
		$this->render('backend/standart/administrator/temp_upload_mismer/temp_upload_mismer_view', $this->data);
	}
	
	/**
	* delete Temp Upload Mismers
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$temp_upload_mismer = $this->model_temp_upload_mismer->find($id);

		
		
		return $this->model_temp_upload_mismer->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('temp_upload_mismer_export');

		$this->model_temp_upload_mismer->export('temp_upload_mismer', 'temp_upload_mismer');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('temp_upload_mismer_export');

		$this->model_temp_upload_mismer->pdf('temp_upload_mismer', 'temp_upload_mismer');
	}
}


/* End of file temp_upload_mismer.php */
/* Location: ./application/controllers/administrator/Temp Upload Mismer.php */