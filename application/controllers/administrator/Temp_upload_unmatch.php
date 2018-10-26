<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Temp Upload Unmatch Controller
*| --------------------------------------------------------------------------
*| Temp Upload Unmatch site
*|
*/
class Temp_upload_unmatch extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('csvimport');
		$this->load->model('model_temp_upload_unmatch');
		$this->load->model('model_mismer_unmatch');
		$this->load->model('model_mismer_detail');
	}

	/**
	* show all Temp Upload Unmatchs
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		// $this->is_allowed('temp_upload_unmatch_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['temp_upload_unmatchs'] = $this->model_temp_upload_unmatch->get($filter, $field, $this->limit_page, $offset);
		$this->data['temp_upload_unmatch_counts'] = $this->model_temp_upload_unmatch->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/temp_upload_unmatch/index/',
			'total_rows'   => $this->model_temp_upload_unmatch->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Temp Upload Unmatch List');
		$this->render('backend/standart/administrator/temp_upload_unmatch/temp_upload_unmatch_list', $this->data);
	}
	
	/**
	* Add new temp_upload_unmatchs
	*
	*/
	public function add()
	{
		$this->is_allowed('temp_upload_unmatch_add');

		$this->template->title('Temp Upload Unmatch New');
		$this->render('backend/standart/administrator/temp_upload_unmatch/temp_upload_unmatch_add', $this->data);
	}

	/**
	* Add New Temp Upload Unmatchs
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('temp_upload_unmatch_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('RowID', 'RowID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_VALID', 'IS VALID', 'trim|required|max_length[11]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'RowID' => $this->input->post('RowID'),
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'IS_VALID' => $this->input->post('IS_VALID'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_temp_upload_unmatch = $this->model_temp_upload_unmatch->store($save_data);

			if ($save_temp_upload_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_temp_upload_unmatch;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/temp_upload_unmatch/edit/' . $save_temp_upload_unmatch, 'Edit Temp Upload Unmatch'),
						anchor('administrator/temp_upload_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/temp_upload_unmatch/edit/' . $save_temp_upload_unmatch, 'Edit Temp Upload Unmatch')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/temp_upload_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/temp_upload_unmatch');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Temp Upload Unmatchs
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('temp_upload_unmatch_update');

		$this->data['temp_upload_unmatch'] = $this->model_temp_upload_unmatch->find($id);

		$this->template->title('Temp Upload Unmatch Update');
		$this->render('backend/standart/administrator/temp_upload_unmatch/temp_upload_unmatch_update', $this->data);
	}

	/**
	* Update Temp Upload Unmatchs
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('temp_upload_unmatch_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('RowID', 'RowID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('BatchID', 'BatchID', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('OPEN_DATE', 'OPEN DATE', 'trim|required');
		$this->form_validation->set_rules('MERCHAN_DBA_NAME', 'MERCHAN DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('WILAYAH', 'WILAYAH', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('CHANNEL', 'CHANNEL', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('TYPE_MID', 'TYPE MID', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('IS_VALID', 'IS VALID', 'trim|required|max_length[11]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'RowID' => $this->input->post('RowID'),
				'BatchID' => $this->input->post('BatchID'),
				'OPEN_DATE' => $this->input->post('OPEN_DATE'),
				'MERCHAN_DBA_NAME' => $this->input->post('MERCHAN_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'MSO' => $this->input->post('MSO'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'POS1' => $this->input->post('POS1'),
				'WILAYAH' => $this->input->post('WILAYAH'),
				'CHANNEL' => $this->input->post('CHANNEL'),
				'TYPE_MID' => $this->input->post('TYPE_MID'),
				'IS_VALID' => $this->input->post('IS_VALID'),
				'created_at' => date('Y-m-d H:i:s'),
			];

			
			$save_temp_upload_unmatch = $this->model_temp_upload_unmatch->change($id, $save_data);

			if ($save_temp_upload_unmatch) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/temp_upload_unmatch', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/temp_upload_unmatch');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/temp_upload_unmatch');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Temp Upload Unmatchs
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('temp_upload_unmatch_delete');

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
            set_message(cclang('has_been_deleted', 'temp_upload_unmatch'), 'success');
        } else {
            set_message(cclang('error_delete', 'temp_upload_unmatch'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Temp Upload Unmatchs
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('temp_upload_unmatch_view');

		$this->data['temp_upload_unmatch'] = $this->model_temp_upload_unmatch->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Temp Upload Unmatch Detail');
		$this->render('backend/standart/administrator/temp_upload_unmatch/temp_upload_unmatch_view', $this->data);
	}
	
	/**
	* delete Temp Upload Unmatchs
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$temp_upload_unmatch = $this->model_temp_upload_unmatch->find($id);

		
		
		return $this->model_temp_upload_unmatch->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('temp_upload_unmatch_export');

		$this->model_temp_upload_unmatch->export('temp_upload_unmatch', 'temp_upload_unmatch');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('temp_upload_unmatch_export');

		$this->model_temp_upload_unmatch->pdf('temp_upload_unmatch', 'temp_upload_unmatch');
	}

// ------------GENERATE 
public function generate($id = null)
{
	// $this->is_allowed('temp_upload_unmatch_delete');

	// $this->load->helper('file');

	$arr_id = $this->input->get('id');
	$generate = false;

	if (!empty($id)) {
		$generate = $this->_generate($id);
	} elseif (count($arr_id) >0) {
		foreach ($arr_id as $id) {
			$generate = $this->_generate($id);
		}
	}

	if ($generate) {
		set_message(cclang('has_been_generate', 'temp_upload_unmatch'), 'success');
	} else {
		set_message(cclang('error_delete', 'temp_upload_unmatch'), 'error');
	}

	redirect_back();
}

// GENERATE ALL LIMIT

// ------------GENERATE 
public function generate_all($limit =100)
{

	// ini_set('MAX_EXECUTION_TIME', -1);

	// $this->is_allowed('temp_upload_unmatch_delete');

	// $this->load->helper('file');

	$arr_id = $this->db->query("SELECT MID FROM temp_upload_unmatch LIMIT $limit")->result();
	$count_awal = $this->db->query("SELECT COUNT(MID) as jumlah FROM temp_upload_unmatch ")->row();

	
	// print_r($arr_id);die();
	// $arr_id = $this->input->get('id');
	// $generate = false;
	// $id->MID
	// if (!empty($id)) {
		// 	$generate = $this->_generate($id);
		// } elseif (count($arr_id) >0) {
			foreach ($arr_id as $id) {
				// print_r($id->MID);
				// print_r('<hr>');
				
				$generate[$id->MID] = $this->_generate($id->MID);
			}
			// }
			$count_akhir = $this->db->query("SELECT COUNT(MID) as jumlah FROM temp_upload_unmatch ")->row();
			// print_r($count->jumlah);die();
			// $generate['succes'] = count($generate[$id->MID]); 
			$generate['awal'] = $count_awal->jumlah; 
			$generate['akhir'] = $count_akhir->jumlah; 
	// if ($generate) {
	// 	set_message(cclang('has_been_generate', 'temp_upload_unmatch'), 'success');
	// } else {
	// 	set_message(cclang('error_delete', 'temp_upload_unmatch'), 'error');
	// }

	// redirect_back();

	print_r($generate);
}




private function _generate($id)
{

	//$id = MID
	// print_r($id);die();


	$temp_upload_unmatch = $this->model_temp_upload_unmatch->find($id);
	$mismer_unmatch = $this->model_mismer_unmatch->find($id);

// 	print_r($temp_upload_unmatch->RowID);
// die();


	$data_mu = array(

		'RowID' => $temp_upload_unmatch->RowID,
		'BatchID' => $temp_upload_unmatch->BatchID, 
		'OPEN_DATE' => $temp_upload_unmatch->OPEN_DATE,
		//'MID' => 201030988,
		'MERCHAN_DBA_NAME' => $temp_upload_unmatch->MERCHAN_DBA_NAME,      
		'STATUS_EDC' => $temp_upload_unmatch->STATUS_EDC,
		'MSO' => $temp_upload_unmatch->MSO,    
		'SOURCE_CODE' => $temp_upload_unmatch->SOURCE_CODE,                   
		'POS1' => $temp_upload_unmatch->POS1,
		'WILAYAH' => $temp_upload_unmatch->WILAYAH,
		'CHANNEL' => $temp_upload_unmatch->CHANNEL, 
		'TYPE_MID' => $temp_upload_unmatch->TYPE_MID,
		//'IS_VALID' => 0,
		'updated_at' => $temp_upload_unmatch->created_at,

		'IS_UPDATE' => 1
	
	);

// 	print_r($data);
// die();
	


	$generate['update_mismer_unmatch'] = $this->model_mismer_unmatch->change($id,$data_mu);


	$data_md=array(
		'updated_at' => $temp_upload_unmatch->created_at,
		'IS_MATCH' => 1,
		'IS_UPDATE' => 1
	);

	$generate['update_mismer_detail'] = $this->model_mismer_detail->change($id,$data_md);


	$generate['remove_temp'] = $this->model_temp_upload_unmatch->remove($id);
	// print_r($temp_upload_unmatch);
	// print_r('<hr>');
	// print_r($mismer_unmatch);
	// die();
	
	// $generate['remove_unmatch'] = $this->model_mismer_unmatch->remove($id);

	// print_r($generate);
return $generate;
	// return $this->model_temp_upload_unmatch->remove($id);

}


// UPLOAD
public function upload()
{
	// $this->is_allowed('temp_upload_unmatch_add');

	$this->template->title('Temp Upload Unmatch New');
	$this->render('backend/standart/administrator/temp_upload_unmatch/temp_upload_unmatch_upload', $this->data);
}

// UPLOAD SAVE
public function upload_save()
{

$file = 	$this->input->post('file');	

		if ($this->input->post('save_type') == 'stay') {	
					echo json_encode([
						'success' => true,
						'message' => $file,
						'redirect' => base_url('administrator/temp_upload_unmatch')
						]);
		}else{


			echo json_encode([
				'success' => true,
				'message' => 'tessssssssssss',
				'redirect' => base_url('administrator/temp_upload_unmatch')
				]);
	

		}

		

	// 	set_message(
	// 		cclang('success_save_data_redirect', [
	// 		anchor('administrator/temp_upload_unmatch/edit/' . 1, 'Edit Blog')
	// 	]), 'success');

	// 	$this->data['success'] = true;
	// 	$this->data['redirect'] = base_url('administrator/temp_upload_unmatch');
	// }

	// echo json_encode($this->data);

	// if (!$this->is_allowed('blog_add', false)) {
	// 	echo json_encode([
	// 		'success' => false,
	// 		'message' => cclang('sorry_you_do_not_have_permission_to_access')
	// 		]);
	// 	exit;
	// }

	// $this->form_validation->set_rules('title', 'Title', 'trim|required|max_length[200]');
	// $this->form_validation->set_rules('content', 'Content', 'trim|required');
	// $this->form_validation->set_rules('blog_image_name[]', 'Image', 'trim');
	// $this->form_validation->set_rules('category', 'Category', 'trim|required|max_length[200]');
	// $this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[10]');
	

	// if ($this->form_validation->run()) {
	// 	$slug = url_title(substr($this->input->post('title'), 0, 100));
	// 	$save_data = [
	// 		'title' => $this->input->post('title'),
	// 		'slug' => $slug,
	// 		'content' => $this->input->post('content'),
	// 		'tags' => $this->input->post('tags'),
	// 		'category' => $this->input->post('category'),
	// 		'author' => get_user_data('username'),
	// 		'status' => $this->input->post('status'),
	// 		'created_at' => date('Y-m-d H:i:s'),
	// 	];


	// 	if (!is_dir(FCPATH . '/uploads/blog/')) {
	// 		mkdir(FCPATH . '/uploads/blog/');
	// 	}

	// 	if (count((array) $this->input->post('blog_image_name'))) {
	// 		foreach ((array) $_POST['blog_image_name'] as $idx => $file_name) {
	// 			$blog_image_name_copy = date('YmdHis') . '-' . $file_name;

	// 			rename(FCPATH . 'uploads/tmp/' . $_POST['blog_image_uuid'][$idx] . '/' .  $file_name, 
	// 					FCPATH . 'uploads/blog/' . $blog_image_name_copy);

	// 			$listed_image[] = $blog_image_name_copy;

	// 			if (!is_file(FCPATH . '/uploads/blog/' . $blog_image_name_copy)) {
	// 				echo json_encode([
	// 					'success' => false,
	// 					'message' => 'Error uploading file'
	// 					]);
	// 				exit;
	// 			}
	// 		}

	// 		$save_data['image'] = implode($listed_image, ',');
	// 	}
	
		
	// 	$save_blog = $this->model_blog->store($save_data);

	// 	if ($save_blog) {
	// 		if ($this->input->post('save_type') == 'stay') {
	// 			$this->data['success'] = true;
	// 			$this->data['id'] 	   = $save_blog;
	// 			$this->data['message'] = cclang('success_save_data_stay', [
	// 				anchor('administrator/blog/edit/' . $save_blog, 'Edit Blog'),
	// 				anchor('administrator/blog', ' Go back to list')
	// 			]);
	// 		} else {
	// 			set_message(
	// 				cclang('success_save_data_redirect', [
	// 				anchor('administrator/blog/edit/' . $save_blog, 'Edit Blog')
	// 			]), 'success');

	// 			$this->data['success'] = true;
	// 			$this->data['redirect'] = base_url('administrator/blog');
	// 		}
	// 	} else {
	// 		if ($this->input->post('save_type') == 'stay') {
	// 			$this->data['success'] = false;
	// 			$this->data['message'] = cclang('data_not_change');
	// 		} else {
	// 			$this->data['success'] = false;
	// 			$this->data['message'] = cclang('data_not_change');
	// 			$this->data['redirect'] = base_url('administrator/blog');
	// 		}
	// 	}

	// } else {
	// 	$this->data['success'] = false;
	// 	$this->data['message'] = validation_errors();
	// }

	// echo json_encode($this->data);
}


// ===========

public function import()
{

	$file_data = $this->csvimport->get_array($_FILES['file-0']["tmp_name"]);
	// $file_data = $_FILES;
	// $link_csv = 'C:\xampp\htdocs\mattools\tes_unmatch10.csv';
	// $file_data = $this->csvimport->get_array($link_csv);
	// $file_data = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);

	// print_r($file_data);die();

	foreach($file_data as $row)
	{
		$data[] = array(

			// MID 	OPEN DATE 	MERCHAN DBA NAME 	STATUS EDC

			'RowID'	=>	$row["RowID"],
			'BatchID'	=>	$row["BatchID"],
			'MID'	=>	$row["MID"],
			'OPEN_DATE'		=>	$row["OPEN DATE"],
			'MERCHAN_DBA_NAME'	=>	$row["MERCHAN DBA NAME"],
			'STATUS_EDC'			=>	$row["STATUS EDC"],
			
			'MSO'			=>	$row["MSO"],
			'SOURCE_CODE'			=>	$row["SOURCE CODE"],
			'POS1'			=>	$row["POS1"],
			'WILAYAH'			=>	$row["WILAYAH"],
			'CHANNEL'			=>	$row["CHANNEL"],
			'TYPE_MID'			=>	$row["TYPE MID"],
			
			

		);
	}
	// print_r($data);die();

	// $this->csv_import_model->insert($data);

	$proses['truncate_temp' ] = $this->db->query('truncate temp_upload_unmatch');

	$proses['insert-batch_succes' ] = $this->db->insert_batch('temp_upload_unmatch', $data);

	echo json_encode([
		'success' => true,
		'message' => 'success', 
		'proses' => $proses, 
		'data_count' => count($file_data) 
		// 'redirect' => $this->input->post('csv_file')
		]);

}


}


/* End of file temp_upload_unmatch.php */
/* Location: ./application/controllers/administrator/Temp Upload Unmatch.php */