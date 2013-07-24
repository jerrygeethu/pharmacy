<?php
class Drugs extends CI_Controller {
   
   var $base;
   var $css;
   
	  function __construct()
       {
            parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->css = "style.css";
		$this->load->helper('parameter');
		$this->load->database();
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('home_model');
		$this->load->helper('url');
		$this->load->library('image_lib');
		$this->load->library('form_validation');
		$this->load->library('email');
		$this->load->helper('menu');
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
		 $data['category']=$this->home_model->category("7");
		 $data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('home',$data);
		$this->load->view('footer',$data);
		
	}
	function druginformation()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   $data['submenu']=$this->home_model->submenu();
	   
	    $data['drugs']=$this->home_model->viewdrug();
		$data['category']=$this->home_model->category();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->form_validation->set_rules('drugname', 'Drug Name', 'required');
		
		if($this->input->post('searchBtn')!="")
		{
			if($this->form_validation->run() == TRUE)
			{
				$drugname=trim($this->input->post('drugname'));
				$drug=$this->home_model->drugs();
				//print_r($drugs);
				foreach($drug as $drugs)
				{
					if($drugs->medication==$drugname)
					{
						$drugid=$this->home_model->get_drugid($drugname);
						redirect('drugs/druginteraction/'.$drugid->drugsid,'refresh');
					}
				}				
			}
		}
		
		$this->load->view('header',$data);
		$this->load->view('druginformation',$data);
		$this->load->view('footer',$data);
	}
	
	function druginteraction($id=0)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['menu']="drug";
		
			$this->load->helper('file');
	   
				$data['submenu']=$this->home_model->submenu();
				$data['cart_count']=$this->home_model->count_cart_items();
				
					$filename=get_filenames("./drugInteraction/");
					$druginter=$this->home_model->druginter($id);
					//print_r($druginter);
					$english="";
					$spanish="";
					foreach($druginter as $drug_inter)
					{	
						//echo $drug_inter->filename."<br/>";		
						$details=substr($drug_inter->filename, 7, -4);
						$drug_forms=substr($drug_inter->filename, 6, -5);
/*
						if($drug_forms="a")
						{
							$data['a']="(Oral)";
						}
						if($drug_forms="n")
						{
							$data['n']="(Inhalation)";
						}
						if($drug_forms="o")
						{
							$data['o']="(Oral)";
						}
						if($drug_forms="r")
						{
							$data['r']="(Inhalation)";
						}
						if($drug_forms="t")
						{
							$data['r']="(Transdermal)";
						}
						if($drug_forms="v")
						{
							$data['v']="(Injection)";
						}
*/
						if($details=='1')
						{
							//$data['english']=$drug_inter->filename;
							if($english!="")
							{
								$english.=",";
							}
							$english.=$drug_inter->filename;
						}
						else if($details=='3')
						{
							//$data['spanish']=$drug_inter->filename;
							if($spanish!="")
							{
								$spanish.=",";
							}
							$spanish.=$drug_inter->filename;
						}
					}
					$data['english']=$english;
					$data['spanish']=$spanish;
					
					$drug_name=$this->home_model->drugname($id);	
					$data['drugname']=ucwords($drug_name->medication);
							
/*
					foreach($filename as $name)
					{
						echo $insert['drugid']=substr($name, 6, -4)."<br/>";

						//$data['value']=$this->db->insert('druginteraction', $insert); 
					}
*/

	   
		$this->load->view('header',$data);
		$this->load->view('drug_interaction',$data);
		$this->load->view('footer',$data);
	}
	
	function search()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   $data['submenu']=$this->home_model->submenu();
	   $string=$this->input->post('drug');
	   
	   
	    $data['drugs']=$this->home_model->viewdrug($string);
	    $data['cart_count']=$this->home_model->count_cart_items();
		
		
		$this->load->view('header',$data);
		$this->load->view('alphadrug',$data);
		$this->load->view('footer',$data);
	}
	
	function alphadrug($string="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   
	   $this->session->set_userdata('string', $string); 
	   
	   $data['submenu']=$this->home_model->submenu();
	    $data['drugs']=$this->home_model->viewdrug($string);
	    $data['cart_count']=$this->home_model->count_cart_items();
		
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
	    $data['drug']=$this->home_model->viewdrugs($id);
	     $this->session->set_userdata('medication', $data['drug']->medication); 
	     $this->session->set_userdata('dosageid', $id); 
	    
	    //echo $data['drug']->medication;
	    $data['cart_count']=$this->home_model->count_cart_items();
	    $data['submenu']=$this->home_model->submenu();
		$this->load->view('header',$data);
		$this->load->view('dosage',$data);
		$this->load->view('footer',$data);
	}

	function detaildrug($id="",$f=0,$start=0)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="drug";
	   $data['newid']=intval($id);
	   $this->session->set_userdata('prod_id', $id); 
	  $data['drug_det']=$this->home_model->viewdrug_det($this->session->userdata('prod_id'));
		$this->session->set_userdata('prod_name', $data['drug_det']->generic_product_name); 
	   $data['submenu']=$this->home_model->submenu();
	   $data['drugs']=$this->home_model->viewdet($data['newid']);
	   $data['cart_count']=$this->home_model->count_cart_items();
	   $data['sideeffect']=$this->home_model->get_sideeffect($data['newid']);	
	   $data['drugname']=$this->home_model->get_drugname($data['newid']);	
	   $data['precaution']=$this->home_model->get_warning($data['newid']);
	   
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
					$data['value']=$this->db->insert('review', $insert); 
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
		$data['cart_count']=$this->home_model->count_cart_items();
		// print_r($data['reviewlst']['result']);
		$data['count']=1; 
		$data['reviewlst_count']=$this->home_model->reviewlst('review',$data); 
		$config['base_url']=$url= $this->base.'index.php/drugs/detaildrug/'.$id.'/'.$f.'/'; 
		$config['total_rows']=$total = $data['reviewlst_count']['totalrows'];
		$config['per_page'] = $this->limit;  
		$config['prev_link'] = '&lsaquo;&lsaquo; Previous'; 
		$config['next_link'] = 'Next &rsaquo;&rsaquo;'; 
		$config['uri_segment'] = '5';	
		
		//$config=pagination($url,$total,$per_page,5); 
		$this->pagination->initialize($config); 
	 	$data['link']=$this->pagination->create_links();
	 	
	 	
	    	$data['id']=$id; 
	 	

		$this->load->view('header',$data);
		$this->load->view('detail_drug',$data);
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


}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
