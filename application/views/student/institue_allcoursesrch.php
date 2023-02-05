  <?php if($allsrchcourse) { 
      ?>
<div class="respopad40">
      <?php foreach ($allsrchcourse as $allsrchcourse) { 
      ?>
        <button id="<?php echo $allsrchcourse['cours_id'];?>" type="button" class="btn btn-primary btn-block coursbtn catitemid" style="margin: 0;"><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus.svg"> <?php echo $allsrchcourse['cours_nm']; ?></button>
        <div class="addthiscatitems_<?php echo $allsrchcourse['cours_id'];?> yesnodilog" style="" align="center">
               <div class="yesnodiloginner" align="center">
                 Are you sure to add<br><b>'<?php echo $allsrchcourse['cours_nm'];?>'</b>
                 <button id="<?php echo $allsrchcourse['cours_id'];?>_<?php echo $allsrchcourse['cr_maincatid'];?>" class="catthisaddid" style="">Add</button>
                 <button id="<?php echo $allsrchcourse['cours_id'];?>" class="canclethiscat" style="">Cancle</button>
               </div>
             </div> 
     <?php } ?>
      </div>
     <?php }else{ ?>
     <div class="col-md-12" align="center"><br><br><br>No match found!</div>
     <?php } ?>

      <script type="text/javascript">
       $(document).ready(function() {
            $('.srch-loader').hide();
        });
       </script>