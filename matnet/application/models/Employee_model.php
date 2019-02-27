<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee_model extends CI_Model
{

    public $table = 'employee';
    public $id = 'EmployeeID';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }
	
	
    // get all
    function get_all()
    {
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();

$query=$this->db->query("
SELECT  a.*,b.AgencyName,c.SalesCenterName  FROM Employee a
LEFT JOIN Agency b ON a.AgencyID=b.AgencyID
LEFT JOIN AgencySalesCenter c ON a.SalesCenterID=c.SalesCenterID
-- LEFT JOIN hiring_history d ON a.EmployeeID=d.EmployeeID

WHERE IsDiscontinued=0 ");        
return $query->result();

    }

// HiringLevel
// 1----->RSM    
// 2----->SGV WILAYAH    
// 3----->SGV PUSAT
// 999----->Approve 

// HiringStatus
// 1---->Approve
// 2---->Waiting Approve
// 3---->Hold
// 4---->Cancel
// 5---->Reject



    // get all ApprovalLevel='1'
//RSM    
    function get_all_approval1()
    {
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();

$query=$this->db->query("
SELECT  a.*,b.AgencyName,c.SalesCenterName  FROM Employee a
LEFT JOIN Agency b ON a.AgencyID=b.AgencyID
LEFT JOIN AgencySalesCenter c ON a.SalesCenterID=c.SalesCenterID

WHERE IsDiscontinued=0 

AND HiringApprovalID='0' 
AND HiringLevel='1'
AND ApprovalID='0'
AND ApprovalLevel='2'
AND ApprovalStatus='0'

");        
return $query->result();

    }


    // get all ApprovalLevel='1'
//SGV WILAYAH    
    function get_all_approval2()
    {
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();

$query=$this->db->query("
SELECT  a.*,b.AgencyName,c.SalesCenterName  FROM Employee a
LEFT JOIN Agency b ON a.AgencyID=b.AgencyID
LEFT JOIN AgencySalesCenter c ON a.SalesCenterID=c.SalesCenterID

WHERE IsDiscontinued=0 

-- AND HiringApprovalID='0' 
AND HiringLevel='2'
-- AND ApprovalID='0'
-- AND ApprovalLevel='2'
AND ApprovalStatus='0'

");        
return $query->result();

    }


   // get all ApprovalLevel='3'
    //SGV PUSAT
    function get_all_approval3()
    {
        // $this->db->order_by($this->id, $this->order);
        // return $this->db->get($this->table)->result();

$query=$this->db->query("
SELECT  a.*,b.AgencyName,c.SalesCenterName  FROM Employee a
LEFT JOIN Agency b ON a.AgencyID=b.AgencyID
LEFT JOIN AgencySalesCenter c ON a.SalesCenterID=c.SalesCenterID

WHERE IsDiscontinued=0 

-- AND HiringApprovalID='0' 
AND HiringLevel='3'
-- AND ApprovalID='0'
-- AND ApprovalLevel='2'
AND ApprovalStatus='0'

");        
return $query->result();

    }

    // get data by id in employee
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by id in employee
    function get_by_id_hiring_history($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get("hiring_history")->result();
    }

    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeName', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeBirthPlace', $q);
	$this->db->or_like('EmployeeBirthDate', $q);
	$this->db->or_like('MothersMaidenName', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityNumber', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('Religion', $q);
	$this->db->or_like('NPWP', $q);
	$this->db->or_like('FixedPhoneNumber', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('PhoneNumber2', $q);
	$this->db->or_like('EmergencyName', $q);
	$this->db->or_like('EmergencyStatus', $q);
	$this->db->or_like('EmergencyNumber', $q);
	$this->db->or_like('EmergencyAddress', $q);
	$this->db->or_like('Province', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('MaritalStatus', $q);
	$this->db->or_like('Height', $q);
	$this->db->or_like('Weight', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('PhotoFileName', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('EndReason', $q);
	$this->db->or_like('CreatedDate', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('EmployeeID', $q);
	$this->db->or_like('ParentEmployeeID', $q);
	$this->db->or_like('EmployeeName', $q);
	$this->db->or_like('EmployeeOldCode', $q);
	$this->db->or_like('EmployeeNewCode', $q);
	$this->db->or_like('UserGroupID', $q);
	$this->db->or_like('EmployeeStatus', $q);
	$this->db->or_like('EmployeeGrade', $q);
	$this->db->or_like('EmployeeBirthPlace', $q);
	$this->db->or_like('EmployeeBirthDate', $q);
	$this->db->or_like('MothersMaidenName', $q);
	$this->db->or_like('IdentityType', $q);
	$this->db->or_like('IdentityNumber', $q);
	$this->db->or_like('IdentityFilePath', $q);
	$this->db->or_like('IdentityFileName', $q);
	$this->db->or_like('Sex', $q);
	$this->db->or_like('Religion', $q);
	$this->db->or_like('NPWP', $q);
	$this->db->or_like('FixedPhoneNumber', $q);
	$this->db->or_like('PhoneNumber', $q);
	$this->db->or_like('PhoneNumber2', $q);
	$this->db->or_like('EmergencyName', $q);
	$this->db->or_like('EmergencyStatus', $q);
	$this->db->or_like('EmergencyNumber', $q);
	$this->db->or_like('EmergencyAddress', $q);
	$this->db->or_like('Province', $q);
	$this->db->or_like('StreetAddress', $q);
	$this->db->or_like('PostalCode', $q);
	$this->db->or_like('EmailAddress', $q);
	$this->db->or_like('MaritalStatus', $q);
	$this->db->or_like('Height', $q);
	$this->db->or_like('Weight', $q);
	$this->db->or_like('PhotoFilePath', $q);
	$this->db->or_like('PhotoFileName', $q);
	$this->db->or_like('AgencyID', $q);
	$this->db->or_like('SalesCenterID', $q);
	$this->db->or_like('InterviewApprovalID', $q);
	$this->db->or_like('InterviewLevel', $q);
	$this->db->or_like('InterviewStatus', $q);
	$this->db->or_like('HiringApprovalID', $q);
	$this->db->or_like('HiringLevel', $q);
	$this->db->or_like('HiringStatus', $q);
	$this->db->or_like('ApprovalID', $q);
	$this->db->or_like('ApprovalLevel', $q);
	$this->db->or_like('ApprovalStatus', $q);
	$this->db->or_like('IsDiscontinued', $q);
	$this->db->or_like('IsDedicated', $q);
	$this->db->or_like('DedicatedRemark', $q);
	$this->db->or_like('ActiveDate', $q);
	$this->db->or_like('EndDate', $q);
	$this->db->or_like('EndReason', $q);
	$this->db->or_like('CreatedDate', $q);
	$this->db->or_like('CreatedBy', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }
/*
    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
    return    $this->db->update($this->table, $data); //??
    }
*/



    // update data
    function insert_hiring_history($data)
    {
	return   $this->db->insert("hiring_history", $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
	
//=====dropdown filter	
	public function get_list_agency()
	{
		$this->db->select('*');
		$this->db->from('Agency');
		$this->db->order_by('AgencyID','asc');
		$query = $this->db->get();
		$result = $query->result();

		$agency = array();
		foreach ($result as $row) 
		{
			$agency[] = $row->AgencyName;
		}
		return $agency;
	}	

	public function get_list_sales_center()
	{
		$this->db->select('*');
		$this->db->from('AgencySalesCenter');
		$this->db->order_by('SalesCenterID','asc');
		$query = $this->db->get();
		$result = $query->result();

		$sales_center = array();
		foreach ($result as $row) 
		{
			$sales_center[] = $row->SalesCenterName;
		}
		return $sales_center;
	}	
//========================================

	public function get_list_pnsc(){
		
		
$q =	$this->db->query("
		SELECT   
		EmployeeID,
		EmployeeName,
		EmployeeNewCode,
		EmailAddress 
		FROM vw_pending_new_sales_code ");
		
		return $q->result();
		
	}
	

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}	
	
}

/* End of file Employee_model.php */
/* Location: ./application/models/Employee_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-03 05:43:19 */
/* http://harviacode.com */