<div class="respopad40">
 <?php if ($mycourse) { 
      ?>
      <?php foreach ($mycourse as $mycourse) { 
      ?>
        <button type="button" class="btn btn-primary btn-block coursbtn" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/trash-2.svg" id="<?php echo $mycourse['mycours_id'];?>" class="remvmycorse"> <?php echo $mycourse['cours_nm']; ?></button>
     <?php } ?>

     <?php } else{ ?>
     <div class="col-md-11" align="center"><br><br><br>Let's add your courses</div>
     <?php } ?>


     </div>