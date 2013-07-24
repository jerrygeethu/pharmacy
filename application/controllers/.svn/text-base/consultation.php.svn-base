<?php
class Consultation extends CI_Controller {
   
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
		
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  $data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		
		
		$this->cosultation();
		
	}
	
	
	function cosultation()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="info";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
	    $this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
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
