<?php
class Prescription extends CI_Controller {
   
   var $base;
   var $css;
   
	  function __construct()
       {
            parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->css = "style.css";
		$this->load->helper('parameter');
		$this->load->database();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('home_model');
		$this->load->helper('url');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->library('email');
		//$this->load->helper('menu');
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	   
	   $data['category']=$this->home_model->category("7");
	   $this->refillprescription();
		
	}
	function refillprescription()
	{
		if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");}   
		$data['base'] = $this->base;
	    $data['css'] = $this->css;
	    $data['menu']="refill";
	    $this->session->set_userdata('url', current_url());
	    $data['message']="";
	    $data['extra']="<script type=\"text/javascript\" src=\"".$this->base."js/jquery-1.4.2.min.js\"></script>";
	  	$data['cart_count']=$this->home_model->count_cart_items();
	  	$data['submenu']=$this->home_model->submenu();
		$this->form_validation->set_rules('medication', 'medication', 'callback_check');
		//$this->form_validation->set_rules('rxnumber[#index#]', 'Rx number[#index#]', 'required');
		//$this->form_validation->set_rules('delivary', 'Delivary Type', 'required');
		$rxnumber=$this->input->post('rxno');
		$ret=$this->home_model->viewquery('member',$this->session->userdata('memberid'),'memberid');
		$return_value=$this->db->get('prescription');
		if($this->form_validation->run()==TRUE)
		{
			$member_data=$ret->row();		
			$rxno['memberid']=intval($this->session->userdata('memberid'));
			$rxno['pharmacyid']=$this->input->post('sno');
			$rxno['prescriberfirstname']=$member_data->firstname;
			$rxno['prescriberlastname']=$member_data->lastname;
			$rxno['prescriberphno']=$member_data->mobile;
			$rxno['type']='refill';
			$rxno['date']=date('y/m/d');
			$rxno['prescriptiondate']=date('y/m/d');
			$rxno['transferdate']=date('y/m/d');
			$rxno['delivary']=$delivary_type=$this->input->post('delivary');
			$tablename="prescription";
			$to='renjith.kumar@primemoveindia.com';
			$from="www.mainstreetpharmacys.com";
			$name=$member_data->firstname." ".$member_data->lastname;
			$message="There is a request from <i>".$name."</i> for Refill the drugs in the given Prescription Number  <u><i>";
			$subject="Refill prescription";
			for($i=0;$i<count($rxnumber);$i++)
			{
				$rxno['prescriptionno']=$rxnumber[$i]['phone'];
				$message.=$rxno['prescriptionno'].",";
				if(!empty($rxno['prescriptionno']))
				{
					$this->home_model->insertquery($rxno,$tablename);
				}
			}
			$message.="</i></u>";
			$this->email($to,$subject,$message,$from,$name);
			
			if($delivary_type=='home')
	       	{
				redirect($this->base.'index.php/prescription/homedelivery/'.intval($this->session->userdata('memberid')),'refresh');
			}
			else if($delivary_type=='store')
			{
				redirect($this->base.'index.php/prescription/pharmacy_store/','refresh');
			}
			else
			{
				$data['message']="Please Select a delivary Type";
			}
		}
		$this->load->view('header',$data);
		$this->load->view('refillprescription',$data);
		$this->load->view('footer',$data);
		
	}

	/*function refillprescription()
	{
		    if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");	}   

	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="refill";
	   $this->session->set_userdata('url', current_url());
	   
		$data['extra']="<script type=\"text/javascript\" src=\"".$this->base."js/jquery-1.4.2.min.js\"></script>";
		
	  	$data['message']="";
	  	$data['cart_count']=$this->home_model->count_cart_items();
		 $data['submenu']=$this->home_model->submenu();
		 $this->form_validation->set_rules('medication', 'medication', 'callback_check');
		 $this->form_validation->set_rules('rxnumber[#index#]', 'Rx number[#index#]', 'callback_check');
		 $this->form_validation->set_rules('delivary', 'Delivary Type', 'callback_check');
		 echo count();
	  if ($this->input->post('button'))
	  {
		   if($this->form_validation->run() == TRUE)
			{
			$tablename="prescription";
	 	    $update['memberid']=$id=$this->session->userdata('memberid');
	 	    
	 	    $update['delivary']=$delivary_type=$this->input->post('delivary');
	 	    
	 	    $pharmacy_id=$this->input->post('sno');
	 	    $pharmacy=$this->home_model->getpharmacy($pharmacy_id);
	 	    foreach($pharmacy->result()  as $pharmacy1)
	 	    {
				$update['currentpharmacy']=$pharmacy1->pharmacy;
				$update['pharmacyid'] =$pharmacy1->id;
			}
	 	    $update['type']="refill";
	 	    $update['prescriptiondate']=date("d/m/y");
			for($i=0;$i<$count+1;$i++)
			{
				$v="rxnumber".$i;
				$v1="Rx number".$i;
				if($this->input->post($v)!=$v1)
				{	
   	   		     $update['prescriptionno']=$rxno=$this->input->post($v);
   	   		     $date=date("Y-m-d");
				 $data['value']=$this->home_model->refill($tablename,$update,$id,$rxno);
			    }
	       	}
			if($delivary_type=='home')
	       	{
				redirect($this->base.'index.php/prescription/homedelivery/'.$id,'refresh');
			}
			else if($delivary_type=='store')
			{
				redirect($this->base.'index.php/prescription/pharmacy_store/','refresh');
			}
			else
			{
				$data['message']="Please Select a delivary Type";
			}
   	   		if(!empty($data['value']))
			{
				$data['message']="Prescription refill successfully";
			}
		}
	   }
	   
		$this->load->view('header',$data);
		$this->load->view('refillprescription',$data);
		$this->load->view('footer',$data);
	}*/
	
	
	function homedelivery($id)
	{
		$data['base']=$this->base;
		$data['css']=$this->css;
		$data['menu']="refill";
		$table="homedelivery";
		$field="memid";
		$data['id']=$id;
		$data['message']="";
		$data['cart_count']=$this->home_model->count_cart_items();
		$data['submenu']=$this->home_model->submenu();
		$this->form_validation->set_rules('name','Name Of the Customer','required');
		$this->form_validation->set_rules('phonenumber','PhoneNumber Of the Customer','required|min_length[5]|max_length[16]|numeric');
		$this->form_validation->set_rules('email','Email id Of the Customer','required');
		$this->form_validation->set_rules('address','Address for communication Of the Customer','required');
		$query= $this->home_model->viewquery($table,$id,$field);

		foreach($query->result_array() as $query_result)
		{
			$data['userexdata']=$query_result;
			//print_r($data['userexdata']);
		}
		if($this->form_validation->run()==TRUE)
		{			
			$updateddata['name']=$this->input->post('name');
			$updateddata['phone ']=$this->input->post('phonenumber');
			$updateddata['email']=$this->input->post('email');
			$updateddata['address']=$this->input->post('address');
			$data['cart_count']=$this->home_model->count_cart_items();
			if(!empty($query_result['id']))
			{
				$query1=$this->home_model->updatequery($table,$query_result['id'],'id',$updateddata);
				if($query1==1)
				{
					$data['message']="Request is Updated";
				}
				else
				{
					$data['message']="You are not";
				}
			}
			else
			{
				$updateddata['memid']=$this->session->userdata('memberid');
				$query1=$this->home_model->insertquery($updateddata,$table);
				if($query1==1)
				{
					$data['message']="Request is Inserted";
				}
				else
				{
					$data['message']="You are not";
				}
			}
		}
		$this->load->view('header',$data);
		$this->load->view('homedelivery',$data);
		$this->load->view('footer',$data);
	}
	function pharmacy_store($memid=0,$id=0)
	{
		$data['base']=$this->base;
		$data['css']=$this->css;
		$data['menu']="refill";
		
			$data['id']=$id;
			$data['memid']=$this->session->userdata('memberid');
			
			$data['pharmacy']=$this->home_model->pharmacy();
			$data['submenu']=$this->home_model->submenu();
			$data['pharmacydetails']=$this->home_model->getpharmacy($id);
			$data['cart_count']=$this->home_model->count_cart_items();
			
			if($this->input->post('submit')=="Submit")
			{
				$insert['memid']=$data['memid'];
				$insert['pharmacyid']=$id;
				$data['store']=$this->home_model->insertquery($insert,'pic_store'); 
				redirect($this->base.'index.php/prescription/pharmacy_store/'.$data['memid'],'refresh');
			}
			
		$this->load->view('header',$data);
		$this->load->view('store_delivary',$data);
		$this->load->view('footer',$data);
	}
	function transferprescription()
	{ $this->session->set_userdata('url', current_url());
		if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");	}      

	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['message']="";
	   $data['menu']="refill";
	   
	  
	  
		    $this->form_validation->set_rules('pharmacy', 'Current Pharmacy', 'callback_check');
			$this->form_validation->set_rules('city', 'City', 'callback_check');
			$this->form_validation->set_rules('state', 'State / Territory', 'callback_check');
			$this->form_validation->set_rules('pharmacyphone', 'Phone Number', 'callback_check');
			$this->form_validation->set_rules('drug', 'Drug Name', 'callback_check');
			$this->form_validation->set_rules('firstname', 'Firstname', 'callback_check');
			$this->form_validation->set_rules('lastname', 'Lastname', 'callback_check');			
			$this->form_validation->set_rules('phone', 'Phone', 'callback_check');
			$data['cart_count']=$this->home_model->count_cart_items();
			$data['submenu']=$this->home_model->submenu();
			
			
		         // $data['med']=$this->home_model->view("drug");
			//$data['pharm']=$this->home_model->view("pharmacy");
			
			
		  	$data['firstname']=$insert['prescriberfirstname']=$this->input->post('firstname');			 
		  	$data['lastname']=$insert['prescriberlastname']=$this->input->post('lastname');			  
		  	$data['phone']=$insert['prescriberphno']=$this->input->post('phone');			  
		  	$data['currentpharmacy']=$insert['currentpharmacy']=$this->input->post('pharmacy');
		  	$data['pharmacycity']=$insert['pharmacycity']=$this->input->post('city');
		  	$data['pharmacystate']=$insert['pharmacystate']=$this->input->post('state');
		  	$data['pharmacyphone']=$insert['pharmacyphone']=$this->input->post('pharmacyphone');		
		  	$data['quantity']=$insert['quantity']=$this->input->post('quantity');
		  	$insert['type']="transfer";
		  	$insert['transferdate']=date("y/m/d");
			$drug=$this->input->post('drug');
			
			$dr=$this->home_model->drugid($drug);
			
			if(!empty($dr))
			{
			foreach($dr->result() as $d)
			{ }
			if(!empty($d))
			{
			$data['drugid']=$insert['drugid']=$d->drugsid;
		    }
		    }
		    $rxno=$this->input->post('rxno');
			 if(!empty($rxno))
			 {
			 $data['prescriptionno']=$insert['prescriptionno']=$this->input->post('rxno'); }
			 else
			 {
		    	$lastid=$this->home_model->lastid('prescription','id');
			    $rno='00'.$lastid[0]->id;
			   $data['prescriptionno']=$insert['prescriptionno']="Rx".$rno;
			}
			  	  
			  $insert['memberid']=$this->session->userdata('memberid');
			  
			
		if ($this->form_validation->run() == TRUE)
			{
			
	       	$data['value']=$this->home_model->insertquery($insert,'prescription');		
			if(!empty($data['value']))
			{
				$data['message']="Transfer prescription submitted successfully";
			}	
	         }
	  
		$this->load->view('header',$data);
		$this->load->view('transferprescription',$data);
		$this->load->view('footer',$data);
		
	}
	function getkey()
	{
	   
	   
	      $id=$this->input->post('queryString');
	        
			if($id!="Pharmacy Name")
			{
	    	$getp=$this->home_model->getpharmacy($id);
			foreach($getp->result() as $get)
			{
				
			}
			
			 $data['city']=$get->city;
			 $data['state']=$get->state;
			 $data['pharmacyphone']=$get->phone;
			
		    }
		
		
		
	}
	

	
	
	function presrequest()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="refill";
	   
	   $data['cart_count']=$this->home_model->count_cart_items();
	   $data['submenu']=$this->home_model->submenu();
		$this->load->view('header',$data);
		$this->load->view('presrequest',$data);
		$this->load->view('footer',$data);
		
	}
	function newprescription()
	{
		
	if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");	}      

	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['message']="";
	   $data['menu']="refill";
	  
	  		
			$this->form_validation->set_rules('firstname', 'Firstname', 'callback_check');
			$this->form_validation->set_rules('lastname', 'Lastname', 'callback_check');
			$this->form_validation->set_rules('phone', 'Phone', 'callback_check');
			$this->form_validation->set_rules('drug', 'Drug', 'callback_check');
			$this->form_validation->set_rules('quantity', 'Quantity', 'callback_check');
			
			
		    	$data['med']=$this->home_model->view("drug");
			$data['pharm']=$this->home_model->view("pharmacy");
			$data['cart_count']=$this->home_model->count_cart_items();
			$data['submenu']=$this->home_model->submenu();
			$drug=$this->input->post('drug');
			
			$dr=$this->home_model->drugid($drug);
			
			if(!empty($dr))
			{
			foreach($dr->result() as $d)
			{ }
			if(!empty($d))
			{
			$data['drugid']=$insert['drugid']=$d->drugsid;
		    }
		    }
			 $prescriber=$this->home_model->viewquery('member',$this->session->userdata('memberid'),'memberid');
			 $prescriberdata= $prescriber->row();
			 $lastid=$this->home_model->lastid('prescription','id');
			 $data['memberid']=$insert['memberid']=$this->session->userdata('memberid');	
			 $data['firstname']=$insert['doctorfirstname']=$this->input->post('firstname');		
			 $data['lastname']=$insert['doctorlastname']=$this->input->post('lastname');
			 $data['phone']=$insert['doctorphone']=$this->input->post('phone');
  			 						 
			 $insert['prescriberfirstname']=$prescriberdata->firstname;
			 $data['lastname']=$insert['prescriberlastname']=$prescriberdata->lastname;			 
			 $data['phone']= $insert['prescriberphno']=$prescriberdata->mobile;			 
			 $data['quantity']=$insert['quantity']=$this->input->post('quantity');
			 $rno='00'.$lastid[0]->id;
			 $data['prescriptionno']=$insert['prescriptionno']="Rx".$rno;
			 $insert['date']=date("y/m/d");
			
			if ($this->form_validation->run() == TRUE)
			{
			
	       	$data['value']=$this->home_model->insertquery($insert,'prescription');		
			if(!empty($data['value']))
			{
				$data['message']="New prescription submitted successfully";
			}	
	         }
	    	$this->load->view('header',$data);
		$this->load->view('newprescription',$data);
		$this->load->view('footer',$data);
	}
	function check($str)
	{
		$values=array("Prescriber First Name","Prescriber Last Name","Prescriber Phone Number","Drug Name","Quantity","Select your medication","Prescriber’s Name","Rx number","Pharmacy Name","E-mail id","Select your Pharmacy");
	
		if(in_array($str,$values))
		{
			$this->form_validation->set_message('check', 'The %s field is required');
			return FALSE;
			
		}
		else
		{
			return TRUE;
			
		}
	
		
	}
	//Member signin functions follows   
	
	function firstname_check($str)
	{
		if ($str == 'First name')
		{
			$this->form_validation->set_message('firstname_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function lastname_check($str)
	{
		if ($str == 'Last name')
		{
			$this->form_validation->set_message('lastname_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function loc_check($str)
	{
		if ($str == 'Location')
		{
			$this->form_validation->set_message('loc_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function emailid_check($str)
	{
		if ($str == 'E-mail id')
		{
			$this->form_validation->set_message('emailid_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function pwd_check($str)
	{
		if ($str == 'Password')
		{
			$this->form_validation->set_message('pwd_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	function passconf_check($str)
	{
		if ($str == 'Confirm Password')
		{
			$this->form_validation->set_message('passconf_check', 'The %s field must fill');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function instant_refills()
	{
		if($this->session->userdata('memberid')==TRUE)
		{
			$this->form_validation->set_rules('st_no','Store Number','required');
			$this->form_validation->set_rules('rxnumber','Rxnumber of Drug','required');
			$data['cart_count']=$this->home_model->count_cart_items();
			$data['base'] = $this->base;
			$data['css'] = $this->css;
			$data['menu'] = "index";
			$member=$this->home_model->viewquery('member',$this->session->userdata('memberid'),'memberid');
			$memberdata=$member->row();
			$to='renjith.kumar@primemoveindia.com';
			$from="www.mainstreetpharmacys.com";
			$name=$memberdata->firstname;
			$subject="Instant Refill prescription";
			$st_no = $this->input->post('st_no');
			$Rxnumber = $this->input->post('rxnumber');
			$ret=$this->home_model->check_instant_refill($Rxnumber);
			if(!empty($ret)==TRUE)
			{
				$message="There is a request from <i>".$name."</i> for Refill the drugs in the given Prescription Number <u>".$Rxnumber."</u>";
				if($this->form_validation->run()==TRUE)
				{
				$update['pharmacyid']=$st_no;
				$update['type']="refill";
				$msg=$this->home_model->updatequery('prescription',$Rxnumber,'prescriptionno',$update);
				$this->email($to,$subject,$message,$from,$name);
				}
			}
			else
			{
			$insert['memberid']=intval($this->session->userdata('memberid'));
			$insert['pharmacyid']=$st_no;
			$insert['prescriptionno']=$Rxnumber;
			$insert['prescriberfirstname']=$memberdata->firstname;
			$insert['prescriberlastname']=$memberdata->lastname;
			$insert['prescriberphno']=$memberdata->mobile;
			$insert['type']="refill";
			$insert['date']=date('y/m/d');
			$insert['prescriptiondate']=date('y/m/d');
			$message="There is a request from <i>".$name."</i> for Refill the drugs in the given Prescription Number <u>".$Rxnumber."</u>";
			if($this->form_validation->run()==TRUE)
			{
				$data['msg1']=$this->home_model->insertquery($insert,'prescription');
				$this->email($to,$subject,$message,$from,$name);
			}
			}
		redirect($this->base.'index.php/home/index/','refresh');
		}
		else
		{
			redirect($this->base."index.php/home/signin","refresh");
		}
	}
	function email($to,$subject,$message,$from,$name)
	{
		$this->load->library('email');
		$config['mailtype'] = "html";
		$this->email->initialize($config);
		$this->load->library('email');
		$this->email->from($from,$name);
		$this->email->to($to); 
		$this->email->cc('manju.primemove@gmail.com'); 
		$this->email->reply_to($from,$name);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	}
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
