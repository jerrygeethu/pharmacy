<?php
function menu()
{
	$CI =& get_instance();
	$query = $CI->db->query("select  distinct category  from category ORDER BY  category ASC LIMIT 0,8");
    $row = $query->result();
    return($row);
	
}

?>
