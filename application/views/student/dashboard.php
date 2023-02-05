<!--   <div class="row box-sdow">
      <div class="col-md-6 hder-data" align="" style="color:;padding:7% 3% 5% 5%">

       <h1>Your profile is not sesdft yet!</h1>
       <h2>Please complete your profile to join or take admission at any institute..</h2><br>
      <button id="" type="" class="btn btn-primary btn-raised btn-lg open_ins_pro">Let's complete</button>
      </div>
      <div class="col-md-6" style="padding-top:4%" align="center">
                    <img src="<?php echo base_url().'assets-public/' ?>dist/img/notprofi.png" width="70%">
      </div> 
    </div> -->
<style type="text/css">
 
  .card-iner { padding-top: 20px; padding-left: 10px}
  .card-iner h2 { font-size: 18px}
  .card-iner i { font-size: 24px; position: relative; top: -2px; opacity: 0.7}
  .card-data-btn { padding:5px 0px 5px 5px; text-align: left; border-radius: 4px;position: relative;left:-5px; }
  .c-title { color: #000; font-size: 14px;}
  .c-sml { font-size: 12px}
  .aro-btn {margin:0; text-align:left;padding-top:13px;padding-bottom:13px; color: #000}
  .aro-btn img { opacity: 0.7}
</style>
    <div class="row">
      <div class="col-md-4" style="padding:0px;">
          <div class="row">
            <div class="col-md-12" style="padding:8px;">
              <div class="live-cls-title box-sdow"><i class="fa fa-fw fa-circle" style="font-size:10px;color:red;position:relative;top:-6px;left:6px;"></i><i class="fa fa-fw fa-tv"></i> Live Class </div>
            </div>
            <?php if ($this->session->userdata("crent_viewid")) {  ?>
             <?php if ($clastime) {  ?>
             <?php 
            foreach ($clastime as $clastime) { 
            ?>
            <div class="col-md-12" style="padding:8px;">
              <div class="liv-thumb box-sdow">
                <h3><?php echo $clastime['clas_title'] ?></h3>
                <input class="first_crntcls" type="hidden" value="<?php echo $clastime['class_uid'] ?>_<?php echo $clastime['day_nm'] ?>_sts">
                <p>
                <lived id="<?php echo $clastime['class_uid'] ?>_<?php echo $clastime['day_nm'] ?>_sts_0">LIVE</lived>
                <livea id="<?php echo $clastime['class_uid'] ?>_<?php echo $clastime['day_nm'] ?>_sts_1" style="display:none;">LIVE</livea>
                 <?php echo $clastime['cls_time_show'] ?> - <?php echo $clastime['cls_time_show_to'] ?>
                 </p>
                <sub>boilogy</sub>
                <p style="padding-top:10px;"><button type="button" id="<?php echo $clastime['class_uid'] ?>_<?php echo $clastime['day_nm'] ?>" class="btn btn-info openliveclass" style="padding-left:8px;positoin:relative;left:-8px"><i class="fa fa-fw fa-arrow-right"></i> Start</button></p>
                <div class="bble1"></div>
<?php 
$thisclassid= $clastime['clasuid'];
$teachdata = $this->db->query("SELECT `class_alotment`.*,
                                             `personal_data`.`mem_id`,
                                             `personal_data`.`teacher_nm`,
                                             `personal_data`.`pro_pic`

                                          FROM `class_alotment`
                                          INNER JOIN `personal_data` ON `class_alotment`.`teacherid` = `personal_data`.`mem_id`
                                         WHERE
                                         `class_alotment`.`clasuid` = $thisclassid
                                         AND
                                         `class_alotment`.`insid` = $crn_instid
                                       
                                         AND
                                         `class_alotment`.`teacherid` IS NOT NULL
                                        
                                         
                                    ")->row_array();

                ?>
                <div class="te-rnd-pic" align="center"><img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $teachdata['pro_pic']; ?>" width="100%"></div>
                <div class="techr-nm"><?php echo $teachdata['teacher_nm'] ?></div>
              </div>
            </div>
            <?php } ?>
            <?php } else { ?> 
            <div class="col-md-12" style="padding:8px;">
              <div class="liv-thumb box-sdow">
                <h3>You have no upcoming class to join!</h3>
                <p><lived>LIVE</lived> 00:00 - 00:00</p>
                
              </div>
            </div>
            <?php } ?>
            <?php } ?>

           
            <?php if($isinst == 0){ ?>
            <div class="col-md-12" style="padding:8px;">
              <div class="liv-thumb box-sdow">
                <h3>You have no class to join yet!</h3>
                <p><lived>LIVE</lived> 00:00 - 00:00</p>
                <p style="padding-top:10px;"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#mayallinsti" style="padding-left:8px;positoin:relative;left:-8px">Go to your institute!</button></p>
                
              </div>
            </div>
            <?php } ?>
          </div>

      </div>

        <div class="col-md-4" style="padding:0px 0px 0px 0px;">
         <div class="row" style="padding:3px 5px 3px 3px">

         <?php if($islive['is_live'] == 0){ ?>
             <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
              <div class="card-iner">
                <table width="100%">
                  <tr>
                    <td width="40" valign="top" align="center"><i class="fa fa-fw fa-rocket"></i></td>
                    <td valign="top"><h2>Profile</h2></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td height="70" >
                    
                      <div class="c-title">Please Complete your profile!</div>
                       <div class="c-sml">Without complete profile request may get stuck!</div>
                    
                    </td>
                  </tr>
                </table>
              </div>
            <div class="dropdown-divider" style="margin:0;"> </div>
             <button class="btn btn-block btn-danger btn-raised aro-btn open_ins_pro" >
             <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right-w.svg"> &nbsp;&nbsp;Goto profile setting
             </button>
          </div>
<div class="col-md-12" style="height:10px"></div>
<?php } ?>
           <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
              <div class="card-iner">
                <table width="100%">
                  <tr>
                    <td width="40" valign="top" align="center"><i class="fa fa-fw fa-server"></i></td>
                    <td valign="top"><h2>Material</h2></td>
                  </tr>
                  <tr>
                  <td></td>
                    <td height="100" >
                    
                      <div class="c-title">No study Materials found!</div>
                    
                    </td>
                  </tr>
                </table>
              </div>
            <div class="dropdown-divider" style="margin:0;"> </div>
             <button class="btn btn-block btn-default aro-btn" id="rzp-button1">
             <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Goto Study Materials
             </button>
          </div>
         </div>
       </div>
      <div class="col-md-4" style="padding:0px 0px 0px 0px;">
       <div class="row" style="padding:3px 3px 3px 5px">
        <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
         <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-bell-o"></i></td>
              <td valign="top"><h2>Institute Notification</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="100" align="">
                  <div class="gray">No Notifications!</div>
             
              
              </td>
            </tr>
          </table>
         </div>
         <div class="dropdown-divider" style="margin:0;"> </div>
              <button class="btn btn-block btn-default aro-btn" >
               <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Goto all notifications
              </button>
        </div>

        <div class="col-md-12" style="height:10px"></div>

        <div class="col-md-12 box-sdow card-data" style="padding:0px 0px 0px 0px;">
         <div class="card-iner">
          <table width="100%">
            <tr>
              <td width="40" valign="top" align="center"><i class="fa fa-fw fa-file-text"></i></td>
              <td valign="top"><h2>My Assignment</h2></td>
            </tr>
            <tr>
            <td></td>
              <td height="100" align="">
                  <div class="gray">No Assignment!</div>
             
              
              </td>
            </tr>
          </table>
         </div>
         <div class="dropdown-divider" style="margin:0;"> </div>
              <button class="btn btn-block btn-default aro-btn" >
               <img src="<?php echo base_url().'assets-public/' ?>dist/img/icon/arrow-right.svg"> &nbsp;&nbsp;Goto all assignment
              </button>
        </div>
       </div>
      </div>
    </div>


<script type="text/javascript">
 
  var crnt_liv_cls = '';
     $(document).ready(function() {
            crnt_liv_cls = $('.first_crntcls').val();
             var crntlive_cls = firebase.database().ref().child(crnt_liv_cls);
             crntlive_cls.on('value', function(dataSnapshot){
              if(dataSnapshot.val() == 0){
                $('#'+crnt_liv_cls+'_1').hide();
                $('#'+crnt_liv_cls+'_0').show();
                 firebase.database().ref().child(crnt_liv_cls).remove();
              }else if(dataSnapshot.val() == 1){
                $('#'+crnt_liv_cls+'_0').hide();
                $('#'+crnt_liv_cls+'_1').show();
              }
                // $('#orshow_1').html(dataSnapshot.val());
                //console.log(dataSnapshot.val());
              });
        });


</script>




<!-- RESPCODE = 501
RESPMSG = System Error
STATUS = TXN_FAILURE


ORDERID = ORDS76772342
MID = ABBaCb32974032719478
TXNID = 20200523111212800110168586801542957
TXNAMOUNT = 1.00
PAYMENTMODE = NB
CURRENCY = INR
TXNDATE = 2020-05-23 19:17:55.0
STATUS = TXN_SUCCESS
RESPCODE = 01
RESPMSG = Txn Success
GATEWAYNAME = HDFC
BANKTXNID = 13917123953
BANKNAME = HDFC -->