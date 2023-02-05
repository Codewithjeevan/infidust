<!DOCTYPE html>
 <html lang="en" manifest="<?php echo base_url() ?>manifest.appcache">
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Infidust- Online Learning Software For Student</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link href="<?php echo base_url().'assets-public/' ?>dist/img/favicon.png" rel="shortcut icon" type="image/png">
  <meta name="description" content="Infidust is the best free online learning software for students where you get multiple unlimited features like get all courses coaching, institute, tuition or school, live intereaction with tutors, chat aand clear doudt instantly, online test, get notes and videos, unlimited data storage an etc."/>
  <meta name="keywords" content="elearning software, virtual classroom software, gets notes and videoes, online exam, online resluts, online learning software, online class software, live learning software, live learning platform, platform for elearning, student learning panel, live streaming software,best student learning software, top online learing platform" />
<meta name="theme-color" content="#1a73e8" />
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


<meta itemprop="description" content="Are you looking for online learning software then Infidust is one stop solutions for your needs." />
<meta property="og:title" content="Infidust- Online Learning Software For Student" />
<meta property="og:image" content="/assets-public/dist/img/infidust-home.png"/>
<meta property="og:image:alt" content="online learning software for student" />
<meta property="og:url" content="https://infidust.com" />
<meta property="og:description" content="Infidust is a online learning software where you experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!" />

<meta name="twitter:title" content="Infidust- Online Learning Software For Student" />
<meta property="og:description" content="Infidust is a online learning software. Experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!." />
<meta name="twitter:description" content="Infidust is online learning software to collaborate with your institute, teachers & students online, which deliver attractive live classes. Lets you experience high quality video conferencing without usage more data, interactive online whiteboard, sharing notes and documents, server-side recording and much more. Start now free!" />
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
<!-- <div id="livecontent" class="live-cls-blk" style="display:none"></div> -->

<style type="text/css">
  .livclsifrm { position: fixed; width: 100%; height: 100%; border:none; background: #000; top: 0;left: 0; z-index: 9999;}
</style>
<iframe id="livecontent" src="" class="livclsifrm" style="display:none"></iframe>


<!-- <div class="payment-modal">
  <iframe sandbox="allow-forms allow-popups allow-pointer-lock allow-same-origin allow-scripts" src="<?php echo base_url()."paytmKit/TxnTest.php?userid=30&custid=CUST21225&instid=20"; ?>" class="pay-iframe "></iframe>
</div> -->

    <?php require_once('footerblank.php');?> 

<script type="text/javascript">
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
           openNavipageStart('student','dashboard');
           // $("#datacontent").load('<?php echo base_url()."dashboard/institue_profile"; ?>');
           // $("#datacontent").load('<?php echo base_url()."student/srch_institute"; ?>');
        });

    
     $(document).on('click', '.open_srchinsti', function(){  
        $("#datacontent").load('<?php echo base_url()."student/srch_institute"; ?>');
        $('#mayallinsti').modal('hide');
         if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
     });
    
    
     
     
     $(document).on('click', '.allinsbtn', function(){  
  
        $("#allmyistlist").load('<?php echo base_url()."student/my_inst_list"; ?>');
     });

 $(document).on('click', '.openliveinst', function(){ 
        $("#alert-msg").html('You are not in active institute!');
        $("#alert-toast").show().delay(2000).slideUp();
   });
 $(document).on('click', '.opennolivecls', function(){ 
  $("#alert-msg").html('Not available yet!');
        $("#alert-toast").show().delay(2000).slideUp();
   });
 $(document).on('click', '.openliveclass', function(){ 
        var cls_liv_id = this.id; 
         document.getElementById('livecontent').src = '<?php echo base_url()."dashboard/liveclass/"; ?>'+cls_liv_id;
        $("#livecontent").fadeIn('fast');
        //$("#livecontent").load('<?php echo base_url()."student/liveclass/"; ?>'+cls_liv_id);
     });
   
     $(document).on('click', '.close_livepage', function(){  
        closeliveproc();
        
     });
     function closeliveproc(){
       $("#livecontent").fadeOut('fast');
     }
     


    // var myist_arry=0;

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
                
               $("#datacontent").load('<?php echo base_url()."student/dashboard"; ?>');
               
                setTimeout(function(){  $("#allmyistlist").load('<?php echo base_url()."student/my_inst_list"; ?>'); }, 1000); 

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