<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Home</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content=""/>
  <meta name="keywords" content="" />

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
          $("#datacontent").load('<?php echo base_url()."company/dashboard"; ?>');
          // $("#livecontent").load('<?php echo base_url()."dashboard/liveclass"; ?>');
        });
      $(document).on('click', '.open_home', function(){  
        $("#datacontent").load('<?php echo base_url()."company/dashboard"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
          window.history.pushState('forward', null, './admin_panel');
         main_state_val = 'dashboard,';
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
        $("#datacontent").load('<?php echo base_url()."dashboard/institue_setting"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
       window.history.pushState('forward', null, './institue_panel#institue_setting');
       nextstate('institue_setting'); 
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
        $("#datacontent").load('<?php echo base_url()."dashboard/allstudent"; ?>');
          if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
        window.history.pushState('forward', null, './institue_panel#allstudent');
         nextstate('allstudent');
     });
     
       
        $(document).on('click', '.open_allteacher', function(){  
        $("#datacontent").load('<?php echo base_url()."company/allteacher"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './admin_panel#allinstitute');
         nextstate('allteacher');
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
