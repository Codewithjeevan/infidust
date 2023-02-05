<?php 
           
            foreach ($allmysntlist as $allmysntlist) { 
            ?>
  <div class="col-md-6">
    <div class="box-sdow body-data box-data ">
      <div class="col-md-12" align="center">
        <div class="mid-dis-img">
              <img src="<?php echo base_url().'assets-public/' ?>dist/img/photo4.jpg">
            </div>
      </div>
      <div class="col-md-12" align="center">
        <div class="insti-thum">
            <h5><?php echo $allmysntlist['insti_nm'] ?></h5>
            <p><i class="fa fa-fw fa-map-marker"></i><br><?php echo $allmysntlist['address'] ?>, <?php echo $allmysntlist['city'] ?>, <?php echo $allmysntlist['state'] ?>, </p>
            <p align="center"><button type="button" id="<?php echo $allmysntlist['mem_id'] ?>" class="btn btn-outline-dark requstjoin">Join Now</button></p>
         </div>
      </div>

    </div>
  </div>

 <?php } ?>
