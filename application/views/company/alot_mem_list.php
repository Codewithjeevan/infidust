<div class="col-md-12" style="padding:0;">
      <?php 
           if($members) { 
            ?>
            <?php 
            foreach ($members as $members) { 
            ?>
        <div class="col-md-12 box-sdow box-margin" style="padding:10px 10px 0px 10px;">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center" valign="top">
                 <div class="checkbox">
                    <label>
                      <input type="checkbox" id="mem_<?php echo $members['mem_id'] ?>" onclick="chkmemval(<?php echo $members['mem_id'] ?>)">
                    </label>
                  </div>
              </td>
              <td width="90" valign="top">
              <div class="mid-dis-img2" style="width: 70px; height: 70px;">
              <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $members['pro_pic'] ?>">
              </div>
            </td>
              <td>
              <h5 style="font-size:17px"><?php echo $members['teacher_nm'] ?></h5>
              <p style="font-size:12px"><?php echo $members['address'] ?>, <?php echo $members['city'] ?>, <?php echo $members['state'] ?></p>
              </td>
            </tr>
          </table>
        </div>
         <?php } ?>
         <?php }else{ ?>

         <?php if($membr == 'student'){ ?>
         <div align="center"><br><br>No student added yet!<br><br></div>

         <div class="col-md-12" style="background:#fff; border:1px solid #ddd;padding:5%">
               <p>"Tell your students to create a free account in InfiDust and join in your institute/tuition by paying joining fee Rs 500 ( 1 year validity) then start live classes"</p><br>
               <p align="center">Share Link to Students<br>
               <span align="center" style="color:#2196f3">https://infidust.kamprik.com</span><br><br>
               <i class="fa fa-fw fa-share-alt" style="font-size:18px;top:2px;position:relative;" data-toggle="modal" data-target="#shareinfidust"></i></p>

             </div>


         <?php } else{ ?>
          <div align="center"><br><br>No teachers added yet!<br> First add teacher</div>

         <?php } ?>


         <?php } ?>

      </div>

       <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>