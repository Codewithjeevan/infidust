  <style type="text/css">
.testpaperhdr { position:fixed; height: 45px; background:#fff;border-bottom:1px solid #ddd;top:0; z-index: 99; font-size: 20px;padding: 5px 15px;}
.testpaperfootr { position:fixed;  height: 45px; background:#fff;border-top:1px solid #ddd;bottom:0; z-index: 99; font-size: 20px;}
#showtime { color: red;}
body {overflow: hidden}
 @media only screen and (min-width: 260px) and (max-width: 992px) {
  .testpaperhdr { position:fixed;width:100%;}
  .testpaperfootr { position:fixed;width:100%; }
  }
  @media only screen and (min-width: 993px) and (max-width: 3000px) { 
    .testpaperhdr { position:fixed;width:70%;}
    .testpaperfootr { position:fixed;width:70%; }
  }
  .option-area p { margin-bottom: 0;}
  .crtansblk { background: #d8f2d0; padding: 2px 5px 2px 7px; border-radius: 4px}
  .defdblk { background: ; padding: 2px 5px 2px 7px; border-radius: 4px}
  .givecrtansblk { background:#b8e1a1 ; padding: 2px 5px 2px 7px; border-radius: 4px}
  .givwrongans { background:#f3b1b1 ; padding: 2px 5px 2px 7px; border-radius: 4px}
  .addedmarks { background: #63a529; color: #fff; padding: 2px 5px 2px 5px; text-align: center; border-radius: 5px; width: 50px; font-size: 13px;}
  .nosdmarks { background: #cd2f2f; color: #fff; padding: 2px 5px 2px 5px; text-align: center; border-radius: 5px; width: 50px; font-size: 13px;}
  </style>
  <div class="row testpaperhdr" style="">
  <div id="showtime"></div>
    <!-- <button id="tempclose" class="btn pull-right" style="position:absolute; right:0;"><i class="fa fa-close"></i></button> -->
  </div>
  <div class="row " style="padding-top:25px;">
        <div class=" res-pad" style="width:100%;"><h4><?php echo $personaldata['insti_nm'] ?></h4>
        <p><b><?php echo $paper['title'] ?></b></p>
        <table width="100%" class="paper-hdrdata" style="">
          <tr>
            <td>Course/Class: 
              
              <?php foreach ($coursename as $key => $valuec) {
               ?>
               <?php
                $mycoursarry = explode(',',$myclass_array);
                if( in_array( $valuec['mycours_id'], $mycoursarry ) ) { ?>
                <small class="label bg-gray sts-lvl2"><?php echo $valuec['cours_nm'] ?></small>
               <?php } ?>
               <?php } ?>
             <br> Subject: 
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
          <small class="label bg-gray sts-lvl2"><?php echo $valuess['subject_nm'] ?></small>
      <?php } ?>

             </td>
            <td align="right">Marks: <?php echo $paper['tot_marks'] ?> <br> <?php echo $paper['time_show'] ?></td>
          </tr>
        </table>
        </div>
        <div class="col-md-12" style="border-bottom:1px solid #ddd;height:20px;"></div>
      </div>
<form id="submmitpaper" enctype="multipart/form-data" method="post" >
<div class="row " align="left" style="padding-top:30px">
<input type="hidden" name="paperid" id="paperid" value="<?php echo $paper['tp_mid'] ?>">
<input type="hidden" name="totmarks" value="<?php echo $paper['tot_marks'] ?>">
  <?php 
  $paper_submit= $this->db->get_where("test_paper_submit", array('papr_id' => $paper['tp_mid'],'memid' =>$studentid))->row_array();
$spid = $paper_submit['sp_id'];
  ?>
  <?php
 $paper_submit_qs= $this->db->get_where("test_paper_submit_qs", array('spid' => $spid))->row_array();
 $allandis = $paper_submit_qs['ansid'];
 $allandis = explode(",", $allandis);
  $allqsis = $paper_submit_qs['qesid'];
  $allqsis = explode(",", $allqsis);
 //echo $allandis[2];
$qsarr = array();
 
 for($i = 0; $i < count($allandis); $i++){
  $ansidvl = (string)$allandis[$i]."_".$i;
   $qsarr[$ansidvl] = $allqsis[$i];
 
 }
 
   ?>
<?php if($questions){ ?>
<?php foreach ($questions as $key => $value) {
?>
  <?php 
 $keyans = array_search ($value['qs_id'], $qsarr);
  if($keyans){
    $keyansex = explode("_", $keyans);
    $givencrtans = $keyansex[0];
  }else{
    $givencrtans = '--';
  }


  ?>
    <?php if($value['type'] == 't') { ?>
      	<div class="col-md-12 q-typ-block" >
	      	<div class="ques-pad qes-txt" >
	      	 <span class="qs-slnum"><?php echo $value['sl_no'] ?>.</span>
	      		<?php echo $value['ques'] ?>
	      	</div>
      	</div>
    <?php }else { ?>
      	<div class="col-md-12" >
      	<div class="ques-pad qes-txt">
      	    <span class="qs-slnum"><?php echo $value['sl_no'] ?>.</span>
      		<?php echo $value['ques'] ?>
		</div>
		<?php if($value['img']) { ?>
      		<div class="row qesimg" align="center" style="">
      		<div class="imginer"><img src="<?php echo base_url() ?>assets/questions-big/<?php echo $value['img'] ?>"></div>
      		</div>
      	 <?php } ?>	


      		<div class="row option-area">
               <input type="hidden" name="qesids[]" value="<?php echo $value['qs_id'] ?>">
      			   <input type="hidden" name="andsids[]" id="getans_<?php echo $value['qs_id'] ?>" value="0">
                 <table width="100%">
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="1_<?php echo $value['qs_id'] ?>" value="1" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                           
                             <?php if($givencrtans == 1){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[i]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt " style="padding-bottom:3px">
                    <div class="<?php if($value['crt_ans'] == 1){echo 'crtansblk';} ?>  
                    <?php if($givencrtans == 1){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                      ">
                    <?php echo $value['op1'] ?>
                    </div>
                    </td>
                 	</tr>
                 	<?php if($value['op2']){ ?>
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="2_<?php echo $value['qs_id'] ?>" value="2" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                              <?php if($givencrtans == 2){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[ii]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt">
                    <div class="<?php if($value['crt_ans'] == 2){echo 'crtansblk';} ?> 
                    <?php if($givencrtans == 2){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                         ">
                    <?php echo $value['op2'] ?>
                    </div>
                    </td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op3']){ ?>
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="3_<?php echo $value['qs_id'] ?>" value="3" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                            <?php if($givencrtans == 3){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[iii]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt">
                    <div class="<?php if($value['crt_ans'] == 3){echo 'crtansblk';} ?> 
                    <?php if($givencrtans == 3){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                        ">
                    <?php echo $value['op3'] ?>
                    </div>
                    </td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op4']){ ?>
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="4_<?php echo $value['qs_id'] ?>" value="4" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                            <?php if($givencrtans == 4){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[iv]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt">
                    <div class="<?php if($value['crt_ans'] == 4){echo 'crtansblk';} ?> 
                    <?php if($givencrtans == 4){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                        ">
                    <?php echo $value['op4'] ?>
                    </div>
                    </td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op5']){ ?>
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="5_<?php echo $value['qs_id'] ?>" value="5" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                            <?php if($givencrtans == 5){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[v]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt">
                    <div class="<?php if($value['crt_ans'] == 5){echo 'crtansblk';} ?> 
                    <?php if($givencrtans == 5){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                        ">
                    <?php echo $value['op5'] ?>
                    </div>
                    </td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op6']){ ?>
                 	<tr>
                 		<td width="75" style="padding-bottom:3px">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="6_<?php echo $value['qs_id'] ?>" value="6" class="allcoursubx singq_<?php echo $value['qs_id'] ?>" 
                            <?php if($givencrtans == 7){
                                 echo 'checked disabled';
                                  }else{ 
                                  echo '';
                                  }?>
                            > <span class="opt-num-txt">[vi]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt">
                    <div class="<?php if($value['crt_ans'] == 6){echo 'crtansblk';} ?> 
                    <?php if($givencrtans == 6){
                      if($givencrtans == $value['crt_ans']){
                         echo 'givecrtansblk';
                          }else{ 
                          echo 'givwrongans';
                          } 
                        }?>
                        ">
                    <?php echo $value['op6'] ?>
                    </div>
                    </td>
                 	</tr>
                  
                 	<?php } ?>
                  <tr>
                    <td>
                    <?php if($givencrtans == $value['crt_ans']){?>
                    <div class="addedmarks">+<?php echo $value['s_mark'] ?></div>
                    <?php } else { ?>
                    <div class="nosdmarks">+0</div>
                    <?php } ?>
                    </td>
                    <td></td>
                  </tr>
                 </table>
      		
      		</div>
      	</div>
      	<div class="col-md-12" style="height:50px;"></div>
      	<?php } ?>
      	
      	


    

<?php } ?>
<?php }else { ?>
<div class="col-md-12" style="padding:20px; font-size:14px;" align="center">
	<p>No Questions added yet!</p>
</div>
<?php } ?> 
 </div>
</form>
  <div class="row testpaperfootr" style="padding-top:4px" >
    <div class="col-md-12" align="center">
    <button id="tempclose" class="btn btn-primary btn-raised">Close</button>
    </div>
  </div>

 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

 <script type="text/javascript">
 $('#tempclose').click(function(){
   $('#paper-view').fadeOut('fast');
   $('body').css('overflow-y','scroll');
 });
 </script>
