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
	* Submit Form Application Sources
	*
	*/
	public function submit()
	{
		$this->form_validation->set_rules('source_name', 'Source Name', 'trim|required');
		
		if ($this->form_validation->run()) {
		
			$save_data = [
				'source_name' => $this->input->post('source_name'),
			];

			
			$save_form_application_source = $this->model_form_application_source->store($save_data);

			$this->data['success'] = true;
			$this->data['id'] 	   = $save_form_application_source;
			$this->data['message'] = cclang('your_data_has_been_successfully_submitted');
		} else {
			$this->data['success'] = false;
			$this->data['message'] = validation_errors();
		}

		echo json_encode($this->data);
	}

	
}


/* End of file form_application_source.php */
/* Location: ./application/controllers/administrator/Form Application Source.php */