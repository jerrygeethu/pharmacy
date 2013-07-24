<?php
class Healthinfo extends CI_Controller {
   
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
	   $data['menu']="info";
	  $data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		
		$this->healthinformation();
		
		
	}
	
	
	
	function healthinformation()
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
	function healthtopics()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function healthencyclopedia()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function faq()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function fitness()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function weight()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function dental()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function work()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function mens()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
  function womens()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function pregnancy()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	function children()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	
	function topic()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	
	function comming_soon()
	{
		 $data['base'] = $this->base;
	     $data['css'] = $this->css;
		 $data['menu']="health";
		$data['submenu']=$this->home_model->submenu();
		$data['cart_count']=$this->home_model->count_cart_items();
		
		$this->load->view('header',$data);
		$this->load->view('commingsoon',$data);
		$this->load->view('footer',$data);
	}
	
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
