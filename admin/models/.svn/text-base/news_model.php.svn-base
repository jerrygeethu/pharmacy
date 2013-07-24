<?php
class Category_model extends CI_Model{
	
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function addcat($insert)
	{
		
		$query="insert into category values ('','".$insert['category']."','".$insert['description']."','".$insert['date']."')";
		$result=$this->db->query($query);
	    return($result);
	}

	
}


?>
