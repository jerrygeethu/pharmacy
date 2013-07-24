<?php
class Cart extends CI_Controller{
   
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
		$this->load->view('orders',$data);		
		$this->load->view('footer',$data);
		
	  
		
	}
			  
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
