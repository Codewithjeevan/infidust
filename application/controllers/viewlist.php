<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Viewlist extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

 public function view_list(){

       $memid = $this->session->userdata("mem_id");
     if($this->session->userdata("crent_viewid")){
         $crntviewid = $this->session->userdata("crent_viewid");
       }else{
        $crntviewid = 0;
       }
        
 $data['myalotment'] = $myalotment = $this->db->get_where("class_alotment", array('studentid' => $memid,'type' => 1,'alot_type' => 1,'insid' => $crntviewid))->row_array();
 if($myalotment){
 $mycourse = $myalotment['for_class'];
 //echo  $mycourse; die;
  $mycourse = explode(",", $mycourse);
   $sqlfind = "";
foreach ($mycourse as $mycourses) {
 $sqlfind .= "OR FIND_IN_SET(".$mycourses.", `materials_details`.`for_private_cors`) ";
}
  $sqlfind = substr($sqlfind, 2);
  $sqlfind = "AND ".$sqlfind;
}else{
   $sqlfind = "";
}
//echo $sqlfind; die;
  $data['materials'] = array();

   $data['materials'] =  $this->db->query("SELECT `materials`.*,
                                            `materials_details`.*,
                                            `personal_data`.`mem_id`,
                                            `personal_data`.`pro_pic`,
                                            `personal_data`.`teacher_nm`

                                          FROM `materials`
                                          INNER JOIN `materials_details` ON `materials`.`metid` = `materials_details`.`vmid`
                                          INNER JOIN `personal_data` ON `materials`.`isntid` = `personal_data`.`mem_id`
                                         WHERE
                                         `materials`.`is_upload` = 1
                                         AND
                                         `materials`.`upload_under` = $crntviewid
                                         $sqlfind
                                         ORDER BY
                                          `materials`.`metid`
                                          DESC

                                    ")->result_array();


 // print_r($data['materials']); die;
       if(!$this->session->userdata("mem_id")){
         redirect(base_url());
       }else{
          $this->load->view('viewlist/personal_list',$data);
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