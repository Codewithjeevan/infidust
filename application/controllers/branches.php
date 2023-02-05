<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class Branches extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
             
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

    public function Branches(){
      $bs_id = $this->session->userdata('bs_id');
       // $data['totv'] = $totv = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
         $data['clientlist'] = $clientlist = $this->db->get_where("client_data", array("b_id" =>$bs_id, "filter" => 1 ))->result_array();
      
        $data['clientdata'] = $clientdata = $this->db->query("SELECT `f_branch`.`brn_id`,
                                            `f_branch`.`b_id`,
                                            `f_branch`.`cl_id`,
                                            `f_branch`.`br_area`,
                                            `f_branch`.`br_name`,
                                            `f_branch`.`br_address`,
                                            `f_branch`.`br_type`,

                                            `client_data`.`cl_id`,
                                            `client_data`.`cl_name`

                                          FROM `f_branch`
                                          INNER JOIN `client_data` ON `f_branch`.`cl_id` = `client_data`.`cl_id`
                                         WHERE
                                         `f_branch`.`b_id` = $bs_id
                                         
                                    ")->result_array();
        $this->load->view('branches', $data);
    }
      public function updatememsts()
    {
      $cl_id = $this->input->post('user_id');
      $is_active = $this->input->post('is_agreed');
      $upDataone = array(
              'is_active' => 1
            );
      $upDatazero = array(
              'is_active' => 0
            );
       if($is_active == '0') {
            $this->db->where('cl_id', $cl_id);
            $rs = $this->db->update('client_data', $upDataone);
            $this->db->where('cl_id', $cl_id);
            $rs = $this->db->update('admin', $upDataone);
          echo json_encode( array('status' => 200) );
       }else if($is_active == '1'){
        $this->db->where('cl_id', $cl_id);
        $rs = $this->db->update('client_data', $upDatazero);
        $this->db->where('cl_id', $cl_id);
        $rs = $this->db->update('admin', $upDatazero);
        echo json_encode( array('status' => 200) );
       }else{
        echo json_encode( array('status' => 203) );
       }
    }

    public function addnewbranche(){
      $bs_id = $this->session->userdata('bs_id');
      
      $newmem = array(
                'b_id' => $bs_id,
                'br_name' => $this->input->post('bname'),
                'cl_id' => $this->input->post('formem'),
                'br_area' => $this->input->post('area'),
                'br_address' => $this->input->post('bradd'),
                'br_type' => $this->input->post('brtype'),
                'tot_count' => 1,
                'last_date' => date('Y-m-d'),
                'created_at' => date('Y-m-d')
                );  
        $rs = $this->db->insert('f_branch',$newmem);
       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }
        
      
    } 
    public function updatebranche(){
      $bs_id = $this->session->userdata('bs_id');
      
      $newmem = array(
                'br_name' => $this->input->post('bname'),
                'cl_id' => $this->input->post('formem'),
                'br_area' => $this->input->post('area'),
                'br_address' => $this->input->post('bradd'),
                'br_type' => $this->input->post('brtype')
                );  
         $this->db->where('brn_id', $this->input->post('thisbrid'));
        $rs = $this->db->update('f_branch',$newmem);
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