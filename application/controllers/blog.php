<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Blog extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		$wbdb = $this->load->database('wbdb', TRUE);
		$site_url = base_url();
		if (strpos($site_url, 'www.') !== false) {
          
           $search = 'www.';
           $site_url = str_replace($search, '', $site_url);
        }
        $cus_url = 'https://infidust.com/';
        // $cus_url = 'http://localhost/infidust/';
		$site_bs = $wbdb->get_where('business_sites', array('site_url' => $cus_url))->row_array();
		$ses_b = array('site_bus_id' => $site_bs['b_id']);
		$this->session->set_userdata($ses_b);
	} 
	
	

	public function blog_details($m=NULL)
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		$business_id = $this->session->userdata('site_bus_id');
		$data=array();

		$data['canonical'] = 'Blogs/'.$m;
		$data['main_menu'] = $main_menu = $wbdb->get_where('main_menu', array('business_id' => $business_id,'page_type' => 'blog'))->row_array();
		$data['getbloid'] = $main_menu['m_id'];
		$m_id = $main_menu['m_id'];
		$data['b_thumb']=$b_thumb =$wbdb->get_where('menu_contents', array('m_id' => $m_id,'s_url' => $m))->row_array();
		$b_thumb_id = $b_thumb['content_id'];
		// $data['contents']=$this->db->get_where('menu_contents', array('m_id' => $m_id,'blog_cnt_for' => $b_thumb_id))->result_array();
		$data['contents'] = $contents = $wbdb->query("SELECT * FROM `menu_contents`
											WHERE `menu_contents`.`m_id` = '$m_id'
											AND `menu_contents`.`blog_cnt_for` = '$b_thumb_id'
											ORDER BY `menu_contents`.`time_series`")->result_array();

		$data['popblogs'] = $popblogs = $wbdb->query("SELECT * FROM `menu_contents`
											WHERE `menu_contents`.`m_id` = '$m_id'
											AND `menu_contents`.`data_type` = 'thumb'
											ORDER BY `menu_contents`.`content_id` DESC LIMIT 6")->result_array();

		 $data['blog_cat'] = $blog_cat = $wbdb->query("SELECT `tot_blog_cat`.`tot_b_c_id`,
                                                  `tot_blog_cat`.`blog_c_name`,

                                                  `blog_cat`.`pcat_id`,
                                                  `blog_cat`.`t_p_id`,
                                                  `blog_cat`.`b_id`,
                                                  `blog_cat`.`is_active`

                                               FROM `tot_blog_cat`
                                               INNER JOIN `blog_cat` ON `tot_blog_cat`.`tot_b_c_id` = `blog_cat`.`t_p_id`
                                               WHERE
                                               `blog_cat`.`b_id` = $business_id
                                               
                                          ")->result_array();

		 $data['cat_array'] = $cat_array = $b_thumb['in_categ'];
		 $data['array_cat']=$array_cat = explode(',', $cat_array);
         $data['first_one']=$first_one = $array_cat [0];
         
         if($cat_array){
         $wbdb->from('menu_contents');
          $wbdb->where('m_id', $m_id);
          $wbdb->where('data_type', 'thumb');
          $wbdb->where("find_in_set($first_one, in_categ)");
          $query = $wbdb->get();
          $data['get_related']=$get_related = $query->result_array();
		 }
		$this->render_view('blogs', $data);
	    
	}


	public function contentpage($m=NULL, $m_id=NULL)
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		if($m_id == NULL){redirect('404_override');}
		$data=array();

		//$data['cover_pic']=$this->db->get_where('cover_pics', array('m_id' => $m_id))->row_array();
		$data['main_menu'] = $main_menu = $wbdb->get_where('main_menu', array('m_id' => $m_id))->row_array();
		$data['contents']=$wbdb->get_where('menu_contents', array('m_id' => $m_id))->result_array();
		if($main_menu['page_type'] == 'portfolio'){
			$data['gallery']=$wbdb->get_where('gallery', array('m_id' => $m_id))->result_array();
			$this->render_view('galleryone', $data);
		}else{
		$this->render_view('content', $data);
	    }
	}

	public function blog_cate()
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		$business_id = $this->session->userdata('site_bus_id');
		$blogid = $wbdb->get_where('main_menu', array('business_id' => $business_id, 'page_type' => 'blog'))->row_array();
	      $data['getbloid'] = $getbloid = $blogid['m_id'];
	      $rowperpage = 3;
		$data['blog_cat'] = $blog_cat = $wbdb->query("SELECT `tot_blog_cat`.`tot_b_c_id`,
                                                  `tot_blog_cat`.`blog_c_name`,

                                                  `blog_cat`.`pcat_id`,
                                                  `blog_cat`.`t_p_id`,
                                                  `blog_cat`.`b_id`,
                                                  `blog_cat`.`is_active`

                                               FROM `tot_blog_cat`
                                               INNER JOIN `blog_cat` ON `tot_blog_cat`.`tot_b_c_id` = `blog_cat`.`t_p_id`
                                               WHERE
                                               `blog_cat`.`b_id` = $business_id
                                               
                                          ")->result_array();
		 $data['allblogs'] = $allblogs = $wbdb->query("SELECT * FROM `menu_contents`
											WHERE `menu_contents`.`m_id` = '$getbloid'
											AND `menu_contents`.`data_type` = 'thumb'
											ORDER BY `menu_contents`.`content_id` DESC LIMIT 0,$rowperpage")->result_array();

		 $wbdb->from('menu_contents');
          $wbdb->where('m_id', $getbloid);
          $wbdb->where('data_type', 'thumb');
          // $this->db->where("find_in_set($mycatid, in_categ)");
          $query = $wbdb->get();
          $data['tot_blogs'] = $tot_blogs = $query->num_rows();

		$this->render_view('category', $data);
	}

	public function getdata()
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		$business_id = $this->session->userdata('site_bus_id');
		$blogid = $wbdb->get_where('main_menu', array('business_id' => $business_id, 'page_type' => 'blog'))->row_array();
	      $data['getbloid'] = $getbloid = $blogid['m_id'];

		$row = $_POST['row'];
		$rowperpage = 3;

		// selecting posts
		 $data['allblogs'] = $allblogs = $wbdb->query("SELECT * FROM `menu_contents`
											WHERE `menu_contents`.`m_id` = '$getbloid'
											AND `menu_contents`.`data_type` = 'thumb'
											ORDER BY `menu_contents`.`content_id` DESC LIMIT $row,$rowperpage")->result_array();

		$html = '';
		$assets_url="http://localhost/raptweb/";
		// $assets_url="https://www.raptweb.com/";
		 foreach ($allblogs as $allblogs) {
		 	$cnt_id = $allblogs['content_id'];
		 	$blgurl = base_url().'Blogs/'.$allblogs["s_url"];
		 	$img_url = $assets_url.'assets-public/blogsx/'.$allblogs['file'];
		 	$blg_title = $allblogs['blg_title'];
		 	$blg_details = substr($allblogs['blg_details'], 0, 80)."..." ;
		 	$writ_by = $allblogs['writ_by'];
		 	$writ_date = date('F d Y',strtotime($allblogs['created_at']));

		 	$html .= '<div id="postall_'.$cnt_id.'" class="postall col-md-4 pad-2 blogblk-height" style="position:relative; background:;">';
		 	$html .= '<div class="cus-sm-blk loop-bk-color" align="center">';
		 	$html .= '<a href="'.$blgurl.'">';
		 	$html .= '<img src="'.$img_url.'">';
		 	$html .= '</a>';
		 	$html .= '</div>';
		 	$html .= '<div align="center" class="pagelink-hilight" style="padding-top:20px;">';
		 	$html .= '</div>';

		 	$html .= '<a href="'.$blgurl.'">';
		 	$html .= '<div align="center" class="cus-heading3 text-limit">';
		 	$html .= '<h2>'.$blg_title.'</h2>';
		 	$html .= '<p>'.$blg_details.'</p>';
		 	$html .= '</div>';
		 	$html .= '</a>';

		 	$html .= '<div class="ab-mid-blk">';
		 	$html .= 'by <span>'.$writ_by.'</span> - '.$writ_date;
		 	$html .= '<div class="coloruline"></div>';
		 	$html .= '</div>';
		 	$html .= '</div>';
		 }
		 echo $html;
	}
	public function test()
	{
		$wbdb = $this->load->database('wbdb', TRUE);
		
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
		$data['home_gallery_t']=$wbdb->get_where('home_gallery', array('business_id' => $business_id, 'type' => 'title'))->row_array();
		$data['home_gallery_l']=$wbdb->get_where('home_gallery', array('business_id' => $business_id, 'type' => 'data'))->result_array();
		$data['blog_seo_tgs'] = $wbdb->get_where('main_menu', array('business_id' => $business_id, 'page_type' => 'blog'))->row_array();
		
		$data['business_id']=$business_id;
		$data['web_type']="photography";
		//$data['assets_url']="http://localhost/raptweb/";
		 $data['assets_url']="https://www.raptweb.com/";
		
		
		// $this->load->view('includes/header', $data);
		$this->load->view('cssincludeblog', $data);
		// $this->load->view('includes/cssinclude', $data);
		$this->load->view('header', $data);
		$this->load->view($view, $data);
		$this->load->view('footerinclude', $data);
	}
//////////
}