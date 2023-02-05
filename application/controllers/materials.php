<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Materials extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

 public function materials_dashboard(){

       $memid = $this->session->userdata("mem_id");
      if($this->session->userdata("mem_type") == 'teacher'){
        $get_sql = "`materials`.`isntid` = $memid";
      }else{
        $get_sql = "`materials`.`upload_under` = $memid";
      }

        $data['materials'] = $materials = $this->db->query("SELECT `materials`.*,
                                            `materials_details`.*,
                                            `personal_data`.`mem_id`,
                                            `personal_data`.`teacher_nm`

                                          FROM `materials`
                                          INNER JOIN `materials_details` ON `materials`.`metid` = `materials_details`.`vmid`
                                          INNER JOIN `personal_data` ON `materials`.`isntid` = `personal_data`.`mem_id`
                                         WHERE
                                         `materials`.`is_upload` = 1
                                         AND
                                         $get_sql
                                         ORDER BY
                                          `materials`.`metid`
                                          DESC

                                         
                                    ")->result_array();

       if(!$this->session->userdata("mem_id")){
         redirect(base_url());
       }else{
          $this->load->view('institute/materials',$data);
        }
        
    }
 public function materials_edit($editid){

       $memid = $this->session->userdata("mem_id");
       
       if($this->session->userdata("mem_type") == 'teacher'){
        $inst_id = $this->session->userdata("crent_viewid");
         $class_for_t = $this->db->get_where("class_alotment", array('insid' => $inst_id,'teacherid' => $memid))->row_array();
        $data['teacher_cls_ary'] = $class_for_t['for_class'];
      }else{
        $inst_id = $memid;
      }
         $data['materials'] = $materials = $this->db->query("SELECT `materials`.*,
                                            `materials_details`.*

                                          FROM `materials`
                                          INNER JOIN `materials_details` ON `materials`.`metid` = `materials_details`.`vmid`
                                         WHERE
                                         `materials_details`.`md_id` = $editid
                                        
                                         
                                    ")->row_array();
         
            $data['mycourse'] = $mycourse = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                         WHERE
                                         `mycourse`.`for_memid` = $inst_id
                                         
                                    ")->result_array();

       if(!$this->session->userdata("mem_id")){
         redirect(base_url());
       }else{
          $this->load->view('institute/materials_edit',$data);
        }
        
    }
 public function material_thumb(){
    $memid = $this->session->userdata("mem_id");
    if($this->session->userdata("crent_viewid")){
    $up_under = $this->session->userdata("crent_viewid");
  }else{
    $up_under = $this->session->userdata("mem_id");
  }
        $query = $this->db->query("SELECT * FROM materials ORDER BY metid DESC LIMIT 1");
        $result = $query->row_array();
        $newuid = $result['muid'] + 1;
           $data = array(
                  'cr_video_uid' => $newuid
                   );
           $this->session->set_userdata($data);
        $filename =$newuid.uniqid().'.jpg';

    if (file_get_contents('php://input')){
        // Remove the headers (data:,) part.
        $filteredData=substr(file_get_contents('php://input'), strpos(file_get_contents('php://input'), ",")+1);

        // Need to decode before saving since the data we received is already base64 encoded
        $decodedData=base64_decode($filteredData);

        //create the file
       // fopen(__DIR__."/../pronunciations/".$target,'w+');
        if($fp = fopen( "./assets/vthumb/".$filename, 'wb+' )){
            fwrite( $fp, $decodedData);
            fclose( $fp );
             $newmem = array(
                'muid' => $newuid,
                'isntid' => $memid,
                'thumb' => $filename,
                'is_upload' => 0,
                'upload_under' => $up_under,
                'up_date_show' => date('F j, Y'),
                'up_date' => date("Y-m-d")
                );  
           $rs = $this->db->insert('materials',$newmem);
           $new_vid = $this->db->insert_id();
           $newmem = array(
                'thm_uid' => $newuid,
                'memid' => $memid,
                'v_id' => $new_vid,
                'thumbs' => $filename
                );  
           $rs = $this->db->insert('materials_thumbs',$newmem);
           $newmem = array(
                'vmid' => $new_vid,
                'memid' => $memid,
                'upload_under' => $up_under
                );  
           $rs = $this->db->insert('materials_details',$newmem);
           $new_deid = $this->db->insert_id();
           
            echo $new_deid;
        } else {
            echo ""; //error msg
        }
}

//echo "Created image ".$filename;

 }
 public function material_vupload(){
  $memid = $this->session->userdata("mem_id");
  $vuid = $this->session->userdata("cr_video_uid");
      $unicid = $this->input->post('uniid');
      $fileName = $_FILES["mainmaterials"]["name"]; // The file name
      $fileTmpLoc = $_FILES["mainmaterials"]["tmp_name"]; // File in the PHP tmp folder
      $fileType = $_FILES["mainmaterials"]["type"]; // The type of file it is
      $fileSize = $_FILES["mainmaterials"]["size"]; // File size in bytes
     // $filePtime = $_FILES["mainmaterials"]["duration"]; // File size in bytes
      $fileErrorMsg = $_FILES["mainmaterials"]["error"]; // 0 for false... and 1 for true

      $temp = explode(".", $fileName);
       $allowed_types = array("mp4","wmv","m4v","mov","webm","asf","avi","mpg","mpeg","pdf","doc","zip","docx","xlsx","xls","jpg","jpeg","png","JPG","ppt","pptx","pptm");
      $extension = end($temp);
      if($extension == 'mp4' || $extension == 'wmv' || $extension == 'm4v' || $extension == 'mov' || $extension == 'webm' || $extension == 'asf' || $extension == 'avi' || $extension == 'mpg' || $extension == 'mpeg'){
        $filetype = 'video/'.$extension;
      }else{
        $filetype = 'file/'.$extension;
      }
      // $filename_mk = uniqid() . '.mp4';
      $filename_mk = uniqid().'.'.$extension;

      if (!$fileTmpLoc) { // if file not chosen
          echo "ERROR: Please browse for a file before clicking the upload button.";
          exit();
      }
      if(move_uploaded_file($fileTmpLoc, "./assets/videos/$filename_mk")){
        $newmem = array(
                'isntid' => $memid,
                'filenm' => $filename_mk,
                'file_type' => $filetype,
                'file_url' => uniqid(),
                'is_upload' => 1,
                'f_size' => $fileSize
                );  
         $this->db->where('muid', $vuid);
         $rs = $this->db->update('materials', $newmem);

        if($rs){
         // $this->session->unset_userdata('cr_video_uid');
          echo "Upload is complete";
        }
      } else {
          echo "Upload failed";
      }
        
    }
    public function matdetailsupdate(){
       $memid = $this->session->userdata("mem_id");
      // echo $this->input->post("title");
       $coursary = $this->input->post("coursary");
       $hascoma = $coursary[0];

       if($hascoma == ','){
        $chosen_cours = substr($coursary, 1);
       }else{
         $chosen_cours = $coursary;
       }


       $upData = array(
                'title' => $this->input->post("title"),
                'key_words' => $this->input->post("title"),
                'descp' => $this->input->post("description"),
                'visibility' => $this->input->post("for_visibl"),
                'for_private_cors' => $chosen_cours,
                'is_active' => 1
                
              );
                   $this->db->where('memid', $memid);
                   $this->db->where('md_id', $this->input->post("meditid"));
                   $rs = $this->db->update('materials_details', $upData);
                     if($rs){
         // $this->session->unset_userdata('cr_video_uid');
        $checkthumb = $this->db->get_where("materials", array('metid' => $this->input->post("meditvmid")))->row_array();
                      
        $filetype = $checkthumb['file_type'];
        list($firstone) = explode("/", $filetype);
        if($firstone == 'file'){
                 unlink("assets/vthumb/".$checkthumb['thumb']);  
                 // $this->db->where('v_id', $checkthumb['metid']);
                 // $this->db->delete('materials_thumbs');
        }
        

          echo "Upload is complete";
        }
        else {
          echo "Upload failed";
      }
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