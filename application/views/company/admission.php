  <div class="row ">
      <div class="col-md-6" align="" style="color:;padding:0%; height:550px;overflow-x:hidden; overflow-y:scroll;">
      <div class="row" style="padding-bottom:15px">
        <div class="col-md-11" style="background:#e8e8e8; border-radius:4px;padding:17px;font-size:12px" data-toggle="modal" data-target="#shareinfidust">
          <i class="fa fa-fw fa-info-circle"></i> &nbsp;&nbsp;&nbsp;Share / Invite your students! <i class="fa fa-fw fa-share-alt" style="font-size:18px;top:2px;position:relative;"></i>
        </div>
      </div>
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
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $student['pro_pic'] ?>">
              </div>
            </td>
              <td>
              <h5><?php echo $student['teacher_nm'] ?></h5>
              <p style="font-size:12px"><?php echo $student['address'] ?>, <?php echo $student['city'] ?>, <?php echo $student['state'] ?></p>
              <p align="right"><button id="<?php echo $student['mymemid'] ?>" type="button" class="btn btn-sm btn-raised btn-success acept_join">Process</button> <button id="conp_<?php echo $student['mymemid'] ?>" type="button" class="btn btn-sm nonebtn" style="display:none">Admission in Subjects.. </button></p>
              </td>
            </tr>
          </table>
        </div>
         <?php } ?>
         <?php }else{ ?>
         <div align="center"><br><br>No student admission request found!</div>
          <div class="col-md-12" style="background:#fff; border:1px solid #ddd;padding:5%">
               <p>"Tell your students to create a free account in InfiDust and join in your institute/tuition by paying joining fee Rs 500 ( 1 year validity) then start live classes"</p><br>
               <p align="center">Share Link to Students<br>
               <span align="center" style="color:#2196f3">https://infidust.kamprik.com</span><br><br>
               <i class="fa fa-fw fa-share-alt" style="font-size:18px;top:2px;position:relative;" data-toggle="modal" data-target="#shareinfidust"></i></p>

             </div>
         <?php } ?>

      </div>
      </div>
      </div>


      <div class="col-md-6 box-sdow" style="padding-top:2%" align="">
        <input type="hidden" id="stu_tea_id">   
         <div class="col-md-12 body-data" style="padding-bottom:10px;"> <h3><i class="fa fa-fw fa-magic"></i> &nbsp;&nbsp;Admission in course </h3></div>

    <?php if ($mycourse) { 
      ?>
      <div class="col-md-12" style="height:440px; overflow-x:hidden; overflow-y:scroll;position:relative;"><div id="whovrly" style="position:absolute; background:rgba(255,255,255,0.5); width:100%; height:480px;left:0; z-index:99;"></div>
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
      
      $('#stu_tea_id').val(stu_teaid);
      $('.nonebtn').hide();
      $('.acept_join').show();
      $('#whovrly').hide();
      $('#makeadmision').show();
      $(this).hide();
      $('#conp_'+stu_teaid).show();
      $(".allchekb"). prop("checked", false);
      subjarr = new Array();
      
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
       </script>