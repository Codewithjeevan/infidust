
 <table class="table sml1 tdhover">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Students <input type="hidden" id="thiscrsid" value="<?php echo $coursid ?>"></th>
      <th scope="col" style="font-size:12px;">Status</th>
      <th scope="col" style="font-size:12px;">Marks</th>
      <!-- <th scope="col" style="font-size:12px;">J.Date</th> -->
       <th scope="col" style="font-size:12px;" width="50">Report</th>
    <!--  <th scope="col" style="font-size:12px; text-align:right;" width="80">Likes</th> -->
      <th scope="col" style="font-size:12px; text-align:right;" width="40"></th>
    </tr>
  </thead>
  <tbody>
    <?php if(@$student) {  ?>
  <!-- <?php echo $this->session->userdata("mem_sub_typ") ?> -->
       <?php 
            foreach ($student as $member) { 
            ?>
    <tr id="revblk_<?php echo $member['mem_id']?>">
      <td style="padding-left:30px" width="500">
        <div class="">
         
          <table class="cus-table">
            <tr>
              <td>
                <div class="user-sh-blk bg-gray" align="center">
                <?php if($member['pro_pic']){ ?>
                <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $member['pro_pic'] ?>" height="100%">
                <?php } else { ?>
                <img src="<?php echo base_url() ?>assets-public/dist/img/icon/usert.svg" class="def-usr-img">
                <?php } ?>
                </div>
              </td>
              <td>
                  <div class="file-data-blk">
                   <h2><?php echo $member['teacher_nm'] ?></h2>
                   <p style="margin:0;">
                   <?php if($member['pro_pic']){ ?>
                   <?php echo $member['address'] ?>, <?php echo $member['city'] ?>
                   <?php } else { ?>
                   Profile not set yet!
                   <?php } ?>
                   </p>
                  </div>
              </td>
            </tr>
          </table>
        </div>
      </td>
      <td style="font-size:12px;">
      <?php
        $my_paper_submit= $this->db->get_where("test_paper_submit", array('papr_id' => $paperid,'memid' => $member['mem_id']))->row_array();
       
       ?>
      <?php if($my_paper_submit){ ?>
            <?php if($my_paper_submit['is_complete'] == 0){ ?>
               <?php if($tim_is_over == 1){ ?>
              <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">Cancled</small>
              <?php }else{ ?>
              <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">On test</small>
              <?php } ?>
            <?php }else{ ?>
            <i class="fa fa-fw fa-lock" style="color:#1a73e8"></i> <small class="label bg-pblue sts-lvl2" style="color:#fff;">Complete</small>
            <?php } ?>
     <?php }else{ ?>
                   <?php if($tim_is_over == 1){ ?>
                      <i class="fa fa-fw fa-lock" style="color:#e22626"></i> <small class="label bg-lred sts-lvl2" style="color:#fff;">Missed</small>
                       <?php }else{ ?>
                       <i class="fa fa-fw fa-unlock-alt" style="color:#34a853"></i> <small class="label bg-pgrn sts-lvl2" style="color:#fff;">Open</small>
                       <?php } ?>
     <?php } ?>


      </td>
      <td style="font-size:12px;">
      <?php  if($my_paper_submit){ ?>
      <?php if($my_paper_submit['is_complete'] == 1){ ?>
        <?php echo $my_paper_submit['get_tot'] ?>/<?php echo $my_paper_submit['for_tot'] ?>
      <?php  } ?>
      <?php  } ?>
      </td>
      <!-- <td style="font-size:12px;"></td> -->
    <td style="font-size:12px;" align="right">
    <?php  if($my_paper_submit){ ?>
     <?php if($my_paper_submit['is_complete'] == 1){ ?>
     <button id="<?php echo $paperid ?>_<?php echo $member['mymemid'] ?>" class="btn  activechk sts-lvl2 openthisreport">View Report</button>
     <?php  } ?>
     <?php  } ?>
    </td>
      <!--   <td style="font-size:12px;" align="right">10</td> -->
      <td style="font-size:15px;" align="right">
      </td>
    </tr>
   <?php } ?>
   <?php } ?>
  </tbody>
</table>


 <!-- Modal -->
<div class="cus-modal-window " id="paper-view" style="display:none">
  <div class="cus-modl-view-full" style="" align="center">
    <div class="cus-modal-content">
      <div class="cus-modal-body" id="demoQpreview">
  
      </div>
      </div>
       
  </div>
</div> 


 <script type="text/javascript">
 $(document).ready(function() {
  $('.openthisreport').click(function() {
    $('#paper-view').fadeIn('fast');
    var idvalues = this.id;
    var splitval = idvalues.split("_");
    var paperid = splitval[0];
    var studentid = splitval[1];  //thiscrsid
    var catchid = new Date().getTime();
     $("#demoQpreview").html('');
    $("#demoQpreview").load('<?php echo base_url()."testexam/studentresult/"; ?>'+paperid+'/'+studentid+'/?c='+catchid);
    });
 });

 </script>