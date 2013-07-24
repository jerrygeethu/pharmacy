<?php
class Onlineshop extends CI_Controller {
   
   var $base;
   var $css;
function __construct()
    {
	parent::__construct();
	$this->base = $this->config->item('base_url');
	$this->css = "style.css";
	$this->load->database();
	$this->load->library('session');
	$this->load->library('pagination');
	$this->load->model('home_model');
	$this->load->helper('url');
	$this->load->library('image_lib');
	$this->load->helper('form');
	$this->load->library('form_validation');
	$this->load->library('email');
	$this->load->helper('menu');
	$this->load->helper('parameter_helper');
	}
function index($id="",$limit=0 )
	{
	$data['base'] = $this->base;
	$data['css'] = $this->css;
	$data['menu']="online";
	
	$data['extra']="<script type=\"text/javascript\" src=\"".$this->base."js/jquery-1.4.2.min.js\"></script>
					<script type=\"text/javascript\" src=\"".$this->base."js/jquery.js\"></script>";
	
	$data['cart_count']=$this->home_model->count_cart_items();
	$data['category']=$this->home_model->category();
	$data['submenu']=$this->home_model->submenu();
	$rows=$this->db->count_all('maincategory');		
	$url=$this->base."index.php/onlineshop/index/".intval($id);		
	$config=pagination($url,$rows,$per_page="15");
	$config['uri_segment'] = 4;
	$this->pagination->initialize($config);
	$data['page']=$this->pagination->create_links();		
	$data['main']=$main=$this->home_model->listmain(intval($limit),$per_page);
		foreach($main->result() as $ma)
		{
			$cat=$this->home_model->listcat($ma->id);
			$data['cats'][$ma->id]=$cat;
			$data['count'][$ma->id]=count($cat);
		}
	$data['limit']=$limit;
	$this->load->view('header',$data);
	$this->load->view('onlinestore',$data);
	$this->load->view('footer',$data);
	}
function items($hamcode,$start=0)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['menu']="online";
		
		$this->session->set_userdata('url', current_url()); 
		
		$data['extra']="<script type=\"text/javascript\" src=\"".$this->base."js/jquery-1.4.2.min.js\"></script>
						<script type=\"text/javascript\" src=\"".$this->base."js/jquery.js\"></script>";
		$data['cart_count']=$this->home_model->count_cart_items();
		$data['newhamcode']=intval($hamcode);
		$data['itemdetails']=$this->home_model->item_details($data['newhamcode']);
		$this->session->set_userdata('newhamcode', $data['newhamcode']); 
		$data['submenu']=$this->home_model->submenu();
		$this->limit=2;
		$page['start']=intval($start);
		$page['count']=0; 
		$page['limit'] = $this->limit; 
		$data['feedback_lst']=$this->home_model->list_rec('review',$page); 
		$page['count']=1; 
		$data['feedback_count']=$this->home_model->list_rec('review',$page); 
		$config['prev_link'] = '&lsaquo;&lsaquo; Previous'; 
		$config['next_link'] = 'Next &rsaquo;&rsaquo;';  
		$config['base_url']=$this->base.'index.php/onlineshop/items/'.$hamcode.'/'; 
		$config['total_rows']=$data['feedback_count']['totalrows'];
		$config['per_page']=$this->limit; 
		$config['uri_segment'] = '4';	
		$this->pagination->initialize($config);
		$data['link']= $this->pagination->create_links();
		$this->load->view('header',$data);
		$this->load->view('item',$data);
		$this->load->view('footer',$data);		
	}
/**********************************************Cart Management***********************************/
function update_cart($hamcode,$id=0)
	{
		if($this->session->userdata('cartid')=="")
		{
			$cart['name']="Mycart";
			$cart['descr']="Mycart ".date('d/m/Y');
			$cart['date']=date('Y-m-d').date('H:m:s');
			$cart['memberid']=intval($this->session->userdata('memberid'));
			//print_r($cart);
			$cartid=$this->home_model->insertquery($cart,'cart');
			$this->session->set_userdata('cartid',$cartid['ins']);
		}
		$this->insert_cartdtls($hamcode,$id);
	}
function insert_cartdtls($hamcode=0,$id=0)
	{
		$ret = $this->home_model->check_cart($hamcode);	

			if($this->session->userdata('cartid')!="")
			{	
			   	if(!empty($ret))
				{
					$quantity=$this->input->post('num');
					$insert['quantity']=$ret->quantity+$quantity;
					$insert['total']=$insert['quantity']*$ret->rate;
					$data12=$this->home_model->updatequery('cartdtl',$ret->cartdtlid,'cartdtlid',$insert);
				}
				else
				{
				$data['newhamcode']=intval($hamcode);
				$cart_details['cartid']=intval($this->session->userdata('cartid'));
				$cart_details['itemid']=$hamcode;
				$cart_details['quantity']=$this->input->post('num');
				$cart_details['rate']='20.00';
				$cart_details['total']=$this->input->post('num')*$cart_details['rate'];
				$table="cartdtl";
				$this->home_model->insertquery($cart_details,$table);
				
				$cartid=$this->session->userdata('cartid');
				//redirect($this->base."index.php/onlineshop/viewcart",'refresh');
				}
			}
			$this->viewcart($hamcode,$id);
	}
	
function viewcart($hamcode=0,$cartdtlid=0,$start=0)
	{//echo $this->session->userdata('cartid');
		$this->session->set_userdata('url', current_url());
		if($this->session->userdata('memberid')==FALSE)
		{
			redirect($this->base.'index.php/home/signin','refresh');
		}
		else
		{
			
		   $data['base'] = $this->base;
		   $data['hamcode'] = $hamcode;
		   $data['cartdtlid'] = $cartdtlid;
		   $data['css'] = $this->css;
		   $data['menu']="online";
		   $data['extra']="<script type=\"text/javascript\" src=\"".$this->base."js/jquery-1.4.2.min.js\"></script>
							<script type=\"text/javascript\" src=\"".$this->base."js/jquery.js\"></script>";
		   $this->load->library('pagination');
		   $data['cart_count']=$this->home_model->count_cart_items();
		   $cartdetails=$this->home_model->get_cartdtl();
		   $data['submenu']=$this->home_model->submenu();
		   $page['start']=intval($start);
		   $this->session->set_userdata('start', $page['start']);
		   $data['strt']=intval($this->session->userdata('start'));
			
/*
		   $ret = $this->home_model->check_cart($hamcode);	*/

			if($this->session->userdata('cartid')!="")
			{	
			  /* 	if(!empty($ret))
				{
					$quantity=$this->input->post('num');
					$insert['quantity']=$ret->quantity+$quantity;
					$insert['total']=$insert['quantity']*$ret->rate;
					$data12=$this->home_model->updatequery('cartdtl',$ret->cartdtlid,'cartdtlid',$insert);
					//redirect($this->base."index.php/onlineshop/viewcart",'refresh');
				}
				else
				{
				$data['newhamcode']=intval($hamcode);
				$cart_details['cartid']=intval($this->session->userdata('cartid'));
				$cart_details['itemid']=$hamcode;
				$cart_details['quantity']=$this->input->post('num');
				$cart_details['rate']='20.00';
				$cart_details['total']=$this->input->post('num')*$cart_details['rate'];
				$table="cartdtl";
				$this->home_model->insertquery($cart_details,$table);
				
				$cartid=$this->session->userdata('cartid');
				//redirect($this->base."index.php/onlineshop/viewcart",'refresh');
				}
*/
				
				$cartdtls1="";
				foreach($cartdetails as $cartdetails1)
				{
					if($cartdtls1!="")
					{
						$cartdtls1.=",";
					}
					$cartdtls1.=$cartdetails1['itemid'];
				}
					$this->limit=10;
					
					$page['limit'] = $this->limit; 
					if($this->session->userdata('cartid')!="")
					{
						$data['item_details_lst']=$cart_detls=$this->home_model->view_cart_items($cartdtls1,$page);	
						//$config['total_rows']=$data['item_details_lst']['totalrows'];
							
					}
					$data['total']=$this->home_model->take_total();
					$config['base_url']=$this->base.'index.php/onlineshop/viewcart/'.$hamcode.'/'.$cartdtlid.'/'; 
					$config['total_rows']=count($data['item_details_lst']);	
					$config['per_page']=$this->limit; 
					$config['uri_segment'] = '5';
					$config['prev_link'] = '&lsaquo;&lsaquo; Previous'; 
					$config['next_link'] = 'Next &rsaquo;&rsaquo;'; 
					$this->pagination->initialize($config);
					$data['link']= $this->pagination->create_links();
					
			}
/*
			else
			{
				$data['msg']="Your cart is clear out,Sorry!!!";
			}
*/
			$this->load->view('header',$data);
			$this->load->view('viewcart',$data);
			$this->load->view('footer',$data);
		}	
	}
	function update_crts($cartdtlid=0)
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$update['quantity']=$this->input->post('qty');
		$rate=$this->home_model->cart_rate($cartdtlid);
		$update['total']=$rate->rate*$update['quantity'];
		$where['cartdtlid']=intval($cartdtlid);
		$this->db->where($where); 
		$data['shopping_cart']=$this->db->update('cartdtl',$update);
		redirect($this->base.'index.php/onlineshop/viewcart/0/0/'.$this->session->userdata('start'),'refresh');
	
	}
	function remove_category($id)
	{

		$msg=$this->home_model->deletequery('cartdtl',$id,'cartdtlid');
		if($msg==1)
		{
			$data['msg']="Deleted";
		}
		else
		{
			$data['msg']="Row Cannot be deleted";
		}
		redirect($this->base."index.php/onlineshop/viewcart/","refresh");
	}
	function checkout()
	{	
		//echo $this->session->userdata('cartid');
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['menu']="online";
		$data['cart_count']=$this->home_model->count_cart_items();
		$data['submenu']=$this->home_model->submenu();
		$this->session->unset_userdata('cartid');
		if($this->session->userdata('memberid')==FALSE)
		{		
			$data['state']=$this->home_model->state('states','states');	
			$this->form_validation->set_rules('firstname', 'Firstname', 'required');
			$this->form_validation->set_rules('lastname', 'Lastname', 'required');
			$this->form_validation->set_rules('phone', 'Phone Number', 'trim|min_length[6]|max_length[15]');
			$this->form_validation->set_rules('email', 'Email-Id', 'required|valid_email');
			$this->form_validation->set_rules('address', 'Address', 'trim');
			$this->form_validation->set_rules('city', 'City', 'trim');
			$this->form_validation->set_rules('state', 'State', 'trim');
			$this->form_validation->set_rules('zip', 'Zip', 'trim|integer||max_length[9]');
			
			if($this->input->post('saveBtn')!="")
			{
				if($this->form_validation->run() == TRUE)
				{			
					$insert['firstname']=trim($this->input->post('firstname'));
					$insert['lastname']=trim($this->input->post('lastname'));
					$insert['password']=base64_encode('prime123');
					$insert['email']=trim($this->input->post('email'));
					$insert['phone']=trim($this->input->post('phone'));
					$insert['address']=trim($this->input->post('address'));
					$insert['city']=trim($this->input->post('city'));
					$insert['state']=trim($this->input->post('state'));
					$insert['zip']=trim($this->input->post('zip'));
					$insert['source']='cart';
					$data['mem']=$this->home_model->insertquery($insert,'member'); 
					$this->session->set_userdata('memberid', $data['mem']['ins_id']);
					$memid=$this->session->userdata('memberid');
					redirect('/onlineshop/billing/','refresh');
				}
			}
		}
		else
		{
			$memid=$this->session->userdata('memberid');
			$data['memdet']=$this->home_model->getdata($memid);
		}
	$this->load->view('header',$data);
	$this->load->view('checkout',$data);
	$this->load->view('footer',$data);
		
	}
/**********************************Payment Gateway*********************************************/
function billing()
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['menu']="online";
		$data['cart_count']=$this->home_model->count_cart_items();
		$data['submenu']=$this->home_model->submenu();
		$this->load->view('header',$data);
		$this->load->view('billing',$data);
		$this->load->view('footer',$data);
	}
/**************************************************Product Display**************************************/
function product($id,$limit=0)
	{
	    $data['base'] = $this->base;
	    $data['css'] = $this->css;
	    $data['menu']="online";
	    
		$data['category']=$this->home_model->category();
		$data['submenu']=$this->home_model->submenu();		
		$data['categ']=$this->home_model->categ($id);
		$this->session->set_userdata('category_name', $data['categ']->category); 
		$this->session->set_userdata('category_id', $id); 
		//$data['category_name']=$this->session->userdata('category_name');
		$data['finestcategory']=$this->home_model->finestcategory($id);
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->view('header',$data);
		$this->load->view('finestcategories',$data);
		$this->load->view('footer',$data);
	}
function product_fetch($id,$finest='',$start=0)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['menu']="online";
		$data['category']=$this->home_model->category();
		$data['submenu']=$this->home_model->submenu();
		//$data['subcateg']=$this->home_model->subcateg($id);
		$finest1=urldecode($finest);
		$data['cart_count']=$this->home_model->count_cart_items();
		$this->load->library('pagination');
		
		$noofproducts=$this->input->post('noperpage');
		if(empty($noofproducts))
		{
			$this->limit=12;
		}
		else
		{
			$this->limit=$noofproducts;
		}		
		
		$page['start']=intval($start);
		$page['count']=0; 
		$page['limit'] = $this->limit;
		
		
		$data['sort']=$sort=$this->input->post('sort_by');
		$data['noperpage'] = $noperpage = $this->input->post('noperpage');
	
		$data['product_lst']=$this->home_model->list_prod($finest1,$page,$sort); 
		$data['submenu']=$this->home_model->submenu();
		$page['count']=1; 
		$data['product_count']=$this->home_model->list_prod($finest1,$page,$sort);
		$this->session->set_userdata('prod', $this->uri->segment(4)); 
		$this->session->set_userdata('finest_id', $this->uri->segment(3)); 
		$data['prod']=$this->uri->segment(4);
		$config['prev_link'] = '&lsaquo;&lsaquo; Previous'; 
		$config['next_link'] = 'Next &rsaquo;&rsaquo;'; 
		$config['uri_segment'] = '5';	
		$config['base_url']=$this->base.'index.php/onlineshop/product_fetch/'.$id.'/'.$finest.'/'; 
		$config['total_rows']=$data['product_count']['totalrows'];
		$data['count']=$data['product_count']['totalrows'];
		$config['per_page']=$this->limit; 
		$this->pagination->initialize($config);
		$data['links']= $this->pagination->create_links();
		$this->load->view('header',$data);
		$this->load->view('product',$data);
		$this->load->view('footer',$data);
	}
/*******************************************************End*************************************************************/

}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
