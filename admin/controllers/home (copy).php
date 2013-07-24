<?php
class Home extends CI_Controller{
   
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
	  
		
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('loginid', 'Login Id', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');
		
			
		if ($this->form_validation->run() == TRUE)
		{
			$loginid=$this->input->post('loginid');
			$password=md5($this->input->post('pass'));
			
		    $row = $this->admin_model->login($loginid,$password);
			
			if($row->num_rows()!=0)
			{
				$data['message']="";
				$this->load->view('home',$data);
			}
			else
			{
				
				$data['message']="Login Id/password is wrong";
				$this->load->view('login',$data);
			}
		
	    }
			
		
		else
		{
		
		$this->load->view('login',$data);
		
	    }
		
	}
	function drugadd()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
	
	     $data['cat']=$this->db->get('category');
	  
	     $this->load->library('form_validation');
			
		$this->form_validation->set_rules('drug', 'Drug', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		
			
		if ($this->form_validation->run() == TRUE)
		{
			
		  $insert['medication']=$this->input->post('drug');
	      $insert['category']=$this->input->post('category');
		  if($this->input->post('featured')=="1")
		  {
		   $insert['featured']="yes";
	      }
		  else
		  {
		   $insert['featured']="no";
		  }
		 
		    $insert['image']=$this->input->post('image');
		  
		  
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			
			
  
			$this->load->library('upload', $config);
            if (!$this->upload->do_upload())
		    {
			$error =  $this->upload->display_errors();
			
		    }	
			else
			{
				$updata = $this->upload->data();
								
				$up=$this->resize($updata['file_name']);
			
				if($up=="true")
			    {
				$insert['image']=$updata['file_name'];	
			    }
				else
				{
					$insert['image']="";
				}
			}
		      $row=$this->admin_model->drugadd($insert);
			 
			 
			  if(!empty($row))
			   {
			   $data['druglist'] = $this->db->get('drug');
			   
		       $this->load->view('viewdrug',$data);
		    
		       }
			 
			
		    
	    }
		else
		{
		
		
		
		$this->load->view('drugadd',$data);
		
	   }

	}
	function drugedit($id)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	   
	     $data['cat']=$this->db->get('category');	   
	     $this->load->library('form_validation');
			
		$this->form_validation->set_rules('drug', 'Drug', 'required');
		$this->form_validation->set_rules('category', 'Category', 'required');
		
		if ($this->form_validation->run() == TRUE)
		{
			
		  $insert['medication']=$this->input->post('drug');
	      $insert['category']=$this->input->post('category');
		  if($this->input->post('featured')=="1")
		  {
		  $insert['featured']="yes";
	      }
		  else
		  {
		  $insert['featured']="no";
		  }
		 
		  $insert['image']=$this->input->post('oldimage');
		  
		 
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			
			
  
			$this->load->library('upload', $config);
            if (!$this->upload->do_upload())
		    {
			$error =$this->upload->display_errors();
			
			
		    }	
			else
			{
				$updata = $this->upload->data();
							
				$up=$this->resize($updata['file_name']);
				if($up=="true")
				{
					$insert['image']=$updata['file_name'];	
				}		
			 }	
				
			
			
				
				
			
					
			 
					
		      $row=$this->admin_model->drugedit($insert,$id);
			 
			 
			  if(!empty($row))
			  {
			   $data['druglist'] = $this->db->get('drug');
			
			  
		       $this->drugs();
		      
		      }
			  
			 
		   
	    }

	    
	  else
	  { 
	    $data['row']=$this->admin_model->drugview($limit="",$per="",$id);
	
	
	     $this->load->view('drugsedit',$data);
	 }
		
	}
	function drugsdetedit($id)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   
	   $data['row']=$this->admin_model->drugdet($id,$act="1");
	   
	   $this->form_validation->set_rules('dosage', 'Dosage', 'required');
       $this->form_validation->set_rules('price', 'Price', 'required');
	   $this->form_validation->set_rules('drugname', 'Drug Name', 'required');
	   $this->form_validation->set_rules('side', 'Side Effects', 'required');
	   $this->form_validation->set_rules('ingredients', 'Ingredients', 'required');
	   $this->form_validation->set_rules('precaution', 'Precaution', 'required');
	   $this->form_validation->set_rules('howtouse', 'How To Use', 'required');
	  
	   
	    if ($this->form_validation->run() == FALSE)
		 {
	      $this->load->view('drugsdetedit',$data);
	     
	     }
		 else
		 {
			 $insert['dosage']=$this->input->post('dosage');
			 $insert['price']=$this->input->post('price');
			 $insert['drugname']=$this->input->post('drugname');
			 $insert['sideffects']=$this->input->post('side');
			 $insert['ingredients']=$this->input->post('ingredients');
			 $insert['precaution']=$this->input->post('precaution');
			 $insert['howtouse']=$this->input->post('howtouse');
			 
			 $insert['image']=$this->input->post('oldimage');
		  
		 
		    $config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			
			
  
			$this->load->library('upload', $config);
            if (!$this->upload->do_upload())
		    {
			$error =$this->upload->display_errors();
			
			
			
		    }	
			else
			{
				$updata = $this->upload->data();
							
				$up=$this->resize($updata['file_name']);
				if($up=="true")
				{
					$insert['image']=$updata['file_name'];	
				}	
				
			 }	
			 
			 $drugid=$this->input->post('id');
			 $data['row']=$this->admin_model->drugdetedit($insert,$id);
			 $this->drugdet($drugid);			 
		 }
		
	}
	function delete($id,$type="",$drugid="")
	{
		   $data['base'] = $this->base;
		   $data['css'] = $this->css;
		   $data['menu']="index";
		   
		   
		   $data['row']=$this->admin_model->delete($id,$type);
		   if($type=="drugsdet")
		   {
		   $this->drugdet($drugid);
	       }
		   else
		   {
			    $this->drugs();
			   
		   }
		
		
		
	}
	function adddrugdet($id)
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	   
	   
		     $data['id']=$id;
		     $insert['id']=$id;
	         $insert['dosage']=$this->input->post('dosage');
			 $insert['price']=$this->input->post('price');
			 $insert['drugname']=$this->input->post('drugname');
			 $insert['sideffects']=$this->input->post('side');
			 $insert['ingredients']=$this->input->post('ingredients');
			 $insert['precaution']=$this->input->post('precaution');
			 $insert['howtouse']=$this->input->post('howtouse');
			 $insert['image']=$this->input->post('image');
			 
			 if(!empty($insert['dosage']))
			 {
				 
				 
				 
				 
				 
				$config['upload_path'] = './uploads/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size'] = '100';
				$config['max_width'] = '1024';
				$config['max_height'] = '768';
				
				
	  
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload())
				{
				$error =  $this->upload->display_errors();
				print_r($error);
				
				}	
				else
				{
					$updata = $this->upload->data();
					
									
					$up=$this->resize($updata['file_name']);
					if($up=="true")
					{
					$insert['image']=$updata['file_name'];	
					}
					else
					{
						$insert['image']="";
					}
				}
				
				
			
			 $data['row']=$this->admin_model->adddrugdet($insert);
			 if(!empty($data['row']))
			 {
				$this->drugdet($id); 
			 }
		     }
			 else
			 {
		
		     $this->load->view('adddrugdet',$data);
		     }
		
	}
	function drugs($limit="0")
	{
		
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	   
	   $drug = $this->admin_model->drugview($limit1="0");
	   $total=$drug->num_rows;
	
		$this->load->library('pagination');

		$config['base_url'] = $data['base'].'admin.php/home/drugs';
		$config['total_rows'] =$total;
		$config['per_page'] = '10';
		
		$per=$config['per_page'];
           
		$this->pagination->initialize($config);
		
		$data['limit']=$limit;
		
		$data['drug'] =$this->admin_model->drugview($limit,$per);
		$data['det'] =$this->admin_model->view();

		$data['page']=$this->pagination->create_links();
	   
	
		$this->load->view('drugs',$data);
		
		
		
	}
	function drugdet($id)
	{
		$data['css']=$this->css;
	    $data['base']=$this->base;
		
		
		$data['id']=$id;
		
		$data['drug'] =$this->admin_model->drugdet($id);
		$this->load->view('drugsdet',$data);
		
		
		
	}
	function resize($fileName)
	{
	
	    $data['css']=$this->css;
	    $data['base']=$this->base;
		
        $config1['image_library'] = 'gd2';
        $config1['source_image'] = './uploads/'.$fileName;  
        $config1['new_image'] = './uploads/thumb/'.$fileName;     
        $config1['create_thumb'] = TRUE;
        $config1['maintain_ratio'] =TRUE;
		
		$config1['width'] =75;
        $config1['height'] =50;
		
			

                $this->load->library('image_lib', $config1);

                if(!$this->image_lib->resize()) 
				{
				 $this->image_lib->display_errors();
				 return("false");
				}
				else
				{
					return("true");
				}
				
	}
			
	/*********   Category *********/
	
	
	
	function category()
	{
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
			
		$data['cat'] =$this->admin_model->category();	
		$this->load->view('category',$data);			
	}	
	
	function addcat()
	{
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
		$this->form_validation->set_rules('category', 'Category', 'required');
			
		//$data['cat'] =$this->admin_model->category();	
		$this->load->view('addcat',$data);			
	}	
	
	function editcat()
	{
		
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
		
			
		$data['cat'] =$this->admin_model->category();	
		$this->load->view('editcat',$data);			
		
	}	
		
		
		
	function prescription()
	{
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
			
		$data['prescription'] =$this->admin_model->prescription();	
		
		$this->load->view('prescription',$data);			
	}	
	
	function predet()
	{
		
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
		
		$memberid=$this->input->post('memberid');
		$patientid=$this->input->post('patientid');
		
		$data['predet'] =$this->admin_model->predet($memberid,$patientid);	
		
		
		$this->load->view('predet',$data);			
	}
	function medicine()
	{
		$data['css']=$this->css;
	    $data['base']=$this->base;		
		
		
		$count=$this->input->post('count');
		
		for($i=1;$i<$count;$i++)
		{
			$p="pid".$i;
			$v="valid".$i;	
			$pid=$this->input->post($p);	
			$valid=$this->input->post($v);
			if($valid==1)
			{	
			$data['predet'] =$this->admin_model->presupdate($pid);	
		    }
		}
		
		//$this->load->view('prescription',$data);			
	}						  
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
