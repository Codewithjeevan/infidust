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
<?php if($questions){ ?>
<?php foreach ($questions as $key => $value) {
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
                 		<td width="75">
                 			<div class="checkbox">
		                      <label style="color:#000">
		                        <input type="checkbox" id="1_<?php echo $value['qs_id'] ?>" value="1" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[i]</span>
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
		                        <input type="checkbox" id="2_<?php echo $value['qs_id'] ?>" value="2" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[ii]</span>
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
		                        <input type="checkbox" id="3_<?php echo $value['qs_id'] ?>" value="3" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[iii]</span>
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
		                        <input type="checkbox" id="4_<?php echo $value['qs_id'] ?>" value="4" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[iv]</span>
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
		                        <input type="checkbox" id="5_<?php echo $value['qs_id'] ?>" value="5" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[v]</span>
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
		                        <input type="checkbox" id="6_<?php echo $value['qs_id'] ?>" value="6" class="allcoursubx singq_<?php echo $value['qs_id'] ?>"> <span class="opt-num-txt">[vi]</span>
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
</form>
  <div class="row testpaperfootr" style="padding-top:4px" >
    <div class="col-md-12" align="center">
    <button id="papersubmit_dilog" class="btn btn-primary btn-raised">Submit Paper</button>
    </div>
  </div>

  <div class="yesnodilog" style="display:;" align="center" >
               <div class="yesnodiloginner" align="center">
                 Are you sure to submit the paper!<br><br> 
                 <button id="yessubmit" class="catthisaddid"  style="">Yes</button>
                 <button id="nosubmit" class="canclethiscat" style="">No</button>
               </div>
      </div> 

<button id="papersubmit" class="btn btn-primary btn-raised" style="position:fixed; bottom:-100px;">..</button>


 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

 <script type="text/javascript">
 $(document).ready(function() { 
  setTimeout(function(){  
  $('#openpperodr').fadeOut('fast');
   }, 2000); 
  });
 $('#tempclose').click(function(){
   $('#paper-view').fadeOut('fast');
   $('body').css('overflow-y','scroll');
 });
 
 
   $('#papersubmit_dilog').click(function(){
    $('.yesnodilog').show();
   });

   $('#nosubmit').click(function(){
    $('.yesnodilog').hide();
   });

   $('#yessubmit').click(function(){
    $('.yesnodilog').hide();
    $('#papersubmit').click();
   });
   
 </script>

 <script type="text/javascript">
 $('.allcoursubx').click(function(){
  var thisval = this.id;
  var splitval = thisval.split("_");
  var ansval = splitval[0];
  var qesid = splitval[1];

  var x = document.getElementById(thisval);
  if(x.checked == true){
    $(this).prop('checked',true);
    $('#getans_'+qesid).val(ansval);
    $('.singq_'+qesid).prop('checked',false);
    $(this).prop('checked',true);
  }else{
    $('#getans_'+qesid).val('0');
  }
   
 });



   $('#papersubmit').click(function(e) {
    var paperid = $('#paperid').val();
   // if(!slnum || !question){
   //   $('#alert-msg').html("Enter mandatory fields !");
   //   var paperid = $('#paperid').val();
   // }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#submitpperodr').show();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Submit_mypaper',
        data: $("#submmitpaper").serialize(),
        success: function(data) {
           console.log(data);
              
                $('#alert-suc').delay(2000).show().slideUp(); 
                $('#paper-view').fadeOut('fast');
                $("#datacontent").load('<?php echo base_url()."testexam/studentmainpaper/"; ?>'+paperid);
        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    // }     
}); 


 </script>

 <script> 
 var randtimecsubmit = Math.floor(1000 + Math.random() * 10000);

  var endto = "<?php echo $paper['end_dadeline'] ?>";
var deadline2 = new Date(endto).getTime(); 
var x2 = setInterval(function() { 
var now2 = new Date(); 
now2.setHours(now2.getHours() - 0);
now2 = now2.getTime(); 
var t2 = deadline2 - now2; 
var days2 = Math.floor(t2 / (1000 * 60 * 60 * 24)); 
var hours2 = Math.floor((t2%(1000 * 60 * 60 * 24))/(1000 * 60 * 60)); 
var minutes2 = Math.floor((t2 % (1000 * 60 * 60)) / (1000 * 60)); 
var seconds2 = Math.floor((t2 % (1000 * 60)) / 1000); 
document.getElementById("showtime").innerHTML = hours2 + "h " + minutes2 + "m " + seconds2 + "s "; 
    if (t2 < 0) { 
        clearInterval(x2); 
       // document.getElementById("showtime").innerHTML = "EXPIRED"; 
       
       $('#submitpperodr').show();
       setTimeout(function(){  
       $('#papersubmit').click();
       }, randtimecsubmit); 
    } 
}, 1000); 
</script> 