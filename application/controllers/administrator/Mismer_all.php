<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Mismer All Controller
*| --------------------------------------------------------------------------
*| Mismer All site
*|
*/
class Mismer_all extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_mismer_all');
	}

	/**
	* show all Mismer Alls
	*
	* @var $offset String
	*/
	public function index($offset = 0)
	{
		$this->is_allowed('mismer_all_list');

		$filter = $this->input->get('q');
		$field 	= $this->input->get('f');

		$this->data['mismer_alls'] = $this->model_mismer_all->get($filter, $field, $this->limit_page, $offset);
		$this->data['mismer_all_counts'] = $this->model_mismer_all->count_all($filter, $field);

		$config = [
			'base_url'     => 'administrator/mismer_all/index/',
			'total_rows'   => $this->model_mismer_all->count_all($filter, $field),
			'per_page'     => $this->limit_page,
			'uri_segment'  => 4,
		];

		$this->data['pagination'] = $this->pagination($config);

		$this->template->title('Mismer All List');
		$this->render('backend/standart/administrator/mismer_all/mismer_all_list', $this->data);
	}
	
	/**
	* Add new mismer_alls
	*
	*/
	public function add()
	{
		$this->is_allowed('mismer_all_add');

		$this->template->title('Mismer All New');
		$this->render('backend/standart/administrator/mismer_all/mismer_all_add', $this->data);
	}

	/**
	* Add New Mismer Alls
	*
	* @return JSON
	*/
	public function add_save()
	{
		if (!$this->is_allowed('mismer_all_add', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}

		$this->form_validation->set_rules('ORG', 'ORG', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OPENDATE', 'OPENDATE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATE', 'STATE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DATE_LAST_MAINTAIN', 'DATE LAST MAINTAIN', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CONTACT_PERSON', 'CONTACT PERSON', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TELP1', 'TELP1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TELP2', 'TELP2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MMO', 'MMO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DDA', 'DDA', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_TYPE', 'MERCHANT TYPE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CHAIN_STORE', 'CHAIN STORE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_NAME', 'MERCHANT NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ALAMAT1', 'ALAMAT1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ALAMAT2', 'ALAMAT2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('KOTA1', 'KOTA1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('KOTA2', 'KOTA2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ZIPCODE', 'ZIPCODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom24', 'Kolom24', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MCC1', 'MCC1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MCC2', 'MCC2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom27', 'Kolom27', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom28', 'Kolom28', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom29', 'Kolom29', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS2', 'POS2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS3', 'POS3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN1', 'PLAN1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN2', 'PLAN2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN3', 'PLAN3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DATE_LAST_STATEMENT', 'DATE LAST STATEMENT', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom37', 'Kolom37', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom38', 'Kolom38', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom39', 'Kolom39', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom40', 'Kolom40', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom41', 'Kolom41', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom42', 'Kolom42', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom43', 'Kolom43', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom44', 'Kolom44', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom45', 'Kolom45', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom46', 'Kolom46', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom47', 'Kolom47', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('NPWP', 'NPWP', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ACCOUNT_NO', 'ACCOUNT NO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('BANK_NAME', 'BANK NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom51', 'Kolom51', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom52', 'Kolom52', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom53', 'Kolom53', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom54', 'Kolom54', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom55', 'Kolom55', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom56', 'Kolom56', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom57', 'Kolom57', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom58', 'Kolom58', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MDR_VISA_BNI', 'MDR VISA BNI', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom60', 'Kolom60', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom61', 'Kolom61', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom62', 'Kolom62', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom63', 'Kolom63', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom64', 'Kolom64', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom65', 'Kolom65', 'trim|required|max_length[255]');
		

		if ($this->form_validation->run()) {
		
			$save_data = [
				'ORG' => $this->input->post('ORG'),
				'MID' => $this->input->post('MID'),
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'OPENDATE' => $this->input->post('OPENDATE'),
				'CITY' => $this->input->post('CITY'),
				'STATE' => $this->input->post('STATE'),
				'DATE_LAST_MAINTAIN' => $this->input->post('DATE_LAST_MAINTAIN'),
				'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
				'TELP1' => $this->input->post('TELP1'),
				'TELP2' => $this->input->post('TELP2'),
				'MSO' => $this->input->post('MSO'),
				'MMO' => $this->input->post('MMO'),
				'DDA' => $this->input->post('DDA'),
				'MERCHANT_TYPE' => $this->input->post('MERCHANT_TYPE'),
				'CHAIN_STORE' => $this->input->post('CHAIN_STORE'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'MERCHANT_NAME' => $this->input->post('MERCHANT_NAME'),
				'ALAMAT1' => $this->input->post('ALAMAT1'),
				'ALAMAT2' => $this->input->post('ALAMAT2'),
				'KOTA1' => $this->input->post('KOTA1'),
				'KOTA2' => $this->input->post('KOTA2'),
				'ZIPCODE' => $this->input->post('ZIPCODE'),
				'kolom24' => $this->input->post('kolom24'),
				'MCC1' => $this->input->post('MCC1'),
				'MCC2' => $this->input->post('MCC2'),
				'kolom27' => $this->input->post('kolom27'),
				'kolom28' => $this->input->post('kolom28'),
				'kolom29' => $this->input->post('kolom29'),
				'POS1' => $this->input->post('POS1'),
				'POS2' => $this->input->post('POS2'),
				'POS3' => $this->input->post('POS3'),
				'PLAN1' => $this->input->post('PLAN1'),
				'PLAN2' => $this->input->post('PLAN2'),
				'PLAN3' => $this->input->post('PLAN3'),
				'DATE_LAST_STATEMENT' => $this->input->post('DATE_LAST_STATEMENT'),
				'kolom37' => $this->input->post('kolom37'),
				'kolom38' => $this->input->post('kolom38'),
				'kolom39' => $this->input->post('kolom39'),
				'kolom40' => $this->input->post('kolom40'),
				'kolom41' => $this->input->post('kolom41'),
				'kolom42' => $this->input->post('kolom42'),
				'kolom43' => $this->input->post('kolom43'),
				'kolom44' => $this->input->post('kolom44'),
				'kolom45' => $this->input->post('kolom45'),
				'kolom46' => $this->input->post('kolom46'),
				'kolom47' => $this->input->post('kolom47'),
				'NPWP' => $this->input->post('NPWP'),
				'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
				'BANK_NAME' => $this->input->post('BANK_NAME'),
				'kolom51' => $this->input->post('kolom51'),
				'kolom52' => $this->input->post('kolom52'),
				'kolom53' => $this->input->post('kolom53'),
				'kolom54' => $this->input->post('kolom54'),
				'kolom55' => $this->input->post('kolom55'),
				'kolom56' => $this->input->post('kolom56'),
				'kolom57' => $this->input->post('kolom57'),
				'kolom58' => $this->input->post('kolom58'),
				'MDR_VISA_BNI' => $this->input->post('MDR_VISA_BNI'),
				'kolom60' => $this->input->post('kolom60'),
				'kolom61' => $this->input->post('kolom61'),
				'kolom62' => $this->input->post('kolom62'),
				'kolom63' => $this->input->post('kolom63'),
				'kolom64' => $this->input->post('kolom64'),
				'kolom65' => $this->input->post('kolom65'),
				'MDR_VISA_OTHER' => $this->input->post('MDR_VISA_OTHER'),
			];

			
			$save_mismer_all = $this->model_mismer_all->store($save_data);

			if ($save_mismer_all) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $save_mismer_all;
					$this->data['message'] = cclang('success_save_data_stay', [
						anchor('administrator/mismer_all/edit/' . $save_mismer_all, 'Edit Mismer All'),
						anchor('administrator/mismer_all', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_save_data_redirect', [
						anchor('administrator/mismer_all/edit/' . $save_mismer_all, 'Edit Mismer All')
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_all');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_all');
				}
			}

		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
		/**
	* Update view Mismer Alls
	*
	* @var $id String
	*/
	public function edit($id)
	{
		$this->is_allowed('mismer_all_update');

		$this->data['mismer_all'] = $this->model_mismer_all->find($id);

		$this->template->title('Mismer All Update');
		$this->render('backend/standart/administrator/mismer_all/mismer_all_update', $this->data);
	}

	/**
	* Update Mismer Alls
	*
	* @var $id String
	*/
	public function edit_save($id)
	{
		if (!$this->is_allowed('mismer_all_update', false)) {
			echo json_encode([
				'success' => false,
				'message' => cclang('sorry_you_do_not_have_permission_to_access')
				]);
			exit;
		}
		
		$this->form_validation->set_rules('ORG', 'ORG', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MID', 'MID', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_DBA_NAME', 'MERCHANT DBA NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATUS_EDC', 'STATUS EDC', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('OPENDATE', 'OPENDATE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CITY', 'CITY', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('STATE', 'STATE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DATE_LAST_MAINTAIN', 'DATE LAST MAINTAIN', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CONTACT_PERSON', 'CONTACT PERSON', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TELP1', 'TELP1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('TELP2', 'TELP2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MSO', 'MSO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MMO', 'MMO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DDA', 'DDA', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_TYPE', 'MERCHANT TYPE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('CHAIN_STORE', 'CHAIN STORE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('SOURCE_CODE', 'SOURCE CODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MERCHANT_NAME', 'MERCHANT NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ALAMAT1', 'ALAMAT1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ALAMAT2', 'ALAMAT2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('KOTA1', 'KOTA1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('KOTA2', 'KOTA2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ZIPCODE', 'ZIPCODE', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom24', 'Kolom24', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MCC1', 'MCC1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MCC2', 'MCC2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom27', 'Kolom27', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom28', 'Kolom28', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom29', 'Kolom29', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS1', 'POS1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS2', 'POS2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('POS3', 'POS3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN1', 'PLAN1', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN2', 'PLAN2', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('PLAN3', 'PLAN3', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('DATE_LAST_STATEMENT', 'DATE LAST STATEMENT', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom37', 'Kolom37', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom38', 'Kolom38', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom39', 'Kolom39', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom40', 'Kolom40', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom41', 'Kolom41', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom42', 'Kolom42', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom43', 'Kolom43', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom44', 'Kolom44', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom45', 'Kolom45', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom46', 'Kolom46', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom47', 'Kolom47', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('NPWP', 'NPWP', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('ACCOUNT_NO', 'ACCOUNT NO', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('BANK_NAME', 'BANK NAME', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom51', 'Kolom51', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom52', 'Kolom52', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom53', 'Kolom53', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom54', 'Kolom54', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom55', 'Kolom55', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom56', 'Kolom56', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom57', 'Kolom57', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom58', 'Kolom58', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('MDR_VISA_BNI', 'MDR VISA BNI', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom60', 'Kolom60', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom61', 'Kolom61', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom62', 'Kolom62', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom63', 'Kolom63', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom64', 'Kolom64', 'trim|required|max_length[255]');
		$this->form_validation->set_rules('kolom65', 'Kolom65', 'trim|required|max_length[255]');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'ORG' => $this->input->post('ORG'),
				'MID' => $this->input->post('MID'),
				'MERCHANT_DBA_NAME' => $this->input->post('MERCHANT_DBA_NAME'),
				'STATUS_EDC' => $this->input->post('STATUS_EDC'),
				'OPENDATE' => $this->input->post('OPENDATE'),
				'CITY' => $this->input->post('CITY'),
				'STATE' => $this->input->post('STATE'),
				'DATE_LAST_MAINTAIN' => $this->input->post('DATE_LAST_MAINTAIN'),
				'CONTACT_PERSON' => $this->input->post('CONTACT_PERSON'),
				'TELP1' => $this->input->post('TELP1'),
				'TELP2' => $this->input->post('TELP2'),
				'MSO' => $this->input->post('MSO'),
				'MMO' => $this->input->post('MMO'),
				'DDA' => $this->input->post('DDA'),
				'MERCHANT_TYPE' => $this->input->post('MERCHANT_TYPE'),
				'CHAIN_STORE' => $this->input->post('CHAIN_STORE'),
				'SOURCE_CODE' => $this->input->post('SOURCE_CODE'),
				'MERCHANT_NAME' => $this->input->post('MERCHANT_NAME'),
				'ALAMAT1' => $this->input->post('ALAMAT1'),
				'ALAMAT2' => $this->input->post('ALAMAT2'),
				'KOTA1' => $this->input->post('KOTA1'),
				'KOTA2' => $this->input->post('KOTA2'),
				'ZIPCODE' => $this->input->post('ZIPCODE'),
				'kolom24' => $this->input->post('kolom24'),
				'MCC1' => $this->input->post('MCC1'),
				'MCC2' => $this->input->post('MCC2'),
				'kolom27' => $this->input->post('kolom27'),
				'kolom28' => $this->input->post('kolom28'),
				'kolom29' => $this->input->post('kolom29'),
				'POS1' => $this->input->post('POS1'),
				'POS2' => $this->input->post('POS2'),
				'POS3' => $this->input->post('POS3'),
				'PLAN1' => $this->input->post('PLAN1'),
				'PLAN2' => $this->input->post('PLAN2'),
				'PLAN3' => $this->input->post('PLAN3'),
				'DATE_LAST_STATEMENT' => $this->input->post('DATE_LAST_STATEMENT'),
				'kolom37' => $this->input->post('kolom37'),
				'kolom38' => $this->input->post('kolom38'),
				'kolom39' => $this->input->post('kolom39'),
				'kolom40' => $this->input->post('kolom40'),
				'kolom41' => $this->input->post('kolom41'),
				'kolom42' => $this->input->post('kolom42'),
				'kolom43' => $this->input->post('kolom43'),
				'kolom44' => $this->input->post('kolom44'),
				'kolom45' => $this->input->post('kolom45'),
				'kolom46' => $this->input->post('kolom46'),
				'kolom47' => $this->input->post('kolom47'),
				'NPWP' => $this->input->post('NPWP'),
				'ACCOUNT_NO' => $this->input->post('ACCOUNT_NO'),
				'BANK_NAME' => $this->input->post('BANK_NAME'),
				'kolom51' => $this->input->post('kolom51'),
				'kolom52' => $this->input->post('kolom52'),
				'kolom53' => $this->input->post('kolom53'),
				'kolom54' => $this->input->post('kolom54'),
				'kolom55' => $this->input->post('kolom55'),
				'kolom56' => $this->input->post('kolom56'),
				'kolom57' => $this->input->post('kolom57'),
				'kolom58' => $this->input->post('kolom58'),
				'MDR_VISA_BNI' => $this->input->post('MDR_VISA_BNI'),
				'kolom60' => $this->input->post('kolom60'),
				'kolom61' => $this->input->post('kolom61'),
				'kolom62' => $this->input->post('kolom62'),
				'kolom63' => $this->input->post('kolom63'),
				'kolom64' => $this->input->post('kolom64'),
				'kolom65' => $this->input->post('kolom65'),
				'MDR_VISA_OTHER' => $this->input->post('MDR_VISA_OTHER'),
			];

			
			$save_mismer_all = $this->model_mismer_all->change($id, $save_data);

			if ($save_mismer_all) {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = true;
					$this->data['id'] 	   = $id;
					$this->data['message'] = cclang('success_update_data_stay', [
						anchor('administrator/mismer_all', ' Go back to list')
					]);
				} else {
					set_message(
						cclang('success_update_data_redirect', [
					]), 'success');

            		$this->data['success'] = true;
					$this->data['redirect'] = base_url('administrator/mismer_all');
				}
			} else {
				if ($this->input->post('save_type') == 'stay') {
					$this->data['success'] = false;
					$this->data['message'] = cclang('data_not_change');
				} else {
            		$this->data['success'] = false;
            		$this->data['message'] = cclang('data_not_change');
					$this->data['redirect'] = base_url('administrator/mismer_all');
				}
			}
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}
	
	/**
	* delete Mismer Alls
	*
	* @var $id String
	*/
	public function delete($id = null)
	{
		$this->is_allowed('mismer_all_delete');

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
            set_message(cclang('has_been_deleted', 'mismer_all'), 'success');
        } else {
            set_message(cclang('error_delete', 'mismer_all'), 'error');
        }

		redirect_back();
	}

		/**
	* View view Mismer Alls
	*
	* @var $id String
	*/
	public function view($id)
	{
		$this->is_allowed('mismer_all_view');

		$this->data['mismer_all'] = $this->model_mismer_all->join_avaiable()->filter_avaiable()->find($id);

		$this->template->title('Mismer All Detail');
		$this->render('backend/standart/administrator/mismer_all/mismer_all_view', $this->data);
	}
	
	/**
	* delete Mismer Alls
	*
	* @var $id String
	*/
	private function _remove($id)
	{
		$mismer_all = $this->model_mismer_all->find($id);

		
		
		return $this->model_mismer_all->remove($id);
	}
	
	
	/**
	* Export to excel
	*
	* @return Files Excel .xls
	*/
	public function export()
	{
		$this->is_allowed('mismer_all_export');

		$this->model_mismer_all->export('mismer_all', 'mismer_all');
	}

	/**
	* Export to PDF
	*
	* @return Files PDF .pdf
	*/
	public function export_pdf()
	{
		$this->is_allowed('mismer_all_export');

		$this->model_mismer_all->pdf('mismer_all', 'mismer_all');
	}
}


/* End of file mismer_all.php */
/* Location: ./application/controllers/administrator/Mismer All.php */