<?php
class Home extends CI_Controller {
   
   var $base;
   var $css;
   
	  function __construct()
       {
            parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->css = "style.css";
		$this->load->helper('parameter');
		//$this->load->database();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('home_model');
		$this->load->helper('url');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->library('email');
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
		
		
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
		
	}
	function signin()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['message']="";
	   $data['menu']="";
	   
	   $this->form_validation->set_rules('email', 'E-mail Id', 'callback_check|email');
	   $this->form_validation->set_rules('password', 'Password', 'callback_check');
	   $this->load->view('header',$data);
	   
	   if ($this->form_validation->run() == TRUE)
	   {
	   $insert['email']=$this->input->post('email');
	   $insert['password']=base64_encode($this->input->post('password'));
	   
	   $login=$this->home_model->signin($insert);
	   $no=$login->num_rows;
	   
	   if($no>0)
	   {
		   
		   foreach($login->result() as $log)
		   {
		   }
		 
		  $this->session->set_userdata('memberid', $log->memberid);
		  $this->session->set_userdata('name', $log->firstname);
		  
		  redirect('index.php/home', 'refresh');
		  
	     // $this->load->view('home',$data);
       }
	   else
		{
			$data['message']="SORRY..You are not a member of MSP.Please create an account.";
			$data['menu']="signin";
			$this->load->view('signin',$data);
			
		}
       }
		else
		{
		    $data['message']="SORRY..You are not a member of MSP.Please create an account.";

			$this->load->view('signin',$data);
			
		}
		
		
		$this->load->view('footer',$data);
	}
	function createaccount()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="";
	   
	   
		$this->load->view('header',$data);
		$this->load->view('createaccount',$data);
		$this->load->view('footer',$data);
	}
	function forgotpassword()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['message'] ="";
	   $data['menu']="";
	   $this->load->library('email');
	  
	  
	  
		
		$this->form_validation->set_rules('email', 'E-mail Id', 'valid_email');
		$this->load->view('header',$data);
		if ($this->form_validation->run() == TRUE)
		{
			$email=$this->input->post('email');
		    $va=$this->home_model->view("member",$email);
			$no=$va->num_rows;
			foreach($va->result() as $vaa)
			{
			}
			$pass=base64_decode($vaa->password);
			
			if($no>0)
			{
				
				$this->email->from('pharmacy@gmail.com', 'MSP');
				$this->email->to($email);
				$this->email->cc('tintu.primemove@gmail.com');
				
                 $message="Your password is ".$pass;
				$this->email->subject('Password recovery from Main Street Pharmacy');
				$this->email->message($message);

				$this->email->send();

				$this->load->view('signin',$data);
				
			}
		}
		
		else
		{
		$this->load->view('forgotpassword',$data);
	    }
		$this->load->view('footer',$data);
		
	}
	function newpassword()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="";
	  
		
		
		$this->form_validation->set_rules('password', 'Password', 'required|matches[repassword]|min_length[7]|max_length[20]');
		$this->form_validation->set_rules('repassword', 'Re Enter Password', 'required');
		
		$this->load->view('header',$data);
		if ($this->form_validation->run() == TRUE)
		{
			$password=$this->input->post('password');
			$repassword=$this->input->post('repassword');
			$va=$this->home_model->updatepassword($password);
			$this->load->view('newpasswordsecurity',$data);
			
		}
		else
		{
			$this->load->view('newpassword',$data);
	    }
		
		
		$this->load->view('footer',$data);
		
	}
	function accountconfirmation()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css; 
	   $data['menu']="";
	   $data['message']="";
	   
	   
	  
				$data['firstname']=$this->input->post('firstname');
				$data['lastname']=$this->input->post('lastname');
				$data['location']=$this->input->post('loc');
				$data['email']=$this->input->post('emailid');
				$data['passconf']=$this->input->post('passconf');
				$data['securityanswer']=$this->input->post('securityanswer');
				$data['healthcard']=$this->input->post('healthcard');
				$data['accept']=$this->input->post('healthcard');
	  
			$this->form_validation->set_rules('firstname', 'First Name', 'callback_firstname_check');
			$this->form_validation->set_rules('lastname', 'Last Name', 'callback_lastname_check');
			$this->form_validation->set_rules('loc', 'Location', 'callback_loc_check');
			$this->form_validation->set_rules('emailid', 'E-mail id', 'required|valid_email');
			$this->form_validation->set_rules('pwd', 'Password', 'trim|required|min_length[7]|max_length[20]|required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Confirm Password', 'trim|required');
			$this->form_validation->set_rules('securityanswer', 'Security Answer', 'required');
			
		//  $this->form_validation->set_rules('accept', 'I Accept. ', 'required');
	  
				
				if($this->form_validation->run() == FALSE)
				{
					$this->load->view('header',$data);
					$this->load->view('createaccount',$data);
					$this->load->view('footer',$data);
				}
				elseif($this->input->post('addBtn')=="Submit")
				{
						$insert['firstname']=$this->input->post('firstname');
						$insert['lastname']=$this->input->post('lastname');
						$insert['location']=$this->input->post('loc');
						$email=$insert['email']=$this->input->post('emailid');
						$password=$insert['password']=base64_encode($this->input->post('pwd'));
						$insert['securityquest']=$this->input->post('ques');
						$insert['securityanswer']=md5($this->input->post('securityanswer'));
						$insert['dob']=$this->input->post('year')."-".$this->input->post('month')."-".$this->input->post('date');
						$insert['date']=date('Y-m-d');
						$insert['sex']=$this->input->post('sex');
						$insert['cardno']=$this->input->post('healthcard');
			
						    
						   $mb= $this->db->get_where('member', array('email' => $email));
						   if(($mb->num_rows)>0)
						   {
							   $data['message']="email id is already existed";
							   $this->load->view('header',$data);
					           $this->load->view('signin',$data);
					           $this->load->view('footer',$data);
							   
						   }
						   else
						   {
						   
							$data['member']=$this->db->insert('member', $insert); 
							if(!empty($data['member']))
							{
								
							$this->email->from('pharmacy@gmail.com', 'MSP');
							$this->email->to($email);
							$this->email->cc('tintu.primemove@gmail.com');
							
							$message="Your account is created in MSP";
							$this->email->subject('Account confirmation from Main Street Pharmacy');
							$this->email->message($message);

							$this->email->send();
							
							$insert['email']=$email;
							$insert['password']=$password;
							   
							$login=$this->home_model->signin($insert);
							$no=$login->num_rows;
							
							   
							   if($no>0)
							   {
								   
								   foreach($login->result() as $log)
								   {
								   }
								 
								  $this->session->set_userdata('memberid', $log->memberid);
								  $this->session->set_userdata('name', $log->firstname);
								  						  
								}
		                    }
							$this->load->view('header',$data);
							$this->load->view('accountconfirmation',$data);
							$this->load->view('footer',$data);
					        }
					
					
				}
		
	}
	function refillprescription()
	{
		    if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");	}      

	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   
	  	$data['message']="";
	  		
	  	
		
		 $this->form_validation->set_rules('medication', 'medication', 'callback_check');
		 $this->form_validation->set_rules('rxnumber0', 'Rx number', 'callback_check');
		  
	  if ($this->input->post('button'))
	  {
		  
		  
		  
		   if($this->form_validation->run() == TRUE)
			{
	 	    $insert['memberid']=$this->session->userdata('memberid');
			
	   		$insert['sno']=$this->input->post('sno');
	   		 $count=$data['count']=$insert['count']=$this->input->post('count');
			for($i=0;$i<$count+1;$i++)
			{
				
				$v="rxnumber".$i;
				$v1="Rx number".$i;
				if($this->input->post($v)!=$v1)
				{
					
   	   		     $insert['rxno']=$this->input->post($v);
				 $data['value']=$this->home_model->addprescription($insert);
			    }
	       	}
   	       
   	   		if(!empty($data['value']))
			{
				$data['message']="Prescription refill successfully";
				
			}
		}
	   }
	   $data['menu']="refill";

		$this->load->view('header',$data);
		$this->load->view('refillprescription',$data);
		$this->load->view('footer',$data);
		
	}
	function transferprescription()
	{
		if($this->session->userdata('memberid')==FALSE) {	header("Location:".$this->base."index.php/home/signin");	}      

	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['message']="";
	   $data['menu']="refill";
	  
		    $this->form_validation->set_rules('firstname', 'First name', 'callback_check');
			$this->form_validation->set_rules('lastname', 'Last name', 'callback_check');
			$this->form_validation->set_rules('dob', 'Date Of Birth', 'callback_check');
			$this->form_validation->set_rules('phone', 'Phone Number', 'callback_check');
			$this->form_validation->set_rules('medication', 'medication', 'callback_check');
			$this->form_validation->set_rules('rxnumber', 'Rx number', 'callback_check');
			$this->form_validation->set_rules('pharmacy', 'Pharmacy Name', 'callback_check');
			
			
			
		    $data['med']=$this->home_model->view("drug");
			$data['pharm']=$this->home_model->view("pharmacy");
			
			
			$data['firstname']=$insert['firstname']=$this->input->post('firstname');
			 if($this->input->post('initial')=="Initial")
			 {
				 $data['initial']=$insert['initial']="";
			 }
			 else
			 {
			  $data['initial']=$insert['initial']=$this->input->post('initial');
		     }
			 
			  $data['lastname']=$insert['lastname']=$this->input->post('lastname');
			  $data['dob']=$insert['dob']=dmytoymd($this->input->post('dob'));
			  $data['phone']=$insert['phone']=$this->input->post('phone');
			  
			  $data['prescriber']=$insert['prescriber']="";
			  $data['prescriberphone']=$insert['prescriberphone']="";
			  $data['pharmacy']=$insert['pharmacy']=$this->input->post('pharmacy');
			  $data['city']=$insert['city']=$this->input->post('city');
			  $data['state']=$insert['state']=$this->input->post('state');
			  $data['pharmacyphone']=$insert['pharmacyphone']=$this->input->post('pharmacyphone');
			  $data['count']=$insert['count']=$this->input->post('count');
			  $insert['memberid']=$this->session->userdata('memberid');
			
		if ($this->form_validation->run() == TRUE )
		 {
			
	       	$data['value']=$this->home_model->addpatient($insert);	
			
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
	function druginformation()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   
	   
	    $data['drugs']=$this->home_model->viewdrug();
		$data['category']=$this->home_model->view("category");
		
		$this->load->view('header',$data);
		$this->load->view('druginformation',$data);
		$this->load->view('footer',$data);
	}
	function search()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   
	   $string=$this->input->post('drug');
	   
	   
	    $data['drugs']=$this->home_model->viewdrug($string);
		
		
		$this->load->view('header',$data);
		$this->load->view('alphadrug',$data);
		$this->load->view('footer',$data);
	}
	
	function alphadrug($string="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   
	    $data['drugs']=$this->home_model->viewdrug($string);
		
		$this->load->view('header',$data);
		$this->load->view('alphadrug',$data);
		$this->load->view('footer',$data);
	}
	function dosage($id="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   
	    $data['drugs']=$this->home_model->viewdosage($id);
		$this->load->view('header',$data);
		$this->load->view('dosage',$data);
		$this->load->view('footer',$data);
	}

	function detaildrug($id="",$f=0,$start=0)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";

	   
	   $data['drugs']=$this->home_model->viewdet($id);


				$insert['name']=$this->input->post('name');
				$insert['email']=$this->input->post('email');
				$insert['website']=$this->input->post('web');
				$insert['comments']=$this->input->post('comments');
				$insert['posted']=date("Y-m-d");
				
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'E-mail id', 'required|valid_email');
		$this->form_validation->set_rules('web', 'web', 'required');
		$this->form_validation->set_rules('comments', 'Comments', 'required');
		
			if($this->input->post('sendBtn')=="Send")
			{
				if($this->form_validation->run() == TRUE)
				{
					$data['member']=$this->db->insert('review', $insert); 
					if(!empty($data['value']))
					{
						echo $data['message']=" Success";
					}
				}
				
			}
			
			
			
			
		$this->limit=3;
		$data['start']=intval($start);
		$data['count']=0; 
		$data['limit'] = $this->limit; 
		$data['reviewlst']=$this->home_model->reviewlst('review',$data); 
		// print_r($data['reviewlst']['result']);
		$data['count']=1; 
		$data['reviewlst_count']=$this->home_model->reviewlst('review',$data); 
		$url= $this->base.'index.php/home/detaildrug/'.$id.'/'.$f.'/'; 
		$total = $data['reviewlst_count']['totalrows'];
		$per_page = $this->limit;  
		$config=paging($url,$total,$per_page,5); 
		$this->pagination->initialize($config); 
	 	$data['link']=$this->pagination->create_links();
		$data['id']=$id; 
	 	

		$this->load->view('header',$data);
		$this->load->view('detaildrug',$data);
		$this->load->view('footer',$data);
	}
	
	function presrequest()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="refill";
	  
		
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
	  
	  
	  		
			$this->form_validation->set_rules('firstname', 'firstname', 'callback_check');
			$this->form_validation->set_rules('lastname', 'lastname', 'callback_check');
			$this->form_validation->set_rules('dob', 'dob', 'callback_check');
			$this->form_validation->set_rules('phone', 'phone', 'callback_check');
			$this->form_validation->set_rules('medication', 'medication', 'callback_check');
			$this->form_validation->set_rules('pharmacy', 'Pharmacy', 'callback_check');
			
			
		    $data['med']=$this->home_model->view("drug");
			$data['pharm']=$this->home_model->view("pharmacy");
			 
			
			$data['firstname']=$insert['firstname']=$this->input->post('firstname');
			 if($this->input->post('initial')=="Initial")
			 {
				 $data['initial']=$insert['initial']="";
			 }
			 else
			 {
			  $data['initial']=$insert['initial']=$this->input->post('initial');
		     }
			 $data['memberid']=$insert['memberid']=$this->session->userdata('memberid');
			 
			 $data['lastname']=$insert['lastname']=$this->input->post('lastname');
			 $data['dob']= $insert['dob']=dmytoymd($this->input->post('dob'));
			 $data['phone']= $insert['phone']=$this->input->post('phone');
			 $data['count']=$insert['count']=$this->input->post('count');
			 
			
			if ($this->form_validation->run() == TRUE)
			{
			
	       	$data['value']=$this->home_model->addpatient($insert);		
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
		$values=array("First name","Initial","Last name","Date of birth","Phone number","Select your medication","Prescriber’s Name","Rx number","Pharmacy Name","E-mail id","Select your Pharmacy");
	
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
	function signout()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="";
	  
		$this->session->unset_userdata('memberid');
		$this->session->unset_userdata('name');
		
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
		
	}

}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
