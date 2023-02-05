<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Register_model extends CI_Model{
    function __construct(){
        parent::__construct();
		//$this->load->database();
    }
    
    public function adding(){
        // grab user input
		$name = $this->security->xss_clean($this->input->post('name'));
        $contact = $this->security->xss_clean($this->input->post('contact'));
		$mail = $this->security->xss_clean($this->input->post('mail'));		
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
		$passconf = $this->security->xss_clean($this->input->post('passconf'));
        	
				
			// Prep the query
				$data = array(
							'name' => $name ,
							'contact' => $contact ,
							'mail' => $mail ,
							'username' => $username ,
							'password' => $password
							);
				
			// Run the query
			$rs = $this->db->insert('users', $data); 
			//echo $this->db->last_query();die;
			// Let's check if there are any results
			
			return (($rs == TRUE) ? TRUE : FALSE );
    }
}
?>