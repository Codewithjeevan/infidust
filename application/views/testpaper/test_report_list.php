 <style type="text/css">

 .cusbodytable td { padding: 5px; }
 .tabing { padding: 2px 7px 2px 7px; color: #000;}

   .user-sh-blk { width: 50px; height: 50px;  border-radius: 100%; overflow: hidden;text-align: center; color: #fff; }
 .def-usr-img { width: 30px; position: relative; top: 8px; opacity: 0.4}
  .user-sh-blk i{ font-size: 23px; color: #fff; margin-top: 20px; position: relative;}

      .activechk { background-color: green; color: #fff;}
  .activechk:hover { background-color: green; color: #fff;}
  .activechk:focus { background-color: green; color: #fff;}
  .litchk i { opacity: 0.8;}
  .sts-lvl2 { padding: 2px 4px 2px 4px; border-radius: 3px; font-size: 12px}
   .cus-table { border:none;}
  .cus-table td { border:none; padding: 0;}
 </style>
 <div class="row body-data fix-iner-header" style="">
  <button id="back_dash" class="btn back-btn-fix " style="position:absolute"><i class="fa fa-fw fa-arrow-left"></i></button><h3 style="font-family: 'Montserrat'; margin-left:40px">Report</h3>
  
</div>

<div class="row body-data" style="padding-top:50px ;">
<div class="col-md-12 box-sdow " style="padding:0;">
  <div class="row">
    <div class="col-md-8" style="padding:15px;">
      <h3 style="font-family: 'Montserrat';"><?php echo $paper['title'] ?> </h3>
      <input id="mainpaperid" type="hidden" value="<?php echo $paper['tp_mid'] ?>">

    <div class="c-title2">Subject</div>
       
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

     
    </div>
     <div class="col-md-4" style="padding:15px;">
        <table width="100%">
          <tr>
           <td width="50%" style="border:1px solid #ddd;padding:10px 10px 0px 10px;">
             <div class="c-title2">Test duration</div>
             <p><b><?php echo $paper['time_show']; ?></b></p>
           </td>
        
           <td  style="border:1px solid #ddd;padding:10px 10px 0px 10px;">
             <div class="c-title2">Total marks</div>
             <p><b><?php echo $paper['tot_marks']; ?></b></p>
           </td>
         </tr>
        </table>
     </div>
    <div class="col-md-12 hir-lin"></div>
    <div class="col-md-12" style="padding:15px 15px 0px 15px">
       <div class="c-title2">Class/Course</div>
       <p>
        <?php foreach ($coursename as $key => $value) {
         ?>
       
         <button id="crntshowcrs_<?php echo $value['mycours_id'] ?>" value="<?php echo $value['mycours_id'] ?>" class="btn active litchk singlcours" style="padding:4px 7px 4px 7px;"> <i class="fa fa-fw fa-chevron-down"></i> <?php echo $value['cours_nm'] ?></button>
        
         <?php } ?>
         <input id="allreportcrs" type="hidden" value="<?php foreach ($coursename as $key => $valuee) { echo $valuee['mycours_id'].','; } ?>">
       </p>
    </div>
  </div>
</div>

<div id="studentlist" class="col-md-12 box-sdow" style="margin-top:10px;padding:0">
  
</div>
<div class="col-md-5" style="padding-left:0;">

 </div>


</div>


 



 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

 <script type="text/javascript">
 $(document).ready(function() {
  var mainpaperid = $('#mainpaperid').val();
  var allreportcrs = $('#allreportcrs').val();
  var split_allcrs = allreportcrs.split(",");
  $('#crntshowcrs_'+split_allcrs[0]).removeClass('active');
  $('#crntshowcrs_'+split_allcrs[0]).removeClass('litchk');
    $('#crntshowcrs_'+split_allcrs[0]).addClass('activechk');

   $("#studentlist").load('<?php echo base_url()."testexam/test_report_list_student/"; ?>'+split_allcrs[0]+'/'+mainpaperid);

 var thismemtype =  "<?php echo $this->session->userdata('mem_type') ?>";
 if(thismemtype == 'teacher'){
          var panelfor = 'teacher_panel';
        }else{
          var panelfor = 'institue_panel';
        }
 $('#back_dash').click(function() { 
          $("#datacontent").load('<?php echo base_url()."testexam/test_dashboard"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './'+panelfor+'#test_dashboard');
          nextstate('test_dashboard');
     });


 $('.singlcours').click(function() { 

  var thiscrsid = this.value;
    $('.singlcours').removeClass('activechk');
    $('.singlcours').addClass('active');
    $('.singlcours').addClass('litchk');
    $(this).removeClass('litchk');
    $(this).removeClass('active');
    $(this).addClass('activechk');
    var mainpaperid = $('#mainpaperid').val();
     $("#studentlist").load('<?php echo base_url()."testexam/test_report_list_student/"; ?>'+thiscrsid+'/'+mainpaperid);
 });


 });
  

 </script>



