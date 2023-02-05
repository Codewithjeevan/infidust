<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class checkip extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

   

  public function ipcheck(){
    $newip = $this->input->post('ip');
    $forpage = $this->input->post('forpage');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $contry = $this->input->post('contry');
    if(strlen($newip)>20){
        $device = 'm';
    }else{
        $device = 'd';
    }
        $data['checkip'] = $checkip = $this->db->get_where("tot_get_ip", array("ip" =>$newip, "for_page"=>$forpage))->row_array();
        if($checkip == NULL){    
            $upData = array(
                            'ip' => $newip,
                            'for_page' => $forpage,
                            'created_at' => date('Y-m-d H:i:s'),
                            'device' => $device,
                            'city' => $city,
                            'state' => $state,
                            'contry' => $contry
                        );
            $this->db->insert('tot_get_ip',$upData);
            $data['tot_ip'] = $tot_ip = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
            $oldcount = $tot_ip['count'];
            $newcount = $oldcount + 1;
            $totData = array(
                            'count' => $newcount
                        );
           $this->db->where('v_id', 1);
                        $rs = $this->db->update('tot_visitor', $totData);
                        
           
            echo json_encode( array('status' => 203) );
          }else{
            echo json_encode( array('status' => 200) );
          }
    }
   

  public function ipcheck_temp(){
    $newip = $this->input->post('ip');
    $forpage = $this->input->post('forpage');
    $city = $this->input->post('city');
    $state = $this->input->post('state');
    $contry = $this->input->post('contry');
    $tempid = $this->input->post('tempid');
    if(strlen($newip)>20){
        $device = 'm';
    }else{
        $device = 'd';
    }
        $data['checkip'] = $checkip = $this->db->get_where("tot_get_ip", array("ip" =>$newip, "for_page"=>$forpage))->row_array();
        if($checkip == NULL){    
            $upData = array(
                            'ip' => $newip,
                            'for_page' => $forpage,
                            'created_at' => date('Y-m-d H:i:s'),
                            'device' => $device,
                            'city' => $city,
                            'state' => $state,
                            'contry' => $contry
                        );
            $this->db->insert('tot_get_ip',$upData);

            $data['tot_ip'] = $tot_ip = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
            $oldcount = $tot_ip['count'];
            $newcount = $oldcount + 1;
            $totData = array(
                            'count' => $newcount
                        );
           $this->db->where('v_id', 1);
                        $rs = $this->db->update('tot_visitor', $totData);

           
                        
           
            echo json_encode( array('status' => 203) );
          }else{
            echo json_encode( array('status' => 200) );
          }
           $tot_ip_tem = $this->db->get_where("templates", array("temp_id" =>$tempid))->row_array();
            $oldcount_tem = $tot_ip_tem['tot_visitor'];
            $newcount_tem = $oldcount_tem + 1;
            $totData = array(
                            'tot_visitor' => $newcount
                        );
           $this->db->where('temp_id', $tempid);
                        $rs = $this->db->update('templates', $totData);
                        echo json_encode( array('status' => 200) );

    }
   
//////////////////////////////////////////
    private function is_validated(){
        if($this->session->userdata('validated')){return TRUE;}else{return FALSE;}        
    }
    
  
    

//////////////////////////////////////////
    
}

?>