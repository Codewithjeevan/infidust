<style type="text/css">
 .tdhover tr:hover td { background: #f3f3f3;}
 .tdhover tr:hover .mati-opt-blk { opacity: 1}
 .data-aro { width: 36px; height: 36px; border-radius: 100%; padding: 0px 5px; }
.data-aro i { opacity: 0.7;}
</style>
<div class="row body-data " style="padding-top:20px;position:relative">
  <h3 style="font-family: 'Montserrat';">My Test Series</h3>
  <div style="position:absolute; right:0;">
  <!-- <button id="test_newcreate" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/testplus.png" width="21"> &nbsp;<span style="color:#000; font-weight:bold;">CREATE NEW</span></button> -->
  </div>
</div>
<br>
<div class="row box-sdow">
  <div class="col-md-12 fix-pad">
   <!-- <button type="button" class="btn" style="margin:0;"><i class="fa fa-fw fa-filter"></i></button> --> <span class="gray sml1" >All Paper status</span>
   <input type="hidden" value="" id="totdata">
   <input type="hidden" value="0" id="nextdata">
  <!--  <button id="load_next" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-right"></i></button>
   <button id="load_prevd" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-left"></i></button> -->
  
  </div>
  <div class="col-md-12 hir-lin"></div>

<!--  <div id="showmemberdata" style="width:100%;">
    
 </div> -->

<table class="table sml1 tdhover for-big" width="100%">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Papers</th>
    <!--   <th scope="col" style="font-size:12px;">Course/Class</th> -->
      <th scope="col" style="font-size:12px;">Subject</th>
      <th scope="col" style="font-size:12px;">Exm.Date</th>

      <th scope="col" style="font-size:12px;">Status</th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($papers as $key => $value) {
  ?>
  <tr>
    <td style="padding-left:30px"><?php echo $value['title'] ?></td>
   
    <td>
      
    
    
       <?php 
   $newarraysub = $value['subject'];
   $subjename = $this->db->query("SELECT `ins_subject`.*

                                          FROM `ins_subject`
                                         WHERE
                                         `ins_subject`.`subj_id` IN ($newarraysub)
                                        GROUP BY `ins_subject`.`subject_nm`                            
                                    ")->result_array(); 
    ?>
    <?php foreach ($subjename as $key => $valuess) {
          ?>
          <small class="label bg-gray sts-lvl2"><?php echo $valuess['subject_nm'] ?></small>
      <?php } ?>
    </td>
    <td style="font-size:12px">
       <?php if($value['exm_date']){ ?>
     <?php  $rsdate = strtotime ($value['exm_date']); echo date("F j, Y",$rsdate) ?> | 
     <?php  $rstime = strtotime ($value['exm_tim']); echo date("h:i A",$rstime) ?>
     <?php }else{echo '--';} ?>
    </td>
    
     <td>
<?php 
 $my_paper_submit= $this->db->get_where("test_paper_submit", array('papr_id' => $value['tp_mid'],'memid' => $memid))->row_array();

      $examdate = $value['exm_date'];
      $papertime = $value['time'];

       $split_ptime  = explode(":", $papertime);
       $split_hr = $split_ptime[0];
       $split_min = $split_ptime[1];
      
       $get_d_time = '+'.$split_hr.' hour +'.$split_min.' minutes';
       $exam_over_time =  date('H:i',strtotime($get_d_time,strtotime($value['exm_tim'])));
       $exam_over_time = $examdate." ".$exam_over_time.":00"; 

$crnttime = date("Y-m-d H:i:s");
$exmmyDate = date("Y-m-d H:i:s", strtotime($exam_over_time));

      if($crnttime > $exmmyDate){
          $tim_is_over = 1;
      }else{
         $tim_is_over = 0;
      }
 ?>



     <?php if($my_paper_submit){ ?>
            <?php if($my_paper_submit['is_complete'] == 0){ ?>
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



     </td>
     <td>
     <?php if($my_paper_submit){ ?>
          <small id="<?php echo $value['tp_mid'] ?>" class="label bg-pgrn sts-lvl2 gotest" style="color:#fff;">Report</small>
     <?php }else{ ?>
        <?php if($tim_is_over == 1){ ?>
                      <small id="<?php echo $value['tp_mid'] ?>" class="label bg-pgrn sts-lvl2 gotest" style="color:#fff;">Report</small>
                       <?php }else{ ?>
                       <small id="<?php echo $value['tp_mid'] ?>" class="label bg-black sts-lvl2 gotest" style="color:#fff;cursor: pointer;">Go Test</small>
                       <?php } ?>

     <?php } ?>


     </td>
   </tr>
<?php } ?>
  </tbody>
</table>
<div class="for-small" style="width:100%">
<?php foreach ($papers as $key => $value) {
  ?>

    <div class="col-md-12"style="position:relative;padding:10px;">
    <?php echo $value['title'] ?><br>
    <?php 
   $newarraysub = $value['subject'];
   $subjename = $this->db->query("SELECT `ins_subject`.*

                                          FROM `ins_subject`
                                         WHERE
                                         `ins_subject`.`subj_id` IN ($newarraysub)
                                        GROUP BY `ins_subject`.`subject_nm`                            
                                    ")->result_array(); 
    ?>
    <?php foreach ($subjename as $key => $valuess) {
          ?>
          <small class="label bg-gray sts-lvl2"><?php echo $valuess['subject_nm'] ?></small>
      <?php } ?>
    
   
    
    <span style="font-size:12px;display:block">
       <?php if($value['exm_date']){ ?>
     <?php  $rsdate = strtotime ($value['exm_date']); echo date("F j, Y",$rsdate) ?> | 
     <?php  $rstime = strtotime ($value['exm_tim']); echo date("h:i A",$rstime) ?>
     <?php }else{echo '--';} ?>
     </span>

<?php 
 $my_paper_submit= $this->db->get_where("test_paper_submit", array('papr_id' => $value['tp_mid'],'memid' => $memid))->row_array();

      $examdate = $value['exm_date'];
      $papertime = $value['time'];

       $split_ptime  = explode(":", $papertime);
       $split_hr = $split_ptime[0];
       $split_min = $split_ptime[1];
      
       $get_d_time = '+'.$split_hr.' hour +'.$split_min.' minutes';
       $exam_over_time =  date('H:i',strtotime($get_d_time,strtotime($value['exm_tim'])));
       $exam_over_time = $examdate." ".$exam_over_time.":00"; 

$crnttime = date("Y-m-d H:i:s");
$exmmyDate = date("Y-m-d H:i:s", strtotime($exam_over_time));

      if($crnttime > $exmmyDate){
          $tim_is_over = 1;
      }else{
         $tim_is_over = 0;
      }
 ?>

<div style="position:absolute;top:20px;right:10px;" align="right">
   <?php if($my_paper_submit){ ?>
            <?php if($my_paper_submit['is_complete'] == 0){ ?>
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
     <br>

      <?php if($my_paper_submit){ ?>
          <small id="<?php echo $value['tp_mid'] ?>" class="label bg-pgrn sts-lvl2 gotest" style="color:#fff;">Report</small>
     <?php }else{ ?>
         
         <?php if($tim_is_over == 1){ ?>
                      <small id="<?php echo $value['tp_mid'] ?>" class="label bg-pgrn sts-lvl2 gotest" style="color:#fff;">Report</small>
                       <?php }else{ ?>
                       <small id="<?php echo $value['tp_mid'] ?>" class="label bg-black sts-lvl2 gotest" style="color:#fff;cursor: pointer;">Go Test</small>
                       <?php } ?>
     <?php } ?>

</div>


    </div>
      
<?php } ?>
</div>

<?php
if($this->session->userdata("crent_viewid")){
 ?>


<?php }else{ ?>
<div class="col-md-12" align="center" style="padding:20px 20px 40px 20px;">
  You are in not any institute/school!<br>
  Go to My first institute and select one or join now.
</div>
<?php } ?>



</div>

<script type="text/javascript">
    $(document).ready(function() {
         // $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data"; ?>');
          
        });
 // $('#test_newcreate').click(function() { 
 //        $("#datacontent").load('<?php echo base_url()."testexam/Create_new_test"; ?>');
 //            if(  $("#hidtgl").is(":visible") == true )
 //            { 
 //              $('#hidtgl').click();
 //            }
 //         window.history.pushState('forward', null, './institue_panel#create_new_test');
 //         nextstate('create_new_test');
 //     });
 $('.gotest').click(function() { 

  var makeurl = 'studentmainpaper/'+this.id;
   openNavipage('testexam',makeurl);

     });
</script>