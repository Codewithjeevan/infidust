 <?php if($allcourse) { 
      ?>
 <div class="respopad40">
      <?php foreach ($allcourse as $allcourse) { 
      ?>
        <button id="<?php echo $allcourse['cours_id'];?>" type="button" class="btn btn-primary btn-block coursbtn " onclick="catitemid('<?php echo $allcourse['cours_id'];?>')" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus.svg"> <?php echo $allcourse['cours_nm']; ?></button>
        <div class="addthiscatitems_<?php echo $allcourse['cours_id'];?> yesnodilog" style="" align="center">
               <div class="yesnodiloginner" align="center">
                 Are you sure to add<br><b>'<?php echo $allcourse['cours_nm'];?>'</b>
                 <button id="<?php echo $allcourse['cours_id'];?>_<?php echo $allcourse['cr_maincatid'];?>" class="catthisaddid" onclick="catthisaddid('<?php echo $allcourse['cours_id'];?>_<?php echo $allcourse['cr_maincatid'];?>')" style="">Add</button>
                 <button id="<?php echo $allcourse['cours_id'];?>" class="canclethiscat" style="">Cancle</button>
               </div>
             </div> 
     <?php } ?>
      </div>

      <?php } ?>