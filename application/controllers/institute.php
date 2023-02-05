<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Institute extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

    
       public function institue_srch($insusernm){
      // $memid = $this->session->userdata("mem_id");
       // $data['totv'] = $totv = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
      // $data['bs_option'] = $bs_option = $this->db->get_where("business_setting", array("bs_id" =>$bsid))->row_array();
      
          $this->load->view('show_institute');
     
        
    }

    public function bus_pre()
  {
    $memid = $this->session->userdata("mem_id");
    $data['bsid'] = $bsid = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['bs_pre_typ'] = $bs_pre_typ = $this->db->get_where("bus_premium_typ", array("bspr_bsid" => $bsid['psdata_id']))->row_array();
    
      $this->load->view('institute/bus_paid', $data);
    
  }
    public function sidemenu(){
        $this->load->view('sidemenu');
    } 
    public function dashboardpage(){
      $bsid = $this->session->userdata("bs_id");
      if($this->session->userdata("type") == 'master'){
          $this->db->from('f_branch');
          $this->db->where('br_type', 'frnch');
          $query = $this->db->get();
          $data['tot_fran'] = $tot_fran = $query->num_rows();

          $this->db->from('f_branch');
          $this->db->where('br_type', 'self');
          $query = $this->db->get();
          $data['tot_selfb'] = $tot_selfb = $query->num_rows();

          $this->db->from('user_login');
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $data['tot_counterlog'] = $tot_counterlog = $query->num_rows();

          $this->db->from('employe');
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $data['tot_emplye'] = $tot_emplye = $query->num_rows();

          $this->db->from('attendance');
          $this->db->where('b_id', $bsid);
          $this->db->where('p_date', date('Y-m-d'));
          $this->db->where('p_sts', 1);
          $query = $this->db->get();
          $data['tot_emplyepr'] = $tot_emplyepr = $query->num_rows();

          $this->db->from('attendance');
          $this->db->where('b_id', $bsid);
          $this->db->where('p_date', date('Y-m-d'));
          $this->db->where('p_sts', 0);
          $query = $this->db->get();
          $data['tot_emplyeab'] = $tot_emplyeab = $query->num_rows();

          $data['percentageatt'] = $percentageatt = ($tot_emplyepr*100)/$tot_emplye;

        $this->load->view('masterpage', $data);
      }else if($this->session->userdata("type") == 'admin'){
        $data['branchdata'] = $branchdata = $this->db->get_where("f_branch", array("cl_id" =>$this->session->userdata("cli_id")))->row_array();

            if($branchdata == NULL){
              $this->load->view('adminnull');
            }else{
              $this->db->from('f_branch');
              $this->db->where('cl_id', $this->session->userdata("cli_id"));
              $query = $this->db->get();
              $data['tot_brnch'] = $tot_brnch = $query->num_rows();

              $this->db->from('products');
              $this->db->where('cl_id', $this->session->userdata("cli_id"));
              $query = $this->db->get();
              $data['tot_prod'] = $tot_prod = $query->num_rows();

              $this->db->from('user_login');
              $this->db->where('cl_id', $this->session->userdata("cli_id"));
              $query = $this->db->get();
              $data['tot_counterlog'] = $tot_counterlog = $query->num_rows();
            $this->load->view('adminpage', $data);
            }
      }
    }
   public function saleschart(){ 
     $bsid = $this->session->userdata("bs_id");
        //  echo date('F, Y');
      for ($i = 1; $i < 2; $i++) {
        $getm1 = date('F Y', strtotime("-$i month"));
        $makem1s = date('Y-m-d', strtotime("-$i month"));
        $makem1e = date("Y-m-t", strtotime($makem1s));
      }for ($i = 2; $i < 3; $i++) {
        $getm2 = date('F Y', strtotime("-$i month"));
        $makem2s = date('Y-m-d', strtotime("-$i month"));
        $makem2e = date("Y-m-t", strtotime($makem2s));
      }for ($i = 3; $i < 4; $i++) {
        $getm3 = date('F Y', strtotime("-$i month"));
        $makem3s = date('Y-m-d', strtotime("-$i month"));
        $makem3e = date("Y-m-t", strtotime($makem3s));
      }for ($i = 4; $i < 5; $i++) {
        $getm4 = date('F Y', strtotime("-$i month"));
        $makem4s = date('Y-m-d', strtotime("-$i month"));
        $makem4e = date("Y-m-t", strtotime($makem4s));
      }for ($i = 5; $i < 6; $i++) {
        $getm5 = date('F Y', strtotime("-$i month"));
       $makem5s = date('Y-m-d', strtotime("-$i month"));
        $makem5e = date("Y-m-t", strtotime($makem5s));
      }for ($i = 6; $i < 7; $i++) {
        $getm6 = date('F Y', strtotime("-$i month"));
       $makem6s = date('Y-m-d', strtotime("-$i month"));
        $makem6e = date("Y-m-t", strtotime($makem6s));
      }

       $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem1s);
          $this->db->where('created_at <= ',$makem1e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum1 = $query->row()->tot_amt; 
          if(!$sum1){
            $sum1 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem2s);
          $this->db->where('created_at <= ',$makem2e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum2 = $query->row()->tot_amt;
          if(!$sum2){
            $sum2 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem3s);
          $this->db->where('created_at <= ',$makem3e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum3 = $query->row()->tot_amt;
          if(!$sum3){
            $sum3 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem4s);
          $this->db->where('created_at <= ',$makem4e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum4 = $query->row()->tot_amt;
          if(!$sum4){
            $sum4 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem5s);
          $this->db->where('created_at <= ',$makem5e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum5 = $query->row()->tot_amt;
          if(!$sum5){
            $sum5 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem6s);
          $this->db->where('created_at <= ',$makem6e);
          $this->db->where('b_id', $bsid);
          $query = $this->db->get();
          $sum6 = $query->row()->tot_amt;
          if(!$sum6){
            $sum6 = 0;
          }
     
          $report = array(
                                'status' => 200,
                                'getm1' => $getm1,
                                'getm2' => $getm2,
                                'getm3' => $getm3,
                                'getm4' => $getm4,
                                'getm5' => $getm5,
                                'getm6' => $getm6,
                                'sum1' => $sum1,
                                'sum2' => $sum2,
                                'sum3' => $sum3,
                                'sum4' => $sum4,
                                'sum5' => $sum5,
                                'sum6' => $sum6
                                ); 

           echo json_encode( $report );
          // echo json_encode( array('status' => 200) );
 }
  public function saleschartadmin(){ 
     $bsid = $this->session->userdata("bs_id");
     $clid = $this->session->userdata("cli_id");
        //  echo date('F, Y');
      for ($i = 1; $i < 2; $i++) {
        $getm1 = date('F Y', strtotime("-$i month"));
        $makem1s = date('Y-m-d', strtotime("-$i month"));
        $makem1e = date("Y-m-t", strtotime($makem1s));
      }for ($i = 2; $i < 3; $i++) {
        $getm2 = date('F Y', strtotime("-$i month"));
        $makem2s = date('Y-m-d', strtotime("-$i month"));
        $makem2e = date("Y-m-t", strtotime($makem2s));
      }for ($i = 3; $i < 4; $i++) {
        $getm3 = date('F Y', strtotime("-$i month"));
        $makem3s = date('Y-m-d', strtotime("-$i month"));
        $makem3e = date("Y-m-t", strtotime($makem3s));
      }for ($i = 4; $i < 5; $i++) {
        $getm4 = date('F Y', strtotime("-$i month"));
        $makem4s = date('Y-m-d', strtotime("-$i month"));
        $makem4e = date("Y-m-t", strtotime($makem4s));
      }for ($i = 5; $i < 6; $i++) {
        $getm5 = date('F Y', strtotime("-$i month"));
       $makem5s = date('Y-m-d', strtotime("-$i month"));
        $makem5e = date("Y-m-t", strtotime($makem5s));
      }for ($i = 6; $i < 7; $i++) {
        $getm6 = date('F Y', strtotime("-$i month"));
       $makem6s = date('Y-m-d', strtotime("-$i month"));
        $makem6e = date("Y-m-t", strtotime($makem6s));
      }

       $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem1s);
          $this->db->where('created_at <= ',$makem1e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum1 = $query->row()->tot_amt; 
          if(!$sum1){
            $sum1 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem2s);
          $this->db->where('created_at <= ',$makem2e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum2 = $query->row()->tot_amt;
          if(!$sum2){
            $sum2 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem3s);
          $this->db->where('created_at <= ',$makem3e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum3 = $query->row()->tot_amt;
          if(!$sum3){
            $sum3 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem4s);
          $this->db->where('created_at <= ',$makem4e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum4 = $query->row()->tot_amt;
          if(!$sum4){
            $sum4 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem5s);
          $this->db->where('created_at <= ',$makem5e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum5 = $query->row()->tot_amt;
          if(!$sum5){
            $sum5 = 0;
          }

          $this->db->select_sum('tot_amt');
          $this->db->from('orders');
          $this->db->where('paid_stl', 1);
          $this->db->where('created_at >= ',$makem6s);
          $this->db->where('created_at <= ',$makem6e);
          $this->db->where('b_id', $bsid);
          $this->db->where('cl_id', $clid);
          $query = $this->db->get();
          $sum6 = $query->row()->tot_amt;
          if(!$sum6){
            $sum6 = 0;
          }
     
          $report = array(
                                'status' => 200,
                                'getm1' => $getm1,
                                'getm2' => $getm2,
                                'getm3' => $getm3,
                                'getm4' => $getm4,
                                'getm5' => $getm5,
                                'getm6' => $getm6,
                                'sum1' => $sum1,
                                'sum2' => $sum2,
                                'sum3' => $sum3,
                                'sum4' => $sum4,
                                'sum5' => $sum5,
                                'sum6' => $sum6
                                ); 

           echo json_encode( $report );
          // echo json_encode( array('status' => 200) );
 }
    
//////////////////////////////////////////
    private function is_validated(){
        if($this->session->userdata('validated')){return TRUE;}else{return FALSE;}        
    }
    
  
    

//////////////////////////////////////////
    
}

?>