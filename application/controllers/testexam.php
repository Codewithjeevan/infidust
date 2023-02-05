<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testexam extends CI_Controller
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


  public function test_dashboard()
  {

    $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    if ($this->session->userdata("mem_type") == 'teacher') {

      $data['papers'] = $papers = $this->db->query("SELECT `test_paper`.*,
                                                          `personal_data`.*

                                          FROM `test_paper`
                                         INNER JOIN `personal_data` ON `test_paper`.`memid` = `personal_data`.`mem_id`
                                         WHERE
                                         `test_paper`.`memid` = $memid 
                                         ORDER BY `test_paper`.`tp_mid` DESC
                                    ")->result_array();
    } else {

      $data['papers'] = $papers = $this->db->query("SELECT `test_paper`.*,
                                                          `personal_data`.*

                                          FROM `test_paper`
                                         INNER JOIN `personal_data` ON `test_paper`.`memid` = `personal_data`.`mem_id`
                                         WHERE
                                         `test_paper`.`upload_under` = $memid 
                                         ORDER BY `test_paper`.`tp_mid` DESC
                                    ")->result_array();
    }


    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_dashboard', $data);
    }
  }
  public function test_setting($paperid)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $data['paper'] = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_setting', $data);
    }
  }
  public function test_manage($paperid)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['paper'] = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();

    if ($this->session->userdata("mem_type") == 'teacher') {
      $data['inst_id'] = $inst_id = $this->session->userdata("crent_viewid");
      //  $class_for_t = $this->db->get_where("class_alotment", array('insid' => $inst_id,'teacherid' => $memid))->row_array();
      // $data['teacher_cls_ary'] = $class_for_t['for_class'];
    } else {
      $data['inst_id'] = $inst_id = $memid;
    }

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $inst_id
                                         
                                    ")->result_array();
    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_manage', $data);
    }
  }


  public function create_new_test()
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");

    if ($this->session->userdata("mem_type") == 'teacher') {
      $data['inst_id'] = $inst_id = $this->session->userdata("crent_viewid");
      // $class_for_t = $this->db->get_where("class_alotment", array('insid' => $inst_id,'teacherid' => $memid))->row_array();
      // $data['teacher_cls_ary'] = $class_for_t['for_class'];
      $data['test_catg'] = $this->db->get_where("test_paper_maincat", array('instid' => $inst_id))->result_array();
      $data['test_catg_active'] = $this->db->get_where("test_paper_maincat", array('instid' => $inst_id, 'is_active' => 1))->row_array();
    } else {
      $data['inst_id'] = $inst_id = $memid;
      $data['test_catg'] = $this->db->get_where("test_paper_maincat", array('instid' => $memid))->result_array();
      $data['test_catg_active'] = $this->db->get_where("test_paper_maincat", array('instid' => $memid, 'is_active' => 1))->row_array();
    }

    $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $inst_id
                                         
                                    ")->result_array();

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/create_new_test', $data);
    }
  }


  public function update_active_maincat()
  {
    $memid = $this->session->userdata('mem_id');
    $mcatid = $this->input->post('getcatid');
    if ($this->session->userdata("mem_type") == 'teacher') {
      $crntviewid = $this->session->userdata("crent_viewid");
      $isntid = $crntviewid;
    } else {
      $isntid = $memid;
    }

    $newdataz = array(
      'is_active' => 0
    );

    $this->db->where('instid', $isntid);
    $rs = $this->db->update('test_paper_maincat', $newdataz);
    $newdataone = array(
      'is_active' => 1
    );

    $this->db->where('tpmc_id', $mcatid);
    $rs = $this->db->update('test_paper_maincat', $newdataone);
  }
  public function new_maincat()
  {
    $memid = $this->session->userdata('mem_id');
    $getcatname = $this->input->post('getcatname');
    if ($this->session->userdata("mem_type") == 'teacher') {
      $crntviewid = $this->session->userdata("crent_viewid");
      $isntid = $crntviewid;
    } else {
      $isntid = $memid;
    }

    $newdataz = array(
      'is_active' => 0
    );

    $this->db->where('instid', $isntid);
    $rs = $this->db->update('test_paper_maincat', $newdataz);
    $newdataone = array(
      'instid' => $isntid,
      'mcatnm' => $getcatname,
      'is_active' => 1
    );

    $rs = $this->db->insert('test_paper_maincat', $newdataone);
    if ($rs) {
      echo json_encode(array('status' => 200));
    } else {
      echo json_encode(array('status' => 203));
    }
  }
  public function create_new_paper()
  {
    $memid = $this->session->userdata('mem_id');
    $newtitle = $this->input->post('newtitle');
    $titleurl = str_replace(" ", "-", "$newtitle");
    //$coursid = $this->input->post('coursid');
    $marknum = $this->input->post('marknum');
    $testtime = $this->input->post('testtime');
    $testtime_show = $this->input->post('testtime_show');

    if ($this->session->userdata("mem_type") == 'teacher') {
      $crntviewid = $this->session->userdata("crent_viewid");
      $up_under = $crntviewid;
    } else {
      $up_under = $memid;
    }


    $getallcoursub = $this->input->post("coursid");
    $getallcoursub = ltrim($getallcoursub, ',');
    $allcourssub = explode(",", $getallcoursub);
    $only_cours = '';
    $only_sub = '';
    foreach ($allcourssub as $allcourssubs) {
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

    if ($this->input->post('testpaperid')) {
      $newdata = array(
        'title' => $newtitle,
        'tp_title_url' => $titleurl,
        'subject' => $only_sub,
        'class' => $only_cours,
        'tot_marks' => $marknum,
        'show_cours_ids' => $this->input->post("coursid"),
        'show_cours_txt' => $this->input->post("courstext"),
        'time' => $testtime,
        'time_show' => $testtime_show
      );
      $this->db->where('tp_mid', $this->input->post('testpaperid'));
      $rs = $this->db->update('test_paper', $newdata);
      $new_pid = $this->input->post('testpaperid');
    } else {
      $newdata = array(
        'memid' => $memid,
        'maincatid' => $this->input->post("maincatid"),
        'title' => $newtitle,
        'tp_title_url' => $titleurl,
        'subject' => $only_sub,
        'class' => $only_cours,
        'tot_marks' => $marknum,
        'show_cours_ids' => $this->input->post("coursid"),
        'show_cours_txt' => $this->input->post("courstext"),
        'time' => $testtime,
        'time_show' => $testtime_show,
        'upload_under' => $up_under,
        'created_at' => date("Y-m-d")
      );
      $rs = $this->db->insert('test_paper', $newdata);
      $new_pid = $this->db->insert_id();

      $uniqid = time() . $new_pid . time();
      $undt = array(
        'tp_uid' => $uniqid
      );
      $this->db->where('tp_mid', $new_pid);
      $rs = $this->db->update('test_paper', $undt);
    }

    if($rs){
      echo json_encode( array('status' => 200, 'new_pid' => $new_pid) );
     }else {
      echo json_encode( array('status' => 203) );
     }
  }

  public function save_question()
  {
    $memid = $this->session->userdata('mem_id');
    $testpaperid = $this->input->post('testpaperid');
    $slnum = $this->input->post('slnum');
    $question = $this->input->post('question');

    if (!empty($_FILES['file']['name'])) {
      $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg", "jpeg", "png", "JPG");
      $extension = end($temp);
      if (in_array($extension, $allowed_types)) {
        if ($_FILES['file']['size'] <= 52428800) { //50 MB =(52428800 Bytes (in binary))
          //echo "ok";


          $image = uniqid() . '.' . $extension;


          //die();

          $image_url_mid = './assets/questions-big/' . $image;


          $moving_url_mid = $this->smart_resize_image(
            $_FILES['file']['tmp_name'],
            "", //img string
            1800,
            1800,
            true, //proportional
            'file', //file browser return
            $image_url_mid, //complete url (with file name)
            false,
            95, //quality
            false //grayscale
          );
        }
      }
      $filename = $image;
    } else {
      $filename = NULL;

      if ($this->input->post('quesid') == 0) {
        $filename =  $filename;
      } else {
        $thispaper = $this->db->get_where("test_paper_qs", array('qs_id' => $this->input->post('quesid')))->row_array();
        $filename = $thispaper['img'];
      }
    }
    $newdata = array(
      'test_pid' => $testpaperid,
      'sl_no' => $slnum,
      'ques' => $question,
      'img' => $filename,
      'op1' => $this->input->post('op1'),
      'op2' => $this->input->post('op2'),
      'op3' => $this->input->post('op3'),
      'op4' => $this->input->post('op4'),
      'op5' => $this->input->post('op5'),
      'op6' => $this->input->post('op6'),
      's_mark' => $this->input->post('s_marks'),
      'crt_ans' => $this->input->post('crt_ans'),
      'type' => $this->input->post('qs_typ')
    );
    if ($this->input->post('quesid') == 0) {
      $rs = $this->db->insert('test_paper_qs', $newdata);
      $new_pid = $this->db->insert_id();
    } else {
      $this->db->where('qs_id', $this->input->post('quesid'));
      $rs = $this->db->update('test_paper_qs', $newdata);
    }
  }
  public function save_question_block()
  {
    $memid = $this->session->userdata('mem_id');
    $testpaperid = $this->input->post('testpaperid');
    $slnum = $this->input->post('slnum_blk');
    $question = $this->input->post('question_blk');


    $newdata = array(
      'test_pid' => $testpaperid,
      'sl_no' => $slnum,
      'ques' => $question,
      'type' => $this->input->post('qs_typ')
    );

    if ($this->input->post('quesid') == 0) {
      $rs = $this->db->insert('test_paper_qs', $newdata);
      $new_pid = $this->db->insert_id();
    } else {
      $this->db->where('qs_id', $this->input->post('quesid'));
      $rs = $this->db->update('test_paper_qs', $newdata);
    }
  }

  public function questionlist($paperid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['questions'] = $this->db->get_where("test_paper_qs", array('test_pid' => $paperid))->result_array();

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/questionlist', $data);
    }
  }
  public function teacherpreview($paperid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['personaldata'] = $this->db->get_where("personal_data", array('mem_id' => $memid))->row_array();
    $data['paper'] = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    $data['questions'] = $this->db->get_where("test_paper_qs", array('test_pid' => $paperid))->result_array();

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/teacher_preview', $data);
    }
  }
  public function delete_singleques()
  {

    $this->db->where('qs_id', $this->input->post('ques_id'));
    $rs = $this->db->delete('test_paper_qs');
    if ($rs) {
      echo json_encode(array('status' => 200));
    } else {
      echo json_encode(array('status' => 203));
    }
  }
  public function delete_mainpaper()
  {

    $this->db->where('tp_mid', $this->input->post('paperid'));
    $rs = $this->db->delete('test_paper');
    $this->db->where('test_pid', $this->input->post('paperid'));
    $rs = $this->db->delete('test_paper_qs');
    if ($rs) {
      echo json_encode(array('status' => 200));
    } else {
      echo json_encode(array('status' => 203));
    }
  }




  public function test_dashboard_student()
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");

    if ($this->session->userdata("crent_viewid")) {
      $crntviewid = $this->session->userdata("crent_viewid");
    } else {
      $crntviewid = 0;
    }
    $data['myclass'] = $myclass = $this->db->get_where("class_alotment", array('studentid' => $memid, 'type' => 1, 'alot_type' => 1, 'insid' => $crntviewid))->row_array();
    if ($myclass) {
      $coursby = '';
      $coursget = explode(",", $myclass['for_class']);
      foreach ($coursget as $coursget) {
        $coursby .= "OR find_in_set (" . $coursget . ", `test_paper`.`class`) ";
      }

      $coursby = ltrim($coursby, "OR");
      $coursby = "AND " . $coursby;
    } else {
      $coursby = '';
    }
    $data['papers'] = $papers = $this->db->query("SELECT `test_paper`.*

                                          FROM `test_paper`
                                         
                                         WHERE
                                         `test_paper`.`upload_under` = $crntviewid 
                                         AND
                                         `test_paper`.`is_released` = 1
                                         $coursby
                                         ORDER BY `test_paper`.`tp_mid` DESC
                                    ")->result_array();

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_dashboard_student', $data);
    }
  }

  public function studentmainpaper($paperid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['personaldata'] = $this->db->get_where("personal_data", array('mem_id' => $memid))->row_array();
    $data['paper'] = $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    $data['test_paper_submit'] = $test_paper_submit = $this->db->get_where("test_paper_submit", array('papr_id' => $paperid, 'memid' => $memid,))->row_array();
    $data['myclass'] = $myclass = $this->db->get_where("class_alotment", array('studentid' => $memid, 'type' => 1, 'alot_type' => 1, 'insid' => $crntviewid))->row_array();
    $data['myclass_array'] = $myclass['for_class'];

    $newarraycls = $paper['class'];
    $data['coursename'] = $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array();


    $today = date('Y-m-d');
    $examdate = $paper['exm_date'];

    $papertime = $paper['time'];

    $split_ptime  = explode(":", $papertime);
    $split_hr = $split_ptime[0];
    $split_min = $split_ptime[1];

    $get_d_time = '+' . $split_hr . ' hour +' . $split_min . ' minutes';
    $exam_over_time =  date('H:i', strtotime($get_d_time, strtotime($paper['exm_tim'])));
    $exam_over_time = $examdate . " " . $exam_over_time . ":00";

    $get_d_time_strt = '+0 hour +0 minutes';
    $exam_over_time_strt =  date('H:i', strtotime($get_d_time, strtotime($paper['exm_tim'])));
    $exam_over_time_strt = $examdate . " " . $exam_over_time_strt . ":00";

    $crnttime = date("Y-m-d H:i:s");
    $exmmyDate = date("Y-m-d H:i:s", strtotime($exam_over_time));
    $exmmyDateStrt = date("Y-m-d H:i:s", strtotime($exam_over_time_strt));

    if ($crnttime > $exmmyDate) {
      $data['tim_is_over'] = 1;
    } else {
      $data['tim_is_over']  = 0;
    }
    if ($crnttime > $exmmyDateStrt) {
      $data['tim_is_strt'] = 1;
    } else {
      $data['tim_is_strt']  = 0;
    }

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/student_main_paper', $data);
    }
  }
  public function studentpreview($paperid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['personaldata'] = $this->db->get_where("personal_data", array('mem_id' => $crntviewid))->row_array();
    $data['paper'] = $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    $data['questions'] = $this->db->get_where("test_paper_qs", array('test_pid' => $paperid))->result_array();
    $data['myclass'] = $myclass = $this->db->get_where("class_alotment", array('studentid' => $memid, 'type' => 1, 'alot_type' => 1, 'insid' => $crntviewid))->row_array();
    $data['myclass_array'] = $myclass['for_class'];
    $newarraycls = $paper['class'];
    $data['coursename'] = $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array();
    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/student_preview_page', $data);
    }
  }
  public function studentresult($paperid, $studentid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    if ($this->session->userdata("crent_viewid")) {
      $data['crnt_instid'] = $crnt_instid = $this->session->userdata("crent_viewid");
    } else {
      $data['crnt_instid'] = $crnt_instid = $memid;
    }
    $data['studentid'] = $studentid;
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['personaldata'] = $this->db->get_where("personal_data", array('mem_id' => $crnt_instid))->row_array();
    $data['paper'] = $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    $data['questions'] = $this->db->get_where("test_paper_qs", array('test_pid' => $paperid))->result_array();
    $data['myclass'] = $myclass = $this->db->get_where("class_alotment", array('studentid' => $studentid, 'type' => 1, 'alot_type' => 1, 'insid' => $crnt_instid))->row_array();

    $data['myclass_array'] = $myclass['for_class'];

    $newarraycls = $paper['class'];
    $data['coursename'] = $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array();
    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/student_preview_result', $data);
    }
  }


  public function isstart_paper()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $paperid = $this->input->post('paperid');

    $data = "mem_id=" . $memid . "&crent_viewid=" . $crntviewid . "&paperid=" . $paperid;
    //   $ch = curl_init('http://localhost/infidust/api/testexam/Isstart_paper');
    $ch = curl_init('https://api.infidust.com/testexam/Isstart_paper');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);

    // Process your response here
    // echo '<pre>';
    // print_r($result);
    // if($result['status'] == 'success'){return true;}else{return false;}

    // print_r($result);
    // return true;
    echo 1;
  }

  public function submit_mypaper()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $qesids          = $this->input->post('qesids');
    $ansval          = $this->input->post('andsids');
    $paperid          = $this->input->post('paperid');
    $totmarks          = $this->input->post('totmarks');
    $qesidsList = implode(',', $qesids);
    $ansvalList = implode(',', $ansval);


    $data = "mem_id=" . $memid . "&crent_viewid=" . $crntviewid . "&paperid=" . $paperid . "&qesids=" . $qesidsList . "&andsids=" . $ansvalList . "&totmarks=" . $totmarks;
    // $ch = curl_init('http://localhost/infidust/api/testexam/Submit_mypaper');
    $ch = curl_init('https://api.infidust.com/testexam/Submit_mypaper');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch); // This is the result from the API
    curl_close($ch);
    print_r($result);
    // return true;
    echo 1;
  }
  public function submit_mypaperx()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $qesids          = $this->input->post('qesids');
    $ansval          = $this->input->post('andsids');
    $paperid          = $this->input->post('paperid');
    $totmarks          = $this->input->post('totmarks');
    $paper_submit = $this->db->get_where("test_paper_submit", array('papr_id' => $paperid, 'memid' => $memid, 'instid' => $crntviewid))->row_array();



    $get_tot = 0;
    for ($i = 0; $i < count($qesids); $i++) {
      $thisques = $this->db->get_where("test_paper_qs", array('qs_id' => $qesids[$i]))->row_array();
      $thisanswer = $thisques['crt_ans'];
      // echo   $paperid;
      $newdata = array(
        'spid' => $paper_submit['sp_id'],
        'testpid' => $paperid,
        'qesid' => $qesids[$i],
        'ansid' => $ansval[$i]
      );
      $rs = $this->db->insert('test_paper_submit_qs', $newdata);
      if ($thisanswer == $ansval[$i]) {
        $get_tot = $get_tot + $thisques['s_mark'];
      }
    }

    $newdatap = array(
      'get_tot' => $get_tot,
      'for_tot' => $totmarks,
      'is_complete' => 1
    );
    $this->db->where('papr_id', $paperid);
    $this->db->where('memid', $memid);
    $rs = $this->db->update('test_paper_submit', $newdatap);
  }
  public function setting_save()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $visible          = $this->input->post('visible');
    $exam          = $this->input->post('exam');
    $paperid          = $this->input->post('paperid');
    $instresult          = $this->input->post('instresult');
    $maual_res_re          = $this->input->post('maual_res_re');
    $hashtag          = $this->input->post('hashname');
    $hshtyp = $this->input->post('hshtyp');
    $paper_setting = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();

    $visible_split = explode(" ", $visible);
    $visible_tim = $visible_split[0];
    $visible_dt = $visible_split[1];

    $exam_split = explode(" ", $exam);
    $exam_tim = $exam_split[0];
    $exam_dt = $exam_split[1];

    $sdate = strtotime($exam_dt);
    // echo date("F j, Y",$sdate); die;
    $get_d_time = '';
    $papertime = $paper_setting['time'];

    $split_ptime  = explode(":", $papertime);
    $split_hr = $split_ptime[0];
    $split_min = $split_ptime[1];

    $get_d_time = '+' . $split_hr . ' hour +' . $split_min . ' minutes';

    $mk_ex_end = $exam_dt . " " . $exam_tim;
    $end_deadline_ful = date('Y-m-d H:i', strtotime($get_d_time, strtotime($mk_ex_end)));

    $split_end_ded = explode(" ", $end_deadline_ful);
    $end_d_dt = $split_end_ded[0];
    $end_d_tim = $split_end_ded[1];
    $edate = strtotime($end_d_dt);


    if ($hashtag) {
      $hhss =  rtrim($hashtag, ',');
      $hstag =  $paper_setting['tp_hshtag'] . ',' . $hhss;
      $hsdt = array(
        'tp_hshtag' => $hstag
      );
      $this->db->where('tp_mid', $paperid);
      $rs = $this->db->update('test_paper', $hsdt);
    }



    $newdatap = array(
      'visb_time' => $visible_tim,
      'visb_date' => $visible_dt,
      'visb_systm' => $visible,
      'exm_tim' => $exam_tim,
      'exm_date' => $exam_dt,
      'exm_system' => $exam,
      'instant_r' => $instresult,
      'result_release' => $maual_res_re,
      'start_deadline' => date("F j, Y", $sdate) . " " . $exam_tim . ":00",
      'end_dadeline' => date("F j, Y", $edate) . " " . $end_d_tim . ":00",
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);

    if ($hashtag) {
      $hhss =  rtrim($hashtag, ',');
      $hstg = explode(',', $hhss);
      foreach ($hstg as $value) {
        $exisit = $this->db->get_where("all_hashtag", array('hsh_typ' => $hshtyp, 'hsh_nm' => $value))->row_array();
        if (!$exisit) {
          $adddt = array(
            'hsh_typ' => $hshtyp,
            'hsh_nm' => $value,
            'hsh_created_at' => date('Y-m-d H:m:s')
          );
          $rs = $this->db->insert('all_hashtag', $adddt);
        }
      }
    }
  }
  public function make_release()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $paperid          = $this->input->post('paperid');
    $newdatap = array(
      'is_released' => 1,
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);
  }
  public function ispublish()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $paperid          = $this->input->post('paperid');
    $newdatap = array(
      'tp_ispublish' => 1,
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);
  }
  public function isnotpub()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $paperid          = $this->input->post('paperid');
    $newdatap = array(
      'tp_ispublish' => 0,
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);
  }
  public function make_release_result()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $paperid          = $this->input->post('paperid');
    $newdatap = array(
      'result_release' => 1
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);
  }
  public function assign_user()
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $paperid          = $this->input->post('paperid');
    $userid          = $this->input->post('userid');
    $newdatap = array(
      'memid' => $userid
    );
    $this->db->where('tp_mid', $paperid);
    $rs = $this->db->update('test_paper', $newdatap);
  }

  public function showhashtags($pepid, $srch = null)
  {
    if (is_null($srch)) {
      $data['hshtag'] = $hshtag = $this->db->get_where("test_paper", array('tp_mid' => $pepid))->row_array();
      $this->load->view('testpaper/shohshtg', $data);
    } else {
      $data['hshsrch'] = $hshsrch = $this->db->query("SELECT * FROM `all_hashtag`
                                          WHERE
                                          `all_hashtag`.`hsh_typ` = 'testpaper'
                                          AND
                                          `all_hashtag`.`hsh_nm` LIKE '%$srch%' 
                                    ")->result_array();
      $this->load->view('testpaper/shosearchhsh.php', $data);
    }
  }

  public function remhstg()
  {
    $tpmid  = $this->input->post('memid');
    $hsval =  $this->input->post('hsval');
    $data['hshtag'] = $hshtag  = $this->db->get_where("test_paper", array('tp_mid' => $tpmid))->row_array();
    $tagg = $hshtag['tp_hshtag'];
    $dt = ',' . $hsval;
    $replace = str_replace($dt, '', $tagg);

    $newdatap = array(
      'tp_hshtag' => $replace
    );
    $this->db->where('tp_mid', $tpmid);
    $rs = $this->db->update('test_paper', $newdatap);
    if ($rs) {
      echo json_encode(array('status' => 200));
    } else {
      echo json_encode(array('status' => 203));
    }
  }


  public function paper_manage_person($paperid)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    $thisuser =  $paper['memid'];
    $data['member'] = $member = $this->db->get_where("personal_data", array('mem_id' => $thisuser))->row_array();

    $this->load->view('testpaper/paper_manag_person', $data);
  }
  public function paper_manage_search($searchval = NULL)
  {
    $data['memid'] = $memid = $this->session->userdata("mem_id");

    $data['member'] = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                         WHERE
                                         `my_institute`.`instu_id` = $memid
                                         AND
                                         `my_institute`.`is_active` = 1 
                                         AND
                                         `my_institute`.`type` = 2 
                                          AND
                                         `personal_data`.`teacher_nm` LIKE '%$searchval%'
                                       
                                         ORDER BY `my_institute`.`my_jn_inid` DESC LIMIT 5
                                    ")->result_array();
    $this->load->view('testpaper/paper_manag_person_search', $data);
  }

  public function test_report_list($paperid)
  {

    $data['memid'] = $memid = $this->session->userdata("mem_id");
    $crntviewid = $this->session->userdata("crent_viewid");
    $data['personaldata'] = $this->db->get_where("personal_data", array('mem_id' => $memid))->row_array();
    $data['paper'] = $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();

    $newarraycls = $paper['class'];
    $data['coursename'] = $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array();


    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_report_list', $data);
    }
  }



  public function test_report_list_student($coursid, $paperid)
  {
    $data['coursid'] = $coursid;
    $data['memid'] = $memid = $this->session->userdata("mem_id");
    if ($this->session->userdata("crent_viewid")) {
      $data['crnt_instid'] = $crnt_instid = $this->session->userdata("crent_viewid");
    } else {
      $data['crnt_instid'] = $crnt_instid = $memid;
    }
    $data['paperid'] = $paperid;
    $data['paper'] = $paper = $this->db->get_where("test_paper", array('tp_mid' => $paperid))->row_array();
    // $coursby = "AND find_in_set (".$coursget.", `class_alotment`.`for_class`) ";
    $coursby = "AND find_in_set (" . $coursid . ", `class_alotment`.`for_class`) ";
    $data['student'] = $this->db->query("SELECT `my_institute`.*,
                                            `personal_data`.*,
                                            `class_alotment`.*

                                          FROM `my_institute`
                                          INNER JOIN `personal_data` ON `my_institute`.`mymemid` = `personal_data`.`mem_id`
                                          INNER JOIN `class_alotment` ON `my_institute`.`mymemid` = `class_alotment`.`studentid`
                                         WHERE
                                         `my_institute`.`instu_id` = $crnt_instid
                                         AND
                                         `my_institute`.`is_active` = 1 
                                         AND
                                         `my_institute`.`type` = 1 
                                          AND
                                         `class_alotment`.`alot_type` = 1
                                        $coursby
                                         ORDER BY `personal_data`.`teacher_nm`
                                    ")->result_array();


    $today = date('Y-m-d');
    $examdate = $paper['exm_date'];

    $papertime = $paper['time'];

    $split_ptime  = explode(":", $papertime);
    $split_hr = $split_ptime[0];
    $split_min = $split_ptime[1];

    $get_d_time = '+' . $split_hr . ' hour +' . $split_min . ' minutes';
    $exam_over_time =  date('H:i', strtotime($get_d_time, strtotime($paper['exm_tim'])));
    $exam_over_time = $examdate . " " . $exam_over_time . ":00";

    $get_d_time_strt = '+0 hour +0 minutes';
    $exam_over_time_strt =  date('H:i', strtotime($get_d_time, strtotime($paper['exm_tim'])));
    $exam_over_time_strt = $examdate . " " . $exam_over_time_strt . ":00";

    $crnttime = date("Y-m-d H:i:s");
    $exmmyDate = date("Y-m-d H:i:s", strtotime($exam_over_time));
    $exmmyDateStrt = date("Y-m-d H:i:s", strtotime($exam_over_time_strt));

    if ($crnttime > $exmmyDate) {
      $data['tim_is_over'] = 1;
    } else {
      $data['tim_is_over']  = 0;
    }
    if ($crnttime > $exmmyDateStrt) {
      $data['tim_is_strt'] = 1;
    } else {
      $data['tim_is_strt']  = 0;
    }

    if (!$this->session->userdata("mem_id")) {
      redirect(base_url());
    } else {
      $this->load->view('testpaper/test_report_list_student', $data);
    }
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
