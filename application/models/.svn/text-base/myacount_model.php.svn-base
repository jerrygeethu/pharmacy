<?php
	class Myacount_model extends CI_Model 
	{
		 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
		function user_acount_details($id)
		{
			$query = $this->db->get_where('member',array('memberid'=>$id));
			return $query->result_array();
		}
		function update($table,$array,$id)
		{			
			$this->db->where('memberid', $id);
			$this->db->update('member', $array);
			return true;
		}
	}

?>
