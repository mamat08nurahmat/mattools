<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Form Application Source Controller
*| --------------------------------------------------------------------------
*| Form Application Source site
*|
*/
class Form_application_source extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_form_application_source');
	}

	/**
	* show all Form Application Sources
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('form_application_source_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['form_application_sources'] = $this->model_form_application_source->get($filter, $field, $this->limit_page, $offset);
		$this->data['form_application_source_counts'] = $this->model_form_application_source->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/form_application_source/index/',
			'total_rows'   => $this->model_form_application_source->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Application Source List');
		$this->render('backend/standart/administrator/form_builder/form_application_source/form_application_source_list', $this->data);
	}

	/**
	* Update view Form Application Sources
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('form_application_source_update');

		$this->data['form_application_source'] = $this->model_form_application_source->find($id);

		$this->template->title('Application Source Update');
		$this->render('backend/standart/administrator/form_builder/form_application_source/form_application_source_update', $this->data);
	}

	/**
	* Update Form Application Sources
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('form_application_source_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('source_name', 'Source Name', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'source_name' => $this->input->post('source_name'),
			];

			
			$save_form_application_source = $this->model_form_application_source->change($id, $save_data);

			if ($save_form_application_source) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/form_application_source', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/form_application_source');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
					set_message('Your data not change.', 'error');
					
            		$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/form_application_source');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	/**
	* delete Form Application Sources
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('form_application_source_delete');

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
            set_message(cclang('has_been_deleted', 'Form Application Source'), 'success');
        } else {
            set_message(cclang('error_delete', 'Form Application Source'), 'error');
        }

		redirect_back();
	}

	/**
	* View view Form Application Sources
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('form_application_source_view');

		$this->data['form_application_source'] = $this->model_form_application_source->find($id);

		$this->template->title('Application Source Detail');
		$this->render('backend/standart/administrator/form_builder/form_application_source/form_application_source_view', $this->data);
	}

	/**
	* delete Form Application Sources
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$form_application_source = $this->model_form_application_source->find($id);

		
		return $this->model_form_application_source->remove($id);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('form_application_source_export');

		$this->model_form_application_source->export('form_application_source', 'form_application_source');
	}
}


/* End of file form_application_source.php */
/* Location: ./application/controllers/administrator/Form Application Source.php */