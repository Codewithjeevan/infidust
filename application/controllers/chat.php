<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class Chat extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
             date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

   

 public function letschat($randid, $myuserid, $chanelid, $mymsg){
        $datamsg = urldecode($mymsg);
       // $datamsg = utf8_decode($mymsg);
       // $datamsg = $mymsg;
       $randid = utf8_decode(urldecode($randid));

        $updata = array(
                                'ch_uid' => $randid,
                                'chanel_id' => $chanelid,
                                'user_id' => $myuserid,
                                'data' => $datamsg,
                                'data_type' => 'text',
                                'created_at' => date('Y-m-d H:i:s'),
                                'chtime' => date("h:i a"),
                                'cdate' => date("Y-m-d")
                                
                            ); 
          $rs = $this->db->insert('chat',$updata);
                   // $upchaneldate = array(
                   //               'created_at' => date('Y-m-d H:i:s')
                                
                   //          ); 
                            //  $this->db->where('chanel_id', $chanelid);
                            // $rs = $this->db->update('chanels', $upchaneldate);
          if(!$rs){
                  $response = array(
                    'response' => "N"
                    );
                   // echo json_encode( array('response' => "N") );
                }else{
                  $response = array(
                                'response' => "Y",
                                'chtime' => date("h:i a")
                                 ); 
                   // echo json_encode( array('response' => "Y", 'chtime' => date("h:i a")) );
                }

          echo $_GET['callback'] . '('.json_encode($response).')';
         

 }

 public function msgseenup($thismsgid){
       $thismsgid = utf8_decode(urldecode($thismsgid));

        $upseen = array(
                                'msg_sts' => 2
                                
                            ); 
                              $this->db->where('ch_uid', $thismsgid);
                             $rs = $this->db->update('chat', $upseen);
                  if(!$rs){
                  $response = array(
                    'response' => "N"
                    );
                  }else{
                  $response = array(
                                'response' => "Y"
                                 ); 
                }

          echo $_GET['callback'] . '('.json_encode($response).')';


 }

  public function getallmsg($chanelid, $friendid){
    $this->db->from('chat');
          $this->db->where('chanel_id', $chanelid);
          $query = $this->db->get();
          $tot_msg = $query->num_rows();

     $rowperpage = 15;
     if($tot_msg >=15){
      $lastval = $tot_msg - $rowperpage;
     }else{
      $lastval = 0;
     }
     
  
     
     $data = $this->db->query("SELECT `chat`.`ch_id`,
                                            `chat`.`ch_uid`,
                                            `chat`.`chanel_id`,
                                            `chat`.`user_id`,
                                            `chat`.`data`,
                                            `chat`.`data_type`,
                                            `chat`.`msg_sts`,
                                            `chat`.`created_at`,
                                            `chat`.`chtime`

                                        FROM `chat`
                                       
                                        WHERE
                                          `chat`.`chanel_id` = '$chanelid'
                                        ORDER BY `chat`.`ch_id` LIMIT $lastval,$rowperpage

                                    ")->result_array();

     

       $upseen = array(
                                 'msg_sts' => 2
                                
                            ); 
                              $this->db->where('chanel_id', $chanelid);
                              $this->db->where('user_id', $friendid);
                             $rs = $this->db->update('chat', $upseen);
       
      echo $_GET['callback'] . '('.json_encode($data).')';

   //echo json_encode($data);
  }


  public function getmoremsg($chanelid,$totmsg){
   
          $tot_msg = $totmsg;

     $rowperpage = 15;
     if($tot_msg >=15){
      $lastval = $tot_msg - $rowperpage;
     }else{
      $lastval = 0;
      $rowperpage = $tot_msg;

     }
     
  
     
     $data = $this->db->query("SELECT `chat`.`ch_id`,
                                            `chat`.`ch_uid`,
                                            `chat`.`chanel_id`,
                                            `chat`.`user_id`,
                                            `chat`.`data`,
                                            `chat`.`data_type`,
                                            `chat`.`msg_sts`,
                                            `chat`.`created_at`,
                                            `chat`.`chtime`

                                        FROM `chat`
                                       
                                        WHERE
                                          `chat`.`chanel_id` = '$chanelid'
                                        ORDER BY `chat`.`ch_id` LIMIT $lastval,$rowperpage

                                    ")->result_array();
       
      echo $_GET['callback'] . '('.json_encode($data).')';

   //echo json_encode($data);
  }

 public function replaceimg($chanelid,$myuserid,$chuid){
  $thismsgid = utf8_decode(urldecode($chuid));
  $getmsg = $this->db->get_where("chat", array("ch_uid" =>$thismsgid))->row_array();
              if(!$getmsg){
                 $response = array(
                                'msgresp' => "N"
                                 ); 
              }else{
                 $updata = array(
                                 'chanel_id' => $chanelid,
                                 'user_id' => $myuserid
                                
                            ); 
                              $this->db->where('ch_uid', $thismsgid);
                             $rs = $this->db->update('chat', $updata);

               $response = array(
                                'msgresp' => "Y",
                                'ch_id' => $getmsg['ch_id'],
                                'data' => $getmsg['data'],
                                'chtime' => $getmsg['chtime'],
                                'cdate' => $getmsg['cdate'],
                                'created_at' => $getmsg['created_at']
                                 ); 
                }

          echo $_GET['callback'] . '('.json_encode($response).')';
 }

 public function uploadimg(){
        $encoded_string = $_POST["encoded_string"];
  $image_name = $_POST["image_name"];
  $image_randid = $_POST["image_randid"];
   $file_name = time() .'_'. rand(0000,9999) . '.' . 'jpg';
  $decoded_string = base64_decode($encoded_string);
  
  $path = './assets/chat-big/'.$file_name;
  
  $file = fopen($path, 'wb');
  
  $is_written = fwrite($file, $decoded_string);
  fclose($file);
     
         //   $my_id = $this->input->post("my_id");
          //  $file_size = $this->input->post("file_size");

            // Decode Image
          //  $encoded_string=$this->input->post("encoded_string");
           

          //  $data = base64_decode($encoded_string);
            $data = './assets/chat-big/'.$file_name;
           // $file_name = time() .'_'. rand(0000,9999) . '.' . end(explode(".", $this->input->post("file_name_display")));
          $file_name = time() .'_'. rand(0000,9999) . '.' . 'jpg';
                        
            //root url to put
            $image_url_small = './assets/chat-small/' . $file_name;
            $image_url_medium = './assets/chat-mid/'. $file_name;
            $image_url_original = './assets/chat-big/' . $file_name;

         
    
            //small
            $moving_rs_small = $this->smart_resize_image( $data,
                                        "",//img uri
                                        300, 300,
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_small, //complete url (with file name)
                                        false,
                                        70, //quality
                                        false //grayscale
                            );
            //medium
            $moving_rs_medium = $this->smart_resize_image($data,//img string
                                        "",//img uri
                                        600, 600,
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_medium, //complete url (with file name)
                                        false,
                                        80, //quality
                                        false //grayscale
                            );

            //original
           // $moving_rs_original = file_put_contents($image_url_original, $data);
             $moving_rs_original = $this->smart_resize_image(
                                        $data,//img string
                                        "",//img uri
                                        1200, 1200,
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_original, //complete url (with file name)
                                        false,
                                        90, //quality
                                        false //grayscale
                            );
           
            if ( $moving_rs_original !=TRUE || $moving_rs_medium !=TRUE || $moving_rs_small !=TRUE ) {
                $response["success"] = "N";
            } else{
                //handle server db
                $this->db->trans_begin();                
                $data = array(
                        'ch_uid' => $image_randid,
                        'data_type' => "img",
                        'data' => $file_name,
                         'created_at' => date('Y-m-d H:i:s'),
                         'chtime' => date("h:i a"),
                         'cdate' => date("Y-m-d")
                      );
                $this->db->insert('chat', $data);

              
                
                if($this->db->trans_status() === FALSE) {
                  $this->db->trans_rollback();
                  $response["success"] = "N";
                } else{
                  $this->db->trans_commit();
                  $response["ch_uid"] = $image_randid;


                  //$response["file_url"] = $file_url;
                }
            }

        echo json_encode($response);
    }





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
    
   

    
//////////////////////////////////////////
    private function is_validated(){
        if($this->session->userdata('validated')){return TRUE;}else{return FALSE;}        
    }
    
  
    

//////////////////////////////////////////
    
}

?>