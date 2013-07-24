<?php
class Category_model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	/* ---------- Common functions ----------------- */
	
	function insertquery($insert,$table)
	{		
		return $this->db->insert($table, $insert); 		
	}
	
	function viewquery($table,$id,$field)
	{		
		return $query = $this->db->get_where($table, array($field => $id));			
	}
	
	function updatequery($table,$id,$field,$insert)
	{		
		return $this->db->update($table, $insert, array($field => $id));	
	}
	function deletequery($table,$id,$field)
	{		
		return $this->db->delete($table, array($field => $id)); 
	}	
	function lastid($table,$field)
	{		
		 $this->db->select_max($field);
         $query=$this->db->get($table);
		
		
		return $query->result();		
	}
	
	/* ---------- category functions ----------------- */
	function viewcat($id="0",$start,$limit)
	{
		$query="select * from category";
		if($id!="0")
		{
		$query.=" where id=".$id."";
    	}
		
		$query.=" ORDER BY category ASC";
		
		if($limit!=0)
		{
			$query.=" LIMIT ".$start.",".$limit." ";
		}
		
		
		$result=$this->db->query($query);
	    return($result);
		
		
	}	
	function viewdrugcat($id="0",$start,$limit)
	{
		$query="select * from drugcategory";
		if($id!="0")
		{
		$query.=" where id=".$id."";
    	}
		
		$query.=" ORDER BY drugcategory ASC";
		
		if($limit!=0)
		{
			$query.=" LIMIT ".$start.",".$limit." ";
		}
		
		
		$result=$this->db->query($query);
	    return($result);
		
		
	}	
	
	
	
	/* ---------- Drugs functions ----------------- */
	
	
	function viewdrugs($id="0",$start,$limit)
	{
		/* $query="select d.id as did,c.id as cid,d.medication as medication,d.date as date,c.drugcategory as category,d.featured as featured ,d.image as image
		from drug d,drugcategory c  
		where c.id=d.category";
		if($id!="0")
		{
		$query.=" and d.id=".$id."";
    	}
		*/
		$query="select * from drug";
		if($id!="0")
		{
		$query.=" where id=".$id."";
    	}
		
		$query.=" ORDER BY medication ASC";
		
		if($limit!=0)
		{
			$query.=" LIMIT ".$start.",".$limit." ";
		}
		$result=$this->db->query($query);
	    return($result);
	}
	/****************************************Drug Details***********************************/
	function drug_name()
	{
		$query = "select drugsid ,medication from drug";
		$query_result = $this->db->query($query);
		return $query_result->result_array();
		
	}


	function retrive_drugname($did)
	{
		$query = "select medication from drug where drugsid='$did'";
		$query_result = $this->db->query($query);
		return $query_result->result_array();
	}
	function drug_insert($insert)
	{
		$this->db->insert('drugsdet',$insert);
	}
	function list_drug($start,$perpage)
	{
		$query = "select * from drugsdet limit $start,$perpage";
		$query_result=$this->db->query($query);
		return $query_result->result_array();
	}
	
	function edit_drug_details1($id)
	{
		$query = "select * from drugsdet where id=".$id;
		$query_result = $this->db->query($query);
		return $query_result->result_array();
	}
	function update_row($id,$edited_value)
	{
		$this->db->where('id', $id);
		$this->db->update('drugsdet', $edited_value); 
	}
	function delete_drug($id)
	{
		$query = "delete  from drugsdet where id=".$id;
		$query_result = $this->db->query($query);
		
	}
	
}
?>
