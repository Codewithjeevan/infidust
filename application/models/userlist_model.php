<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class userlist_model extends CI_Model{
    function __construct(){
        parent::__construct();
		//$this->load->database();
    }
    
    public function Show_all_users()
	{
	   return $this->db->get('users')->result();
	}
	
	public function Show_got_users($sq)
	{
		$this->db->like('name', $sq); 
		$this->db->or_like('contact', $sq);
		
	    return $this->db->get('users')->result();
	}
}
?>