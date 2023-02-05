<style type="text/css">
	.rit-ac-op { position: absolute;top:5px; right:0; width: 60px; height: 24px; background: ; font-size: 17px; }
	.rit-ac-op .active { opacity: 0.8;}
	.rit-ac-op .active:hover { opacity: 1;}
	.qus-list { background: #f0f5fb; margin: 7px 0px 7px 0px; padding: 7px; border-radius: 4px; font-size: 14px; }
</style>
<div class="col-md-12" style="padding:0px;border-bottom:1px solid #ddd">
	<h3 style="font-size:18px">All Questions</h3>
</div>
<?php if($questions){ ?>
<?php foreach ($questions as $key => $value) {
?>

<?php if($value['type'] == 't') { ?>
<div id="quesrow_<?php echo $value['qs_id']?>" class="col-md-12 qus-list" style="background:#d0d8e2;">
 
		<b><?php echo $value['sl_no'] ?>.  <?php echo substr($value['ques'], 0, 20)."..." ; ?> </b>
	
	<div class="rit-ac-op" align="right">
		  <i data-type="<?php echo $value['type']?>" data-qsid="<?php echo $value['qs_id']?>" data-slno="<?php echo $value['sl_no']?>" data-ques="<?php echo $value['ques']?>" data-img="<?php echo $value['img']?>" data-op1="<?php echo $value['op1']?>" data-op2="<?php echo $value['op2']?>" data-op3="<?php echo $value['op3']?>" data-op4="<?php echo $value['op4']?>" data-op5="<?php echo $value['op5']?>" data-op6="<?php echo $value['op6']?>" data-smark="<?php echo $value['s_mark']?>" data-crtans="<?php echo $value['crt_ans']?>" class="fa fa-fw fa-pencil active editques"></i>

		   <i id="<?php echo $value['qs_id']?>" class="fa fa-fw fa-trash active ques_del"></i>
	</div>
</div>
<?php }else { ?>

<div id="quesrow_<?php echo $value['qs_id']?>" class="col-md-12 qus-list">

 <div style="width:200px;height:20px; overflow:hidden;">
 <table width="100%">
 	<tr>
 		<td valign="top"><?php echo $value['sl_no'] ?>.</td>
 		<td valign="top"><?php echo substr($value['ques'], 0, 20)."..." ; ?></td>
 		<td valign="top">
 		<?php if($value['img']) { ?>
	<i class="fa fa-fw fa-file-image-o"></i>
	<?php } ?> 
	</td>
 	</tr>
 </table>
	 	   
</div>	
	
	<div style="width:0px; height:0px;overflow:hidden;position:absolute">
	<textarea  id="ques_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['ques']?></textarea>
	<textarea  id="quesop1_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op1']?></textarea>
	<textarea  id="quesop2_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op2']?></textarea>
	<textarea  id="quesop3_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op3']?></textarea>
	<textarea  id="quesop4_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op4']?></textarea>
	<textarea  id="quesop5_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op5']?></textarea>
	<textarea  id="quesop6_<?php echo $value['qs_id']?>" style="display:none"><?php echo $value['op6']?></textarea>
	</div>
	<div class="rit-ac-op" align="right">
	
		 <i data-type="<?php echo $value['type']?>" data-qsid="<?php echo $value['qs_id']?>" data-slno="<?php echo $value['sl_no']?>" data-img="<?php echo $value['img']?>" data-smark="<?php echo $value['s_mark']?>" data-crtans="<?php echo $value['crt_ans']?>" class="fa fa-fw fa-pencil active editques"></i> 

		 <i id="<?php echo $value['qs_id']?>" class="fa fa-fw fa-trash active ques_del"></i>

	</div>
</div>
<?php } ?>

<?php } ?>
<?php }else { ?>
<div class="col-md-12" style="padding:20px; font-size:14px;" align="center">
	<p>No Questions added yet!</p>
</div>
<?php } ?>


<script type="text/javascript">
	$('.editques').click(function(){
		var type = $(this).attr('data-type');
		var qsid = $(this).attr('data-qsid');
		var slno = $(this).attr('data-slno');
		var ques = $('#ques_'+qsid).val();
		//alert(ques);
		var img = $(this).attr('data-img');
		var op1 = $('#quesop1_'+qsid).val();
		var op2 = $('#quesop2_'+qsid).val();
		var op3 = $('#quesop3_'+qsid).val();
		var op4 = $('#quesop4_'+qsid).val();
		var op5 = $('#quesop5_'+qsid).val();
		var op6 = $('#quesop6_'+qsid).val();
		var smark = $(this).attr('data-smark');
		var crtans = $(this).attr('data-crtans');

		if(type == 't'){
			$('#quesblock-blk').click();
			$('#slnum_blk').val(slno);
			$('#question_blk').val(ques);
			$('#forqsblk_tid').val(qsid);
			$('#cancle_quesblk').show();

		}else{
			$('#ques-blk').click();
			$('#slnum').val(slno);
			$('#question').val(ques);
			CKEDITOR.instances['editor1'].setData(ques);
			CKEDITOR.instances['editor2'].setData(op1);
			CKEDITOR.instances['editor3'].setData(op2);
			CKEDITOR.instances['editor4'].setData(op3);
			CKEDITOR.instances['editor5'].setData(op4);
			CKEDITOR.instances['editor6'].setData(op5);
			CKEDITOR.instances['editor7'].setData(op6);
			$('#op1').val(op1);
			$('#op2').val(op2);
			$('#op3').val(op3);
			$('#op4').val(op4);
			$('#op5').val(op5);
			$('#op6').val(op6);
			$('#s_marks').val(smark);
			$('#forqs_tid').val(qsid);
			 $('#outpuimg').hide();
			if(img){
				var outpuimg = document.getElementById('outpuimg');
            outpuimg.src = '<?php echo base_url()?>'+'assets/questions-big/'+img;
            $('#outpuimg').show();
			}
			
            $('#cancle_ques').show();
            $('#crt_ans').val(crtans);
            	$('.optans').removeClass('optchkactiv'); 
            	$('.optans').addClass('optchkdeactiv');
            $('.opchk_'+crtans).removeClass('optchkdeactiv'); 
         	$('.opchk_'+crtans).addClass('optchkactiv'); 
         	var mknum = 0;
         	if(crtans == 1){mknum = 'I';}else if(crtans == 2){mknum = 'II';}else if(crtans == 3){mknum = 'III';}else if(crtans == 4){mknum = 'IV';}else if(crtans == 5){mknum = 'V';}else if(crtans == 6){mknum = 'VI';}
			$('#showopttxt').html(mknum);
		}
		 
	});


 	$('#cancle_ques').click(function(){	
          $('#slnum').val('');
			$('#question').val('');
			$('#op1').val('');
			$('#op2').val('');
			$('#op3').val('');
			$('#op4').val('');
			$('#op5').val('');
			$('#op6').val('');
			$('#s_marks').val('');
			$('#forqs_tid').val('0');
			$('#outpuimg').hide();
			$('#cancle_ques').hide();
			$('#crt_ans').val('');
			$('#showopttxt').html('0');
 	});

 	$('#cancle_quesblk').click(function(){	
          $('#slnum_blk').val('');
			$('#question_blk').val('');
			$('#forqsblk_tid').val('0');
			$('#cancle_quesblk').hide();
 	});

 	


$('.ques_del').click(function(){     
    var ques_id = this.id;


           $('#alert-wait').show();
                  var dataString = 'ques_id='+ ques_id;
            jQuery.ajax({
              type: "POST",
              url: base_url +'testexam/Delete_singleques',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){
             
                 $('#alert-wait').slideUp(); 
                 $('#alert-suc').delay(2000).show().slideUp(); 
                  	$('#cancle_quesblk').click();
                  	$('#cancle_ques').click();
                  	$('#quesrow_'+ques_id).remove();
                 
                }else if(response.status == 203){
                   $('#alert-wait').slideUp(); 
                    $('#alert-err').delay(2000).show().slideUp(); 
                }
              },
              error: function (response) {
               $('#alert-wait').hide();
                  $('#alert-err').delay(2000).show().slideUp(); 
                //location.reload();
                  }
            });
      
});
</script>