<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class user_edit_model extends CI_Model{
    function __construct(){
        parent::__construct();
		//$this->load->database();
    }
    
    public function fetch_row($uID)
	{
		//$this->db->where('uID', $uID);
	   //return $this->db->get('users')->result();
	   return $this->db->get_where('users', array('uID' => $uID))->result();
	}
	
	public function updating($uID)
	{
		// grab user input
		$name = $this->security->xss_clean($this->input->post('name'));
        $contact = $this->security->xss_clean($this->input->post('contact'));
		$mail = $this->security->xss_clean($this->input->post('mail'));		
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
		$passconf = $this->security->xss_clean($this->input->post('passconf'));
        	
		
		$data = array(
				'name' => $name ,
				'contact' => $contact ,
				'mail' => $mail ,
				'username' => $username ,
				'password' => $password
				);
		$rs = $this->db->where('uID', $uID);
		$rs = $this->db->update('users', $data); 
		
		return (($rs == TRUE) ? TRUE : FALSE );
	}
	
}
?>