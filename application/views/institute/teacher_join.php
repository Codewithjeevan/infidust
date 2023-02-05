

    <div class="row">
      <div class="col-md-6" style="padding:0px 5px 0px 5px; height:550px;overflow-x:hidden; overflow-y:scroll;">
      <div class="row" style="padding-bottom:15px">
        <div class="col-md-12" style="background:; border-radius:4px;padding:17px;font-size:12px" >
         
       <?php if($profdata['mem_sub_typ'] == 'institute'){
         ?>
          <button type="button" class="btn btn-sm btn-raised btn-info" data-toggle="modal" data-target="#newtmdl" style="position:absolute;top:10px; right:10px">Add Teachers</button>
        <?php }else if($profdata['mem_sub_typ'] == 'academy') { ?>
        <button type="button" class="btn btn-sm btn-raised btn-info" data-toggle="modal" data-target="#newtmdl" style="position:absolute;top:10px; right:10px">Add Teachers</button>
        <?php }else if($profdata['mem_sub_typ'] == 'tution') { ?>
        <button type="button" class="btn btn-sm btn-raised btn-info" data-toggle="modal" data-target="#newtmdl" style="position:absolute;top:10px; right:10px">Add Teachers</button>
        <?php }?>
             

        </div>
      </div>
     <input type="hidden" id="formyself" value="0">
     <?php if($profdata['service'] == 0){ ?>
     <div class="col-md-12 box-sdow box-margin" style="padding:20px 10px 0px 10px; border:1px solid #000">
          <table width="100%">
            <tr>
              <td width="100" valign="top">
              <div class="mid-dis-img2">
              <?php if($profdata['pro_pic']){ ?>
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $profdata['pro_pic'] ?>">
              <?php } ?>
              </div>
            </td>
              <td>
              <h5><?php echo $profdata['teacher_nm'] ?></h5>
              <?php if($profdata['address'] && $profdata['city'] && $profdata['state']) { ?>
               <p><?php echo $profdata['address'] ?>, <?php echo $profdata['city'] ?>, <?php echo $profdata['state'] ?></p>
              <?php } else{ ?>
              <p>Your profile is not set Yet!</p>
              <?php } ?>
              <p align="right"><button id="<?php echo $profdata['mem_id'] ?>" type="button" class="btn btn-sm btn-raised btn-success acept_join_me">Process Myself as teacher</button><button id="conp_<?php echo $profdata['mem_id'] ?>" type="button" class="btn nonebtn" style="display:none">Myself with Subjects for.. </button></p>
              </td>
            </tr>
          </table>
        </div>
       <?php } ?>
      <?php if($teacher){ ?>
      <?php 
            foreach ($teacher as $teacher) { 
            ?>
        <div class="col-md-12 box-sdow box-margin" style="padding:20px 10px 0px 10px;">
          <table width="100%">
            <tr>
              <td width="100" valign="top">
              <div class="mid-dis-img2">
               <?php if($teacher['pro_pic']){ ?>
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $teacher['pro_pic'] ?>">
              <?php } ?>
              </div>
            </td>
              <td>
              <h5><?php echo $teacher['teacher_nm'] ?></h5>
               <?php if($teacher['address'] && $teacher['city'] && $teacher['state']) { ?>
                 <p><?php echo $teacher['address'] ?>, <?php echo $teacher['city'] ?>, <?php echo $teacher['state'] ?></p>
               <?php } else{ ?>
                <p>Profile is not set Yet!</p>
               <?php } ?>
              <p align="right"><button id="<?php echo $teacher['mymemid'] ?>" type="button" class="btn btn-raised btn-success acept_join">Accept</button><button id="conp_<?php echo $teacher['mymemid'] ?>" type="button" class="btn nonebtn" style="display:none">Accept with Subjects for.. </button></p>
              </td>
            </tr>
          </table>
        </div>
         <?php } ?>
         <?php }else{ ?>
           <div class="col-md-12" style="padding-top:100px;" align="center">
           No new Teacher found!<br>

             </div>
         <?php } ?>
      </div>


       <div class="col-md-6 box-sdow" style="padding-top:2%" align="">
        <input type="hidden" id="stu_tea_id">   
         <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Teacher allotted in course/subject </h3></div>
      <div class="col-md-12" style="height:440px; overflow-x:hidden; overflow-y:scroll;position:relative;"><div id="whovrly" style="position:absolute; background:rgba(255,255,255,0.5); width:100%; height:480px;left:0; z-index:99;"></div>
         <div class="respopad40">

 <?php if ($mycourse) { 
      ?>
      <?php foreach ($mycourse as $mycourse) { 
      ?>
    <div class="col-md-12" style="padding:10px 0px 20px 0px;;">
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

     <?php } else { ?>
      <div align="center" style="padding-top:70px"> No courses added yet!
First add your courses and subject in settings.</div>
     <?php } ?>

     </div>
     </div>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Add new teacher credentials</h5>
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
      Login credentials sent in mail of added teacher.
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

    $('.acept_join_me').click(function(){ 
      stu_teaid = this.id;
      
      $('#stu_tea_id').val(stu_teaid);
      $('.nonebtn').hide();
      $('.acept_join').show();
      $('#whovrly').hide();
      $('#makeadmision').show();
      $(this).hide();
      $('#conp_'+stu_teaid).show();
      $(".allchekb"). prop("checked", false);
      $("#formyself").val('1');
      subjarr = new Array();

      
    });
    $('.acept_join').click(function(){ 
      stu_teaid = this.id;
      
      $('#stu_tea_id').val(stu_teaid);
      $('.nonebtn').hide();
      $('.acept_join').show();
      $('.acept_join_me').show();
      $('#whovrly').hide();
      $('#makeadmision').show();
      $(this).hide();
      $('#conp_'+stu_teaid).show();
      $(".allchekb"). prop("checked", false);
       $("#formyself").val('0');
      subjarr = new Array();
      
    });

$('#makeadmision').click(function(){ 
      var formemid = $('#stu_tea_id').val();
       var formyself = $("#formyself").val();
      if(subjarr.length <= 0){

      }else{
           $('#alert-wait').show();
                var dataString = 'formemid='+ formemid+'&subjarr='+subjarr+'&formyself='+formyself+'&foruser=teacher';
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Acept_joining_admi',
              data: dataString,
              dataType: 'json',
              cache: false,
              success: function(response)
              {
                if(response.status == 200){ 
                
                $("#datacontent").load('<?php echo base_url()."dashboard/teacher_join"; ?>');

                   $('#alert-wait').delay().slideUp(); 
                  $('#alert-suc').show().delay(2000).slideUp(); 
                 
                  
                }else if(response.status == 203){
                 
                   $('#alert-wait').delay().slideUp();
                    $('#alert-err').show().delay(2000).slideUp(); 
                 
                }
              },
              error: function (response) {
            
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').show().delay(2000).slideUp();
                  }

            }); 

   }
    
});


$('#letadnewtea').click(function(){     
  var cusfname =$('#cusfname').val();
  var cuslname =$('#cuslname').val();
var cusemail =$('#cusemail').val();
var cuspassword =$('#cuspassword').val();
var putacfor ='teacher';

var contact =$('#contact').val();

if(!cusfname || !cuslname || !cusemail || !cuspassword || !contact || !putacfor){

          //$('#fielderror').show();
        }else{

        $('#already-exist').hide();
           $('#alert-wait').show();
                  var dataString = 'cusfname='+ cusfname+'&cuslname='+cuslname+'&cusemail='+cusemail+'&cuspassword='+cuspassword+'&putacfor='+putacfor+'&contact='+contact;
               
            jQuery.ajax({
              type: "POST",
              url: base_url +'dashboard/Newteacher',
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
        $("#datacontent").load('<?php echo base_url()."dashboard/teacher_join"; ?>');
      }, 1500);
 }
});

 var specialKeys = new Array();
     specialKeys.push(8);  //Backspace
     specialKeys.push(9);  //Tab
     specialKeys.push(46); //Delete
     specialKeys.push(36); //Home
     specialKeys.push(35); //End
     specialKeys.push(37); //Left
     specialKeys.push(39); //Right
     
     function IsAlphaNumeric(e) {
         var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
         var ret = ((keyCode >= 48 && keyCode <= 57) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
        // document.getElementById("error").style.display = ret ? "none" : "inline";
         return ret;
     }
    </script>