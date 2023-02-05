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
        <div id="clselem_<?php echo $myclassnm['class_uid'];?>" class="col-md-12" style="padding:0px 0px 0px 50px;">
         <button type="button" class="btn btn-primary btn-block coursbtn" style="margin: 0;">
         <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/trash-2.svg" id="<?php echo $myclassnm['class_uid'];?>" class="remvmyclass"> <?php echo $myclassnm['clas_title']; ?>
         <i class="fa fa-fw fa-pencil modirysub" id="<?php echo $myclassnm['class_uid'];?>"></i>
         </button>
        
          </div>
        <?php } ?>
    </div>
     <?php } ?>

   <?php } else { ?>
     <div class="col-md-10" align="center"><br><br><br>No courses & subjects found! <br>Add your courses & subjects</div>
     <?php } ?>

     </div>