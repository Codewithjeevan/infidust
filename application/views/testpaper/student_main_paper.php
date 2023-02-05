 <style type="text/css">

 .cusbodytable td { padding: 5px; }
 .tabing { padding: 2px 7px 2px 7px; color: #000;}
 </style>
 <div class="row body-data fix-iner-header" style="">
  <button id="back_dash" class="btn back-btn-fix " style="position:absolute"><i class="fa fa-fw fa-arrow-left"></i></button><h3 style="font-family: 'Montserrat'; margin-left:40px">Test Paper</h3>
  
</div>

<div class="row full-wpage" style="padding-top:80px;min-height:700px">
<div class="col-md-5" style="padding-left:0;">
 <div class="row body-data">
 <table width="100%" class="cusbodytable"> 
   <tr>
     <td><h3 style="font-family: 'Montserrat';"><?php echo $paper['title'] ?> </h3></td>
   </tr>
   <tr>
     <td>
       <div class="c-title2">Class/Course</div>
       <p>
        <?php foreach ($coursename as $key => $value) {
         ?>
         <?php
          $mycoursarry = explode(',',$myclass_array);
          if( in_array( $value['mycours_id'], $mycoursarry ) ) { ?>
         <button class="btn active tabing" style="color:#000;"><?php echo $value['cours_nm'] ?></button>
         <?php } ?>
         <?php } ?>
       </p>
     </td>
   </tr>
   <tr>
     <td>
       <div class="c-title2">Subject</div>
       <p>
 <?php 
   $newarraysub = $paper['subject'];
   $subjename = $this->db->query("SELECT `ins_subject`.*

                                          FROM `ins_subject`
                                         WHERE
                                         `ins_subject`.`subj_id` IN ($newarraysub)
                                        GROUP BY `ins_subject`.`subject_nm`                            
                                    ")->result_array(); 
    ?>
    <?php foreach ($subjename as $key => $valuess) {
          ?>
         <button class="btn active tabing" style="color:#000;"><?php echo $valuess['subject_nm'] ?></button>
      <?php } ?>

       </p>
     </td>
   </tr>
   <tr>
     <td width="50%" style="border:1px solid #ddd;padding-top:10px;">
       <div class="c-title2">Test duration</div>
       <p><b><?php echo $paper['time_show']; ?></b></p>
     </td>
  
     <td  style="border:1px solid #ddd;padding-top:10px;">
       <div class="c-title2">Total marks</div>
       <p><b><?php echo $paper['tot_marks']; ?></b></p>
     </td>
   </tr>
   <tr>
     <td>
       <div class="c-title2">Status</div>
       <p>
       <?php if($test_paper_submit){ ?>
         
            <?php if($test_paper_submit['is_complete'] == 0){ ?>
             <?php if($tim_is_over == 1){ ?>
              <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">Cancled</small>
              <?php }else{ ?>
              <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">On test</small>
              <?php } ?>
            <?php }else{ ?>
            <i class="fa fa-fw fa-lock" style="color:#1a73e8"></i> <small class="label bg-pblue sts-lvl2" style="color:#fff;">Complete</small>
            <?php } ?>
         
         <?php }else{ ?>

                 <?php if($tim_is_over == 1){ ?>
                      <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">Missed</small>
                       <?php }else{ ?>
                       <i class="fa fa-fw fa-unlock-alt" style="color:#34a853"></i> <small class="label bg-pgrn sts-lvl2" style="color:#fff;">Open</small>
                       <?php } ?>


        <?php } ?>
       </p>
     </td>
   </tr>
   <tr>
     <td>
      <input type="hidden" id="thispaperid" value="<?php echo $paper['tp_mid']; ?>">
      <?php if($test_paper_submit){ ?>
         
     <?php }else{ ?>
        <?php if($tim_is_strt == 0){ ?>
          <span id="timformsg" style="display:none">Paper will be open with in</span><br>
          <span id="starttoexam" style="color:green;display:none"></span>
        <?php } ?>
     <?php } ?>
      <div id="mktest_block" style="display:none">
 

               <?php if($tim_is_over == 1){ ?>
                     <?php }else{ ?>

                     <?php if($test_paper_submit){ ?>
                      <?php if($test_paper_submit['is_complete'] == 0){ ?>
                      <button id="openTest" class="btn btn-primary btn-raised" value="">Let's Start Test</button>
                       <?php }else{ ?>
                          
                       <?php } ?>
                       <?php }else{ ?>
                       <button id="openTest" class="btn btn-primary btn-raised" value="">Let's Start Test</button>
                       <?php }?>

                     <?php } ?>
             



       </div>
       <!-- <button id="openTest" class="btn btn-primary btn-raised" value="">Complete Testx</button> -->
     </td>
   </tr>
 </table>
   
 </div>
 </div>


</div>

<style type="text/css">
  .qspaperloader { position: absolute;width: 100%;top:0px; height: 100%; background: #fff;z-index: 9999;}
  .qsmidldrdata { width:100%; margin-top: 40%;}
  .qsldrcercl { width:50px; height: 50px; }
</style>

 <!-- Modal -->
<div class="cus-modal-window " id="paper-view" style="display:none">
  <div class="cus-modl-view-full" style="" align="center">
  <div id="openpperodr" class="qspaperloader">
  <div class="qsmidldrdata" align="center">
   <div class="qsldrcercl"><div class="sbl-circ-path2" style="top:0;left:0;"></div></div>
   Please wait paper is loading..
  </div>
  </div> 
   <div id="submitpperodr" class="qspaperloader" style="display:none">
  <div class="qsmidldrdata" align="center">
   <div class="qsldrcercl"><div class="sbl-circ-path2" style="top:0;left:0;"></div></div>
   Please wait your paper is submitting.<br>Dont refresh the page or dont click the back button. <br>Otherwise paper will not submit.
  </div>
  </div>
    <div class="cus-modal-content">
      
      <div class="cus-modal-body" id="demoQpreview">
          
      </div>
      </div>
       
  </div>
</div>  

<input type="hidden" id="starttoval" value="<?php echo $paper['start_deadline'] ?>">
<input type="hidden" id="nowtimesval" value="<?php echo date('F j, Y')." ".date('H:i:s') ?>">
<input type="hidden" id="randtime" value="<?php echo rand(9999,1000); ?>">

 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

 <script type="text/javascript">
 $('#back_dash').click(function() { 
          $("#datacontent").load('<?php echo base_url()."testexam/test_dashboard_student"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './student_panel#test_dashboard_student');
        // nextstate('test_dashboard_student');
     });

$('#openTestx').click(function() {
    $('#paper-view').fadeIn('fast');
    var testpaperid = 1;
    setTimeout(function(){  
    $("#demoQpreview").load('<?php echo base_url()."testexam/studentpreview/"; ?>'+testpaperid);
  }, 1000);  
    });

   $('#openTest').click(function(e) {
    var thispaperid = $('#thispaperid').val();
   // if(!slnum || !question){
   //   $('#alert-msg').html("Enter mandatory fields !");
  
   //   $('#alert-toast').show().delay(2000).slideUp();
   // }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#paper-view').fadeIn('fast');
    var datastring = 'paperid='+thispaperid;
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Isstart_paper',
        data: datastring,
        dataType: 'json',
        cache: false,
        success: function(data) {
           console.log("suc xx");
                // $('#alert-wait').delay().slideUp(); 
                // $('#alert-suc').delay(2000).show().slideUp(); 
                // $('#paper-view').fadeIn('fast');
                setTimeout(function(){  
                $("#demoQpreview").load('<?php echo base_url()."testexam/studentpreview/"; ?>'+thispaperid);
                }, 1000); 
                $('#openTest').hide();
        },
         error: function(data){
                console.log("error xx");
                console.log(data);
                  setTimeout(function(){  
                $("#demoQpreview").load('<?php echo base_url()."testexam/studentpreview/"; ?>'+thispaperid);
                }, 1000); 
                $('#openTest').hide();
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    // }     
}); 

 </script>

 <script> 

var randtimec = Math.floor(30000 + Math.random() * 70000);
console.log(randtimec);
clearInterval(x1); 
 // document.getElementById("starttoexam").innerHTML = '';
    var notimemk='';
 var startto = $('#starttoval').val();
  var nowtimes = $('#nowtimesval').val();

var notimemk = new Date(nowtimes).getTime();
var deadline1 = new Date(startto).getTime(); 

var x1 = setInterval(function() { 

//var now1 = notimemk;
var t1 = deadline1 - notimemk; 
var days1 = Math.floor(t1 / (1000 * 60 * 60 * 24)); 
var hours1 = Math.floor((t1%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes1 = Math.floor((t1 % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds1 = Math.floor((t1 % (1000 * 60)) / 1000); 

    if (t1 < randtimec) { 
        clearInterval(x1); 
         //document.getElementById("starttoexam").innerHTML = "OPEN"; 
       
       $('#starttoexam').hide();
       $('#timformsg').hide();
       $('#mktest_block').show();
    }else{
      $('#starttoexam').show();
      $('#timformsg').show();
      // document.getElementById("starttoexam").innerHTML = days1 + "d " + hours1 + "h " + minutes1 + "m " + seconds1 + "s "; 
        $('#starttoexam').html(days1 + "d " +hours1 + "h " + minutes1 + "m " + seconds1 + "s ");
      
       //console.log(now1);
    }
    notimemk = notimemk + 1000; 
}, 1000); 

console.log("u3");

clearInterval(x2); 
</script> 



