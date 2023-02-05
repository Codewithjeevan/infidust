<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Company extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

 public function admin_panel(){
       $memid = $this->session->userdata("mem_id");
       $data['members'] = $members = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
          $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" =>$memid))->row_array();
      
      if(!$this->session->userdata("mem_id")){
        redirect(base_url());
       }else{
          $this->load->view('company/container',$data);
       }
        
    }
 public function notlive(){
       $memid = $this->session->userdata("mem_id");
      
       $this->load->view('teacher/notlive');
  
    } 
    public function dashboard(){
       $memid = $this->session->userdata("mem_id");
       $data['visitor'] = $visitor = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
     // $data['isinstitute'] = $isinstitute = $this->db->get_where("my_institute", array("mymemid" =>$memid, "is_active" =>1))->row_array();
     
       $this->db->from('members');
          // $this->db->where('mem_type', 'main');
          $query = $this->db->get();
          $data['tot_members'] = $tot_members = $query->num_rows();

       $this->db->from('members');
           $this->db->where('mem_type', 'institute');
          $query = $this->db->get();
          $data['tot_institute'] = $tot_institute = $query->num_rows();

       $this->db->from('members');
           $this->db->where('mem_type', 'student');
          $query = $this->db->get();
          $data['tot_student'] = $tot_student = $query->num_rows();

        $this->load->view('company/dashboard', $data);
  
    }
 public function allteacher(){
       $data['memid'] =$memid = $this->session->userdata("mem_id");
      
       

       $data['self'] = $self = $this->db->query("SELECT `members`.*,
                                            `personal_data`.*

                                          FROM `members`
                                          INNER JOIN `personal_data` ON `members`.`member_id` = `personal_data`.`mem_id`
                                         WHERE
                                         `members`.`mem_type` = 'institute'
                                        ORDER BY
                                        `members`.`member_id` DESC                                      
                                    ")->result_array();  

      
       $this->load->view('company/allteacher',$data);
  
        
    }

 public function allstudent(){
       $data['memid'] =$memid = $this->session->userdata("mem_id");
      
       

       $data['self'] = $self = $this->db->query("SELECT `members`.*,
                                            `personal_data`.*

                                          FROM `members`
                                          INNER JOIN `personal_data` ON `members`.`member_id` = `personal_data`.`mem_id`
                                         WHERE
                                         `members`.`mem_type` = 'student'
                                        ORDER BY
                                        `members`.`member_id` DESC                                  
                                    ")->result_array();  

      
       $this->load->view('company/allstudent',$data);
  
        
    }



  public function removeuser(){
   $memid = $this->session->userdata("mem_id");

        $this->db->where('member_id',$this->input->post('userid'));
        $rs = $this->db->delete('members');

        $this->db->where('mem_id',$this->input->post('userid'));
        $rs = $this->db->delete('personal_data');

        $this->db->where('mymemid',$this->input->post('userid'));
        $rs = $this->db->delete('my_institute');

        $this->db->where('studentid',$this->input->post('userid'));
        $rs = $this->db->delete('class_alotment');

       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

 }

  public function removeuserx(){
   $memid = $this->session->userdata("mem_id");

        $this->db->where('member_id',$this->input->post('userid'));
        $rs = $this->db->delete('members');

        $this->db->where('mem_id',$this->input->post('userid'));
        $rs = $this->db->delete('personal_data');

        $this->db->where('instu_id',$this->input->post('userid'));
        $rs = $this->db->delete('my_institute');

        $this->db->where('insid',$this->input->post('userid'));
        $rs = $this->db->delete('class_alotment');

       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

 }





    // .........................
 public function srch_institute(){
       $memid = $this->session->userdata("mem_id");
    
       $this->load->view('teacher/srch_institute');
  
    }

     public function reslt_insti($srchval){
       $memid = $this->session->userdata("mem_id");
     
       $srchval = urldecode($srchval);
       $crsnameval = preg_replace('/\s+/', ' ', $srchval);

        $data['allmysntlist'] = $allmysntlist = $this->db->query(" SELECT `personal_data`.*

                                           FROM `personal_data`
                                          
                                           WHERE LOWER(`personal_data`.`insti_nm`) LIKE '%$crsnameval%'
                                           AND
                                           `personal_data`.`memtyp` = 'institute'
                                          ORDER BY `personal_data`.`psdata_id` LIMIT 20
              ")->result_array();

       $this->load->view('teacher/reslt_insti',$data);
  
        
    }
    
 public function requestjoins(){
  $memid = $this->session->userdata("mem_id");
      $data['myinsti'] = $myinsti = $this->db->get_where("my_institute", array("mymemid" =>$memid, "instu_id" =>$this->input->post("instid")))->row_array();
      if($myinsti){
        echo json_encode( array('status' => 204) );
      }else{

       $upData = array(
            
                'mymemid' => $memid,
                'instu_id' => $this->input->post("instid"),
                'join_at_dt' => date('Y-m-d')
                
              );
                  
                   $rs = $this->db->insert('my_institute', $upData);
             if(!$rs){
              echo json_encode( array('status' => 203) );
            }else{
              echo json_encode( array('status' => 200) );
            }
      }
 }
 public function institue_profile(){
       $memid = $this->session->userdata("mem_id");
      $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" =>$memid))->row_array();
      $data['userdata'] = $userdata = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
       $this->load->view('teacher/institue_profile',$data);
  
        
    }
 public function institue_course(){
       $memid = $this->session->userdata("mem_id");
      $data['allcourse'] = $allcourse = $this->db->get_where("allcourse", array())->result_array();
       $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
       $this->load->view('teacher/institue_course',$data);
  
        
    }
 public function institue_allcourdef($maincatid){
       $memid = $this->session->userdata("mem_id");
       if($maincatid == 0){
         $data['allcourse'] = $allcourse = $this->db->query(" SELECT `allcourse`.*

                                           FROM `allcourse`
                                          ORDER BY `allcourse`.`cours_id` LIMIT 80

                                          ")->result_array();
       }else{
          $data['allcourse'] = $allcourse = $this->db->get_where("allcourse", array("cr_maincatid" =>$maincatid))->result_array();
      
       }
       
       $this->load->view('teacher/institue_allcourdef',$data);
  
        
    }
 public function institue_allcoursesrch($srchval){
       $memid = $this->session->userdata("mem_id");
     
       $srchval = urldecode($srchval);
       $crsnameval = preg_replace('/\s+/', ' ', $srchval);

        $data['allsrchcourse'] = $allsrchcourse = $this->db->query(" SELECT `allcourse`.*

                                           FROM `allcourse`
                                          
                                           WHERE LOWER(`allcourse`.`cours_nm`) LIKE '%$crsnameval%'
                                          ORDER BY `allcourse`.`cours_id` LIMIT 20
              ")->result_array();

       $this->load->view('teacher/institue_allcoursesrch',$data);
  
        
    }
 public function institue_mycourse(){
       $memid = $this->session->userdata("mem_id");
       $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
       $this->load->view('teacher/institue_mycourse',$data);
  
        
    }

 public function updateprofile(){
       $memid = $this->session->userdata("mem_id");

      
       $upData = array(
            
                'address' => $this->input->post("instaddr"),
                'city' => $this->input->post("instcity"),
                'state' => $this->input->post("inststat")
                
              );
                   $this->db->where('mem_id', $memid);
                   $rs = $this->db->update('personal_data', $upData);
       $upData = array(
                'cus_fname' => $this->input->post("instfnm"),
                'cus_lname' => $this->input->post("instlnm"),
                'is_live' => 1
                
              );
                   $this->db->where('member_id', $memid);
                   $rs = $this->db->update('members', $upData);
            if(!$rs){
              echo json_encode( array('status' => 203) );
            }else{
              echo json_encode( array('status' => 200) );
            }
        
    }
 public function updateprofiletwo(){
       $memid = $this->session->userdata("mem_id");

      
       $upData = array(
            
                'qualif' => $this->input->post("quatific")
                
              );
                   $this->db->where('mem_id', $memid);
                   $rs = $this->db->update('personal_data', $upData);
       
            if(!$rs){
              echo json_encode( array('status' => 203) );
            }else{
              echo json_encode( array('status' => 200) );
            }
        
    }

    public function updateprofile_pic(){
   $memid = $this->session->userdata("mem_id");

     if ( !empty($_FILES['file']['name']))
      {
        $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg","jpeg","png","JPG");
      $extension = end($temp);
      if( in_array($extension, $allowed_types)) 
      { 
        if($_FILES['file']['size'] <= 52428800) 
        { //50 MB =(52428800 Bytes (in binary))
                            //echo "ok";
                
              
              $image = uniqid() . '.'.$extension;
              
                
                            //die();
                                                
                                          $image_url_mid = './assets/pro-big/'.$image;        
                                          $image_url_small = './assets/pro-mid/'.$image;       
                                          $image_url_vsmall = './assets/pro-sml/'.$image;       
                                          
                                         
                                          $moving_url_mid = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                                      "",//img string
                                                      1100, 1100, 
                                                      true, //proportional
                                                      'file', //file browser return
                                                      $image_url_mid, //complete url (with file name)
                                                      false,
                                                      95, //quality
                                                      false //grayscale
                                          ); 
                                          $moving_url_sml = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                                      "",//img string
                                                      600, 600, 
                                                      true, //proportional
                                                      'file', //file browser return
                                                      $image_url_small, //complete url (with file name)
                                                      false,
                                                      90, //quality
                                                      false //grayscale
                                          ); 
                                          $moving_url_vsmall = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                                      "",//img string
                                                      200, 200, 
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

  
      public function addnewcourse(){
   $memid = $this->session->userdata("mem_id");
         $data['allcat'] = $allcat = $this->db->get_where("mycourse", array("allcourse_id" =>$this->input->post('catid'), "for_memid" => $memid))->row_array();
     
     if(!$allcat){
        $newmem = array(
                'for_memid' => $memid,
                'allcourse_id' => $this->input->post('catid'),
                'cr_mncatid' => $this->input->post('maincatid')
                );  
        $rs = $this->db->insert('mycourse',$newmem);
       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

    }else {
      echo json_encode( array('status' => 204) );
    }
    

 }
  
      public function addnewcouruser(){
   $memid = $this->session->userdata("mem_id");
   $newcrsval = $this->input->post('newcsval');
      
        $newmem = array(
                'cours_nm' => $newcrsval,
                'bymem' => $memid
                );  
        $rs = $this->db->insert('allcourse',$newmem);
        $new_crsid = $this->db->insert_id();
        $newmem = array(
                'allcourse_id' => $new_crsid,
                'for_memid' => $memid
                );  
        $rs = $this->db->insert('mycourse',$newmem);
       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

 }
  
      public function revmycourse(){
   $memid = $this->session->userdata("mem_id");

        $this->db->where('mycours_id',$this->input->post('catid'));
        $rs = $this->db->delete('mycourse');

       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

 }

  public function institue_subject(){
       $memid = $this->session->userdata("mem_id");
      $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
       $this->load->view('teacher/institue_subject',$data);
  
        
    }
  public function institue_mysubject(){
       $data['memid'] = $memid = $this->session->userdata("mem_id");

      $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $memid
                                         
                                    ")->result_array();
       $this->load->view('teacher/institue_mysubject',$data);
  
        
    }

  public function addnewsubjet(){
   $memid = $this->session->userdata("mem_id");
   $newrsub = $this->input->post('newrsub');
   $mycours = $this->input->post('mycours');
   $thisubid = $this->input->post('thisubid');
   
        $newmem = array(
                'subject_nm' => $newrsub,
                'mycous_id' => $mycours,
                'for_memid' => $memid
                );  
        if($thisubid == 0){
            $rs = $this->db->insert('ins_subject',$newmem);
        }else{
          $this->db->where('subj_id', $thisubid);
           $rs = $this->db->update('ins_subject', $newmem);
        }
        
        
       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }

 }
      public function revmysub(){
   $memid = $this->session->userdata("mem_id");

        $this->db->where('subj_id',$this->input->post('catid'));
        $rs = $this->db->delete('ins_subject');

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
    ///////////////
    private function smart_resize_image($file,
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
      
        if ( $height <= 0 && $width <= 0 ) return false;
        if ( $file === null && $string === null ) return false;

        # Setting defaults and meta
        $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
        $image                        = '';
        $final_width                  = 0;
        $final_height                 = 0;
        list($width_old, $height_old) = $info;
        $cropHeight = $cropWidth = 0;

        # Calculating proportionality
        if ($proportional) {
          if      ($width  == 0)  $factor = $height/$height_old;
          elseif  ($height == 0)  $factor = $width/$width_old;
          else                    $factor = min( $width / $width_old, $height / $height_old );

          $final_width  = round( $width_old * $factor );
          $final_height = round( $height_old * $factor );
        }
        else {
          $final_width = ( $width <= 0 ) ? $width_old : $width;
          $final_height = ( $height <= 0 ) ? $height_old : $height;
          $widthX = $width_old / $width;
          $heightX = $height_old / $height;
          
          $x = min($widthX, $heightX);
          $cropWidth = ($width_old - $width * $x) / 2;
          $cropHeight = ($height_old - $height * $x) / 2;
        }

        # Loading image to memory according to type
        switch ( $info[2] ) {
          case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;      
          case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
          default: return false;
        }
        
        # Making the image grayscale, if needed
        if ($grayscale) {
          imagefilter($image, IMG_FILTER_GRAYSCALE);
        }    
        
        # This is the resizing/resampling/transparency-preserving magic
        $image_resized = imagecreatetruecolor( $final_width, $final_height );
        if ( $info[2] == IMAGETYPE_PNG ) {
          $transparency = imagecolortransparent($image);
          $palletsize = imagecolorstotal($image);

          if ($transparency >= 0 && $transparency < $palletsize) {
            $transparent_color  = imagecolorsforindex($image, $transparency);
            $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
            imagefill($image_resized, 0, 0, $transparency);
            imagecolortransparent($image_resized, $transparency);
          }
          elseif ($info[2] == IMAGETYPE_PNG) {
            imagealphablending($image_resized, false);
            $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
            imagefill($image_resized, 0, 0, $color);
            imagesavealpha($image_resized, true);
          }
        }
        imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
        
        
        # Preparing a method of providing result
        switch ( strtolower($output) ) {
          case 'browser':
            $mime = image_type_to_mime_type($info[2]);
            header("Content-type: $mime");
            $output = NULL;
          break;
          case 'file':
            $output = $output_url;//full path(including file name)
            // $output = 'uploads/'.$file;
          break;
          case 'return':
            return $image_resized;
          break;
          default:
          break;
        }
        
        # Writing image according to type to the output destination and image quality
        switch ( $info[2] ) {
          case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
          case IMAGETYPE_PNG:
            $quality = 9 - (int)((0.9*$quality)/10.0);
            imagepng($image_resized, $output, $quality);
            break;
          default: return false;
        }

        return true;
    }
}

?>