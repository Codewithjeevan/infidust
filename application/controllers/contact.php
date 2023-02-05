<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class Contact extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
             
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

    public function index(){
    
        $this->load->view('contact');
    }
    public function about(){
    
        $this->load->view('about');
    }
    public function pricing(){
    
        $this->load->view('pricing');
    }
    public function whyinfidust(){
    
        $this->load->view('whyinfidust');
    }
    public function solution(){
    
        $this->load->view('solution');
    }
    public function pr_pv(){
    
        $this->load->view('pr_pv');
    }
    public function tnc(){
    
        $this->load->view('tnc');
    }
    public function restaurantkeyword($keywords){
    $data['keydata'] = $keydata = $this->db->get_where("restaurant_seo", array("key_url" =>$keywords))->row_array();

        $this->load->view('restaturantpage', $data);
    }
   
   

     public function addnewkey()
    {
     
      $upData = array(
              'key_name' => $this->input->post("keywd"),
              'key_url' => $this->input->post("pageurl")
            );
      
          $rs = $this->db->insert('restaurant_seo',$upData);
       if(!$rs){
        
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }
    }
    
public function addnewdata()
{     
 $fname= $this->input->post("fname");
 $lname= $this->input->post("lname");
 $email= $this->input->post("email");
 $contact= $this->input->post("contact");
 $requeri= $this->input->post("requeri");
   $newdata = array(
                          'fname' => $this->input->post("fname"),
                          'lname' => $this->input->post("lname"),
                          'email' => $this->input->post("email"),
                          'contact' => $this->input->post("contact"),
                          'requeri' => $this->input->post("requeri"),
                          'created_at' => date('Y-m-d')
                          );  
               
                $rs = $this->db->insert('site_contact',$newdata);

                $msg = "new enquiry form: <br><br> name - ".$fname." ".$lname."<br> email - ".$email."<br> contact - ".$contact."<br> enquiry- ".$requeri."";
                
                   ini_set( 'display_errors', 1 );
                      error_reporting( E_ALL );
                      $from = 'infidust@kamprik.com';
                      $to = 'kamprikmail@gmail.com';;
                      $subject =  'infidust site Enquiry';
                     
                     // $message = $mailbody;
                       // $message = "<b>This is HTML message.</b>";
                         $message = $msg;
                      // $headers = "From:" . $from;
                       $headers = "MIME-Version: 1.0\r\n";
                      $headers .= "Content-type: text/html\r\n";
                      $headers .= "From: "."Infidust Enquiry"." ";
                      $headers .= $from;
                      mail($to,$subject,$message, $headers);

                if(!$rs){
                  echo json_encode( array('status' => 203) );
                 }else{
                  echo json_encode( array('status' => 200) );
                 }
}

//////////////////////////////////////////
    private function is_validated(){
        if($this->session->userdata('validated')){return TRUE;}else{return FALSE;}        
    }
    
  
    

//////////////////////////////////////////
    
}

?>