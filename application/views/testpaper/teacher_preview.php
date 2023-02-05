  <?php 
  $thissubjects = '';
   $newarraycls = $paper['class'];
   $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array(); 
    ?>
    

      <?php
		$newarraysub = $paper['subject'];
		 $thissubj = $this->db->query("SELECT `ins_subject`.*

                                          FROM `ins_subject`
                                         WHERE
                                         `ins_subject`.`subj_id` IN ($newarraysub)
                                    ")->result_array(); 
       ?>
       <?php 
    	 foreach ($thissubj as $thissubj) {
    	 	 $thissubjects .= $thissubj['subject_nm'].', ';
    	 }
          ?> 
  <div class="row ">
      	<div class="col-md-12 res-pad"><h4><?php echo $personaldata['insti_nm'] ?></h4>
      	<p><b><?php echo $paper['title'] ?></b></p>
      	<table width="100%" class="paper-hdrdata" style="">
      		<tr>
      			<td>Course/Class: 
      				  <?php foreach ($coursename as $key => $valuec) {
				          ?>
				          <small class="label bg-gray sts-lvl2"><?php echo $valuec['cours_nm'] ?></small>
				      <?php } ?>
      			 <br> Subject: 
      			 <?php echo $thissubjects; ?>
      			 </td>
      			<td align="right">Marks: <?php echo $paper['tot_marks'] ?> <br> <?php echo $paper['time_show'] ?></td>
      		</tr>
      	</table>
      	</div>
      	<div class="col-md-12" style="border-bottom:1px solid #ddd;height:20px;"></div>
      </div>

<div class="row " align="left" style="padding-top:30px">

<?php if($questions){ ?>
<?php foreach ($questions as $key => $value) {
?>

    <?php if($value['type'] == 't') { ?>
      	<div class="col-md-12 q-typ-block" >
	      	<div class="col-md-12 ques-pad qes-txt" >
	      	 <span class="qs-slnum"><?php echo $value['sl_no'] ?>.</span>
	      		<?php echo $value['ques'] ?>
	      	</div>
      	</div>
    <?php }else { ?>
      	<div class="col-md-12" >
      	<div class="col-md-12 ques-pad qes-txt">
      	    <span class="qs-slnum"><?php echo $value['sl_no'] ?>.</span>
      		<?php echo $value['ques'] ?>
		</div>
		<?php if($value['img']) { ?>
      		<div class="row qesimg" align="center" style="">
      		<div class="imginer"><img src="<?php echo base_url() ?>assets/questions-big/<?php echo $value['img'] ?>"></div>
      		</div>
      	 <?php } ?>	
      		<div class="row option-area">
      			   
                 <table width="100%">
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[i]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op1'] ?></td>
                 	</tr>
                 	<?php if($value['op2']){ ?>
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[ii]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op2'] ?></td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op3']){ ?>
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[iii]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op3'] ?></td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op4']){ ?>
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[iv]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op4'] ?></td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op5']){ ?>
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[v]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op5'] ?></td>
                 	</tr>
                 	<?php } ?>
                 	<?php if($value['op6']){ ?>
                 	<tr>
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="" value="" class="allcoursubx"> <span class="opt-num-txt">[vi]</span>
		                      </label>
		                    </div>
                 		</td>
                 		<td valign="top" class="qes-txt"><?php echo $value['op6'] ?></td>
                 	</tr>
                 	<?php } ?>
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

 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>
 
  <script>
      $(document).ready(function() {
          domChangedM()
         function domChangedM() {
        renderMathInElement(document.body);
         }
      });
 </script>
 
 
 
 
 
 
 
 
 