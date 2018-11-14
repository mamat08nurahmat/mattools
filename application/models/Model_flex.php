<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_flex extends MY_Model {

	private $primary_key 	= 'ID';
	private $table_name 	= 'flex';
	private $field_search 	= ['file', 'upload_at', 'download_at', 'uploader', 'send_to', 'is_download'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	public function count_all($id_users,$q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "flex.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "flex.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "flex.".$field . " LIKE '%" . $q . "%' )";
        }

		// $where['send_to']=2;
		$where = array(
			'send_to'		=>$id_users,
			'is_download' 	=>0
	);	

		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($id_users,$q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "flex.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "flex.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "flex.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		

		// $where['send_to']=2;
		$where = array(
			'send_to'		=>$id_users,
			'is_download' 	=>0
	);	

		$this->join_avaiable()->filter_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('flex.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

    public function join_avaiable() {
        $this->db->join('aauth_users', 'aauth_users.id = flex.send_to', 'LEFT');
        
        return $this;
    }

    public function filter_avaiable() {
        
        return $this;
    }

}

/* End of file Model_flex.php */
/* Location: ./application/models/Model_flex.php */