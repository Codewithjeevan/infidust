<style type="text/css">
  .checkthisuser { cursor: pointer;}
  .checkthisuser .ischk { display: none; cursor: pointer;}
  .checkthisuser:hover .ischk { display: block;}
</style>
          	<table width="100%" >
            <?php foreach ($member as $members) {
               ?>
          		<tr style="" class="checkthisuser assgnthisuser" id="<?php echo $members['mem_id'] ?>">

          			<td width="50" style="padding-bottom:10px;">
          				<div class="user-sh-blk bg-gray" align="center">
                   <?php if($members['pro_pic']){ ?>
                <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $members['pro_pic'] ?>" height="100%">
                <?php } else { ?>
                <img src="<?php echo base_url() ?>assets-public/dist/img/icon/usert.svg" class="def-usr-img">
                <?php } ?>
                  </div>
          			</td>
          			<td valign="top">
          				<div class="file-data-blk" style="padding-top:5px;position:relative">
                  <i class="fa fa-check ischk" style="position:absolute;right:0px;top:0;color:#000;"></i>
                   <h2><?php echo $members['teacher_nm'] ?></h2>
                  <p style="margin:0;">
                   <?php if($members['pro_pic']){ ?>
                   <?php echo $members['address'] ?>, <?php echo $members['city'] ?>
                   <?php } else { ?>
                   Profile not set yet!
                   <?php } ?>
                   </p>
                  </div>
          			</td>
          		</tr>
               <?php } ?>
          	</table>

<script type="text/javascript">
   $(document).ready(function() {
    $("#managperson").hide();
     $(".srch-loader").hide();

$('.assgnthisuser').click(function(e) {
  var paperid = $('#paperid').val();
var userid = this.id;

           var med = $(this);
          e.preventDefault();
          if ( med.data('requestRunning') ) {
              return;
          }
          med.data('requestRunning', true);
          $('#alert-wait').show();
          var datastring = 'paperid='+paperid+'&userid='+userid;
          $.ajax({
              type: "POST",
              url: '<?php echo base_url();?>testexam/Assign_user',
              data: datastring,
              success: function(msg) {
                      $('#alert-wait').delay().slideUp(); 
                      $('#alert-suc').delay(2000).show().slideUp(); 

                       $(".srch-loader").hide();
                       $("#srch-close").hide();
                       $("#reslut_managperson").hide();
                       $("#managperson").show();
                       $("#srchmanage").val('');
                       $("#managperson").load('<?php echo base_url()."testexam/Paper_manage_person/"; ?>'+testpaperid);

              },
               error: function(data){
                      console.log("error");
                      console.log(data);
                        $('#alert-wait').delay().slideUp(); 
                      $('#alert-err').delay(2000).show().slideUp(); 
                  },
                  complete: function() {
                  med.data('requestRunning', false);
              }
           }); 
     

 
}); 

   });
</script>