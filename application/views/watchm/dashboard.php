
<script type="text/javascript">
  var getsrnwidth = $(window).width();
  var getsrnheight = $(window).height();

  </script>
<style type="text/css">
  .watch-blk {background: ; width: 100%;}
  .vid-outer { width: 100%;z-index: -1;}
  .side-watch-list { width: 100%; height: 95px; background: ; position: relative; margin-bottom: 10px;}
  .side-thumb-blk { position: absolute;top: 0; border:0px solid #ccc; border-radius: 4px; overflow: hidden;text-align: center; color: #fff;}
  .side-thumb-blk img{ width: 100%;}
   .side-file-blk { position: absolute;top: 0; border:0px solid #ccc; border-radius: 4px; overflow: hidden;text-align: center; color: #fff; }
  .side-file-blk img{ width: 100%;}
    .side-file-blk i{ font-size: 18px; color: #fff; margin-top: 10px; position: relative;}
 

   .side-details-blk { position: absolute;  top: 0; width: auto; height: 95px; background: ; padding-top: 0px; background: ;}
  .side-details-blk h2 {font-size: 13px; font-family: 'Montserrat Medium'; }  
  
 
  .watch-details-blk { width: 100%; padding-top: 20px; }
  .watch-details-blk h1 {font-family: 'Montserrat Medium';}
  
  
  .video-js .vjs-big-play-button {width:2em;height:2em; border-radius: 100%; top: 42%; transform: translateY(-50%);left: 50%; transform: translateX(-50%); background-color:#1a73e8 }

 .watc-up-by-pic { border-radius: 100%; background: #ddd;overflow: hidden; position: relative;}
 .watc-up-by-pic img { width: 100%;}
  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
  
.watch-blk { padding: 20px 6% 0% 6%;}
.res-pad-w { padding: 0px 15px 0px 15px;}
 .side-thumb-blk {  width: 160px; height: 95px;}
  .side-details-blk { left: 168px;}
   .side-file-blk { width: 160px; height: 95px;}
     .watch-details-blk h1 {font-size: 18px; line-height: 25px;}
   .watch-details-blk .sml-txt {font-size: 13px; line-height: 17px; opacity: 0.8;  }
   .watch-details-blk i { display: none;} 
   .side-details-blk h2 { line-height: 20px;}
 .side-details-blk .sml-txt {font-size: 12px; line-height: 17px;  }  
.side-details-blk p {font-size: 13px; line-height: 17px; opacity: 0.8 } 
.vid-outer { position: relative;}
 .watc-up-by-pic { width: 50px; height: 50px;}
.wat-ddes-blk { padding: 15px 15px 15px 15px; background: #fafafa; border-radius: 5px;}
.wat-td-w1 { width: 65px}
.user-watch-de {padding-top: 12px;}
.user-watch-de h3 { font-size: 15px;font-family: 'Montserrat Medium'; line-height: 10px}
.user-watch-de p { font-size: 13px;font-family: 'Montserrat Medium';line-height: 10px; opacity: 0.8;}
.des-body { font-size: 14px; padding: 15px 15px 15px 15px; background: #fafafa;}
.side-file-blk-full { width: 160px; height: 95px;text-align: center}
.mlisticons4 img { position:relative; width:50px;top:23px}
.mlisticons3 img { position:relative; width:50px;top:23px}
.doc-opn-blk { position: absolute; left: 180px;top: 57px}
  }
   @media only screen and (min-width: 260px) and (max-width: 992px) {
   
.watch-blk { padding: 0;}
.cus-blue { box-shadow: none;}
.res-pad-w { padding: 0px;}
.watch-details-blk h1 {font-size: 16px; line-height: 17px; margin-bottom: 3px;}
.watch-details-blk { padding-left: 15px;padding-right: 30px; position: relative;}
 .watch-details-blk .sml-txt {font-size: 12px; line-height: 17px; opacity: 0.8;  } 
 .watch-details-blk i { position: absolute; right: 10px; font-size: 12px;   } 
.side-thumb-blk {  width: 140px; height: 85px;}
 .side-details-blk { left: 155px;}
   .side-file-blk { width: 140px; height: 85px;}
    .side-details-blk h2 { line-height: 17px;}
   .side-details-blk p {font-size: 12px; line-height: 10px; opacity: 0.8 } 
 .side-details-blk .sml-txt {font-size: 11px; line-height: 21px;  }  
.vid-outer { position: fixed; }
.def-hit { height: 240px;}
 .watc-up-by-pic { width: 36px; height: 36px;}
.wat-ddes-blk { padding: 13px 15px 0px 15px; background: #fafafa; border-radius: 5px;}
.wat-td-w1 { width: 45px}
.user-watch-de {padding-top: 6px;}
.user-watch-de h3 { font-size: 13px;font-family: 'Montserrat Medium'; line-height: 10px}
.user-watch-de p { font-size: 11px;font-family: 'Montserrat Medium';line-height: 10px; opacity: 0.8;}
.des-body { font-size: 12px; margin-bottom: 10px; overflow: hidden; }
.des-show {height: 0px; padding: 0px;}
.ful-rotate {-ms-transform: rotate(180deg);transform: rotate(180deg);}
.side-file-blk-full { width: 100%; height: 240px; position: relative; text-align: center}
.mlisticons4 img { position:relative; width:60px;top:50px}
.mlisticons3 img { position:relative; width:40px;top:22px}
.doc-opn-blk { position: absolute;left: 50%; transform: translateX(-50%); top: 130px}
   }
</style>
<div class="row">
  <div class="watch-blk">
    <div class="row">
      <div class="col-md-8" style="padding:0;">
      <div class="res-pad-w" >
       
       <div id="bigwidths" class="vid-outer" style="min-height:100px;">
       <?php if($watchthis['file_type'] == 'video/mp4') { ?>
        <video id="my-player" class="video-js" controls preload="none" width="100%" readyState ="0" poster="<?php echo base_url() ?>assets/vthumb/<?php echo $watchthis['thumb'] ?>" data-setup="{}" style="">
                              <source src="<?php echo base_url() ?>assets/videos/<?php echo $watchthis['filenm'] ?>" type="video/mp4"></source>
                            </video>
        <?php } else { ?> 
         <div class="side-file-blk-full mlisticons4 bg-gray">
                  <?php 
                   $tempfiletyp = explode("/", $watchthis['file_type']);
                  $file_exten = end($tempfiletyp);
                  if($file_exten == 'pdf'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/pdf.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'doc' || $file_exten == 'docx'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/word.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'zip'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/zip.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'xlsx' || $file_exten == 'xls'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/excel.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'pptx' || $file_exten == 'ppt' || $file_exten == 'pptm'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/powerpoint.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'JPG' || $file_exten == 'png' || $file_exten == 'jpeg' || $file_exten == 'jpg'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/photo.svg" class="mlisticons2">
                  <?php } else { ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/gdocs.svg" class="mlisticons2">
                  <?php }  ?>
                  </div>
                  <div class="doc-opn-blk"><a href="<?php echo base_url() ?>assets/videos/<?php echo $watchthis['filenm'] ?>"><button class="btn btn-info btn-raised" >Open File</button></a></div>
       <?php } ?>

          </div>
<div class="def-hit for-small"></div>
          <div class="watch-details-blk">
          <i id="des-icon" class="fa fa-fw fa-chevron-down "></i>
            <h1><?php echo $watchthis['title'] ?></h1>
            <p><span class="sml-txt">0 views | <?php echo $watchthis['up_date_show'] ?></span></p>
          </div>

           <div class="wat-ddes-blk">
          <table>
            <tr>
        <td valign="top" class="wat-td-w1"><div class="watc-up-by-pic"><img src="<?php echo base_url() ?>assets/pro-sml/<?php echo $watchthis['pro_pic'] ?>"></div></td>
              <td>
              <div class="user-watch-de">
                <h3><?php echo $watchthis['teacher_nm'] ?></h3>
                <p>0 followers</p>
              </div>
              </td>
              <td></td>
            </tr>
          </table>
        </div>
          <div class="wat-ddes-blk des-body forbig">
          <?php echo $watchthis['descp'] ?>
        </div>
          <div id="smal-decs" class="wat-ddes-blk des-body des-show for-small">
          <?php echo $watchthis['descp'] ?>
        </div>
      </div>
      </div>
      <div class="col-md-4">
       <?php foreach ($materials as $key => $value) {
        $tempfiletyp = explode("/", $value['file_type']);
          $file_exten = end($tempfiletyp);
          if($value['file_url'] != $view){
        ?>
        <div onclick="watchthisitem('<?php echo $value['file_url'] ?>')" class="side-watch-list">
         <?php if($value['file_type'] == 'video/mp4'){ ?>
          <div class="side-thumb-blk bg-black">
            <img src="<?php echo base_url() ?>assets/vthumb/<?php echo $value['thumb'] ?>">
          </div>
          <?php } else { ?>
             <div class="side-file-blk mlisticons3 bg-gray">
                  <?php if($file_exten == 'pdf'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/pdf.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'doc' || $file_exten == 'docx'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/word.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'zip'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/zip.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'xlsx' || $file_exten == 'xls'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/excel.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'pptx' || $file_exten == 'ppt' || $file_exten == 'pptm'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/powerpoint.svg" class="mlisticons2">
                  <?php } else if($file_exten == 'JPG' || $file_exten == 'png' || $file_exten == 'jpeg' || $file_exten == 'jpg'){ ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/photo.svg" class="mlisticons2">
                  <?php } else { ?>
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/gdocs.svg" class="mlisticons2">
                  <?php }  ?>
                  </div>
          <?php } ?>
      
        <div class="side-details-blk">
      <table width="100%">
        <td>
        <h2 class="forbig"><?php 
        $titlecount = strlen($value['title']);
        if($titlecount > 44){
          echo substr($value['title'], 0, 45)."..." ; 
        }else{
          echo $value['title']; 
        }
         
        ?></h2>
        <h2 class="for-small"><?php 
        $titlecount = strlen($value['title']);
        if($titlecount > 64){
          echo substr($value['title'], 0, 65)."..." ; 
        }else{
          echo $value['title']; 
        }
         
        ?></h2>
        <p>
        <?php 
        $mncount = strlen($value['teacher_nm']);
        if($mncount > 23){
          echo substr($value['teacher_nm'], 0, 24).".." ; 
        }else{
          echo $value['teacher_nm']; 
        }
         ?><br>
         <span class="sml-txt">0 views | 
         <?php
         $today = date('Y-m-d');
        
         $datetime1 = new DateTime($value['up_date']);
          $datetime2 = new DateTime($today);
          $interval = $datetime1->diff($datetime2);
          if($interval->days > 365){
            echo $interval->y . " years ago";
          }else if($interval->days > 30){
            echo $interval->m . " months ago";
          }else if($interval->days > 6){
            echo 1 . " week ago";
          }else if($interval->days > 1){
            echo $interval->days . " days ago";
          }else{
            echo "Today";
          }
          
          ?></span> 
        </p>
       
        </td>
      </table>
    </div>
    </div>
        <?php } } ?>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
    var tk_vwidth = $('#bigwidths').width();
  //alert(tk_vwidth);
   $('#my-player').css('width',tk_vwidth);

   if(getsrnwidth < 799 ){
    $('#my-player').css('height','240');
   }else {
   if(tk_vwidth < 800 ){
    $('#my-player').css('height','430');
    
   }else if(tk_vwidth < 1000 ){
    $('#my-player').css('height','490');
   }else if(tk_vwidth > 1000 ){
    $('#my-player').css('height','590');
   }
 }
   $('.vid-outer').css('z-index','99');
  

   });

  $('.watch-details-blk').click(function(){
      $('#smal-decs').toggleClass('des-show');  
      $('#des-icon').toggleClass('ful-rotate');  
  })
</script>
<script type="text/javascript">
  function watchthisitem(id){
  
    window.location.href = "<?php echo base_url()?>watchm?v="+id;
  }
  
</script>
<script type="text/javascript">
  var options = {};

var player = videojs('my-player', options, function onPlayerReady() {
  videojs.log('Your player is ready!');

  // In this context, `this` is the player that was created by Video.js.
 // this.play();

  // How about an event listener?
  this.on('ended', function() {
    videojs.log('Awww...over so soon?!');
  });
});
</script>