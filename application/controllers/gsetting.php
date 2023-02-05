<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

 class Gsetting extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
              date_default_timezone_set('Asia/Kolkata');
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }


   public function account_setting(){
       $memid = $this->session->userdata("mem_id");
      $data['profdata'] = $profdata = $this->db->get_where("personal_data", array("mem_id" =>$memid))->row_array();
      $data['memberdata'] = $memberdata = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
       $this->load->view('setting/gseting',$data);
  
      }  
   public function chkpass_otp(){
    $memid = $this->session->userdata("mem_id");
    $otpchk = $this->input->post("otp");
     $data['memberdata'] = $memberdata = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
        if($memberdata){
         $otp = $memberdata['otp'];
         if($otp == $otpchk){
              $upData = array(
                  'password' => $this->session->userdata("change_pass")

                ); 
                $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData);  
          echo json_encode( array('status' => 200) );
         }else{
          echo json_encode( array('status' => 203) );
         }
       }else{
         echo json_encode( array('status' => 204) );
       }
   }
   public function chkpass(){
       $memid = $this->session->userdata("mem_id");
       $newpass = $this->input->post("newpass");
      $data['memberdata'] = $memberdata = $this->db->get_where("members", array("member_id" =>$memid))->row_array();
      if($memberdata){

        $otp = rand(9999,1000);
         $data = array(
                  'change_pass' => $newpass
                   );
         $this->session->set_userdata($data);

                       $upData = array(
                                'otp' => $otp
                              ); 
                        $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData);  

        $msg = "Hi, your InfiDust One Time Password is $otp. Use this for confirm contact number. Do not share this with any one.";
                 //$this->send_sms($contact, $msg);
                          ini_set( 'display_errors', 1 );
                      error_reporting( E_ALL );
                      $from = 'infidust@kamprik.com';
                      $to = $memberdata['email'];
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

                     // $this->send_sms($memberdata['contact'], $msg);
                       echo json_encode( array('status' => 200) );
      }else{
        echo json_encode( array('status' => 203) );
      }
  
        
    } 

    public function changeids(){
       $memid = $this->session->userdata("mem_id");
       $new_contact = $this->input->post("new_contact");
       $old_contact = $this->input->post("old_contact");
       $new_mail = $this->input->post("new_mail");
       if($new_contact == $old_contact){
          echo json_encode( array('status' => 201) );
       }else{
            $data['memberdata'] = $memberdata = $this->db->get_where("members", array("contact" =>$new_contact))->row_array();
             if($memberdata){
               echo json_encode( array('status' => 202) );
             }else{
                 $upData = array(
                                'contact' => $new_contact,
                                'username' => $new_contact,
                                'email' => $new_mail
                              ); 
                        $this->db->where('member_id', $memid);
                        $rs = $this->db->update('members', $upData); 
                        echo json_encode( array('status' => 200) );
             }
       }
     
  
        
    }

public function testmail()
  {
  ini_set( 'display_errors', 1 );
                error_reporting( E_ALL );
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
                $headers .= "From: "."Infidust login credentials"." ";
                $headers .= $from;
                mail($to,$subject,$message, $headers);
  }
//////////////////////////////////////////
    private function is_validated(){
        if($this->session->userdata('validated')){return TRUE;}else{return FALSE;}        
    }
    
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
   private function send_sms_share($numbers, $msg){
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