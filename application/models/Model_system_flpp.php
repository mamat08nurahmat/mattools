<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_system_flpp extends MY_Model {

	private $primary_key 	= 'ID';
	private $table_name 	= 'system_flpp';
	private $field_search 	= ['NAMA_PEMOHON', 'PEKERJAAN_PEMOHON', 'JENIS_KELAMIN', 'NO_KTP_PEMOHON', 'NPWP_PEMOHON', 'GAJI_POKOK', 'NAMA_PASANGAN', 'NO_KTP_PASANGAN', 'NO_REKENING_PEMOHON', 'TGL_AKAD', 'HARGA_RUMAH', 'NILAI_KPR', 'SUKU_BUNGA_KPR', 'TENOR', 'ANGSURAN_KPR', 'NILAI_FLPP', 'NAMA_PENGEMBANG', 'NAMA_PERUMAHAN', 'ALAMAT_AGUNAN', 'KOTA_AGUNAN', 'KODE_POS_AGUNAN', 'LUAS_TANAH', 'LUAS_BANGUNAN', 'batch_id', 'create_date', 'month', 'year', 'is_generate'];

	public function __construct()
	{
		$config = array(
			'primary_key' 	=> $this->primary_key,
		 	'table_name' 	=> $this->table_name,
		 	'field_search' 	=> $this->field_search,
		 );

		parent::__construct($config);
	}

	function select()
	{
	 $this->db->order_by('id', 'DESC');
	 $query = $this->db->get($this->table_name);
	 return $query;
	}
   
	function insert($data)
	{
	 $this->db->insert_batch($this->table_name, $data);
	}


	public function count_all($q = null, $field = null)
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "system_flpp.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "system_flpp.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "system_flpp.".$field . " LIKE '%" . $q . "%' )";
        }

		$this->join_avaiable();
        $this->db->where($where);
		$query = $this->db->get($this->table_name);

		return $query->num_rows();
	}

	public function get($q = null, $field = null, $limit = 0, $offset = 0, $select_field = [])
	{
		$iterasi = 1;
        $num = count($this->field_search);
        $where = NULL;
        $q = $this->scurity($q);
		$field = $this->scurity($field);

        if (empty($field)) {
	        foreach ($this->field_search as $field) {
	            if ($iterasi == 1) {
	                $where .= "system_flpp.".$field . " LIKE '%" . $q . "%' ";
	            } else {
	                $where .= "OR " . "system_flpp.".$field . " LIKE '%" . $q . "%' ";
	            }
	            $iterasi++;
	        }

	        $where = '('.$where.')';
        } else {
        	$where .= "(" . "system_flpp.".$field . " LIKE '%" . $q . "%' )";
        }

        if (is_array($select_field) AND count($select_field)) {
        	$this->db->select($select_field);
        }
		
		$this->join_avaiable();
        $this->db->where($where);
        $this->db->limit($limit, $offset);
        $this->db->order_by('system_flpp.'.$this->primary_key, "DESC");
		$query = $this->db->get($this->table_name);

		return $query->result();
	}

	public function join_avaiable() {
		
    	return $this;
	}

}

/* End of file Model_system_flpp.php */
/* Location: ./application/models/Model_system_flpp.php */