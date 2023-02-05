<style type="text/css">
 .tdhover tr:hover td { background: #f3f3f3;}
 .tdhover tr:hover .mati-opt-blk { opacity: 1}
 .data-aro { width: 36px; height: 36px; border-radius: 100%; padding: 0px 5px;}
.data-aro i { opacity: 0.7;}
.tinybtn { padding: 0px 3px 0px 3px; position: relative;top: 2px; font-size: 12px}
.tinybtn2 { padding: 2px 5px 2px 5px; position: relative;top: 2px; font-size: 13px}
.dilog-popup { position: absolute;width: 300px; min-height: 70px; max-height: 350px; background: #fff; top: -60px; z-index: 99; padding: 10px 30px 10px 15px; display: none; }
.dilog-popup i { position: absolute; right:8px; font-size: 18px}
.dilog-popup-inr { width: 260px; max-height: 320px; background: ; overflow-x: hidden; overflow-y: scroll;}

</style>
<div class="row body-data" style="padding-top:20px;position:relative">
  <h3 style="font-family: 'Montserrat';">Test Series</h3>
  <div style="position:absolute; right:0;">
  <button id="test_newcreate" type="button" class="btn btn-outline-secondary "><img src="<?php echo base_url().'assets-public/' ?>dist/img/testplus.png" width="21"> &nbsp;<span style="color:#000; font-weight:bold;">CREATE NEW</span></button>
  </div>
</div>
<br>
<div class="row box-sdow">
  <div class="col-md-12 fix-pad">
   <button type="button" class="btn" style="margin:0;"><i class="fa fa-fw fa-filter"></i></button> <span class="gray sml1">Filter</span>
   <input type="hidden" value="" id="totdata">
   <input type="hidden" value="0" id="nextdata">
   <button id="load_next" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-right"></i></button>
   <button id="load_prevd" type="button" class="btn pull-right data-aro" style="margin:0;"><i class="fa fa-fw fa-chevron-left"></i></button>
  
  </div>
  <div class="col-md-12 hir-lin"></div>

<!--  <div id="showmemberdata" style="width:100%;">
    
 </div> -->

<table class="table sml1 tdhover" style="font-size:13px;background:#fff;">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Papers</th>
      <th scope="col" style="font-size:12px;">Course/Class</th>
      <th scope="col" style="font-size:12px;">Subject</th>
      <th scope="col" style="font-size:12px;">Exm.Date</th>

      <th scope="col" style="font-size:12px;">P.By</th>

      <th scope="col" style="font-size:12px;">Status</th>
      <th scope="col" style="font-size:12px; text-align:right;" width="90"></th>
    </tr>
  </thead>
  <tbody>
<?php foreach ($papers as $key => $value) {
  ?>
  <tr id="paperblk_<?php echo $value['tp_mid'] ?>">
    <td style="padding-left:30px;font-size:15px;"><?php echo $value['title'] ?></td>
   
    <td style="position:relative;">
       <?php 
   $newarraycls = $value['class'];
   $coursename = $this->db->query("SELECT `mycourse`.*,
                                            `allcourse`.*

                                          FROM `mycourse`
                                          INNER JOIN `allcourse` ON `allcourse`.`cours_id` = `mycourse`.`allcourse_id`
                                         WHERE
                                         `mycourse`.`mycours_id` IN ($newarraycls)
                                                                            
                                    ")->result_array(); 
    ?>
    <?php foreach ($coursename as $key => $values) {
          ?>
          <?php if($key == 0){ ?>
          <button class="btn active tinybtn"><?php echo $values['cours_nm'] ?></button>
          <?php } ?>
          
      <?php } ?>
     <?php if(count($coursename) > 1){ ?>
          <button id="<?php echo $value['tp_mid'] ?>" class="btn active tinybtn morecrse">
          <?php $totcrs = count($coursename); echo $totcrs - 1; ?>+
          </button>
          <?php } ?>
      <div id="crsdilog_<?php echo $value['tp_mid'] ?>" class="dilog-popup box-sdow">
        <i class="fa fa-close clscorsdilog"></i>
        <div class="dilog-popup-inr">
           <?php foreach ($coursename as $key => $values) {
          ?>
          <button class="btn active tinybtn2"><?php echo $values['cours_nm'] ?></button><br>
          
      <?php } ?>
        </div>
      </div>
    </td>
    <td>
       <?php 
   $newarraysub = $value['subject'];
   $subjename = $this->db->query("SELECT `ins_subject`.*

                                          FROM `ins_subject`
                                         WHERE
                                         `ins_subject`.`subj_id` IN ($newarraysub)
                                        GROUP BY `ins_subject`.`subject_nm`                              
                                    ")->result_array(); 
    ?>
    <?php foreach ($subjename as $key => $valuess) {
          ?>
          <small class="label bg-gray sts-lvl2"><?php echo $valuess['subject_nm'] ?></small>
      <?php } ?>
    </td>
    <td style="font-size:11px;line-height:12px">
     <?php if($value['exm_date']){ ?>
     <?php  $rsdate = strtotime ($value['exm_date']); echo date("F j, Y",$rsdate) ?> <br> 
     <?php  $rstime = strtotime ($value['exm_tim']); echo date("h:i A",$rstime) ?>
     <?php }else{echo '--';} ?>
    </td>
    <td><?php echo $value['teacher_nm'] ?></td>
     <td>
     <?php if($value['is_released'] == 0){ ?>
     <i class="fa fa-fw fa-unlock-alt" style="color:#34a853;"></i> <small class="label bg-pgrn sts-lvl2" style="color:#fff;font-size:10px;position:relative;top:-3px;">Archive</small>
     <?php }else{ ?>
     <i class="fa fa-fw fa-lock" style="color:#1a73e8"></i> <small class="label bg-pblue sts-lvl2" style="color:#fff;font-size:10px;position:relative;top:-3px;">Released</small>
     <small id="<?php echo $value['tp_mid'] ?>" class="label bg-pgrn sts-lvl2 openreport" style="color:#fff;font-size:10px;position:relative;top:-3px;">Reports</small>
     <?php } ?>
     </td>
    <td align="right" style="font-size:17px">


    <i id="<?php echo $value['tp_mid'] ?>" class="fa fa-fw fa-pencil open_thispaper active"></i> &nbsp;
    <i id="<?php echo $value['tp_mid'] ?>" class="fa fa-fw fa-trash active del_thispaper"></i></td>
  </tr>
<?php } ?>
  </tbody>

</div>

<div class="yesnodilog" style="display:;" align="center" >
               <div class="yesnodiloginner" align="center"><br> 
                 Are you sure to<br>delete this paper<br>
                 <button id="yesdelete" class="catthisaddid"  style="">Delete</button>
                 <button id="nodelete" class="canclethiscat" style="">Cancle</button>
               </div>
             </div> 


<script type="text/javascript">
var catchid = new Date().getTime();
  var thismemtype =  "<?php echo $this->session->userdata('mem_type') ?>";
  if(thismemtype == 'teacher'){
          var panelfor = 'teacher_panel';
        }else{
          var panelfor = 'institue_panel';
        }
    $(document).ready(function() {
         // $("#showmemberdata").load('<?php echo base_url()."dashboard/allstudent_data"; ?>');
          
        });
 $('#test_newcreate').click(function() { 
        $("#datacontent").load('<?php echo base_url()."testexam/Create_new_test?v=123"; ?>');
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './'+panelfor+'#create_new_test');
         nextstate('create_new_test');
     });
 $('.open_thispaper').click(function() { 
         $("#datacontent").load('<?php echo base_url()."testexam/test_manage/"; ?>'+this.id+'/?'+catchid);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
         window.history.pushState('forward', null, './'+panelfor+'#test_manage');
         nextstate('test_manage');
     });
 $('.openreport').click(function() { 
         $("#datacontent").load('<?php echo base_url()."testexam/test_report_list/"; ?>'+this.id+'/?'+catchid);
            if(  $("#hidtgl").is(":visible") == true )
            { 
              $('#hidtgl').click();
            }
       
          window.history.pushState('forward', null, './'+panelfor+'#test_report_list');
         nextstate('test_report_list');
     });


   $('.clscorsdilog').click(function() {
    $('.dilog-popup').hide();
   });
   $('.morecrse').click(function() {
    var id = this.id;
    $('#crsdilog_'+id).show();
   });

var del_paperid = 0;
 $('.del_thispaper').click(function(){
    del_paperid = this.id;
    $('.yesnodilog').show();
   });
   $('#nodelete').click(function(){
    $('.yesnodilog').hide();
   });

   $('#yesdelete').click(function(e) {
    var paperid = del_paperid;
   // if(!slnum || !question){
   //   $('#alert-msg').html("Enter mandatory fields !");
   //   var paperid = $('#paperid').val();
   // }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
    var datastring = 'paperid='+paperid;
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>testexam/Delete_mainpaper',
        data: datastring,
        success: function(msg) {
          $('.yesnodilog').hide();
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 
                $('#paperblk_'+paperid).remove(); 
        },
         error: function(data){
                console.log("error");
                console.log(data);
                $('.yesnodilog').hide();
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    // }     
}); 

</script>