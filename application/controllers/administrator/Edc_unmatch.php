<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Edc Unmatch Controller
*| --------------------------------------------------------------------------
*| Edc Unmatch site
*|
*/
class Edc_unmatch extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_edc_unmatch');
	}

	/**
	* show all Edc Unmatchs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('edc_unmatch_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['edc_unmatchs'] = $this->model_edc_unmatch->get($filter, $field, $this->limit_page, $offset);
		$this->data['edc_unmatch_counts'] = $this->model_edc_unmatch->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/edc_unmatch/index/',
			'total_rows'   => $this->model_edc_unmatch->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Edc Unmatch List');
		$this->render('backend/standart/administrator/edc_unmatch/edc_unmatch_list', $this->data);
	}
	
	/**
	* Add new edc_unmatchs
	*
	*/
	public function add()
	{
		$this->is_allowed('edc_unmatch_add');

		$this->template->title('Edc Unmatch New');
		$this->render('backend/standart/administrator/edc_unmatch/edc_unmatch_add', $this->data);
	}

	/**
	* Add New Edc Unmatchs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('edc_unmatch_add', false)) {
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
				'IS_MATCH' => $this->input->post('IS_MATCH'),
			];

			
			$save_edc_unmatch = $this->model_edc_unmatch->store($save_data);

			if ($save_edc_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_edc_unmatch;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/edc_unmatch/edit/' . $save_edc_unmatch, 'Edit Edc Unmatch'),
						anchor('administrator/edc_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/edc_unmatch/edit/' . $save_edc_unmatch, 'Edit Edc Unmatch')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/edc_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/edc_unmatch');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Edc Unmatchs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('edc_unmatch_update');

		$this->data['edc_unmatch'] = $this->model_edc_unmatch->find($id);

		$this->template->title('Edc Unmatch Update');
		$this->render('backend/standart/administrator/edc_unmatch/edc_unmatch_update', $this->data);
	}

	/**
	* Update Edc Unmatchs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('edc_unmatch_update', false)) {
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
				'IS_MATCH' => $this->input->post('IS_MATCH'),
			];

			
			$save_edc_unmatch = $this->model_edc_unmatch->change($id, $save_data);

			if ($save_edc_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/edc_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/edc_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/edc_unmatch');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Edc Unmatchs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('edc_unmatch_delete');

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
            set_message(cclang('has_been_deleted', 'edc_unmatch'), 'success');
        } else {
            set_message(cclang('error_delete', 'edc_unmatch'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Edc Unmatchs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('edc_unmatch_view');

		$this->data['edc_unmatch'] = $this->model_edc_unmatch->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Edc Unmatch Detail');
		$this->render('backend/standart/administrator/edc_unmatch/edc_unmatch_view', $this->data);
	}
	
	/**
	* delete Edc Unmatchs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$edc_unmatch = $this->model_edc_unmatch->find($id);

		
		
		return $this->model_edc_unmatch->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('edc_unmatch_export');

		$this->model_edc_unmatch->export('edc_unmatch', 'edc_unmatch');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('edc_unmatch_export');

		$this->model_edc_unmatch->pdf('edc_unmatch', 'edc_unmatch');
	}
}


/* End of file edc_unmatch.php */
/* Location: ./application/controllers/administrator/Edc Unmatch.php */