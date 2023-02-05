
<style type="text/css">
   .home-data h1 {font-family: 'Montserrat';}
</style>

<body class="hold-transition skin-blue sidebar-collapse">


    <div class="container-fluid" style=" background-color: #fff;" align="center">

<div class="row" style="padding: 100px 0px 0px 0px;max-width:950px;">
<?php if(count($contents)>0){foreach($contents as $content){
if($content['file']==NULL){$body_md6=12;$body_md8=12;$body_md_4th=12;$body_md_6th=12;}else{$body_md6=6;$body_md8=8;$body_md_4th=8;$body_md_6th=9;}
if($content['body']==NULL){$file_img_md6=12;$file_img_md5=12;$file_img_md3=12;$file_img_md_4th=12;$file_img_md_6th=12;}else{$file_img_md6=6;$file_img_md5=5;$file_img_md3=3;$file_img_md_4th=4;$file_img_md_6th=3;}
?> 




<?php if($content['block_style']=="style1"){?>
<style type="text/css">
  .block-style1 h1 {color:<?php echo @$content['textcolor'];?>; }
  .block-style1 h2 {color:<?php echo @$content['textcolor'];?>; }
  .block-style1 p {color:<?php echo @$content['textcolor'];?>; }
</style>
 <div class="row resp-bgimg" style="background:<?php if($content['backcolor']){ echo $content['backcolor'];}else {echo '#fff';}?>
 ; width:100%">
     
   <div class="col-md-12 forbig" style="padding:0px;background-image: url(<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>); padding:2% 8% 5% 8%;">

       <div class="col-md-12 home-data  <?php if($content['textcolor']){ echo 'block-style1';}?>" align="center"><br><br>
      <?php echo $content['body'];?>
     
     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
      
       </div>

</div>  
  <div class="col-md-12 for-small" style="padding:0px; padding:2% 8% 5% 8%;">

       <div class="col-md-12 home-data " align="center"><br><br>
      <?php echo $content['body'];?>
     
     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
      
       </div>

</div>
       
       
 </div>

  <?php }?>
<!-- //1st block -->  








  <?php if($content['block_style']=="style2"){?>
<style type="text/css">
  .block-style2 h1 {color:<?php echo @$content['textcolor'];?>; }
  .block-style2 h2 {color:<?php echo @$content['textcolor'];?>; }
  .block-style2 p {color:<?php echo @$content['textcolor'];?>; }

</style>
 <div class="row resp-bgimg-none" style="position: relative; padding:0%;width:100%">
   
     <?php if($content['file_type']=="image/jpeg"){?>
       
      <?php } ?>

      <div class="col-md-12 forbig" style="position: relative;padding:0px;background-image: url(<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>); background-size: 100% auto; background-position: center center; padding:5% 8% 5% 8%;">
      <div style="position:absolute;left:0;top:0; width:100%; height:100%; opacity:0.7; background:<?php echo @$content['backcolor'];?>;"></div>
      <div class="col-md-6 home-data <?php if($content['textcolor']){ echo 'block-style2';}?>" align="left">
      <?php echo $content['body'];?>
       
     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn <?php if(!$content['backcolor']){ echo 'btn-primary ';}else{echo 'bg-white';}?> btn-raised btn-lg"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
       </div>

      <div class="col-md-12 for-small" style="position: relative; padding:8% 8% 8% 8%;">
      <div style="position:absolute;left:0;top:0; width:100%; height:100%; opacity:1; background:<?php echo @$content['backcolor'];?>;"></div>
      <div class="col-md-6 home-data <?php if($content['textcolor']){ echo 'block-style2';}?>" align="left">
      <?php echo $content['body'];?>
       
     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn <?php if(!$content['backcolor']){ echo 'btn-primary ';}else{echo 'bg-white';}?> btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
       </div>
       
 </div>
 <?php }?>
    



<?php if($content['block_style']=="style3"){?>
<div class="row resp-bgimg-none" style="position: relative; background:#fff; padding:70px 8% 70px 8%; width:100%">
     <div class="absu-bg forbig" style="background-image: url(<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>);"></div>

  <div class="col-md-12 forbig" style="padding:0px;background-image: url(<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>); padding:2% 8% 5% 8%;">
      <div class="col-md-6"></div>
       <div class="col-md-<?php echo $body_md6;?> home-data " align="left">
       <?php echo $content['body'];?>

     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
 </div> 
  <div class="col-md-12 for-small" style="padding:0px; padding:2% 8% 5% 8%;">
      <div class="col-md-6"></div>
       <div class="col-md-<?php echo $body_md6;?> home-data " align="left" >
       <?php echo $content['body'];?>

     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
 </div>    
       
 </div>
 <?php }?>
    



<?php if($content['block_style']=="style4"){?>
<style type="text/css">
  .block-style4 h1 {color:<?php echo @$content['textcolor'];?>; }
  .block-style4 h2 {color:<?php echo @$content['textcolor'];?>; }
  .block-style4 p {color:<?php echo @$content['textcolor'];?>; }
  .block-style4 hr {border-top:1px solid #fff; }
  .block-style4 ul {padding-inline-start:0px; }
  .block-style4 ul li {padding-inline-start:0px; color:<?php echo @$content['textcolor'];?>;}
  .block-style4 ul li { margin-right: 20px;}
</style>
 <div class="row" style="background:<?php if($content['backcolor']){ echo $content['backcolor'];}else {echo '#fff';}?>; padding:2% 5% 0% 5%;width:100%;">
     
<?php if($content['file_type']=="image/jpeg"){?>
        <div class="col-md-<?php echo $file_img_md6;?>"  style="" align="center" style="padding:0% 5% 0% 5%">
           <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="100%">
    
      </div>
      <?php } ?>
      
       <div class="col-md-<?php echo $body_md6;?> home-data <?php if($content['textcolor']){ echo 'block-style4';}?> inlineli" align="left">
      <?php echo $content['body'];?>

     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn <?php if(!$content['backcolor']){ echo 'btn-primary ';}else{echo 'bg-white';}?> btn-raised btn-lg"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
       
       
 </div>
 <?php }?>
    



<?php if($content['block_style']=="style5"){?>

 <div class="row" style="background:#fafafa; padding:0%;">
     
     
    <?php if($content['file_type']=="image/jpeg"){?>
           
         <div class="col-md-<?php echo $file_img_md6;?>" align="left" style="padding:0px">

      
      <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="100%">
      </div>
   
       <?php } ?>
         <div class="col-md-<?php echo $body_md6;?> home-data " align="left" style="padding:6% 8% 4% 8%;">
      <?php echo $content['body'];?>

     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>
       
 </div>
 <?php }?>
    



<?php if($content['block_style']=="style6"){?>
 <div class="row"style="background:#fff; padding:3% 5% 2% 5%;">

 <div class="col-md-<?php echo $body_md6;?> home-data res-pad-col" align="left" style="padding:2%">
      <?php echo $content['body'];?>

     <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>

     <?php if($content['file_type']=="image/jpeg"){?>
           
        <div class="col-md-<?php echo $file_img_md6;?>" align="center" style="padding:0% 5% 0% 5%">

     <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="100%">
     
      </div>
       <?php } ?>
     
      
       
       
 </div>
  <?php }?>


<?php if($content['block_style']=="style7"){?>
 <div class="row" style="background:#fafafa; padding:3% 5% 2% 5%; width:100%">

 <div class="col-md-<?php echo $body_md6;?> home-data res-pad-col" align="<?php if(!$content['file_type']=="image/jpeg"){ echo 'center';}?> " style="">
      <?php echo $content['body'];?>
       </div>

     <?php if($content['file_type']=="image/jpeg"){?>
           
        <div class="col-md-<?php echo $file_img_md6;?>" align="center" style="padding:0% 5% 0% 5%">

     <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="100%">
     
      </div>
       <?php } ?>
     
      
       
       
 </div>
  <?php }?>




<?php if($content['block_style']=="style12"){?>
<style type="text/css">
  .thm-rit { text-align: right;}
  .thm-lft { text-align: left;}
  .thm-cnt { text-align: center;}
</style>

 <div class="col-md-4 small-pad " align="center"  style=" background:#fff; padding:0% 0% 30px 0%;">
 <div class="col-md-8 home-data" align="left" style="float:<?php if(@$content['thum_blk_num'] == '1' || @$content['thum_blk_num'] == '4'){ echo 'right';} else if (@$content['thum_blk_num'] == '3' || @$content['thum_blk_num'] == '6'){echo 'left';} else {echo 'center';} ?>;">
 <?php if($content['file_type']=="image/jpeg"){?>
     
     <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="60">
   
       <?php } ?>
<?php echo $content['body'];?>

 <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
  </div>
 </div>

  <?php }?>
<!-- //plan block -->  



<?php if($content['block_style']=="style13"){?>


 <div class="col-md-6" style=" background:#fff; padding:2% 5% 2% 5%;;">
 <div class="home-data res-pad-col" align="" style="padding:4%">
<?php echo $content['body'];?>

 <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
  </div>
 </div>

  <?php }?>



<?php if($content['block_style']=="style14"){?>
 <div class="row" style="background:#fff; padding:3% 5% 2% 5%;">

      <div class="col-md-12 home-data " align="center">
      <?php echo $content['body'];?>

      <?php if($content['btn_txt']){?>
      <a href="<?php echo $content['btn_link'];?>" class="btn btn-primary btn-raised"><?php echo $content['btn_txt'];?></a>
      <?php } ?>
       </div>

      <?php if($content['file_type']=="image/jpeg"){?>
        <div class="col-md-12"  style="" align="center" style="padding:0% 0% 0% 0%">
           <img src="<?php echo $assets_url.'assets-public/uploads/'.@$content['file'];?>" alt="<?php echo @$content['file_alt_nm'];?>" width="100%">
    
      </div>
      <?php } ?>
      
      
       
 </div>
 <?php }?>
    



<?php }}//main cnt loop?>
    


</div>





<style type="text/css">

</style>




<?php if($main_menu['tag_vis'] == 1) { ?>
  <div class="row taglink" style="background:#fff; padding:5% 7% 5% 7%; ">
  <div class="col-md-12">
    <h3>Popular Tags</h3>
  </div>
  

<?php 
$wbdb = $this->load->database('wbdb', TRUE);
$business_id = $this->session->userdata('site_bus_id');

$thiskew = $main_menu['mainkey'];

$wbdb->from('main_menu');
          $wbdb->like('s_keyword', $thiskew);
          $wbdb->where('business_id', $business_id);
          $query = $wbdb->get();
          $tot_tags = $query->result_array();
?>
<div class="col-md-12">
<?php if(count($tot_tags)>0){foreach($tot_tags as $tot_tags){
 //echo $tot_tags['s_keyword'];
  ?>
  <span><a href="<?php echo base_url().$tot_tags['s_url'] ?>"><?php echo $tot_tags['s_keyword']; ?></a> </span>&nbsp;&nbsp;
<?php }} ?>

  </div>
  </div>
<?php } ?>

