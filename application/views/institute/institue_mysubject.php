<div class="respopad40">
  <?php if ($mycourse) {
  ?>
    <?php foreach ($mycourse as $mycourse) {
    ?>

      <div class="col-md-12" style="padding:10px 0px 20px 0px;;">
        <?php echo $mycourse['cours_nm']; ?>
        <?php
        $mcousid = $mycourse['mycours_id'];
        $mysubject = $this->db->query("SELECT `ins_subject`.*,
                                            `allsubject`.*

                                          FROM `ins_subject`
                                          LEFT JOIN `allsubject` ON `ins_subject`.`ins_allsubid` = `allsubject`.`sub_id`
                                          WHERE
                                         `ins_subject`.`mycous_id` = $mcousid
                                          AND
                                          `ins_subject`.`for_memid` = $memid
                                    ")->result_array();
        // $mysubject = $this->db->get_where("ins_subject", array("mycous_id" => $mcousid, "for_memid" => $memid))->result_array();
        ?>
        <?php foreach ($mysubject as $mysubject) {
        ?>
          <div class="col-md-12" style="padding:0px 0px 0px 50px;">
            <button type="button" class="btn  btn-primary btn-block coursbtn" style="margin: 0;">
            
            <img src="<?php echo base_url() . 'assets-public/' ?>dist/img/icon/trash-2.svg" id="<?php echo $mysubject['subj_id']; ?>" class="remvmysub"> <?php if (!empty($mysubject['subject_nm'])) {
              echo $mysubject['subject_nm'];
            } else if ($mysubject['sub_name']) {
              echo $mysubject['sub_name'];
            }  ?>
            
            
              <!-- <i class="fa fa-fw fa-pencil modirysub" id="<?php echo $mysubject['subj_id']; ?>*<?php echo $mysubject['mycous_id']; ?>*<?php echo $mysubject['subject_nm']; ?>"></i> -->
            
            
            </button>
          </div>
        <?php } ?>
      </div>
    <?php } ?>

  <?php } else { ?>

    <div class="col-md-11" align="center"><br><br><br>No courses found!<br>Add your courses!</div>
  <?php } ?>
</div>