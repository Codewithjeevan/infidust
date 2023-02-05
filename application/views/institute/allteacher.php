<style type="text/css">
 .tdhover tr:hover td { background: #f3f3f3;}
 .tdhover tr:hover .mati-opt-blk { opacity: 1}
 .mlisticons img { position:relative; width:40px;top:15px}

  .user-sh-blk { width: 50px; height: 50px;  border-radius: 100%; overflow: hidden;text-align: center; color: #fff; }
 .def-usr-img { width: 30px; position: relative; top: 8px; opacity: 0.4}
  .user-sh-blk i{ font-size: 23px; color: #fff; margin-top: 20px; position: relative;}

</style>
<div class="row body-data" style="padding-top:20px;position:relative">
  <h3 style="font-family: 'Montserrat';">All Teachers</h3>
  <div style="position:absolute; right:0;">
  <!-- <button id="crt-vid-pop" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/plus-v.png" width="21"> &nbsp;<span style="color:#000; font-weight:bold;">CREATE VIDEO</span></button> -->
  </div>
</div>
<br>
<div class="row box-sdow">
  <div class="col-md-12 fix-pad">
   <button type="button" class="btn" style="margin:0;"><i class="fa fa-fw fa-filter"></i></button> <span class="gray sml1">Filter</span>
  </div>
  <div class="col-md-12 hir-lin"></div>
 <?php if (@$student) {   ?>
 <table class="table sml1 tdhover">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Teachers</th>
      <th scope="col" style="font-size:12px;">Courses/Class</th>
      <th scope="col" style="font-size:12px;">Info</th>
      <!-- <th scope="col" style="font-size:12px;">J.Date</th> -->
       <th scope="col" style="font-size:12px;" width="50">Status</th>
    <!--  <th scope="col" style="font-size:12px; text-align:right;" width="80">Likes</th> -->
      <th scope="col" style="font-size:12px; text-align:right;" width="40"></th>
    </tr>
  </thead>
  <tbody>

       <?php  
            foreach ($student as $member) { 
            ?>
    <tr>
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
       $clas_alot = $this->db->get_where("class_alotment", array("insid" =>$memid,"teacherid" =>$member['mymemid']))->row_array();
      // print_r($clas_alot['for_class']);
       ?>
     <?php if($clas_alot['for_class']) { ?>
      <?php
       
       $newarraycls = $clas_alot['for_class'];
    
          $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array(); 
        
        ?>

        <?php foreach ($coursename as $key => $value) {
          ?>
          <small class="label bg-gray sts-lvl2"><?php echo $value['cours_nm'] ?></small>
      <?php } ?>

       <?php } ?>
      </td>
      <td style="font-size:12px;"><?php echo $member['phone_no'];  ?></td>
      <!-- <td style="font-size:12px;"></td> -->
    <td style="font-size:12px;" align="right">
    <?php if(@$member['status'] == 0){ ?>
    <small class="label bg-red sts-lvl">Deactive</small>
    <?php } else { ?>
    <small class="label bg-pgrn sts-lvl">Active</small>
    <?php } ?>
    </td>
      <!--   <td style="font-size:12px;" align="right">10</td> -->
      <td style="font-size:12px;" align="right"></td>
    </tr>
   <?php } ?>
 
  </tbody>
</table>
  <?php }else { ?>
  <div class="col-md-12" align="center" style="padding:20px;">No teacher added yet!</div>
  <?php } ?>

</div>