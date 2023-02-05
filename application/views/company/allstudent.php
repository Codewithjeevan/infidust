  <div class="row ">
      <div class="col-md-12" align="" style="color:;padding:0%; ">
      <div class="row">
         <div class="col-md-12" style="padding:0;">


    <?php 
          foreach ($self as $self) {
                    
            ?>

       <div id="revblk_<?php echo $self['member_id']?>" class="col-md-12 box-sdow box-margin" style="padding:10px 10px 0px 10px; position:relative;">
       <div style="position:absolute; right:10px;">
         <span style="background:#d7ecfc;padding:0px 10px 0px 10px;"><?php echo @$self['mem_type'] ." - ". @$self['mem_sub_typ'] ?></span> <span style="background:#ddd;padding:0px 10px 0px 10px;"><?php echo @$self['memplan']?></span>
         <span style="border:1px solid #ccc;padding:0px 7px 0px 10px;">Otp V. 
         <?php if($self['is_otp_v'] == 1){ ?>
         <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i>
         <?php } else { ?>
          <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i>
         <?php } ?>
         </span>
       </div>
       <div style="position:absolute; right:10px; top:35px;"><i id="<?php echo $self['member_id']?>" class="fa fa-trash deletuser"></i></div>
          <table width="100%">
            <tr>
              <td width="70" valign="top">
              <div class="mid-dis-img2" style="width: 50px; height: 50px;">
              <?php if($self['pro_pic'] ){ ?>
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $self['pro_pic'] ?>">
              <?php } ?>
              </div>
            </td>
              <td>
              <h5 style="font-size:15px"><?php echo $self['teacher_nm'] ?></h5>
              <p style="font-size:12px;margin-bottom:5px;"><?php echo $self['contact'] ?> | pass - <?php echo $self['password'] ?> |  <?php echo $self['city'] ?>, <?php echo $self['state'] ?> - <?php echo $self['created_at'] ?> </p>
              <p style="margin-bottom:5px;">
              <?php
              $userid = $self['member_id'];
              $mycourse = $this->db->get_where("mycourse", array("for_memid" =>$userid))->row_array();
              $ins_subject = $this->db->get_where("ins_subject", array("for_memid" =>$userid))->row_array();
              $class_slot = $this->db->get_where("class_slot", array("ist_id" =>$userid))->row_array();
              $my_institute = $this->db->get_where("my_institute", array("instu_id" =>$userid, "is_active" =>1))->row_array();
             
               ?>
                                 <?php if($self['pro_pic'] && $self['address'] && $self['city'] && $self['state']){ ?>
                                    <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Profile
                                 <?php }else{ ?>
                                    <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Profile
                                 <?php } ?>
                                 | 
                                 <?php if($mycourse){ ?>
                                 <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Courses
                                 <?php }else{ ?>
                                 <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Courses
                                 <?php } ?>
                                  | 
                                 <?php if($ins_subject){ ?>
                                 <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Subject
                                 <?php }else{ ?>
                                 <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Subject
                                 <?php } ?>
                                  | 
                                  <?php if($class_slot){ ?>
                                  <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Class Batch 
                                 <?php }else{ ?>
                                  <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Class Batch 
                                 <?php } ?>
                                  | 
                                   <?php if($my_institute){ ?>
                                  <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> Join Teachers 
                                 <?php }else{ ?>
                                  <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> Join Teachers 
                                 <?php } ?>
                                  | 
                                   <?php if($self['is_live'] == 1){ ?>
                                  <i class="fa fa-fw fa-check-circle" style="color:green;font-size:16px;"></i> In Review 
                                 <?php }else{ ?>
                                  <i class="fa fa-fw fa-check-circle-o" style="color:#ccc;font-size:16px;"></i> In Review 
                                 <?php } ?>
              </p>
              </td>
            </tr>
          </table>
        </div>

 <?php } ?>




      

      </div>
      </div>
      </div>


     
    </div>
    <div class="yesnodilog" style="display:;" align="center" >
               <div class="yesnodiloginner" align="center">
                 Are you sure deletethis user<br>
                 <input type="text" id="delcode" placeholder="delete code">
                 <button id="yesdelete" class="catthisaddid"  style="">Delete</button>
                 <button id="nodelete" class="canclethiscat" style="">Cancle</button>
               </div>
             </div> 

    <script type="text/javascript">
    var delid = 0;
    var delcode = 332;
   $('.deletuser').click(function(){
    delid = this.id;
    $('.yesnodilog').show();
   });
   $('#nodelete').click(function(){
    $('.yesnodilog').hide();
   });


   $('#yesdelete').click(function(e) {
 var getdelcode = $('#delcode').val();
     if(getdelcode != delcode){
 
   }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
     var dataString = 'userid='+ delid;
    $.ajax({
        type: "POST",
        url: base_url +'company/Removeuser',
        data: dataString,
        success: function(response) {
            
                // $("#datacontent").load('<?php echo base_url()."dashboard/institue_classlot"; ?>');
                    $('#alert-wait').slideUp(); 
                   $('#alert-suc').show().delay(2000).slideUp(); 
                   $('#revblk_'+delid).remove(); 
                 $('.yesnodilog').hide();
                  $('#delcode').val('');
        },
         error: function(response){
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
   
       </script>