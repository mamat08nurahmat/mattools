<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Tabel Tes Controller
*| --------------------------------------------------------------------------
*| Tabel Tes site
*|
*/
class Tabel_tes extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_tabel_tes');
	}

	/**
	* show all Tabel Tess
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('tabel_tes_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['tabel_tess'] = $this->model_tabel_tes->get($filter, $field, $this->limit_page, $offset);
		$this->data['tabel_tes_counts'] = $this->model_tabel_tes->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/tabel_tes/index/',
			'total_rows'   => $this->model_tabel_tes->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Tabel Tes List');
		$this->render('backend/standart/administrator/tabel_tes/tabel_tes_list', $this->data);
	}
	
	/**
	* Add new tabel_tess
	*
	*/
	public function add()
	{
		$this->is_allowed('tabel_tes_add');

		$this->template->title('Tabel Tes New');
		$this->render('backend/standart/administrator/tabel_tes/tabel_tes_add', $this->data);
	}

	/**
	* Add New Tabel Tess
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('tabel_tes_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definition', 'trim|required');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition'),
			];

			
			$save_tabel_tes = $this->model_tabel_tes->store($save_data);

			if ($save_tabel_tes) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_tabel_tes;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/tabel_tes/edit/' . $save_tabel_tes, 'Edit Tabel Tes'),
						anchor('administrator/tabel_tes', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/tabel_tes/edit/' . $save_tabel_tes, 'Edit Tabel Tes')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tabel_tes');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tabel_tes');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Tabel Tess
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('tabel_tes_update');

		$this->data['tabel_tes'] = $this->model_tabel_tes->find($id);

		$this->template->title('Tabel Tes Update');
		$this->render('backend/standart/administrator/tabel_tes/tabel_tes_update', $this->data);
	}

	/**
	* Update Tabel Tess
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('tabel_tes_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('definition', 'Definition', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'name' => $this->input->post('name'),
				'definition' => $this->input->post('definition'),
			];

			
			$save_tabel_tes = $this->model_tabel_tes->change($id, $save_data);

			if ($save_tabel_tes) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/tabel_tes', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/tabel_tes');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/tabel_tes');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Tabel Tess
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('tabel_tes_delete');

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
            set_message(cclang('has_been_deleted', 'tabel_tes'), 'success');
        } else {
            set_message(cclang('error_delete', 'tabel_tes'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Tabel Tess
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('tabel_tes_view');

		$this->data['tabel_tes'] = $this->model_tabel_tes->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Tabel Tes Detail');
		$this->render('backend/standart/administrator/tabel_tes/tabel_tes_view', $this->data);
	}
	
	/**
	* delete Tabel Tess
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$tabel_tes = $this->model_tabel_tes->find($id);

		
		
		return $this->model_tabel_tes->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('tabel_tes_export');

		$this->model_tabel_tes->export('tabel_tes', 'tabel_tes');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('tabel_tes_export');

		$this->model_tabel_tes->pdf('tabel_tes', 'tabel_tes');
	}
}


/* End of file tabel_tes.php */
/* Location: ./application/controllers/administrator/Tabel Tes.php */