<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Flex Controller
*| --------------------------------------------------------------------------
*| Flex site
*|
*/
class Flex extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_flex');
	}

	/**
	* show all Flexs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{

		// print_r($_SESSION['id']);die();

		$id_users = $_SESSION['id'];
		$this->is_allowed('flex_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['flexs'] = $this->model_flex->get($id_users,$filter, $field, $this->limit_page, $offset);
		$this->data['flex_counts'] = $this->model_flex->count_all($id_users,$filter, $field);

		$config = [
			'base_url'     => 'administrator/flex/index/',
			'total_rows'   => $this->model_flex->count_all($id_users,$filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Flex List');
		$this->render('backend/standart/administrator/flex/flex_list', $this->data);
	}
	
	/**
	* Add new flexs
	*
	*/
	public function add()
	{
		$this->is_allowed('flex_add');

		$this->template->title('Flex New');
		$this->render('backend/standart/administrator/flex/flex_add', $this->data);
	}

	/**
	* Add New Flexs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('flex_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('flex_file_name[]', 'File', 'trim|required|max_length[255]');
		// $this->form_validation->set_rules('download_at', 'Download At', 'trim|required');
		$this->form_validation->set_rules('uploader', 'Uploader', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('send_to', 'Send To', 'trim|required|max_length[55]');
		// $this->form_validation->set_rules('is_download', 'Is Download', 'trim|required|max_length[5]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'upload_at' => date('Y-m-d H:i:s'),
				// 'download_at' => $this->input->post('download_at'),
				'download_at' => null ,
				'uploader' => $this->input->post('uploader'),
				// 'uploader' => ????,
				'send_to' => $this->input->post('send_to'),
				'is_download' => 0,
				// 'is_download' => $this->input->post('is_download'),
			];

			if (!is_dir(FCPATH . '/uploads/flex/')) {
				mkdir(FCPATH . '/uploads/flex/');
			}

			if (count((array) $this->input->post('flex_file_name'))) {
				foreach ((array) $_POST['flex_file_name'] as $idx => $file_name) {
					$flex_file_name_copy = date('YmdHis') . '-' . $file_name;

					rename(FCPATH . 'uploads/tmp/' . $_POST['flex_file_uuid'][$idx] . '/' .  $file_name, 
							FCPATH . 'uploads/flex/' . $flex_file_name_copy);

					$listed_image[] = $flex_file_name_copy;

					if (!is_file(FCPATH . '/uploads/flex/' . $flex_file_name_copy)) {
						echo json_encode([
							'success' => false,
							'message' => 'Error uploading file'
							]);
						exit;
					}
				}

				$save_data['file'] = implode($listed_image, ',');
			}
		
			
			$save_flex = $this->model_flex->store($save_data);

			if ($save_flex) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_flex;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/flex/edit/' . $save_flex, 'Edit Flex'),
						anchor('administrator/flex', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/flex/edit/' . $save_flex, 'Edit Flex')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/flex');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/flex');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Flexs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('flex_update');

		$this->data['flex'] = $this->model_flex->find($id);

		$this->template->title('Flex Update');
		$this->render('backend/standart/administrator/flex/flex_update', $this->data);
	}

	/**
	* Update Flexs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('flex_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('flex_file_name[]', 'File', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('download_at', 'Download At', 'trim|required');
		$this->form_validation->set_rules('uploader', 'Uploader', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('send_to', 'Send To', 'trim|required|max_length[55]');
		$this->form_validation->set_rules('is_download', 'Is Download', 'trim|required|max_length[5]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'upload_at' => date('Y-m-d H:i:s'),
				'download_at' => $this->input->post('download_at'),
				'uploader' => $this->input->post('uploader'),
				'send_to' => $this->input->post('send_to'),
				'is_download' => $this->input->post('is_download'),
			];

			$listed_image = [];
			if (count((array) $this->input->post('flex_file_name'))) {
				foreach ((array) $_POST['flex_file_name'] as $idx => $file_name) {
					if (isset($_POST['flex_file_uuid'][$idx]) AND !empty($_POST['flex_file_uuid'][$idx])) {
						$flex_file_name_copy = date('YmdHis') . '-' . $file_name;

						rename(FCPATH . 'uploads/tmp/' . $_POST['flex_file_uuid'][$idx] . '/' .  $file_name, 
								FCPATH . 'uploads/flex/' . $flex_file_name_copy);

						$listed_image[] = $flex_file_name_copy;

						if (!is_file(FCPATH . '/uploads/flex/' . $flex_file_name_copy)) {
							echo json_encode([
								'success' => false,
								'message' => 'Error uploading file'
								]);
							exit;
						}
					} else {
						$listed_image[] = $file_name;
					}
				}
			}
			
			$save_data['file'] = implode($listed_image, ',');
		
			
			$save_flex = $this->model_flex->change($id, $save_data);

			if ($save_flex) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/flex', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/flex');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/flex');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Flexs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('flex_delete');

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
            set_message(cclang('has_been_deleted', 'flex'), 'success');
        } else {
            set_message(cclang('error_delete', 'flex'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Flexs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('flex_view');

		$this->data['flex'] = $this->model_flex->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Flex Detail');
		$this->render('backend/standart/administrator/flex/flex_view', $this->data);
	}
	
	/**
	* delete Flexs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$flex = $this->model_flex->find($id);

		
		if (!empty($flex->file)) {
			foreach ((array) explode(',', $flex->file) as $filename) {
				$path = FCPATH . '/uploads/flex/' . $filename;

				if (is_file($path)) {
					$delete_file = unlink($path);
				}
			}
		}
		
		return $this->model_flex->remove($id);
	}
	
	
	/**
	* Upload Image Flex	* 
	* @return JSON
	*/
	public function upload_file_file()
	{
		if (!$this->is_allowed('flex_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$uuid = $this->input->post('qquuid');

		echo $this->upload_file([
			'uuid' 		 	=> $uuid,
			'table_name' 	=> 'flex',
		]);
	}

	/**
	* Delete Image Flex	* 
	* @return JSON
	*/
	public function delete_file_file($uuid)
	{
		if (!$this->is_allowed('flex_delete', false)) {
			echo json_encode([
				'success' => false,
				'error' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		echo $this->delete_file([
            'uuid'              => $uuid, 
            'delete_by'         => $this->input->get('by'), 
            'field_name'        => 'file', 
            'upload_path_tmp'   => './uploads/tmp/',
            'table_name'        => 'flex',
            'primary_key'       => 'ID',
            'upload_path'       => 'uploads/flex/'
        ]);
	}

	/**
	* Get Image Flex	* 
	* @return JSON
	*/
	public function get_file_file($id)
	{
		if (!$this->is_allowed('flex_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => 'Image not loaded, you do not have permission to access'
				]);
			exit;
		}

		$flex = $this->model_flex->find($id);

		echo $this->get_file([
            'uuid'              => $id, 
            'delete_by'         => 'id', 
            'field_name'        => 'file', 
            'table_name'        => 'flex',
            'primary_key'       => 'ID',
            'upload_path'       => 'uploads/flex/',
            'delete_endpoint'   => 'administrator/flex/delete_file_file'
        ]);
	}
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('flex_export');

		$this->model_flex->export('flex', 'flex');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('flex_export');

		$this->model_flex->pdf('flex', 'flex');
	}
}


/* End of file flex.php */
/* Location: ./application/controllers/administrator/Flex.php */