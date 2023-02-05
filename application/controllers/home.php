<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 

 class Home extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
             
             // echo $this->session->userdata('validated');die;
        //if(!$this->session->userdata('validated')){redirect(base_url());}
        
        //$this->$c_method = $this->router->fetch_method();
    }

    public function index(){
     
        $this->load->view('home');
    }  
     public function urisegm($geturival=NULL){
     $data['keywords'] = $geturival;
        $this->load->view('live-class-software',$data);
    } 
    public function educator(){
     
        $this->load->view('educator');
    }
    public function restaurantkeyword($keywords){
    $data['keydata'] = $keydata = $this->db->get_where("restaurant_seo", array("key_url" =>$keywords))->row_array();

        $this->load->view('restaturantpage', $data);
    }
   




      public function updatekey()
    {
      $copyfrom = $this->input->post('copyfrom');
       $data['keyget'] = $keyget = $this->db->get_where("restaurant_seo", array("res_id" =>$copyfrom))->row_array();
        $newdata = array(
                'title' => $keyget['title'],
                'desc' => $keyget['desc'],
                'keywords' => $keyget['keywords'],
                'canonical' => $keyget['canonical'],
                'cvr_title' => $keyget['cvr_title'],
                'cvr_p' => $keyget['cvr_p'],
                'fea_title' => $keyget['fea_title'],
                'fea_sub_title' => $keyget['fea_sub_title'],
                'fea_1' => $keyget['fea_1'],
                'fea_2' => $keyget['fea_2'],
                'fea_3' => $keyget['fea_3'],
                'fea_4' => $keyget['fea_4'],
                'fea_5' => $keyget['fea_5'],
                'fea_6' => $keyget['fea_6'],
                'mobile_data' => $keyget['mobile_data'],
                'feat_big' => $keyget['feat_big'],
                'cloud_data' => $keyget['cloud_data'],
                'created_at' => date('Y-m-d')
                );  
        $this->db->where('res_id', $this->input->post('copyto'));
        $rs = $this->db->update('restaurant_seo', $newdata);
       if(!$rs){
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }


    }

     public function addnewkey()
    {
     
      $upData = array(
              'key_name' => $this->input->post("keywd"),
              'key_url' => $this->input->post("pageurl")
            );
      
          $rs = $this->db->insert('restaurant_seo',$upData);
       if(!$rs){
        
        echo json_encode( array('status' => 203) );
       }else{
        echo json_encode( array('status' => 200) );
       }
    }
    
public function addnewdata()
{     
  $resid = $this->input->post("res_id"); 
   $newdata = array(
                          'key_name' => $this->input->post("keywd"),
                          'key_url' => $this->input->post("pgurl"),
                          'title' => $this->input->post("pgtilte"),
                          'desc' => $this->input->post("pgdecr"),
                          'keywords' => $this->input->post("pgkeywd"),
                          'canonical' => $this->input->post("canonical"),
                          'cvr_title' => $this->input->post('headerdata'),
                          'fea_title' => $this->input->post("featitledata"),
                          'fea_1' => $this->input->post("feaone"),
                          'fea_2' => $this->input->post("featwo"),
                          'fea_3' => $this->input->post("feathree"),
                          'fea_4' => $this->input->post("feafour"),
                          'fea_5' => $this->input->post("feafive"),
                          'fea_6' => $this->input->post("feasix"),
                          'mobile_data' => $this->input->post("mobiledata"),
                          'feat_big' => $this->input->post("bigfea"),
                          'cloud_data' => $this->input->post("cloudfea")
                          );  
                $this->db->where('res_id', $resid);
                $rs = $this->db->update('restaurant_seo', $newdata);
                if(!$rs){
                  echo json_encode( array('status' => 203) );
                 }else{
                  echo json_encode( array('status' => 200) );
                 }
}
public function addnewproduct()
{ 
       $bs_id = $this->session->userdata('bs_id');
      $cl_id = $this->session->userdata('cli_id');
      if($this->session->userdata('type') == 'master'){
       $data['allbrnch'] = $allbrnch = $this->db->get_where("f_branch", array("b_id" =>$bs_id ))->result_array();
      }else{
        $data['allbrnch'] = $allbrnch = $this->db->get_where("f_branch", array("cl_id" =>$cl_id ))->result_array(); 
      }

      $probranid = $this->input->post("probranid"); 
      $brnchcl_id = $this->input->post("brnchcl_id"); 
      $mainproid = $this->input->post("mainproid"); 
      $proname = $this->input->post("proname"); 
      $procost = $this->input->post("procost"); 
      $pro_cat = $this->input->post("pro_cat"); 
      $unittype = $this->input->post("unittype"); 
      $datatype = $this->input->post("datatype"); 
      $vegetype = $this->input->post("vegetype"); 
      $kt_station = $this->input->post("kt_station"); 

      if ( !empty($_FILES['file']['name']) && !$probranid == '0')
      {
        $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg","jpeg","png","JPG");
      $extension = end($temp);
      if( in_array($extension, $allowed_types)) 
      { 
        if($_FILES['file']['size'] <= 52428800) 
        { //50 MB =(52428800 Bytes (in binary))
                            //echo "ok";
                
              
              $image = uniqid() . '.jpg';
              
              //die();
                            $image_url_large = './assets/productsbig/'.$image;       
                            $image_url_small = './assets/productsmall/'.$image;       
                            $moving_url_large = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                        "",//img string
                                        500, 500, 
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_large, //complete url (with file name)
                                        false,
                                        90, //quality
                                        false //grayscale
                            );    
                            $moving_url_small = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                        "",//img string
                                        100, 100, 
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_small, //complete url (with file name)
                                        false,
                                        90, //quality
                                        false //grayscale
                            );          
        }  
      }

            $newmem = array(
                          'b_id' => $bs_id,
                          'cl_id' => $brnchcl_id,
                          'br_id' => $probranid,
                          'kt_id' => $kt_station,
                          'pr_name' => $proname,
                          'pro_cat_id' => $pro_cat,
                          'unit_type' => $unittype,
                          'vagite' => $vegetype,
                          'cost' => $procost,
                          'tot_item_cost' => $procost,
                          'img' => $image,
                          'is_active' => 1
                          );  
                $itemupdate= array(
                    'pr_name' => $proname,
                    'cost' => $procost,
                    'kt_id' => $kt_station,
                    'unit_type' => $unittype,
                    'vagite' => $vegetype,
                    'tot_item_cost' => $procost,
                    'img' => $image,
                    'pro_cat_id' => $pro_cat
                    ); 
                if(!$mainproid == '0'){
                  $this->db->where('pr_id', $mainproid);
                $rs = $this->db->update('products', $itemupdate);
                }else{
                   $rs = $this->db->insert('products',$newmem);
                }
                
                 if(!$rs){
                  echo json_encode( array('status' => 203) );
                 }else{
                  echo json_encode( array('status' => 200) );
                 }

      }else if(empty($_FILES['file']['name']) && !$probranid == '0'){

                   $newmem = array(
                          'b_id' => $bs_id,
                          'cl_id' => $brnchcl_id,
                          'br_id' => $probranid,
                          'kt_id' => $kt_station,
                          'pr_name' => $proname,
                          'pro_cat_id' => $pro_cat,
                          'unit_type' => $unittype,
                          'vagite' => $vegetype,
                          'cost' => $procost,
                          'tot_item_cost' => $procost,
                          'is_active' => 1
                          );  
                  $itemupdate= array(
                    'pr_name' => $proname,
                    'cost' => $procost,
                    'kt_id' => $kt_station,
                    'unit_type' => $unittype,
                    'vagite' => $vegetype,
                    'tot_item_cost' => $procost,
                    'pro_cat_id' => $pro_cat
                    ); 
                if(!$mainproid == '0'){
                  $this->db->where('pr_id', $mainproid);
                $rs = $this->db->update('products', $itemupdate);
                }else{
                   $rs = $this->db->insert('products',$newmem);
                }
                 if(!$rs){
                  echo json_encode( array('status' => 203) );
                 }else{
                  echo json_encode( array('status' => 200) );
                 }


      }else if(!empty($_FILES['file']['name']) && $probranid == '0'){

           $temp = explode(".", $_FILES["file"]["name"]);
      $allowed_types = array("jpg","jpeg","png","JPG");
      $extension = end($temp);
      if( in_array($extension, $allowed_types)) 
      { 
        if($_FILES['file']['size'] <= 52428800) 
        { //50 MB =(52428800 Bytes (in binary))
                            //echo "ok";
                
              
              $image = uniqid() . '.jpg';
              
              //die();
                            $image_url_large = './assets/productsbig/'.$image;  
                             $image_url_small = './assets/productsmall/'.$image;     
                            $moving_url_large = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                        "",//img string
                                        400, 400, 
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_large, //complete url (with file name)
                                        false,
                                        90, //quality
                                        false //grayscale
                            );    
                            $moving_url_small = $this->smart_resize_image($_FILES['file']['tmp_name'],
                                        "",//img string
                                        100, 100, 
                                        true, //proportional
                                        'file', //file browser return
                                        $image_url_small, //complete url (with file name)
                                        false,
                                        90, //quality
                                        false //grayscale
                            );               
        }  
      }

           
                  foreach($allbrnch as $allbrnchdata) {
                          $newitemall = array(
                            'b_id' => $bs_id,
                            'cl_id' => $allbrnchdata['cl_id'],
                            'br_id' => $allbrnchdata['brn_id'],
                            'pr_name' => $proname,
                            'kt_id' => $kt_station,
                            'pro_cat_id' => $pro_cat,
                            'unit_type' => $unittype,
                            'vagite' => $vegetype,
                            'cost' => $procost,
                            'tot_item_cost' => $procost,
                            'img' => $image,
                            'is_active' => 1
                            );  
                    $rs = $this->db->insert('products',$newitemall);
                  //print_r($allbrnchdata['brn_id']);
                  }
                  echo json_encode( array('status' => 200) );

      }else if(empty($_FILES['file']['name']) && $probranid == '0'){
        foreach($allbrnch as $allbrnchdata) {
                          $newitemall = array(
                            'b_id' => $bs_id,
                            'cl_id' => $allbrnchdata['cl_id'],
                            'br_id' => $allbrnchdata['brn_id'],
                            'pr_name' => $proname,
                            'kt_id' => $kt_station,
                            'pro_cat_id' => $pro_cat,
                            'unit_type' => $unittype,
                            'vagite' => $vegetype,
                            'cost' => $procost,
                            'tot_item_cost' => $procost,
                            'is_active' => 1
                            );  
                    $rs = $this->db->insert('products',$newitemall);
                  //print_r($allbrnchdata['brn_id']);
                  }
                  echo json_encode( array('status' => 200) );

      }

    }

 public function productsrates(){
      $bs_id = $this->session->userdata('bs_id');
      $cl_id = $this->session->userdata('cli_id');
       // $data['totv'] = $totv = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
   
        $data['brnchlist'] = $brnchlist = $this->db->get_where("f_branch", array("b_id" =>$bs_id ))->result_array();
      
        $this->load->view('productrates', $data);
    }
  public function productsrateslist($brid){
      $bs_id = $this->session->userdata('bs_id');
      $cl_id = $this->session->userdata('cli_id');
     
            if ($brid == 0) {
               $data['prodlist'] = $prodlist = $this->db->query("SELECT `products`.`pr_id`,
                                                  `products`.`b_id`,
                                                  `products`.`br_id`,
                                                  `products`.`cl_id`,
                                                  `products`.`pr_name`,
                                                  `products`.`kt_id`,
                                                  `products`.`cost`,
                                                  `products`.`pro_cat_id`,
                                                  `products`.`unit_type`,
                                                  `products`.`vagite`,
                                                  `products`.`img`,
                                                  `products`.`is_active`,

                                                  `f_branch`.`brn_id`,
                                                  `f_branch`.`br_name`,
                                                  `kitchen`.`kt_id`,
                                                  `kitchen`.`kt_name`

                                               FROM `products`
                                               INNER JOIN `f_branch` ON `products`.`br_id` = `f_branch`.`brn_id`
                                               INNER JOIN `kitchen` ON `products`.`kt_id` = `kitchen`.`kt_id`
                                               WHERE
                                               `products`.`b_id` = $bs_id
                                               GROUP BY
                                               `products`.`pr_name`
                                               
                                          ")->result_array();
            }else {
              $brid = str_replace(",",", ",$brid);
              $data['showdatatst'] = $brid;
               $data['prodlist'] = $prodlist = $this->db->query("SELECT `products`.`pr_id`,
                                                  `products`.`b_id`,
                                                  `products`.`br_id`,
                                                  `products`.`cl_id`,
                                                  `products`.`pr_name`,
                                                  `products`.`kt_id`,
                                                  `products`.`cost`,
                                                  `products`.`pro_cat_id`,
                                                  `products`.`unit_type`,
                                                  `products`.`vagite`,
                                                  `products`.`img`,
                                                  `products`.`is_active`,

                                                  `f_branch`.`brn_id`,
                                                  `f_branch`.`br_name`,
                                                  `kitchen`.`kt_id`,
                                                  `kitchen`.`kt_name`

                                               FROM `products`
                                               INNER JOIN `f_branch` ON `products`.`br_id` = `f_branch`.`brn_id`
                                               INNER JOIN `kitchen` ON `products`.`kt_id` = `kitchen`.`kt_id`
                                               WHERE
                                               `products`.`b_id` = $bs_id
                                               AND
                                               `products`.`br_id` = $brid
                                               GROUP BY
                                               `products`.`pr_name`
                                               
                                          ")->result_array();
              }

    
         
        $this->load->view('productratelist', $data);
    }
   public function updaterates($prnameg, $thispid, $getcost, $frobr)
    {
     // $pr_id = $this->input->post('prid');
     // $prnameg = $this->input->post('prname');
       // $prname = utf8_decode(urldecode($prnameg));
       $prname = urldecode($prnameg);
       $prname = str_replace("&#40;","(",$prname);
       $prname = str_replace("&#41;",")",$prname);
       $getcost = utf8_decode(urldecode($getcost));
       $frobr = utf8_decode(urldecode($frobr));
    
      // $allbrid = str_replace(",",", ",$frobr);

        
       $varbrary=explode(',',$frobr);
       foreach($varbrary as $varbr)
        {
           $upDatarate = array(
              'cost' => $getcost,
              'tot_item_cost' => $getcost
            );
            $this->db->where('br_id', $varbr);
            $this->db->where('pr_name', $prname);
            $rs = $this->db->update('products', $upDatarate);
        }
       
        if(!$rs){
         $orderget = array(
                                'status' => "203"
                                
                                 ); 
        echo $_GET['callback'] . '('.json_encode($orderget).')';
        }else{
          $orderget = array(
                                'status' => "200"
                                
                                 ); 
        echo $_GET['callback'] . '('.json_encode($orderget).')';
        }

    }
     public function productcomprs(){
      $bs_id = $this->session->userdata('bs_id');
      $cl_id = $this->session->userdata('cli_id');
       // $data['totv'] = $totv = $this->db->get_where("tot_visitor", array("v_id" =>1))->row_array();
   
        $data['brnchlist'] = $brnchlist = $this->db->get_where("f_branch", array("b_id" =>$bs_id ))->result_array();
        $data['brnchlist2'] = $brnchlist2 = $this->db->get_where("f_branch", array("b_id" =>$bs_id ))->result_array();
      
        $this->load->view('productcompress', $data);
    }
      public function copytobr()
    {
      $bs_id = $this->session->userdata('bs_id');
      $tobrnid = $this->input->post("tobrnid"); 
      $toclid = $this->input->post("toclid"); 
      $frombrnid = $this->input->post("frombrnid"); 
       $data['productbr'] = $productbr = $this->db->get_where("products", array("br_id" =>$frombrnid, "b_id" =>$bs_id , "is_active" =>1 ))->result_array();

       foreach($productbr as $productbrdata) {
                          $newitemall = array(
                            'b_id' => $bs_id,
                            'cl_id' => $toclid,
                            'br_id' => $tobrnid,
                            'pr_name' => $productbrdata['pr_name'],
                            'kt_id' => $productbrdata['kt_id'],
                            'pro_cat_id' => $productbrdata['pro_cat_id'],
                            'unit_type' => $productbrdata['unit_type'],
                            'vagite' => $productbrdata['vagite'],
                            'cost' => $productbrdata['cost'],
                            'tot_item_cost' => $productbrdata['tot_item_cost'],
                            'img' => $productbrdata['img'],
                            'is_active' => 1
                            );  
                    $rs = $this->db->insert('products',$newitemall);
                  //print_r($allbrnchdata['brn_id']);
                  }
                  if(!$rs){
                    echo json_encode( array('status' => 203) );
                  }else{
                    echo json_encode( array('status' => 200) );
                  }


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