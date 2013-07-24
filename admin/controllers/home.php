<?php
class Home extends CI_Controller {
   
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
		//$this->load->helper('file');
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error_msg">', '</div>');
		$this->load->helper('parameter_helper');
	
	}
	
	function index()
	{
		if($this->session->userdata('loginid')==FALSE) 
		{	
			redirect('/home/login','refresh');
		}
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	  
		
			$this->load->view('login',$data);
		
	}
	function login()
	{
	   $data['base'] = $this->base;
	   $data['css'] = $this->css;
	   $data['menu']="index";
	   
		$this->load->library('form_validation');
			
		$this->form_validation->set_rules('username', 'Login Id', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		
		if ($this->form_validation->run() == TRUE)
		{
			$loginid=$this->input->post('username');
			$password=md5($this->input->post('password'));
			
			
			
			
		    $row= $this->admin_model->login($loginid,$password);
						
			if($row->num_rows()!=0)
			{
				$data['message']="";
				$rows=$row->row();
				$this->session->set_userdata('loginid',$rows->loginid);
				$this->load->view('header',$data);
				$this->load->view('dashboard',$data);
				$this->load->view('menu',$data);
				$this->load->view('footer',$data);
			}
			else
			{
				
				$data['message']="Login Id/password is wrong";
				
				$this->load->view('login',$data);
				
			}
		
	    }
			
		
		else
		{
		
		        $data['message']="Login Id/password is wrong";
				$this->load->view('login',$data);
				
		
	    }
		
		
		
		
		
		
		
	}
	
	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		$this->session->unset_userdata('loginid');
		$this->login();
	}
	
	function changepassword()
	{
		if($this->session->userdata('loginid')==FALSE) 
		{	
			redirect('/home/login','refresh');
		}
		$data['base'] = $this->base;
	    $data['css'] = $this->css;
	    $data['menu']="index";
		
		
		       
			    $data['row'] = $this->admin_model->logininfo();
				
				if($this->input->post('submit')!="")
				{
					
					$this->load->library('form_validation');
					$this->form_validation->set_rules('newpwd', 'Password', 'required|matches[cfmpwd]');
                    $this->form_validation->set_rules('cfmpwd', 'Password Confirmation', 'required');

					if ($this->form_validation->run() == TRUE)
					{
						$userid=$this->input->post('userid');
						$pwd=md5($this->input->post('newpwd'));
						$rs= $this->admin_model->loginedit($userid,$pwd);
						print_r($rs);
						
					}
					else
					{
						
					}
					
					
				}
			   
				 
			    $this->load->view('header',$data);				
				$this->load->view('menu',$data);
				$this->load->view('changepassword',$data);
				$this->load->view('footer',$data);
		
	}
	function feedback()
	{
		if($this->session->userdata('loginid')==FALSE) 
		{	
			redirect('/home/login','refresh');
		}
		$data['base'] = $this->base;
	    $data['css'] = $this->css;
		
		$data['row'] = $this->admin_model->feedback();
		
		
		
		        $this->load->view('header',$data);				
				$this->load->view('menu',$data);
				$this->load->view('listfeedback',$data);
				$this->load->view('footer',$data);
	}
	function valid($id)
	{
		if($this->session->userdata('loginid')==FALSE) 
		{	
			redirect('/home/login','refresh');
		}
		$data['base'] = $this->base;
	    $data['css'] = $this->css;
		
		$data['row'] = $this->admin_model->feedback($id);
		
		if($this->input->post('valid')==1)
		{
			
			$rs = $this->admin_model->valid($id);
		}
		
		else
		{
				
			
		}
		        $this->load->view('header',$data);				
				$this->load->view('menu',$data);
				$this->load->view('feedback',$data);
				$this->load->view('footer',$data);
	}
	
	function listpharmacy($limit=0,$del=0)
	{
		$data['base'] = $this->base;
		$data['css'] = $this->css;
		
	        $data['message']="";   
			$rows=$this->db->count_all('pharmacy');		
			$url=$this->base."admin.php/home/listpharmacy";		
			$config=pagination($url,$rows,$per_page="25");
			$this->pagination->initialize($config);
			$data['page']=$this->pagination->create_links();		
		
			$data['pharmacy']=$this->admin_model->viewpharmacy($limit,$per_page="25");				
			$data['limit']=$limit;
			
			if(!empty($del))
			{
				$where['id']=intval($del);
				$this->db->where($where);
				$data['del_id']=$this->db->delete('pharmacy'); 
				redirect('/home/listpharmacy/'.$limit,'refresh');
			}
				
		$this->load->view('header',$data);
		$this->load->view('menu',$data);
		$this->load->view('listpharmacy',$data);
		$this->load->view('footer',$data);
	}
	
	function add_pharmacy()
	{
		$data['base']=$this->base;
		$data['css']=$this->css;
		
		$this->load->library('form_validation');
			$this->form_validation->set_rules('phno','Pharmacy No','required');
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('email', 'Email-Id', 'required|valid_email');
			$this->form_validation->set_rules('phonenumber1','Phone Number','trim|min_length[6]|max_length[18]|numeric');
			$this->form_validation->set_rules('phonenumber2','Phone Number','trim|min_length[6]|max_length[18]|numeric');
			$this->form_validation->set_rules('phonenumber3','Phone Number','trim|min_length[6]|max_length[18]|numeric');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('latitude','Latitude','required');
			$this->form_validation->set_rules('longitude','Longitude','required');
			
			if($this->input->post('submit')!="")
			{
				if($this->form_validation->run() ==	TRUE)
				{	
					$insert['pharmacyNo']=trim($this->input->post('phno'));
					$insert['pharmacy']=trim($this->input->post('name'));
					$insert['address']=trim($this->input->post('address'));
					if($this->input->post('phonenumber1')!="")
					{
						$seperator1=" , ";
					}
					else
					{
						$seperator1="";
					}
					if($this->input->post('phonenumber2')!="")
					{
						$seperator2=" , ";
					}
					else
					{
						$seperator2="";
					}
					$insert['phone']=trim($this->input->post('phonenumber1')).$seperator1.trim($this->input->post('phonenumber2')).$seperator2.trim($this->input->post('phonenumber3'));
					$insert['email']=trim($this->input->post('email'));
					$insert['city']=trim($this->input->post('city'));
					$insert['state']=trim($this->input->post('state'));
					$insert['latitude']=trim($this->input->post('latitude'));
					$insert['longitude']=trim($this->input->post('longitude'));
					//print_r($insert);
					
						$data['pharmacy']=$this->admin_model->insert_fun('pharmacy', $insert); 
						redirect('/home/listpharmacy','refresh');
						
				}		
			}			
				
		$this->load->view('header',$data);				
		$this->load->view('menu',$data);
		$this->load->view('add_pharmacy',$data);
		$this->load->view('footer',$data);
	}	
	
	function edit_pharmacy($editid=0)
	{
		$data['base']=$this->base;
		$data['css']=$this->css;
		
		$this->load->library('form_validation');
		
			$this->form_validation->set_rules('name','Name','required');
			$this->form_validation->set_rules('address','Address','required');
			$this->form_validation->set_rules('email', 'Email-Id', 'required|valid_email');
			$this->form_validation->set_rules('phonenumber','Phone Number','required|min_length[6]|max_length[18]|numeric');
			$this->form_validation->set_rules('city','City','required');
			$this->form_validation->set_rules('state','State','required');
			$this->form_validation->set_rules('latitude','Latitude','required');
			$this->form_validation->set_rules('longitude','Longitude','required');
			
			if($this->input->post('update')=="Update")
			{
				if($this->form_validation->run() ==	TRUE)
				{	
					$insert['id']=trim($this->input->post('editid'));
					$insert['pharmacy']=trim($this->input->post('name'));
					$insert['address']=trim($this->input->post('address'));
					$insert['phone']=trim($this->input->post('phonenumber'));
					$insert['email']=trim($this->input->post('email'));
					$insert['city']=trim($this->input->post('city'));
					$insert['state']=trim($this->input->post('state'));
					$insert['latitude']=trim($this->input->post('latitude'));
					$insert['longitude']=trim($this->input->post('longitude'));
					//print_r($insert);
					
						$where['id']=intval($insert['id']);
						$this->db->where($where); 
						$data['phid']=$this->db->update('pharmacy',$insert);
						redirect('/home/listpharmacy/','refresh');
						
				}		
			}
			if(!empty($editid))
			{
				$where['id']=intval($editid);
				$data['listphar']=$this->admin_model->selectrow('pharmacy',$where['id'],'id');
				//print_r($data['listphar']);
			}
			
				
		$this->load->view('header',$data);				
		$this->load->view('menu',$data);
		$this->load->view('editpharmacy',$data);
		$this->load->view('footer',$data);
	}	  
	function fileoperation()
	{
		$data['base']=$this->base;
		$data['css']=$this->css;
		
			$this->load->library('form_validation');
				$this->form_validation->set_rules('name','Table Name','required');
				if($this->input->post('submit')!="")
				{
					if($this->form_validation->run() ==	TRUE)
					{
						$fname = $_FILES['userfile']['name'];
						$chk_ext = explode(".",$fname);
						if((strtolower($chk_ext[1]) == "csv") || (strtolower($chk_ext[1]) == "txt"))
						{
							$fpath='./files/'.$fname;
							if (($handle = fopen($fpath, "r")) !== FALSE) 
							{
								$linecount = count(file($fpath));
								if($chk_ext[0]=='CORE_ACTIVE_INGRED')
								{
									$data['tab']=$this->admin_model->file_tab1($chk_ext[0]);
									if($data['tab']!="") 
									{				//

										$id="";
										foreach($data['tab']->result() as $table)
										{
											if($id!="")
											{
												$id.=",";
											}
											$id.=$table->id;
										}
										$active_ingred_id=(explode(",",$id));
										$i=1;
											
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{			//	print_r($data1);
											$ins['ACTIVE_INGRED_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[3]);				
											if(in_array(strip_tags($data1[0]),$active_ingred_id))
											{
												$where['ACTIVE_INGRED_ID']=intval(strip_tags($data1[0]));
												$this->db->where($where); 
												$upid=$this->db->update($chk_ext[0],$ins);
											}
											else
											{
												$ins['ACTIVE_INGRED_ID']=strip_tags($data1[0]);	
												$insid=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											}
											$i++;
										}
									}
									else
									{
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{
											$ins['ACTIVE_INGRED_ID']=@strip_tags($data1[0]);
											$ins['ACTIVE_INGRED_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[3]);		
											//print_r($ins);		
											//$data['insid']=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											$i++;	
										}
									}	
								}
								
								if($chk_ext[0]=='CORE_CLINICAL_ROUTE')
								{
									$data['tab']=$this->admin_model->file_tab2($chk_ext[0]);
									if($data['tab']->row_data!="") 
									{
										$id="";
										foreach($data['tab']->result() as $table)
										{
											if($id!="")
											{
												$id.=",";
											}
											$id.=$table->id;
										}
										$core_clinical_route_id=(explode(",",$id));
										$i=1;
										
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{						
											$ins['CLINICAL_ROUTE_DESCRIPTION']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[3]);				
											if(in_array(strip_tags($data1[0]),$core_clinical_route_id))
											{
												$where['CLINICAL_ROUTE_ID']=intval(strip_tags($data1[0]));
												$this->db->where($where); 
												$upid=$this->db->update($chk_ext[0],$ins);
											}
											else
											{
												$ins['CLINICAL_ROUTE_ID']=strip_tags($data1[0]);	
												$insid=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											}
											$i++;
										}
									}
									else
									{
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{
											$ins['CLINICAL_ROUTE_ID']=@strip_tags($data1[0]);
											$ins['CLINICAL_ROUTE_DESCRIPTION']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[3]);					
											$data['insid']=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											$i++;	
										}
									}	
								}
								if($chk_ext[0]=='CORE_GENDRUG')
								{
									$data['tab']=$this->admin_model->file_tab3($chk_ext[0]);
									if($data['tab']!="") 
									{
										$id="";
										foreach($data['tab']->result() as $table)
										{
											if($id!="")
											{
												$id.=",";
											}
											$id.=$table->id;
										}
										$core_clinical_route_id=(explode(",",$id));
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{							
											$ins['GENERIC_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['MANUFACTURER_GENERIC_NAME']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['PREGNANCY_RISK_FACTOR']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['HALF_LIFE_HOURS']=@mysql_real_escape_string(strip_tags($data1[4]));				
											$ins['HALF_LIFE_IS_EMPIRICAL']=@mysql_real_escape_string(strip_tags($data1[5]));				
											$ins['IS_INGREDIENT']=@mysql_real_escape_string(strip_tags($data1[6]));				
											$ins['IS_PRODUCT']=@mysql_real_escape_string(strip_tags($data1[7]));				
											$ins['RX_OTC_STATUS_CODE']=@mysql_real_escape_string(strip_tags($data1[8]));				
											$ins['IS_ACTIVE']=@mysql_real_escape_string(strip_tags($data1[9]));				
											$ins['OBSOLETE_DATE']=@mysql_real_escape_string(strip_tags($data1[10]));			
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[11]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[12]);	
											
											if(in_array(strip_tags($data1[0]),$core_clinical_route_id))
											{
												$where['DRUG_ID']=intval(strip_tags($data1[0]));
												$this->db->where($where); 
												$upid=$this->db->update($chk_ext[0],$ins);
											}
											else
											{
												$ins['DRUG_ID']=strip_tags($data1[0]);	
												$insid=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											}
											$i++;
										}
									}
									else
									{
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{
											$ins['DRUG_ID']=@strip_tags($data[0]);
											$ins['GENERIC_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['MANUFACTURER_GENERIC_NAME']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['PREGNANCY_RISK_FACTOR']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['HALF_LIFE_HOURS']=@mysql_real_escape_string(strip_tags($data1[4]));				
											$ins['HALF_LIFE_IS_EMPIRICAL']=@mysql_real_escape_string(strip_tags($data1[5]));				
											$ins['IS_INGREDIENT']=@mysql_real_escape_string(strip_tags($data1[6]));				
											$ins['IS_PRODUCT']=@mysql_real_escape_string(strip_tags($data1[7]));				
											$ins['RX_OTC_STATUS_CODE']=@mysql_real_escape_string(strip_tags($data1[8]));				
											$ins['IS_ACTIVE']=@mysql_real_escape_string(strip_tags($data1[9]));				
											$ins['OBSOLETE_DATE']=@mysql_real_escape_string(strip_tags($data1[10]));			
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[11]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[12]);	
											$i++;	
										}
									}	
								}
								if($chk_ext[0]=='CORE_GENPRODUCT')
								{
									$data['tab']=$this->admin_model->file_tab4($chk_ext[0]);
									if($data['tab']!="") 
									{
										$id="";
										foreach($data['tab']->result() as $table)
										{
											if($id!="")
											{
												$id.=",";
											}
											$id.=$table->id;
										}
										$drugid=(explode(",",$id));
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{		
											$ins['GENERIC_PRODUCT_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['MANUFACT_GENERIC_PRODUCT_NAME']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['DRUG_ID']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['ROUTE_ID']=@mysql_real_escape_string(strip_tags($data1[4]));				
											$ins['DOSEFORM_ID']=@mysql_real_escape_string(strip_tags($data1[5]));				
											$ins['STRENGTH_ID']=@mysql_real_escape_string(strip_tags($data1[6]));				
											$ins['CSA_CODE']=@mysql_real_escape_string(strip_tags($data1[7]));				
											$ins['RX_OTC_STATUS']=@mysql_real_escape_string(strip_tags($data1[8]));				
											$ins['IS_ACTIVE']=@mysql_real_escape_string(strip_tags($data1[9]));				
											$ins['OBSOLETE_DATE']=@mysql_real_escape_string(strip_tags($data1[10]));			
											$ins['JCODE']=@mysql_real_escape_string(strip_tags($data1[11]));			
											$ins['JCODE_DESCRIPTION']=@mysql_real_escape_string(strip_tags($data1[12]));			
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[13]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[14]);		
											if(in_array(strip_tags($data1[0]),$drugid))
											{
												$where['GENPRODUCT_ID']=intval(strip_tags($data1[0]));
												$this->db->where($where); 
												$upid=$this->db->update($chk_ext[0],$ins);
											}
											else
											{
												$ins['GENPRODUCT_ID']=strip_tags($data1[0]);	
												$insid=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											}
											$i++;
										}
									}
									else
									{
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ","))  
										{
											$ins['GENPRODUCT_ID']=@strip_tags($data1[0]);
											$ins['GENERIC_PRODUCT_NAME']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['MANUFACT_GENERIC_PRODUCT_NAME']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['DRUG_ID']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['ROUTE_ID']=@mysql_real_escape_string(strip_tags($data1[4]));				
											$ins['DOSEFORM_ID']=@mysql_real_escape_string(strip_tags($data1[5]));				
											$ins['STRENGTH_ID']=@mysql_real_escape_string(strip_tags($data1[6]));				
											$ins['CSA_CODE']=@mysql_real_escape_string(strip_tags($data1[7]));				
											$ins['RX_OTC_STATUS']=@mysql_real_escape_string(strip_tags($data1[8]));				
											$ins['IS_ACTIVE']=@mysql_real_escape_string(strip_tags($data1[9]));				
											$ins['OBSOLETE_DATE']=@mysql_real_escape_string(strip_tags($data1[10]));			
											$ins['JCODE']=@mysql_real_escape_string(strip_tags($data1[11]));			
											$ins['JCODE_DESCRIPTION']=@mysql_real_escape_string(strip_tags($data1[12]));			
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[13]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[14]);				
					
											$data['insid']=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											$i++;	
										}
									}	
								}
								if($chk_ext[0]=='CORE_GENPRODUCT_INGREDIENT')
								{
									$data['tab']=$this->admin_model->file_tab4($chk_ext[0]);
									if($data['tab']!="") 
									{
										$id="";
										foreach($data['tab']->result() as $table)
										{
											if($id!="")
											{
												$id.=",";
											}
											$id.=$table->id;
										}
										$genprod_id=(explode(",",$id));
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{											
											$ins['ACTIVE_INGRED_ID']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['INGRED_STRENGTH_ID']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[4]);				
											if(in_array(strip_tags($data1[0]),$genprod_id))
											{
												$where['GENPRODUCT_ID']=intval(strip_tags($data1[0]));
												$this->db->where($where); 
												$upid=$this->db->update($chk_ext[0],$ins);
											}
											else
											{
												$ins['GENPRODUCT_ID']=strip_tags($data1[0]);	
												$insid=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											}
											$i++;
										}
									}
									else
									{
										$i=1;
										while ($data1=fgetcsv($handle, 1000, ",")) 
										{
											$ins['GENPRODUCT_ID']=@strip_tags($data[0]);
											$ins['ACTIVE_INGRED_ID']=@mysql_real_escape_string(strip_tags($data1[1]));				
											$ins['INGRED_STRENGTH_ID']=@mysql_real_escape_string(strip_tags($data1[2]));				
											$ins['CREATE_DATE']=@mysql_real_escape_string(strip_tags($data1[3]));				
											$ins['UPDATE_DATE']=@strip_tags($data1[4]);									
											$data['insid']=$this->admin_model->insert_fun($chk_ext[0], $ins); 
											$i++;	
										}
									}	
								}
							}
						}
						$table_name=trim($this->input->post('name'));
					}
				}
		
		$this->load->view('header',$data);				
		$this->load->view('menu',$data);
		$this->load->view('fileoperation',$data);
		$this->load->view('footer',$data);
	}
}
/* End of file home.php */
/* Location: ./system/application/controllers/home.*/
