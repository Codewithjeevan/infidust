<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");

        }

	public function index()
	{
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');
	}
	public function myregister($instuid)
	{
		$data['personaldata'] = $personaldata = $this->db->get_where("personal_data", array("memuid" =>$instuid))->row_array();
		$memid = $personaldata['mem_id'];

		 $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid

                                    ")->result_array();

		$this->load->view('peronal_register_school_student',$data);
	}
	public function joinmentor($instuid)
	{
		$data['personaldata'] = $personaldata = $this->db->get_where("personal_data", array("memuid" =>$instuid))->row_array();
		$data['memid'] = $memid = $personaldata['mem_id'];

		 $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid

                                    ")->result_array();

		$this->load->view('peronal_register_school_mentors',$data);
	}
	public function fpass()
	{
		$this->load->view('forgotpass');
	}
	public function logout(){

	        $this->session->sess_destroy();
        	 redirect(base_url());
        	//echo json_encode( array('status' => 200) );
	}
	public function login()
	{

		@session_start();
	   	$contact = $this->input->post('contact');
	   	$password = $this->input->post('password');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact))->row_array();
		 if($members){
		 	 $data['membersdata'] = $membersdata = $this->db->get_where("members", array("contact" =>$contact, "password" =>$password, "is_otp_v" =>1, "is_active" =>1))->row_array();
		 	if($membersdata){

			 		 $data = array(
	                'mem_id' => $membersdata['member_id'],
	                'memuid' => $membersdata['memuid'],
	                'email' => $membersdata['email'],
	                'mem_type' => $membersdata['mem_type'],
	                'mem_sub_typ' => $membersdata['mem_sub_typ'],
					 'cus_fname' => $membersdata['cus_fname'],
					 'cus_lname' => $membersdata['cus_lname'],
					 'contact' => $membersdata['contact'],
					 'instu_name' => $membersdata['instu_name'],
					 'validated' => true

	                 );
			 		 $this->session->set_userdata($data);

			 		  $data['crntview'] = $crntview = $this->db->get_where("my_institute", array("mymemid" =>$membersdata['member_id'], "curent_view" =>1))->row_array();
			 		 if($crntview){
			 		 	 $data = array(
                          'crent_viewid' => $crntview['instu_id']
                         );
                         $this->session->set_userdata($data);
			 		 }

			 		 $memtype = $membersdata['mem_type'];
			 		 if($memtype == 'institute'){
			 		 	echo json_encode( array('status' => 200) );
			 		 }else if($memtype == 'student'){
			 		    //  redirect(base_url().'student_panel');
						echo json_encode( array('status' => 201) );
			 		 }else if($memtype == 'teacher'){
						echo json_encode( array('status' => 202) );
			 		 }
		 	}else{

		 	 echo json_encode( array('status' => 205) );
		 	}

		 }else {
		 	echo json_encode( array('status' => 203) );
		 }

	}
	public function redirect()
	{
		$path = $this->input->post('path');
		redirect(base_url().$path);
	}
	public function uewuser()
	{
		$contact = $this->input->post('contact');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact))->row_array();
// 		 $otp = rand(9999,1000);
		 $otp = 1111;
		 if($members){
		 	echo json_encode( array('status' => 204) );
		 }else {
		 	 $query = $this->db->query("SELECT * FROM members ORDER BY member_id DESC LIMIT 1");
        $result = $query->row_array();
        $newuid = $result['memuid'] + 1;

		 	 $upData = array(
                'memuid' => $newuid,
                'username' => $this->input->post("contact"),
                'password' => $this->input->post("cuspassword"),
                'email' => $this->input->post("cusemail"),
                'is_otp_v' => 0,
                'otp' => $otp,
                'mem_type' => $this->input->post("putacfor"),
                'mem_sub_typ' => $this->input->post("sub_putacfor"),
                'cus_fname' => $this->input->post("cusfname"),
                'cus_lname' => $this->input->post("cuslname"),
                'instu_name' => $this->input->post("instuname"),
                'contact' => $this->input->post("contact"),
                'ins_stu_strn' => $this->input->post("instuss"),
                 'memplan' => $this->input->post("thisplan"),
                'created_at' => date('Y-m-d')


              );

			            $rs = $this->db->insert('members',$upData);
			              $new_user_id = $this->db->insert_id();

			     $upDatat = array(
                'mem_id' => $new_user_id,
                'memuid' => $newuid,
                'insti_nm' => $this->input->post("instuname"),
                'phone_no' => $this->input->post("contact"),
                'teacher_nm' => $this->input->post("cusfname").' '.$this->input->post("cuslname"),
                'memtyp' => $this->input->post("putacfor"),
                'mem_sub_typ' => $this->input->post("sub_putacfor")


                );
			     $rs = $this->db->insert('personal_data',$upDatat);
			         if(!$rs){
			          echo json_encode( array('status' => 203) );
			         }else{
			         	$data = array(
                        'mem_id' => $new_user_id,
                        'validated' => true
                        );
                        $this->session->set_userdata($data);
             //             $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";
			         	// // $this->send_sms($contact, $msg);
			         	//  ini_set( 'display_errors', 1 );
			          //       error_reporting( E_ALL );
			          //       $from = 'infidust@kamprik.com';
			          //       $to = $this->input->post("cusemail");
			          //       $subject =  'Your OTP - Infidust';

			          //      // $message = $mailbody;
			          //        // $message = "<b>This is HTML message.</b>";
			          //          $message = $msg;
			          //       // $headers = "From:" . $from;
			          //        $headers = "MIME-Version: 1.0\r\n";
			          //       $headers .= "Content-type: text/html\r\n";
			          //       $headers .= "From: "."Infidust OTP"." ";
			          //       $headers .= $from;
			          //       mail($to,$subject,$message, $headers);

			          echo json_encode( array('status' => 200) );

			         }

		 }
	}

	public function resendotp()
	{
		$memid=$this->session->userdata('mem_id');
		$data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
		$otp = $members['otp'];
		$contact = $members['contact'];
		 $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";
			         	// $this->send_sms($contact, $msg);
			         	 ini_set( 'display_errors', 1 );
			                error_reporting( E_ALL );
			                $from = 'infidust@kamprik.com';
			                $to = $this->input->post("cusemail");
			                $subject =  'Your OTP - Infidust';

			               // $message = $mailbody;
			                 // $message = "<b>This is HTML message.</b>";
			                   $message = $msg;
			                // $headers = "From:" . $from;
			                 $headers = "MIME-Version: 1.0\r\n";
			                $headers .= "Content-type: text/html\r\n";
			                $headers .= "From: "."Infidust OTP"." ";
			                $headers .= $from;
			                mail($to,$subject,$message, $headers);

			          echo json_encode( array('status' => 200) );
	}


	public function veryfy_data()
	{
		$otp = $this->input->post('inotp');
		$memid=$this->session->userdata('mem_id');
		 $data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();

		 if(!$members){
		 	echo json_encode( array('status' => 203) );
		 }else {
		 	 if($otp == $members['otp'])
		 	 {

			 	 $upData = array(
	                'is_otp_v' => 1

	              );
			 	        $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData);

                        $data = array(
						'mem_id' => $members['member_id'],
						'memuid' => $members['memuid'],
						'email' => $members['email'],
						'mem_type' => $members['mem_type'],
						'mem_sub_typ' => $members['mem_sub_typ'],
						'cus_fname' => $members['cus_fname'],
						'cus_lname' => $members['cus_lname'],
						 'contact' => $members['contact'],
						'validated' => true
						);
						$this->session->set_userdata($data);
						if($members['mem_type'] == 'institute'){
							echo json_encode( array('status' => 201) );
						}else if($members['mem_type'] == 'student'){
							echo json_encode( array('status' => 202) );
						}else if($members['mem_type'] == 'teacher'){
							echo json_encode( array('status' => 204) );
						}

		 	 }else{
		 	 			echo json_encode( array('status' => 203) );

		 	 }



		 }
	}

	public function forgpass()
	{
		$contact = $this->input->post('contact');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact))->row_array();
		 $otp = rand(9999,1000);
		 if($members){
		 	 $upData = array(
	                'otp' => $otp

	              );
			 	        $this->db->where('contact', $members['contact']);
                        $rs = $this->db->update('members', $upData);
               $data = array(
						'mem_id' => $members['member_id'],
						'validated' => true
						);
						$this->session->set_userdata($data);
          $contact = $members['contact'];
		  $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";
			        // $this->send_sms($contact, $msg);
			         ini_set( 'display_errors', 1 );
			                error_reporting( E_ALL );
			                $from = 'infidust@kamprik.com';
			                $to = $members['email'];
			                $subject =  'Your OTP - Infidust';

			               // $message = $mailbody;
			                 // $message = "<b>This is HTML message.</b>";
			                   $message = $msg;
			                // $headers = "From:" . $from;
			                 $headers = "MIME-Version: 1.0\r\n";
			                $headers .= "Content-type: text/html\r\n";
			                $headers .= "From: "."Infidust OTP"." ";
			                $headers .= $from;
			                mail($to,$subject,$message, $headers);
		 	 echo json_encode( array('status' => 200) );
		 }else {
		 	echo json_encode( array('status' => 203) );



		 }
	}

	public function veryfy_data_fpass()
	{
		$otp = $this->input->post('inotp');
		$memid=$this->session->userdata('mem_id');
		 $data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();

		 if(!$members){
		 	echo json_encode( array('status' => 203) );
		 }else {
		 	 if($otp == $members['otp'])
		 	 {

			 	 $upData = array(
	                'is_otp_v' => 1

	              );
			 	        $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData);


						 echo json_encode( array('status' => 200) );


		 	 }else{
		 	 			echo json_encode( array('status' => 203) );

		 	 }



		 }
	}


	public function veryfy_newpass()
	{
		$newpass = $this->input->post('newpass');
		$memid=$this->session->userdata('mem_id');
		 $data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();

		 if(!$members){
		 	echo json_encode( array('status' => 203) );
		 }else {


			 	 $upData = array(
	                'password' => $newpass

	              );
			 	        $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData);

                        $data = array(
						'mem_id' => $members['member_id'],
						'memuid' => $members['memuid'],
						'email' => $members['email'],
						'mem_type' => $members['mem_type'],
						'mem_sub_typ' => $members['mem_sub_typ'],
						'cus_fname' => $members['cus_fname'],
						'cus_lname' => $members['cus_lname'],
						 'contact' => $members['contact'],
						'validated' => true
						);
						$this->session->set_userdata($data);
						 $data['crntview'] = $crntview = $this->db->get_where("my_institute", array("mymemid" =>$memid, "curent_view" =>1))->row_array();
			 		 if($crntview){
			 		 	 $data = array(
                          'crent_viewid' => $crntview['instu_id']
                         );
                         $this->session->set_userdata($data);
			 		 }
						if($members['mem_type'] == 'institute'){
							echo json_encode( array('status' => 201) );
						}else if($members['mem_type'] == 'student'){
							echo json_encode( array('status' => 202) );
						}else if($members['mem_type'] == 'teacher'){
							echo json_encode( array('status' => 204) );
						}




		 }
	}


public function admin()
	{
		$this->load->view('company/login');
	}
	public function clogin()
	{
		@session_start();
	   	$contact = $this->input->post('contact');
	   	$password = $this->input->post('password');
		 $data['members'] = $members = $this->db->get_where("admin", array("contact" =>$contact))->row_array();
		 if($members){
		 	 $data['membersdata'] = $membersdata = $this->db->get_where("admin", array("contact" =>$contact, "password" =>$password))->row_array();
		 	if($membersdata){

			 		 $data = array(
	                'mem_id' => $membersdata['ad_id'],
					 'validated' => true

	                 );
			 		 $this->session->set_userdata($data);


			 		 $memtype = $membersdata['ad_type'];
			 		 if($memtype == 'admin'){
			 		 	echo json_encode( array('status' => 205) );
			 		 }
		 	}else{

		 	 echo json_encode( array('status' => 203) );
		 	}

		 }else {
		 	echo json_encode( array('status' => 203) );
		 }

	}


	public function schoolreg_chknum()
	{
		$contact = $this->input->post('contact');
		$instid = $this->input->post('instid');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact,"is_active" =>1))->row_array();
		 if($members){
		 	if($members['mem_type'] == 'student'){
		 		$my_institute = $this->db->get_where("my_institute", array("mymemid" =>$members['member_id'],"instu_id" =>$instid))->row_array();
		 		if($my_institute){
		 			echo json_encode( array('status' => 201, 'name' => $members['cus_fname']) );
		 		}else{
		 			echo json_encode( array('status' => 203, 'name' => $members['cus_fname']) );
		 		}
		 	}else{
		 	    echo json_encode( array('status' => 204, 'name' => $members['cus_fname']) );
		 	}
		 }else{
		 	echo json_encode( array('status' => 200) );
		 }
	}


public function personal_student_reg()
	{
		$contact = $this->input->post('contact');

		 	 $query = $this->db->query("SELECT * FROM members ORDER BY member_id DESC LIMIT 1");
        $result = $query->row_array();
        $newuid = $result['memuid'] + 1;

		 	 $upData = array(
                'memuid' => $newuid,
                'username' => $this->input->post("contact"),
                'password' => $this->input->post("cuspassword"),
                'email' => $this->input->post("cusemail"),
                'is_live' => 0,
                'is_otp_v' => 1,
                'mem_type' => 'student',
                'cus_fname' => $this->input->post("cusfname"),
                'cus_lname' => $this->input->post("cuslname"),
                'contact' => $this->input->post("contact"),
                'created_at' => date('Y-m-d')


              );

			   $rs = $this->db->insert('members',$upData);
			   $new_user_id = $this->db->insert_id();

			   $upDatat = array(
                'mem_id' => $new_user_id,
                'memuid' => $newuid,
                'phone_no' => $this->input->post("contact"),
                'teacher_nm' => $this->input->post("cusfname").' '.$this->input->post("cuslname"),
                'memtyp' => 'student'

                );
			     $rs = $this->db->insert('personal_data',$upDatat);

			     $upDatat = array(
                'mymemid' => $new_user_id,
                'instu_id' => $this->input->post("instid"),
                'join_at_dt' => date('Y-m-d'),
                'admisin_dt' => date('Y-m-d'),
                'is_active' => 1,
                'curent_view' => 1

                );
			     $rs = $this->db->insert('my_institute',$upDatat);

			     $upDatat = array(
                'studentid' => $new_user_id,
                'insid' => $this->input->post("instid"),
                'for_class' => $this->input->post("coursid"),
                'type' => 1,
                'is_active' => 1


                );
			     $rs = $this->db->insert('class_alotment',$upDatat);
			     if($rs){
			     	 echo json_encode( array('status' => 200) );
			     }  else{
			     	 echo json_encode( array('status' => 203) );
			     }


                   //       $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";

                   //        ini_set( 'display_errors', 1 );
			                // error_reporting( E_ALL );
			                // $from = 'infidust@kamprik.com';
			                // $to = $this->input->post("cusemail");
			                // $subject =  'Your OTP - Infidust';

			                //    $message = $msg;

			                //  $headers = "MIME-Version: 1.0\r\n";
			                // $headers .= "Content-type: text/html\r\n";
			                // $headers .= "From: "."Infidust OTP"." ";
			                // $headers .= $from;
			                // mail($to,$subject,$message, $headers);



	}

	public function personal_student_join()
	{
		$contact = $this->input->post('contact');
		$instid = $this->input->post('instid');
		$coursid = $this->input->post('coursid');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact,"is_active" =>1))->row_array();
		 if($members){

		 	 $myinsti = $this->db->get_where("my_institute", array("mymemid" =>$members['member_id']))->result_array();
		  if($myinsti){
		 	 $upData = array(
	                'curent_view' => 0

	              );
			 	        $this->db->where('mymemid', $members['member_id']);
                        $rs = $this->db->update('my_institute', $upData);
          }
		$upDatat = array(
                'mymemid' => $members['member_id'],
                'instu_id' => $this->input->post("instid"),
                'join_at_dt' => date('Y-m-d'),
                'admisin_dt' => date('Y-m-d'),
                'is_active' => 1,
                'curent_view' => 1

                );
			     $rs = $this->db->insert('my_institute',$upDatat);

			     $upDatat = array(
                'studentid' => $members['member_id'],
                'insid' => $this->input->post("instid"),
                'for_class' => $this->input->post("coursid"),
                'type' => 1,
                'is_active' => 1


                );
			     $rs = $this->db->insert('class_alotment',$upDatat);
			     if($rs){
			     	 echo json_encode( array('status' => 200) );
			     }  else{
			     	 echo json_encode( array('status' => 203) );
			     }
			 }
	}


	public function personal_mentor_join()
	{
		$contact = $this->input->post('contact');
		$instid = $this->input->post('instid');
		$coursid = $this->input->post('coursid');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact,"is_active" =>1))->row_array();
		 if($members){

		 	 $myinsti = $this->db->get_where("my_institute", array("mymemid" =>$members['member_id']))->result_array();
		  if($myinsti){
		 	 $upData = array(
	                'curent_view' => 0

	              );
			 	        $this->db->where('mymemid', $members['member_id']);
                        $rs = $this->db->update('my_institute', $upData);
          }
		$upDatat = array(
                'mymemid' => $members['member_id'],
                'instu_id' => $this->input->post("instid"),
                'join_at_dt' => date('Y-m-d'),
                'admisin_dt' => date('Y-m-d'),
                'type' => 2	,
                'is_active' => 1,
                'curent_view' => 1

                );
			     $rs = $this->db->insert('my_institute',$upDatat);

			       $getallcoursub = $this->input->post("coursid");
        		$getallcoursub = ltrim($getallcoursub, ',');
        		$allcourssub = explode(",", $getallcoursub);
        		$only_cours = '';
        		$only_sub = '';
        		foreach ($allcourssub as $allcourssubs) {
        			$singlcourssubs = explode("_", $allcourssubs);
        			$get_sing_crs = $singlcourssubs[0].',';
        			if (strpos($only_cours, $get_sing_crs) !== false) {

					}else{
						$only_cours .= $singlcourssubs[0].',';
					}

        			$only_sub .= $singlcourssubs[1].',';
        		}
        		$only_cours = rtrim($only_cours, ',');
        		$only_sub = rtrim($only_sub, ',');
        		// echo $only_cours.'-';
        		// echo $only_sub.'-';
        		// die;

                $upDatat = array(
                'teacherid' => $members['member_id'],
                'insid' => $this->input->post("instid"),
                'for_class' => $only_cours,
                'for_subject' => $only_sub,
                'type' => 2,
                'is_active' => 1


                );
			     $rs = $this->db->insert('class_alotment',$upDatat);
			     if($rs){
			     	 echo json_encode( array('status' => 200) );
			     }  else{
			     	 echo json_encode( array('status' => 203) );
			     }
			 }
	}

	public function schoolregmn_chknum()
	{
		$contact = $this->input->post('contact');
		$instid = $this->input->post('instid');
		 $data['members'] = $members = $this->db->get_where("members", array("contact" =>$contact,"is_active" =>1))->row_array();
		 if($members){
		 	if($members['mem_type'] == 'teacher'){
		 		$my_institute = $this->db->get_where("my_institute", array("mymemid" =>$members['member_id'],"instu_id" =>$instid))->row_array();
		 		if($my_institute){
		 			echo json_encode( array('status' => 201, 'name' => $members['cus_fname']) );
		 		}else{
		 			echo json_encode( array('status' => 203, 'name' => $members['cus_fname']) );
		 		}
		 	}else{
		 	    echo json_encode( array('status' => 204, 'name' => $members['cus_fname']) );
		 	}
		 }else{
		 	echo json_encode( array('status' => 200) );
		 }
	}

public function personal_mentor_reg()
	{
		$contact = $this->input->post('contact');

		 	 $query = $this->db->query("SELECT * FROM members ORDER BY member_id DESC LIMIT 1");
        $result = $query->row_array();
        $newuid = $result['memuid'] + 1;

		 	 $upData = array(
                'memuid' => $newuid,
                'username' => $this->input->post("contact"),
                'password' => $this->input->post("cuspassword"),
                'email' => $this->input->post("cusemail"),
                'is_live' => 0,
                'is_otp_v' => 1,
                'mem_type' => 'teacher',
                'cus_fname' => $this->input->post("cusfname"),
                'cus_lname' => $this->input->post("cuslname"),
                'contact' => $this->input->post("contact"),
                'created_at' => date('Y-m-d')


              );

			   $rs = $this->db->insert('members',$upData);
			   $new_user_id = $this->db->insert_id();

			   $upDatat = array(
                'mem_id' => $new_user_id,
                'memuid' => $newuid,
                'phone_no' => $this->input->post("contact"),
                'teacher_nm' => $this->input->post("cusfname").' '.$this->input->post("cuslname"),
                'memtyp' => 'teacher'

                );
			     $rs = $this->db->insert('personal_data',$upDatat);

			     $upDatat = array(
                'mymemid' => $new_user_id,
                'instu_id' => $this->input->post("instid"),
                'join_at_dt' => date('Y-m-d'),
                'admisin_dt' => date('Y-m-d'),
                'type' => 2,
                'is_active' => 1,
                'curent_view' => 1

                );
			     $rs = $this->db->insert('my_institute',$upDatat);

        		$getallcoursub = $this->input->post("coursid");
        		$getallcoursub = ltrim($getallcoursub, ',');
        		$allcourssub = explode(",", $getallcoursub);
        		$only_cours = '';
        		$only_sub = '';
        		foreach ($allcourssub as $allcourssubs) {
        			$singlcourssubs = explode("_", $allcourssubs);
        			$get_sing_crs = $singlcourssubs[0].',';
        			if (strpos($only_cours, $get_sing_crs) !== false) {

					}else{
						$only_cours .= $singlcourssubs[0].',';
					}

        			$only_sub .= $singlcourssubs[1].',';
        		}
        		$only_cours = rtrim($only_cours, ',');
        		$only_sub = rtrim($only_sub, ',');
        		// echo $only_cours.'-';
        		// echo $only_sub.'-';
        		// die;

			     $upDatat = array(
                'teacherid' => $new_user_id,
                'insid' => $this->input->post("instid"),
                'for_class' => $only_cours,
                'for_subject' => $only_sub,
                'type' => 2,
                'is_active' => 1


                );
			     $rs = $this->db->insert('class_alotment',$upDatat);
			     if($rs){
			     	 echo json_encode( array('status' => 200) );
			     }  else{
			     	 echo json_encode( array('status' => 203) );
			     }


                   //       $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";

                   //        ini_set( 'display_errors', 1 );
			                // error_reporting( E_ALL );
			                // $from = 'infidust@kamprik.com';
			                // $to = $this->input->post("cusemail");
			                // $subject =  'Your OTP - Infidust';

			                //    $message = $msg;

			                //  $headers = "MIME-Version: 1.0\r\n";
			                // $headers .= "Content-type: text/html\r\n";
			                // $headers .= "From: "."Infidust OTP"." ";
			                // $headers .= $from;
			                // mail($to,$subject,$message, $headers);



	}



/////////////////////////////////

	private function send_sms($numbers, $msg){
        // Authorisation details.
        $username = "bimalghara79@gmail.com";
        $hash = "e2aad801f9d166053469aaebce7cb1e2a7bed1bf";

        $test = "0";// Config variables. Consult http://api.textlocal.in/docs for more info.

        // $sender = "TXTLCL"; // This is who the message appears to be from.
        $sender = "SUPORT"; // This is who the message appears to be from.

       // $numbers = "9340284897"; // A single number or a comma-seperated list of numbers
        //$message = "This is a test message from the PHP API script.";

        $message = urlencode($msg);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);

        // Process your response here
        // echo '<pre>';
        // print_r($result);
        // if($result['status'] == 'success'){return true;}else{return false;}
        return true;
    }
}
?>
