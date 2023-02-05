<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
    date_default_timezone_set('Asia/Kolkata');
    // echo $this->session->userdata('validated');die;
    //if(!$this->session->userdata('validated')){redirect(base_url());}

    //$this->$c_method = $this->router->fetch_method();
  }

  public function institue()
  {
    @session_start();
    $memid = $this->session->userdata("mem_id");
    $data['members'] = $members = $this->db->get_where("members", array("member_id" => $memid))->row_array();
    $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('institute/container', $data);
    }
  }
  public function notlive()
  {
    $memid = $this->session->userdata("mem_id");
    $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['mycourse'] = $mycourse = $this->db->get_where("mycourse", array("for_memid" => $memid))->row_array();
    $data['ins_subject'] = $ins_subject = $this->db->get_where("ins_subject", array("for_memid" => $memid))->row_array();
    $data['class_slot'] = $class_slot = $this->db->get_where("class_slot", array("ist_id" => $memid))->row_array();
    $data['my_institute'] = $my_institute = $this->db->get_where("my_institute", array("instu_id" => $memid, "is_active" => 1))->row_array();

    $this->load->view('institute/notlive', $data);
  }
  public function dashboard_page()
  {
    $memid = $this->session->userdata("mem_id");
    $data['bsid'] = $bsid = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['bs_pre_typ'] = $bs_pre_typ = $this->db->get_where("bus_premium_typ", array("bspr_bsid" => $bsid['psdata_id']))->row_array();
    if (!$bs_pre_typ) {
      $this->load->view('institute/bus_paid', $data);
    } else {

      $data['members'] = $members = $this->db->get_where("members", array("member_id" => $memid))->row_array();
      $data['mycourse'] = $mycourse = $this->db->get_where("mycourse", array("for_memid" => $memid))->row_array();
      $data['ins_subject'] = $ins_subject = $this->db->get_where("ins_subject", array("for_memid" => $memid))->row_array();
      $data['class_slot'] = $class_slot = $this->db->get_where("class_slot", array("ist_id" => $memid))->row_array();
      $data['my_institute'] = $my_institute = $this->db->get_where("my_institute", array("instu_id" => $memid, "is_active" => 1))->row_array();

      $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
      $today = date('l');
      $nowtime = date('h:m:i');
      //$nowtime = '6:00';
      $data['clastime'] = $clastime = $this->db->query("SELECT `class_slot`.*,
                                            `class_alotment`.*,
                                            `personal_data`.`mem_id`,
                                            `personal_data`.`teacher_nm`

                                          FROM `class_slot`
                                          INNER JOIN `class_alotment` ON `class_slot`.`class_uid` = `class_alotment`.`clasuid`
                                          INNER JOIN `personal_data` ON `class_alotment`.`teacherid` = `personal_data`.`mem_id`
                                         WHERE
                                         `class_slot`.`ist_id` = $memid
                                         AND
                                         `class_slot`.`day_nm` = '$today'
                                         AND
                                         `class_slot`.`tim_fmt_to` >= '$nowtime'
                                         AND
                                         `class_alotment`.`alot_type` >= 2
                                         GROUP BY
                                         `class_slot`.`cls_slt_id`
                                         
                                    ")->result_array();
      // echo json_encode( array($clastime) );
      $this->load->view('institute/dashboard', $data);
    }
  }

  public function post_bus_pre()
  {
    $memid = $this->session->userdata("mem_id");
    $bssid = $this->input->post('bsid');
    $data['bs_pre_typ'] = $bs_pre_typ = $this->db->get_where("bus_premium_typ", array("bspr_bsid" => $bssid))->row_array();
    if ($bs_pre_typ) {
      $addv = array(
        'bspr_typ' => $this->input->post('testchek'),
        'bspr_updated_at' => date('Y-m-d H:m:s')
      );

      $this->db->where('bspr_bsid', $bssid);
      $rs = $this->db->update('bus_premium_typ', $addv);
    } else {
      $addv = array(
        'bspr_bsid' => $bssid,
        'bspr_typ' => $this->input->post('testchek'),
        'bspr_created_at' => date('Y-m-d H:m:s'),
        'bspr_updated_at' => date('Y-m-d H:m:s')
      );

      $rs = $this->db->insert('bus_premium_typ', $addv);
    }
    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function my_i($my_jn_inid)
  {
    $memid = $this->session->userdata("mem_id");
    if ($my_jn_inid) {
      $data['my_institute'] = $my_institute = $this->db->get_where("my_institute", array("my_jn_inid" => $my_jn_inid))->row_array();
    }
    //$data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
    $this->load->view('institute/allstudent_data', $data);
  }


  //feed datas

  public function loadfeeddt()
  {
    $memid = $this->session->userdata("mem_id");
    // $data['my_institute'] = $my_institute = $this->db->get_where("my_institute", array("my_jn_inid" =>$my_jn_inid))->row_array();
    $data['techstdt'] = $techstdt = $this->db->query("SELECT `feed`.*,
                                            `personal_data`.*

                                          FROM `feed`
                                          INNER JOIN `personal_data` ON `feed`.`user_id` = `personal_data`.`psdata_id`
                                        
                                        
                                    ")->result_array();
    // var_dump($techstdt); die;
    //$data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
    $this->load->view('institute/allfeeds', $data);
  }

  public function feedpostdt()
  {
    $filemncvr = '';
    $jsonfile = '';
    $vidf = '';
    if (!empty($_FILES['vidfile']['name']) and !empty($_FILES['file']['name'])) {
      if (!empty($_FILES['vidfile']['name'])) {
        $name = explode(".", $_FILES["vidfile"]["name"]);
        $allowed_types = array("mp4", "avi", "3gp", "mov", "mpeg");
        $extension = end($name);

        if (in_array($extension, $allowed_types)) {
          if ($_FILES['file']['size'] <= 52428800) {
            $vid = uniqid() . '.' . $extension;
            $target_dir = './assets/feedvid/' . $vid;
            move_uploaded_file($_FILES['vidfile']['tmp_name'], $target_dir);
          }
        }
        $vidf = $vid;
      }

      if (!empty($_FILES['file']['name'])) {
        $temp = explode(".", $_FILES["file"]["name"]);
        $allowed_types = array("jpg", "jpeg", "png", "JPG");
        $extension = end($temp);
        // var_dump($temp,$extension,$extension); die;
        if (in_array($extension, $allowed_types)) {
          if ($_FILES['file']['size'] <= 52428800) { //50 MB =(52428800 Bytes (in binary))

            $image = uniqid() . '.' . $extension;
            $image_url_mid = './assets/feed-img/big/' . $image;
            $image_url_small = './assets/feed-img/mid/' . $image;
            $image_url_vsmall = './assets/feed-img/sml/' . $image;


            $moving_url_mid = $this->smart_resize_image(
              $_FILES['file']['tmp_name'],
              "", //img string
              1100,
              1100,
              true, //proportional
              'file', //file browser return
              $image_url_mid, //complete url (with file name)
              false,
              95, //quality
              false //grayscale
            );
            $moving_url_sml = $this->smart_resize_image(
              $_FILES['file']['tmp_name'],
              "", //img string
              600,
              600,
              true, //proportional
              'file', //file browser return
              $image_url_small, //complete url (with file name)
              false,
              90, //quality
              false //grayscale
            );
            $moving_url_vsmall = $this->smart_resize_image(
              $_FILES['file']['tmp_name'],
              "", //img string
              200,
              200,
              true, //proportional
              'file', //file browser return
              $image_url_vsmall, //complete url (with file name)
              false,
              90, //quality
              false //grayscale
            );
          }
        }
        $filemncvr = $image;
      }
      $jsonfile = '[{"filenm":"' . $filemncvr . '","filtyp":"img","filenm":"' . $vidf . '","filtyp":"vid"}]';
    } else if (!empty($_FILES['vidfile']['name'])) {
      $name = explode(".", $_FILES["vidfile"]["name"]);
      $allowed_types = array("mp4", "avi", "3gp", "mov", "mpeg");
      $extension = end($name);

      if (in_array($extension, $allowed_types)) {
        if ($_FILES['file']['size'] <= 52428800) {
          $vid = uniqid() . '.' . $extension;
          $target_dir = './assets/feedvid/' . $vid;
          $up = move_uploaded_file($_FILES['vidfile']['tmp_name'], $target_dir);
        }
        $vidf = $vid;
      }
      $jsonfile = '[{"filenm":"' . $vidf . '","filtyp":"vid"}]';
    } else if (!empty($_FILES['file']['name'])) {
      $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg", "jpeg", "png", "JPG");
      $extension = end($temp);
      // var_dump($temp,$extension,$extension); die;
      if (in_array($extension, $allowed_types)) {
        if ($_FILES['file']['size'] <= 52428800) { //50 MB =(52428800 Bytes (in binary))

          $image = uniqid() . '.' . $extension;
          $image_url_mid = './assets/feed-img/big/' . $image;
          $image_url_small = './assets/feed-img/mid/' . $image;
          $image_url_vsmall = './assets/feed-img/sml/' . $image;


          $moving_url_mid = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            1100,
            1100,
            true, //proportional
            'file', //file browser return
            $image_url_mid, //complete url (with file name)
            false,
            95, //quality
            false //grayscale
          );
          $moving_url_sml = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            600,
            600,
            true, //proportional
            'file', //file browser return
            $image_url_small, //complete url (with file name)
            false,
            90, //quality
            false //grayscale
          );
          $moving_url_vsmall = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            200,
            200,
            true, //proportional
            'file', //file browser return
            $image_url_vsmall, //complete url (with file name)
            false,
            90, //quality
            false //grayscale
          );
        }
        $filemncvr = $image;
      }
      $jsonfile = '[{"filenm":"' . $filemncvr . '","filtyp":"img"}]';
    }
    $addv = array(
      'user_id' => $this->input->post('userid'),
      'f_uid' => uniqid(),
      'data' => $this->input->post('indata'),
      'files' => $jsonfile,
      'this_tags' => $this->input->post('pttags'),
      'f_time' => date('h:m a'),
      'is_active' => '1',
      'is_publish' => '1',
      'f_date' => date('Y-m-d'),
      'f_date_txt' => date('Y/m/d'),
      'created_at' => date('Y-m-d H:m:s')
    );

    $rs = $this->db->insert('feed', $addv);

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }
  // end feed datas

  public function changestatus()
  {
    $memid = $this->session->userdata("mem_id");
    $my_jn_inid = $this->input->post('my_jn_inid');
    if ($my_jn_inid) {
      $addv = array(
        'status' => $this->input->post('status')

      );

      $this->db->where('my_jn_inid', $my_jn_inid);
      $rs = $this->db->update('my_institute', $addv);
    }
    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }


  public function liveclass($clsuids)
  {
    $memid = $this->session->userdata("mem_id");
    $data['clsuids'] = $clsuids;

    $this->load->view('institute/liveclass', $data);
  }
  public function chatblk($clsuids)
  {
    $memid = $this->session->userdata("mem_id");
    $data['clsuids'] = $clsuids;
    $onlyclsid = explode("_", $clsuids);
    $data['clsuid'] = $clsuid = $onlyclsid[0];

    $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();

    $data['student'] = $student = $this->db->query("SELECT `class_alotment`.*,
                                            `personal_data`.*

                                          FROM `class_alotment`
                                          INNER JOIN `personal_data` ON `class_alotment`.`studentid` = `personal_data`.`mem_id`
                                         WHERE
                                         `class_alotment`.`insid` = $memid
                                         AND
                                         `class_alotment`.`is_active` = 1
                                         AND
                                         `class_alotment`.`clasuid` = $clsuid
                                         AND
                                         `personal_data`.`memtyp` = 'student'
                                         
                                         
                                    ")->result_array();
    $this->load->view('institute/chatblk', $data);
  }
  public function institue_profile()
  {
    $memid = $this->session->userdata("mem_id");
    $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $this->load->view('institute/institue_profile', $data);
  }
  public function postdt()
  {
    $bsid = $this->session->userdata("bsid");
    // $data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
    // $data['my_institute'] = $my_institute = $this->db->get_where("my_institute", array("my_jn_inid" =>$my_jn_inid))->row_array();
    $data['techstdt'] = $techstdt = $this->db->query("SELECT `feed`.*,
                                            `personal_data`.*

                                          FROM `feed`
                                          INNER JOIN `personal_data` ON `feed`.`user_id` = `personal_data`.`psdata_id`
                                        where `feed`.`user_id` = $bsid
                                    ")->result_array();
    // var_dump($techstdt); die;
    $this->load->view('institute/allfeeds', $data);
  }

  public function admission()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['student'] = $student = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 0
                                         AND
                                         `personal_data`.`memtyp` = 'student'
                                         
                                    ")->result_array();

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();


    $this->load->view('institute/admission', $data);
  }
  public function allstudent_view()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $this->db->from('my_institute');
    $this->db->where('instu_id', $memid);
    $this->db->where('is_active', 1);
    $this->db->where('type', 1);
    $query = $this->db->get();
    $data['tot_student'] = $tot_student = $query->num_rows();

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();

    $this->load->view('institute/allstudent', $data);
  }
  public function allstudent_data($limitfrom = 0, $filtertyp = 0, $filterfor = NULL)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $srchlike = '';
    $coursby = '';
    if ($filtertyp == 0) {
      $coursby = '';
      $rowperpage = 50;
    } else if ($filtertyp == 1) {
      $filterfor = ltrim($filterfor, ',');
      $coursget = explode(",", $filterfor);
      foreach ($coursget as $coursget) {
        $coursby .= "OR find_in_set (" . $coursget . ", `class_alotment`.`for_class`) ";
      }

      $coursby = ltrim($coursby, "OR");
      $coursby = "AND " . $coursby;
      $rowperpage = 500;
      $srchlike = '';
    } else if ($filtertyp == 2) {
      $filterfor = $filterfor;
      $coursby = '';
      $rowperpage = 20;
      $srchlike = "AND `personal_data`.`teacher_nm` LIKE '%$filterfor%'";
    }

    $limitfrom = $limitfrom;

    $student = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*,
                                            `class_alotment`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                          INNER JOIN `class_alotment` ON `my_institute`.`mymemid` = `class_alotment`.`studentid`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 1 
                                         AND
                                         `my_institute`.`type` = 1 
                                          AND
                                         `class_alotment`.`alot_type` = 1
                                        $coursby
                                        $srchlike
                                         AND
                                         `personal_data`.`memtyp` = 'student'
                                         ORDER BY `personal_data`.`teacher_nm` ASC LIMIT $limitfrom,$rowperpage
                                    ")->result_array();

    $totstudents = $this->db->query("SELECT `my_institute`.*,
                                            `class_alotment`.*

                                          FROM `my_institute`
                                          INNER JOIN `class_alotment` ON `my_institute`.`mymemid` = `class_alotment`.`studentid`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 1 
                                         $coursby
                                         AND
                                         `class_alotment`.`alot_type` = 1
                                    ")->result_array();

    $data['totfilter_count'] = count($totstudents);
    //echo $totfilter_count; die;
    foreach ($student as $students) {

      $data['student'][] = array(
        'mem_id' => $students['mem_id'],
        'my_jn_inid' => $students['my_jn_inid'],
        'address' => $students['address'],
        'city' => $students['city'],
        'pro_pic' => $students['pro_pic'],
        'teacher_nm' => $students['teacher_nm'],
        'phone_no' => $students['phone_no'],
        'status' => $students['status'],
        'courses' => $students['for_class'],
        'admisin_dt' => $students['admisin_dt']

      );
    }



    $this->load->view('institute/allstudent_data', $data);
  }
  public function allteacher()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['student'] = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 1
                                         AND
                                         `my_institute`.`type` = 2
                                         
                                    ")->result_array();
    // print_r($data['student']);
    $this->load->view('institute/allteacher', $data);
  }
  public function teacher_join()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['teacher'] = $teacher = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 0
                                         AND
                                         `personal_data`.`memtyp` = 'teacher'
                                         
                                    ")->result_array();


    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();

    $this->load->view('institute/teacher_join', $data);
  }
  public function institue_course()
  {
    $memid = $this->session->userdata("mem_id");
    $data['allcourse'] = $allcourse = $this->db->get_where("allcourse", array())->result_array();
    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/institue_course', $data);
  }
  public function institue_allcourdef($maincatid)
  {
    $memid = $this->session->userdata("mem_id");
    if ($maincatid == 0) {
      $data['allcourse'] = $allcourse = $this->db->query(" SELECT `allcourse`.*

                                           FROM `allcourse`
                                          ORDER BY `allcourse`.`cours_id` LIMIT 80

                                          ")->result_array();
    } else {
      $data['allcourse'] = $allcourse = $this->db->get_where("allcourse", array("cr_maincatid" => $maincatid))->result_array();
    }

    $this->load->view('institute/institue_allcourdef', $data);
  }
  public function institue_allcoursesrch($srchval)
  {
    $memid = $this->session->userdata("mem_id");

    $srchval = urldecode($srchval);
    $crsnameval = preg_replace('/\s+/', ' ', $srchval);

    $data['allsrchcourse'] = $allsrchcourse = $this->db->query(" SELECT `allcourse`.*

                                           FROM `allcourse`
                                          
                                           WHERE LOWER(`allcourse`.`cours_nm`) LIKE '%$crsnameval%'
                                          ORDER BY `allcourse`.`cours_id` LIMIT 20
              ")->result_array();

    $this->load->view('institute/institue_allcoursesrch', $data);
  }
  public function institue_mycourse()
  {
    $memid = $this->session->userdata("mem_id");
    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/institue_mycourse', $data);
  }

  public function updateprofile()
  {
    $memid = $this->session->userdata("mem_id");


    $upData = array(
      'insti_nm' => $this->input->post("instnm"),
      'address' => $this->input->post("instaddr"),
      'city' => $this->input->post("instcity"),
      'state' => $this->input->post("inststat"),
      'phone_no' => $this->input->post("instcon")

    );
    $this->db->where('mem_id', $memid);
    $rs = $this->db->update('personal_data', $upData);
    $upData = array(
      'instu_name' => $this->input->post("instnm")

    );
    $this->db->where('member_id', $memid);
    $rs = $this->db->update('members', $upData);
    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function updateprofile_pic()
  {
    $memid = $this->session->userdata("mem_id");

    if (!empty($_FILES['file']['name'])) {
      $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg", "jpeg", "png", "JPG");
      $extension = end($temp);
      if (in_array($extension, $allowed_types)) {
        if ($_FILES['file']['size'] <= 52428800) { //50 MB =(52428800 Bytes (in binary))
          //echo "ok";


          $image = uniqid() . '.' . $extension;


          //die();

          $image_url_mid = './assets/pro-big/' . $image;
          $image_url_small = './assets/pro-mid/' . $image;
          $image_url_vsmall = './assets/pro-sml/' . $image;


          $moving_url_mid = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            1100,
            1100,
            true, //proportional
            'file', //file browser return
            $image_url_mid, //complete url (with file name)
            false,
            95, //quality
            false //grayscale
          );
          $moving_url_sml = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            600,
            600,
            true, //proportional
            'file', //file browser return
            $image_url_small, //complete url (with file name)
            false,
            90, //quality
            false //grayscale
          );
          $moving_url_vsmall = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            200,
            200,
            true, //proportional
            'file', //file browser return
            $image_url_vsmall, //complete url (with file name)
            false,
            90, //quality
            false //grayscale
          );
        }
      }


      $newdata = array(
        'pro_pic' => $image
      );
      $this->db->where('mem_id', $memid);
      $rs = $this->db->update('personal_data', $newdata);
    }
    // if(!$rs){
    //  echo json_encode( array('status' => 203) );
    // }else{
    //  echo json_encode( array('status' => 200) );
    // }


  }


  public function addnewcourse()
  {
    $memid = $this->session->userdata("mem_id");
    $data['allcat'] = $allcat = $this->db->get_where("mycourse", array("allcourse_id" => $this->input->post('catid'), "for_memid" => $memid))->row_array();

    if (!$allcat) {
      $newmem = array(
        'for_memid' => $memid,
        'allcourse_id' => $this->input->post('catid'),
        'cr_mncatid' => $this->input->post('maincatid')
      );
      $rs = $this->db->insert('mycourse', $newmem);
      if (!$rs) {
        echo json_encode(array('status' => 203));
      } else {
        echo json_encode(array('status' => 200));
      }
    } else {
      echo json_encode(array('status' => 204));
    }
  }

  public function addnewcouruser()
  {
    $memid = $this->session->userdata("mem_id");
    $newcrsval = $this->input->post('newcsval');

    $crstrim = trim($newcrsval," ");
    $strurl = str_replace(" ", "-", "$crstrim");
    $newmem = array(
      'cours_nm' => $crstrim,
      'cours_nm_url' => $strurl,
      'bymem' => $memid
    );
    $rs = $this->db->insert('allcourse', $newmem);
    $new_crsid = $this->db->insert_id();
    $newmem = array(
      'allcourse_id' => $new_crsid,
      'for_memid' => $memid
    );
    $rs = $this->db->insert('mycourse', $newmem);
    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function revmycourse()
  {
    $memid = $this->session->userdata("mem_id");

    $this->db->where('mycours_id', $this->input->post('catid'));
    $rs = $this->db->delete('mycourse');

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function institue_subject()
  {
    $memid = $this->session->userdata("mem_id");
    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/institue_subject', $data);
  }
  public function institue_classlot()
  {
    $memid = $this->session->userdata("mem_id");
    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/institue_classlot', $data);
  }


  public function institue_mysubject()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/institue_mysubject', $data);
  }
  public function mysubjectlist()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/mysubjectlist', $data);
  }
  public function myclaslist()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
    $this->load->view('institute/myclaslist', $data);
  }

  public function addnewsubjet()
  {
    $memid = $this->session->userdata("mem_id");
    $newrsub = $this->input->post('newrsub');
    $newrsub = $newrsub;
    // $newrsub = strtolower($newrsub);
    // $mycours = $this->input->post('mycours');
    $getsubjectary = $this->input->post('getsubjectary');
    $thisubid = $this->input->post('thisubid');

    if ($thisubid == 0) {
      $mainary = substr($getsubjectary, 1);
      // echo $mainary; die;
      $runarray = explode(',', $mainary);
      foreach ($runarray as $runarray) {

        $data['subdata'] = $subdata = $this->db->get_where("allsubject", array("sub_name" => $newrsub))->row_array();
        $trimsub = trim($newrsub," ");
        
        if (!$subdata) {
          $suburl = str_replace(" ", "-", "$trimsub");
          $subdt = array(
            'sub_coursid' => $runarray,
            'sub_name' => $trimsub,
            'sub_url' =>  $suburl,
            'sub_bymemid' => $memid,
            'sub_created_at	' => date('Y-m-d H:m:s')
          );
          $rs = $this->db->insert('allsubject', $subdt);
          $sub_insert_id = $this->db->insert_id();
          
          $newmem = array(
            'mycous_id' => $runarray,
            'ins_allsubid' => $sub_insert_id,
            'for_memid' => $memid
          );
          $rs = $this->db->insert('ins_subject', $newmem);
          
        } else {
          $newmem = array(
            'mycous_id' => $runarray,
            'ins_allsubid' => $subdata['sub_id'],
            'for_memid' => $memid
          );
          $rs = $this->db->insert('ins_subject', $newmem);
        }
      }
    } else {
      //$this->db->where('subj_id', $thisubid);
      // $rs = $this->db->update('ins_subject', $newmem);
    }


    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }
  public function searchsub($search = null)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['subsearch'] = $subsearch = $this->db->query("SELECT `allsubject`.*

                                          FROM `allsubject`
                                          WHERE
                                         `allsubject`.`sub_name` LIKE '%$search%'
                                    ")->result_array();
    $this->load->view('institute/sub_search', $data);
  }

  public function revmysub()
  {
    $memid = $this->session->userdata("mem_id");

    $this->db->where('subj_id', $this->input->post('catid'));
    $rs = $this->db->delete('ins_subject');

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }
  public function acept_tea_requstxx()
  {
    $memid = $this->session->userdata("mem_id");
    $reqstid = $this->input->post('reqstid');

    $newmem = array(
      'is_active' => 1
    );
    $this->db->where('my_jn_inid', $reqstid);
    $rs = $this->db->update('my_institute', $newmem);

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function acept_joining_admi()
  {
    $memid = $this->session->userdata("mem_id");
    $formemid = $this->input->post('formemid');
    $subjarr = $this->input->post('subjarr');
    $foruser = $this->input->post('foruser');
    $formyself = $this->input->post('formyself');


    $data['total_student'] = $total_student = $this->db->get_where("total_student", array("ist_id" => $memid))->row_array();
    $data['memberdata'] = $memberdata = $this->db->get_where("members", array("member_id" => $memid))->row_array();


    if ($memberdata['memplan'] == 'free') {
      $stu_limit = 20;
    } else if ($memberdata['memplan'] == 'standard') {
      $stu_limit = 200;
    } else if ($memberdata['memplan'] == 'enterprise') {
      $stu_limit = 10000;
    } else if ($memberdata['memplan'] == NULL) {
      $stu_limit = 20;
    }

    if ($total_student) {
      if ($stu_limit > $total_student['tot_stu']) {
        $stu_can_add = 1;
      } else {
        $stu_can_add = 0;
      }
    } else {
      $uptot = array(
        'ist_id' => $memid,
        'tot_stu' => 0
      );
      $this->db->insert('total_student', $uptot);
      $stu_can_add = 1;
    }


    $subjeids = explode(",", $subjarr);
    if ($foruser == 'student') {
      if ($stu_can_add == 1) {
        $newmem = array(
          'is_active' => 1,
          'admisin_dt' => date('Y-m-d')
        );
        $this->db->where('mymemid', $formemid);
        $this->db->where('instu_id', $memid);
        $rs = $this->db->update('my_institute', $newmem);

        $only_cours = '';
        $only_sub = '';
        foreach ($subjeids as $allcourssubs) {
          $singlcourssubs = explode("_", $allcourssubs);
          $get_sing_crs = $singlcourssubs[0] . ',';
          if (strpos($only_cours, $get_sing_crs) !== false) {
          } else {
            $only_cours .= $singlcourssubs[0] . ',';
          }

          $only_sub .= $singlcourssubs[1] . ',';
        }
        $only_cours = rtrim($only_cours, ',');
        $only_sub = rtrim($only_sub, ',');

        $upDatat = array(
          'studentid' => $formemid,
          'insid' => $memid,
          'for_class' => $only_sub,
          'for_subject' => $only_cours,
          'type' => 1,
          'is_active' => 1
        );
        $rs = $this->db->insert('class_alotment', $upDatat);
        // foreach($subjeids as $item) {
        //              $brkids = explode("_",$item);
        //              $newmem = array(
        //              'mycours_id' => $brkids[1],
        //              'subjid' => $brkids[0],
        //              'stu_id' => $formemid,
        //              'isntu_id' => $memid
        //              ); 
        //              $rs = $this->db->insert('student_cur_sub',$newmem);
        // }
      } else {
        echo json_encode(array('status' => 204));
      }
    } else {

      if ($formyself == 1) {

        $upData = array(
          'service' => 1

        );
        $this->db->where('mem_id', $formemid);
        $rs = $this->db->update('personal_data', $upData);

        $upData = array(
          'mymemid' => $memid,
          'instu_id' => $memid,
          'is_active' => 1,
          'type' => 2
        );
        $rs = $this->db->insert('my_institute', $upData);
      } else {
        $newmem = array(
          'is_active' => 1,
          'admisin_dt' => date('Y-m-d')
        );
        $this->db->where('mymemid', $formemid);
        $this->db->where('instu_id', $memid);
        $rs = $this->db->update('my_institute', $newmem);
      }

      $only_cours = '';
      $only_sub = '';
      foreach ($subjeids as $allcourssubs) {
        $singlcourssubs = explode("_", $allcourssubs);
        $get_sing_crs = $singlcourssubs[0] . ',';
        if (strpos($only_cours, $get_sing_crs) !== false) {
        } else {
          $only_cours .= $singlcourssubs[0] . ',';
        }

        $only_sub .= $singlcourssubs[1] . ',';
      }
      $only_cours = rtrim($only_cours, ',');
      $only_sub = rtrim($only_sub, ',');

      $upDatat = array(
        'teacherid' => $formemid,
        'insid' => $memid,
        'for_class' => $only_sub,
        'for_subject' => $only_cours,
        'type' => 2,
        'is_active' => 1
      );
      $rs = $this->db->insert('class_alotment', $upDatat);

      // foreach($subjeids as $item) {
      //     $brkids = explode("_",$item);
      //     $newmem = array(
      //     'mycours_id' => $brkids[1],
      //     'subjid' => $brkids[0],
      //     'teac_id' => $formemid,
      //     'isntu_id' => $memid
      //     ); 
      //     $rs = $this->db->insert('student_cur_sub',$newmem);
      // }

    }
    //  echo $subjarr;

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function class_slot()
  {
    $memid = $this->session->userdata("mem_id");
    $clstitle = $this->input->post('clstitle');
    $subjarr = $this->input->post('subjarr');
    $timearry = $this->input->post('timearry');
    $clasuid = $this->input->post('clasuid');
    $brksub = explode("_", $subjarr);
    $subject = $brksub[0];
    $coursid = $brksub[1];

    $query = $this->db->query("SELECT * FROM class_slot ORDER BY cls_slt_id DESC LIMIT 1");
    $result = $query->row_array();
    $newuid = $result['class_uid'] + 1;

    $timearry = explode(",", $timearry);

    if ($clasuid == 0) {

      foreach ($timearry as $item) {
        $brkids = explode("_", $item);

        $newmem = array(
          'ist_id' => $memid,
          'class_uid' => $newuid,
          'clas_title' => $clstitle,
          'sub_ids' => $subject,
          'cours_id' => $coursid,
          'day_nm' => $brkids[0],
          'cls_time_show' => date('h:i a', strtotime($brkids[1])),
          'cls_time_show_to' => date('h:i a', strtotime($brkids[2])),
          'tim_fmt' => $brkids[1],
          'tim_fmt_to' => $brkids[2]
        );
        $chekthis = $this->db->get_where("class_slot", array("day_nm" => $brkids[0], "clas_title" => $clstitle, "ist_id" => $memid))->row_array();
        if (!$chekthis) {
          $rs = $this->db->insert('class_slot', $newmem);
        }
      }
    } else {
      $this->db->where('class_uid', $clasuid);
      $rsd = $this->db->delete('class_slot');
      if ($rsd) {
        foreach ($timearry as $item) {
          $brkids = explode("_", $item);

          $newmem = array(
            'ist_id' => $memid,
            'class_uid' => $clasuid,
            'clas_title' => $clstitle,
            'sub_ids' => $subject,
            'cours_id' => $coursid,
            'day_nm' => $brkids[0],
            'cls_time_show' => date('h:i a', strtotime($brkids[1])),
            'cls_time_show_to' => date('h:i a', strtotime($brkids[2])),
            'tim_fmt' => $brkids[1],
            'tim_fmt_to' => $brkids[2]
          );
          $chekthis = $this->db->get_where("class_slot", array("day_nm" => $brkids[0], "clas_title" => $clstitle, "ist_id" => $memid, "class_uid" => $clasuid))->row_array();
          if (!$chekthis) {
            $rs = $this->db->insert('class_slot', $newmem);
          } else {
            $this->db->where('class_uid', $clasuid);
            $this->db->where('clas_title', $clstitle);
            $this->db->where('day_nm', $brkids[0]);
            $this->db->where('ist_id', $memid);
            $rsd = $this->db->delete('class_slot');

            $rs = $this->db->insert('class_slot', $newmem);
          }
        }
      } else {
        echo json_encode(array('status' => 203));
      }
    }

    //  echo $subjarr;

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function remocemyclas()
  {
    $catid = $this->input->post('catid');

    $this->db->where('class_uid', $catid);
    $rs = $this->db->delete('class_slot');

    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }
  public function getsinglclas()
  {
    $memid = $this->session->userdata("mem_id");
    $clasuid = $this->input->post('clasuid');
    $data['singlcls'] = $singlcls = $this->db->get_where("class_slot", array("class_uid" => $clasuid))->result_array();


    //  echo json_encode($singlcls);
    echo json_encode($singlcls);
  }
  public function class_alotm()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();


    $this->load->view('institute/class_alotm', $data);
  }


  public function alot_mem_list_student()
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $data['membr'] = 'student';
    $data['members'] = $members = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                          AND
                                         `my_institute`.`type` = 1
                                          AND
                                         `personal_data`.`memtyp` = 'student'
                                         
                                    ")->result_array();

    $this->load->view('institute/alot_mem_list', $data);
  }
  public function alot_mem_list_teacher()
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $data['membr'] = 'teacher';
    $data['members'] = $members = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                          AND
                                         `my_institute`.`type` = 2
                                         
                                    ")->result_array();

    $this->load->view('institute/alot_mem_list', $data);
  }



  public function put_class_alotm()
  {
    $memid = $this->session->userdata("mem_id");
    $classid = $this->input->post('classid');
    $membjarr = $this->input->post('membjarr');
    $formem = $this->input->post('formem');

    $membjarr = explode(",", $membjarr);

    if ($formem == 'student') {

      foreach ($membjarr as $item) {

        $newmem = array(
          'insid' => $memid,
          'clasuid' => $classid,
          'studentid' => $item,
          'alot_type' => 2,
          'type' => 0

        );
        $hvdata = $this->db->get_where("class_alotment", array("studentid" => $item, "clasuid" => $classid, "insid" => $memid))->row_array();
        if (!$hvdata) {
          $rs = $this->db->insert('class_alotment', $newmem);
        }
      }
    } else {
      foreach ($membjarr as $item) {

        $newmem = array(
          'insid' => $memid,
          'clasuid' => $classid,
          'teacherid' => $item,
          'alot_type' => 2,
          'type' => 0

        );
        $hvdata = $this->db->get_where("class_alotment", array("teacherid" => $item, "clasuid" => $classid, "insid" => $memid))->row_array();
        if (!$hvdata) {
          $rs = $this->db->insert('class_alotment', $newmem);
        }
      }
    }


    if (!$rs) {
      echo json_encode(array('status' => 203));
    } else {
      echo json_encode(array('status' => 200));
    }
  }

  public function share_invite()
  {
    $memid = $this->session->userdata("mem_id");
    $shrnum = $this->input->post('shrnum');
    $shrvia = $this->input->post('shrvia');
    $instus_name = $this->input->post('instus_name');
    $newmem = array(
      'sh_num' => $shrnum,
      'shby' => $shrvia

    );
    $rs = $this->db->insert('share_invite', $newmem);
    if ($shrvia == 'text') {
      $msg = "Hi, this is $instus_name. sign up at INFIDUST & send me joining request to start the live classes. signup now";
      //$this->send_sms_share($shrnum, $msg);
    }
    echo json_encode(array('status' => 200));
  }


  public function newteacher()
  {
    $memid = $this->session->userdata("mem_id");
    $contact = $this->input->post('contact');
    $data['members'] = $members = $this->db->get_where("members", array("contact" => $contact))->row_array();
    $otp = rand(9999, 1000);
    if ($members) {
      echo json_encode(array('status' => 204));
    } else {
      $query = $this->db->query("SELECT * FROM members ORDER BY member_id DESC LIMIT 1");
      $result = $query->row_array();
      $newuid = $result['memuid'] + 1;

      $upData = array(
        'memuid' => $newuid,
        'username' => $this->input->post("contact"),
        'password' => $this->input->post("cuspassword"),
        'email' => $this->input->post("cusemail"),
        'is_otp_v' => 1,
        'otp' => $otp,
        'mem_type' => $this->input->post("putacfor"),
        'mem_sub_typ' => "ind-tea",
        'cus_fname' => $this->input->post("cusfname"),
        'cus_lname' => $this->input->post("cuslname"),
        'contact' => $this->input->post("contact"),
        'created_at' => date('Y-m-d')


      );

      $rs = $this->db->insert('members', $upData);
      $new_user_id = $this->db->insert_id();

      $upDatat = array(
        'mem_id' => $new_user_id,
        'memuid' => $newuid,
        'phone_no' => $this->input->post("contact"),
        'teacher_nm' => $this->input->post("cusfname") . ' ' . $this->input->post("cuslname"),
        'memtyp' => $this->input->post("putacfor"),
        'mem_sub_typ' => "ind-tea"


      );
      $rs = $this->db->insert('personal_data', $upDatat);

      $myinsti = $this->db->get_where("my_institute", array("mymemid" => $new_user_id, "instu_id" => $memid))->row_array();
      if ($myinsti) {
        echo json_encode(array('status' => 204));
      } else {
        $upData = array(

          'mymemid' => $new_user_id,
          'instu_id' => $memid,
          'type' => 2,
          'join_at_dt' => date('Y-m-d')

        );

        $rs = $this->db->insert('my_institute', $upData);
      }

      if (!$rs) {
        echo json_encode(array('status' => 203));
      } else {

        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $from = 'infidust@kamprik.com';
        $to = $this->input->post("cusemail");
        $subject =  'Your login credentials - Infidust';

        // $message = $mailbody;
        // $message = "<b>This is HTML message.</b>";
        $message = "<h1>Your login credentials</h1>";
        $message .= "<p>Login details :<br>Contact number - " . $this->input->post("contact") . "<br>Password - " . $this->input->post("cuspassword") . "</p>";
        // $headers = "From:" . $from;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "From: " . "Infidust login credentials" . " ";
        $headers .= $from;
        mail($to, $subject, $message, $headers);

        echo json_encode(array('status' => 200));
      }
    }
  }

  public function chechlimit()
  {
    $memid = $this->session->userdata("mem_id");
    $data['total_student'] = $total_student = $this->db->get_where("total_student", array("ist_id" => $memid))->row_array();
    $data['memberdata'] = $memberdata = $this->db->get_where("members", array("member_id" => $memid))->row_array();

    if ($total_student) {
      if ($memberdata['memplan'] == 'free') {
        $stu_limit = 20;
      } else if ($memberdata['memplan'] == 'standard') {
        $stu_limit = 100;
      } else if ($memberdata['memplan'] == 'enterprise') {
        $stu_limit = 10000;
      } else if ($memberdata['memplan'] == NULL) {
        $stu_limit = 20;
      }

      if ($stu_limit > $total_student['tot_stu']) {
        echo json_encode(array('status' => 200));
      } else {
        echo json_encode(array('status' => 203));
      }
    } else {
      $upData = array(
        'ist_id' => $memid,
        'tot_stu' => 0,

      );

      $rs = $this->db->insert('total_student', $upData);
      echo json_encode(array('status' => 200));
    }
  }

  public function newstudent()
  {
    $memid = $this->session->userdata("mem_id");
    $contact = $this->input->post('contact');
    $data['members'] = $members = $this->db->get_where("members", array("contact" => $contact))->row_array();
    $otp = rand(9999, 1000);
    if ($members) {
      echo json_encode(array('status' => 204));
    } else {
      $query = $this->db->query("SELECT * FROM members ORDER BY member_id DESC LIMIT 1");
      $result = $query->row_array();
      $newuid = $result['memuid'] + 1;

      $upData = array(
        'memuid' => $newuid,
        'username' => $this->input->post("contact"),
        'password' => $this->input->post("cuspassword"),
        'email' => $this->input->post("cusemail"),
        'is_otp_v' => 1,
        'otp' => $otp,
        'mem_type' => $this->input->post("putacfor"),
        'cus_fname' => $this->input->post("cusfname"),
        'cus_lname' => $this->input->post("cuslname"),
        'contact' => $this->input->post("contact"),
        'created_at' => date('Y-m-d')


      );

      $rs = $this->db->insert('members', $upData);
      $new_user_id = $this->db->insert_id();

      $upDatat = array(
        'mem_id' => $new_user_id,
        'memuid' => $newuid,
        'phone_no' => $this->input->post("contact"),
        'teacher_nm' => $this->input->post("cusfname") . ' ' . $this->input->post("cuslname"),
        'memtyp' => $this->input->post("putacfor")


      );
      $rs = $this->db->insert('personal_data', $upDatat);

      $myinsti = $this->db->get_where("my_institute", array("mymemid" => $new_user_id, "instu_id" => $memid))->row_array();
      if ($myinsti) {
        echo json_encode(array('status' => 204));
      } else {
        $upData = array(

          'mymemid' => $new_user_id,
          'instu_id' => $memid,
          'join_at_dt' => date('Y-m-d')

        );

        $rs = $this->db->insert('my_institute', $upData);
      }

      if (!$rs) {
        echo json_encode(array('status' => 203));
      } else {

        ini_set('display_errors', 1);
        error_reporting(E_ALL);
        $from = 'infidust@kamprik.com';
        $to = $this->input->post("cusemail");
        $subject =  'Your login credentials - Infidust';

        // $message = $mailbody;
        // $message = "<b>This is HTML message.</b>";
        $message = "<h1>Your login credentials</h1>";
        $message .= "<p>Login details :<br>Contact number - " . $this->input->post("contact") . "<br>Password - " . $this->input->post("cuspassword") . "</p>";
        // $headers = "From:" . $from;
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html\r\n";
        $headers .= "From: " . "Infidust login credentials" . " ";
        $headers .= $from;
        mail($to, $subject, $message, $headers);

        echo json_encode(array('status' => 200));
      }
    }
  }



  public function testmail()
  {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = 'infidust@kamprik.com';
    $to = 'kamalghara@gmail.com';
    $subject =  'Your login credentials - Infidust';

    // $message = $mailbody;
    // $message = "<b>This is HTML message.</b>";
    $message = "<h1>Your login credentials</h1>";
    $message .= "<p>Login details :<br>Contact number - <br>Password - </p>";
    // $headers = "From:" . $from;
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html\r\n";
    $headers .= "From: " . "Infidust login credentials" . " ";
    $headers .= $from;
    mail($to, $subject, $message, $headers);
  }
  //////////////////////////////////////////
  private function is_validated()
  {
    if ($this->session->userdata('validated')) {
      return TRUE;
    } else {
      return FALSE;
    }
  }


  private function send_sms_share($numbers, $msg)
  {
    // Authorisation details.
    $username = "bimalghara79@gmail.com";
    $hash = "e2aad801f9d166053469aaebce7cb1e2a7bed1bf";

    $test = "0"; // Config variables. Consult http://api.textlocal.in/docs for more info.

    // $sender = "TXTLCL"; // This is who the message appears to be from.
    $sender = "SUPORT"; // This is who the message appears to be from.

    // $numbers = "9340284897"; // A single number or a comma-seperated list of numbers
    //$message = "This is a test message from the PHP API script.";

    $message = urlencode($msg);
    $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
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

  //////////////////////////////////////////
  ///////////////
  private function smart_resize_image(
    $file,
    $string             = null,
    $width              = 0,
    $height             = 0,
    $proportional       = false,
    $output             = 'file',
    $output_url             = './assets-public/uploads/',
    $use_linux_commands = false,
    $quality            = 100,
    $grayscale          = false
  ) {

    if ($height <= 0 && $width <= 0) return false;
    if ($file === null && $string === null) return false;

    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
    $cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
      if ($width  == 0)  $factor = $height / $height_old;
      elseif ($height == 0)  $factor = $width / $width_old;
      else                    $factor = min($width / $width_old, $height / $height_old);

      $final_width  = round($width_old * $factor);
      $final_height = round($height_old * $factor);
    } else {
      $final_width = ($width <= 0) ? $width_old : $width;
      $final_height = ($height <= 0) ? $height_old : $height;
      $widthX = $width_old / $width;
      $heightX = $height_old / $height;

      $x = min($widthX, $heightX);
      $cropWidth = ($width_old - $width * $x) / 2;
      $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ($info[2]) {
      case IMAGETYPE_JPEG:
        $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);
        break;
      case IMAGETYPE_PNG:
        $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);
        break;
      default:
        return false;
    }

    # Making the image grayscale, if needed
    if ($grayscale) {
      imagefilter($image, IMG_FILTER_GRAYSCALE);
    }

    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor($final_width, $final_height);
    if ($info[2] == IMAGETYPE_PNG) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      } elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);


    # Preparing a method of providing result
    switch (strtolower($output)) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
        break;
      case 'file':
        $output = $output_url; //full path(including file name)
        // $output = 'uploads/'.$file;
        break;
      case 'return':
        return $image_resized;
        break;
      default:
        break;
    }

    # Writing image according to type to the output destination and image quality
    switch ($info[2]) {
      case IMAGETYPE_JPEG:
        imagejpeg($image_resized, $output, $quality);
        break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9 * $quality) / 10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default:
        return false;
    }

    return true;
  }
}
