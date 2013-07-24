<?php
class Admin_model extends CI_Model {

    
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	
	/* ------------ Login Functions --------------- */
	
	function login($loginid,$password)
	{
		$query="select * from login where loginid='".$loginid."' and password='".$password."' ";
		$result=$this->db->query($query);
		return($result);
	}
	
	function logininfo()
	{
		$query="select * from login";
		$result=$this->db->query($query);
		return($result);
	}
	function loginedit($loginid,$password)
	{
		$query="update login set password='".$password."' where loginid='".$loginid."'";
		$result=$this->db->query($query);
		return($result);
	}
	
	
	
	
		/* ------------ Drugg Functions --------------- */
	
	function drugadd($insert)
	{
		$date=date("Y-m-d",strtotime("now"));
		
		$query="insert into drug values('','".$insert['medication']."','".$date."','".$insert['category']."','".$insert['featured']."','".$insert['image']."')";
		$result=$this->db->query($query);
	    return($result);
	}
	
	function drugview($limit,$per="",$where="")
	{
		$query="select * from drug";
		if($where!="")
		{
			$query.=" where id=".$where."";
		}
		if($per!="")
		{
		
		 $query.=" LIMIT ".$limit.",".$per."";
	    }
		$result=$this->db->query($query);
		return($result);
		
	}
	function drugdet($id,$act="")
	{
		$query="select * from drugsdet ";	
		
		if($act=="")
		{
			$query.="where drugsid=".$id."";
		}
		else
		{
			$query.="where id=".$id."";
		}	
		$result=$this->db->query($query);
		return($result);
		
	}
	function drugdetedit($insert,$id)
	{
		$query="update drugsdet set  dosage='".$insert['dosage']."',price='".$insert['price'] ."',drugname='".$insert['drugname']."',sideffects='".$insert['sideffects']."',ingredients='".$insert['ingredients']."',precaution='".$insert['precaution']."',howtouse='".$insert['howtouse']."',image='".$insert['image']."' where id=".$id."";	
		$result=$this->db->query($query);
		return($result);
		
	}
	
	function drugedit($insert,$id)
	{
		
		$date=date("Y-m-d",strtotime("now"));
		$query="update drug set  medication='".$insert['medication']."',date='".$date ."',category='".$insert['category']."',featured 	='".$insert['featured']."',image='".$insert['image']."' where id=".$id."";	
		$result=$this->db->query($query);
		return($result);
		
	}
	
	function adddrugdet($insert)
	{
		
		
		$query="insert into drugsdet values('','".$insert['id']."','".$insert['dosage']."','".$insert['image']."','".$insert['price']."','".$insert['drugname']."','".$insert['sideffects']."','".$insert['ingredients']."','".$insert['precaution']."','".$insert['howtouse']."')";
		$result=$this->db->query($query);
	    return($result);
	}
	
	function category()
	{
		$query="select * from category";
		$result=$this->db->query($query);
		return($result);		
	}
	
	function delete($id,$table)
	{
		$query="delete from ".$table." where id=".$id."";
		
		$result=$this->db->query($query);
		return($result);
		
		
		
	}
	function view()
	{
		$query="select * from drugsdet";
		$result=$this->db->query($query);
		return($result);	
		
	}
	
	/* ------------ Prescription Functions --------------- */
	function prescription()
	{
		$query="select m.firstname as firstname,m.lastname as lastname,pt.firstname as patientname,pt.lastname as patientlast,pr.status as type,pr.memberid as memberid,pr.patientid as patientid from prescription pr,member m,patient pt where pr.memberid=m.memberid and pt.id=pr.patientid  GROUP BY pr.memberid,pr.patientid";
		$result=$this->db->query($query);
		return($result);		
	}
	function predet($memberid,$patientid)
	{
		
		$query="select d.medication as medicine,p.rxnumber as rxnumber,p.id as id from prescription p,drug d where p.memberid=".$memberid." and p.patientid=".$patientid." and p.medicationid=d.id";
		$result=$this->db->query($query);
		return($result);	
		
	}
	function presupdate($pid)
	{
		
		$query="update prescription set status='active' where id=".$pid."";
		$result=$this->db->query($query);
		return($result);	
		
	}
	
	/* ------------ Feedback Functions --------------- */
	
	function feedback($id="")
	{
		
		$query="select * from review";
		if($id!="")
		{
			$query.=" where reviewerid=".$id."";
		}
		$result=$this->db->query($query);
		
		return($result);		
	}
	function valid($id)
	{
			
		$query="UPDATE review SET  valid='yes' where reviewerid=".$id."";
		echo $query;
		$result=$this->db->query($query);
		return($result);		
	}
	
	function insert_fun($table, $data)
    {
    	$this->db->insert($table, $data);
    	$this->db->last_query(); 
		return $this->db->insert_id();
	}
	
	function viewpharmacy($start,$limit)
	{
		$query="select * from pharmacy ORDER BY pharmacy ASC";
		
		if($limit!=0)
		{
			$query.=" LIMIT ".$start.",".$limit." ";
		}
		
		$result=$this->db->query($query);
	    return($result);
	}
	
	function selectrow($table,$where,$id)
	{
		$query="
				select 
					*
				from 
					".$table."	
				where 
					".$id."=".$where;
		$result= $this->db->query($query);
		return $result->row();
	}
	
	function file_tab1($id)
	{
		$query="select ACTIVE_INGRED_ID as id from ".$id;
		return $result=$this->db->query($query);
		//return $result->result();  
	}
	
	function file_tab2($id)
	{
		$query="select CLINICAL_ROUTE_ID as id from ".$id;
		return $result=$this->db->query($query);
		//return $result->result();  
	}
	
	function file_tab3($id)
	{
		$query="select DRUG_ID as id from ".$id;
		return $result=$this->db->query($query);
		//return $result->result();  
	}
	
	function file_tab4($id)
	{
		$query="select GENPRODUCT_ID as id from ".$id;
		return $result=$this->db->query($query);
		//return $result->result();  
	}
}
//end of class 
?>
