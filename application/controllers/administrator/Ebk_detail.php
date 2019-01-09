<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Ebk Detail Controller
*| --------------------------------------------------------------------------
*| Ebk Detail site
*|
*/
class Ebk_detail extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_ebk_detail');
	}

	/**
	* show all Ebk Details
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('ebk_detail_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['ebk_details'] = $this->model_ebk_detail->get($filter, $field, $this->limit_page, $offset);
		$this->data['ebk_detail_counts'] = $this->model_ebk_detail->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/ebk_detail/index/',
			'total_rows'   => $this->model_ebk_detail->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Ebk Detail List');
		$this->render('backend/standart/administrator/ebk_detail/ebk_detail_list', $this->data);
	}
	
	/**
	* Add new ebk_details
	*
	*/
	public function add()
	{
		$this->is_allowed('ebk_detail_add');

		$this->template->title('Ebk Detail New');
		$this->render('backend/standart/administrator/ebk_detail/ebk_detail_add', $this->data);
	}

	/**
	* Add New Ebk Details
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('ebk_detail_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];

			
			$save_ebk_detail = $this->model_ebk_detail->store($save_data);

			if ($save_ebk_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_ebk_detail;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/ebk_detail/edit/' . $save_ebk_detail, 'Edit Ebk Detail'),
						anchor('administrator/ebk_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/ebk_detail/edit/' . $save_ebk_detail, 'Edit Ebk Detail')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ebk_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ebk_detail');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Ebk Details
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('ebk_detail_update');

		$this->data['ebk_detail'] = $this->model_ebk_detail->find($id);

		$this->template->title('Ebk Detail Update');
		$this->render('backend/standart/administrator/ebk_detail/ebk_detail_update', $this->data);
	}

	/**
	* Update Ebk Details
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('ebk_detail_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ID_NUMBER', 'ID NUMBER', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[25]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS_1', 'POS 1', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('TAHUN', 'TAHUN', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('BULAN', 'BULAN', 'trim|required|max_length[5]');
		$this->form_validation->set_rules('generate_at', 'Generate At', 'trim|required');
		$this->form_validation->set_rules('update_at', 'Update At', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'CITY' => $this->input->post('CITY'),
				'ID_NUMBER' => $this->input->post('ID_NUMBER'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS_1' => $this->input->post('POS_1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'TAHUN' => $this->input->post('TAHUN'),
				'BULAN' => $this->input->post('BULAN'),
				'generate_at' => $this->input->post('generate_at'),
				'update_at' => $this->input->post('update_at'),
			];

			
			$save_ebk_detail = $this->model_ebk_detail->change($id, $save_data);

			if ($save_ebk_detail) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/ebk_detail', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/ebk_detail');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/ebk_detail');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Ebk Details
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('ebk_detail_delete');

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
            set_message(cclang('has_been_deleted', 'ebk_detail'), 'success');
        } else {
            set_message(cclang('error_delete', 'ebk_detail'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Ebk Details
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('ebk_detail_view');

		$this->data['ebk_detail'] = $this->model_ebk_detail->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Ebk Detail Detail');
		$this->render('backend/standart/administrator/ebk_detail/ebk_detail_view', $this->data);
	}
	
	/**
	* delete Ebk Details
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$ebk_detail = $this->model_ebk_detail->find($id);

		
		
		return $this->model_ebk_detail->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('ebk_detail_export');

		$this->model_ebk_detail->export('ebk_detail', 'ebk_detail');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('ebk_detail_export');

		$this->model_ebk_detail->pdf('ebk_detail', 'ebk_detail');
	}
}


/* End of file ebk_detail.php */
/* Location: ./application/controllers/administrator/Ebk Detail.php */