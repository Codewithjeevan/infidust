<!DOCTYPE html>
  <html lang="en" manifest="<?php echo base_url() ?>manifest.appcache">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infidust- Software For Teaching Online</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content="Infidust is the best free online live teaching software for all educational platform, which provide multiple unlimited benefited features like live online classes, online test, share notes and videos, unlimited data storage , brand promotion in all over India, get student an etc"/>
  <meta name="keywords" content="software for online teaching, software for teacher, platform for teacher teaching online, online live teaching software, free online teaching software, free online teaching software in india, teaching software free in india, download free teaching online software, virtual classroom, e-learning platform, learning, teach online, lms, learning management system, online test,  online institute, online teacher, live teaching, online coaching, online tuitions, online school, free live classes, free virtual classroom, SCORM, Shareable Content Object Reference Mode, whiteboard, live class, sell courses, best online classes, best online institute, online chatting classes, video conferencing, live online course, school management software, system, academy online teaching, tuition teaching software, sofware for teaching online"/>
  
  <meta property="article:tag" content="online classroom software"/>
<meta property="article:tag" content="online teaching site"/>
<meta property="article:tag" content="app for teaching online"/>
<meta property="article:tag" content="best online teaching app"/>
<meta property="article:tag" content="live class software"/>
<meta property="article:tag" content="online course software"/>
<meta property="article:tag" content="online class software"/>
<meta property="article:tag" content="online teaching app"/>
<meta property="article:tag" content="app to teach online"/>
<meta property="article:tag" content="online class"/>
<meta property="article:tag" content="live class in India"/>
<meta property="article:tag" content="online teaching software"/>
<meta property="article:tag" content="school management system"/>
<meta property="article:tag" content="school management software"/>
<meta property="article:tag" content="online school software"/>
<meta property="article:tag" content="online teaching software for school"/>


<meta itemprop="description" content="Are you looking for software for teaching online, then Infidust is one stop solutions for your needs." />
<meta property="og:title" content="Infidust- Software For Teaching Online" />
<meta property="og:image" content="/assets-public/dist/img/infidust-home.png"/>
<meta property="og:image:alt" content="Software for teaching online" />
<meta property="og:url" content="https://infidust.com" />
<meta property="og:description" content="Infidust is a software for online teaching where you experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!" />

<meta name="twitter:title" content="Infidust- Software For Teaching Online" />
<meta property="og:description" content="Infidust is a software for online teaching. Experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!." />
<meta name="twitter:description" content="Infidust is a software for online teaching to collaborate with your institute, teachers & students online, which deliver attractive live classes. Lets you experience high quality video conferencing without usage more data, interactive online whiteboard, sharing notes and documents, server-side recording and much more. Start now free!" />
<meta name="twitter:image" content="/assets-public/dist/img/infidust-home.png" />


  <?php require_once('cssinclude.php');?> 

  
</head>

<body class="hold-transition skin-blue sidebar-collapse" style="background:#f4f4f4;">


  <?php require_once('header.php');?> 

<div class="wapper-view" style="display:block">
    <!-- Main content -->
    <div id="datacontent" class="container-fluid" style="padding: 70px 20px 20px 20px; background-color: #f4f4f4; ">


    </div>
    </div>
    <!-- /.content -->  
<style type="text/css">
  .des-view-err { position: fixed; width: 90%; bottom: 5%;left: 5%; padding: 10px 30px 10px 10px; background: red; color: #fff; border-radius: 7px}
</style>
<!-- <div class="des-view-err smallvisible">Please View your Teacher panel in desktop/laptop for full feature!
<i id="cls-deskview" class="fa fa-close" style="position:absolute; top:5px; right:10px"></i>
</div> -->



<!-- matirials upload -->
<div id="vid-up-pop" class="black-ovr" align="center" style="display:none">
  <div class="creat-blk">
  <form id="upload_form" enctype="multipart/form-data" method="post">
    <div class="row" style="position:relative">
    <div class="hidevideo"><div class="whiteov-hid"></div>
    <input type="hidden" id="uniid" name="uniid" value="45625354">
    <video id="snpvideo" class="video-js vjs-fluid vjs-tech" controls="controls" width="700" height="400" data-setup="{}" poster="http://www.allotoi.com/wp-content/uploads/2014/07/rickyPepe.jpg" >
<source id="temvsrc" src="" type="video/mp4" />
</video>
<canvas id="snpcanvas" width="640" height="480"></canvas>
</div>
    <input type="file" name="mainmaterials" id="mainmaterials" onchange="loadFile(event)" class="cus-uplodinp" style="">
    <input type="hidden" name="cnrandid" id="cnrandid">
      <div class="col-md-12" align="left" style="padding:20px; border-bottom:1px solid #ddd; position:relative;">
        <h5 style="margin:0;">Upload video</h5>
         <button id="cls-v-up" type="button" class="btn btn-info cus-icon-btn" style="margin:0;position:absolute;right:25px;top:13px; opacity:0.7"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x-f.svg" width=""></button>
         <button type="button" class="btn btn-info cus-icon-btn min-v-up" style="margin:0;position:absolute;right:70px;top:13px; opacity:0.7;display:none"><i class="fa fa-fw fa-share-square-o" style="color:#000; font-size:18px;position:relative;top:4px;left:2px"></i></button>

          <div id="vupld-opt" style="margin:0;position:absolute;right:10px;top:13px; width:50px; height:50px;display:none;">
        <button id="" type="button" class="btn btn-info cus-icon-btn " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/x-f.svg" style="opacity:0.7"></button>
           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notifblk" style=" left:-250px; width:250px;">
        <a class="dropdown-item min-v-up"  style="max-width:250px;" align="center">Minimize</a>
        
        <a class="dropdown-item" href="#" style="max-width:250px;">Stop uploading</a>
      </div>
     </div>

      </div>
      <div id="in-def-vidblk" class="col-md-12" style="padding-top:7%;display:">
      <input id="up-fil-typ" type="hidden" value="">
        <div class="upload-ico-blk"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/upload.svg" width=""></div>
        <br>
        <p class="sml1">Drag and drop your file to upload<br>
        <spna class="sml2" style="opacity:0.7">Your file will not be visible until you publish them.</spna></p><br>
        <button type="button" class="btn btn-primary btn-raised" onclick="uploadFile()">SELECT FILE</button><br>
        <div id="strt-vup-tem-ldr" class="sbl-circ-path3" style="display:none;"></div>
        </div>
        <div id="in-up-vidblk" class="col-md-12" style="padding-top:8%;display:none;">
        <div class="uploading-img-temp" align="center" style="color:#fff;font-size:25px;">
          <i id="up-ic-vid" class="fa fa-fw fa-file-video-o"  style="position:relative; top:15px;display:none"></i>
          <i id="up-ic-doc" class="fa fa-fw fa-file-text" style="position:relative; top:15px;display:none"></i>
        </div>
        <br>
        <p class="sml1"><spna class="sml2" style="opacity:0.7">Your file is uploading. Do not reload the browser</spna></p>
        </div>
        <div class="col-md-12" >
        <!-- <button type="button" class="btn btn-primary btn-raised" onclick="playv()">play</button> -->
        <button type="button" class="btn btn-primary btn-raised" id="jumpvid" style="display:none">jump</button>
        <!-- <button type="button" class="btn btn-primary btn-raised" onclick="snap()">snap</button><br> -->
        <progress id="VprogressBar" value="0" max="100" style="width:250px; height:10px;display:none"></progress>
  <h3 id="vup-status" style="font-size:15px;"></h3>
  <p id="loaded_n_total"></p>
    <input type="hidden" id="vm-details-id">
    <button id="goto-v-pseting" type="button" class="btn btn-primary btn-raised" style="display:none">Go to Publish Setting</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- materials upload -->
    <?php require_once('footerblank.php');?> 

<script type="text/javascript">
     $(document).ready(function() {
            $("#datacontent").load('<?php echo base_url()."teacher/dashboard"; ?>');
           // $("#datacontent").load('<?php echo base_url()."dashboard/institue_profile"; ?>');
          //  $("#datacontent").load('<?php echo base_url()."teacher/srch_institute"; ?>');
        });

     $(document).on('click', '.open_home', function(){  
        $("#datacontent").load('<?php echo base_url()."teacher/dashboard"; ?>');

     });
     $(document).on('click', '.open_srchinsti', function(){  
        $("#datacontent").load('<?php echo base_url()."teacher/srch_institute"; ?>');
        $('#mayallinsti').modal('hide');
      
     });
     $(document).on('click', '.open_ins_pro', function(){  
        $("#datacontent").load('<?php echo base_url()."teacher/institue_profile"; ?>');
      
     });
     $(document).on('click', '.open_courseseting', function(){  
        $("#datacontent").load('<?php echo base_url()."teacher/institue_course"; ?>');
     });
     $(document).on('click', '.open_subject', function(){  
        $("#datacontent").load('<?php echo base_url()."teacher/institue_subject"; ?>');
     });
      $('.open_setting').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."gsetting/account_setting"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
      // window.history.pushState('forward', null, './institue_panel#account_setting');
      // nextstate('account_setting'); 
     });
     $(document).on('click', '.allinsbtn', function(){  
  
        $("#allmyistlist").load('<?php echo base_url()."teacher/my_inst_list"; ?>');
     });
      $('.open_materials').click(function() { 
        $("#datacontent").load('<?php echo base_url()."materials/materials_dashboard"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        // window.history.pushState('forward', null, './institue_panel#materials_dashboard');
        // nextstate('materials_dashboard');
     });

       $(document).on('click', '.open_materials_edit', function(){
        $("#datacontent").load('<?php echo base_url()."materials/materials_edit/"; ?>'+this.id);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        // window.history.pushState('forward', null, './institue_panel#materials_edit');
       //  nextstate('materials_edit');
     });
      $('.open_testseries').click(function() { 
       $("#datacontent").load('<?php echo base_url()."testexam/test_dashboard"; ?>');
        // $("#datacontent").load('<?php echo base_url()."testexam/test_manage/"; ?>'+1);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        // window.history.pushState('forward', null, './institue_panel#test_dashboard');
        // nextstate('test_dashboard');
     });
      $(document).on('click', '#goto-v-pseting', function(){
        $('#vid-up-pop').hide();
        $('#mainmaterials').show();
        $('#in-up-vidblk').hide();
        $('#in-def-vidblk').show();
        $('#VprogressBar').hide();
        $('#goto-v-pseting').hide();
        $('#vup-status').html('');
        var editid = $('#vm-details-id').val();
        $("#datacontent").load('<?php echo base_url()."materials/materials_edit/"; ?>'+editid);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        // window.history.pushState('forward', null, './institue_panel#materials_edit');
        // nextstate('materials_edit');
     });

     $(document).on('click', '#cls-deskview', function(){  
     
        $(".des-view-err").fadeOut('fast');
     });


     $(document).on('click', '.openmyinsti', function(){  
          var crntinstid = this.id;

           $('#alert-wait').show();
                  var dataString = 'crntinstid='+ crntinstid;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'student/Mycrntinstitute',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
               $("#datacontent").load('<?php echo base_url()."teacher/dashboard"; ?>');
               
                setTimeout(function(){  $("#allmyistlist").load('<?php echo base_url()."teacher/my_inst_list"; ?>'); }, 1000); 

                 $('#crntchk_'+crntinstid).show(); 
                 $('#alert-wait').slideUp(); 
                 window.location.reload();
                }else if(response.status == 203){
                 
                   $('#alert-wait').slideUp();
                   $('#alert-err').show().delay(2000).slideUp(); 
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').slideUp(); 
                 $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
 
    
     });

</script>