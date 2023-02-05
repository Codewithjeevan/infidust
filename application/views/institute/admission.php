<div class="row inr-pgfix-hdr" style="">
  <div class="hdr-inr-cnt">
    <htwo>Student admission</htwo>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
     <button type="button" class="btn btn-info cus-hdrbtn-ab bigvisible2" data-toggle="modal" data-target="#newtmdl" style="color:#1a73e8;top:3px;"><i class="fa fa-fw fa-plus"></i> ADD NEW STUDENT</button>
     <button type="button" class="btn btn-info cus-hdrbtn-ab smallvisible2" data-toggle="modal" data-target="#newtmdl" style="color:#1a73e8;top:3px;right:8px"><i class="fa fa-fw fa-plus"></i> ADD STUDENT</button>
    
  </div>
  
</div>
  <div class="row " style="padding-top:40px">
      <div class="col-md-6" align="" style="color:;padding:0%; height:540px;overflow-x:hidden; overflow-y:scroll;">
    
      <div class="row">
         <div class="col-md-11" style="padding:0;">
      <?php 
           if($student) { 
            ?>
            <?php 
            foreach ($student as $student) { 
            ?>
        <div class="col-md-12 box-sdow box-margin" style="padding:10px 10px 0px 10px;">
          <table width="100%">
            <tr>
              <td width="100" valign="top">
              <div class="mid-dis-img2">
              <?php if($student['pro_pic']){ ?>
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $student['pro_pic'] ?>">
              <?php } ?>
              </div>
            </td>
              <td>
              <h5><?php echo $student['teacher_nm'] ?></h5>
              <?php if($student['address']){ ?>
              <p style="font-size:12px"><?php echo $student['address'] ?>, <?php echo $student['city'] ?>, <?php echo $student['state'] ?></p>
               <?php } else { ?>
               <p>Profile is not set</p>
                <?php } ?>
              <p align="right"><button id="<?php echo $student['mymemid'] ?>" type="button" class="btn btn-sm btn-raised btn-success acept_join thisprocs_<?php echo $student['mymemid'] ?>">Process</button> <button id="conp_<?php echo $student['mymemid'] ?>" type="button" class="btn btn-sm nonebtn" style="display:none">Admission in Subjects.. </button></p>
              </td>
            </tr>
          </table>
        </div>
         <?php } ?>
         <?php }else{ ?>
         <div align="center"><br><br>No student admission request found!</div>
          <div class="col-md-12" style="background:#fff; border:1px solid #ddd;padding:5%">
               <p>"Add your students or Tell your students to create a free account in InfiDust and join in your institute/tuition."</p><br>
               <p align="center">Share Link to Students<br>
               <span align="center" style="color:#2196f3">https://infidust.kamprik.com</span><br><br>
               <i class="fa fa-fw fa-share-alt" style="font-size:18px;top:2px;position:relative;" data-toggle="modal" data-target="#shareinfidust"></i></p>

             </div>
         <?php } ?>

      </div>
      </div>
      </div>


      <div class="col-md-6 box-sdow" style="padding-top:2%;height:490px" align="">
        <input type="hidden" id="stu_tea_id">   
         <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Admission in course </h3></div>

    <?php if ($mycourse) { 
      ?>
      <div class="col-md-12" style="height:380px; overflow-x:hidden; background:; overflow-y:scroll;position:relative;">
      <div id="whovrly" style="position:absolute; background:rgba(255,255,255,0.5); width:100%; height:480px;left:0; z-index:99;"></div>
         <div class="respopad40">
      <?php foreach ($mycourse as $mycourse) { 
      ?>
     
    <div class="col-md-12" style="padding:10px 0px 20px 0px;">
      <?php echo $mycourse['cours_nm']; ?>
      <?php 
       $mcousid = $mycourse['mycours_id'];
        $mysubject = $this->db->get_where("ins_subject", array("mycous_id" =>$mcousid, "for_memid" => $memid))->result_array();
      ?>
      <?php foreach ($mysubject as $mysubject) { 
        ?>
        <div class="col-md-12" style="padding:5px 0px 5px 50px;">
       <label class="cus-chkb"> <smltxt><?php echo $mysubject['subject_nm']; ?></smltxt>
        <input id="subjid_<?php echo $mysubject['subj_id']; ?>" type="checkbox" value="<?php echo $mysubject['subj_id']; ?>_<?php echo $mysubject['mycous_id']; ?>" onclick="chksubval(<?php echo $mysubject['subj_id']; ?>);" class="allchekb">
        <span class="checkmark"></span>
      </label>
        
          </div>
        <?php } ?>
    </div>
     <?php } ?>
     </div>
     </div>

<?php } else{ ?>

<div class="col-md-12" align="center">
<br><br>
  No courses added yet!<br>First add your courses and subject in settings. 
</div>
<?php } ?>
       <div class="col-md-12">
         <button id="makeadmision" type="button" class="btn btn-sm btn-raised btn-primary " style="display:none">Save allotment in subject</button>
       </div>
     

      </div> 
    </div>


<!-- Modal -->
<div class="modal fade" id="newtmdl" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add new student & credentials</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div id="teachfrom" class="modal-body">
              <div class="row">
               <div class="col-md-6 " style="padding:0;">
               <div class="form-group ">
                <label for="exampleInputEmail1" class="bmd-label-floating">First name</label>
                <input type="text" class="form-control " id="cusfname">
              </div>
               </div>
               <div class="col-md-6 " style="padding:0;">
               <div class="form-group ">
                <label for="exampleInputEmail1" class="bmd-label-floating">Last name</label>
                <input type="text" class="form-control " id="cuslname">
              </div></div>
            </div>

              <div class="form-group">
                <label for="exampleInputPassword1" class="bmd-label-floating">Email </label>
                <input type="email" class="form-control" id="cusemail">
              </div>

                     <div class="row">
               <div class="col-md-6" style="padding:0;">
               <div class="form-group ">
                <label for="" class="bmd-label-floating">Contact No.</label>
                <input type="contact" class="form-control " id="contact" maxlength="10">
                <span class="bmd-help"></span>
              </div>
               </div>
               <div class="col-md-6" style="padding:0;">
               <div class="form-group">
                <label for="exampleInputEmail1" class="bmd-label-floating">Password</label>
                <input type="Password" class="form-control " id="cuspassword" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false;">
              </div>
              </div>
            </div>
            <div id="already-exist" class="pull-left" style="color:red;font-size:13px;display:none">Contact No. already exist!</div>
      </div>
      <div id="suc-mailmsg" class="modal-body" style="display:none" align="center"><br>
      <i class="fa fa-fw fa-check" style="color:green"></i><br><br>
      Login credentials sent in mail of added student.
      </div>
      <div class="modal-footer"> 
        <button type="button" id="reloadteaj" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="letadnewtea" type="button" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</div>


  <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script> 
    <script type="text/javascript">
    var subjarr = new Array();
    function chksubval(subid){
        var checkBox = document.getElementById("subjid_"+subid);
        
        var thisval = $('#subjid_'+subid).val();
       // checkBox.checked = true; 
       if(checkBox.checked == true){
        
        subjarr.push(thisval);
       // $('#subjearry').val(subjarr);
        console.log(subjarr);
        }else{
           var indexv = subjarr.indexOf(thisval);
            if (indexv > -1) {
              subjarr.splice(indexv, 1);
            }
            console.log(subjarr);
        }
    }


    


    $('.acept_join').click(function(){ 
      stu_teaid = this.id;
      $('#alert-wait').show(); 
       var dataString = 'data=ok';
               
        jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Chechlimit',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                   $('#alert-wait').delay().slideUp(); 

                    $('#stu_tea_id').val(stu_teaid);
                    $('.nonebtn').hide();
                    $('.acept_join').show();
                    $('.thisprocs_'+stu_teaid).hide();
                    $('#whovrly').hide();
                    $('#makeadmision').show();
                    
                    $('#conp_'+stu_teaid).show();
                    $(".allchekb"). prop("checked", false);
                    subjarr = new Array();
                  
                }else if(response.status == 203){
                   $('#alert-wait').delay().slideUp();
                   $('#alert-toast').show().delay(2000).slideUp();
                   $('#alert-msg').html('Upgrade your plan!');
                }
              },
              error: function (response) {
            
                  $('#alert-wait').delay().slideUp(); 
                  $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 

      
      
    });


$('#makeadmision').click(function(){ 
     var formemid = $('#stu_tea_id').val();
        var formyself = 0;
 if(subjarr.length <= 0){

      }else{
           $('#alert-wait').show();
                  var dataString = 'formemid='+ formemid+'&subjarr='+subjarr+'&formyself='+formyself+'&foruser=student';
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Acept_joining_admi',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                $("#datacontent").load('<?php echo base_url()."dashboard/admission"; ?>');

                   $('#alert-wait').delay().slideUp(); 
                  $('#alert-suc').show().delay(2000).slideUp(); 
                 
                  
                }else if(response.status == 203){
                 
                   $('#alert-wait').delay().slideUp();
                    $('#alert-err').show().delay(2000).slideUp(); 
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp();
                  }

            }); 
     }
    
});



$('#letadnewtea').click(function(){     
  var cusfname =$('#cusfname').val();
  var cuslname =$('#cuslname').val();
var cusemail =$('#cusemail').val();
var cuspassword =$('#cuspassword').val();
var putacfor ='student';

var contact =$('#contact').val();

if(!cusfname || !cuslname || !cusemail || !cuspassword || !contact || !putacfor){

          //$('#fielderror').show();
        }else{

        $('#already-exist').hide();
           $('#alert-wait').show();
                  var dataString = 'cusfname='+ cusfname+'&cuslname='+cuslname+'&cusemail='+cusemail+'&cuspassword='+cuspassword+'&putacfor='+putacfor+'&contact='+contact;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Newstudent',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                 $('#alert-wait').delay().slideUp(); 
                 $('#alert-suc').show().delay(2000).slideUp(); 
                 $('#teachfrom').hide();
                 $('#suc-mailmsg').show();
                 $('#letadnewtea').hide();

                }else if(response.status == 203){
                  $('#alert-wait').delay().slideUp(); 
                 $('#alert-err').show().delay(2000).slideUp();
                }else if(response.status == 204){
                   $('#alert-wait').delay().slideUp(); 
                   $('#already-exist').show();
                }
              },
              error: function (response) {
            
                 $('#alert-wait').delay().slideUp(); 
                 $('#alert-err').show().delay(2000).slideUp();
                  }

            });

        
       }

});
  $('#reloadteaj').click(function(){ 
  var cusfname =$('#cusfname').val();
  var cuslname =$('#cuslname').val();


if(!cusfname || !cuslname){

        }else{

      setTimeout(function(){  
        $("#datacontent").html('');
        $("#datacontent").load('<?php echo base_url()."dashboard/admission"; ?>');
      }, 1500);
 }
});
       </script>