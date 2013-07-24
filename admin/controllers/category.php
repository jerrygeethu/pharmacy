<?php
class Category extends CI_Controller{
   
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
		$this->load->model('category_model');
		
		$this->load->helper('url');
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->load->helper('parameter_helper');
	
	}
		
	/**********    Product Category Coding Start  *************/
	
	function index($limit="0",$message="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   
	        $data['message']=$message;	   
			$rows=$this->db->count_all('category');		
			$url=$this->base."admin.php/category/index";		
			$config=pagination($url,$rows,$per_page="25");
			$this->pagination->initialize($config);
			$data['page']=$this->pagination->create_links();		
		
			$data['cat']=$this->category_model->viewcat($id=0,$limit,$per_page="25");		
			$data['limit']=$limit;		
	   
	  $this->load->view('header',$data);
	  $this->load->view('menu',$data);
	  $this->load->view('listcat',$data);
	  $this->load->view('footer',$data);
	   
	}
	
	function addcat()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;	  
	   
	   $this->load->library('form_validation');
	   
	   $this->form_validation->set_rules('category', 'Category', 'required');
	   $this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
	   $this->form_validation->set_rules('finestcategory', 'Finest Category', 'required'); 	  
	   
		if ($this->form_validation->run() == TRUE)
		{
		   
		   $insert['category']=$this->input->post('category');
		   $insert['subcategory']=$this->input->post('subcategory');
		   $insert['finestcategory']=$this->input->post('finestcategory');
		   
		   $ct=$this->category_model->insertquery($insert,'category');
			
			 if(!empty($ct))
			 {
		     $this->index();
			 
			 }		  
	   }
	   
	  else
	  {        
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('addcat',$data);
		   $this->load->view('footer',$data);		  
	  }
	
	}
	
	function editcat($id,$limit)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	  
	   
	   
	   $data['cat']=$this->category_model->viewquery('category',$id,'id');
	   
	   
	   if($this->input->post('edit')=="Edit")
	   {
		 
		   $this->load->library('form_validation');
	   
		   $this->form_validation->set_rules('category', 'Category', 'required');
		   $this->form_validation->set_rules('subcategory', 'Sub Category', 'required');
		   $this->form_validation->set_rules('finestcategory', 'Finest Category', 'required'); 
		   	
		   if ($this->form_validation->run() == TRUE)
		   {
			   
		   $insert['category']=$this->input->post('category');
		   $insert['subcategory']=$this->input->post('subcategory');
		   $insert['finestcategory']=$this->input->post('finestcategory');
		   
		     $ct=$this->category_model->updatequery('category',$id,'id',$insert);
			
			 if(!empty($ct))
			 {
		     $this->index($limit);
		     }
		  
	      }
	       else
	      {    
			 
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('editcat',$data);
		   $this->load->view('footer',$data);
		  
	      }
		   
		   
	   }
		
		else
		{
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('editcat',$data);
		   $this->load->view('footer',$data);
			
			
		}
	}
	
	function deletecat($id,$limit)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	
	   
	   $ct=$this->category_model->deletequery('category',$id,'id');
	   
	   if(!empty($ct))
	   {
		   $message="Category  Deleted";
	   }
	   else
	   {
		    $message="Category not  Deleted";
	   }
		
		
	   $this->index($limit,$message);
	}
	
	
	
	/**********    Product Category Coding  End  &&  Drug Category Coding  Start  *************/

	function drugcat($limit="0",$message="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   
	        $data['message']=$message;	   
			$rows=$this->db->count_all('drugcategory');		
			$url=$this->base."admin.php/category/drugcat";		
			$config=pagination($url,$rows,$per_page="25");
			$this->pagination->initialize($config);
			$data['page']=$this->pagination->create_links();		
		
			$data['cat']=$this->category_model->viewdrugcat($id=0,$limit,$per_page="25");
				
			$data['limit']=$limit;		
	   
	  $this->load->view('header',$data);
	  $this->load->view('menu',$data);
	  $this->load->view('listdrugcat',$data);
	  $this->load->view('footer',$data);
	   
	}
	
	function drugcatadd()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;	  
	   
	   $this->load->library('form_validation');
	   
	   $this->form_validation->set_rules('category', 'Category', 'required');
	   
	   
		if ($this->form_validation->run() == TRUE)
		{
		   
		   $insert['drugcategory']=$this->input->post('category');
		   
		   
		   $ct=$this->category_model->insertquery($insert,'drugcategory');
			
			 if(!empty($ct))
			 {
		     $this->drugcat();
			 
			 }		  
	   }
	   
	  else
	  {        
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('drugcatadd',$data);
		   $this->load->view('footer',$data);		  
	  }
	
	}
	
	function drugcatedit($id,$limit)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	  
	   
	   
	   $data['cat']=$this->category_model->viewquery('drugcategory',$id,'id');
	   
	   
	   
	   if($this->input->post('edit')=="Edit")
	   {
		 
		   $this->load->library('form_validation');
	   
		   $this->form_validation->set_rules('category', 'Category', 'required');
		   
		   	
		   if ($this->form_validation->run() == TRUE)
		   {
			   
		      $insert['drugcategory']=$this->input->post('category');
		   
		     $ct=$this->category_model->updatequery('drugcategory',$id,'id',$insert);
			
			 if(!empty($ct))
			 {
		     $this->drugcat($limit);
		     }
		  
	      }
	       else
	      {    
			 
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('drugcatedit',$data);
		   $this->load->view('footer',$data);
		  
	      }
		   
		   
	   }
		
		else
		{
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('drugcatedit',$data);
		   $this->load->view('footer',$data);
			
			
		}
	}
	
	function deletedrugcat($id,$limit)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	
	   
	   $ct=$this->category_model->deletequery('drugcategory',$id,'id');
	   
	   if(!empty($ct))
	   {
		   $message=" Drug Category  Deleted";
	   }
	   else
	   {
		    $message="Drug Category not  Deleted";
	   }
		
		
	   $this->drugcat($limit,$message);
	}
	
	/**********    Drug Category Coding  End && Drug coding start  *************/
	
	function listdrug($limit="0",$message="")
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   
	    
		
	        $data['message']=$message;	   
			$rows=$this->db->count_all('drug');		
			$url=$this->base."admin.php/category/listdrug";		
			$config=pagination($url,$rows,$per_page="25");
			$this->pagination->initialize($config);
			$data['page']=$this->pagination->create_links();		
		
			$data['drug']=$this->category_model->viewdrugs($id=0,$limit,$per_page="25");				
			$data['limit']=$limit;
				
	   $this->load->view('header',$data);
	   $this->load->view('menu',$data);
	   $this->load->view('listdrug',$data);
	   $this->load->view('footer',$data);
	}
	
	
	
		
	function drugadd()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	  
	   
	 
	   $data['cat']=$this->category_model->viewdrugcat(0,0,0);
	   
	   $this->load->library('form_validation');
	   
	   $this->form_validation->set_rules('category', 'Category', 'required');
	   $this->form_validation->set_rules('name', 'Name', 'required');
	   $this->form_validation->set_rules('featured', 'Featured', 'required');
	   
	   
	  
	   
		if ($this->form_validation->run() == TRUE)
		{
		   $insert['category']=$this->input->post('category');
		   $insert['medication']=$this->input->post('name');
		   $insert['featured']=$this->input->post('featured');
		   $insert['is_active']=$this->input->post('active');
		   
		   $insert['date']=date("Y-m-d");
			
		         $value=$this->_upload();
				 
				
				 if(!empty($value['image']))
				 {
				   $insert['image']=$value['image'];
				 }
				 else
				 {
				  $data['message']="Please upload file";					 
				 }
				 
			$did=$this->category_model->lastid('drug','drugsid');
			foreach($did as $dd)
			{ }
			
		
		   
		  
		    $ct=$this->category_model->insertquery($insert,'drug');
			
			 if(!empty($ct))
			 {
		     $this->listdrug();
		     }
		  
	   }
	  else
	  {        
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('drugadd',$data);
		   $this->load->view('footer',$data);
		  
	  }
	
	}
	
	

	function editdrug($id,$limit)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	 
	 
	       $data['drug']=$this->category_model->viewdrugs($id,0,0);
		
	   if($this->input->post('edit')=="Edit")
	   {
		 
		   $this->load->library('form_validation');
	   
		  // $this->form_validation->set_rules('category', 'Category', 'required');
		   $this->form_validation->set_rules('name', 'Name', 'required');
		   $this->form_validation->set_rules('featured', 'Featured', 'required');
		   
		   	
		   if ($this->form_validation->run() == TRUE)
		   {
			   
		       $insert['category']=$this->input->post('category');
			   $insert['medication']=$this->input->post('name');
			   $insert['featured']=$this->input->post('featured');
			   $insert['is_active']=$this->input->post('active');
			   
			   $insert['date']=date("Y-m-d");
			
		         $value=$this->_upload();
				 
				
				 if(!empty($value['image']))
				 {
				   $insert['image']=$value['image'];
				 }
				
				 
		   
		     $ct=$this->category_model->updatequery('drug',$id,'id',$insert);
			 
			
			 if(!empty($ct))
			 {
		     $this->listdrug($limit);
		     }
		  
	      }
	       else
	      {    
			 
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('editdrug',$data);
		   $this->load->view('footer',$data);
		  
	      }
		   
		   
	   }
		
		else
		{
		   $this->load->view('header',$data);
	       $this->load->view('menu',$data);		 
		   $this->load->view('editdrug',$data);
		   $this->load->view('footer',$data);
			
			
		}
	}
	
	
	
	
   /*------------- Items coding start -------------------*/	

	function additem()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	  
	    $this->load->helper('file');

	     $data['cat']=$this->category_model->viewcat();
		  $this->load->library('form_validation');
	   
		   $this->form_validation->set_rules('name', 'Name', 'required');
		   $this->form_validation->set_rules('description', 'Description', 'required');
		   $this->form_validation->set_rules('price', 'Price', 'required');
		   $this->form_validation->set_rules('weight', 'Weight', 'required');
		   $this->form_validation->set_rules('details', 'Details', 'required');
		   $this->form_validation->set_rules('ingredients', 'Ingredients', 'required');
		   $this->form_validation->set_rules('directions', 'Directions', 'required');
		   $this->form_validation->set_rules('warning', 'Warning', 'required');
		   $this->form_validation->set_rules('location', 'Location', 'required');
		   
		         $value=$this->_upload();
				
				 if(!empty($value['image']))
				 {
				   $insert['image1']=$value['image'];
				 }
				 else
				 {
				  $data['message']="Please upload file";					 
				 }
				 
				 if(!empty($value['image1']))
				 {
				 $insert['image2']=$value['image1'];
				 }
		   
		   if ($this->form_validation->run() == TRUE && !empty($insert['image1']))
		   {
	
				 $insert['name']=$this->input->post('name');
				 $insert['description']=$this->input->post('description');
				 $insert['price']=$this->input->post('price');
				 $insert['weight']=$this->input->post('weight');
				 $insert['details']=$this->input->post('details');
				 $insert['ingredients']=$this->input->post('ingredients');
				 $insert['directions']=$this->input->post('directions');
				 $insert['warning']=$this->input->post('warning');
				 $insert['location']=$this->input->post('location');
				 
				 
				 
				
				$ct=$this->category_model->addcat($insert);
				
			}	
		
		
	
		
	   
		
		
	 
	 
	   $this->load->view('header',$data);
	   $this->load->view('menu',$data);
	   $this->load->view('additem',$data);
	   $this->load->view('footer',$data);
	}





/*------------- Items coding end  -------------------*/	
	
	
	function _upload()
	{
		
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $name="";
	   
		
		$config['upload_path'] = './drugupload/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload('userfile'))
		{
			$error = $this->upload->display_errors();			
			$name['error'] = $error;
		}	
		else
		{
			$va = $this->upload->data();
			$name['image']=$va['file_name'];
			$name['error'] ="";			
		}
		
/*
		$config1['upload_path'] = './drugupload/';
		$config1['allowed_types'] = 'gif|jpg|png';
		$config1['max_size']	= '100';
		$config1['max_width']  = '1024';
		$config1['max_height']  = '768';
		
		
		$this->load->library('upload', $config1);
	
		if ( ! $this->upload->do_upload('userfile1'))
		{
			$error = $this->upload->display_errors();
			$name['error'] = $error;
			
		}	
		else
		{
			//$error = "";
			$va1 = $this->upload->data();
			$name['image1']=$va1['file_name'];
			
			
		}
*/
		
		
		
		return($name);
		
	}
	
	/*************************************Drug Details*******************************************/
	
	
	function adddrugdet()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	  
	   $data['drugname'] = $this->category_model->drug_name();
	   //print_r($data['drugname']);
	   $drug = $this->input->post('drugname');
	   $data['drugsname'] = $drugname = $this->category_model->retrive_drugname($drug);

	   $this->load->library('form_validation');
	   $this->form_validation->set_rules('drugname', 'Drugname', 'required');
	   $this->form_validation->set_rules('dosage', 'Dosage', 'required');
	   $this->form_validation->set_rules('price', 'Price', 'required');
	   $this->form_validation->set_rules('sideeffect', 'SideEffect', 'required');
	   $this->form_validation->set_rules('ingredients', 'Ingredients', 'required');
	   $this->form_validation->set_rules('precautions', 'Precaution', 'required');
	  // $this->form_validation->set_rules('userfile', 'Image', 'required');
	   $this->form_validation->set_rules('howtouse', 'Howtouse', 'required');
	    $value = $this->_upload();
		//print_r($value);
		
	    if($this->form_validation->run() == TRUE)
	    {

			 if(!empty($value['image']))
			{
				$insert['drugsid'] = $this->input->post('drugname');
				$insert['dosage'] = $this->input->post('dosage');
				$insert['image'] = $value['image'];
				 foreach($drugname as $drug_name)
				{
				$insert['drugname'] = $drug_name['medication'];
				}
				$insert['price'] = $this->input->post('price');
				$insert['sideffects'] = $this->input->post('sideeffect');
				$insert['ingredients'] = $this->input->post('ingredients');
				$insert['precaution'] = $this->input->post('precautions');
				$insert['howtouse'] = $this->input->post('howtouse');
				$this->category_model->drug_insert($insert);
				redirect($this->base."admin.php/category/list_drug_det",'refresh');
			}
			else
			{
				$data['error'] = $value['error'];
			}

		}
	   $this->load->view('header',$data);
	   $this->load->view('menu',$data);
	   $this->load->view('drug_details_add',$data);
	   $this->load->view('footer',$data);
	}
	function list_drug_det($start = 0)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$data['start']=$start;
		$total = $this->db->count_all('drugsdet');
		$config['base_url'] = $this->base."admin.php/category/list_drug_det";
		$config['total_rows'] = $total;
		$config['per_page'] =$per_page= 3;
		
		$data['drug_details'] = $this->category_model->list_drug($start,$per_page);
		$this->pagination->initialize($config);
		$data['page_links'] = $this->pagination->create_links();
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('list_drug_det',$data);
		$this->load->view('footer',$data);
	}
	function retrive_drug_details($id)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$this->load->helper('form');
		$this->load->helper('url');
		$data['drug_details'] = $this->category_model->edit_drug_details1($id);
		$data['id'] = $id;
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('edit_drug_details',$data);
		$this->load->view('footer',$data);
	}
	function edit_drug_details($id)	  
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		$this->load->helper('form');
		$this->load->helper('url');
		$data['id'] = $id;
		$data['drug_details'] = $this->category_model->edit_drug_details1($id);
		$this->load->library('form_validation');
		$this->form_validation->set_rules('dosage', 'Dosage', 'required');
		$this->form_validation->set_rules('price', 'Price', 'required');
		$this->form_validation->set_rules('sideeffect', 'SideEffect', 'required');
		$this->form_validation->set_rules('ingredients', 'Ingredients', 'required');
		$this->form_validation->set_rules('precautions', 'Precaution', 'required');
		$this->form_validation->set_rules('howtouse', 'Howtouse', 'required');
		$value = $this->_upload();
		
		if($this->form_validation->run() == TRUE)
	    {
			if(!empty($value['image']))
			{
				
			//$edited_value['drugsid'] =$id;
			$edited_value['dosage'] = $this->input->post('dosage');
			$edited_value['price'] = $this->input->post('price');
			$edited_value['sideffects'] = $this->input->post('sideeffect');
			$edited_value['ingredients'] = $this->input->post('ingredients');
			$edited_value['precaution'] = $this->input->post('precautions');
			$edited_value['howtouse'] = $this->input->post('howtouse');
			
			//print_r($edited_value);
			$this->category_model->update_row($id,$edited_value);
		}
		else
		{
			$data['error'] = $value['error'];
		}
		}
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('edit_drug_details',$data);
		$this->load->view('footer',$data);
	}
	function delete_drug_details($id)
	{
		$this->category_model->delete_drug($id);
		redirect($this->base.'admin.php/category/list_drug_det','refresh');
	}

}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
