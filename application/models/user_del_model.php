<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class user_del_model extends CI_Model{
    function __construct(){
        parent::__construct();
		//$this->load->database();
    }
    
    public function deleting_row($uID)
	{
	    $rs = $this->db->where('uID', $uID);
		$rs = $this->db->delete('users');
		
		return (($rs == TRUE) ? TRUE : FALSE );
	}
}
?>