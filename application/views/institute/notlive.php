  <div class="row box-sdow">
      <div class="col-md-6 hder-data" align="" style="color:;padding:7% 3% 5% 5%">

       <h3>You are not live yet!</h3>
       <?php if($profdata['pro_pic'] && $profdata['address'] && $profdata['city'] && $profdata['state']){ ?>
          <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Profile</h2>
       <?php }else{ ?>
          <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Profile</h2>
       <?php } ?>
       
       
    <?php if($mycourse){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Courses</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Courses</h2>
       <?php } ?>
       
    <?php if($ins_subject){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Subject</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Subject</h2>
       <?php } ?>

    <?php if($class_slot){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Class Room</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Class Room</h2>
       <?php } ?>

    <?php if($my_institute){ ?>
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Join Teachers</h2>
       <?php }else{ ?>
       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> Join Teachers</h2>
       <?php } ?>

      
<!-- 
       <h2><i class="fa fa-fw fa-check-circle" style="color:green"></i> Class Allotment</h2>
       <h2><i class="fa fa-fw fa-check-circle-o"></i> Class Allotment</h2> -->

       <h2><i class="fa fa-fw fa-check-circle-o" style="color:#ccc"></i> In Review</h2>
<br>
      <button id="" type="" class="btn btn-primary btn-raised btn-lg open_ins_pro">Let's complete</button>
      </div>
      <div class="col-md-6" style="padding-top:4%" align="center">
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/notprofi.png" width="70%">
      </div> 
    </div>