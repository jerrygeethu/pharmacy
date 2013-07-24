<?php
class News extends CI_Controller{
   
   var $base;
   var $css;
   
	function __construct()
       {
            parent::__construct();
		$this->base = $this->config->item('base_url');
		$this->css = "admin/style.css";
		
		$this->load->database();
		
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('admin_model');
		
		$this->load->helper('url');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->load->helper('parameter_helper');
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
			
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('viewnews',$data);		
		$this->load->view('footer',$data);
	}
	function add()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
			$this->form_validation->set_rules('category', 'Category', 'required');
			$this->form_validation->set_rules('article_title', 'Article Titile', 'trim');
			$this->form_validation->set_rules('article_description', 'Article Descriptions', 'required');
			$this->form_validation->set_rules('email',	'Email',	'trim');
			$this->form_validation->set_rules('gender',	'Gender',	'trim');
			$this->form_validation->set_rules('dob',	'Date	Of	Birth',	'trim');
			$this->form_validation->set_rules('qualification','Qualification','trim');
			$this->form_validation->set_rules('experience','Experience','trim');
			$this->form_validation->set_rules('comments',	'Comments',	'trim');
			
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('addnews',$data);		
		$this->load->view('footer',$data);
	}
	function edit()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
			
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('viewnews',$data);		
		$this->load->view('footer',$data);
	}
	function delete()
	{
		   $data['base'] = $this->base;
		   $data['css'] = $this->css;
		   $data['menu']="index";
	  
			
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('viewnews',$data);		
		$this->load->view('footer',$data);
	}
			  
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
