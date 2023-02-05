<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Content extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$wbdb = $this->load->database('wbdb', TRUE);
		$site_url = base_url();
		if (strpos($site_url, 'www.') !== false) {
          
           $search = 'www.';
           $site_url = str_replace($search, '', $site_url);
        }
        $cus_url = 'https://infidust.com/';
		$site_bs = $wbdb->get_where('business_sites', array('site_url' => $cus_url))->row_array();
		$ses_b = array('site_bus_id' => $site_bs['b_id']);
		//$this->session->sess_destroy();
		$this->session->set_userdata($ses_b);
	} 
	
	

	public function explorepage($m=NULL)
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		$business_id = $this->session->userdata('site_bus_id');
		$data=array();
		$data['canonical'] = $m;
		//$data['cover_pic']=$this->db->get_where('cover_pics', array('m_id' => $m_id))->row_array();
		$data['main_menu'] = $main_menu = $wbdb->get_where('main_menu', array('business_id' => $business_id,'s_url' => $m))->row_array();
		$m_id = $main_menu['m_id'];
		//$data['contents']=$this->db->get_where('menu_contents', array('m_id' => $m_id))->result_array();
		$data['contents'] = $wbdb->query("SELECT `menu_contents`.*
												FROM `menu_contents`
												WHERE
												`menu_contents`.`m_id` = $m_id
												ORDER BY
												`menu_contents`.`time_series`
											")->result_array();
		if($main_menu['page_type'] == 'portfolio'){
			$data['gallery']=$wbdb->get_where('gallery', array('m_id' => $m_id))->result_array();
			$this->render_view('galleryone', $data);
		}else{
		$this->render_view('content', $data);
	    }
	}


	public function contentpage($m=NULL, $m_id=NULL)
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		if($m_id == NULL){redirect('404_override');}
		$data=array();
		$data['canonical'] = 'Content/'.$m.'/'.$m_id;
		//$data['cover_pic']=$this->db->get_where('cover_pics', array('m_id' => $m_id))->row_array();
		$data['main_menu'] = $main_menu =  $wbdb->get_where('main_menu', array('m_id' => $m_id))->row_array();
		//$data['contents']=$this->db->get_where('menu_contents', array('m_id' => $m_id))->result_array();
		$data['contents'] = $wbdb->query("SELECT `menu_contents`.*
												FROM `menu_contents`
												WHERE
												`menu_contents`.`m_id` = $m_id
												ORDER BY
												`menu_contents`.`time_series`
											")->result_array();
		if($main_menu['page_type'] == 'portfolio'){
			$data['gallery']=$wbdb->get_where('gallery', array('m_id' => $m_id))->result_array();
			$this->render_view('galleryone', $data);
		}else{
		$this->render_view('content', $data);
	    }
	}


	public function test()
	{
		
		$data=array();

		//$data['cover_pic']=$this->db->get_where('cover_pics', array('m_id' => $m_id))->row_array();
		//$data['contents']=$this->db->get_where('menu_contents', array('m_id' => $m_id))->result_array();

		$this->render_view('content', $data);
	}




/////////
	private function sendMail($email_to, $msg, $visitorName, $visitorNo, $visitorMail){
		    $email_to = "$email_to";
			$email_from = "$visitorMail";
			$email_subject = "New Enquiry";
			$email_message = "$msg
			Customer Name: $visitorName.
			Contact: $visitorNo
			";
		$headers = 'From: '.$email_from."\r\n".
		'Reply-To: '.$email_from."\r\n" .
		'X-Mailer: PHP/' . phpversion();
		$rs =  mail($email_to, $email_subject, $email_message, $headers);  
		if( $rs ){ return true; } else { return false; }
	}

	private function configurees(){
		$wbdb = $this->load->database('wbdb', TRUE);
		$configsV=$wbdb->get_where('configurees', array('site_url' => 'https://skpsinghaniaschool.com/'))->result_array();//for local
		//$configsV=$this->db->get_where('configurees', array('site_url' => base_url()))->result_array();
	 	foreach ($configsV as $configV){
	 		$config[$configV['config_title']] = array(
									 			'is_block_active' => $configV['is_block_active'],
									 			'block_style' => $configV['block_style']
								 			);
	 	}
	 	return $config;
	}

	public function render_view($view, $data){
		$wbdb = $this->load->database('wbdb', TRUE);
		$business_id = $this->session->userdata('site_bus_id');
		
		$data['headers']=$wbdb->get_where('headers', array('business_id' => $business_id))->row_array();
		$data['main_menus'] = $wbdb->query("SELECT `main_menu`.*
												FROM `main_menu`
												WHERE
												`main_menu`.`business_id` = $business_id
												AND
												`main_menu`.`menu_type` = 'main'
												ORDER BY `main_menu`.`time_series`
											")->result_array();
		$data['isdomain']=$wbdb->get_where('business_sites', array('b_id' => $business_id))->row_array();
		$data['about']=$wbdb->get_where('about', array('business_id' => $business_id))->row_array();
		$data['block_one']=$wbdb->get_where('block_one', array('business_id' => $business_id))->row_array();
		$data['quick_links']=$wbdb->get_where('quick_links', array('business_id' => $business_id))->result_array();
		$data['contact']=$wbdb->get_where('contact', array('business_id' => $business_id))->row_array();

		$data['business_id']=$business_id;
		$data['web_type']="photography";
		//$data['assets_url']="http://localhost/raptweb/";
		 $data['assets_url']="https://www.raptweb.com/";
		
		
		// $this->load->view('includes/header', $data);
		$this->load->view('cssincludecontent', $data);
		// $this->load->view('includes/cssinclude', $data);
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footerinclude', $data);
	}
//////////
}