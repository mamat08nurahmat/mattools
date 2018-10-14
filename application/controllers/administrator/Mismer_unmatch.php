<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Mismer Unmatch Controller
*| --------------------------------------------------------------------------
*| Mismer Unmatch site
*|
*/
class Mismer_unmatch extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_mismer_unmatch');
	}

	/**
	* show all Mismer Unmatchs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('mismer_unmatch_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mismer_unmatchs'] = $this->model_mismer_unmatch->get($filter, $field, $this->limit_page, $offset);
		$this->data['mismer_unmatch_counts'] = $this->model_mismer_unmatch->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/mismer_unmatch/index/',
			'total_rows'   => $this->model_mismer_unmatch->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mismer Unmatch List');
		$this->render('backend/standart/administrator/mismer_unmatch/mismer_unmatch_list', $this->data);
	}
	
	/**
	* Add new mismer_unmatchs
	*
	*/
	public function add()
	{
		$this->is_allowed('mismer_unmatch_add');

		$this->template->title('Mismer Unmatch New');
		$this->render('backend/standart/administrator/mismer_unmatch/mismer_unmatch_add', $this->data);
	}

	/**
	* Add New Mismer Unmatchs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('mismer_unmatch_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_UPDATE', 'IS UPDATE', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('updated_at', 'Updated At', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'IS_UPDATE' => $this->input->post('IS_UPDATE'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_unmatch = $this->model_mismer_unmatch->store($save_data);

			if ($save_mismer_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mismer_unmatch;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/mismer_unmatch/edit/' . $save_mismer_unmatch, 'Edit Mismer Unmatch'),
						anchor('administrator/mismer_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/mismer_unmatch/edit/' . $save_mismer_unmatch, 'Edit Mismer Unmatch')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_unmatch');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Mismer Unmatchs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('mismer_unmatch_update');

		$this->data['mismer_unmatch'] = $this->model_mismer_unmatch->find($id);

		$this->template->title('Mismer Unmatch Update');
		$this->render('backend/standart/administrator/mismer_unmatch/mismer_unmatch_update', $this->data);
	}

	/**
	* Update Mismer Unmatchs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('mismer_unmatch_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_UPDATE', 'IS UPDATE', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('updated_at', 'Updated At', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MID' => $this->input->post('MID'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'IS_UPDATE' => $this->input->post('IS_UPDATE'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_unmatch = $this->model_mismer_unmatch->change($id, $save_data);

			if ($save_mismer_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/mismer_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_unmatch');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Mismer Unmatchs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('mismer_unmatch_delete');

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
            set_message(cclang('has_been_deleted', 'mismer_unmatch'), 'success');
        } else {
            set_message(cclang('error_delete', 'mismer_unmatch'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Mismer Unmatchs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('mismer_unmatch_view');

		$this->data['mismer_unmatch'] = $this->model_mismer_unmatch->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Mismer Unmatch Detail');
		$this->render('backend/standart/administrator/mismer_unmatch/mismer_unmatch_view', $this->data);
	}
	
	/**
	* delete Mismer Unmatchs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$mismer_unmatch = $this->model_mismer_unmatch->find($id);

		
		
		return $this->model_mismer_unmatch->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('mismer_unmatch_export');

		$this->model_mismer_unmatch->export('mismer_unmatch', 'mismer_unmatch');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('mismer_unmatch_export');

		$this->model_mismer_unmatch->pdf('mismer_unmatch', 'mismer_unmatch');
	}
}


/* End of file mismer_unmatch.php */
/* Location: ./application/controllers/administrator/Mismer Unmatch.php */