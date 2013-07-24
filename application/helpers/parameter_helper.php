<?php
function printarray($arr)
{
	print "<pre>";
	print_r($arr);
	print "</pre>";
}
function truncate($string, $start = 0,$length = 250 ,$append="...",$roundof=5){ 
if (strlen($string) < $length){
				return $string;
	}else{ 
				$around=$length-$roundof;
				$whitespaceposition = strpos($string," ",$around);
				$truncated = substr($string, 0, $whitespaceposition);
				$truncated.=$append;
				return $truncated;
		}
		return TRUE;
		}

function get_menu($base=""){
	
	//<!-- Top menu start here -->
	  return "<tr>
        <td height=\"27\" colspan=\"2\" align=\"left\" class=\"head\">&nbsp;</td>
      </tr>
      <tr>
       <td width=\"82\" height=\"29\" align=\"center\" valign=\"middle\" background=\"" . $base . "images/bg_img.jpg\" style=\"background-repeat:no-repeat;\"><a href=\"http://primemoveindia.com\">Primemove </a></td>
        <td width=\"921\">
        
        <!--[if lt IE 7]>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"/menu/includes/ie6.css\" media=\"screen\"/>
	<![endif]-->
          <ul id=\"MenuBar1\" class=\"MenuBarHorizontal\">
            <li>
              <div align=\"center\" class=\"style1\"><a href=\"" . $base . "index.php/home/show/home.html\">Home</a> </div>
            </li>
            <li>
              <div align=\"center\"><a href=\"" . $base . "index.php/home/view/thenifarms.html\" class=\"MenuBarItemSubmenu\">Theni Farms</a>
                  <ul>			    
									
                    <li><a href=\"" . $base . "index.php/home/view/location.html\">Location</a></li>
                    <li><a href=\"" . $base . "index.php/home/view/infrastructure.html\">Infrastructure</a></li>
                    <li><a href=\"" . $base . "index.php/home/view/farm.html\">Farm</a></li>
                    <li><a href=\"" . $base . "index.php/home/view/economics.html\">Economics </a>  </li>
                    <li><a href=\"" . $base . "index.php/home/view/tourism.html\">Tourism</a></li>
                     <li><a href=\"".$base . "index.php/home/view/ayurveda.html\">Ayurveda</a></li>  
                    <li><a href=\"" . $base . "index.php/home/view/management.html\">Management</a></li>
                  </ul>
              </div>
            </li>
            <li>
              <div align=\"center\"><a href=\"" . $base . "index.php/home/view/about.html\">About us</a> </div>
            </li>
            <li>
              <div align=\"center\"><a href=\"" . $base . "index.php/home/view/contact.html\">Contact </a></div>
            </li>
            <li>
              <div align=\"center\"><a href=\"" . $base . "index.php/home/view/gallery.html\">Gallery</a></div>
            </li>
            <li>
              <div align=\"center\"><a href=\"" . $base . "index.php/admin/login\">Sign In</a></div>
            </li>											
          </ul>
        <div align=\"left\"></div> 
         </td>
      </tr> ";
	  
	  	//<!-- Top menu End here -->
}

function dmytoymd($dmydate, $needle="/")
	{
		$darr = array();
		$darr = split($needle, $dmydate);
		if (count($darr) == 3)
			return date("Y-m-d", mktime(0,0,0,$darr[1],$darr[0],$darr[2]));
		else
			return "2009-01-01";
	}
	function pagination($url,$rows,$per_page)
	{
		$config['base_url'] =$url;		
		$config['total_rows'] =$rows;
		$config['per_page'] = $per_page;
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<span class="disabled_tnt_pagination">';
		$config['first_tag_close'] = '</span>';
		$config['last_link'] = 'Last';
		$config['num_links'] ='1';
		
		return($config);
		
		
		
	}

?>
