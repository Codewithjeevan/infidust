
 <table class="table sml1 tdhover">
  <thead>
    <tr >
      <!-- <th scope="col" width="16"></th> -->
      <th scope="col" style="font-size:12px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Students</th>
      <th scope="col" style="font-size:12px;">Courses/Class</th>
      <th scope="col" style="font-size:12px;">Info</th>
      <!-- <th scope="col" style="font-size:12px;">J.Date</th> -->
       <th scope="col" style="font-size:12px;" width="50">Status</th>
    <!--  <th scope="col" style="font-size:12px; text-align:right;" width="80">Likes</th> -->
      <th scope="col" style="font-size:12px; text-align:right;" width="40"></th>
    </tr>
  </thead>
  <tbody>
    <?php if(@$student) {  ?>
  <!-- <?php echo $this->session->userdata("mem_sub_typ") ?> -->
       <?php 
            foreach ($student as $member) { 
            ?>
    <tr id="revblk_<?php echo $member['mem_id']?>">
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
   $newarraycls = $member['courses'];
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

      </td>
      <td style="font-size:12px;"><?php echo $member['phone_no'];  ?></td>
      <!-- <td style="font-size:12px;"></td> -->
    <td style="font-size:12px;" align="right">
				
		<div style="width:50px; display:inline-block" class="">
		  <button type="button" class="btn" id="act-deact" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin:0;">		  <?php if(@$member['status'] == 0){ ?>
				<small class="label bg-red sts-lvl">Deactive</small>
				<?php } else { ?>
				<small class="label bg-pgrn sts-lvl">Active</small>
				<?php } ?>
			<div class="ripple-container"></div>
		  </button>
			   <div class="dropdown-menu dropdown-menu-left" aria-labelledby="act-deact" style="width: 250px; position: absolute; top: 46px; left: 15px; will-change: top, left;" x-placement="bottom-start">
				   <ul style="list-style: none;">
					<li id="<?php echo $member['my_jn_inid'] ?>" class="dropdown-item makeactive">
							<label for='radio1'>Active</label>
						</li>
						<li class="dropdown-item">
							<input type='radio' value='0' name='status'  id='changestatus2' style="visibility:hidden;">
							<input type='hidden'  value="<?php echo @$my_institute['my_jn_inid']; ?>" name='my_jn_inid' id="my_jn_inid2" >
							<label for='radio2'>Deactive</label>
						</li>
					</ul>
					
			  </div>
		</div>
		  
    </td>
      <!--   <td style="font-size:12px;" align="right">10</td> -->
      <td style="font-size:15px;" align="right"><i id="<?php echo $member['mem_id']?>" class="fa fa-trash deletuser"></i></td>
    </tr>
   <?php } ?>
   <?php } ?>
  </tbody>
</table>
<?php if(@!$student) {  ?>
<div class="col-md-12" align="center" style="padding:20px;">
  No Student Found!
</div>
<?php } ?>


<div class="yesnodilog" style="display:;" align="center" >
   <div class="yesnodiloginner" align="center">
	 Are you sure to delete this user<br><br>
	 <input class="form-control" type="text" id="delcode" placeholder="delete code" align="center">
	 <button id="yesdelete" class="catthisaddid"  style="">Delete</button>
	 <button id="nodelete" class="canclethiscat" style="">Cancle</button>
   </div>
 </div> 

<script>$(document).ready(function() { $('div').bootstrapMaterialDesign(); });</script>

<script type="text/javascript">
 $('.makeactive').click(function(e) {
 
   
 var status = $('#changestatus').val();
   var my_jn_inid = this.id;
   
   
    var me = $(this);
    e.preventDefault();
    if ( me.data('requestRunning') ) {
        return;
    }
    me.data('requestRunning', true);
    $('#alert-wait').show(); 
     var dataString = 'my_jn_inid='+ my_jn_inid+'&status='+status;
    $.ajax({
        type: "POST",
       // url: '<?php echo base_url();?>dashboard/changestatus',
        data: dataString,
		 dataType: 'json',
        cache:false,
            contentType: false,
            processData: false,
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

                  
        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            me.data('requestRunning', false);
        }
     }); 
         
}); 

$('#changestatus2').click(function(e) {
 
   
   var my_jn_inid2 = $('#my_jn_inid2').val();
   var status = $('#changestatus').val();
   
   
    var me = $(this);
    e.preventDefault();
    if ( me.data('requestRunning') ) {
        return;
    }
    me.data('requestRunning', true);
    $('#alert-wait').show(); 
     var dataString = 'my_jn_inid2='+ my_jn_inid2+'&status='+status;
    $.ajax({
        type: "POST",
        url: '<?php echo base_url();?>dashboard/changestatus',
        data: dataString,
		 dataType: 'json',
        cache:false,
            contentType: false,
            processData: false,
        success: function(msg) {
                $('#alert-wait').delay().slideUp(); 
                $('#alert-suc').delay(2000).show().slideUp(); 

                  
        },
         error: function(data){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            me.data('requestRunning', false);
        }
     }); 
         
}); 


</script>


<script type="text/javascript">
  var filterdcnt = "<?php echo $totfilter_count; ?>";
  //console.log(filterdcnt);
  if(coursfilter == 1){
    $('.filted-rit-data').html(filterdcnt +' of ' +filterdcnt);
    $('.filted-rit-data').show();
  }else{
     $('.filted-rit-data').hide();
  }
</script>


 <script type="text/javascript">
 $(document).ready(function() { 
    var delid = 0;
    var delcode = 332;
   $('.deletuser').click(function(){
    delid = this.id;
    $('.yesnodilog').show();
   });
   $('#nodelete').click(function(){
    $('.yesnodilog').hide();
   });


   $('#yesdelete').click(function(e) {
 var getdelcode = $('#delcode').val();
     if(getdelcode != delcode){
 
   }else{
    var med = $(this);
    e.preventDefault();
    if ( med.data('requestRunning') ) {
        return;
    }
    med.data('requestRunning', true);
    $('#alert-wait').show();
     var dataString = 'userid='+ delid;
    $.ajax({
        type: "POST",
        url: base_url +'company/Removeuser',
        data: dataString,
        success: function(response) {
            
                // $("#datacontent").load('<?php echo base_url()."dashboard/institue_classlot"; ?>');
                    $('#alert-wait').slideUp(); 
                   $('#alert-suc').show().delay(2000).slideUp(); 
                   $('#revblk_'+delid).remove(); 
                 $('.yesnodilog').hide();
                  $('#delcode').val('');
        },
         error: function(response){
                console.log("error");
                console.log(data);
                  $('#alert-wait').delay().slideUp(); 
                $('#alert-err').delay(2000).show().slideUp(); 
            },
            complete: function() {
            med.data('requestRunning', false);
        }
     }); 
    }     
}); 

});
       </script>