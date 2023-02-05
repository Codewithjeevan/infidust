<?php
defined('BASEPATH') or exit('No direct script access allowed');

class publicsrch extends CI_Controller
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

  //institute search

  public function instidashbord($srch)
  {
    
    if (is_numeric($srch)) {
      $data['memid'] = $srch;
    } else {
      $data['srch'] = $srch;
    }  
    $this->load->view('public/institute/container', $data);
  }

  public function srchlist($srch)
  {
    $data['srch'] = $srch; 
    $data['srchlist'] = $srchlist = $this->db->query("SELECT     `allcourse`.*,
                                            `mycourse`.*,
                                            `personal_data`.*

                                          FROM `allcourse`
                                          INNER JOIN `mycourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                          INNER JOIN `personal_data` ON `mycourse`.`for_memid` = `personal_data`.`mem_id`
                                          WHERE
                                          `allcourse`.`cours_nm_url` LIKE '%$srch%'
                                          ORDER BY `allcourse`.`cours_nm` ASC
                                        ")->result_array();
    $this->load->view('public/institute/srchlist', $data);
  }

  public function profiledata($memid)
  {
    $data['profile'] = $profile =  $this->db->get_where("personal_data", array("mem_id" =>$memid))->row_array();
    $data['profcours'] = $profcours = $this->db->query("SELECT     `personal_data`.*,
                                            `mycourse`.*,                                            
                                            `allcourse`.*                                            

                                          FROM `personal_data`
                                          INNER JOIN `mycourse` ON `personal_data`.`mem_id` = `mycourse`.`for_memid`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                          WHERE
                                          `personal_data`.`mem_id` = '$memid'
                                          ORDER BY `allcourse`.`cours_nm` ASC
                                        ")->result_array();
                                        // var_dump($profcours); die;
   $this->load->view('public/institute/insti_profile',$data);
  }

  //institute search end
  //testpaper search

  public function testdashbord($srch)
  {
    
    if (is_numeric($srch)) {
      $data['memid'] = $srch;
    } else {
      $data['srch'] = $srch;
    }  
    $this->load->view('public/testpaper/container', $data);
  }

  public function testsrchlist($srch)
  {
    $data['srch'] = $srch; 
    $data['testsrchlist'] = $testsrchlist = $this->db->query("SELECT     `all_hashtag`.*,
                                            `test_paper`.*,
                                            `personal_data`.*

                                          FROM `all_hashtag`
                                          INNER JOIN `test_paper` ON `test_paper`.`hashtag` LIKE CONCAT('%', all_hashtag.hsh_nm, '%') 
                                          INNER JOIN `personal_data` ON `test_paper`.`memid` = `personal_data`.`mem_id`
                                          WHERE
                                          `all_hashtag`.`hsh_url` LIKE '%$srch%'
                                          AND
                                          `all_hashtag`.`hsh_typ` = 'testpaper'

                                          ORDER BY `all_hashtag`.`hsh_url` ASC
                                        ")->result_array();
    $this->load->view('public/testpaper/testsrchlist', $data);
  }

  public function testprofiledata($memid)
  {
    $data['profile'] = $profile =  $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['testprofcours'] = $testprofcours = $this->db->query("SELECT     `personal_data`.*,
                                            `mycourse`.*,                                            
                                            `allcourse`.*                                            

                                          FROM `personal_data`
                                          INNER JOIN `mycourse` ON `personal_data`.`mem_id` = `mycourse`.`for_memid`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                          WHERE
                                          `personal_data`.`mem_id` = '$memid'
                                          ORDER BY `allcourse`.`cours_nm` ASC
                                        ")->result_array();
                                        // var_dump($profcours); die;
   $this->load->view('public/testpaper/testinsti_profile',$data);
  }

  //testpaper search end
  //material search

  public function matdashbord($srch)
  {
    
    if (is_numeric($srch)) {
      $data['memid'] = $srch;
    } else {
      $data['srch'] = $srch;
    }  
    $this->load->view('public/material/container', $data);
  }

  public function matsrchlist($srch)
  {
    $data['srch'] = $srch; 
    $data['matsrchlist'] = $matsrchlist = $this->db->query("SELECT     `all_hashtag`.*,
                                            `materials_details`.*,
                                            `materials`.*,
                                            `personal_data`.*


                                          FROM `all_hashtag`
                                          INNER JOIN `materials_details` ON `materials_details`.`hashtag` LIKE CONCAT('%', all_hashtag.hsh_nm, '%') 
                                          INNER JOIN `materials` ON `materials_details`.`vmid` = `materials`.`metid`
                                          INNER JOIN `personal_data` ON `materials_details`.`memid` = `personal_data`.`mem_id`
                                          WHERE
                                          `all_hashtag`.`hsh_url` LIKE '%$srch%'
                                          AND
                                          `all_hashtag`.`hsh_typ` = 'material'

                                          ORDER BY `all_hashtag`.`hsh_url` ASC
                                        ")->result_array();
                                        // var_dump($matsrchlist); die;
    $this->load->view('public/material/matsrchlist', $data);
  }

  public function matprofiledata($memid)
  {
    $data['profile'] = $profile =  $this->db->get_where("personal_data", array("mem_id" => $memid))->row_array();
    $data['matprofcours'] = $matprofcours = $this->db->query("SELECT     `personal_data`.*,
                                            `mycourse`.*,                                            
                                            `allcourse`.*                                            

                                          FROM `personal_data`
                                          INNER JOIN `mycourse` ON `personal_data`.`mem_id` = `mycourse`.`for_memid`
                                          INNER JOIN `allcourse` ON `mycourse`.`allcourse_id` = `allcourse`.`cours_id`
                                          WHERE
                                          `personal_data`.`mem_id` = '$memid'
                                          ORDER BY `allcourse`.`cours_nm` ASC
                                        ")->result_array();
                                        // var_dump($profcours); die;
   $this->load->view('public/material/matinsti_profile',$data);
  }

  //material search end



  //////////////////////////////////////////
  private function is_validated()
  {
    if ($this->session->userdata('validated')) {
      return TRUE;
    } else {
      return FALSE;
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
