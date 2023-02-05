
<div class="row body-data fix-iner-header" style="">
  <!-- <button id="back_dash" class="btn back-btn-fix " style="position:absolute"><i class="fa fa-fw fa-arrow-left"></i></button> -->
  <h3 style="font-family: 'Montserrat'; margin-left:0px">My Active class/course</h3>

</div>
<div class="full-wpage" style="padding-top:80px;min-height:700px">
	
	<div class="col-md-5" style="border:1px solid #ddd;height:90px; border-radius:10px;padding:10px">
		<table width="100%">
	    <tr>
	      <td width="75"><div class="inst-btm-img-blk">
	      <img src="<?php echo base_url(); ?>assets/pro-sml/<?php echo $crnt_inst_data['pro_pic'] ?>">
	      </div></td>
	      <td style="font-size:18px"><?php echo $crnt_inst_data['insti_nm'] ?></td>
	    </tr>
	  </table>
	</div>
	
	<div class="col-md-7" style="height:1px"></div>
	<div class="col-md-5" style="padding:5px 5px 5px 40px;">
		<div style="padding:5px;position:relative;">
		<div style="position:absolute;height:1px;background:#ddd;width:10px;top:30px;left:-20px"></div>
		<div style="position:absolute;height:40px;background:#ddd;width:1px;top:-10px;left:-20px"></div>
			Class/Courses<br>
			<?php
			  $newarraycls = $myclass;
   $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array(); 
    ?>
      <?php foreach ($coursename as $key => $value) {
          ?>
          <small class="label bg-gray sts-lvl2"><?php echo $value['cours_nm'] ?></small><br>
      <?php } ?>
		</div>
	</div>
	
</div>




<script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

    <script>
         $('#datepicker').datetimepicker({ footer: true, modal: true, format: 'HH:MM yyyy-mm-dd'});
         $('#datepicker2').datetimepicker({ footer: true, modal: true, format: 'HH:MM yyyy-mm-dd' });
    </script>
<script type="text/javascript">
 $(document).ready(function() {
 	var testpaperid = $('#paperid').val(); 

  	$("#managperson").load('<?php echo base_url()."testexam/Paper_manage_person/"; ?>'+testpaperid);
          $('#back_dash').click(function() {
          
          $("#datacontent").load('<?php echo base_url()."testexam/test_manage/"; ?>'+testpaperid);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './institue_panel#test_manage');
         nextstate('test_manage');
     });
          
 });
 

 $(document).ready(function() {


$('#instresult').click(function(e) {
	var isresultre = $('#maual_res_re').val();
	 var x = document.getElementById('instresult');
	 var x1 = document.getElementById('makeresult_btn');
     if(x.checked == true){
		     if(x1.checked == false){
		     	if(isresultre == 0){
		     	 $('#makeresult_btn').click();
		     	 $('#maual_res_re').val('1');
		     	}
		     }
     }else{
     	    if(x1.checked == true){
		     	$('#makeresult_btn').click();
		     	$('#maual_res_re').val('0');
		     }
     }
	
 });	

   $('#savedata_paper').click(function(e) {
   		var datepicker = $('#datepicker').val();
   var datepicker2 = $('#datepicker2').val();

  
   if(!datepicker || !datepicker2){
   	 $('#alert-msg').html("Enter mandatory fields !");
   	 $('#alert-toast').show().delay(2000).slideUp();
   }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Setting_save',
        data: $("#setting_form").serialize(),
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

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
    }     
}); 


$('#makerelease').click(function(e) {
	var paperid = $('#paperid').val();
	$('#makerelease_btn').click();
	 var x = document.getElementById('makerelease_btn');
     if(x.checked == true){
     	 $('#makerelease_btn').prop('checked',true);
     	 	 var med = $(this);
			    e.preventDefault();
			    if ( med.data('requestRunning') ) {
			        return;
			    }
			    med.data('requestRunning', true);
			    $('#alert-wait').show();
			    var datastring = 'paperid='+paperid;
			    $.ajax({
			        type: "POST",
			        url: '<?php echo base_url();?>testexam/Make_release',
			        data: datastring,
			        success: function(msg) {
			                $('#alert-wait').delay().slideUp(); 
			                $('#alert-suc').delay(2000).show().slideUp(); 

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
     }else{

     }
}); 

$('#makeresult').click(function(e) {
	var paperid = $('#paperid').val();


	$('#makeresult_btn').click();
	 var x = document.getElementById('makeresult_btn');
     if(x.checked == true){
     	 $('#makeresult_btn').prop('checked',true);
     	  $('#maual_res_re').val('1');
     	 	 var med = $(this);
			    e.preventDefault();
			    if ( med.data('requestRunning') ) {
			        return;
			    }
			    med.data('requestRunning', true);
			    $('#alert-wait').show();
			    var datastring = 'paperid='+paperid;
			    $.ajax({
			        type: "POST",
			        url: '<?php echo base_url();?>testexam/Make_release_result',
			        data: datastring,
			        success: function(msg) {
			                $('#alert-wait').delay().slideUp(); 
			                $('#alert-suc').delay(2000).show().slideUp(); 

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
     }else{
     	 $('#maual_res_re').val('0');
     }

 
}); 

});


var typingTimer;                //timer identifier
var doneTypingInterval = 1000;  //time in ms, 5 second for example
var $input = $('#srchmanage');

$input.on('keyup', function () {
  clearTimeout(typingTimer);
  typingTimer = setTimeout(doneTypingnm, doneTypingInterval);
 $(".srch-loader").show();
 $("#srch-close").show();
});
//on keydown, clear the countdown 
$input.on('keydown', function () {
  clearTimeout(typingTimer);
 
});

//user is "finished typing," do something  srch-loader
function doneTypingnm () {
 var searchval = $("#srchmanage").val();
  $("#reslut_managperson").load('<?php echo base_url()."testexam/Paper_manage_search/"; ?>'+searchval);
  $("#reslut_managperson").show();
}
$('#srch-close').click(function() {
	 var testpaperid = $('#paperid').val(); 
 $(".srch-loader").hide();
 $("#srch-close").hide();
 $("#reslut_managperson").hide();
 $("#managperson").show();
 $("#srchmanage").val('');
 $("#managperson").load('<?php echo base_url()."testexam/Paper_manage_person/"; ?>'+testpaperid);
});
</script>