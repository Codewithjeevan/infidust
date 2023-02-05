<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Makesitem extends CI_Controller {
	public function __construct() {
		parent::__construct();
		  $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
	
	
	} 
	
	
	public function makes($forbsid=NULL)
	{
	    	$wbdb = $this->load->database('wbdb', TRUE);
	   // unlink('sitemap.xml');
	   //$deleteImage =  getcwd() . 'sitemap.txt';
	   //unlink($deleteImage);
	
		$getsiteurl=$wbdb->get_where('business_sites', array('b_id' => 13))->row_array();
		$geturl=$wbdb->get_where('main_menu', array('business_id' => 13))->result_array();
		$blogid=$wbdb->get_where('main_menu', array('business_id' => 13,'menu' => "Blog",'page_type' => "blog"))->row_array();
		$blog_id = $blogid['m_id'];
		$blogurls =$wbdb->get_where('menu_contents', array('m_id' => $blog_id))->result_array();
		$nowdt = '2020-06-13';
		$myfile = fopen("sitemap.xml", "w");

		

		$txt = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
		$txt .= "\n";
		$txt .= "<url>";
		$txt .= "\n";
		$txt .= '<loc>'.$getsiteurl["site_url"].'</loc>
                <lastmod>'.$nowdt.'T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
        $txt .= "\n";
        $txt .= "</url>";
        $txt .= "\n";

         $txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>https://infidust.com/register?for=0</loc>
                <lastmod>2020-05-01T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";


         $txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>https://infidust.com/login</loc>
                <lastmod>2020-05-01T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";



         $txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>https://infidust.com/privacy-policy</loc>
                <lastmod>2020-05-01T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";



         $txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>https://infidust.com/terms</loc>
                <lastmod>2020-05-01T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";


         $txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>https://infidust.com/pricing</loc>
                <lastmod>2020-05-01T13:30:34+00:00</lastmod>
                <priority>1.00</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";


        foreach ($geturl as $geturl) {
        //	if($geturl['s_url']){
        		$mkurl = $getsiteurl["site_url"].'explore/'.$geturl['s_url'];
        //	}else{
        //	// 	$mkurl = $getsiteurl["site_url"].'Content/'.$geturl['menu'].'/'.$geturl['m_id'];
        //	}

        	$txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>'.$mkurl.'</loc>
	                <lastmod>'.$nowdt.'T13:30:34+00:00</lastmod>
	                <priority>0.90</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";
        }

        foreach ($blogurls as $blogurls) {
  			if($blogurls['s_url']){
        		$mkurl = $getsiteurl["site_url"].'Blogs/'.$blogurls['s_url'];
  			
        

        	$txt .= "<url>";
			$txt .= "\n";
			$txt .= '<loc>'.$mkurl.'</loc>
	                <lastmod>'.$nowdt.'T13:30:34+00:00</lastmod>
	                <priority>0.90</priority>';
	        $txt .= "\n";
	        $txt .= "</url>";
	        $txt .= "\n";
	     }
        }

       


        $txt .= "</urlset>";
    
		fwrite($myfile, $txt);
    	fclose($myfile);
	
		 echo $_GET['callback'] . '('.json_encode("ok").')';
	}
	
//////////
}