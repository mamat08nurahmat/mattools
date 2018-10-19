<?php
defined('BASEPATH') OR exit('No direct script access allowed');


/**
*| --------------------------------------------------------------------------
*| Blog Controller
*| --------------------------------------------------------------------------
*| Blog site
*|
*/
class Migrations extends Admin	
{
	
	public function __construct()
	{
		parent::__construct();

        $this->load->library('migration');

		//$this->load->model('model_blog');
	}

	/**
	* show all Blogs
	*
	* @var $offset String
	*/

// =============

public function migrate($version = null)
{
	// print_r('migrateeeeeeeeeeeee');die();
	// $this->load->library('migration');
		
	if ($version) {
		if ($this->migration->version($version) === FALSE) {
		   show_error($this->migration->error_string());
		}   
	} 
	else {
		if ($this->migration->latest() === FALSE) {
		   show_error($this->migration->error_string());
		}   
	}

    print_r('migrate ok');

}


public function down()
{
    $this->dbforge->drop_table('tabel_tes');
}



}


/* End of file blog.php */
/* Location: ./application/controllers/administrator/Blog.php */