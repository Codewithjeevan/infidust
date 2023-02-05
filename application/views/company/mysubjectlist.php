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
        <div class="col-md-12" style="padding:5px 0px 0px 50px;">
      

          <div class="radio">
        <label>
          <input type="radio" name="optionsRadios" id="subjid_<?php echo $mysubject['subj_id']; ?>" value="<?php echo $mysubject['subj_id']; ?>_<?php echo $mysubject['mycous_id']; ?>" onclick="chksubval(<?php echo $mysubject['subj_id']; ?>);" class="allchekb">
          <span style="color:#000;position:relative;top:-2px"> &nbsp;&nbsp;<?php echo $mysubject['subject_nm']; ?></span>
        </label>
      </div>
        
          </div>
        <?php } ?>
    </div>
     <?php } ?>


      <?php } else { ?>
     <div class="col-md-10" align="center"><br><br>No subjects found! <br>Add your subjects</div>
     <?php } ?>

     </div>

      <script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>