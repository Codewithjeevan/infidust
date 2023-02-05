
<div class="row">
	

	<div class="col-md-6" align="" style="color:;padding:0% 0% 0% 0%; ">
      <div class="box-sdow" align="" style="color:;padding:5% 0% 5% 1%;">
      <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Class Allotment </h3></div>
      <div id="" class="col-md-12  " align="" style="height:440px; overflow-x:hidden;overflow-y:scroll;">
    	<input type="hidden" id="formem" value="student">
     <div class="respopad40">
      <?php if ($mycourse) { 
      ?>
     
      <?php foreach ($mycourse as $mycourse) { 
      ?>
     
    <div class="col-md-12" style="padding:10px 0px 20px 0px;;">
      <?php echo $mycourse['cours_nm']; ?>
      <?php 
       $mcousid = $mycourse['mycours_id'];
      
           $myclassnm = $this->db->query("SELECT `class_slot`.*,
                                            `ins_subject`.*

                                          FROM `class_slot`
                                          INNER JOIN `ins_subject` ON `class_slot`.`sub_ids` = `ins_subject`.`subj_id`
                                         WHERE
                                         `class_slot`.`ist_id` = $memid
                                         AND
                                         `class_slot`.`cours_id` = $mcousid
                                         GROUP BY 
                                         `class_slot`.`class_uid`
                                         
                                    ")->result_array();
      ?>
      <?php foreach ($myclassnm as $myclassnm) { 
        ?>
        <div class="col-md-12" style="padding-left:20px; padding-top:7px;">
        <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="id_<?php echo $myclassnm['class_uid']; ?>" value="<?php echo $myclassnm['class_uid']; ?>" onclick="chksubval(<?php echo $myclassnm['class_uid']; ?>);" class="allchekb">
          <span style="color:#000;position:relative;top:-2px"> &nbsp;&nbsp;<?php echo $myclassnm['clas_title']; ?></span>
        </label>
      </div>
      </div>

        <?php } ?>
    </div>
     <?php } ?>

     <?php } else{ ?>
     <div class="col-md-10" align="center"><br><br><br>
       No class batches added yet!<br><br>
First create your course and subjects wise class batches in settings.
     </div>
     <?php } ?>

     </div>
      
      </div>
      <div class="col-md-12"><button id="update" type="button" class="btn btn-raised btn-info">Update</button></div>
      </div> 
      </div> 

      	<div class="col-md-6" align="" style="color:;padding:0% 3% 0% 5%; ">
			<div class="row">
				<div class="col-md-12" style="padding-bottom:10px;">
					<button id="stu_ac_btn" type="button" class="btn btn-raised btn-info">ALL STUDENTS</button> 
					<button id="stu_dac_btn" type="button" class="btn btn-raised active" style="display:none">ALL STUDENTS</button>
					<button id="tea_ac_btn" type="button" class="btn btn-raised btn-info" style="display:none">ALL TEACHERS</button> 
					<button id="tea_dac_btn" type="button" class="btn btn-raised active">ALL TEACHERS</button>
				</div>
				<div class="col-md-12" id="memberlist" style="height:500px; background:;">
					
				</div>

			</div>
      	</div>
</div>



 <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

     <script type="text/javascript">
     $(document).ready(function() {
             $("#memberlist").load('<?php echo base_url()."dashboard/alot_mem_list/student"; ?>');
             
        });

      var subjarr;
    function chksubval(subid){
       var thisval = $('#id_'+subid).val();
       
        subjarr=thisval;
        console.log(subjarr);
     
    } 

var membjarr = new Array();
    function chkmemval(subid){
        var checkBox = document.getElementById("mem_"+subid);
     
       if(checkBox.checked == true){
        
        membjarr.push(subid);
      
        console.log(membjarr);
        }else{
           var indexv = membjarr.indexOf(subid);
            if (indexv > -1) {
              membjarr.splice(indexv, 1);
            }
            console.log(membjarr);
        }
    }

  $(document).on('click', '#stu_dac_btn', function(){  
   $('#stu_dac_btn').hide();
   $('#stu_ac_btn').show();

   $('#tea_ac_btn').hide();
   $('#tea_dac_btn').show();
   $('#formem').val('student');
   membjarr = new Array();
    $("#memberlist").load('<?php echo base_url()."dashboard/alot_mem_list/student"; ?>');

  });
  $(document).on('click', '#tea_dac_btn', function(){  
   $('#stu_ac_btn').hide();
   $('#stu_dac_btn').show();
   $('#tea_dac_btn').hide();
   $('#tea_ac_btn').show();
   $('#formem').val('teacher');
   membjarr = new Array();
    $("#memberlist").load('<?php echo base_url()."dashboard/alot_mem_list/teacher"; ?>');
  });


  $(document).on('click', '#update', function(){  
savedata();
  });


function savedata(){ 
  console.log(subjarr);
  console.log(membjarr);
     var formem = $('#formem').val();
       

  if(!subjarr || membjarr.length <= 0){

  }else{
       
           $('#alert-wait').show();
                  var dataString = 'classid='+ subjarr+'&membjarr='+ membjarr+'&formem='+ formem;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Put_class_alotm',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                // $("#datacontent").load('<?php echo base_url()."dashboard/institue_classlot"; ?>');

                    $('#alert-wait').slideUp(); 
                   $('#alert-suc').show().delay(2000).slideUp(); 

                  
                }else if(response.status == 203){
                   $('#alert-wait').slideUp(); 
                  $('#alert-err').show().delay(2000).slideUp();
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').slideUp(); 
                  $('#alert-err').show().delay(2000).slideUp();
                  }

            }); 
    }
}
   

</script>