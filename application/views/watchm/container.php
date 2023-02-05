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
  <meta name="keywords" content="online teaching software, free online teaching software, free online teaching software in india, teaching software free in india, download free teaching online software, virtual classroom, e-learning platform, learning, teach online, lms, learning management system, online test,  online institute, online teacher, live teaching, online coaching, online tuitions, online school, free live classes, free virtual classroom, SCORM, Shareable Content Object Reference Mode, whiteboard, live class, sell courses, best online classes, best online institute, online chatting classes, video conferencing, live online course, school management software, system, academy online teaching, tuition teaching software, sofware for teaching online" />
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


<meta itemprop="description" content="Are you looking for online teaching software then Infidust is one stop solutions for your needs." />
<meta property="og:title" content="Infidust- Online Teaching & Learning Software" />
<meta property="og:image" content="/assets-public/dist/img/infidust-home.png"/>
<meta property="og:image:alt" content="online teaching and learning software" />
<meta property="og:url" content="https://infidust.com" />
<meta property="og:description" content="Infidust is a online teaching software where you experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!" />

<meta name="twitter:title" content="Infidust- Online Teaching & Learning Software" />
<meta property="og:description" content="Infidust is a online teaching software. Experience high quality video conferencing without usage more data, interactive live whiteboard, notes sharing, live recording and much more. Start now free!." />
<meta name="twitter:description" content="Infidust is online teaching software to collaborate with your institute, teachers & students online, which deliver attractive live classes. Lets you experience high quality video conferencing without usage more data, interactive online whiteboard, sharing notes and documents, server-side recording and much more. Start now free!" />
<meta name="twitter:image" content="/assets-public/dist/img/infidust-home.png" />

  <?php require_once('cssinclude.php');?> 

  
</head>

<body class="hold-transition skin-blue sidebar-collapse" style="background:#f4f4f4;">


  <?php require_once('header.php');?> 

<div class="wapper-view" style="display:block; margin-left:0;">
    <!-- Main content -->
    <div id="datacontent" class="container-fluid" style="padding: 48px 0px 20px 0px; background-color: #f4f4f4; ">


    </div>
    </div>
    <!-- /.content -->  


    <?php require_once('footerblank.php');?> 

<script type="text/javascript">



     $(document).ready(function() {
            $("#datacontent").load('<?php echo base_url()."watch/dashboard/".$view;  ?>');
           // $("#datacontent").load('<?php echo base_url()."dashboard/institue_profile"; ?>');
           // $("#datacontent").load('<?php echo base_url()."student/srch_institute"; ?>');
        });


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