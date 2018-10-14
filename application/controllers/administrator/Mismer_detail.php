<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Mismer Detail Controller
*| --------------------------------------------------------------------------
*| Mismer Detail site
*|
*/
class Mismer_detail extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_mismer_detail');
	}

	/**
	* show all Mismer Details
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('mismer_detail_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mismer_details'] = $this->model_mismer_detail->get($filter, $field, $this->limit_page, $offset);
		$this->data['mismer_detail_counts'] = $this->model_mismer_detail->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/mismer_detail/index/',
			'total_rows'   => $this->model_mismer_detail->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mismer Detail List');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_list', $this->data);
	}
	
	/**
	* Add new mismer_details
	*
	*/
	public function add()
	{
		$this->is_allowed('mismer_detail_add');

		$this->template->title('Mismer Detail New');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_add', $this->data);
	}

	/**
	* Add New Mismer Details
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('mismer_detail_add', false)) {
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
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
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
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_detail = $this->model_mismer_detail->store($save_data);

			if ($save_mismer_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mismer_detail;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/mismer_detail/edit/' . $save_mismer_detail, 'Edit Mismer Detail'),
						anchor('administrator/mismer_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/mismer_detail/edit/' . $save_mismer_detail, 'Edit Mismer Detail')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Mismer Details
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('mismer_detail_update');

		$this->data['mismer_detail'] = $this->model_mismer_detail->find($id);

		$this->template->title('Mismer Detail Update');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_update', $this->data);
	}

	/**
	* Update Mismer Details
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('mismer_detail_update', false)) {
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
		$this->form_validation->set_rules('IS_MATCH', 'IS MATCH', 'trim|required|max_length[11]');
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
				'IS_MATCH' => $this->input->post('IS_MATCH'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => $this->input->post('updated_at'),
			];

			
			$save_mismer_detail = $this->model_mismer_detail->change($id, $save_data);

			if ($save_mismer_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/mismer_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_detail');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Mismer Details
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('mismer_detail_delete');

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
            set_message(cclang('has_been_deleted', 'mismer_detail'), 'success');
        } else {
            set_message(cclang('error_delete', 'mismer_detail'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Mismer Details
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('mismer_detail_view');

		$this->data['mismer_detail'] = $this->model_mismer_detail->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Mismer Detail Detail');
		$this->render('backend/standart/administrator/mismer_detail/mismer_detail_view', $this->data);
	}
	
	/**
	* delete Mismer Details
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$mismer_detail = $this->model_mismer_detail->find($id);

		
		
		return $this->model_mismer_detail->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('mismer_detail_export');

		$this->model_mismer_detail->export('mismer_detail', 'mismer_detail');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('mismer_detail_export');

		$this->model_mismer_detail->pdf('mismer_detail', 'mismer_detail');
	}
}


/* End of file mismer_detail.php */
/* Location: ./application/controllers/administrator/Mismer Detail.php */