<?php
class Services extends CI_Controller {
   
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
		$this->load->helper('menu');
	
	}
	
	function index()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="services";
	   $this->session->set_userdata('url', current_url());
	  $data['category']=$this->home_model->category("7");
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('services',$data);
		$this->load->view('footer',$data);
		
	}
	

}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
