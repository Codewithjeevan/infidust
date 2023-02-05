 <i class="fa fa-check" style="position:absolute;right:10px;color:green"></i>
          	<table width="100%">
          		<tr>
          			<td width="50">
          				<div class="user-sh-blk bg-gray" align="center">
                   <?php if($member['pro_pic']){ ?>
                <img src="<?php echo base_url().'assets/' ?>pro-sml/<?php echo $member['pro_pic'] ?>" height="100%">
                <?php } else { ?>
                <img src="<?php echo base_url() ?>assets-public/dist/img/icon/usert.svg" class="def-usr-img">
                <?php } ?>
                  </div>
          			</td>
          			<td valign="top">
          				<div class="file-data-blk" style="padding-top:5px">
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

<script type="text/javascript">
   $(document).ready(function() {
    $("#managperson").show();
   });
</script>