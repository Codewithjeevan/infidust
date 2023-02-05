<!DOCTYPE html>
 <html lang="en" manifest="<?php echo base_url() ?>manifest.appcache">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infidust- Online Teaching Software</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/'?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content="Infidust is the best free online live teaching software for all educational platform, which provide multiple unlimited benefited features like live online classes, online test, share notes and videos, unlimited data storage , brand promotion in all over India, get student an etc"/>
  <meta name="keywords" content="online teaching software, software for online teaching, software for teacher, platform for teacher teaching online, online live teaching software, free online teaching software, free online teaching software in india, teaching software free in india, download free teaching online software, virtual classroom, e-learning platform, learning, teach online, lms, learning management system, online test,  online institute, online teacher, live teaching, online coaching, online tuitions, online school, free live classes, free virtual classroom, SCORM, Shareable Content Object Reference Mode, whiteboard, live class, sell courses, best online classes, best online institute, online chatting classes, video conferencing, live online course, school management software, system, academy online teaching, tuition teaching software, sofware for teaching online"" />

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


<meta itemprop="description" content="Are you looking for online teaching software, then Infidust is one stop solutions for your needs." />
<meta property="og:title" content="Infidust- Online Teaching Software" />
<meta property="og:image" content="/assets-public/dist/img/infidust-home.png"/>
<meta property="og:image:alt" content="online teaching software" />
<meta property="og:url" content="https://infidust.com" />
<meta property="og:description" content="Infidust is a software for online teaching where you experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!" />

<meta name="twitter:title" content="Infidust- Online Teaching Software" />
<meta property="og:description" content="Infidust is a software for online teaching. Experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!." />
<meta name="twitter:description" content="Infidust is a software for online teaching to collaborate with your institute, teachers & students online, which deliver attractive live classes. Lets you experience high quality video conferencing without usage more data, interactive online whiteboard, sharing notes and documents, server-side recording and much more. Start now free!" />
<meta name="twitter:image" content="/assets-public/dist/img/infidust-home.png" />
<?php require_once('cssinclude.php');?>

     
</head>

<body class="hold-transition skin-blue sidebar-collapse" style="background:#f4f4f4;">


<?php require_once('header.php');?>

<div class="wapper-view" style="display:block">
    <!-- Main content -->
    <div id="datacontent" class="datac-pad" style=" background-color: #f4f4f4; ">


    </div>
    </div>
    <!-- /.content -->  

<!-- <div id="livecontent" class="live-cls-blk" style="display:none"></div> -->

<style type="text/css">
  .des-view-err { position: fixed; width: 90%; bottom: 5%;left: 5%; padding: 10px 30px 10px 10px; background: red; color: #fff; border-radius: 7px;display: none}
</style>
<div class="des-view-err smallvisible">Please View your Institute panel in desktop/laptop for full feature!
<i id="cls-deskview" class="fa fa-close" style="position:absolute; top:5px; right:10px"></i>
</div>

<!-- Modal -->
<div class="modal fade" id="shareinfidust" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Share / Invite </h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>
          <!-- <button id="via-tx-ac" type="button" class="btn btn-outline-info"><i class="fa fa-fw fa-check"></i> &nbsp;&nbsp;<i class="fa fa-fw fa-envelope-o"></i> By Text</button> -->
          <!-- <button id="via-tx-dc" type="button" class="btn active" style="display:none"><i class="fa fa-fw fa-check" style="opacity:0.5"></i> &nbsp;&nbsp;<i class="fa fa-fw fa-envelope-o"></i> By Text</button>  -->
          <!-- <button id="via-wa-dc" type="button" class="btn active"><i class="fa fa-fw fa-check" style="opacity:0.5; display:none"></i> &nbsp;&nbsp;<i class="fa fa-fw fa-whatsapp"></i> By Whatsapp</button> -->
           <button id="via-wa-ac" type="button" class="btn btn-outline-info" style=""><i class="fa fa-fw fa-check" style="opacity:0.5"></i> &nbsp;&nbsp;<i class="fa fa-fw fa-whatsapp"></i> By Whatsapp</button>
        </div>
         <div class="form-group">
         <input type="hidden" id="shr-via" value="whats">
          <label for="shrnum" class="bmd-label-floating">Contact No.</label>
          <input type="text" class="form-control" id="shrnum">
          <span class="bmd-help"></span>
        </div>
      </div>
      <div class="modal-footer">
       <div class="sbl-circ-path3" id="shar-ldr" style="display:none"></div><i id="shar-suc" class="fa fa-fw fa-check" style="color:green; display:none"></i>
        <button id="letsinvite" type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  .livclsifrm { position: fixed; width: 100%; height: 100%; border:none; background: #000; top: 0;left: 0; z-index: 9999;}
  .uselands { display: none; padding-top:150px; position: fixed; width: 90%; height: 90%; top: 5%; left: 5%; background: #000; text-align: center; z-index: 9999; color: #fff;}
</style>
<iframe id="livecontent" src="" class="livclsifrm" style="display:none"></iframe>
<div class="uselands" align="center">Please use Landscape or Rotate!<br><br>
 <button id="openliveagain" type="button" class="btn btn-primary btn-raised">Retry</button>
</div>


<!-- matirials upload -->
<div id="vid-up-pop" class="black-ovr" align="center" style="display:none">
  <div class="creat-blk">
  <form id="upload_form" enctype="multipart/form-data" method="post">
    <div class="row" style="position:relative">
    <div class="hidevideo"><div class="whiteov-hid"></div>
    <input type="hidden" id="uniid" name="uniid" value="45625354">
    <video id="snpvideo" class="video-js vjs-fluid vjs-tech" controls="controls" width="700" height="400" data-setup="{}" poster="" >
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
var curent_live_cls = 0;
var config = {
  apiKey: "AIzaSyBKCM2-MOg7K2sISnUp21H_x8kPf_DqQJI",
    authDomain: "infidust.firebaseapp.com",
    databaseURL: "https://infidust.firebaseio.com",
    projectId: "infidust",
    storageBucket: "infidust.appspot.com",
    messagingSenderId: "109945923723",
    appId: "1:109945923723:web:b582f742f47bb8b94ecc8e",
    measurementId: "G-H1JBB5NVV7"
};
firebase.initializeApp(config);

     $(document).ready(function() {
          $("#datacontent").load('<?php echo base_url()."dashboard/dashboard_page"; ?>');
          // $("#livecontent").load('<?php echo base_url()."dashboard/liveclass"; ?>');
        });
      $(document).on('click', '.open_home', function(){  
        $("#datacontent").load('<?php echo base_url()."dashboard/dashboard_page"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
          window.history.pushState('forward', null, './institue_panel');
         main_state_val = 'dashboard_page,';
         next_state_val = '';
     });
     </script>





<script type="text/javascript">

     //$('.open_ins_pro').click(function() { 
        $(document).on('click', '.open_ins_pro', function(){ 
         $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/institue_profile"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
      
       window.history.pushState('forward', null, './institue_panel#institue_profile');
       nextstate('institue_profile'); 
     });
   
      $('.open_setting').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."gsetting/account_setting"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
       window.history.pushState('forward', null, './institue_panel#account_setting');
       nextstate('account_setting'); 
     });
      $('.open_courseseting').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/institue_course"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
       window.history.pushState('forward', null, './institue_panel#institue_course');
       nextstate('institue_course'); 
     });
   
      $('.open_subject').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/institue_subject"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#institue_subject');
         nextstate('institue_subject'); 
     });
   
     // $('.open_class_slot').click(function() { 
      $(document).on('click', '.open_class_slot', function(){  
        $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/institue_classlot"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#institue_classlot');
         nextstate('institue_classlot'); 
     });
   
      $('.open_admision').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/admission"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#admission');
         nextstate('admission'); 
     });
  
      $('.open_teacher_join').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/teacher_join"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
      window.history.pushState('forward', null, './institue_panel#teacher_join');
         nextstate('teacher_join'); 
     });
    
      $('.open_class_alotm').click(function() { 
           $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/class_alotm"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#class_alotm');
         nextstate('class_alotm');
     });
     
      $('.open_allstudent').click(function() { 
        $("#datacontent").load('<?php echo base_url()."dashboard/allstudent_view?456"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        window.history.pushState('forward', null, './institue_panel#allstudent_view');
         nextstate('allstudent');
     });
     
      $('.open_allteacher').click(function() { 
        $("#datacontent").load('<?php echo base_url()."dashboard/allteacher"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#allteacher');
         nextstate('allteacher');
     });
       // $('.open_materials').click(function() { 
        $(document).on('click', '.open_materials', function(){
        $("#datacontent").load('<?php echo base_url()."materials/materials_dashboard"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#materials_dashboard');
         nextstate('materials_dashboard');
     });
      $('.open_testseries').click(function() { 
        $("#datacontent").load('<?php echo base_url()."testexam/test_dashboard"; ?>');
        //$("#datacontent").load('<?php echo base_url()."testexam/test_manage"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#test_dashboard');
         nextstate('test_dashboard');
     });
      $(document).on('click', '.open_materials_edit', function(){
        $("#datacontent").load('<?php echo base_url()."materials/materials_edit/"; ?>'+this.id);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#materials_edit');
         nextstate('materials_edit');
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
         window.history.pushState('forward', null, './institue_panel#materials_edit');
         nextstate('materials_edit');
     });


     $(document).on('click', '.openliveclass', function(){
      curent_live_cls = this.id;
      checklandscpe();
        
     });

     $(document).on('click', '#openliveagain', function(){
     checklandscpe();

     });

     function checklandscpe(){
      var gtscrnwid = $(window).width();
      if(gtscrnwid >= 1000){
        openpagelive();
      } else{
          if(window.innerHeight > window.innerWidth){
              $(".uselands").show();
          }else{
            $(".uselands").hide();
            openpagelive();
            document.body.requestFullscreen();
          }
      } 
     }
   
    function openpagelive(){
       
        var comelivefor = curent_live_cls;
         var fdatabase = firebase.database().ref();
         var livests = fdatabase.child(comelivefor+'_sts').set('1');
         // var rchid = Math.floor(Math.random()*1000000);'/details?rid='+rchid
          document.getElementById('livecontent').src = '<?php echo base_url()."dashboard/liveclass/"; ?>'+comelivefor;
        $("#livecontent").fadeIn('fast');
       // $("#livecontent").load('<?php echo base_url()."dashboard/liveclass/"; ?>'+comelivefor);
          window.history.pushState('forward', null, './institue_panel#liveclass');
         nextstate('liveclass');
    }
    
      $(document).on('click', '.close_livepage', function(){  
        closeliveproc();
        
     });

      function closeliveproc(){
         closelivep();
           window.history.pushState('forward', null, './institue_panel');
         window.location = '<?php echo base_url()."institue_panel" ?>';
      }
      function closelivep(){
         var comeliveforc = this.id;
         var fdatabase = firebase.database().ref();
         var livestsc = fdatabase.child(comeliveforc+'_sts').set('0');
          //fdatabase.child(comeliveforc+'_sts').remove();
         curent_live_cls = 0;
       
        $("#livecontent").fadeOut('fast');

      }

     $(document).on('click', '#cls-deskview', function(){  
     
        $(".des-view-err").fadeOut('fast');
     });
     $(document).on('click', '.notliveotast', function(){  
     
        $("#alert-msg").html('You are not live yet!');
        $("#alert-toast").show().delay(2000).slideUp();
     });

</script>
 <script type="text/javascript">
 
</script>

<script type="text/javascript">
 
  $('#via-tx-dc').click(function() {  
        $("#via-tx-dc").hide();
        $("#via-tx-ac").show();
        $("#via-wa-ac").hide();
        $("#via-wa-dc").show();
        $("#shr-via").val('text');
     });
    $('#via-wa-dc').click(function() {  
        $("#via-wa-dc").hide();
        $("#via-wa-ac").show();
        $("#via-tx-ac").hide();
        $("#via-tx-dc").show();
        $("#shr-via").val('whats');
     });


  $('#letsinvite').click(function() {  
  var shrnum = $('#shrnum').val();
  var shrvia = $('#shr-via').val();
   var instus_name = '<?php echo $this->session->userdata("instu_name") ?>';
  if(!shrnum){

  }else{
     $('#shar-ldr').show();
                  var dataString = 'shrnum='+ shrnum+'&shrvia='+ shrvia+'&instus_name='+ instus_name;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Share_invite',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
               
                 $('#shar-ldr').hide();
                 $('#shar-suc').show().delay(2000).fadeOut(); 
                 $('#shareinfidust').modal('hide');

                  if(shrvia == 'whats'){ whatsmsgsnd();}
                }
              },
              error: function (response) {
            
               }

            }); 
  }
});  
var unloaded = false;
$(window).on('beforeunload', unloadlivests);
$(window).on('unload', unloadlivests);  
function unloadlivests(){ 
     if(curent_live_cls == 0){ }else{
         var fdatabase = firebase.database().ref();
         var livestsc = fdatabase.child(curent_live_cls+'_sts').set('0');
        
        }
}
function whatsmsgsnd(){
   var shrnum = $('#shrnum').val();
  var instu_name = '<?php echo $this->session->userdata("instu_name") ?>';
  var newwmsg = 'Hey this is '+instu_name+'. Signup in INFIDUST, and send me a joining request to start the live classes. Signup now %0a https://infidust.kamprik.com';
   window.location = 'https://wa.me/91'+shrnum+'?text='+newwmsg;
}
   
</script>
